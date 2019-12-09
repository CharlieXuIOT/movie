<?php
/* Smarty version 3.1.33, created on 2019-12-09 15:51:48
  from 'C:\xampp\htdocs\movie\templates\book_seat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dedfd146fdc14_12722799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34b8b65e5f2d57a91d9fb506d737cb0a96164b41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\book_seat.tpl',
      1 => 1575877820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5dedfd146fdc14_12722799 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" type="text/css" href="css/book_ticket.css">
    <link rel="stylesheet" type="text/css" href="css/book_seat.css">

    <?php if (isset($_smarty_tpl->tpl_vars['tokenCheckFail']->value)) {?>
        <?php echo '<script'; ?>
 src="js/tokenCheckFail.js"><?php echo '</script'; ?>
>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['permissionDeny']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("權限不足");
            window.location = "index.php";
        <?php echo '</script'; ?>
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
    <?php } elseif (isset($_smarty_tpl->tpl_vars['flag_ticket']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("尚未選擇票種數量!");
            window.location = "index.php";
        <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/book_seat.js"><?php echo '</script'; ?>
>
</head>
<body>
<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

<div class="row">
    <div class="col-md-5 col-md-offset-4">
        <span class="col-md-offset-1">還有 <a style="display: inline" id="waitBook"><?php ob_start();
echo $_smarty_tpl->tpl_vars['waitBook']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</a> 個座位待劃位</p>
        <br>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 9+1 - (1) : 1-(9)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <div class="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
" class="col-md-offset-2">
                <span style="float: left"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
排</span>
                    <?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? 9+1 - (1) : 1-(9)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 1, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration === 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration === $_smarty_tpl->tpl_vars['j']->total;?>
                        <?php if (isset($_smarty_tpl->tpl_vars['all']->value['seats'][$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value])) {?>
                            <button type="button" class="btn btn-danger seat-sold"><?php ob_start();
echo $_smarty_tpl->tpl_vars['j']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-default"><?php ob_start();
echo $_smarty_tpl->tpl_vars['j']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</button>
                        <?php }?>
                    <?php }
}
?>
                <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
排</span>
                <br><br>
            </div>
        <?php }
}
?>
        <div class="col-md-offset-5">
            <button type="button" class="btn btn-primary seat-sold" id="checkout">結帳</button>
        </div>
    </div>
</div>

</body>
</html><?php }
}
