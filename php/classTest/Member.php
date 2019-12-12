<?php
require_once("Token.php");

class Member extends Token
{
    protected $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 註冊
     */
    function register($_request)
    {
        $account = $_request["account"];
        $password = $_request["password"];
        $regex = "/^[A-Za-z0-9]{3,}$/";
        $accFlag = preg_match($regex, $account);
        $pwFlag = preg_match($regex, $password);
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        if ($accFlag !== 1 or $pwFlag !== 1) {
            $arr["msg"] = "backend regex not pass";
            return json_encode($arr);
        }

        $stmt = $this->conn->prepare("INSERT INTO `member` (`account`,`password`,`permission`) VALUES (?,?,?)");
        $permission = 1;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssi", $account, $password, $permission);
        if ($stmt->execute() === false) {
            $arr["msg"] = "account is duplicated";
            return json_encode($arr);
        }
        $arr["status"] = true;
        $arr["msg"] = "";
        return json_encode($arr);
    }

    /**
     * 登入
     */
    function login($_request)
    {
        $_account = $_request["account"];
        $_password = $_request["password"];
        $regex = "/^[A-Za-z0-9]{3,}$/";
        $accFlag = preg_match($regex, $_account);
        $pwFlag = preg_match($regex, $_password);
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則檢驗
        if ($accFlag !== 1 or $pwFlag !== 1) {
            $arr['msg'] = 'backend regex not pass';
            return json_encode($arr);
        }

        ## 帳密比對
        $stmt = $this->conn->prepare("SELECT password, permission FROM `member` WHERE account = ?;");
        $stmt->bind_param("s", $_account);
        $stmt->execute();
        $stmt->bind_result($password, $permission);
        $stmt->fetch();
        $stmt->close();
        $verify = password_verify($_password, $password);
        if ($verify === false) {
            $arr["msg"] = "not correspond";
            return json_encode($arr);
        }

        ## token上傳DB
        $setToken = $this->setToken($_account);
        if ($setToken["status"] === false) {
            $arr["msg"] = "update token fail";
            return json_encode($arr);
        }

        setcookie("token", $setToken["token"], 0, "/");
        $arr["status"] = true;
        $arr["msg"] = "";
        $arr["token"] = $setToken["token"];

        return json_encode($arr);
    }

    /**
     * 登出在Token class裡
     */

    /**
     * 儲值
     */
    function deposit($_request)
    {
        $regex = "/^[0-9]*$/";
        $_amount = $_request["amount"];
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 正則驗證
        if (!preg_match($regex, $_amount)) {
            $arr["msg"] = "set regex not pass";
            return json_encode($arr);
        }

        ## 確認token是否對應使用者
        $result = $this->checkToken();
        if (!$result["status"]) {
            $arr["msg"] = "token not match";
            return json_encode($arr);
        } elseif ($result["permission"] === 0) {
            $arr["msg"] = "guest not allowed";
            return json_encode($arr);
        }

        ## 確認使用者，將金額異動更新至member.cash
        $amount = $result["cash"] + $_amount;
        $stmt = $this->conn->prepare("UPDATE `member` SET `cash`= ? WHERE `account`= ?");
        $stmt->bind_param("is", $amount, $result["account"]);
        if (!$stmt->execute()) {
            $arr["msg"] = "DB cash update fail";
            return json_encode($arr);
        }

        ## 儲值紀錄寫進deposit
        date_default_timezone_set('Asia/Taipei');
        $datetime = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO `deposit` (`member_id`,`amount`,`create_at`) 
                VALUES ((SELECT `id` FROM `member` WHERE `account` = ?),?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sis", $result["account"], $_amount, $datetime);
        if (!$stmt->execute()) {
            $arr["msg"] = "DB deposit insert fail";
            return json_encode($arr);
        }

        $arr["status"] = true;
        $arr["msg"] = "";
        $arr["cash"] = $amount;

        return json_encode($arr);
    }

    /**
     * 管理:會員停權
     */
    function manager_member($request)
    {
        $id = $request["id"];
        $permission = $request["permission"];
        $arr = [
            'status' => false,
            'msg' => '',
        ];

        ## 檢查權限
        if (!$this->manager_verify()) {
            $arr["msg"] = "Permission denied";
            return json_encode($arr);
        }

        ## 更改權限
        $sql = "UPDATE `member` SET `permission` = ? WHERE `member`.`id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $permission, $id);
        if (!$stmt->execute()) {
            $arr["msg"] = "Permission update fail";
            return json_encode($arr);
        }
        $arr["status"] = true;
        return json_encode($arr);
    }
}