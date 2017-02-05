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
    @yield('style')
</head>
<body class="signIn">
    <div class="">
        <div class="row"><br /><br /><br /><br />
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel-heading">Schoo<span class="inner">Lynk</span>
                    <span class="under">SIGN IN TO CONTINUE</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/doLogin') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                @include('flash::message')
                            </div>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('label.stay_signed_in') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 forgoten_password">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ trans('label.forgoten_password') }}</a>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:right">
                            <div class="col-md-10">
                                <a href="redirect/facebook" class="lg-social lg-fb"><img src="../frontend/img/icons/icon-fb.png"></a>
                                <a href="redirect/twitter" class="lg-social lg-tw"><img src="../frontend/img/icons/icon-tw.png"></a>
                                <a href="redirect/google" class="lg-social lg-gg"><img src="../frontend/img/icons/icon-g.png"></a>
                            </div>
                        </div>
                        <div class="form-group buttonSignIn">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary btn-modify btnLogin">Sign in</button>
                                <span>Not a member yet? <a href="/student/register">Create new account</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>
