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
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="_token" content="{{csrf_token()}}" />
	<meta property="og:url" content="/schoolynk-detailpage/{{ $schoolarship->id }}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="SchooLynk" />
	<meta property="og:description" content="{{ $schoolarship->name }}" />
	<meta property="og:image" content="http://schoolynk.vasontel.com/images/feature02.jpg" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="307" />

	<title>{{ trans('label.schoolarship_detail') }} | SchooLynk{{ trans('label.schooling') }}</title>
	<link rel="shortcut icon" href="">

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
</head>
<style type="text/css">
	@if (\Auth::user())
	.site-header, #header-login {
		height: 63px;
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
		display: none;
		border-radius: 4px;
	    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
	    box-shadow: 0 6px 12px rgba(0,0,0,.175);
	}
	.dropdown-menu li a {
	    font-family: Helvetica,Arial,sans-serif;
	    -webkit-font-smoothing: initial;
	    font-weight: lighter;
	    color: white;
	}
	.dropdown-menu li a:hover {
	    color: #920a27;
	}
	@endif
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
	.page-header {
		border-bottom: none;
	}
	.heading .title {
		padding-top: 7px;
		padding-bottom: 7px;
	}
	h3 {
		margin: 0px!important;
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

    .scholarship-detail dt {
        vertical-align: inherit;
    }
</style>
<body id="home">
	<div id="wrapper">
		@if (\Auth::user())
        <header class="site-header">
			<div class="inner inner-md-1 clf">
				<h1 class="site-title"><a href="/"><img src="http://www.squarenote.jp/demo/schoolynk-detailpage/images/logo.png" alt="SchooLynk"></a></h1>
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
                        <li><a href="/">{{ trans('label.home') }}</a></li>
                        <li><a href="/list-schoolarship/{{ $schoolarship->category }}">{{ trans('label.repayment_schoolarship') }}</a></li>
                        <li>{{ trans('label.schoolarship_detail') }}</li>
                    </ul>
                </div>
            </div>
			<div class="scholarship-detail inside-blank">
				<div class="inner inner-md-1">
					<div class="page-header">
						<h1>{{ trans('label.schoolarship_detail') }}</h1>
						<div class="link-group">
							<ul class="share-btn-item">
								<li>
									<a href="http://www.facebook.com/share.php?u=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" onclick="return fbs_click()" target="_blank">	<img src="/schoolynk/detailpage/images/icon-fb.png" alt="facebook">
									</a>
								</li>
								<li><a href="http://twitter.com/home?status=Currently reading http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" title="Click to share this post on Twitter" target="_blank"><img src="/schoolynk/detailpage/images/icon-tw.png" alt="twitter"></a></li>
								<li>
									<a class="gplus_icon" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}&redirect_uri=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" target='_blank'>
										<img src="/schoolynk/detailpage/images/icon-g.png" alt="はてなブックマーク">
									</a>
								</li>
							</ul>
							<a href="javascript:void(0)" class="btn btn-mylist">{{ trans('label.to_add_to_my_list') }}</a>
						</div>
					</div>
					<ul class="scholarship-detail-anchor">
						<li class="active"><a href="#item01">{{ trans('label.basic_infomation') }}</a></li>
						<li><a href="#item02" onclick="goToByScroll('item02')">{{ trans('label.paid_content') }}</a></li>
						<li><a href="#item03" onclick="goToByScroll('item03')">{{ trans('label.qualifications') }}</a></li>
						<li><a href="#item04" onclick="goToByScroll('item04')">{{ trans('label.oranization_information') }}</a></li>
					</ul>
					<div class="scholarship-detail-items">
						<div class="item main" id="item01">
							<input type="hidden" name="schoolarId" id="schoolarId" value="{{$schoolarship->id}}">
							<div class="heading">
								<h2 class="title">{{$schoolarship->name}}</h2>
								<p class="org">
									<span class="type">{{ trans('label.implementing_organization') }}</span>{{$schoolarship->oranization}} (<span>{{$oranizationTypes[$schoolarship->type_of_oran]}}</span>)
								</p>
							</div>
							<div class="block-body">
								<h3 class="sub-title">{{ trans('label.basic_infomation') }}</h3>
								<ul class="your-status">
									<li class="active">
										<button type="" name="" value="">
										<span class="check"></span>
										<span class="text">{{ trans('label.not_offered') }}</span>
										</button>
									</li>
									<li>
										<button type="" name="" value="">
										<span class="check"></span>
										<span class="text">{{ trans('label.applied_raised_in') }}</span>
										</button>
									</li>
									<li>
										<button type="" name="" value="">
										<span class="check"></span>
										<span class="text">{{ trans('label.subcribed') }}</span>
										</button>
									</li>
								</ul>
								<div class="table">
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.application_deadline') }}</span></dt>
											<dd>{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('Y') }}{{ trans('label.year') }}{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('m') }}{{ trans('label.month') }}{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('d') }}{{ trans('label.day') }} 
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.stydy_abroad_destination_country') }}</span></dt>
											<dd>
												@foreach ($schoolarship->destination_country as $key => $desCountry)
                                                    <?php if ($desCountry == 'all') continue; ?>
													@if ($key == 0)
														{{$countries[$desCountry]}}
													@elseif ($key < count($schoolarship->destination_country))
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
											<dt><span>{{ trans('label.schoolarship_type') }}</span></dt>
											<dd>{{$schoolarship->type}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.course') }}</span></dt>
											<dd>
												@foreach ($schoolarship->academic as $key2 => $value2)
													@if ($key2 == 0)
														{{$academics[$value2]}}
													@elseif ($key2 < count($schoolarship->academic))
														{{', ' . $academics[$value2]}}
													@else
														{{$academics[$value2]}}
													@endif
												@endforeach
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.payment_amount') }}</span></dt>
											<dd>{{$schoolarship->amount_currency/10000}}{{ trans('label.ten_thousand') }}{{$schoolarship->currency}}{{$amountPaids[$schoolarship->amount_paid]}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.school_designation') }}</span></dt>
											<dd></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.payment_target_year') }}</span></dt>
											<dd></dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.qualifying_age') }}</span></dt>
											<dd>{{$schoolarship->min_age}}{{ trans('label.age') }}〜{{$schoolarship->max_age}}{{ trans('label.up_to_age') }}</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.application_method') }}</span></dt>
											<dd>
												@foreach ($schoolarship->process as $key1 => $value1)
													@if ($key1 == 0)
														{{$process[$value1]}}
													@elseif ($key1 < count($schoolarship->process))
														{{', ' . $process[$value1]}}
													@else
														{{$process[$value1]}}
													@endif
												@endforeach
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.schoolarship_link') }}</span></dt>
											<dd><a href="{{$schoolarship->url}}" target="_blank">{{$schoolarship->url}}</a></dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
						<div class="item sub" id="item02">
							<div class="heading">
								<h3 class="sub-title">{{ trans('label.paid_content') }}</h3>
							</div>
							<div class="block-body">
								<div class="table">
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.application_period') }}</span></dt>
											<dd>{{ Carbon\Carbon::parse($schoolarship->date_app_start)->format('Y') }}{{ trans('label.year') }}{{ Carbon\Carbon::parse($schoolarship->date_app_start)->format('m') }}{{ trans('label.month') }}{{ Carbon\Carbon::parse($schoolarship->date_app_start)->format('d') }}{{ trans('label.day') }}〜{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('Y') }}{{ trans('label.year') }}{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('m') }}{{ trans('label.month') }}{{ Carbon\Carbon::parse($schoolarship->date_app_end)->format('d') }}{{ trans('label.day') }}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.payment_target_year') }}</span></dt>
											<dd></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.schoolarship_type') }}</span></dt>
											<dd>{{$schoolarship->type}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.screening_method') }}</span></dt>
											<dd>
												@foreach ($schoolarship->process as $key1 => $value1)
													@if ($key1 == 0)
														{{$process[$value1]}}
													@elseif ($key1 < count($schoolarship->process))
														{{', ' . $process[$value1]}}
													@else
														{{$process[$value1]}}
													@endif
												@endforeach
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.payment_amount') }}</span></dt>
											<dd>{{$schoolarship->amount_currency/10000}}{{ trans('label.ten_thousand') }}{{$schoolarship->currency}}{{$amountPaids[$schoolarship->amount_paid]}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.benifit_overlapping') }}</span></dt>
											<dd></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.paid_interest_cost') }}</span></dt>
											<dd>
												@foreach ($schoolarship->covering_cost as $key3 => $value3)
													@if ($key3 == 0)
														{{$converingCosts[$value3]}}
													@elseif ($key3 < count($schoolarship->covering_cost))
														{{', ' . $converingCosts[$value3]}}
													@else
														{{$converingCosts[$value3]}}
													@endif
												@endforeach
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.wanted_persons') }}</span></dt>
											<dd>{{$schoolarship->limit}}{{ trans('label.last_name') }}</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.benefit_period') }}</span></dt>
											<dd>{{$schoolarship->benefit_period_month}}{{ trans('label.month') }}{{$schoolarship->benefit_period_year}}{{ trans('label.year') }}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.the_number_of_previous_applicant') }}</span></dt>
											<dd>{{$schoolarship->limit}}</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
						<div class="item sub" id="item03">
							<div class="heading">
								<h3 class="sub-title">{{ trans('label.qualifications') }}</h3>
							</div>
							<div class="block-body">
								<div class="table">
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.country_of_citizenship') }}</span></dt>
											<dd>
												@foreach ($schoolarship->nationality as $key4 => $value4)
													@if ($key4 == 0)
														{{$countries[$value4]}}
													@elseif ($key4 < count($schoolarship->nationality))
														{{', ' . $countries[$value4]}}
													@else
														{{$countries[$value4]}}
													@endif
												@endforeach
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.study_abroad_type_of') }}</span></dt>
											<dd>
												{{$educations}}
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.street_address') }}</span></dt>
											<dd>
												{{$provincesSchoolarship}}
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.study_abroad_period') }}</span></dt>
											<dd></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.age') }}</span></dt>
											<dd>{{$schoolarship->min_age}}{{ trans('label.age') }}〜{{$schoolarship->max_age}}{{ trans('label.up_to_age') }}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.stydy_abroad_destination_country') }}</span></dt>
											<dd>
												@foreach ($schoolarship->destination_country as $key => $desCountry)
                                                    <?php if ($desCountry == 'all') continue; ?>
													@if ($key == 0)
														{{$countries[$desCountry]}}
													@elseif ($key < count($schoolarship->destination_country))
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
											<dt><span>{{ trans('label.gender') }}</span></dt>
											<dd>{{$genders[$schoolarship->gender]}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.stydy_abroad_destination_country') }}</span></dt>
											<dd>
                                                @if (($states))
    												@foreach ($states as $key6 => $state)
    													@if ($key6 == 0)
    														{{$state}}
    													@elseif ($key6 < count($schoolarship->current_education))
    														{{', ' . $state}}
    													@else
    														{{$state}}
    													@endif
    												@endforeach
                                                @endif
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.current_course') }}</span></dt>
											<dd>
												@foreach ($schoolarship->current_education as $key5 => $value5)
													@if ($key5 == 0)
														{{$degrees[$value5]}}
													@elseif ($key5 < count($schoolarship->current_education))
														{{', ' . $degrees[$value5]}}
													@else
														{{$degrees[$value5]}}
													@endif
												@endforeach
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.school_type') }}</span></dt>
											<dd>
												@foreach ($schoolarship->academic as $key2 => $value2)
													@if ($key2 == 0)
														{{$academics[$value2]}}
													@elseif ($key2 < count($schoolarship->academic))
														{{', ' . $academics[$value2]}}
													@else
														{{$academics[$value2]}}
													@endif
												@endforeach
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.language_skill') }}</span></dt>
											<dd>
                                                @if (!empty($schoolarship->language))
    												@foreach ($schoolarship->language as $index => $language)
    													@if ($index == 0)
    														{{$language[0]}}
    													@elseif ($index < count($schoolarship->langage))
    														{{', ' . $language[0]}}
    													@else
    														{{$language[0]}}
    													@endif
    												@endforeach
                                                @endif
											</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.school_designation') }}</span></dt>
											<dd></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.location_at_the_time_application') }}</span></dt>
											<dd>{{ trans('label.japan') }}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.course_in_study_abroad') }}</span></dt>
											<dd>
												@foreach ($schoolarship->academic as $key2 => $value2)
													@if ($key2 == 0)
														{{$academics[$value2]}}
													@elseif ($key2 < count($schoolarship->academic))
														{{', ' . $academics[$value2]}}
													@else
														{{$academics[$value2]}}
													@endif
												@endforeach
											</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.other_conditions') }}</span></dt>
											<dd>-</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.major_type_of_study') }}</span></dt>
											<dd>
												@foreach ($schoolarship->major as $key6 => $value6)
													@if ($key6 == 0)
														{{$majors[$value6]}}
													@elseif ($key6 < count($schoolarship->major))
														{{', ' . $majors[$value6]}}
													@else
														{{$majors[$value6]}}
													@endif
												@endforeach
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
						<div class="item sub" id="item04">
							<div class="heading">
								<h3 class="sub-title">{{ trans('label.oranization_information') }}</h3>
							</div>
							<div class="block-body">
								<div class="table">
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.impleminting_organization_name') }}</span></dt>
											<dd>{{$schoolarship->oranization}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.impleminting_organization_type') }}</span></dt>
											<dd>{{$oranizationTypes[$schoolarship->type_of_oran]}}</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl>
											<dt><span>{{ trans('label.street_address') }}</span></dt>
											<dd>{{$schoolarship->organization_address}}</dd>
										</dl>
										<dl>
											<dt><span>{{ trans('label.phone_number') }}</span></dt>
											<dd>{{$schoolarship->organization_phone}}</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl class="full-width">
											<dt><span>{{ trans('label.website') }}</span></dt>
											<dd><a href="{{$schoolarship->url}}" target="_blank">{{$schoolarship->url}}</a></dd>
										</dl>
									</div>
									<div class="table-row">
										<dl class="full-width">
											<dt><span>{{ trans('label.purpose_of_independent') }}</span></dt>
											<dd>{{$schoolarship->purpose_of_scholarship_establishment}}</dd>
										</dl>
									</div>
									<div class="table-row">
										<dl class="full-width">
											<dt><span>{{ trans('label.the_spirit_of_the_schoolarship') }}<br>{{ trans('label.message_etc') }}</span></dt>
											<dd>{{$schoolarship->other_message}}</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="link-group bottom-link-group">
						<ul class="share-btn-item">
							<li>
								<a href="http://www.facebook.com/share.php?u=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" onclick="return fbs_click()" target="_blank">	<img src="/schoolynk/detailpage/images/icon-fb.png" alt="facebook">
								</a>
							</li>
							<li><a href="http://twitter.com/home?status=Currently reading http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" title="Click to share this post on Twitter" target="_blank"><img src="/schoolynk/detailpage/images/icon-tw.png" alt="twitter"></a></li>
							<li>
								<a class="gplus_icon" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}&redirect_uri=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" target='_blank'>
									<img src="/schoolynk/detailpage/images/icon-g.png" alt="はてなブックマーク">
								</a>
							</li>
						</ul>
						<a href="javascript:void(0)" class="btn btn-mylist">{{ trans('label.to_add_to_my_list') }}</a>
					</div>
					<div class="link-group" id="sp-link-group">
						<ul class="share-btn-item">
							<li>
								<a href="http://www.facebook.com/share.php?u=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" onclick="return fbs_click()" target="_blank">	<img src="/schoolynk/detailpage/images/icon-fb.png" alt="facebook">
								</a>
							</li>
							<li><a href="http://twitter.com/home?status=Currently reading http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" title="Click to share this post on Twitter" target="_blank"><img src="/schoolynk/detailpage/images/icon-tw.png" alt="twitter"></a></li>
							<li>
								<a class="gplus_icon" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}&redirect_uri=http://schoolynk.vasontel.com/schoolynk-detailpage/{{ $schoolarship->id }}" target='_blank'>
									<img src="/schoolynk/detailpage/images/icon-g.png" alt="はてなブックマーク">
								</a>
							</li>
						</ul>
						<a href="javascript:void(0)" class="btn btn-mylist">{{ trans('label.to_add_to_my_list') }}</a>
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
	<script>

		function fbs_click() {
			u=location.href;t=document.title;
			window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
			return false;
		}

		$(document).ready(function() {
		    // $('.scholarship-detail-anchor li').click(function() {
		    //   	$('.scholarship-detail-anchor li').removeClass('active');
		    //   	$(this).addClass('active');
		    // });
		    // $('.your-status li').click(function() {
		    //   	$('.your-status li').removeClass('active');
		    //   	$(this).addClass('active');
		    // });
		});

		$(function() {
		  	//$('a[href*=#]').click(function() {
		      	//var target = $(this.hash);
		      	//if (target) {
		          //var targetOffset = target.offset().top;
		          //$('html,body').animate({scrollTop: targetOffset},400,"easeInOutQuart");
		          //return false;
		        //}
		    //});
		
			$('#sp-link-group').hide();
			$(window).scroll(function () {
				if ( $(this).scrollTop() > 2000 ) {
					$('#sp-link-group').fadeOut("slow");
				} else {
					$('#sp-link-group').fadeIn("slow");
				}
			});
		});
		function fbs_click() {
			u = location.href;
			t = document.title;
		}
	</script>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

	    /**
	     * Add schoolarship to favorite page
	     */
	    $(".btn-mylist").click(function (e) {
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	            }
	        });

	        e.preventDefault(); 

	        var dataInput = {};
	        dataInput.schoolarId = $('#schoolarId').val();

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

	    /**
	     * Change status of schoolarship
	     * @return {Void}
	     */
	    $(".your-status li").click(function (e) {
	    	$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	            }
	        });

	        e.preventDefault(); 

	        var dataInput = {};
	        dataInput.schoolarId = $('#schoolarId').val();

	        $.ajax({

	            type: 'POST',
	            url: '/api/schoolarship/changeStatus',
	            data: dataInput,
	            dataType: 'json',
	            success: function (data) {
	            	if (data == 1) {
	            		// Remove all class active
	            		$(".your-status li").removeClass('active');

	            		// Add class active for status clicked
	            		$(e).addClass('active');
	            	} else {
	            		alert('Please! Login to continue.');
	            	}
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
	    });

	    // $('.btn-avatar').click(function (event) {
	    // 	event.preventDefault();
	    // 	event.stopPropagation()
	    // 	$('.dropdown-menu').toggle("show");
	    // });

	    // $('body').click(function() {
	    // 	if ($('.dropdown-menu').css('display') == 'block')
	    // 	$('.dropdown-menu').toggle("show");
	    // });
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

      // This is a functions that scrolls to #{blah}link
    function goToByScroll(id){
          // Remove "link" from the ID
        id = id.replace("link", "");
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
    }

</script>