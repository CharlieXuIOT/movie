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
    <link rel="stylesheet" type="text/css" href="css/record.css">

    {if isset($tokenCheckFail)}
        <script src="js/tokenCheckFail.js"></script>
    {elseif isset($permissionDeny)}
        <script>
            alert("請先登入");
            window.location = "login.php";
        </script>
    {elseif isset($DBissue)}
        <script>
            alert("資料異常! 請通知管理員");
            window.location = "index.php";
        </script>
    {/if}
    <script src="js/navbar.js"></script>
</head>
<body>
{{include file="navbar.tpl"}}
<div class="container">
    <div class="row">
        <div class="col-xs-10">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h2 class="panel-title">
                        訂單紀錄
                    </h2>
                </div>
                <ul class="list-group">

                    {if $data == "empty"}
                        <li class="list-group-item">
                            <h3>尚無購買紀錄</h3>
                        </li>
                    {else}
                        {foreach $data as $item}
                            <li class="list-group-item">
                                <h3>{{$item.create_at}}</h3>
                                <h3>{{$item.name}}({{$item.event_date}} {{$item.event_time}})</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>票種</th>
                                            <th>張數</th>
                                            <th>小記</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $item["ticket"] as $ticket}
                                            <tr>
                                                <td class="col-md-9">{{$ticket.type}}</td>
                                                <td class="col-md-1">{{$ticket.sheet}}</td>
                                                <td class="col-md-4 subtotal">{{$ticket.subtotal}}</td>
                                            </tr>
                                       {/foreach}
                                    </tbody>
                                </table>
                                <p class="col-md-offset-10">總計: <span class="total">{{$item.amount}}</span></p>
                            </li>
                        {/foreach}
                    {/if}
                </ul>
            </div>
            <div class="text-center">
                <ul class="pagination">
                    {for $num=1 to $pages}
                        {if $num == $page}
                            <li class="active page"><a>{{$num}}</a></li>
                        {else}
                            <li class="page"><a href="record.php?page={{$num}}">{{$num}}</a></li>
                        {/if}
                    {/for}
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>