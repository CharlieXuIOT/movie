<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'libs/Smarty.class.php';
require 'php/classTest/mysql_connect.php';
require 'php/classTest/Member.php';

$smarty = new Smarty;
$member = new Member($conn);
// $smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
// $smarty->assign("FirstName", array("John", "Mary", "James", "Henry"));

## navbar data
if (isset($_COOKIE["token"])) {
    $result = $member->checkToken($_COOKIE["token"]);
} else {
    header('Location: login.php');
}
$smarty->assign("navbar", $result);

$smarty->display('deposit.tpl');
