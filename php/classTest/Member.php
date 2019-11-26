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
    function register($account, $password)
    {
        $regex = "/^[A-Za-z0-9]{3,}$/";
        $accFlag = preg_match($regex, $account);
        $pwFlag = preg_match($regex, $password);

        if ($accFlag === 1 && $pwFlag === 1) {
            $stmt = $this->conn->prepare("INSERT INTO `member` (`account`,`password`,`permission`) VALUES (?,?,?)");
            $permission = 1;
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param("ssi", $account, $password, $permission);
            if ($stmt->execute()) {
                $arr["status"] = true;
                $arr["msg"] = "";
            } else {
                $arr["status"] = false;
                $arr["msg"] = "SQL connect error";
            }
        } else {
            $arr["status"] = false;
            $arr["msg"] = "backend regex not pass";
        }
        return json_encode($arr);
    }

    /**
     * 登入
     */
    function login($keyin_account, $keyin_password)
    {
        $regex = "/^[A-Za-z0-9]{3,}$/";
        $accFlag = preg_match($regex, $keyin_account);
        $pwFlag = preg_match($regex, $keyin_password);
        if ($accFlag === 1 && $pwFlag === 1) {
            ## 預處理
            $stmt = $this->conn->prepare("SELECT password, permission FROM `member` WHERE account = ?;");
            $stmt->bind_param("s", $keyin_account);

            ## 設置參數並執行
            $stmt->execute();
            $stmt->bind_result($password, $permission);
            $stmt->fetch();
            $stmt->close();

            $verify = password_verify($keyin_password, $password);
            if ($verify) {
                ## 帳密比對成功
                $setToken = $this->setToken($keyin_account);
                if ($setToken["status"]) {
                    setcookie("token", $setToken["token"], 0, "/");
                    $arr["status"] = true;
                    $arr["msg"] = "";
                    $arr["token"] = $setToken["token"];
                } else {
                    $arr["status"] = false;
                    $arr["msg"] = "update token fail";
                }
            } else {
                $arr["status"] = false;
                $arr["msg"] = "not correspond";
            }
        } else {
            $arr["status"] = false;
            $arr["msg"] = "backend regex not pass";
        }
        return json_encode($arr);
    }

    /**
     * 登出
     */
    function logout()
    {
        return $this->clearToken();
    }
}