@extends('layouts.user')
@section('style')
	<link href="/frontend/css/plugins/slideshow/slideshow.css" rel="stylesheet">
	<link href="/frontend/css/plugins/slideshow/slideshow-allPhotos.css" rel="stylesheet">
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row count-and-sort">
			<div class="col-sm-12">
				<span class="listNav first">School<i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<span class="listNav">{{ $school->name }}</span>
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
								{{ $school->schoolInfo->location or '--' }}
							</a>
							@if($school->school_type != 'language')
							<a href="" class="ranking"><span>R</span>{{ $school->schoolInfo->ranking or '--' }}</a>
							@endif
							<div class="inner-detail-left">
								<div class="detail-row"><span class="label-left">School type:</span> {{ $school->schoolInfo->type_of_school or '--' }}</div>
								<div class="detail-row"><span class="label-left">Setting:</span> {{ $school->schoolInfo->setting or '--' }}</div>
								@if($school->school_type == 'language')
									<?php $lesson_format = isset($school->schoolInfo->lesson_format) ? $school->schoolInfo->lesson_format : 0;
										$lesson_format = $lesson_format == 1 ? 'Yes' : 'No';
									?>
									<div class="detail-row"><span class="label-left">Lesson format:</span> {{ $lesson_format }}</div>
								@else
									<?php
									$english_course = isset($school->schoolInfo->english_course) ? $school->schoolInfo->english_course : 0;
									$english_course = $english_course == 1 ? 'Yes' : 'No';
									?>
									<div class="detail-row"><span class="label-left">English course:</span> {{ $english_course }}</div>
								@endif
								<?php
								$web_application = isset($school->schoolInfo->web_application) ? $school->schoolInfo->web_application : 0;
								$web_application = $web_application == 1 ? 'Yes' : 'No';
								?>
								<div class="detail-row"><span class="label-left">Web application:</span> {{ $web_application }}</div>
								<div class="detail-row"><span class="label-left">Website:</span> <a href="http://zing.vn" target="_blank">{{ $school->schoolInfo->website or '--' }}</a></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="block block-between">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<div class="inner-detail-left">
								<div class="detail-row"><span class="label-left">Total students:</span> {{ $school->schoolInfo->total_no_of_students or '--' }}</div>
								@if($school->school_type == 'language')
									<div class="detail-row"><span class="label-left">Student per class:</span> {{ $school->schoolInfo->no_of_students_per_class or '--' }}</div>
									<div class="detail-row"><span class="label-left">Teachers:</span> {{ $school->schoolInfo->total_no_of_teachers or '--' }}</div>
								@else
									<div class="detail-row"><span class="label-left">International students:</span> {{ $school->schoolInfo->total_no_of_international_students or '--' }}</div>
								@endif

								<div class="detail-row"><span class="label-left">Tuition:</span>
									{{ $school->schoolInfo->tuition_fee or '--' }} -
									{{ $school->schoolInfo->tuition_fee_max or '--' }}
									{{ $school->schoolInfo->tuition_fee_currency or '--' }}/year
								</div>
								@if($school->school_type == 'language')
									<div class="detail-row"><span class="label-left">Student dorm:</span> {{ $school->schoolInfo->student_dorm or '--' }}</div>
								@endif
								<div class="detail-row"><span class="label-left">Cost of living:</span>
									{{ $school->schoolInfo->cost_of_living or '--' }} -
									{{ $school->schoolInfo->cost_of_living_max or '--' }}
									{{ $school->schoolInfo->cost_of_living_currency or '--' }}/year
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="block block-bottom">
						<div class="col-sm-12">
							<a target="_blank" class="btn btn-default btn-modify" href="/{{ $school->schoolInfo->brochure }}">Download brochure</a>
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
								@foreach($school->images as $image)
									<li>
										<a href="#"><img src="/{{ $image->path }}" alt="" title=""/></a>
									</li>
								@endforeach
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
					@if($school->school_type != 'language')
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
					@endif
					<div class="clear"></div>
					<div class="schoolDetailFilterResults">
						<ul class="nav nav-tabs">
							@if($school->school_type != 'language')
								<li class="active"><a data-toggle="tab" href="#tab-major">Major</a></li>
							@endif
							@if($school->school_type == 'language')
								<li class="active"><a data-toggle="tab" href="#tab-courseTuition">Course & tuition</a></li>
							@endif
								<li><a data-toggle="tab" href="#tab-admission">Admission</a></li>
							@if($school->school_type != 'language')
								<li><a data-toggle="tab" href="#tab-tuitionFee">Tuition fee</a></li>
							@endif
								<li class=""><a data-toggle="tab" href="#tab-scholarships">Scholarships</a></li>
							@if($school->school_type == 'language')
								<li class=""><a data-toggle="tab" href="#tab-student">Student</a></li>
								<li class=""><a data-toggle="tab" href="#tab-support">Support</a></li>
							@endif
								<li><a data-toggle="tab" href="#tab-others">Others</a></li>
						</ul>
						<div class="tab-content">
							@if($school->school_type != 'language')
								<div id="tab-major" class="tab-pane fade in active">
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
							@endif
							@if($school->school_type == 'language')
								<div id="tab-courseTuition" class="tab-pane fade in active">
										<div class="listInfo">
											<span class="titleInfo">others</span>
											<div class="contentInfo">
												It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
											</div>
										</div>
									</div>
							@endif
								<div id="tab-admission" class="tab-pane fade">
									<div class="listInfo">
										<span class="titleInfo">admission</span>
										<div class="contentInfo">
											It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
										</div>
									</div>
								</div>
							@if($school->school_type != 'language')
								<div id="tab-tuitionFee" class="tab-pane fade">
									<div class="listInfo">
										<span class="titleInfo">tuitionFee</span>
										<div class="contentInfo">
											It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
										</div>
									</div>
								</div>
							@endif
								<div id="tab-scholarships" class="tab-pane fade">
									@foreach($school->scholarships as $scholarship)
										<div class="list-scholarships">
											<div class="col-sm-6"><h4>{{ $scholarship->name or '--' }}</h4></div>
											<div class="col-sm-6"><a href="" class="child-heart"></a></div>
											<div class="col-sm-12"><span class="sc-label">Sponsor:</span> {{$scholarship->sponsor->name or '--'}}</div>
											<div class="col-sm-12"><span class="sc-label">Type:</span> Scholarship</div>
											<div class="col-sm-6"><span class="sc-label">Amount:</span>
												{{ $scholarship->amount or '--' }} {{ $scholarship->currency or '--' }}/{{ $scholarship->frequency or '--' }}
											</div>
											<div class="col-sm-6 wrap-deadline"><span class="deadline"><span>D</span>{{ $scholarship->deadline_format or '--' }}</span></div>
											<div class="clear"></div>
										</div>
									@endforeach
								</div>
							@if($school->school_type == 'language')
								<div id="tab-student" class="tab-pane fade">
									<div class="listInfo">
										<span class="titleInfo">others</span>
										<div class="contentInfo">
											It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
										</div>
									</div>
								</div>
								<div id="tab-support" class="tab-pane fade">
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
							@endif
								<div id="tab-others" class="tab-pane fade">
									<div class="listInfo">
										<span class="titleInfo">others</span>
										<div class="contentInfo">
											It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
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
							{{ $school->schoolInfo->overview }}
						</div>
					</div>
					<div class="listInfo">
						<span class="titleInfo">Colleges Features</span>
						<div class="contentInfo">
							{{ $school->schoolInfo->college_feature }}
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
							@foreach($school->images as $k=>$image)
								<div id="img-{{$k}}" data-img-id="{{$k}}" class="img-wrapper active" style="background-image: url('../../{{ $image->path }}')"></div>
							@endforeach

							<!-- Below are the thumbnails of above images -->
							<div class="thumbs-container bottom">
								<div id="prev-btn" class="prev">
									<i class="fa fa-chevron-left fa-3x"></i>
								</div>

								<ul class="thumbs">
									@foreach($school->images as $k=>$image)
										<li data-thumb-id="{{ $k }}" class="thumb {{ $k== 0 ? 'active' : '' }}" style="background-image: url('../../{{ $image->path }}')"></li>
									@endforeach
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
@endsection
@section('js')
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
@endsection