
<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie7" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 lt-ie8" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9]>
<html class="no-js ie9 lt-ie9" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 9]><!-->
<html lang="ja">
<!--<![endif]-->

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes">
	<title>{{ trans('label.schoolarship_detail') }} | SchooLynk{{ trans('label.schooling') }}</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="/css/style-index.css">
	<link rel="stylesheet" href="/css/base-index.css">
	<link rel="stylesheet" href="/css/module.css">
	<link rel="stylesheet" href="/css/add-theme.css">

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


	<!-- new stylesheet -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://schoolynk.com/js/browser-huck.js"></script>
</head>

<style type="text/css">
	@if (\Auth::user())
	.site-header, #header-login {
		height: 62px!important;
	}
	#header-login {
		margin-top: 0px;
	}
	.mg-r-md {
	    margin-right: 15px;
	    margin-top: 10px;
	    float:right;
	}
	.header-menu {
	    list-style: none;
	    padding: 0px;
	    margin: 0px;
	    float: right;
	}
	.header-menu .hm-menuitem {
	    float: left;
	    margin-left: 20px;
	    height: 66px;
	}
	#header-login .btn-avatar {
	    border: 1px solid #920a27;
	    border-radius: 4px;
	    width: 30px;
	    padding: 0px;
	    float: right;
	}
	#header-login .btn1 {
	    font-size: 13px;
	    font-weight: 600;
	    border: none;
	    padding: 8px 19px;
	}
	.fl-r.mg-t-xlg.color-fff {
		display: inline-flex;
	    margin-top: 16px;
	}
	.dropdown-menu {
		padding: 10px;
		width: 200px;
		background: rgba(0,0,0,0.85) 0%!important;
		border-radius: 4px;
	    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
	    box-shadow: 0 6px 12px rgba(0,0,0,.175);
	}
	.dropdown-menu li {
	    margin-bottom: 0.5rem;
	}
	.dropdown-menu li a {
	    font-family: Helvetica,Arial,sans-serif;
	    -webkit-font-smoothing: initial;
	    font-weight: lighter;
	    color: white;
        font-size: 0.8rem;
	}
	.dropdown-menu li a:hover {
	    color: #920a27;
	}
	@endif
	.show {
		display: block;
	}
	ul.pagination {
		display: inline-flex;
	}
	.page-navigation li.active {
	    display: inline-block;
	    width: 2.5em;
	    height: 2.5em;
	    color: #fff;
	    text-align: center;
	    background: #039dae;
	    border: 1px solid #aaa;
	    border: 1px solid #eee;
	    margin: 0 0.25em;
	}
	.page-navigation li.disabled {
		display: inline-block;
	    width: 2.5em;
	    height: 2.5em;
	    color: #aaa;
	    text-align: center;
	    background: #fff;
	    border: 1px solid #aaa;
	    border: 1px solid #eee;
	    margin: 0 0.25em;
	    cursor: not-allowed;
	}
    .pagination>.active>span, .pagination>.disabled>span {
        width: 100%;
        height: 100%;
    }
	.page-header {
		border-bottom: none;
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

    #header-login .menu-authed {
    	margin-top: 21px;
    }

    .title-language {
    	color: #fff;
    }

    .title-language:hover {
    	color: #fff;
    }

    .title-language:after {
    	color: #fff;
    }
</style>

<body id="home">
    <div id="wrapper">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if (\Auth::user())
        <header class="site-header">
			<div class="inner inner-md-1 clf">
				<h1 class="site-title">
                    <a href="/">
                        <img src="http://www.squarenote.jp/demo/schoolynk-detailpage/images/logo.png" alt="SchooLynk">
                    </a>
                </h1>
				<div id="header-login" class="bg-red">
					<ul class="header-menu">
						{{-- <li class="hm-menuitem">
                            <div class="fl-r mg-t-xlg color-fff">
                                <div class="btn-group header-setting-wrapper language-list">
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
                        <li class="hm-menuitem">
	                        <div class="fl-r mg-t-xlg color-fff">
	                            <div class="btn-group header-setting-wrapper">
	                                <button type="button" class="btn btn-default dropdown-toggle btn-avatar" data-toggle="dropdown">
	                                	@if (Auth::user()->student->avatar != '')
                                            <img id="preview" src="{{ Auth::user()->student->avatar }}" alt="" />
                                        @else
                                            <img id="preview" src="/images/_no-avatar.png" alt="" />
                                        @endif
	                                </button>
	                            	<span class="mg-r-md">{{\Auth::user()->name}}</span>
	                                <div class="clearfix"></div>
	                                <ul class="dropdown-menu pull-right menu-authed">
	                                    <li><a href="/student/changeEmail">{{ trans('label.change_email') }}</a></li>
	                                    <li><a href="/student/changePassword">{{ trans('label.change_password') }}</a></li>
	                                    <li><a href="/logout">{{ trans('label.logout') }}</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                    </li>
                    </ul>
				</div>
			</div>
		</header>
		@else
        <header class="site-header">
            <div class="inner inner-md-1 clf">
                <h1 class="site-title header-logo">
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
		@endif
        <main class="site-main">
        	<div id="breadcrumbs" class="inside-blank">
              	<div class="inner inner-md-1">
                  	<ul class="clf">
	                    <li><a href="/"><font><font>トップ</font></font></a></li>
	                    <li><font><font>{{ trans('label.repayment_schoolarship') }}</font></font></li>
                  	</ul>
                </div>
            </div>
            <div class="scholarship-list inside-blank">
                <div class="inner inner-md-1">
                    <div class="page-header">
                        <h1>{{ trans('label.schoolarship_information_list') }}<small>（{{ trans('label.number_of_scholarship_matched', ['xx' => $schoolarships->total()]) }}）</small></h1>
                    </div>
                    <div class="scholarship-list-items">
                    	@if (count($schoolarships) > 0)
	                    	@foreach ($schoolarships as $key => $schoolarship)
	                        <div class="item">
	                            <div class="heading">
	                                <div class="duedate">
	                                    <div class="group-duedate">
	                                        <p>
	                                            <span class="title">{{ trans('label.application_deadline') }}</span>
	                                            <span class="year montserrat">{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('Y') }}</span>
	                                            <span class="date montserrat">{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('m') }}/{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('d') }}</span>
	                                        </p>
	                                    </div>
	                                </div>
	                                <h2 class="name">{{$schoolarship->name}}</h2>
	                                <p class="org">{{$schoolarship->oranization}}</p>
	                            </div>
	                            <div class="block-body">
	                                <div class="table">
	                                    <div class="table-row">
	                                        <dl>
	                                            <dt><span>{{ trans('label.schoolarship_type') }}</span></dt>
	                                            <dd>
	                                            	{{$schoolarship->type}}
	                                            </dd>
	                                        </dl>
	                                        <dl>
	                                            <dt><span>{{ trans('label.payment_target') }}</span></dt>
	                                            <dd>
													@foreach ($schoolarship->nationality as $key3 => $desCountry)
														@if ($key3 == 0)
															{{$countries[$desCountry]}}
														@elseif ($key3 < count($schoolarship->nationality))
															{{', ' . $countries[$desCountry]}}
														@else
															{{$countries[$desCountry]}}
														@endif
													@endforeach
	                                            </dd>
	                                        </dl>
	                                    </div>
	                                    <div class="table-row">
	                                        <dl>
	                                            <dt><span>{{ trans('label.payment_amount') }}</span></dt>
	                                            <dd>
	                                            	{{ trans('label.about') }}{{$schoolarship->amount_currency/10000}}{{ trans('label.ten_thousand') }}{{$schoolarship->currency}}{{$amountPaids[$schoolarship->amount_paid]}}
	                                            </dd>
	                                        </dl>
	                                        <dl>
	                                            <dt><span>{{ trans('label.screening_method') }}</span></dt>
	                                            <dd>
                                                    @if (!empty($schoolarship->process))
                                                        @foreach ($schoolarship->process as $key2 => $prs)
    														@if ($key2 == 0)
    															{{$process[$prs]}}
    														@elseif ($key2 < count($schoolarship->process))
    															{{', ' . $process[$prs]}}
    														@else
    															{{$process[$prs]}}
    														@endif
    													@endforeach
                                                    @endif
												</dd>
	                                        </dl>
	                                    </div>
	                                    <div class="table-row">
	                                        <dl>
	                                            <dt><span>{{ trans('label.paid_interest_cost') }}</span></dt>
	                                            <dd>
	                                            	@foreach ($schoolarship->covering_cost as $key1 => $cost)
														@if ($key1 == 0)
															{{$converingCosts[$cost]}}
														@elseif ($key1 < count($schoolarship->covering_cost))
															{{', ' . $converingCosts[$cost]}}
														@else
															{{$converingCosts[$cost]}}
														@endif
													@endforeach
	                                            </dd>
	                                        </dl>
	                                        <dl>
	                                            <dt><span>{{ trans('label.acquisition_difficulty') }}</span></dt>
	                                            <dd>
	                                                <span class="icon-wrap">
	                                              <img src="http://www.squarenote.jp/demo/schoolynk-listpage/images/icon-star{{$schoolarship->competition}}.png" alt="" class="icon-star">
	                                              <span class="review"> ({{$competitions[$schoolarship->competition]}}) </span>
	                                                </span>
	                                            </dd>
	                                        </dl>
	                                    </div>
	                                </div>
	                                <ul class="btn-list">
	                                    <li><a href="" class="btn btn-mylist" data-id="{{ $schoolarship->id }}" >{{ trans('label.to_add_to_my_list') }}</a></li>
	                                    <li><a href="/schoolynk-detailpage/{{ $schoolarship->id }}" class="btn">{{ trans('label.view_the_detail') }}</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                        @endforeach
	                    @else
	                    	<h2>{{ trans('label.there_are_no_schoolarship_list') }}</h2>
						@endif
                        <div class="page-navigation">
                        	{!! $schoolarships->render(); !!}
                        </div>
                    </div>
                </div>
            </div>

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

    <script src="http://schoolynk.com/js/plugin.js"></script>
    <script src="http://schoolynk.com/js/common-index.js"></script>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function(){

	    // $('.btn-avatar').click(function (event) {
	    // 	event.preventDefault();
	    // 	event.stopPropagation()
	    // 	$('.dropdown-menu').toggle("show");
	    // })

	    // $('body').click(function() {
	    // 	if ($('.dropdown-menu').css('display') == 'block')
	    // 	$('.dropdown-menu').toggle("show");
	    // })

	    /**
	     * Add schoolarship to favorite page
	     */
	    $('.btn-mylist').click(function (e) {

	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	            }
	        });

	        e.preventDefault(); 

	        var dataInput = {};
	        dataInput.schoolarId = $(this).data('id');

	        $.ajax({

	            type: 'POST',
	            url: '/api/student/addFavorite',
	            data: dataInput,
	            dataType: 'json',
	            success: function (data) {
	            	if (data.status == 1) {
	            		alert('{{ trans('label.create_schoolarship_success_msg') }}');
	            		// window.location.href = '/schoolynk-listpage/' + dataInput.studentId;
	            	} else if (data.status == -1) {
	            		alert('{{ trans('label.create_schoolarship_exists_msg') }}');
	            		// window.location.href = '/schoolynk-listpage/' + dataInput.studentId;
	            	} else if (data.status == 0) {
	            		alert('{{ trans('label.create_schoolarship_faild_msg') }}');
	            	} else {
	            		alert('{{ trans('label.login_to_continues') }}x');
	            	}
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
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
            url: '/locale',
            data: dataInput,
            success: function(data, status) {
                location.reload();
            }
        });
    })
</script>
