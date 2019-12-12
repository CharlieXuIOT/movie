<?php
/* Smarty version 3.1.33, created on 2019-12-12 07:23:07
  from 'C:\xampp\htdocs\movie\templates\manager_addevent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1dccbafbc42_78984634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11efcb9cd750824162faa726e2e67690776c5a6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\manager_addevent.tpl',
      1 => 1576131747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5df1dccbafbc42_78984634 (Smarty_Internal_Template $_smarty_tpl) {
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

    <!-- Bootstrap Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"><?php echo '</script'; ?>
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
    <?php echo '<script'; ?>
 src="js/manager_addevent.js"><?php echo '</script'; ?>
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

<div class="container" style="width: 500px">
    <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading">
                新增電影場次
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label for="movie">選擇電影</label>
                    <select class="form-control" id="movie">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movie']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['name_tw'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">選擇日期</label>
                    <input type="date" class="form-control" id="date">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">選擇時間</label>
                    <input type="time" class="form-control" id="time">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info">新增</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
