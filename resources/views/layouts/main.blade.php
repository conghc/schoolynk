<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie7" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 lt-ie8" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 9]>
<html class="no-js ie9 lt-ie9" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="ja">
    <!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes">
        <title>SchooLynk{{ trans('label.title_welcome') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="/css/style-index.css">
        <link rel="stylesheet" href="/css/base-index.css">
        <link rel="stylesheet" href="/css/juicyslider.css">
        <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
        <script src="/js/vendor/jquery.min.js"></script>
        <script src="/js/vendor/jquery-ui.min.js"></script>
        <script src="/js/browser-huck.js"></script>
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/css/vendor/bootstrap-select.min.css">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    </head>
    <body id="home">
        <div id="wrapper">
            <header class="site-header">
                <div class="inner inner-md-1 clf">
                    <h1 class="site-title">
                        <a href="/"><img src="/images/logo.png" alt="SchooLynk"></a>
                    </h1>
                    @if (Auth::guest())
                    <form  role="form" method="POST" action="{{ route('app.login') }}">
                        {!! csrf_field() !!}
                        <div id="header-login" class="bg-red">
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="email" name="email" id="" value="" placeholder="メールアドレス" class="email">
                                        </td>
                                        <td>
                                            <input type="password" name="password" id="" placeholder="パスワード" class="password">
                                        </td>
                                        <td>
                                            <input value="ログイン" type="submit" id="" class="btn montserrat">
                                        </td>
                                        <td class="forget">
                                            <a href="{{ url('/password/reset') }}">{{ trans('label.if_you_forget_your_password') }}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="btn-trigger" class="btn montserrat">
                            <div data-text="CLOSE">
                                <span>{{ trans('label.login') }}</span>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="fl-r mg-t-xlg color-fff">
                        <span class="mg-r-md">{{ Auth::user()->name }}</span>
                        <span><a class="color-fff" href="{{ url('/logout') }}">{{ trans('label.logout') }}</a></span>
                    </div>
                    @endif
                </div>
            </header>
            <main class="site-main">
                <div class="container mg-t-xlg">
                    @include('flash::message')
                </div>
                @yield('content')
            </main>
            <div class="pagetop-wrapper">
                <div class="inner inner-md-1">
                    <a href="#wrapper" id="pagetop"><i class="fa fa-angle-up fa-2x"></i></a>
                    <a href="#wrapper" id="sp-pagetop"><i class="fa fa-angle-up fa-2x"></i></a>
                </div>
            </div>
            <footer class="site-footer bg-gray">
                <div class="inner inner-md-1 clf">
                    <ul class="footer-links">
                        <li><a href="./about/"><i class="fa fa-angle-right"></i>SchooLynk{{ trans('label.about') }}</a></li>
                        <li><a href="./privacy/"><i class="fa fa-angle-right"></i>{{ trans('label.privacy_policy') }}</a></li>
                        <li><a href="./sitemap/"><i class="fa fa-angle-right"></i>{{ trans('label.site_map') }}</a></li>
                        <li><a href="./contact/"><i class="fa fa-angle-right"></i>{{ trans('label.contact') }}</a></li>
                    </ul>
                    <small class="copy">© 2016 KITE Inc.</small>
                </div>
            </footer>
        </div>
        <script src="/js/common-index.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/vendor/parsley.min.js"></script>
        <script src="/js/vendor/bootstrap-select.min.js"></script>
        <script src="/js/vendor/bootbox.min.js"></script>
        <script src="/js/c3.js"></script>
        <script src="/js/lang.js"></script>
        @yield('js')
    </body>
</html>