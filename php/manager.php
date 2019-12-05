<?php
require_once ("classTest/mysql_connect.php");
require_once ("classTest/Manager.php");

$manager = new Manager($conn);

if (isset($_POST["action"])) {
    echo $manager->{$_POST["action"]}($_POST);
}