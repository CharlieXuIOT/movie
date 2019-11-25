<?php
/* Smarty version 3.1.33, created on 2019-11-25 09:42:40
  from 'C:\xampp\htdocs\movie\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddb940084c3a1_03118195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cfe9969e84220248f9827bff4b4ea8eea8db80d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\index.html',
      1 => 1574671359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.html' => 1,
  ),
),false)) {
function content_5ddb940084c3a1_03118195 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '9611312355ddb9400824b95_45960501';
?>
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
</head>
<body>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

</body>
</html><?php }
}
