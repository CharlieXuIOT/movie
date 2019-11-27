<?php
require_once ("classTest/mysql_connect.php");
require_once ("classTest/Member.php");

$member = new Member($conn);

// switch ($_POST["action"]) {
//     case "login":
//         echo $member->login($_POST["account"], $_POST["password"]);
//         break;
//
//     case "register":
//         echo $member->register($_POST["account"], $_POST["password"]);
//         break;
//
//     case "logout":
//         echo $member->clearToken();
//         break;
// }

if (isset($_POST["action"])) {
    echo $member->{$_POST["action"]}($_POST);
}