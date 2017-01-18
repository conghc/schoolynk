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
	<link href="/frontend/css/nice-select.css" rel="stylesheet">
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
<div class="container-fluid scholarship-details">
	<div class="inner-scholarship-details">
		<div class="row">
			<div class="col-sm-7">
				<a href="" class="avatar"><img src="/frontend/img/avatar3.jpg"></a>
				<a href="" class="title">
					<h3>INOAC International Scholarship 2016</h3>
					<span>INOAC International Education and Scholarship Foundation</span>
				</a>
				<span class="deadline"><span>D</span>November 14, 2017</span>
			</div>
			<div class="col-sm-5" style="text-align:right">
				<a href="" class="child-heart"></a>
				<button type="button" class="btn btn-default btn-modify">Message</button>
				<select class="nice-select">
					<option value="1">Applied</option>
					<option value="2">In progess</option>
					<option value="4">Not Applied</option>
				</select>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-block">General Information</h3>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Type of award:</div>
					<div class="col-sm-8 value">Scholarship</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Amound of award:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Type of cost covered:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Number of awards granted:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Applicable scholarship year:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Application deadline:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Scholarship URL:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-block">Eligibility Requirement</h3>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Age:</div>
					<div class="col-sm-8 value">Scholarship</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Gender:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Nationality:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Current applicant academic level:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Current place of residence:</div>
					<div class="col-sm-8 value">
						400 USD/month<br />
						400 USD/month<br />
						400 USD/month<br />
						400 USD/month<br />
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-block">Qualified school and academic level </h3>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Award can be used for:</div>
					<div class="col-sm-8 value">Scholarship</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Award can be used at:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Qualified majors:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Designated area:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Designated schools:</div>
					<div class="col-sm-8 value">
						400 USD/month<br />
						400 USD/month<br />
						400 USD/month<br />
						400 USD/month<br />
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-block">Application requirement and process </h3>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Selection method:</div>
					<div class="col-sm-8 value">Scholarship</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Application requirements:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-block">Sponsorʼs information </h3>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Name of sponsor:</div>
					<div class="col-sm-8 value">Scholarship</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Sponsor type:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Sponsorʼs address:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Sponsors website:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Contact:</div>
					<div class="col-sm-8 value"><a href="">Send message</a></div>
				</div>
				<div class="col-sm-12 child">
					<div class="col-sm-3">Other information:</div>
					<div class="col-sm-8 value">400 USD/month</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br /><br /><br />


<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>

<!-- IonRangeSlider -->
<script src="/frontend/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<!-- Nice select -->
<script src="/frontend/js/plugins/niceSelect/jquery.nice-select.min.js"></script>
<script src="/frontend/js/plugins/niceSelect/fastclick.js"></script>
<script src="/frontend/js/plugins/niceSelect/prism.js"></script>
<script>
	$(document).ready(function() {
		$('.nice-select').niceSelect();
		FastClick.attach(document.body);
	});
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
