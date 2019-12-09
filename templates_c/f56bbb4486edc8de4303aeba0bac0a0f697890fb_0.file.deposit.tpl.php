<?php
/* Smarty version 3.1.33, created on 2019-12-09 08:50:54
  from 'C:\xampp\htdocs\movie\templates\deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dedfcde6eddc0_36390561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f56bbb4486edc8de4303aeba0bac0a0f697890fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\deposit.tpl',
      1 => 1575877820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5dedfcde6eddc0_36390561 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <?php if (isset($_smarty_tpl->tpl_vars['tokenCheckFail']->value)) {?>
        <?php echo '<script'; ?>
 src="js/tokenCheckFail.js"><?php echo '</script'; ?>
>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['permissionDeny']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("請先登入");
            window.location = "login.php";
        <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/deposit.js"><?php echo '</script'; ?>
>
</head>
<body>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <div class="container col-md-offset-5 col-md-2 input-group">
        <h1>儲值頁面</h1>
        <h1>
            <select class="form-control" id="amount" style="width:auto; float: left">
                　<option value="100">100</option>
                　<option value="200">200</option>
                　<option value="500">500</option>
                　<option value="1000">1000</option>
            </select>
                        <span class="input-group-btn">
                <button id="deposit" class="btn btn-info">給我錢</button>
            </span>

        </h1>
    </div>
</body>
</html><?php }
}
