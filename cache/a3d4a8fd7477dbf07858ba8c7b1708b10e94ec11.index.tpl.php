<?php
/* Smarty version 3.1.33, created on 2019-11-25 11:12:09
  from 'C:\xampp\htdocs\movie\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddba8f90f20e4_74772371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a11f830d81e67a22e019c21787119d10c84c82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\index.tpl',
      1 => 1574672976,
      2 => 'file',
    ),
    '8f60cb02fcd1980582db3c6b2005119fc2dea169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.tpl',
      1 => 1574676725,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ddba8f90f20e4_74772371 (Smarty_Internal_Template $_smarty_tpl) {
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
                <a class="navbar-brand" href="index.html">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="navAdmin" class="hidden"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                <li><a id="navRegister" href="register.html"><span
                        class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a id="navLogin" href="login.php"><span
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
    <p>this is lobby</p>
</body>
</html><?php }
}
