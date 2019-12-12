<?php
/* Smarty version 3.1.33, created on 2019-12-12 08:42:36
  from 'C:\xampp\htdocs\movie\templates\record.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1ef6c5a6892_28391618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f41b5ccf0648565da5f2bacf309e1bd8eaf88065' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\record.tpl',
      1 => 1576136554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5df1ef6c5a6892_28391618 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" type="text/css" href="css/record.css">

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
    <?php } elseif (isset($_smarty_tpl->tpl_vars['DBissue']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("資料異常! 請通知管理員");
            window.location = "index.php";
        <?php echo '</script'; ?>
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

<div class="container">
    <div class="row">
        <div class="col-xs-10">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h2 class="panel-title">
                        訂單紀錄
                    </h2>
                </div>
                <ul class="list-group">

                    <?php if ($_smarty_tpl->tpl_vars['data']->value == "empty") {?>
                        <li class="list-group-item">
                            <h3>尚無購買紀錄</h3>
                        </li>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <li class="list-group-item">
                                <h3><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['create_at'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</h3>
                                <h3><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
(<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['event_date'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['event_time'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
)</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>票種</th>
                                            <th>張數</th>
                                            <th>小記</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value["ticket"], 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>
                                            <tr>
                                                <td class="col-md-9"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['type'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                                                <td class="col-md-1"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['sheet'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                                                <td class="col-md-4 subtotal"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['subtotal'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</td>
                                            </tr>
                                       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                                <p class="col-md-offset-10">總計: <span class="total"><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['amount'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</span></p>
                            </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </ul>
            </div>
            <div class="text-center">
                <ul class="pagination">
                    <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pages']->value)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['num']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                            <li class="active page"><a><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</a></li>
                        <?php } else { ?>
                            <li class="page"><a href="record.php?page=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
</a></li>
                        <?php }?>
                    <?php }
}
?>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
