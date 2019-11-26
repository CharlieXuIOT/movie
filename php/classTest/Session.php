<?php


class Session
{
    /**
     * 告訴呼叫者目前的使用者和權限
     */
    function verify()
    {
        if (isset($_SESSION["account"]) === false) {
            ## 第一次訪問網站的遊客
            $_SESSION["account"] = "";
            $_SESSION["permission"] = 0;
        } elseif ($_SESSION["account"] === "") {
            $_SESSION["permission"] = 0;
        }
        $arr = array();
        $arr["account"] = $_SESSION["account"];
        $arr["permission"] = $_SESSION["permission"];
        return $arr;
    }

    /**
     *  賦值給session(login用)
     */
    function assign($account, $permission)
    {
        $_SESSION["account"] = $account;
        $_SESSION["permission"] = $permission;
    }
}