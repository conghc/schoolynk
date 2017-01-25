@foreach($text as $k=>$t)
	<div class="listInfo">
		<span class="titleInfo">{{ $t->name or '' }}</span>
		<div class="contentInfo">
			{!! $t->content or '' !!}
		</div>
	</div>
@endforeach