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
    <link rel="stylesheet" type="text/css" href="css/book_checkout.css">

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
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/book_checkout.js"></script>
</head>
<body>
{{include file="navbar.tpl"}}

<div class="summary">
    <div class="summary-total">
        <div class="total-title">電影名稱</div>
    </div>
    <p>{{$movieinfo.name_tw}}</p>
    <p>{{$movieinfo.name_en}}</p>

    <div class="summary-total">
        <div class="total-title">場次時間</div>
    </div>
    <p>{{$movieinfo.date}} {{$movieinfo.time}}</p>

    <div class="summary-total">
        <div class="total-title">票種/數量</div>
    </div>
    <div class="whatubuy">
        {foreach $tickets as $ticket}
            <p>{{$ticket.ticketType}} x {{$ticket.quantity}}</p>
        {/foreach}
    </div>

    <div class="summary-total">
        <div class="total-title">座位</div>
    </div>
    <div class="whereusit">
        <p>
            {foreach $seats as $seat}
                {{$seat.row}}排{{$seat.number}}號&nbsp
            {/foreach}
        </p>
    </div>

    <div class="summary-total">
        <div class="total-title">總計</div>
        <div class="total-value final-value" id="basket-total">${{$total}}</div>
    </div>
</div>

<br>

<div class="text-center">
    <button type="button" class="btn btn-primary" id="checkout">付款</button>
</div>

</body>
</html>