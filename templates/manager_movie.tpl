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
    {elseif isset($permissionDeny)}
        <script>
            alert("權限不足");
            window.location = "index.php";
        </script>
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/manager_movie.js"></script>

    <style>
        body {
            font-family: "微軟正黑體", sans-serif;
        }
    </style>
</head>
<body>
{{include file="navbar.tpl"}}
<div class="container" style="max-width: 800px">
    <h2>電影上下架</h2>
    <table id="myTable" class="table order-list">
        <thead>
        <tr>
            <td class="col-md-8">影片名稱</td>
            <td class="col-md-2">影片狀態</td>
        </tr>
        </thead>
        <tbody>
        {foreach $movies as $movie}
            <tr id="{{$movie.id}}">
                <td class="col-md-8">
                    <p>{{$movie.name_tw}}</p>
                </td>
                <td class="col-md-2">
                    {if ($movie.status === "1")}
                        <p style="color: green">{{$movie.level}}</p>
                    {elseif ($movie.status === "0")}
                        <p style="color: red">{{$movie.level}}</p>
                    {/if}
                </td>
                <td class="col-md-2 switch">
                    {if ($movie.status === "1")}
                        <input type="button" class="btn btn-danger btnn suspend" value="下架">
                    {elseif ($movie.status === "0")}
                        <input type="button" class="btn btn-info btnn lift" value="上架">
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>
</body>
</html>