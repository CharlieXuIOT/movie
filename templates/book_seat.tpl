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
    <link rel="stylesheet" type="text/css" href="css/book_ticket.css">
    <link rel="stylesheet" type="text/css" href="css/book_seat.css">

    {if isset($tokenCheckFail)}
        <script src="js/tokenCheckFail.js"></script>
    {elseif isset($flag_eventID)}
        <script>
            alert("查無此場次資訊!");
            window.location = "index.php";
        </script>
    {elseif isset($flag_eventTime)}
        <script>
            alert("本場次已播映完畢!");
            window.location = "index.php";
        </script>
    {elseif isset($flag_ticket)}
        <script>
            alert("尚未選擇票種數量!");
            window.location = "index.php";
        </script>
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/book_seat.js"></script>
</head>
<body>
{{include file="navbar.tpl"}}
<div class="row">
    <div class="col-md-5 col-md-offset-4">
        <span class="col-md-offset-1">還有 <a style="display: inline" id="waitBook">{{$waitBook}}</a> 個座位待劃位</p>
        <br>
        {for $i=1 to 9}
            <div class="{{$i}}" class="col-md-offset-2">
                <span style="float: left">{{$i}}排</span>
                    {for $j=1 to 9}
                        {if isset($all.seats.$i.$j)}
                            <button type="button" class="btn btn-danger seat-sold">{{$j}}</button>
                        {else}
                            <button type="button" class="btn btn-default">{{$j}}</button>
                        {/if}
                    {/for}
                <span>{{$i}}排</span>
                <br><br>
            </div>
        {/for}
        <div class="col-md-offset-5">
            <button type="button" class="btn btn-primary seat-sold" id="checkout">結帳</button>
        </div>
    </div>
</div>

</body>
</html>