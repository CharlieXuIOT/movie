<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'libs/Smarty.class.php';
require 'php/classTest/mysql_connect.php';
require 'php/classTest/Post.php';

$smarty = new Smarty;
$post = new Post($conn);
// $smarty->force_compile = true;
$smarty->debugging = true;
// $smarty->caching = true;
$smarty->cache_lifetime = 120;

## navbar data
$result = $post->checkToken();
if ($result["status"] === false) {
    ## token比對使用者失敗，前端重新登入
    $smarty->assign("tokenCheckFail", 1);
} elseif ($result["permission"] < 2) {
    ## 遊客和一般會員
    $smarty->assign("permissionDeny", 1);
} else {
    $smarty->assign("navbar", $result);

    ## 分析網址參數
    if (isset($_GET["quick"])) {
        if (isset($_GET["page"])) {
            $member = $post->manager_member($_GET["quick"], $_GET["page"]);
        } else {
            $member = $post->manager_member($_GET["quick"], "1");
        }
    } else {
        if (isset($_GET["page"])) {
            $member = $post->manager_member("0", $_GET["page"]);
        } else {
            $member = $post->manager_member("0", "1");
        }
    }
    // $member = $post->manager_member();
    $smarty->assign("members", $member["data"]);
    $smarty->assign("pages", $member["pages"]);
    $smarty->assign("page", $member["page"]);
}

$smarty->display('manager_member.tpl');