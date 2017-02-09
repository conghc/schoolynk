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
						<span class="deadline"><span title="Deadline">D</span>{{ $scholarship->deadline_format }}</span>
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
							<div class="col-sm-3 dt-label">Type of award:</div>
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
							<div class="col-sm-3 dt-label">Amound of award:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->amount or '--' }}
								{{ $scholarship->currency or '--' }}/
								<span style="text-transform: capitalize">{{ $scholarship->frequency or '--' }}</span>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Type of cost covered:</div>
							<div class="col-sm-8 value">
								<?php
								$type_of_cost_covered = $scholarship->type_of_cost_covered ? $scholarship->type_of_cost_covered : [];
								for($i=0; $i<count($type_of_cost_covered); $i++){
									if($type_of_cost_covered[$i] == 1){
										echo('Tuition fee, ');
									}elseif($type_of_cost_covered[$i] == 2){
										echo('Living cost, ');
									}elseif($type_of_cost_covered[$i] == 3){
										echo('Others, ');
									}
									if($i < count($type_of_cost_covered) - 1){echo(', ');}
								}
								?>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Number of awards granted:</div>
							<div class="col-sm-8 value">{{ $scholarship->number_of_awards_granted or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Applicable scholarship year:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->applicable_year or '--' }} -
								{{ $scholarship->applicable_year_max or '--' }}
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Application deadline:</div>
							<div class="col-sm-8 value">{{ $scholarship->deadline_format or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Scholarship URL:</div>
							<div class="col-sm-8 value">{{ $scholarship->url ? $scholarship->url : '--' }}</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-block">Eligibility Requirement</h3>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Age:</div>
							<div class="col-sm-8 value">
								{{ $scholarship->age ? $scholarship->age : '--' }} -
								{{ $scholarship->age_max ? $scholarship->age_max : '--' }}
								years old
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Gender:</div>
							<div class="col-sm-8 value" style="text-transform: capitalize">
								<?php $gender = $scholarship->gender ? $scholarship->gender : '--';?>
								{{ $gender== 'both' ? 'Male, Female' : $gender }}
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Nationality:</div>
							<div class="col-sm-8 value val-nationality">
								@if($scholarship->nationality)
									@foreach($scholarship->nationality as $k=>$rc)
										{{ $rc->nationality or '--'}}
										{{ $k < $scholarship->nationality->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Current applicant academic level:</div>
							<div class="col-sm-8 value">
								@if($scholarship->academicLevel)
									@foreach($scholarship->academicLevel as $k=>$rc)
										{{ $rc->academic->name or '--' }}
										{{ $k < $scholarship->academicLevel->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Current place of residence:</div>
							<div class="col-sm-8 value">
								@if($scholarship->placeOfResidence)
									@foreach($scholarship->placeOfResidence as $k=>$rc)
										<?php $country_code = strtoupper($rc->country_code)?>
										{{ $countries[$country_code] }}
											{{ $k < $scholarship->placeOfResidence->count() - 1 ? ',' : '' }}
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
							<div class="col-sm-3 dt-label">Award can be used for:</div>
							<div class="col-sm-8 value">
								@if($scholarship->awardUsedFor)
									@foreach($scholarship->awardUsedFor as $k=>$rc)
										{{ $rc->awardUsedFor->name or '--' }}
										{{ $k < $scholarship->awardUsedFor->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Award can be used at:</div>
							<div class="col-sm-8 value award_can_be_used_at">
								@if($scholarship->awardUsedAt)
									@foreach($scholarship->awardUsedAt as $k=>$rc)
										{{ $rc->school_type or '--' }}
										{{ $k < $scholarship->awardUsedAt->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Qualified majors:</div>
							<div class="col-sm-8 value">
								@if($scholarship->majors)
									@foreach($scholarship->majors as $k=>$rc)
										{{ $rc->major->text or '' }}
										{{ $k < $scholarship->majors->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Designated area:</div>
							<div class="col-sm-8 value">
								@if($scholarship->designatedArea)
									@foreach($scholarship->designatedArea as $k=>$rc)
										{{ $states[$rc->state] }}
										{{ $k < $scholarship->designatedArea->count() - 1 ? ',' : '' }}
									@endforeach
								@endif
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Designated schools:</div>
							<div class="col-sm-8 value">
								@if($scholarship->for_all_school == 1)
									@foreach($schools as $k=>$school)
										{{ $school->name }} {{ $k < $schools->count() - 1 ? ',' : '' }}
									@endforeach
								@else
									@if($scholarship->schools)
										@foreach($scholarship->schools as $rc)
											{{ $rc->name or '--' }}<br />
										@endforeach
									@endif
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
							<div class="col-sm-3 dt-label">Selection method:</div>
							<div class="col-sm-8 value">
								<?php
								$application_method = $scholarship->application_method ? $scholarship->application_method : [];
								for($i=0; $i<count($application_method); $i++){
									if($application_method[$i] == 1){
										echo('Document screening');
									}elseif($application_method[$i] == 2){
										echo('Interview');
									}elseif($application_method[$i] == 3){
										echo('Examination');
									}
									if($i < count($application_method) - 1){echo(', ');}
								}
								?>
							</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Application requirements:</div>
							<div class="col-sm-8 value">
								{!! $scholarship->application_requirement or '' !!}
							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-block">Sponsorʼs information </h3>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Name of sponsor:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->name or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Sponsor type:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->sponsorType->name or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Sponsorʼs address:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->address or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Sponsors website:</div>
							<div class="col-sm-8 value">{{ $scholarship->sponsor->sponsorInfo->website or '--' }}</div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Contact:</div>
							<div class="col-sm-8 value"><a href="">{{ $scholarship->sponsor->email or '--' }}</a></div>
						</div>
						<div class="col-sm-12 child">
							<div class="col-sm-3 dt-label">Other information:</div>
							<div class="col-sm-8 value">{!! $scholarship->sponsor->sponsorInfo->other_information or '' !!}</div>
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