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
} else {
    $smarty->assign("navbar", $result);

    ## movieList data
    if (isset($_GET["page"])) {
        $movieLists = $post->index($_GET["page"]);
    } else {
        $movieLists = $post->index("1");
    }
    $smarty->assign("page", $movieLists["page"]);
    $smarty->assign("pages", $movieLists["pages"]);
    $smarty->assign("movieLists", $movieLists["data"]);
}
$smarty->display('index.tpl');