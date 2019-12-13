<?php
require_once("Token.php");

class Book extends Token
{
    protected $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 訂票結帳
     */
    public function post_checkout($request)
    {
        // print_r($request);
        $token = $request["token"];
        $event = $request["event"];
        $ticket = json_decode($request["ticket"],true);
        $seat = json_decode($request["seat"],true);
        $total = $request["total"];
        $regex = "/^[0-9]*$/";
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 身分驗證
        $result = $this->checkToken();
        if ($result["permission"] < 1) {
            $return_arr["msg"] = "guest not allowed";
            return json_encode($return_arr);
        }

        ## 正則驗證
        if (!preg_match($regex, $event)) {
            $return_arr["msg"] = "set regex not pass";
            return json_encode($return_arr);
        }

        try {
            ## turn on transactions
            $this->conn->autocommit(false);

            ## step0. 檢查電影狀態
            $sql0 = "SELECT `movie`.`status` FROM `movie`,`movie_time`
                        WHERE `movie`.`id` = `movie_time`.`movie_id`
                        AND `movie_time`.`id` = ?";
            $stmt0 = $this->conn->prepare($sql0);
            $stmt0->bind_param("s", $event);
            if (!$stmt0->execute()) {
                throw new Exception(htmlspecialchars($stmt0->error));
            };

            $stmt0->bind_result($status);
            $stmt0->fetch();
            $stmt0->close();

            if ($status === "0") {
                throw new Exception(htmlspecialchars("MyErrorCode:Please check movie status"));
            };

            ## step1. book_info建單
            $sql1 = "INSERT INTO `book_info` (`event_id`,`member_id`) 
                        VALUES (?,(SELECT `member`.`id` FROM `member` WHERE `member`.`account` = ?))";
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->bind_param("ss", $event, $result["account"]);
            if (!$stmt1->execute()) {
                throw new Exception(htmlspecialchars($stmt1->error));
            };
            ## 取得新增的單號
            $book_id = $stmt1->insert_id;
            $stmt1->close();

            ## step2. book_ticket寫入票種/數量 並扣除member使用者餘額
            ## 使用者的餘額 $result["cash"]
            ## 計算訂票總金額 $amount
            $amount = 0;
            ## DB查詢結果:票價和id的陣列
            $ticketprice = array();
            $ticketid = array();

            $sql5 = "SELECT `id`,`price` FROM `ticket` WHERE `type` IN (";
            $bind_form = "";
            $bind_array = array();
            $count = count($ticket);
            for ($i = 0; $i < $count; $i++) {
                if ($i === 0){
                    $sql5 = $sql5."?";
                } else {
                    $sql5 = $sql5.",?";
                }
                $bind_form = $bind_form."s";
                $bind_array[] = $ticket[$i]["ticketType"];
            }
            $sql5 = $sql5.")";

            $stmt5 = $this->conn->prepare($sql5);
            $stmt5->bind_param($bind_form, ...$bind_array);

            if (!$stmt5->execute()) {
                throw new Exception(htmlspecialchars($stmt5->error));
            }

            $stmt5->store_result();
            if ($stmt5->num_rows != count($ticket)) {
                throw new Exception(htmlspecialchars("MyErrorCode:ticketType's name not correspond"));
            }

            $stmt5->bind_result($id, $ticket_price);
            while ($stmt5->fetch()) {
                // ticketid array
                $ticketid[] = $id;
                // ticketprice array
                $ticketprice[] = $ticket_price;
            }
            $count = count($ticketprice);
            for ($i = 0; $i < $count; $i++) {
                $amount += $ticketprice[$i]*$ticket[$i]["quantity"];
            }

            $stmt5->close();

            ## 判斷帳戶餘額是否足夠
            if ($amount > $result["cash"]) {
                throw new Exception(htmlspecialchars("MyErrorCode:no enough money"));
            }
            $result["cash"] = $result["cash"] - $amount;

            ## 寫入DB
            $sql2 = "INSERT INTO `book_ticket` (`book_id`,`ticket_id`,`sheet`,`ticket_price`) VALUES ";
            $bind_form = "";
            $bind_array = array();
            $count = count($ticketid);
            for ($i = 0; $i < $count; $i++) {
                if ($i === 0){
                    $sql2 = $sql2."(?,?,?,?)";
                } else {
                    $sql2 = $sql2.",(?,?,?,?)";
                }
                $bind_form = $bind_form."ssss";

                $bind_array[] = $book_id;
                $bind_array[] = $ticketid[$i];
                $bind_array[] = $ticket[$i]["quantity"];
                $bind_array[] = $ticketprice[$i];
            }

            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->bind_param($bind_form, ...$bind_array);

            if (!$stmt2->execute()) {
                throw new Exception(htmlspecialchars($stmt2->error));
            }

            $stmt2->close();

            ## 扣除使用者餘額
            ## 使用者帳號 $result["account"]
            $sql6 = "UPDATE `member` SET `cash` = ? WHERE `account` = ?";
            $stmt6 = $this->conn->prepare($sql6);
            $stmt6->bind_param("ss", $cash, $account);
            $cash = $result["cash"];
            $account = $result["account"];
            if (!$stmt6->execute()) {
                throw new Exception(htmlspecialchars($stmt6->error));
            };
            $stmt6->close();

            ## step3. book_seat寫入座位
            ## 先查詢座位是否已被訂購
            $sql3 = "SELECT `book_seat`.`row`,`book_seat`.`number` FROM `book_seat`,`book_info` 
                        WHERE `book_info`.`id`=`book_seat`.`book_id` 
                        AND `book_info`.`event_id` = ?
                        AND (";
            $bind_form = "s";
            $bind_array = array();
            $bind_array[] = $book_id;

            $count = count($seat);
            for ($i = 0; $i < $count; $i++) {
                if ($i === 0) {
                    $sql3 = $sql3."(`book_seat`.`row` = ? AND `book_seat`.`number` = ?)";
                } else {
                    $sql3 = $sql3." OR (`book_seat`.`row` = ? AND `book_seat`.`number` = ?)";
                }
                $bind_form = $bind_form."ss";
                $bind_array[] = $seat[$i]["row"];
                $bind_array[] = $seat[$i]["number"];
            }
            $sql3 = $sql3.")";

            $stmt3 = $this->conn->prepare($sql3);
            $stmt3->bind_param($bind_form, ...$bind_array);

            if (!$stmt3->execute()) {
                throw new Exception(htmlspecialchars($stmt3->error));
            };
            $stmt3->store_result();
            if ($stmt3->num_rows > 0) {
                throw new Exception(htmlspecialchars("MyErrorCode:seat already been booked"));
            };

            $stmt3->free_result();
            $stmt3->close();
            ## 寫入book_seat
            $sql4 = "INSERT INTO `book_seat` (`book_id`,`row`,`number`) VALUES ";
            $bind_form = "";
            $bind_array = array();

            $count = count($seat);
            for ($i = 0; $i < $count; $i++) {
                if ($i === 0) {
                    $sql4 = $sql4."(?,?,?)";
                } else {
                    $sql4 = $sql4.",(?,?,?)";
                }
                $bind_form = $bind_form."sss";
                $bind_array[] = $book_id;
                $bind_array[] = $seat[$i]["row"];
                $bind_array[] = $seat[$i]["number"];
            }

            $stmt4 = $this->conn->prepare($sql4);
            $stmt4->bind_param($bind_form, ...$bind_array);

            if (!$stmt4->execute()) {
                throw new Exception(htmlspecialchars($stmt4->error));
            };
            $stmt4->close();

            ## turn off transactions + commit queued queries
            $this->conn->autocommit(true);
            $return_arr["status"] = true;
        } catch(Exception $e) {
            ## remove all queries from queue if error (undo)
            $this->conn->rollback();
            $return_arr["msg"] = $e->getMessage();
            $this->conn->close();
        }

        return json_encode($return_arr);
    }

    /**
     * class內部調用function:checkMovieStatus
     * 檢查電影的上下架狀態
     */
    function checkMovieStatus($event)
    {
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];
        $sql0 = "SELECT `movie`.`status` FROM `movie`,`movie_time` 
                        WHERE `movie`.`id` = `movie_time`.`movie_id` 
                        AND `movie_time`.`id` = ?";
        $stmt0 = $this->conn->prepare($sql0);
        $stmt0->bind_param("s", $event);
        if (!$stmt0->execute()) {
            $return_arr["msg"] = htmlspecialchars($stmt0->error);
            return $return_arr;
        };


        $stmt0->bind_result($status);
        $stmt0->fetch();
        $stmt0->close();
        $return_arr["status"] = true;
        $return_arr["condition"] = $status;
        return $return_arr;
    }
}