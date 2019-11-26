<?php


class Token
{
    protected $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 每次登入時，將一個hash過的值寫入DB的token欄位
     */
    function setToken($account)
    {
        $hash_account = password_hash($account, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE `member` SET `token` = ? WHERE `account` = ?");
        $stmt->bind_param("ss", $hash_account, $account);
        if ($stmt->execute()) {
            $arr["status"] = true;
            $arr["token"] = $hash_account;
        } else {
            $arr["status"] = false;
        }
        return $arr;
    }

    /**
     * 用token確認使用者的登入狀態、帳號、權限
     */
    function checkToken($token)
    {
        ## 遊客或已登出會員，cookie裡面沒有token
        if ($token != "") {
            ## 接token查詢後獲得的帳號和權限
            $account = "";
            $permission = "";
            $cash = "";
            $stmt = $this->conn->prepare("SELECT `account`, `permission`, `cash` FROM `member` WHERE `token` = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $stmt->bind_result($account, $permission, $cash);
            $stmt->fetch();
            if ($account === NULL) {
                $arr["status"] = false;
                $arr["msg"] = "NULL";
            } else {
                $arr["status"] = true;
                $arr["msg"] = "";
                $arr["account"] = $account;
                $arr["permission"] = $permission;
                $arr["cash"] = $cash;
            }
        } else {
            $arr["status"] = true;
            $arr["msg"] = "";
            $arr["account"] = "guest";
            $arr["permission"] = 0;
        }
        return $arr;
    }

    /**
     * 登出清除token
     */
    function clearToken()
    {
        $query = 'UPDATE `member` SET `token` = "" WHERE `token` = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $_COOKIE["token"]);
        if ($stmt->execute()) {
            setcookie("token", "", time()-3600, "/");
            $arr["status"] = true;
            $arr["msg"] = "";
        } else {
            $arr["status"] = false;
            $arr["msg"] = "SQL update error";
        }
        return json_encode($arr);
    }
}