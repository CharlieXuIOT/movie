<?php
/* Smarty version 3.1.33, created on 2019-11-27 03:55:04
  from 'C:\xampp\htdocs\movie\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddde58855ae73_00737236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a11f830d81e67a22e019c21787119d10c84c82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\index.tpl',
      1 => 1574823301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ddde58855ae73_00737236 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
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
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <?php if (isset($_smarty_tpl->tpl_vars['tokenCheckFail']->value)) {?>
        <?php echo '<script'; ?>
 src="js/tokenCheckFail.js"><?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
</head>
<body>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <div class="row article">
        <div class="movieList">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movieLists']->value, 'movieList');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['movieList']->value) {
?>
            <div class="col-xs-12 col-sm-12 col-md-4 movieItem">
                <div class="thumbnail">
                    <img src="img/<?php ob_start();
echo $_smarty_tpl->tpl_vars['movieList']->value['img'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                    <div class="caption">
                        <h3><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieList']->value['name_tw'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</h3>
                        <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieList']->value['name_en'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</p>
                        <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieList']->value['create_at'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</p>
                    </div>
                </div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <div class="pagebar">

        </div>

    </div>
</body>
</html><?php }
}
