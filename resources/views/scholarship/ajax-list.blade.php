@foreach($scholarships as $k=>$ss)
	<div class="col-sm-6">
		<div class="school-child scholarship-child">
			<?php $img_profile = isset($ss->sponsor) ? $ss->sponsor->img_profile : 'img/no-image.png'?>
			<a href="/scholarship/detail/{{ $ss->id }}" class="avatar"><img src="/{{ $img_profile }}"></a>
			<a href="/scholarship/detail/{{ $ss->id }}" class="title">
				<h4>{{ $ss->name or '--' }}<span>International</span></h4>
			</a>
			<div class="clear"></div>
			<div class="row">
				<div class="col-sm-7">
					<span class="child-label">Sponsor :</span> {{ $ss->sponsor ? $ss->sponsor->name : 'n/a' }}
				</div>
				<div class="col-sm-5 wrap-deadline">
					<span class="deadline"><span title="Deadline" style="cursor:pointer">D</span>{{ $ss->deadline_format or '' }}</span>
				</div>
				<div class="col-sm-12">
					<span class="child-label">Type :</span>
					<?php
					$type_of_award = $ss->type_of_award ? $ss->type_of_award : 0;
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
				<div class="col-sm-12">
					<span class="child-label">Amount :</span> {{$ss->amount or ''}} {{$ss->currency or ''}} / {{$ss->frequency or ''}}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-7">
					<span class="child-label" style="line-height:41px">Number of awards granted :</span> {{ $ss->number_of_awards_granted or 0 }}
					{{--<span class="child-label">Applicable scholarship year :</span> {{ $ss->applicable_year or '--' }} - {{ $ss->applicable_year_max or '--' }}--}}
				</div>
				<div class="col-sm-5">
					<a href="" class="child-heart"></a>
					<button type="button" class="btn btn-default btn-modify">In Progess</button>
				</div>
			</div>
		</div>
	</div>
@endforeach