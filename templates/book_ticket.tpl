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
    <script src="js/book_ticket.js"></script>
</head>
<body>
{{include file="navbar.tpl"}}

<main>
    <div class="basket">
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">票種</li>
                <li class="price">價錢</li>
                <li class="quantity">數量</li>
                <li class="subtotal">小計</li>
            </ul>
        </div>

        {foreach $tickets as $ticket}
        <div class="basket-product">
            <div class="item">
                <div class="product-details">
                    <h1><strong class="ticketType">{{$ticket.type}}</strong></h1>
                    <p>{{$ticket.description}}</p>
                </div>
            </div>
            <div class="price">{{$ticket.price}}</div>
            <div class="quantity">
{*                <input type="number" value="4" min="1" class="quantity-field">*}
                <select>
                    <option selected="selected">0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="subtotal">0</div>
        </div>
        {/foreach}
        <div class="col-md-2 pull-right">
            <button class="goSeat">開始選位 <span class="glyphicon glyphicon-arrow-right"></span></button>
        </div>
    </div>

    <aside>
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

{*            <div class="summary-total-items">已訂購 <span class="total-items"></span> 張票</div>*}

            <div class="summary-total">
                <div class="total-title">票種/數量</div>
            </div>

            <div class="whatubuy">
            </div>

            
            <div class="summary-total">
                <div class="total-title">總計</div>
                <div class="total-value final-value" id="basket-total">0</div>
            </div>
        </div>
    </aside>
</main>

</body>
</html>