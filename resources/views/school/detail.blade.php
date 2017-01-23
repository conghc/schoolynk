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
	<link href="/frontend/css/plugins/slideshow/slideshow.css" rel="stylesheet">
	<link href="/frontend/css/plugins/slideshow/slideshow-allPhotos.css" rel="stylesheet">
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
			<li class="school current"><a href="#">School</a></li>
			<li class="coach"><a href="#">Coach</a></li>
			<li class="scholarship"><a href="#">Scholarship</a></li>
			<li class="message-box"><a href="#">Message box</a></li>
			<li class="my-profile"><a href="#">My profile</a></li>
		</ul>
	</nav>
</div>

<div class="container-fluid">
	<div class="row count-and-sort">
		<div class="col-sm-12">
			<span>School</span>
			<span>University of Compatible</span>
		</div>
	</div>
	<div class="row school-details">
		<div class="col-sm-4">
			<div class="detail-left">
				<img class="following" src="/frontend/img/icons/follow.png" />
				<div class="block block-top">
					<div class="col-sm-3">
						<a href="" class="avatar"><img src="/frontend/img/avatar3.jpg"></a>
					</div>
					<div class="col-sm-9">
						<a class="title" href="">
							<h4>{{ $school->name }}</h4>
							The Old schools, Trinity Ln
						</a>
						<a href="" class="ranking"><span>R</span>12</a>
						<div class="inner-detail-left">
							<div class="detail-row"><span class="label-left">School type:</span> Public</div>
							<div class="detail-row"><span class="label-left">Setting:</span> City</div>
							<div class="detail-row"><span class="label-left">English course:</span> Yes</div>
							<div class="detail-row"><span class="label-left">Web application:</span> Yes</div>
							<div class="detail-row"><span class="label-left">Website:</span> <a href="http://zing.vn" target="_blank">http://zing.vn</a></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="block block-between">
					<div class="col-sm-3"></div>
					<div class="col-sm-9">
						<div class="inner-detail-left">
							<div class="detail-row"><span class="label-left">Total students:</span> 34.000</div>
							<div class="detail-row"><span class="label-left">International students:</span> 997</div>
							<div class="detail-row"><span class="label-left">Tuition:</span> 19975-52000 lbs/year</div>
							<div class="detail-row"><span class="label-left">Cost of living:</span> Yes</div>
							<div class="detail-row"><span class="label-left">Website:</span> 9975 lbs/year</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="block block-bottom">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default btn-modify">Download brochure</button>
						<button type="button" class="btn btn-default btn-modify btn-modify-active">Contact admission</button>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="detail-right">
				<div class="slider_container">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<a href="#"><img src="/frontend/img/slide1.jpg" alt="" title=""/></a>
							</li>
							<li>
								<a href="#"><img src="/frontend/img/slide2.jpg" alt="" title=""/></a>
							</li>
							<li>
								<a href="#"><img src="/frontend/img/slide3.jpg" alt="" title=""/></a>
							</li>
							<li>
								<a href="#"><img src="/frontend/img/slide4.jpg" alt="" title=""/></a>
							</li>
						</ul>
						<button class="btn-allPhotos" type="button" data-toggle="modal" data-target="#viewAllPhotos">See all photos</button>
					</div>
				</div>
				<div class="numberFolllow">
						<span class="numberF">35.545 follow</soan>
							<button type="button" class="btn btn-default btn-modify btnF">Follow</button>
						<div class="clear"></div>
				</div>
			</div>
			<div class="detail-right">
				<div class="col-sm-12 schoolDetailFilter">
					<div class="col-sm-3 s-more-label">Faculty</div>
					<div class="col-sm-9 s-more-div">
						<select class="form-control input-select">
							<option>All</option>
							<option>123</option>
							<option>234</option>
							<option>345</option>
							<option>456</option>
						</select>
					</div>
					<div class="col-sm-3 s-more-label">Academic level</div>
					<div class="col-sm-9 s-more-div">
						<button type = "button" class = "btn btn-default btn-modify btn-modify-active" >Undergraduate</button>
						<button type = "button" class = "btn btn-default btn-modify" >Graduate</button>
					</div>
					<div class="col-sm-3 s-more-label">School/Department</div>
					<div class="col-sm-9 s-more-div">
						<select class="form-control input-select">
							<option>All</option>
							<option>123</option>
							<option>234</option>
							<option>345</option>
							<option>456</option>
						</select>
					</div>
				</div>
				<div class="clear"></div>
				<div class="schoolDetailFilterResults">
					<ul class="nav nav-tabs">
						<li class=""><a data-toggle="tab" href="#tab-major">Major</a></li>
						<li class=""><a data-toggle="tab" href="#tab-courseTuition">Course & tuition</a></li>
						<li class=""><a data-toggle="tab" href="#tab-courseTuition">Student</a></li>
						<li class=""><a data-toggle="tab" href="#tab-courseTuition">Support</a></li>
						<li><a data-toggle="tab" href="#tab-admission">Admission</a></li>
						<li><a data-toggle="tab" href="#tab-tuitionFee">Tuition fee</a></li>
						<li class="active"><a data-toggle="tab" href="#tab-scholarships">Scholarships</a></li>
						<li><a data-toggle="tab" href="#tab-others">others</a></li>
					</ul>

					<div class="tab-content">
						<div id="tab-major" class="tab-pane fade">
							<div class="list-major">
								<div class="col-sm-1 major-level"><span>B</span></div>
								<div class="col-sm-11">
									<div class="col-sm-6"><span class="major-title">A in Political Science</span></div>
									<div class="col-sm-6 interested"><button type="button" class="btn btn-default btn-modify">Interested</button></div>
									<div class="col-sm-6 major-option"><span class="major-label">Course term:</span> 4 years</div>
									<div class="col-sm-6 major-option"><span class="major-label">Language:</span> English</div>
									<div class="col-sm-6 major-option"><span class="major-label">Enrollment:</span> September</div>
									<div class="col-sm-6 major-option"><span class="major-label">Application preiod:</span> October - November</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="list-major">
								<div class="col-sm-1 major-level"><span>B</span></div>
								<div class="col-sm-11">
									<div class="col-sm-6"><span class="major-title">A in Political Science</span></div>
									<div class="col-sm-6 interested"><button type="button" class="btn btn-default btn-modify">Interested</button></div>
									<div class="col-sm-6 major-option"><span class="major-label">Course term:</span> 4 years</div>
									<div class="col-sm-6 major-option"><span class="major-label">Language:</span> English</div>
									<div class="col-sm-6 major-option"><span class="major-label">Enrollment:</span> September</div>
									<div class="col-sm-6 major-option"><span class="major-label">Application preiod:</span> October - November</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="list-major">
								<div class="col-sm-1 major-level"><span>B</span></div>
								<div class="col-sm-11">
									<div class="col-sm-6"><span class="major-title">A in Political Science</span></div>
									<div class="col-sm-6 interested"><button type="button" class="btn btn-default btn-modify">Interested</button></div>
									<div class="col-sm-6 major-option"><span class="major-label">Course term:</span> 4 years</div>
									<div class="col-sm-6 major-option"><span class="major-label">Language:</span> English</div>
									<div class="col-sm-6 major-option"><span class="major-label">Enrollment:</span> September</div>
									<div class="col-sm-6 major-option"><span class="major-label">Application preiod:</span> October - November</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div id="tab-scholarships" class="tab-pane fade">
							<div class="list-scholarships">
								<div class="col-sm-6"><h4>A in Political Science</h4></div>
								<div class="col-sm-6"><a href="" class="child-heart"></a></div>
								<div class="col-sm-12"><span class="sc-label">Sponsor:</span> Atsumi international Scholarship</div>
								<div class="col-sm-12"><span class="sc-label">Type:</span> Scholarship</div>
								<div class="col-sm-6"><span class="sc-label">Amount:</span> 400 USD/year </div>
								<div class="col-sm-6 wrap-deadline"><span class="deadline"><span>D</span>November 14, 2017</span></div>
								<div class="clear"></div>
							</div>
							<div class="list-scholarships">
								<div class="col-sm-6"><h4>A in Political Science</h4></div>
								<div class="col-sm-6"><a href="" class="child-heart"></a></div>
								<div class="col-sm-12"><span class="sc-label">Sponsor:</span> Atsumi international Scholarship</div>
								<div class="col-sm-12"><span class="sc-label">Type:</span> Scholarship</div>
								<div class="col-sm-6"><span class="sc-label">Amount:</span> 400 USD/year </div>
								<div class="col-sm-6 wrap-deadline"><span class="deadline"><span>D</span>November 14, 2017</span></div>
								<div class="clear"></div>
							</div>
						</div>
						<div id="tab-scholarships" class="tab-pane fade">
							123
						</div>
						<div id="tab-admission" class="tab-pane fade">
							<div class="listInfo">
								<span class="titleInfo">admission</span>
								<div class="contentInfo">
									It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
								</div>
							</div>
						</div>
						<div id="tab-tuitionFee" class="tab-pane fade">
							<div class="listInfo">
								<span class="titleInfo">tuitionFee</span>
								<div class="contentInfo">
									It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
								</div>
							</div>
						</div>
						<div id="tab-others" class="tab-pane fade">
							<div class="listInfo">
								<span class="titleInfo">others</span>
								<div class="contentInfo">
									It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
								</div>
							</div>
						</div>
						<div id="tab-courseTuition" class="tab-pane fade  in active">
							<div class="list-course list-course-active">
								<h3 class="titleCourse">Course A <span class="icon-course"></span></h3>
								<div class="innerCourse">
									<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>
								</div>
							</div>
							<div class="list-course">
								<h3 class="titleCourse">Course B <span class="icon-course"></span></h3>
								<div class="innerCourse">
									<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>
								</div>
							</div>
							<div class="list-course">
								<h3 class="titleCourse">Course C <span class="icon-course"></span></h3>
								<div class="innerCourse">
									<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="detail-right basicInfo">
				<h4>Basic information</h4>
				<div class="listInfo">
					<span class="titleInfo">Overview</span>
					<div class="contentInfo">
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
					</div>
				</div>
				<div class="listInfo">
					<span class="titleInfo">Colleges Features</span>
					<div class="contentInfo">
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
					</div>
				</div>
				<div class="listInfo">
					<span class="titleInfo">Map</span>
					<div class="contentMap">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br /><br /><br />

<!-- Modal -->
<div class="modal fade" id="viewAllPhotos" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<div id="all-photos">
					<div id="slideshow" class="fullscreen">
						<!-- Below are the images in the gallery -->
						<div id="img-1" data-img-id="1" class="img-wrapper active" style="background-image: url('../../frontend/img/img1.jpg')"></div>
						<div id="img-2" data-img-id="2" class="img-wrapper" style="background-image: url('../../frontend/img/img2.jpg')"></div>
						<div id="img-3" data-img-id="3" class="img-wrapper" style="background-image: url('../../frontend/img/img3.jpg')"></div>
						<div id="img-4" data-img-id="4" class="img-wrapper" style="background-image: url('../../frontend/img/img2.jpg')"></div>
						<div id="img-1" data-img-id="5" class="img-wrapper" style="background-image: url('../../frontend/img/img1.jpg')"></div>
						<div id="img-2" data-img-id="6" class="img-wrapper" style="background-image: url('../../frontend/img/img2.jpg')"></div>
						<div id="img-3" data-img-id="7" class="img-wrapper" style="background-image: url('../../frontend/img/img3.jpg')"></div>
						<div id="img-4" data-img-id="8" class="img-wrapper" style="background-image: url('../../frontend/img/img2.jpg')"></div>
						<div id="img-1" data-img-id="9" class="img-wrapper" style="background-image: url('../../frontend/img/img1.jpg')"></div>

						<!-- Below are the thumbnails of above images -->
						<div class="thumbs-container bottom">
							<div id="prev-btn" class="prev">
								<i class="fa fa-chevron-left fa-3x"></i>
							</div>

							<ul class="thumbs">
								<li data-thumb-id="1" class="thumb active" style="background-image: url('../../frontend/img/img1-thumb.jpg')"></li>
								<li data-thumb-id="2" class="thumb" style="background-image: url('../../frontend/img/img2-thumb.jpg')"></li>
								<li data-thumb-id="3" class="thumb" style="background-image: url('../../frontend/img/img3-thumb.jpg')"></li>
								<li data-thumb-id="4" class="thumb" style="background-image: url('../../frontend/img/img2-thumb.jpg')"></li>
								<li data-thumb-id="5" class="thumb" style="background-image: url('../../frontend/img/img1-thumb.jpg')"></li>
								<li data-thumb-id="6" class="thumb" style="background-image: url('../../frontend/img/img2-thumb.jpg')"></li>
								<li data-thumb-id="7" class="thumb" style="background-image: url('../../frontend/img/img3-thumb.jpg')"></li>
								<li data-thumb-id="8" class="thumb" style="background-image: url('../../frontend/img/img2-thumb.jpg')"></li>
								<li data-thumb-id="9" class="thumb" style="background-image: url('../../frontend/img/img1-thumb.jpg')"></li>
							</ul>

							<div id="next-btn" class="next">
								<i class="fa fa-chevron-right fa-3x"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>

<!-- IonRangeSlider -->
<script src="/frontend/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<!-- Flexslider -->
<script src="/frontend/js/plugins/flexslider/jquery.flexslider-min.js"></script>
<!-- show all -->
<script src="/frontend/js/plugins/flexslider/gallery-allPhotos.js"></script>
<script>
	$(function() {
		/*tabs*/
		$('.titleCourse').click(function(){
			//$('.list-course').removeClass('list-course-active');
			//$(this).parent().addClass('list-course-active');
			//$(this).closest("div").toggleClass("list-course-active");
			//parentElem = $(this).parent();
			//$('.list-course').removeClass('list-course-active');
			$(this).parent().toggleClass("list-course-active");
		});
		/*end tab*/
		$('.flexslider').mouseover(function(){
			$('.flex-direction-nav li a').show();
		});
		$('.flexslider').mouseout(function(){
			$('.flex-direction-nav li a').hide();
		});
		$('.flexslider').flexslider({
			animation: "fade"
		});

		$(function() {
			$('.show_menu').click(function(){
				$('.menu').fadeIn();
				$('.show_menu').fadeOut();
				$('.hide_menu').fadeIn();
			});
			$('.hide_menu').click(function(){
				$('.menu').fadeOut();
				$('.show_menu').fadeIn();
				$('.hide_menu').fadeOut();
			});
		});
	});

	function showAllPhotos(){
		$('#all-photos').show();
	}
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
<!-----google map----->
<script>
	function initMap(){
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: {lat: 20.9828981, lng: 105.8118248}
		});

		// Create an array of alphabetical characters used to label the markers.
		var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		// Add some markers to the map.
		// Note: The code uses the JavaScript Array.prototype.map() method to
		// create an array of markers based on a given "locations" array.
		// The map() method here has nothing to do with the Google Maps API.
		var markers = locations.map(function(location, i) {
			return new google.maps.Marker({
				position: location,
				label: labels[i % labels.length]
			});
		});

		// Add a marker clusterer to manage the markers.
		var markerCluster = new MarkerClusterer(map, markers,
				{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
	}
	var locations = [
		{lat: 20.9828981, lng: 105.8118248},
		{lat: 20.9868349, lng: 105.8104729},
		{lat: 20.9781198, lng: 105.8069968},
		{lat: 21.1042776, lng: 105.6993719}
	]
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVXF0yIJoMyVJ0F1zEc_ODEG_Ojn2B3ko&callback=initMap"></script>
</body>
</html>
