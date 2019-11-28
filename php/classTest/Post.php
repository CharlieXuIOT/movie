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
        // ## 撈電影詳細資料
        // $sql = "SELECT `movie`.*, Date(`movie_time`.`time`) AS `date`,  Time(`movie_time`.`time`) AS `time`
        //         FROM `movie`, `movie_time` WHERE `movie`.`id` = $id";
        // $result = $this->conn->query($sql);
        // if ($result->num_rows === 0) {
        //     $arr["msg"] = "movie id not exist";
        //     return $arr;
        // }
        // while ($row = $result->fetch_assoc()) {
        //     $arr["data"][] = $row;
        // }
        // $this->conn->close();
        // $arr["status"] = true;
        // return $arr;

        $sql = "SELECT *, DATE(create_at) AS createat FROM `movie` WHERE `id` = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows === 0) {
            $arr["msg"] = "movie id not exist";
            return $arr;
        }
        $arr["movieinfo"] = $result->fetch_assoc();

        $sql = "SELECT * FROM `movie_time` WHERE `movie_id` = $id";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $arr["time"][] = $row;
        }
        $arr["status"] = true;
        return $arr;
    }
}