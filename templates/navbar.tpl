<nav class="navbar navbar-inverse">
    <div class="navbar_gap">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CYmovie</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                {if {{$navbar.permission}} == 2}
                    <li><a id="navAdmin"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                {/if}

                {if {{$navbar.permission}} == 0}
                    <li><a id="navRegister" href="register.php"><span
                                    class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a id="navLogin" href="login.php"><span
                                    class="glyphicon glyphicon-log-in"></span> Login</a></li>
                {/if}

                {if {{$navbar.permission}} >= 1}
                    <li><a id="navAccount">Welcome, {{$navbar.account}} </a></li>
                    <li>
                        <a id="navCash" href="deposit.php"><span
                                    class="glyphicon glyphicon-usd"></span>{{$navbar.cash}}</a>
                    </li>
                    <li>
                        <a id="navLogout" href=""><span
                                    class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                {/if}
            </ul>
        </div>
    </div>
</nav>