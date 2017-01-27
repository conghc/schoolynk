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
        <title>{{ trans('label.member_registration') }} | SchooLynks{{ trans('label.schooling') }} </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-drawer.min.css">
        <link rel="stylesheet" href="/css/style-index.css">
        <link rel="stylesheet" href="/css/base-index.css">
        <link rel="stylesheet" href="/css/module.css">
        <link rel="stylesheet" href="/css/register.css">
        <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="/css/login-popup.css">
        <link rel="stylesheet" href="/css/style-phrase2.css">
        <script src="/js/vendor/jquery.min.js"></script>
        <script src="/js/browser-huck.js"></script>
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    </head>
    <style type="text/css">
        .mdGHD03Selected {
            position: relative;
            cursor: pointer;
            width: 210px;
            height: 28px;
            line-height: 28px;
            padding-right: 46px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            text-align: right;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .mdGHD03Selected:after {
            content: "";
            width: 11px;
            height: 6px;
            background-position: -687px 0;
            position: absolute;
            top: 11px;
            right: 30px;
            cursor: pointer;
            background-image: url('http://static.line.naver.jp/line_at_lp_pc/img/sprite/common_160404.png');
        }

        .dropdown-menu {
            left: inherit;
            margin: inherit;
            width: 210px;
        }

        .dropdown-menu li:hover {
            background: #920a27;
        }

        .dropdown-menu li:hover a {
            color: #000;
        }

        .active-language {
            background: #920a27;
            color: #fff!important;
        }

        .menu-login .wl-btn-login {
            color: #fff;
        }

        .current-language {
            margin-bottom: 2px;
        }

        .language-list {
            margin-bottom: 5px;
        }

        .language-list a {
            color: #fff;
        }

        .dropdown-menu li:hover a {
            color: #fff;
        }
    </style>
    <body>
        <div id="wrapper">
            <header class="site-header">
                <div class="inner inner-md-1 clf">
                    <h1 class="site-title">
                        <a href="/"><img src="/images/logo.png" alt="SchooLynk"></a>
                    </h1>
                    <div id="drawerNav" class="drawer dw-xs-10 dw-sm-6 dw-md-4 fold drawer-right drawer-inverse" aria-labelledby="drawerNav">
                        <nav class="drawer-nav">
                            <div class="container">
                                <div class="close-modal">
                                    <a href="#drawerNav" data-toggle="drawer" aria-foldedopen="true" aria-controls="drawerNav" class="close">{{ trans('label.close') }} <i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <ul>
                                    <li><a href="#" class="js-sign-up-menu click_tracking" data-toggle="modal" data-target="#login-modal">{{ trans('label.login') }}</a></li>
                                    <li><a href="{{ route('student.register') }}" class="js-sign-in-menu click_tracking" data-label="menu" data-action="sign-in" tabindex="1">{{ trans('label.register') }}</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#" class="click_tracking" data-label="menu" data-action="pricing" tabindex="1">{{ trans('label.for_sponsers') }}</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#section-home-about" class="click_tracking" data-label="menu" data-action="expanded_plus" tabindex="1">{{ trans('label.about') }}</a></li>
                                    <li><a href="#" class="click_tracking" data-label="menu" data-action="expanded_premium" tabindex="1">{{ trans('label.contact_us') }}</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div id="header-login" class="bg-red">
                        <ul class="header-menu">
                            @if (Auth::guest())
                            {{-- <li class="hm-menuitem menu-login language-dropdown">
                                <a href="#" class="wl-btn-login title-language" data-toggle="dropdown"><img class="current-language" src="/images/flags/{{language()}}.png"> {{listLanguages()[language()]}}</a>
                                <a href="#" class="btn-menu folded" data-toggle="dropdown"><span class="mdGHD03Selected" ></span><br></a>
                                <ul class="dropdown-menu" style="height: auto;">
                                    <li>
                                        <a class="{{(language() == 'jp' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="jp" data-flag="jp">
                                            <img src="/images/flags/jp.png"> Japanese
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'en' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="en" data-flag="en">
                                            <img src="/images/flags/en.png"> English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'vi' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="vi" data-flag="vi">
                                            <img src="/images/flags/vi.png"> Vietnamese
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'cn' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="cns" data-flag="cns">
                                            <img src="/images/flags/cns.png"> Chinese(Simplified)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'cnt' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="cnt" data-flag="cnt">
                                            <img src="/images/flags/cnt.png"> Chinese(Traditional)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'th' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="th" data-flag="th">
                                            <img src="/images/flags/th.png"> Thai
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'kr' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="kr" data-flag="kr">
                                            <img src="/images/flags/kr.png"> Korean
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{(language() == 'sp' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="sp" data-flag="sp">
                                            <img src="/images/flags/sp.png"> Spanish
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li class="hm-menuitem menu-login">
                                <a href="#" class="wl-btn-login login-btn" data-toggle="modal" data-target="#login-modal">{{ trans('label.login') }}</a>
                            </li>
                            <li class="hm-menuitem menu-main">
                                <a href="#drawerNav" data-toggle="drawer" aria-expanded="false" aria-controls="drawerNav" class="btn-menu folded">
                                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
                            </li>
                            @else
                            <li class="hm-menuitem">
                                <div class="fl-r mg-t-xlg color-fff">
                                    {{-- <div class="btn-group header-setting-wrapper language-list">
                                        <a href="#" class="title-language" data-toggle="dropdown"><img class="current-language" src="/images/flags/{{language()}}.png"> {{listLanguages()[language()]}}</a>
                                        <a href="#" class="btn-menu folded" data-toggle="dropdown"><span class="mdGHD03Selected" ></span><br></a>
                                        <ul class="dropdown-menu pull-right menu-authed">
                                            <li>
                                                <a class="{{(language() == 'jp' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="jp" data-flag="jp">
                                                    <img src="/images/flags/jp.png"> Japanese
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'en' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="en" data-flag="en">
                                                    <img src="/images/flags/en.png"> English
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'vi' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="vi" data-flag="vi">
                                                    <img src="/images/flags/vi.png"> Vietnamese
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'cns' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="cns" data-flag="cns">
                                                    <img src="/images/flags/cns.png"> Chinese(Simplified)
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'cnt' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="cnt" data-flag="cnt">
                                                    <img src="/images/flags/cnt.png"> Chinese(Traditional)
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'th' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="th" data-flag="th">
                                                    <img src="/images/flags/th.png"> Thai
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'kr' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="kr" data-flag="kr">
                                                    <img src="/images/flags/kr.png"> Korean
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{(language() == 'sp' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)" data-language="sp" data-flag="sp">
                                                    <img src="/images/flags/sp.png"> Spanish
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <span class="mg-r-md">{{ Auth::user()->name }}</span>
                                    <div class="btn-group header-setting-wrapper">
                                        <button type="button" class="btn btn-default dropdown-toggle btn-avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (\Auth::user()->student->avatar)
                                            <img class="user-avatar" src="{{\Auth::user()->student->avatar}}"></img>
                                        @else
                                            <img class="user-avatar" src="/images/avatar-default.png"></img>
                                        @endif
                                        </button>
                                        <ul class="dropdown-menu pull-right menu-authed">
                                            <li><a href="{{ route('student.changeEmail') }}">{{ trans('label.change_email') }}</a></li>
                                            <li><a href="{{ route('student.changePassword') }}">{{ trans('label.change_password') }}</a></li>
                                            <li><a href="{{ url('/logout') }}">{{ trans('label.logout') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </header>
            <main class="site-main">
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
                        <li><a href="./about/"><i class="fa fa-angle-right"></i>{{ trans('label.about_schoolynk') }}</a></li>
                        <li><a href="./privacy/"><i class="fa fa-angle-right"></i>{{ trans('label.privacy_policy') }}</a></li>
                        <li><a href="./sitemap/"><i class="fa fa-angle-right"></i>{{ trans('label.site_map') }}</a></li>
                        <li><a href="./contact/"><i class="fa fa-angle-right"></i>{{ trans('label.contact') }}</a></li>
                    </ul>
                    <small class="copy">&copy; 2016 KITE Inc.</small>
                </div>
            </footer>
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <h1>{{ trans('label.login') }}</h1>
                        <br>
                        <form role="form" method="POST" action="{{ route('app.login') }}" class="form-horizontal">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="email" name="email" placeholder="{{ trans('label.email') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="{{ trans('label.password') }}" class="form-control">
                            </div>
                            <div class="form-group lg-social-wrapper">
                                <a href="/redirect/facebook" class="lg-social lg-fb"><img src="/schoolynk/detailpage/images/icon-fb.png"></a>
                                <a href="/redirect/twitter" class="lg-social lg-tw"><img src="/schoolynk/detailpage/images/icon-tw.png"></a>
                                <a href="/redirect/google" class="lg-social lg-gg"><img src="/schoolynk/detailpage/images/icon-g.png"></a>
                            </div>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> {{ trans('label.remember_30day') }}
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                            </div>
                            <div class="form-group lg-forgot">
                                <a href="{{ url('/password/reset') }}">{{ trans('label.forgoten_password') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            /**
             * When click change language
             */
            $('.language-choose').on('click', function () {

                $('.language-choose').removeClass('active-language');
                $(this).addClass('active-language');
                $('.title-language').html('<img class="current-language" src="/images/flags/' + $(this).data('flag') + '.png">' + $(this).text());

                var dataInput = {};
                dataInput.language = $(this).data('language');

                $.ajax({
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    type: "POST",
                    url: '/locale',
                    data: dataInput,
                    success: function(data, status) {
                        location.reload();
                    }
                });
            })
        </script>
        <script src="/js/common-index.js"></script>
        <script src="/js/plugin.js"></script>
        <script src="/js/register.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/drawer.min.js"></script>
        <script src="/js/vendor/parsley.min.js"></script>
        <script src="/js/vendor/bootstrap-select.min.js"></script>
        <script src="/js/vendor/bootbox.min.js"></script>
        <script src="/js/c3.js"></script>
        <script src="/js/lang.js"></script>
        @yield('js')
    </body>
</html>