<!DOCTYPE html>
<html lang="en" ng-app="schoolynk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('label.scholarship') }}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!--css modifi-->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body id="app-layout" class="@if (Auth::guest()) gray-bg @endif">
    <div class="sk-spinner sk-spinner-wave" id="loading-fixed">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
    @if (Auth::guest())
    <div class="middle-box loginscreen animated fadeInDown">
        <div>
            <h3>Welcome to SchoLynk Dashboard</h3>
            {{--<p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.--}}
            {{--</p>--}}
            {{--<p>Login in. To see it in action.</p>--}}
            <form class="m-t" role="form" method="POST" action="{{ route('admin.login') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">{{ trans('label.login') }}</button>
                {{--<a href="#"><small>{{ trans('label.forgoten_password') }}</small></a>--}}
            </form>
            <div class="m-message" style="margin-top:5px">
                @include('flash::message')
            </div>
        </div>
    </div>
    @else
    
    <div id="wrapper">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- Navigation -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/img/admin.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }} </strong>
                             </span> <span class="text-muted text-xs block">Administrator <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">{{ trans('label.profile') }}</a></li>
                                <li><a href="contacts.html">{{ trans('label.setting') }}</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('admin.logout') }}">{{ trans('label.log_out') }}</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SL
                        </div>
                    </li>
                    <li class="{{ Route::is('admin.school.index') || Route::is('admin.school.create') ? 'active' : ''}}">
                        <a href="index.html"><i class="fa fa-university"></i> <span class="nav-label">{{ trans('label.school') }}</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ Route::is('admin.school.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.school.index') }}">{{ trans('label.school_list') }}</a>
                            </li>
                            <li class="{{ Route::is('admin.schoolarship.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.school.create') }}?sType=university">{{ trans('label.add_university') }}</a>
                            </li>
                            <li class="{{ Route::is('admin.schoolarship.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.school.create') }}?sType=vocational">{{ trans('label.add_vocational_school') }}</a>
                            </li>
                            <li class="{{ Route::is('admin.scholarship.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.school.create') }}?sType=language">{{ trans('label.add_language_school') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('admin.scholarship.index') || Route::is('admin.scholarship.create') ? 'active' : ''}}">
                        <a href="index.html"><i class="fa fa-graduation-cap"></i> <span class="nav-label">{{ trans('label.scholarship') }}</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ Route::is('admin.scholarship.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.scholarship.index') }}">{{ trans('label.scholarship_list') }}</a>
                            </li>
                            <li class="{{ Route::is('admin.scholarship.create') ? 'active' : '' }}">
                                <a href="{{ route('admin.scholarship.create') }}">{{ trans('label.scholarship_add') }}</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::user()->role == 1)
                    @endif
                    <li>
                        <a href="#"><i class="fa fa-thumbs-o-up" ></i> <span class="nav-label">Coach</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_results.html">n/a</a></li>
                            <li><a href="lockscreen.html">n/a</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('admin.student.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.student.index') }}">
                            <i class="fa fa-users"></i> <span class="nav-label">{{ trans('label.student') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Message</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_results.html">n/a</a></li>
                            <li><a href="lockscreen.html">n/a</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Report</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_results.html">n/a</a></li>
                            <li><a href="lockscreen.html">n/a</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">{{listLanguages()[language()]}}<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="{{(language() == 'en' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">English</a></li>
                                    <li><a class="{{(language() == 'vi' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Vietnamese</a></li>
                                    <li><a class="{{(language() == 'cns' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Chinese(Simplified)</a></li>
                                    <li><a class="{{(language() == 'cnt' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Chinese(Traditional)</a></li>
                                    <li><a class="{{(language() == 'th' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Thai</a></li>
                                    <li><a class="{{(language() == 'kr' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Korean</a></li>
                                    <li><a class="{{(language() == 'sp' ? 'language-choose active-language' : 'language-choose')}}" href="javascript:void(0)">Spanish</a></li>
                                </ul>
                            </li>
                            <li><a href="search_results.html">n/a</a></li>
                            <li><a href="lockscreen.html">n/a</a></li>
                        </ul>
                    </li>
                    <li class="landing_link">
                        <a target="_blank" href="Javascript:;"><i class="fa fa-star"></i> <span class="nav-label">FrontEnd</span> <span class="label label-warning pull-right">Go to</span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to SchooLynk Dashboard</span>
                        </li>
                        <li class="dropdown hd-list-plags">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img src="/img/flags/32/England.png" />
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="">
                                        <img src="/img/flags/32/England.png" /> English
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="">
                                        <img src="/img/flags/32/England.png" /> English
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="">
                                        <img src="/img/flags/32/England.png" /> English
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="">
                                        <img src="/img/flags/32/England.png" /> English
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fa fa-sign-out"></i> {{ trans('label.log_out') }}
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a class="right-sidebar-toggle">--}}
                                {{--<i class="fa fa-tasks"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-11">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                @yield('content')
            </div>
            <div class="footer">
                <div class="pull-right">
                    <div class="sk-spinner sk-spinner-cube-grid">
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                        <div class="sk-cube"></div>
                    </div>
                </div>
                <div>
                    <strong>Copyright</strong> Schoolynk Company &copy; 2016-2017
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    @endif


    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>
    <script src="/js/plugins/dragsort/jquery.dragsort-0.5.2.min.js"></script>
    @yield('js')
</body>
</html>