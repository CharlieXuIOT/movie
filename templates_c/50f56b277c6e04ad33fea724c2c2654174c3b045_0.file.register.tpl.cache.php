<?php
/* Smarty version 3.1.33, created on 2019-12-06 03:46:45
  from 'C:\xampp\htdocs\movie\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de9c1154e2a31_35874773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50f56b277c6e04ad33fea724c2c2654174c3b045' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\register.tpl',
      1 => 1575600405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de9c1154e2a31_35874773 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '8849112455de9c115484594_97559246';
?>
<!DOCTYPE html>
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

    <?php echo '<script'; ?>
 src="js/register.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="test">
    <div class="test2">
        <div class="col-md-6 login-form-2">
            <a href="index.php"><img src="img/ayaya.jpg"></a>
            <h3>註冊</h3>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" id="account" placeholder="帳號(須為3碼以上的英文或數字)" value="" />
                <p id="accEr" class="errorMsg"></p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="密碼(須為3碼以上的英文或數字)" value="" />
                <p id="pwEr" class="errorMsg"></p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password2" placeholder="確認密碼" value="" />
                <p id="pw2Er" class="errorMsg"></p>
            </div>
            <div class="form-group">
                <input type="button" class="btnSubmit pull-left" id="Register" value="註冊"/>
                <input type="button" class="btnSubmit" onclick="location.href='login.php'" value="前往登入頁" />
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
