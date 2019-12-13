<?php
require_once ('classTest/mysql_connect.php');
require_once ('classTest/Book.php');
require_once ('classTest/Member.php');
require_once ('classTest/Display.php');
require_once ('classTest/Manager.php');

$book = new Book($conn);
$member = new Member($conn);
$display = new Display($conn);
$manager = new Manager($conn);
$object_arr = array($book, $member, $display, $manager);
$return_arr = [
    'status' => false,
    'msg' => '',
];
$exist = false;
$action = strtolower($_SERVER['REQUEST_METHOD']) . '_' . $_REQUEST["action"];

## check action exist or not
if (isset($_REQUEST["action"])) {
    foreach ($object_arr as $item) {
        if (!$exist) {
            if (method_exists($item, $action)) {
                echo $item->{$action}($_REQUEST);
                // echo $item."->".$action;
                $exist = true;
            }
        }
    }

    if (!$exist) {
        $return_arr["msg"] = "Please check action correspond";
        echo json_encode($return_arr);
    }

} else {
    $return_arr["msg"] = "Please check action isset";
    echo json_encode($return_arr);
}