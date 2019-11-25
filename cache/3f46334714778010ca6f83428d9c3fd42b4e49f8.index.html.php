<?php
/* Smarty version 3.1.33, created on 2019-11-25 09:42:40
  from 'C:\xampp\htdocs\movie\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddb9400858c60_61217872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cfe9969e84220248f9827bff4b4ea8eea8db80d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\index.html',
      1 => 1574671359,
      2 => 'file',
    ),
    '95202150db5ddeb0d50d8b7d0e1710a78e81721f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.html',
      1 => 1574670051,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ddb9400858c60_61217872 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
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
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Message Board</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="navAdmin" class="hidden"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                <li><a id="navRegister" href="register.html" class="hidden"><span
                        class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a id="navLogin" href="login.html" class="hidden"><span
                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a id="navAccount" class="hidden"></a></li>
                <li><a id="navUpload" href="upload.html" class="hidden"><span
                        class="glyphicon glyphicon-upload"></span> Up</a></li>
                <li><a id="navNew" href="new.html" class="hidden"><span class="glyphicon glyphicon-plus"></span>
                    New</a></li>
                <li><a id="navLogout" href="javascript: return false;" class="hidden"><span
                        class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html><?php }
}
