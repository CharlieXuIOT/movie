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
        $sql = "SELECT `id`,`name_tw`,`name_en`,`img`,`create_at` FROM `movie` WHERE `status`= 1 ORDER BY `create_at` DESC LIMIT $row, $this->row_per_page";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $arr["data"][] = $row;
        }
        $this->conn->close();
        return $arr;
    }
}