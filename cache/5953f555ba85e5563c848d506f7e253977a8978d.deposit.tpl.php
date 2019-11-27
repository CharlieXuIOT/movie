<?php
/* Smarty version 3.1.33, created on 2019-11-27 04:09:22
  from 'C:\xampp\htdocs\movie\templates\deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddde8e24ae2c8_96475435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f56bbb4486edc8de4303aeba0bac0a0f697890fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\deposit.tpl',
      1 => 1574820417,
      2 => 'file',
    ),
    '8f60cb02fcd1980582db3c6b2005119fc2dea169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.tpl',
      1 => 1574818017,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ddde8e24ae2c8_96475435 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <script src="js/navbar.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                
                
                                    <li><a id="navAccount">Welcome, 147 </a></li>
                    <li>
                        <a id="navCash" href="deposit.php"><span
                                    class="glyphicon glyphicon-usd"></span> 0 </a>
                    </li>
                    <li>
                        <a id="navLogout" href=""><span
                                    class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                            </ul>
        </div>
    </div>
</nav>
    <p>儲值頁面</p>
    <select>
        　<option value="100">100</option>
        　<option value="200">200</option>
        　<option value="500">500</option>
        　<option value="1000">1000</option>
    </select>
    <button>給我錢</button>
</body>
</html><?php }
}
