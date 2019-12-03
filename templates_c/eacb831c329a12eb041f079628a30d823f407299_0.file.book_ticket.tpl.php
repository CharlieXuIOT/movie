<?php
/* Smarty version 3.1.33, created on 2019-12-03 11:24:15
  from 'C:\xampp\htdocs\movie\templates\book_ticket.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de5d55fc84565_12815307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eacb831c329a12eb041f079628a30d823f407299' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\book_ticket.tpl',
      1 => 1575343438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5de5d55fc84565_12815307 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="js/book_ticket.js"><?php echo '</script'; ?>
>
</head>
<body>
<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


<main>
    <div class="basket">
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">票種</li>
                <li class="price">價錢</li>
                <li class="quantity">數量</li>
                <li class="subtotal">小計</li>
            </ul>
        </div>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>
        <div class="basket-product">
            <div class="item">
                <div class="product-details">
                    <h1><strong class="ticketType"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['type'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</strong></h1>
                    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['description'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</p>
                </div>
            </div>
            <div class="price"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ticket']->value['price'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</div>
            <div class="quantity">
                <select>
                    <option selected="selected">0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="subtotal">0</div>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <div class="col-md-2 pull-right">
            <button class="goSeat">開始選位 <span class="glyphicon glyphicon-arrow-right"></span></button>
        </div>
    </div>

    <aside>
        <div class="summary">
            <div class="summary-total">
                <div class="total-title">電影名稱</div>
            </div>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_tw'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</p>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_en'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</p>

            <div class="summary-total">
                <div class="total-title">場次時間</div>
            </div>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['date'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['time'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</p>


            <div class="summary-total">
                <div class="total-title">票種/數量</div>
            </div>

            <div class="whatubuy">
            </div>

            
            <div class="summary-total">
                <div class="total-title">總計</div>
                <div class="total-value final-value" id="basket-total">0</div>
            </div>
        </div>
    </aside>
</main>

</body>
</html><?php }
}
