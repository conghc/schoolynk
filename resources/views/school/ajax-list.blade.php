@foreach($schools as $k=>$school)
	<div class="col-sm-4">
		<div class="school-child">
			<img class="following" src="/frontend/img/icons/follow.png">
			<a href="/school/detail/{{ $school->id }}" class="avatar"><img src="/{{ $school->img_profile != null ? $school->img_profile : 'img/no-image.png' }}"></a>
			<a href="/school/detail/{{ $school->id }}" class="title">
				<h5>{{ $school->name }}</h5>
				<span>{{ $school->schoolInfo->location or '--' }}</span>
			</a>
			<div class="clear"></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-3 storage-ranking"><a href="" class="ranking" title="Ranking"><span>R</span>{{ $school->schoolInfo->ranking or 0 }}</a></div>
			<div class="col-sm-6"></div>
			<div class="col-sm-8"></div>
			<div class="col-sm-4"><button type="button" class="btn btn-default btn-modify">Follow</button></div>
		</div>
	</div>
@endforeach