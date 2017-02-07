@extends('layouts.user')
@section('style')
	<link href="/frontend/css/nice-select.css" rel="stylesheet">
@endsection
@section('content')
	<div class="container-fluid scholarship-details">
		<div class="container">
			<div class="inner-scholarship-details">
				<div class="row">
					<div class="col-sm-7">
						<a href="" class="avatar"><img src="/{{ $scholarship->sponsor->img_profile or 'img/no-image.png' }}"></a>
						<a href="" class="title">
							<h3>{{ $scholarship->name }}</h3>
							<span>{{ $scholarship->name }}</span>
						</a>
						<span class="deadline"><span>D</span>{{ $scholarship->deadline_format }}</span>
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
							<div class="col-sm-8 value">
								<?php
								$type_of_award = $scholarship->type_of_award ? $scholarship->type_of_award : 0;
								if($type_of_award == 1){
									echo('Scholarship');
								}elseif($type_of_award == 2){
									echo('No interest loan');
								}elseif($type_of_award == 3){
									echo('Loan');
								}else{
									echo('--');
								}
								?>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Amound of award:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->amount or '--' }}
								{{ $scholarship->currency or '--' }}/
								<span style="text-transform: capitalize">{{ $scholarship->frequency or '--' }}</span>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Type of cost covered:</div>
							<div class="col-sm-8 value">
								<?php
								$type_of_cost_covered = $scholarship->type_of_cost_covered ? $scholarship->type_of_cost_covered : 0;
								if($type_of_cost_covered == 1){
									echo('Tuition fee');
								}elseif($type_of_cost_covered == 2){
									echo('Living cost');
								}elseif($type_of_cost_covered == 3){
									echo('Others');
								}else{
									echo('--');
								}
								?>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Number of awards granted:</div>
							<div class="col-sm-8 value">{{ $scholarship->number_of_awards_granted or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Applicable scholarship year:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->applicable_year or '--' }} -
								{{ $scholarship->applicable_year_max or '--' }}
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Application deadline:</div>
							<div class="col-sm-8 value">{{ $scholarship->deadline_format or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Scholarship URL:</div>
							<div class="col-sm-8 value">{{ $scholarship->url ? $scholarship->url : '--' }}</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-block">Eligibility Requirement</h3>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Age:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->age ? $scholarship->age : '--' }} -
								{{ $scholarship->age_max ? $scholarship->age_max : '--' }}
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Gender:</div>
							<div class="col-sm-8 value" style="text-transform: capitalize">{{ $scholarship->gender ? $scholarship->gender : '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Nationality:</div>
							<div class="col-sm-8 value">
								@if($scholarship->nationality)
									@foreach($scholarship->nationality as $rc)
										{{ $rc->nationality }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Current applicant academic level:</div>
							<div class="col-sm-8 value">
								@if($scholarship->academicLevel)
									@foreach($scholarship->academicLevel as $rc)
										{{ $rc->academic->name or '--' }},
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Current place of residence:</div>
							<div class="col-sm-8 value">
								@if($scholarship->placeOfResidence)
									@foreach($scholarship->placeOfResidence as $rc)
										<?php $country_code = strtoupper($rc->country_code)?>
										{{ $countries[$country_code] }},
									@endforeach
								@endif
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
							<div class="col-sm-8 value">
								@if($scholarship->awardUsedFor)
									@foreach($scholarship->awardUsedFor as $rc)
										{{ $rc->awardUsedFor->name or '--' }},
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Award can be used at:</div>
							<div class="col-sm-8 value">
								@if($scholarship->awardUsedAt)
									@foreach($scholarship->awardUsedAt as $rc)
										{{ $rc->school_type or '--' }},
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Qualified majors:</div>
							<div class="col-sm-8 value">
								@if($scholarship->majors)
									@foreach($scholarship->majors as $rc)
										{{ $rc->major->text or '--' }},
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Designated area:</div>
							<div class="col-sm-8 value">
								@if($scholarship->designatedArea)
									@foreach($scholarship->designatedArea as $rc)
										{{ $states[$rc->state] }},
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Designated schools:</div>
							<div class="col-sm-8 value">
								@if($scholarship->schools)
									@foreach($scholarship->schools as $rc)
										{{ $rc->name or '--' }}<br />
									@endforeach
								@endif
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
							<div class="col-sm-8 value">
								<?php
								$application_method = $scholarship->application_method ? $scholarship->application_method : 0;
								if($application_method == 1){
									echo('Document screening');
								}elseif($application_method == 2){
									echo('Interview');
								}elseif($application_method == 3){
									echo('Examination');
								}else{
									echo('--');
								}
								?>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Application requirements:</div>
							<div class="col-sm-8 value">
								{!! $scholarship->application_requirement or '' !!}}
							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-block">Sponsorʼs information </h3>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Name of sponsor:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->name or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Sponsor type:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->sponsorType->name or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Sponsorʼs address:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->address or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Sponsors website:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->website or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Contact:</div>
							<div class="col-sm-8 value"><a href="">{{ $scholarship->sponsor->email or '--' }}</a></div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3">Other information:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->other_information or '' }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<!-- Nice select -->
	<script src="/frontend/js/plugins/niceSelect/jquery.nice-select.min.js"></script>
	<script src="/frontend/js/plugins/niceSelect/fastclick.js"></script>
	<script src="/frontend/js/plugins/niceSelect/prism.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.nice-select').niceSelect();
			FastClick.attach(document.body);
		});
	</script>
@endsection