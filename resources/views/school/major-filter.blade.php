@foreach($major as $k=>$mj)
	<div class="list-major">
		<div class="col-sm-1 major-level"><span>B</span></div>
		<div class="col-sm-11">
			<div class="col-sm-6"><span class="major-title">{{ $mj->text or '--'}}</span></div>
			<div class="col-sm-6 interested"><button type="button" class="btn btn-default btn-modify">Interested</button></div>
			<?php $course_term = explode('_', $mj->course_term)?>
			<div class="col-sm-6 major-option"><span class="major-label">Course term:</span> {{ $course_term[0] or ''}} {{ $course_term[1] or ''}}</div>
			<div class="col-sm-6 major-option"><span class="major-label">Language:</span> {{ $mj->language or '--'}}</div>
			<div class="col-sm-6 major-option"><span class="major-label">Enrollment:</span> {{ $mj->enrollment or '--'}}</div>
			<div class="col-sm-6 major-option"><span class="major-label">Application preiod:</span> {{ $mj->application_period or '--'}} - {{ $mj->application_period_max or '--'}}</div>
		</div>
		<div class="clear"></div>
	</div>
@endforeach