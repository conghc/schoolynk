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
        <title>{{ trans('label.my_page') }} | SchooLynk</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/base.css">
        <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="/css/login-popup.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
        <script src="/js/vendor/jquery.min.js"></script>
        <script src="/js/browser-huck.js"></script>
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/css/vendor/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="/css/vendor/bootstrap-select.min.css">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
        @yield('style')
        <style type="text/css">
            html{
                font-size: 13px;
            }
            body{
                font-size: 13px;
                font-family: "メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro W3","ＭＳ Ｐゴシック",Arial,verdana,sans-serif;
                line-height: 1.8;
            }
            h1{
                font-size: initial;
            }
            a{
                color: #039dae;
            }
            a:hover{
                text-decoration: none;
            }

            .header-menu {
                display: inline-flex;
            }

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
                right: 10px;
                cursor: pointer;
                background-image: url('http://static.line.naver.jp/line_at_lp_pc/img/sprite/common_160404.png');
            }

            .dropdown-menu {
                left: inherit;
                margin: inherit;
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
                color: #000;
            }

            .menu-login .wl-btn-login:hover, .menu-login .wl-btn-login:focus {
                color: #000;
            }

            .current-language {
                margin-bottom: 2px;
            }

            img.user-avatar {
                width: 30px!important;
                height: 30px!important;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <header class="site-header">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="header-top">
                    <div class="inner inner-md-1 clf">
                        <h1 class="site-title">
                            <a href=""><img src="/images/logo02.png" alt="SchooLynk"></a>
                        </h1>
                        <div class="header-setting" id="header-login">
                            <ul class="header-menu">
                                {{-- <li>
                                    <div class="fl-r mg-t-xlg color-fff">
                                        <div class="btn-group header-setting-wrapper">
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
                                        </div>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="fl-r mg-t-xlg color-fff">
                                        <span class="mg-r-md">{{ Auth::user()->name }}</span>
                                        <div class="btn-group header-setting-wrapper">
                                            <button type="button" class="btn btn-default dropdown-toggle btn-avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (isset(Auth::user()->student) && Auth::user()->student->avatar != '')
                                                <img class="user-avatar" src="{{ Auth::user()->student->avatar }}" />
                                            @elseif ((isset(Auth::user()->university) && Auth::user()->university->logo != ''))
                                                <img class="user-avatar" src="{{ Auth::user()->university->logo }}" />
                                            @else
                                                <img class="user-avatar" src="/images/avatar-default.png" />
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
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-bottom bg-gray">
                    <div class="inner inner-md-1 clf">
                        <nav class="main-navigation">
                            @if( Auth::user()->role == 0 )
                            <ul class="mg-b-n">
                                <li class="{{ Route::is('student.index') ? 'current' : '' }}"><a href="{{ route('student.index') }}"><span><i class="icon icon-navi icon-navi01"></i>{{ trans('label.schoolarship') }}<br>{{ trans('label.list') }}</span></a></li>
                                <li class="alert-new-- {{ Route::is('student.recruiting') ? 'current' : '' }}">
                                    <a href="{{ route('student.recruiting') }}">
                                        <span><i class="icon icon-navi icon-navi02"></i>{{ trans('label.scout') }}<br>{{ trans('label.email') }}</span>
                                        @if($mgsUnread)
                                        <div class="alert-tab">{{ $mgsUnread }}</div>
                                        @endif
                                    </a>
                                </li>
                                <li class="{{ Route::is('student.show') ? 'current' : '' }}">
                                    <a href="{{ route('student.show', ['id' => Auth::user()->id]) }}">
                                    <span><i class="icon icon-navi icon-navi03"></i>{{ trans('label.profile') }}<br>{{ trans('label.management') }}</span>
                                    </a>
                                </li>
                                <li class="pos-rel invite">
                                    <a href="#">
                                    <span><i class="icon icon-navi icon-navi04"></i>{{ trans('label.to_friends') }}<br>{{ trans('label.introduction') }}</span></a>
                                    <ul class="sharing">
                                        <li><a href="http://www.facebook.com/dialog/send?app_id=1729046437369955&link={{ route('index') }}&redirect_uri={{ route('index') }}" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                            <span>Facebook</span></a>
                                        </li>
                                        <li><a href="https://twitter.com/share?url={{route('index')}}&text=Register" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span>Twitter</span></a></li>
                                        <li><a href="https://plus.google.com/share?url={{ route('index') }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> <span>Google Plus</span> </a></li>
                                    </ul>
                                    <!-- Place this tag in your head or just before your close body tag. -->
                                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                                </li>
                                <li class="{{ Route::is('student.contact') ? 'current' : '' }}"><a href="{{ route('student.contact') }}"><span><i class="icon icon-navi icon-navi05"></i>{{ trans('label.contact_us') }}</span></a></li>
                            </ul>
                            @endif
                            @if( Auth::user()->role == 3 )
                            <ul class="mg-b-n">
                                <li class="{{ Route::is('university.index') ? 'current' : '' }}"><a href="{{ route('university.index') }}"><span><i class="icon icon-navi icon-navi01"></i>{{ trans('label.search_students') }}</span></a></li>
                                <li class="{{ Route::is('university.mail') ? 'current' : '' }}"><a href="{{ route('university.mail') }}"><span><i class="icon icon-navi icon-navi01"></i>{{ trans('label.email') }}</span></a></li>
                            </ul>
                            @endif
                        </nav>
                    </div>
                </div>
            </header>
            <main class="site-main">
                <div class="inner inner-md-1">
                    @include('flash::message')
                </div>
                @yield('content')
            </main>
            <div class="pagetop-wrapper">
                <div class="inner inner-md-1">
                    <a href="#wrapper" class="pagetop"><i class="fa fa-angle-up fa-2x"></i></a>
                    <a href="#wrapper" class="sp-pagetop"><i class="fa fa-angle-up fa-2x"></i></a>
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
        </div>
        <div id="waiting" class='dp-n'>
            <img src="/images/loading_spinner.gif">
        </div>
        <script src="/js/common.js"></script>
        <script src="/js/jquery.easing.1.3.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/vendor/jquery.dataTables.min.js"></script>
        <script src="/js/vendor/dataTables.bootstrap.min.js"></script>
        <script src="/js/vendor/parsley.min.js"></script>
        <script src="/js/vendor/bootstrap-select.min.js"></script>
        <script src="/js/vendor/bootbox.min.js"></script>
        <script src="/js/c3.js"></script>
        <script src="/js/lang.js"></script>
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
        @yield('js')
    </body>
</html>