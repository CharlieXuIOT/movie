<?php
/* Smarty version 3.1.33, created on 2019-12-04 14:57:54
  from 'C:\xampp\htdocs\movie\templates\book_checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de758f26290a3_56282507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9a7dda71b8b7e2a75871a74b7582b556f33a0f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\book_checkout.tpl',
      1 => 1575440319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5de758f26290a3_56282507 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" type="text/css" href="css/book_checkout.css">

    <?php if (isset($_smarty_tpl->tpl_vars['tokenCheckFail']->value)) {?>
        <?php echo '<script'; ?>
 src="js/tokenCheckFail.js"><?php echo '</script'; ?>
>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['flag_eventID']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("查無此場次資訊!");
            window.location = "index.php";
        <?php echo '</script'; ?>
>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['flag_eventTime']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("本場次已播映完畢!");
            window.location = "index.php";
        <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/book_checkout.js"><?php echo '</script'; ?>
>
</head>
<body>
<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


<div class="summary">
    <div class="summary-total">
        <div class="total-title">電影名稱</div>
    </div>
    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_tw'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</p>
    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_en'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</p>

    <div class="summary-total">
        <div class="total-title">場次時間</div>
    </div>
    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['date'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['time'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</p>

    <div class="summary-total">
        <div class="total-title">票種/數量</div>
    </div>
    <div class="whatubuy">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['ticketType'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
 x <?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['quantity'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</p>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    <div class="summary-total">
        <div class="total-title">座位</div>
    </div>
    <div class="whereusit">
        <p>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seats']->value, 'seat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['seat']->value) {
?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['seat']->value['row'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
排<?php ob_start();
echo $_smarty_tpl->tpl_vars['seat']->value['number'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
號&nbsp
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </p>
    </div>

    <div class="summary-total">
        <div class="total-title">總計</div>
        <div class="total-value final-value" id="basket-total">$<?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</div>
    </div>
</div>

<br>

<div class="text-center">
    <button type="button" class="btn btn-primary" id="checkout">付款</button>
</div>

</body>
</html><?php }
}
