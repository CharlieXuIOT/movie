<!doctype html>
<html lang="en">
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

    {if isset($tokenCheckFail)}
        <script src="js/tokenCheckFail.js"></script>
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/deposit.js"></script>
</head>
<body>
    {{include file="navbar.tpl"}}
    <div class="container col-md-offset-5 col-md-2 input-group">
        <h1>儲值頁面</h1>
        <h1>
            <select class="form-control" id="amount" style="width:auto; float: left">
                　<option value="100">100</option>
                　<option value="200">200</option>
                　<option value="500">500</option>
                　<option value="1000">1000</option>
            </select>
            {*https://stackoverflow.com/questions/24573822/bootstrap-select-and-button-next-to-each-other*}
            <span class="input-group-btn">
                <button id="deposit" class="btn btn-info">給我錢</button>
            </span>

        </h1>
    </div>
</body>
</html>