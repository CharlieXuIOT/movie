<?php

/**
 * Example Application
 *
 * @package Example-application
 */
require 'libs/Smarty.class.php';
require 'php/classTest/mysql_connect.php';
require 'php/classTest/Member.php';
require 'php/classTest/Post.php';

$smarty = new Smarty;
$member = new Member($conn);
$post = new Post($conn);
// $smarty->force_compile = true;
$smarty->debugging = true;
// $smarty->caching = true;
$smarty->cache_lifetime = 120;

## navbar data
$result = $member->checkToken();
if ($result["status"] === false) {
    ## token比對使用者失敗，前端重新登入
    $smarty->assign("tokenCheckFail", 1);
} elseif ($result["permission"] === 0 || $result["permission"] === -1) {
    ## 遊客或者被停權會員
    $smarty->assign("permissionDeny", 1);
} else {
    $smarty->assign("navbar", $result);
    ## 先檢查event參數
    $regex = "/^[0-9]*$/";
    if (!isset($_GET["event"]) || !preg_match($regex, $_GET["event"])) {
        $smarty->assign("flag_eventID", 1);
    } else {
        ## call 撈資料 function
        $data = $post->book_ticket($_GET["event"]);
        ## 錯誤訊息處理
        if ($data["status"] === false) {
            if ($data["msg"] === "event id not correspond") {
                ## id沒有對應場次
                $smarty->assign("flag_eventID", 1);
            } elseif ($data["msg"] === "play time is passed") {
                ## 已播映完畢
                $smarty->assign("flag_eventTime", 1);
            }
        } else {
            ## 正確訊息 綁定參數
            $smarty->assign("movieinfo", $data["movieinfo"]);
            $smarty->assign("tickets", json_decode($_COOKIE["ticket"], true));
            $smarty->assign("seats", json_decode($_COOKIE["seats"], true));
            $smarty->assign("total", $_COOKIE["total"]);
        }
    }

}
// https://speckyboy.com/free-shopping-cart-css-javascript/
$smarty->display('book_checkout.tpl');