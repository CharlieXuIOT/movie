<?php
require_once ("classTest/mysql_connect.php");
require_once ("classTest/Member.php");
require_once ("classTest/Token.php");

$member = new Member($conn);
$token = new Token($conn);

switch ($_POST["action"]) {
    // case "navbar":
    //     ## navbar();
    //     echo $member->navbar();
    //     break;

    case "login":
        echo $member->login($_POST["account"], $_POST["password"]);
        break;

    case "register":
        echo $member->register($_POST["account"], $_POST["password"]);
        break;

    case "logout":
        echo $token->clearToken();
        break;
}