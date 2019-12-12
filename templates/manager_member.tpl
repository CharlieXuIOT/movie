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

    <!-- Bootstrap Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    {if isset($tokenCheckFail)}
        <script src="js/tokenCheckFail.js"></script>
    {elseif isset($permissionDeny)}
        <script>
            alert("權限不足");
            window.location = "index.php";
        </script>
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/manager_member.js"></script>

    <style>
        body {
            font-family: "微軟正黑體", sans-serif;
        }
    </style>
</head>
<body>
{{include file="navbar.tpl"}}
<div class="container">
    <h2>會員管理</h2>
{*    <button type="button" class="btn btn-warning" id="quicksearch">快搜停權帳號</button>*}
    <label>
        <h4>
            快搜停權帳號
            {if isset($smarty.get.quick)}
                <input type="checkbox" checked id="toggle" data-toggle="toggle">
            {else}
                <input type="checkbox" id="toggle" data-toggle="toggle">
            {/if}
        </h4>
    </label>
    <table id="myTable" class="table order-list">
        <thead>
        <tr>
            <td>帳號</td>
            <td>權限</td>
            <td>最後登入時間</td>
        </tr>
        </thead>
        <tbody>
        {foreach $members as $member}
            <tr id="{{$member.id}}">
                <td class="col-sm-3">
                    <p>{{$member.account}}</p>
                </td>
                <td class="col-sm-3 level">
                    {if ($member.permission === "1")}
                        <p style="color: green">{{$member.level}}</p>
                    {elseif ($member.permission === "-1")}
                        <p style="color: red">{{$member.level}}</p>
                    {/if}
                </td>
                <td class="col-sm-3">
                    <p>{{$member.last_login}}</p>
                </td>
                <td class="col-sm-3 switch">
                    {if ($member.permission === "1")}
                        <input type="button" class="btn btn-danger btnn suspend" value="停權">
                    {elseif ($member.permission === "-1")}
                        <input type="button" class="btn btn-info btnn lift" value="解除">
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>

    <div class="text-center">
        <ul class="pagination">
            {for $num=1 to $pages}
                {if $num == $page}
                    <li class="active page"><a>{{$num}}</a></li>
                {else}
                    <li class="page" style="cursor: pointer"><a>{{$num}}</a></li>
                {/if}
            {/for}
        </ul>
    </div>

</div>
</body>
</html>