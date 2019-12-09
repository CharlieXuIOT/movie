<?php
require_once ('classTest/mysql_connect.php');
require_once ('classTest/Book.php');
require_once ('classTest/Member.php');
require_once ('classTest/Post.php');

$book = new Book($conn);

if (isset($_POST["action"])) {
    // if (method_exists($book, $_POST["action"])) {
    //     echo $book->{$_POST["action"]}($_POST);
    // }
}