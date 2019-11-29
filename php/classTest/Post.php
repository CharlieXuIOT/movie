<?php
require_once("Session.php");

class Post extends Token
{
    protected $conn;
    ## 每頁有多少筆資料
    private $row_per_page = 6;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function __destruct()
    {
        ## TODO: Implement __destruct() method.
    }

    function index($page)
    {
        ## 回應的陣列
        $arr = array();
        $page_regex = "/^\+?[1-9][0-9]*$/";


        $sql = "SELECT id FROM `movie`";
        $result = $this->conn->query($sql);
        $pages = ceil($result->num_rows / $this->row_per_page);
        if (preg_match($page_regex, $page) === 0 || $page > $pages) {
            $page = 1;
        }
        $arr["page"] = $page;
        $arr["pages"] = $pages;


        ## 從第 $row 筆開始，顯示 $this->row_per_page 筆
        $row = ($page - 1) * $this->row_per_page;
        $sql = "SELECT `id`,`name_tw`,`name_en`,`img`, Date(`create_at`) AS `createat` 
                FROM `movie` WHERE `status`= 1 ORDER BY `create_at` DESC LIMIT $row, $this->row_per_page";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $arr["data"][] = $row;
        }
        $this->conn->close();
        return $arr;
    }

    /**
     * 電影細節
     */
    function moviedetail($id)
    {
        $regex = "/^[0-9]*$/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $id)) {
            $arr["msg"] = "set regex not pass";
            return $arr;
        }

        $sql = "SELECT *, DATE(create_at) AS createat FROM `movie` WHERE `id` = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $arr["msg"] = "movie id not exist";
            return $arr;
        }
        $arr["movieinfo"] = $result->fetch_assoc();

        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d");
        $sql = "SELECT * FROM `movie_time` 
                WHERE DATEDIFF(`date`, '$date')<6 AND DATEDIFF(`date`, '$date')>=0 AND `movie_id` = $id
                ORDER BY `date`,`time`";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 0) {
            $arr["msg"] = "empty";
            return $arr;
        }

        while ($row = $result->fetch_assoc()) {
            $arr["time"][] = $row;
        }

        ## tab date
        foreach ($arr["time"] as $time) {
            $arr["tab_date"][] = $time["date"];
        }
        $arr["tab_date"] = array_unique($arr["tab_date"]);

        ## tab time & button
        foreach ($arr["tab_date"] as $date) {
            foreach ($arr["time"] as $time) {
                if ($date == $time["date"]) {
                    date_default_timezone_set('Asia/Taipei');
                    $now_date = date("Y-m-d");
                    $now_time = date('H:i:s', strtotime("+1 hours"));
                    if (strtotime($date) == strtotime($now_date) && strtotime($now_time) > strtotime($time["time"])) {
                        $arr["tab_time"][$date][] = array("time"=>$time["time"]);
                    } else {
                        $arr["tab_time"][$date][] = array("time"=>$time["time"], "event_id"=>$time["id"]);
                    }
                }
            }
        }


        $arr["status"] = true;
        return $arr;
    }

    /**
     * 訂票首頁
     */
    function book($id)
    {
        $regex = "/^[0-9]*$/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $id)) {
            $arr["msg"] = "set regex not pass";
            return $arr;
        }

        date_default_timezone_set('Asia/Taipei');
        $now_date = date("Y-m-d");
        $now_time = date('H:i:s', strtotime("+1 hours"));
        $sql = "SELECT `movie_time`.* ,`movie`.`name_tw`,`movie`.`status`
                FROM `movie_time`, `movie`
                WHERE `movie`.`id` = `movie_time`.`movie_id`
                AND `movie_time`.`id` = $id
                AND `movie`.`status` = '1'
                AND DATE(`movie_time`.`date`) >= DATE($now_date)
                AND TIME(`movie_time`.`time`) >= TIME($now_time)";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $arr["msg"] = "movie not exist || out of theater";
            return $arr;
        }
        $arr["movieinfo"] = $result->fetch_assoc();
    }
}