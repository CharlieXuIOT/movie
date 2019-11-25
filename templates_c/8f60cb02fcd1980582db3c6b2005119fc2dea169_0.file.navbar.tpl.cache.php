<?php
/* Smarty version 3.1.33, created on 2019-11-25 11:12:09
  from 'C:\xampp\htdocs\movie\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddba8f90d4679_47422195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f60cb02fcd1980582db3c6b2005119fc2dea169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.tpl',
      1 => 1574676725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddba8f90d4679_47422195 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4167488395ddba8f90a4644_95514408';
?>
<nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="navAdmin" class="hidden"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                <li><a id="navRegister" href="register.html"><span
                        class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a id="navLogin" href="login.php"><span
                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a id="navAccount" class="hidden"></a></li>
                <li><a id="navUpload" href="upload.html" class="hidden"><span
                        class="glyphicon glyphicon-upload"></span> Up</a></li>
                <li><a id="navNew" href="new.html" class="hidden"><span class="glyphicon glyphicon-plus"></span>
                    New</a></li>
                <li><a id="navLogout" href="javascript: return false;" class="hidden"><span
                        class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav><?php }
}
