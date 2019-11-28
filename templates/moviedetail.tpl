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
</head>
<body>
{{include file="navbar.tpl"}}
<div class="container">
    <div class="row col-md-11 col-md-offset-1">
        <div class="col-md-2">
            <img width="120" height="180" src="img/{{$movieinfo.img}}">
        </div>

        <div class="col-md-2">
            <h3>{{$movieinfo.name_tw}}</h3>
            <p>{{$movieinfo.name_en}}</p>
            <p>{{$movieinfo.createat}} 上映</p>
        </div>

        <div class="col-md-8">
            <ul class="nav nav-tabs">
                {foreach $dates as $date}
                    <li><a data-toggle="tab" href="#{{$date}}">{{$date}}</a></li>
                {/foreach}
            </ul>

            <div class="tab-content">
                {foreach $dates as $date}
                    <div id="{{$date}}" class="tab-pane fade">
                        {if isset($times)}
                            {foreach $times as $time}
                                {if $time.date == $date}
                                    <h3>
                                        {{$time.time}}
                                        <a href="book.php?event={{$time.id}}">
                                            <button type="button" class="btn btn-success">訂票</button>
                                        </a>
                                    </h3>
                                {/if}
                            {/foreach}
                        {/if}
                    </div>
                {/foreach}
            </div>

        </div>


    </div>
    <div class="row col-md-11 col-md-offset-1">
        <br><br>
        <iframe width="900" height="500" src="https://www.youtube.com/embed/{{$movieinfo.videoURL}}" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>

    <div class="row col-md-10 col-md-offset-1">
        <hr>
        <h2>劇情簡介</h2><span>ABOUT THE STORY</span>
        <pre style="white-space: pre-wrap">{{$movieinfo.intro}}</pre>
    </div>

</div>
<br><br><br><br>
</body>
</html>