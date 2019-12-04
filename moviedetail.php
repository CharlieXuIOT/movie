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

$result = $member->checkToken();
if ($result["status"] === false) {
    ## token比對使用者失敗，前端重新登入
    $smarty->assign("tokenCheckFail", 1);
} else {
    ## 進入此頁時刪掉訂票相關cookie(避免情形:使用者上筆訂票失敗，cookie留存)
    $post->cleanBookCookie();

    $smarty->assign("navbar", $result);

    ## id不存在或是正則驗證不符
    $regex = "/^[0-9]*$/";
    if (!isset($_GET["id"]) || !preg_match($regex, $_GET["id"])) {
        header('Location: index.php');
    }
    $movieDetail = $post->moviedetail($_GET["id"]);


    if ($movieDetail["status"] === false) {
        if ($movieDetail["msg"] === "empty") {
            ## 未上映或已下檔
            $smarty->assign("tabempty", 1);
        } else {
            ## id沒有對應的電影
            header('Location: index.php');
        }
    } else {
        $smarty->assign("tab_dates", $movieDetail["tab_date"]);
        $smarty->assign("tab_times", $movieDetail["tab_time"]);
    }
    $smarty->assign("movieinfo", $movieDetail["movieinfo"]);
}
$smarty->display('moviedetail.tpl');