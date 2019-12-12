<?php
require_once ("Token.php");

class Manager extends Token
{
    protected $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 管理頁面:電影上下架
     */
    function manager_movie($request)
    {
        $id = $request["id"];
        $status = $request["status"];
        $id_regex = "/^[0-9]*$/";
        $status_regex = "/^[0-1]$/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($id_regex, $id)) {
            $arr["msg"] = "id regex not pass";
            return json_encode($arr);
        }
        if (!preg_match($status_regex, $status)) {
            $arr["msg"] = "status regex not pass";
            return json_encode($arr);
        }

        ## 檢查權限
        if (!$this->manager_verify()) {
            $arr["msg"] = "permission deny";
            return json_encode($arr);
        }

        ## 寫入DB
        $stmt = $this->conn->prepare("UPDATE `movie` SET `status` = ? WHERE `movie`.`id` = ?");
        $stmt->bind_param("ss", $status, $id);
        if (!$stmt->execute()) {
            $arr["msg"] = "DB update fail";
            return json_encode($arr);
        }
        if ($stmt->affected_rows === 0) {
            $arr["msg"] = "id not correspond or status not change";
            return json_encode($arr);
        }

        $arr["status"] = true;
        return json_encode($arr);
    }

    /**
     * 管理頁面:電影內容編輯
     */
    function manager_movie_edit($request)
    {
        $id = $request["id"];
        $name_tw = $request["name_tw"];
        $name_en = $request["name_en"];
        $intro = $request["intro"];
        $id_regex = "/^[0-9]*$/";
        $regex = "/\S/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($id_regex, $id)) {
            $arr["msg"] = "id regex not pass";
            return json_encode($arr);
        }

        if (!preg_match($regex, $name_tw) || !preg_match($regex, $name_en) || !preg_match($regex, $intro)) {
            $arr["msg"] = "empty is not allowed";
            return json_encode($arr);
        }

        ## 檢查權限
        if (!$this->manager_verify()) {
            $arr["msg"] = "permission deny";
            return json_encode($arr);
        }

        $sql = 'UPDATE `movie` SET `name_tw`=?,`name_en`=?,`intro`=? WHERE `id`=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name_tw, $name_en, $intro, $id);
        if (!$stmt->execute()) {
            $arr["msg"] = "DB update fail";
            return json_encode($arr);
        }
        if ($stmt->affected_rows === 0) {
            $arr["msg"] = "id not correspond or status not change";
            return json_encode($arr);
        }
        $arr["status"] = true;
        return json_encode($arr);
    }

    /**
     * 管理頁面:新增場次
     */
    function manager_addevent($request)
    {
        $id = $request["id"];
        $date = $request["date"];
        $time = $request["time"];
        $id_regex = "/^[0-9]*$/";
        $date_regex = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
        $time_regex = "/[0-9]{2}:[0-9]{2}/";
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($id_regex, $id) ||!preg_match($date_regex, $date)|| !preg_match($time_regex, $time)) {
            $arr["msg"] = "regex not pass";
            return json_encode($arr);
        }

        ## 檢查權限
        if (!$this->manager_verify()) {
            $arr["msg"] = "permission deny";
            return json_encode($arr);
        }

        $sql = 'INSERT INTO `movie_time` (`movie_id`,`date`,`time`) VALUES (?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $id, $date, $time);
        if (!$stmt->execute()) {
            $arr["msg"] = "DB update fail";
            return json_encode($arr);
        }

        $arr["status"] = true;
        return json_encode($arr);
    }
}