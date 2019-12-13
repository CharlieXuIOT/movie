<?php


class Token
{
    protected $conn;
    private static $permission = null;
    protected $return_arr = [
        'status' => false,
        'msg' => '',
    ];

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
        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d G:i:s");
        $stmt = $this->conn->prepare("UPDATE `member` SET `token` = ?, `last_login` = ? WHERE `account` = ?");
        $stmt->bind_param("sss", $hash_account, $date, $account);
        if ($stmt->execute()) {
            $return_arr["status"] = true;
            $return_arr["token"] = $hash_account;
        } else {
            $return_arr["status"] = false;
        }
        return $return_arr;
    }

    /**
     * 用token確認使用者的登入狀態、帳號、權限
     */
    function checkToken()
    {
        ## 遊客或已登出會員，cookie裡面沒有token
        if (!isset($_COOKIE["token"])) {
            $return_arr["status"] = true;
            $return_arr["msg"] = "";
            $return_arr["account"] = "guest";
            $return_arr["permission"] = 0;
            return $return_arr;
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
            $return_arr["status"] = false;
            $return_arr["msg"] = "NULL";
            setcookie("token", "", time()-3600, "/");
        } else {
            $return_arr["status"] = true;
            $return_arr["msg"] = "";
            $return_arr["account"] = $account;
            $return_arr["permission"] = $permission;
            $return_arr["cash"] = $cash;
        }
        self::$permission = $return_arr["permission"];
        return $return_arr;
    }

    /**
     * 登出 清除token
     */
    function post_logout()
    {
        $query = 'UPDATE `member` SET `token` = "" WHERE `token` = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $_COOKIE["token"]);
        if ($stmt->execute()) {
            setcookie("token", "", time()-1, "/");
            $return_arr["status"] = true;
            $return_arr["msg"] = "";
        } else {
            $return_arr["status"] = false;
            $return_arr["msg"] = "SQL update error";
        }
        return json_encode($return_arr);
    }

    /**
     * 清除cookie中有關訂票的暫存
     */
    function cleanBookCookie()
    {
        $cookie_arr = array("ticket", "count", "total", "seats");
        foreach ($cookie_arr as $item) {
            if (isset($_COOKIE[$item])) {
                setcookie($item, "", time()-1, "/");
            }
        }
        return "ok";
    }

    /**
     * 仿中介層:驗證管理者
     */
    function manager_verify()
    {
        if (self::$permission === null) {
            $this->checkToken();
        }

        if (self::$permission === 2) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 仿中介層:驗證會員(包括管理者)
     */
    function member_verify()
    {
        if (self::$permission === null) {
            $this->checkToken();
        }

        if (self::$permission >= 1) {
            return true;
        } else {
            return false;
        }
    }
}