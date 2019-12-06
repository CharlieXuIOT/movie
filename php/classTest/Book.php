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
    function checkout($post)
    {
        // print_r($post);
        $token = $post["token"];
        $event = $post["event"];
        $ticket = json_decode($post["ticket"],true);
        $seat = json_decode($post["seat"],true);
        $total = $post["total"];
        $regex = "/^[0-9]*$/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        // 身分驗證
        $result = $this->checkToken();
        if ($result["permission"] < 1) {
            $arr["msg"] = "guest not allowed";
            return json_encode($arr);
        }

        ## 正則驗證
        if (!preg_match($regex, $event)) {
            $arr["msg"] = "set regex not pass";
            return json_encode($arr);
        }

        try {
            ## turn on transactions
            $this->conn->autocommit(FALSE);

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
            if ($status == "0") {
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
            $sql5 = "SELECT `price` FROM `ticket` WHERE `type` = ?";
            $stmt5 = $this->conn->prepare($sql5);
            $stmt5->bind_param("s", $ticket_type);
            foreach ($ticket as $_ticket) {
                $ticket_type = $_ticket["ticketType"];
                if (!$stmt5->execute()) {
                    throw new Exception(htmlspecialchars($stmt5->error));
                };
                $stmt5->bind_result($ticket_price);
                $stmt5->fetch();
                $amount += $ticket_price * $_ticket["quantity"];
            }
            $stmt5->close();
            if ($amount > $result["cash"]) {
                throw new Exception(htmlspecialchars("MyErrorCode:no enough money"));
            }
            $result["cash"] = $result["cash"] - $amount;

            ## 寫入DB
            $sql2 = "INSERT INTO `book_ticket` (`book_id`,`ticket_id`,`sheet`,`ticket_price`) 
                        VALUES (?,(SELECT `ticket`.`id` FROM `ticket` WHERE `ticket`.`type` = ? limit 1)
                                ,?,(SELECT `ticket`.`price` FROM `ticket` WHERE `ticket`.`type` = ? limit 1))";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->bind_param("sssi", $book_id, $ticket_type1, $sheet, $ticket_type2);
            foreach ($ticket as $_ticket) {
                $ticket_type1 = $_ticket["ticketType"];
                $ticket_type2 = $_ticket["ticketType"];
                $sheet = $_ticket["quantity"];
                $ticket_price = $_ticket["price"];
                if (!$stmt2->execute()) {
                    throw new Exception(htmlspecialchars($stmt2->error));
                };
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
                        AND `book_seat`.`row` = ?
                        AND `book_seat`.`number` = ?";
            $stmt3 = $this->conn->prepare($sql3);
            $stmt3->bind_param("sss", $event, $row, $number);
            foreach ($seat as $_seat) {
                $row = $_seat["row"];
                $number = $_seat["number"];
                if (!$stmt3->execute()) {
                    throw new Exception(htmlspecialchars($stmt3->error));
                };
                $stmt3->store_result();
                if ($stmt3->num_rows > 0) {
                    throw new Exception(htmlspecialchars("MyErrorCode:seat already been booked"));
                };
                $stmt3->free_result();
            }
            $stmt3->close();
            ## 寫入book_seat
            $sql4 = "INSERT INTO `book_seat` (`book_id`,`row`,`number`) VALUES (?,?,?)";
            $stmt4 = $this->conn->prepare($sql4);
            $stmt4->bind_param("sss", $book_id, $row, $number);
            foreach ($seat as $_seat) {
                $row = $_seat["row"];
                $number = $_seat["number"];
                if (!$stmt4->execute()) {
                    throw new Exception(htmlspecialchars($stmt3->error));
                };
            }
            $stmt4->close();

            ## turn off transactions + commit queued queries
            $this->conn->autocommit(TRUE);
            $arr["status"] = true;
            return json_encode($arr);
        } catch(Exception $e) {
            ## remove all queries from queue if error (undo)
            $this->conn->rollback();
            $arr["msg"] = $e->getMessage();
            $this->conn->close();
            return json_encode($arr);
        }
    }
}