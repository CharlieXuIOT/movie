<?php
require_once ('classTest/mysql_connect.php');
require_once ('classTest/Book.php');
require_once ('classTest/Member.php');
// require_once ('classTest/Post.php');
require_once ('classTest/Manager.php');

$book = new Book($conn);
$member = new Member($conn);
// $post = new Post($conn);
$manager = new Manager($conn);
// $arr = array($book, $member, $post, $manager);
$arr = array($book, $member, $manager);
$exist = false;

$action = strtolower($_SERVER['REQUEST_METHOD']) . '_' . $_REQUEST["action"];

// post_manager_addevent
// post_manager_event
// echo $action;
// exit;

if (isset($_REQUEST["action"])) {
    foreach ($arr as $item) {
        if (!$exist) {
            if (method_exists($item, $action)) {
                print_r($item->{$_POST["action"]}($_POST));
                $exist = true;
            }
        }
    }

    if (!$exist) {
        echo "Please check action correspond";
        exit;
    }

} else {
    echo "Please check action isset";
    exit;
}