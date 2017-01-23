<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <!--<link rel="icon" href="img/favicon.ico">-->
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/fonts/roboto-fonts/roboto-fonts.css" rel="stylesheet">
    <link href="/frontend/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="/frontend/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/frontend/css/style.css" rel="stylesheet">
    <link href="/frontend/css/icon-loading.css" rel="stylesheet">
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
<div class="advanced-search">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 s-keyword">
                <input type="text" class="form-control input-text-modify" placeholder="School name" />
            </div>
            <div class="col-sm-8 s-more">
                <div class="col-sm-3 s-more-label">Type of school</div>
                <div class="col-sm-9 s-more-div">
                    <button type = "button" class = "btn btn-default btn-modify btn-modify-active" >All</button>
                    <button type = "button" class = "btn btn-default btn-modify" >University</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Vocational School</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Language School</button>
                </div>
                <div class="col-sm-3 s-more-label">Area</div>
                <div class="col-sm-9 s-more-div">
                    <button type = "button" class = "btn btn-default btn-modify btn-modify-active" >All</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Tokyo</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Osaka</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Kyoto</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Fukuoka</button>
                    <button type = "button" class = "btn btn-default btn-modify" >Others</button>
                </div>
                <div class="col-sm-3 s-more-label">Major</div>
                <div class="col-sm-9 s-more-div">
                    <select class="form-control input-select">
                        <option>All</option>
                        <option>123</option>
                        <option>234</option>
                        <option>345</option>
                        <option>456</option>
                    </select>
                </div>
                <div class="col-sm-3 s-more-label">Ranking</div>
                <div class="col-sm-6 s-more-div">
                    <input type="text" id="ranking-range" name="example_name" value="" />
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row count-and-sort">
        <div class="col-sm-6">
            <span>84 search results</span>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-4"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"><span>Sort by</span></div>
            <div class="col-sm-4">
                <select class="form-control input-select">
                    <option>All</option>
                    <option>123</option>
                    <option>234</option>
                    <option>345</option>
                    <option>456</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row school-list">
        @foreach($schools as $k=>$school)
            <div class="col-sm-4">
                <div class="school-child {{ $k < 2 ? 'school-child-applied' : '' }}">
                    <a href="/school/detail/{{ $school->id }}" class="avatar"><img src="/{{ $school->img_profile != null ? $school->img_profile : 'img/no-image.png' }}"></a>
                    <a href="/school/detail/{{ $school->id }}" class="title">
                        <h5>{{ $school->name }}</h5>
                        <span>The old schools, Trinity Ln</span>
                    </a>
                    <div class="clear"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 storage-ranking"><a href="" class="ranking"><span>R</span>12</a></div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4"><button type="button" class="btn btn-default btn-modify">Follow</button></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-sm-12" id="home-load-more">
        <button type = "button" class = "btn btn-default btn-modify btn-modify-active btn-load-more" onclick="loadMore()">Load more</button>
    </div>
</div>
<br /><br /><br />


<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>

<!-- IonRangeSlider -->
<script src="/frontend/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script>

    var range = $("#ranking-range");
    $(range).ionRangeSlider({
        type: "double",
        min: 1,
        max: 300,
        from: 1,
        to: 300,
        step: 1,
        /*onStart: function (data) {
         console.log(data);
         },
         onChange: function (data) {
         console.log(data);
         },
         onFinish: function (data) {
         console.log(data);
         },
         onUpdate: function (data) {
         console.log(data);
         }*/
    });
    $(range).on("change", function () {
        var $this = $(this),
                value = $this.prop("value").split(";");

        //console.log(value[0] + " - " + value[1]);
    });

    function loadMore(){
        $('.uil-facebook-css').show();
        html = '<div class="col-sm-4">';
        html += '<div class="school-child"></div>';
        html += '</div>';
        $('.school-list').append(html + html + html);

        slider = $("#ranking-range").data("ionRangeSlider");
        slider.reset();

        //$('.uil-facebook-css').hide();
    }
</script>
</body>
</html>
