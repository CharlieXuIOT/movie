<?php
/* Smarty version 3.1.33, created on 2019-11-27 03:07:02
  from 'C:\xampp\htdocs\movie\templates\deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dddda4661e0f7_94804084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f56bbb4486edc8de4303aeba0bac0a0f697890fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\deposit.tpl',
      1 => 1574820417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5dddda4661e0f7_94804084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '5131839915dddda465d7926_07431945';
?>
<!doctype html>
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

    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
</head>
<body>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

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
