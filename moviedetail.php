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

    ## id不存在或是正則驗證不符
    $regex = "/^[0-9]*$/";
    if (!isset($_GET["id"]) || !preg_match($regex, $_GET["id"])) {
        header('Location: index.php');
    }
    $movieDetail = $post->moviedetail($_GET["id"]);
    if ($movieDetail["status"] === false) {
        header('Location: index.php');
    }
    $smarty->assign("movieinfo", $movieDetail["movieinfo"]);
    ## 有這部電影，但沒有上映時間
    if (isset($movieDetail["time"])){
        $smarty->assign("times", $movieDetail["time"]);
    }

    ## 生成有最近7天日期的方法
    date_default_timezone_set('Asia/Taipei');
    for($i=0;$i<6;$i++){
        ## https://www.jb51.net/article/142318.htm
        $dates[] = date('Y-m-d',strtotime('+' . $i .' days'));
    };
    $smarty->assign("dates", $dates);


}
$smarty->display('moviedetail.tpl');