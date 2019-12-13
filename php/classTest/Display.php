<?php
require_once("Token.php");

class Display extends Token
{
    protected $conn;
    ## 每頁有多少筆資料
    private $row_per_page = 6;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function index($page)
    {
        ## 回應的陣列
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];
        $page_regex = "/^\+?[1-9][0-9]*$/";


        $sql = "SELECT id FROM `movie`";
        $result = $this->conn->query($sql);
        $pages = ceil($result->num_rows / $this->row_per_page);
        if (preg_match($page_regex, $page) === 0 || $page > $pages) {
            $page = 1;
        }
        $return_arr["page"] = $page;
        $return_arr["pages"] = $pages;


        ## 從第 $row 筆開始，顯示 $this->row_per_page 筆
        $row = ($page - 1) * $this->row_per_page;
        $sql = "SELECT `id`,`name_tw`,`name_en`,`img`, Date(`create_at`) AS `createat` 
                FROM `movie` WHERE `status`= 1 ORDER BY `create_at` DESC LIMIT $row, $this->row_per_page";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $return_arr["data"][] = $row;
        }
        $this->conn->close();
        return $return_arr;
    }

    /**
     * 電影細節
     */
    function moviedetail($id)
    {
        $regex = "/^[0-9]*$/";
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $id)) {
            $return_arr["msg"] = "set regex not pass";
            return $return_arr;
        }

        $sql = "SELECT *, DATE(create_at) AS createat FROM `movie` WHERE `id` = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $return_arr["msg"] = "movie id not exist";
            return $return_arr;
        }
        $return_arr["movieinfo"] = $result->fetch_assoc();

        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d");
        $sql = "SELECT * FROM `movie_time` 
                WHERE DATEDIFF(`date`, '$date')<6 AND DATEDIFF(`date`, '$date')>=0 AND `movie_id` = $id
                ORDER BY `date`,`time`";
        $result = $this->conn->query($sql);

        if ($result->num_rows === 0) {
            $return_arr["msg"] = "empty";
            return $return_arr;
        }

        while ($row = $result->fetch_assoc()) {
            $return_arr["time"][] = $row;
        }

        ## tab date
        foreach ($return_arr["time"] as $time) {
            $return_arr["tab_date"][] = $time["date"];
        }
        $return_arr["tab_date"] = array_unique($return_arr["tab_date"]);

        ## tab time & button
        foreach ($return_arr["tab_date"] as $date) {
            foreach ($return_arr["time"] as $time) {
                if ($date === $time["date"]) {
                    date_default_timezone_set('Asia/Taipei');
                    $now_date = date("Y-m-d");
                    $now_time = date('H:i:s', strtotime("+1 hours"));
                    if (strtotime($date) === strtotime($now_date) && strtotime($now_time) > strtotime($time["time"])) {
                        $return_arr["tab_time"][$date][] = array("time"=>$time["time"]);
                    } else {
                        $return_arr["tab_time"][$date][] = array("time"=>$time["time"], "event_id"=>$time["id"]);
                    }
                }
            }
        }

        $return_arr["status"] = true;
        return $return_arr;
    }

    /**
     * 訂票第一頁:選票種類
     */
    function book_ticket($id)
    {
        $regex = "/^[0-9]*$/";
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $id)) {
            $return_arr["msg"] = "set regex not pass";
            return $return_arr;
        }

        ## 身分驗證
        if (!$this->member_verify()) {
            $return_arr["msg"] = "guest not allowed";
            return json_encode($return_arr);
        }

        ## 以event id撈出訂票右側需要的資料
        ## 條件:管理員未下架、離播映時間不小於一小時
        $sql = "SELECT `movie_time`.* ,`movie`.`name_tw`,`movie`.`name_en`
                FROM `movie_time`, `movie`
                WHERE `movie`.`id` = `movie_time`.`movie_id`
                AND `movie_time`.`id` = '$id'
                AND `movie`.`status` = '1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $return_arr["msg"] = "event id not correspond";
            return $return_arr;
        }
        $return_arr["movieinfo"] = $result->fetch_assoc();

        ## 條件:離播映時間不小於一小時
        date_default_timezone_set('Asia/Taipei');
        $now_date = date("Y-m-d");
        $now_time = date('H:i:s', strtotime("+1 hours"));
        $this_date = $return_arr["movieinfo"]["date"];
        $this_time = $return_arr["movieinfo"]["time"];
        if (strtotime($now_date) > strtotime($this_date)) {
            $return_arr["msg"] = "play time is passed";
            return $return_arr;
        } elseif (strtotime($now_date) === strtotime($this_date)) {
            if (strtotime($now_time) > strtotime($this_time)) {
                $return_arr["msg"] = "play time is passed";
                return $return_arr;
            }
        }

        ## 去掉時間裡的秒數
        $return_arr["movieinfo"]["time"] = date('H:i', strtotime($return_arr["movieinfo"]["time"]));

        ## 撈票種資料
        $result = $this->conn->query("SELECT * FROM `ticket`");
        while ($row = $result->fetch_assoc()) {
            $return_arr["tickets"][] = $row;
        }

        $return_arr["status"] = true;
        return $return_arr;

    }

    /**
     * 訂票第二頁:選位置
     */
    function book_seat($id)
    {
        $regex = "/^[0-9]*$/";
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $id)) {
            $return_arr["msg"] = "set regex not pass";
            return $return_arr;
        }

        ## 身分驗證
        if (!$this->member_verify()) {
            $return_arr["msg"] = "guest not allowed";
            return json_encode($return_arr);
        }

        ## 以event id撈出訂票右側需要的資料
        ## 條件:管理員未下架、離播映時間不小於一小時
        $sql = "SELECT `movie_time`.* ,`movie`.`name_tw`,`movie`.`name_en`
                FROM `movie_time`, `movie`
                WHERE `movie`.`id` = `movie_time`.`movie_id`
                AND `movie_time`.`id` = '$id'
                AND `movie`.`status` = '1'";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $return_arr["msg"] = "event id not correspond";
            return $return_arr;
        }
        $return_arr["movieinfo"] = $result->fetch_assoc();

        ## 條件:離播映時間不小於一小時
        date_default_timezone_set('Asia/Taipei');
        $now_date = date("Y-m-d");
        $now_time = date('H:i:s', strtotime("+1 hours"));
        $this_date = $return_arr["movieinfo"]["date"];
        $this_time = $return_arr["movieinfo"]["time"];
        if (strtotime($now_date) > strtotime($this_date)) {
            $return_arr["msg"] = "play time is passed";
            return $return_arr;
        } elseif (strtotime($now_date) === strtotime($this_date)) {
            if (strtotime($now_time) > strtotime($this_time)) {
                $return_arr["msg"] = "play time is passed";
                return $return_arr;
            }
        }

        ## 去掉時間裡的秒數
        $return_arr["movieinfo"]["time"] = date('H:i', strtotime($return_arr["movieinfo"]["time"]));

        ## 撈該場座位資訊
        $result = $this->conn->query("SELECT `book_seat`.`row`,`book_seat`.`number`
                                        FROM `book_info`,`book_seat`
                                        WHERE `book_info`.`id`=`book_seat`.`book_id`
                                        AND `book_info`.`event_id`=$id");
        while ($row = $result->fetch_assoc()) {
            $return_arr["seats"][$row["row"]][$row["number"]] = 1;
        }

        $return_arr["status"] = true;
        return $return_arr;
    }

    /**
     * 管理頁面:會員
     */
    function manager_member($quick, $page)
    {
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];
        $page_regex = "/^\+?[1-9][0-9]*$/";

        ## 檢查權限
        if (!$this->manager_verify()) {
            $return_arr["msg"] = "Permission denied";
            return json_encode($return_arr);
        }

        ## 總頁數
        $sql = "SELECT COUNT(`id`) as count FROM `member`";
        if ($quick === "1") {
            $sql = $sql." WHERE `permission` = '-1'";
        } else {
            $sql = $sql." WHERE `permission` <> '2'";
        }
        $result = $this->conn->query($sql);
        $count = $result->fetch_object();
        $count = $count->count;
        $pages = ceil($count / $this->row_per_page);
        if (preg_match($page_regex, $page) === 0 || $page > $pages) {
            $page = 1;
        }
        $return_arr["page"] = $page;
        $return_arr["pages"] = $pages;

        ## 撈資料
        ## 從第 $row 筆開始，顯示 $this->row_per_page 筆
        $row = ($page - 1) * $this->row_per_page;
        $sql = "SELECT `id`,`account`,`permission`,`last_login` FROM `member`";
        if ($quick === "1") {
            $sql = $sql." WHERE `permission` = '-1'";
        } else {
            $sql = $sql." WHERE `permission` <> '2'";
        }
        $sql = $sql."ORDER BY `last_login` DESC LIMIT $row,$this->row_per_page";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            switch ($row["permission"]) {
                case "1":
                    $row["level"] = "一般會員";
                    break;

                case "-1":
                    $row["level"] = "停權會員";
                    break;
            }
            $return_arr["data"][] = $row;
        }
        $return_arr["status"] = true;
        return $return_arr;
    }

    /**
     * 管理頁面:電影狀態
     */
    function manager_movie()
    {
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 檢查權限
        if (!$this->manager_verify()) {
            $return_arr["msg"] = "Permission denied";
            return json_encode($return_arr);
        }

        ## 撈資料
        $sql = "SELECT `id`,`name_tw`,`status` FROM `movie` ORDER BY `create_at` DESC";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            switch ($row["status"]) {
                case "1":
                    $row["level"] = "播映中";
                    break;

                case "0":
                    $row["level"] = "已下架";
                    break;
            }
            $return_arr["data"][] = $row;
        }
        $return_arr["status"] = true;
        return $return_arr;
    }

    /**
     * 管理頁面:電影明細
     */
    function get_manager_movie_status($request)
    {
        $id = $request["id"];
        $id_regex = "/^[0-9]*$/";
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($id_regex, $id)) {
            $return_arr["msg"] = "id regex not pass";
            return json_encode($return_arr);
        }

        ## 檢查權限
        if (!$this->manager_verify()) {
            $return_arr["msg"] = "permission deny";
            return json_encode($return_arr);
        }

        $sql = "SELECT * FROM `movie` WHERE `id`= ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        if (!$stmt->execute()) {
            $return_arr["msg"] = "DB search error";
            return json_encode($return_arr);
        }

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $return_arr["msg"] = "id not correspond";
            return json_encode($return_arr);
        }
        $return_arr["status"] = true;
        $return_arr["data"] = $result->fetch_assoc();
        return json_encode($return_arr);
    }

    /**
     * 管理頁面:新增場次
     */
    function manager_addevent()
    {
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 檢查權限
        if (!$this->manager_verify()) {
            $return_arr["msg"] = "permission deny";
            return json_encode($return_arr);
        }

        $sql = "SELECT `id`, `name_tw` FROM `movie` ORDER BY `create_at` DESC";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $return_arr["data"][] = $row;
        }
        $this->conn->close();

        $return_arr["status"] = true;
        return $return_arr;
    }

    /**
     * 購買紀錄
     */
    function record($request)
    {
        $return_arr = [
            'status' => false,
            'msg' => '',
        ];
        $regex = "/^[0-9]*$/";
        $page = $request;

        ## 取得使用者帳號並檢查權限
        $result = $this->checkToken();
        $account = $result["account"];
        if (!$this->member_verify()) {
            $return_arr["msg"] = "permission deny";
            return $return_arr;
        }

        ## 計算總頁數
        $sql = "SELECT `book_info`.`id` FROM `book_info`,`member` 
                WHERE `member`.`account` = $account 
                AND `book_info`.`member_id` = `member`.`id`";
        $result = $this->conn->query($sql);
        $pages = ceil($result->num_rows / $this->row_per_page);
        if (preg_match($regex, $page) === 0 || $page > $pages) {
            $page = 1;
        }
        $return_arr["page"] = $page;
        $return_arr["pages"] = $pages;

        $row = ($page - 1) * $this->row_per_page;
        $sql = "SELECT `book_info`.`id`,`member`.`account`,`movie`.`name_tw`,`ticket`.`type`,`book_ticket`.`sheet`,
                    `ticket`.`price`*`book_ticket`.`sheet` AS `subtotal`,`book_info`.`create_at`,
                    `movie_time`.`date`,`movie_time`.`time`
                FROM (SELECT `book_info`.* FROM `book_info`,`member` WHERE `member`.`account` = $account
                    AND `book_info`.`member_id` = `member`.`id` ORDER BY `book_info`.`create_at` DESC LIMIT $row,$this->row_per_page) AS `book_info`,
                    `book_ticket`,`member`,`movie_time`,`movie`,`ticket`
                WHERE `book_info`.`id` = `book_ticket`.`book_id`
                AND `book_info`.`member_id` = `member`.`id`
                AND `book_info`.`event_id` = `movie_time`.`id`
                AND `movie_time`.`movie_id` = `movie`.`id`
                AND `book_ticket`.`ticket_id` = `ticket`.`id`
                AND `member`.`account` = $account
                ORDER BY `book_info`.`create_at` DESC ,`ticket`.`id`";
        $result = $this->conn->query($sql);

        if ($result->num_rows === 0) {
            $return_arr["status"] = true;
            $return_arr["msg"] = "no record";
            return $return_arr;
        }

        while ($row = $result->fetch_assoc()) {
            $return_arr["data"][$row["id"]]["create_at"] = $row["create_at"];
            $return_arr["data"][$row["id"]]["name"] = $row["name_tw"];
            $return_arr["data"][$row["id"]]["amount"] = 0;
            $return_arr["data"][$row["id"]]["event_date"] = $row["date"];
            $return_arr["data"][$row["id"]]["event_time"] = $row["time"];
            $return_arr["data"][$row["id"]]["ticket"][] = array("type"=>$row["type"], "sheet"=>$row["sheet"], "subtotal"=>$row["subtotal"]);
        }

        $tmp = [];
        foreach ($return_arr["data"] as $key => $ar) {
            $tickets = $ar["ticket"];
            foreach ($tickets as $ticket) {
                $ar["amount"] = intval($ar["amount"]) + intval($ticket["subtotal"]);
            }
            $tmp[$key] = $ar;
        }
        $return_arr["data"] = $tmp;

        $return_arr["status"] = true;
        return $return_arr;
    }
}