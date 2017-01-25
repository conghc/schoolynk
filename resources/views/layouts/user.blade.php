<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <link rel="icon" href="/frontend/img/favicon.ico">
    <title>{{ trans('label.my_page') }} | SchooLynk</title>
    <!-- Bootstrap core CSS -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/fonts/roboto-fonts/roboto-fonts.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/style.css" rel="stylesheet">
    <link href="/frontend/css/icon-loading.css" rel="stylesheet">
    @yield('style')
</head>
<body id="page-top">
<div class="sk-spinner sk-spinner-wave">
    <div class="sk-rect1"></div> <div class="sk-rect2"></div> <div class="sk-rect3"></div> <div class="sk-rect4"></div> <div class="sk-rect5"></div>
</div>
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-top">
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="#">Schoo<span>Lynk</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navBar-top-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="icon-social icon-twitter">
                            <a href="#" title="Share Twitter" onclick="alert('^^!')"><img src="/frontend/img/icons/icon-twitter.png" /></a>
                        </li>
                        <li class="icon-social icon-facebook">
                            <a href="#" title="Share Facebook" onclick="alert('^^!')"><img src="/frontend/img/icons/icon-facebook.png" /></a>
                        </li>
                        <li class="icon-social icon-google">
                            <a href="#" title="Share Google" onclick="alert('^^!')"><img src="/frontend/img/icons/icon-google.png" /></a>
                        </li>
                        <li class="dropdown change-language">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="flag" src="/frontend/img/flags/32/United-Kingdom.png" />Eng
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu choose-language">
                                <li><img class="flag" src="/frontend/img/flags/32/United-Kingdom.png" /><a href="#">Viet Nam</a></li>
                                <li><img class="flag" src="/frontend/img/flags/32/United-Kingdom.png" /><a href="#">Japan</a></li>
                                <li><img class="flag" src="/frontend/img/flags/32/United-Kingdom.png" /><a href="#">Singapore</a></li>
                            </ul>
                        </li>
                        <li class="sign-up"><button type = "button" class = "btn btn-default btn-modify">Sign up</button></li>
                        <li class="login"><button type = "button" class = "btn btn-default btn-modify">Login</button></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
    </nav>
    <nav class="nav_main center">
        <ul>
            <li class="school current"><a href="{{ route('index') }}">School</a></li>
            <li class="coach"><a href="#">Coach</a></li>
            <li class="scholarship"><a href="{{ route('scholarship.index') }}">Scholarship</a></li>
            <li class="message-box"><a href="#">Message box</a></li>
            <li class="my-profile"><a href="#">My profile</a></li>
        </ul>
    </nav>
</div>
@yield('content')
<br /><br /><br />


<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>
