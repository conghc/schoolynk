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
    <meta property="og:image" content="/images/schoolynk_logo.png" />
    <meta property="og:title" content="SchooLynk" />
    <meta property="og:description" content="Description" />
    <meta itemprop="name" content="SchooLynk">
    <meta itemprop="description" content="Description">
    <meta itemprop="image" content="/images/schoolynk_logo.png">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-drawer.min.css">
    <link rel="stylesheet" href="/css/style-index.css">
    <link rel="stylesheet" href="/css/base-index.css">
    <link rel="stylesheet" href="/css/style-home.css">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/juicyslider.css">
    <link rel="stylesheet" href="/css/module.css">
    <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="/css/login-popup.css">
    <script src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/jquery-ui.min.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/drawer.min.js"></script>
    <script src="/js/browser-huck.js"></script>
    <style type="text/css">
        * {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
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
            right: 30px;
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
            color: #fff;
        }

        .active-language {
            background: #920a27;
            color: #fff!important;
        }
    </style>
</head>
<body id="home" class="has-drawer">
    <div id="wrapper">
        <header class="site-header">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="inner inner-md-1 clf" style="height: 62px;">
                <h1 class="site-title" style="margin-top: 15px;">
                    <a href=""><img src="/images/logo.png" alt="SchooLynk"></a>
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
                            @if (Auth::guest())
                            <a href="#" class="wl-btn-login login-btn" data-toggle="modal" data-target="#login-modal">{{ trans('label.login') }}</a>
                            @else
                            <div class="fl-r mg-t-xlg color-fff">
                                <span class="mg-r-md">{{ Auth::user()->name }}</span>
                                <span><a class="color-fff" href="{{ url('/logout') }}">{{ trans('label.logout') }}</a></span>
                            </div>
                            @endif
                        </li>
                        <li class="hm-menuitem menu-main">
                            <a href="#drawerNav" data-toggle="drawer" aria-expanded="false" aria-controls="drawerNav" class="btn-menu folded">
                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span><br></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="message ta-c">
            @include('flash::message')
        </div>
        <main class="site-main">
            <div class="section-home-hero inside-blank">
                <div class="inner">
                    <div class="catch">
                        <div class="inner inner-md-1 clf">
                            <div class="layer">
                                <h1 class="fc-red">{{ trans('label.scholarship_match_their_own_term') }}
                                    <span>{{ trans('label.search_easy_free') }}</span>
                                </h1>
                                <p>{{ trans('label.enter_the_basic_infomation') }}</p>
                                <ul class="first-select-items clf">
                                    <li class="item">
                                        <select class="dropdown">
                                            <option class="label" value="">ご希望の留学先は？</option>
                                            <option value="アメリカ">アメリカ</option>
                                            <option value="イギリス">イギリス</option>
                                            <option value="カナダ">カナダ</option>
                                            <option value="オーストラリア">オーストラリア</option>
                                            <option value="ドイツ">ドイツ</option>
                                            <option value="その他">その他</option>
                                        </select>
                                    </li>
                                    <li class="item">
                                        <select class="dropdown">
                                            <option class="label" value="">ご希望の留学時期は？</option>
                                            <option value="2016年から開始">2016年から開始</option>
                                            <option value="2017年から開始">2017年から開始</option>
                                            <option value="2018年から開始">2018年から開始</option>
                                        </select>
                                    </li>
                                    <li class="item">
                                        <select class="dropdown">
                                            <option class="label" value="">あなたの現在の学年・所属は？</option>
                                            <option value="高校生">高校生</option>
                                            <option value="大学学部">大学学部</option>
                                            <option value="大学修士">大学修士</option>
                                            <option value="大学博士">大学博士</option>
                                            <option value="社会人">社会人</option>
                                        </select>
                                    </li>
                                </ul>
                                <a href="{{ route('student.register') }}" class="btn"><span>{{ trans('label.search_now_btn') }}<i class="icon icon-search"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="fade-slider">
                        <div id="myslider" class="juicyslider">
                            <ul>
                                <li><a href=""><img src="/images/mv01.jpg" alt=""></a></li>
                                <li><a href=""><img src="/images/mv02.jpg" alt=""></a></li>
                                <li><a href=""><img src="/images/mv03.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="section-home-feature bg-white">
                    <div class="inner inner-md-1">
                        <h2 class="section-title fc-red ">{{ trans('label.characteristics_scholarship') }}</h2>
                        <div class="feature-items clf">
                            <div class="item trigger">
                                <a href="/list-schoolarship/1">
                                    <h3>{{ trans('label.category_1') }}</h3>
                                    <figure><img src="/images/feature01.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                            <div class="item trigger">
                                <a href="/list-schoolarship/2">
                                    <h3>{{ trans('label.category_2') }}</h3>
                                    <figure><img src="/images/feature02.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                            <div class="item trigger">
                                <a href="/list-schoolarship/3">
                                    <h3>{{ trans('label.category_3') }}</h3>
                                    <figure><img src="/images/feature03.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                            <div class="item trigger">
                                <a href="/list-schoolarship/4">
                                    <h3>{{ trans('label.category_4') }}</h3>
                                    <figure><img src="/images/feature04.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                            <div class="item trigger">
                                <a href="/list-schoolarship/5">
                                    <h3>{{ trans('label.category_5') }}</h3>
                                    <figure><img src="/images/feature05.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                            <div class="item trigger">
                                <a href="/list-schoolarship/6">
                                    <h3>{{ trans('label.category_6') }}</h3>
                                    <figure><img src="/images/feature06.jpg" alt=""></figure>
                                    <span class="arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="section-home-about bg-white" id="section-home-about">
                    <div class="inner inner-md-1">
                        <div class="col-block clf">
                            <div class="text-area" id="about-fadein1">
                                <h2 class="section-title fc-red montserrat">{{ trans('label.about_schoolynk') }}</h2>
                                <p>{{ trans('label.around_the_word_are_out') }}</p>
                                <p>{{ trans('label.you_do_not_need_to_research') }}</p>
                                <p>{{ trans('label.application_status_each_school') }}</p>
                            </div>
                            <figure class="image-mac" id="about-fadein2">
                                <img src="/images/mac.png" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="section-home-step bg-red">
                    <div class="inner inner-md-1">
                        <h2 class="section-title montserrat">{{ trans('label.in_three_step') }}<br>{{ trans('label.manage_schoolarship_information') }}</h2>
                        <div class="step-items">
                            <div class="item trigger" id="step01">
                                <figure>
                                    <img src="/images/step01.png" alt="step01">
                                </figure>
                                <h3>{{ trans('label.create_my_account') }}</h3>
                                <p>{{ trans('label.setup_email_and_password') }}<br>{{ trans('label.create_my_account') }}</p>
                            </div>
                            <div class="item trigger" id="step02">
                                <figure>
                                    <img src="/images/step02.png" alt="step02">
                                </figure>
                                <h3>{{ trans('label.desired_conditions') }}</h3>
                                <p>{{ trans('label.region_of_study_abroad') }}<br>{{ trans('label.conditions_such_as_major') }}</p>
                            </div>
                            <div class="item trigger" id="step03">
                                <figure>
                                    <img src="/images/step03.png" alt="step03">
                                </figure>
                                <h3>{{ trans('label.get_a_schoolarship_list') }}</h3>
                                <p>{{ trans('label.get_list_matches_own_wish') }}<br>{{ trans('label.application_silution_managerment') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="section-home-start">
                    <div class="inner inner-md-1">
                        <h2 class="section-title fc-red montserrat">{{ trans('label.now_in_schoolynk') }}<br>{{ trans('label.collect_schoolarship_information') }}</h2>
                        <p>{{ trans('label.first_step_take_to_dream') }}<br>{{ trans('label.let_start_frome_schoolynk') }}</p>
                        <a href="{{ route('student.register') }}" class="btn"><span>{{ trans('label.try_to_search_right_now') }}<i class="icon icon-search"></i></span></a>
                    </div>
                </div>
            </section>
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
                            <a href="redirect/facebook" class="lg-social lg-fb"><img src="/schoolynk/detailpage/images/icon-fb.png"></a>
                            <a href="redirect/twitter" class="lg-social lg-tw"><img src="/schoolynk/detailpage/images/icon-tw.png"></a>
                            <a href="redirect/google" class="lg-social lg-gg"><img src="/schoolynk/detailpage/images/icon-g.png"></a>
                        </div>
                        <div class="form-group">
                            <input type="checkbox"><span class="remember">{{ trans('label.remember_30day') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="login loginmodal-submit" value="{{ trans('label.login') }}">
                        </div>
                        <div class="form-group lg-forgot">
                            <a href="{{ url('/password/reset') }}">{{ trans('label.forgoten_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="/js/modernizr-custom.js"></script> -->
    <script src="/js/plugin.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/common-index.js"></script>
    <script>

        /**
         * Validate login 
         */
        $(function(){
            $( "#frm-login" ).submit(function( event ) {
              var password = ( $('input[name="password"]').val() ).trim();
              if(!password){
                alert('Passwords empty');
                event.preventDefault();
              }
            });
        });

        /**
         * Change language
         */
        $('.language-choose').on('click', function () {
            $('.language-choose').removeClass('active-language');
            $(this).addClass('active-language');
            $('.title-language').html(
                                '<img class="current-language" src="/images/flags/' + 
                                $(this).data('flag') + '.png">' + 
                                $(this).text()
                            );

            var dataInput = {};
            dataInput.language = $(this).data('language');

            $.ajax({
                headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                type: "POST",
                url: 'locale',
                data: dataInput,
                success: function(data, status) {
                    location.reload();
                }
            });
        })
    </script>
</body>
</html>