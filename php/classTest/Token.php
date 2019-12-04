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
    function checkToken()
    {
        ## 遊客或已登出會員，cookie裡面沒有token
        if (!isset($_COOKIE["token"])) {
            $arr["status"] = true;
            $arr["msg"] = "";
            $arr["account"] = "guest";
            $arr["permission"] = 0;
            return $arr;
        }

        ## 拿$_COOKIE["token"]查詢後獲得的帳號和權限
        $account = "";
        $permission = "";
        $cash = "";
        $stmt = $this->conn->prepare("SELECT `account`, `permission`, `cash` FROM `member` WHERE `token` = ?");
        $stmt->bind_param("s", $_COOKIE["token"]);
        $stmt->execute();
        $stmt->bind_result($account, $permission, $cash);
        $stmt->fetch();
        if ($account === NULL) {
            $arr["status"] = false;
            $arr["msg"] = "NULL";
            setcookie("token", "", time()-3600, "/");
        } else {
            $arr["status"] = true;
            $arr["msg"] = "";
            $arr["account"] = $account;
            $arr["permission"] = $permission;
            $arr["cash"] = $cash;
        }
        return $arr;
    }

    /**
     * 登出 清除token
     */
    function logout()
    {
        $query = 'UPDATE `member` SET `token` = "" WHERE `token` = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $_COOKIE["token"]);
        if ($stmt->execute()) {
            setcookie("token", "", time()-1, "/");
            $arr["status"] = true;
            $arr["msg"] = "";
        } else {
            $arr["status"] = false;
            $arr["msg"] = "SQL update error";
        }
        return json_encode($arr);
    }

    /**
     * 清除cookie中有關訂票的暫存
     */
    function cleanBookCookie()
    {
        $arr = array("ticket", "count", "total", "seats");
        foreach ($arr as $item) {
            if (isset($_COOKIE[$item])) {
                setcookie($item, "", time()-1, "/");
            }
        }
        return "ok";
    }
}