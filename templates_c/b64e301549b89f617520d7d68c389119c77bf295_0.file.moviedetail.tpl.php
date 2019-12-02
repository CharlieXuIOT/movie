<?php
/* Smarty version 3.1.33, created on 2019-12-02 18:18:52
  from 'C:\xampp\htdocs\movie\templates\moviedetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de4e50c396742_15129847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b64e301549b89f617520d7d68c389119c77bf295' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\moviedetail.tpl',
      1 => 1575281867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5de4e50c396742_15129847 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="container">
    <div class="row col-md-11 col-md-offset-1">
        <div class="col-md-2">
            <img width="120" height="180" src="img/<?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['img'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
        </div>

        <div class="col-md-2">
            <h3><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_tw'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</h3>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['name_en'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</p>
            <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['createat'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
 上映</p>
        </div>

        <div class="col-md-8">
            <?php if (!isset($_smarty_tpl->tpl_vars['tabempty']->value)) {?>
            <ul class="nav nav-tabs">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_dates']->value, 'tab_date');
$_smarty_tpl->tpl_vars['tab_date']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab_date']->value) {
$_smarty_tpl->tpl_vars['tab_date']->index++;
$__foreach_tab_date_0_saved = $_smarty_tpl->tpl_vars['tab_date'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['tab_date']->index == 0) {?>
                        <li class="active"><a data-toggle="tab" href="#<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</a></li>
                    <?php } else { ?>
                        <li><a data-toggle="tab" href="#<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</a></li>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['tab_date'] = $__foreach_tab_date_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>

            <div class="tab-content">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_dates']->value, 'tab_date');
$_smarty_tpl->tpl_vars['tab_date']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab_date']->value) {
$_smarty_tpl->tpl_vars['tab_date']->index++;
$__foreach_tab_date_1_saved = $_smarty_tpl->tpl_vars['tab_date'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['tab_date']->index == 0) {?>
                        <div id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
" class="tab-pane fade in active"">
                    <?php } else { ?>
                        <div id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_date']->value;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
" class="tab-pane fade">
                    <?php }?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_times']->value, 'tab_time', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['tab_time']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['tab_date']->value == $_smarty_tpl->tpl_vars['key']->value) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_time']->value, 'tab_info');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab_info']->value) {
?>
                                    <h3>
                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_info']->value['time'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

                                        <?php if (isset($_smarty_tpl->tpl_vars['tab_info']->value['event_id'])) {?>
                                            <a href="book_ticket.php?event=<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_info']->value['event_id'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
">
                                                <button type="button" class="btn btn-success">訂票</button>
                                            </a>
                                        <?php }?>
                                    </h3>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['tab_date'] = $__foreach_tab_date_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <?php }?>

        </div>


    </div>
    <div class="row col-md-11 col-md-offset-1">
        <br><br>
        <iframe width="900" height="500" src="https://www.youtube.com/embed/<?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['videoURL'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>

    <div class="row col-md-10 col-md-offset-1">
        <hr>
        <h2>劇情簡介</h2><span>ABOUT THE STORY</span>
        <pre style="white-space: pre-wrap"><?php ob_start();
echo $_smarty_tpl->tpl_vars['movieinfo']->value['intro'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
</pre>
    </div>

</div>
<br><br><br><br>
</body>
</html><?php }
}
