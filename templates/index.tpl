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
    <link rel="stylesheet" type="text/css" href="css/index.css">

    {if isset($tokenCheckFail)}
        <script src="js/tokenCheckFail.js"></script>
    {/if}
    <script src="js/navbar.js"></script>
</head>
<body>
    {{include file="navbar.tpl"}}
    <div class="row article">
        <div class="movieList">
            {foreach $movieLists as $movieList}
            <div class="col-xs-12 col-sm-12 col-md-4 movieItem">
                <div class="thumbnail">
                    <a href="moviedetail.php?id={{$movieList.id}}"><img src="img/{{$movieList.img}}"></a>
                    <div class="caption">
                        <a href="moviedetail.php?id={{$movieList.id}}"><h3>{{$movieList.name_tw}}</h3></a>
                        <p>{{$movieList.name_en}}</p>
                        <p>{{$movieList.createat}} 上映</p>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>

        <div class="pagebar">

        </div>

    </div>
</body>
</html>