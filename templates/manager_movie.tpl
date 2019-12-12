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
                        <p style="color: green" class="status">{{$movie.level}}</p>
                    {elseif ($movie.status === "0")}
                        <p style="color: red" class="status">{{$movie.level}}</p>
                    {/if}
                </td>
                <td class="col-md-2 switch btn-group" role="group">
                    <input type="button" class="btn btn-secondary edit" value="編輯" data-toggle="modal" data-target="#myModal">
                    {if ($movie.status === "1")}
{*                        <button type="button" class="btn btn-danger btnn suspend">下架</button>*}
                        <input type="button" class="btn btn-danger btnn suspend" value="下架">
                    {elseif ($movie.status === "0")}
{*                        <button type="button" class="btn btn-info btnn lift">上架</button>*}
                        <input type="button" class="btn btn-info btnn lift" value="上架">
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" data-keyboard="true" tabindex="-1">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">影片編輯</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nametw">中文片名</label>
                        <input type="text" class="form-control" id="nametw">
                    </div>
                    <div class="form-group">
                        <label for="nameen">英文片名</label>
                        <input type="text" class="form-control" id="nameen">
                    </div>
                    <div class="form-group">
                        <label for="intro">電影簡介</label>
                        <textarea class="form-control" id="intro" style="width: 100%;height:200px;resize:vertical;"></textarea>
                    </div>
{*                    <div>*}
{*                        <p>圖片上傳</p>*}
{*                        <input type="file" id="exampleInputFile">*}
{*                    </div> *}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>