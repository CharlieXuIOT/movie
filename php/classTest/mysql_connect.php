<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_dbname = "movie";

## 创建连接
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_dbname);
## Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// // 錯誤處理
// try {
//     // 連線資料庫
//     $conn = new PDO("mysql:host=$db_servername;dbname=$db_dbname;charset=utf8;"
//                     ,$db_username,$db_password);
// } catch (PDOException $e) {
//     die ("Error!: " . $e->getMessage() . "<br/>");
// }