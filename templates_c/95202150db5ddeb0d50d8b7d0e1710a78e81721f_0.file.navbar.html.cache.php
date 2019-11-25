<?php
/* Smarty version 3.1.33, created on 2019-11-25 09:42:17
  from 'C:\xampp\htdocs\movie\templates\navbar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddb93e9f1e090_85364861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95202150db5ddeb0d50d8b7d0e1710a78e81721f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.html',
      1 => 1574670051,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddb93e9f1e090_85364861 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '8446963595ddb93e9f1d618_79935913';
?>
<nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Message Board</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="navAdmin" class="hidden"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                <li><a id="navRegister" href="register.html" class="hidden"><span
                        class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a id="navLogin" href="login.html" class="hidden"><span
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
