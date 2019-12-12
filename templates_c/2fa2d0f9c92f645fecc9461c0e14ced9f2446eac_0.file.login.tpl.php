<?php
/* Smarty version 3.1.33, created on 2019-12-12 09:05:23
  from 'C:\xampp\htdocs\movie\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1f4c3b16a21_72978107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fa2d0f9c92f645fecc9461c0e14ced9f2446eac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\login.tpl',
      1 => 1576137918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df1f4c3b16a21_72978107 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- jquery -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>

    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
<div class="test">
    <div class="test2">
        <div class="col-md-6 login-form-2">
            <a href="index.php"><img src="img/ayaya.jpg"></a>
            <h3>登入</h3>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" id="account" placeholder="帳號" value="" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="密碼" value="" />
            </div>
            <div class="form-group">
                <input type="button" class="btnSubmit pull-left" id="Login" value="登入"/>
                <input type="button" class="btnSubmit" onclick="location.href='register.php'" value="前往註冊頁" />
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="js/login.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
