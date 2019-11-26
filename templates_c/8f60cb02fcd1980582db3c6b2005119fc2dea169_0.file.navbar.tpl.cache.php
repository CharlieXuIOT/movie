<?php
/* Smarty version 3.1.33, created on 2019-11-26 10:24:35
  from 'C:\xampp\htdocs\movie\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddcef530e7eb0_00165305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f60cb02fcd1980582db3c6b2005119fc2dea169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.tpl',
      1 => 1574760011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddcef530e7eb0_00165305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4624980975ddcef530adc47_21246253';
?>
<nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['navbar']->value['permission'];
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_prefixVariable1;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == 2) {?>
                    <li><a id="navAdmin"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                <?php }?>

                <?php ob_start();
echo $_smarty_tpl->tpl_vars['navbar']->value['permission'];
$_prefixVariable3 = ob_get_clean();
ob_start();
echo $_prefixVariable3;
$_prefixVariable4 = ob_get_clean();
if ($_prefixVariable4 == 0) {?>
                    <li><a id="navRegister" href="register.html"><span
                                    class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a id="navLogin" href="login.php"><span
                                    class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }?>

                <?php ob_start();
echo $_smarty_tpl->tpl_vars['navbar']->value['permission'];
$_prefixVariable5 = ob_get_clean();
ob_start();
echo $_prefixVariable5;
$_prefixVariable6 = ob_get_clean();
if ($_prefixVariable6 == 1) {?>
                    <li><a id="navAccount">Welcome, <?php ob_start();
echo $_smarty_tpl->tpl_vars['navbar']->value['account'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
 </a></li>
                    <li>
                        <a id="navCash" href="deposit.php"><span
                                    class="glyphicon glyphicon-usd"></span> <?php ob_start();
echo $_smarty_tpl->tpl_vars['navbar']->value['cash'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
 </a>
                    </li>
                    <li>
                        <a id="navLogout" href=""><span
                                    class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav><?php }
}
