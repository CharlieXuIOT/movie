<?php
/* Smarty version 3.1.33, created on 2019-11-27 02:29:22
  from 'C:\xampp\htdocs\movie\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dddd172a64073_97960795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a11f830d81e67a22e019c21787119d10c84c82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\index.tpl',
      1 => 1574758630,
      2 => 'file',
    ),
    '8f60cb02fcd1980582db3c6b2005119fc2dea169' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\navbar.tpl',
      1 => 1574818017,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5dddd172a64073_97960795 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <script src="js/navbar.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                
                
                                    <li><a id="navAccount">Welcome, 789 </a></li>
                    <li>
                        <a id="navCash" href="deposit.php"><span
                                    class="glyphicon glyphicon-usd"></span> 0 </a>
                    </li>
                    <li>
                        <a id="navLogout" href=""><span
                                    class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                            </ul>
        </div>
    </div>
</nav>
    <div class="row article">
        <div class="movieList">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail movieItem">
                    <img src="img/film_20191028050.jpg">
                    <div class="caption">
                        <h3>決戰中途島</h3>
                        <p>MIDWAY</p>
                        <p>2019-11-08</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagebar">

        </div>

    </div>
</body>
</html><?php }
}
