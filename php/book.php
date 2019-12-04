<?php

require_once("classTest/mysql_connect.php");
require_once("classTest/Book.php");

$book = new Book($conn);

if (isset($_POST["action"])) {
    echo $book->{$_POST["action"]}($_POST);
}