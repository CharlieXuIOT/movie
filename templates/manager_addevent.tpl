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
    {elseif isset($DBissue)}
        <script>
            alert("資料異常! 請通知管理員");
            window.location = "index.php";
        </script>
    {/if}
    <script src="js/navbar.js"></script>
    <script src="js/manager_addevent.js"></script>

    <style>
        body {
            font-family: "微軟正黑體", sans-serif;
        }
    </style>
</head>
<body>
{{include file="navbar.tpl"}}
<div class="container" style="width: 500px">
    <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading">
                新增電影場次
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label for="movie">選擇電影</label>
                    <select class="form-control" id="movie">
                        {foreach $movie as $item}
                            <option id="{{$item.id}}">{{$item.name_tw}}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">選擇日期</label>
                    <input type="date" class="form-control" id="date">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">選擇時間</label>
                    <input type="time" class="form-control" id="time">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info">新增</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>