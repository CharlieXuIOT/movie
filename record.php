<?php
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
} elseif ($result["permission"] === 0 || $result["permission"] === -1) {
    ## 遊客或者被停權會員
    $smarty->assign("permissionDeny", 1);
} else {
    $smarty->assign("navbar", $result);

    ## 分頁判斷
    if (!isset($_GET["page"])) {
        $page = 1;
    } else {
        $page = $_GET["page"];
    }
    $record = $post->record($page);
    if ($record["status"]) {
        ## 會員是否有購買紀錄
        if ($record["msg"] === "") {
            ## 有購買紀錄，陣列取出資料
            $smarty->assign("data", $record["data"]);
            $smarty->assign("page", $record["page"]);
            $smarty->assign("pages", $record["pages"]);
        } else {
            ## 沒有購買紀錄
            $smarty->assign("data", "empty");
        }
    } else {
        $smarty->assign("DBissue", 1);
    }
}

$smarty->display('templates/record.tpl');