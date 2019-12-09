<?php
/* Smarty version 3.1.33, created on 2019-12-09 09:09:18
  from 'C:\xampp\htdocs\movie\templates\manager_movie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dee012e780146_28671241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '796cd21d4abc9e87d9f5b56d597e4280774b2284' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\manager_movie.tpl',
      1 => 1575877820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5dee012e780146_28671241 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php } elseif (isset($_smarty_tpl->tpl_vars['permissionDeny']->value)) {?>
        <?php echo '<script'; ?>
>
            alert("權限不足");
            window.location = "index.php";
        <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/manager_movie.js"><?php echo '</script'; ?>
>

    <style>
        body {
            font-family: "微軟正黑體", sans-serif;
        }
    </style>
</head>
<body>
<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

<div class="container" style="max-width: 800px">
    <h2>電影上下架</h2>
    <table id="myTable" class="table order-list">
        <thead>
        <tr>
            <td class="col-md-8">影片名稱</td>
            <td class="col-md-2">影片狀態</td>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movies']->value, 'movie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['movie']->value) {
?>
            <tr id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['movie']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                <td class="col-md-8">
                    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['movie']->value['name_tw'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</p>
                </td>
                <td class="col-md-2">
                    <?php if (($_smarty_tpl->tpl_vars['movie']->value['status'] === "1")) {?>
                        <p style="color: green"><?php ob_start();
echo $_smarty_tpl->tpl_vars['movie']->value['level'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</p>
                    <?php } elseif (($_smarty_tpl->tpl_vars['movie']->value['status'] === "0")) {?>
                        <p style="color: red"><?php ob_start();
echo $_smarty_tpl->tpl_vars['movie']->value['level'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</p>
                    <?php }?>
                </td>
                <td class="col-md-2 switch">
                    <?php if (($_smarty_tpl->tpl_vars['movie']->value['status'] === "1")) {?>
                        <input type="button" class="btn btn-danger btnn suspend" value="下架">
                    <?php } elseif (($_smarty_tpl->tpl_vars['movie']->value['status'] === "0")) {?>
                        <input type="button" class="btn btn-info btnn lift" value="上架">
                    <?php }?>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
</body>
</html><?php }
}
