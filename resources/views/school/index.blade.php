@extends('layouts.user')
@section('style')
	<link href="/frontend/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
	<link href="/frontend/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
@endsection
@section('content')
	<div class="advanced-search">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 s-keyword">
					<input type="text" id="keyword" class="form-control input-text-modify" placeholder="School name" />
				</div>
				<div class="col-sm-8 s-more">
					<div class="col-sm-3 s-more-label">Type of school</div>
					<div class="col-sm-9 s-more-div">
						<button type="button" class="btn btn-default btn-modify typeSchool btn-modify-active" d="all">All</button>
						<button type="button" class="btn btn-default btn-modify typeSchool" d="university">University</button>
						<button type="button" class="btn btn-default btn-modify typeSchool" d="vocational" >Vocational School</button>
						<button type="button" class="btn btn-default btn-modify typeSchool" d="language">Language School</button>
						<input type="hidden" id="typeSchool" value="all">
					</div>
					<div class="col-sm-3 s-more-label">Area</div>
					<div class="col-sm-9 s-more-div">
						<button type="button" class="btn btn-default btn-modify filterState btn-modify-active" d="0">All</button>
						<button type="button" class="btn btn-default btn-modify filterState" d="13">Tokyo</button>
						<button type="button" class="btn btn-default btn-modify filterState" d="27">Osaka</button>
						<button type="button" class="btn btn-default btn-modify filterState" d="26">Kyoto</button>
						<button type="button" class="btn btn-default btn-modify filterState" d="40">Fukuoka</button>
						<button type="button" class="btn btn-default btn-modify filterState filterStateOthers" d="" data-toggle="modal" data-target="#otherState">Others</button>
						<input type="hidden" value="0" id="filterState">
					</div>
					<div class="col-sm-3 s-more-label">Major</div>
					<div class="col-sm-9 s-more-div">
						<select class="form-control input-select" id="filterMajor">
							<option value="0" selected>All</option>
							@foreach($majors as $major)
								<option value="{{ $major->id }}">{{ $major->text }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-3 s-more-label">Ranking</div>
					<div class="col-sm-6 s-more-div">
						<input type="text" id="ranking-range" name="example_name" value="" />
						<input type="hidden" id="rankingFrom" value="1" />
						<input type="hidden" id="rankingTo" value="300" />
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row count-and-sort">
			<div class="col-sm-6">
				<span><span class="number-records">{{ $schools->count() }}</span> search results</span>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-4"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"><span>Sort by</span></div>
				<div class="col-sm-4">
					<select class="form-control input-select">
						<option value="0">All</option>
						<option value="1">Following</option>
						<option value="2">Not following</option>
					</select>
				</div>
			</div>
		</div>
		<input type="hidden" id="page" value="{{ $schools->currentPage() }}">
		<div class="row school-list">

		</div>
		<div class="col-sm-12" id="home-load-more">
			<button type = "button" class = "btn btn-default btn-modify btn-modify-active btn-load-more" onclick="loadMore()">Load more</button>
		</div>
	</div>
	<!-- Modal other State -->
	<div id="otherState" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					@foreach($states as $k=>$state)
						@if(!in_array($k, [13,26,27,40]))
						<button style="margin:0px 4px 4px 0px" data-dismiss="modal" type="button" class="btn btn-default btn-modify filterState" d="{{ $k }}">{{ $state }}</button>
						@endif
					@endforeach
				</div>
			</div>

		</div>
	</div>

@endsection
@section('js')
	<script src="/frontend/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
	<script type="text/javascript">
		$(function() {

		});
		$('.filterState').on('click', function(e){
			d = $(this).attr('d');
			if(d != '') {
				$('.filterState').removeClass('btn-modify-active');
				$(this).addClass('btn-modify-active');
			}
			if(d != 13 && d != 26 && d != 27 && d != 40 && d != ''){
				$('.filterStateOthers').addClass('btn-modify-active');
			}
			if(d != ''){
				$('#filterState').val(d);
			}
			listSchools();
		});
		$('#filterMajor').on('change', function(event){
			listSchools();
		});

		$( "#keyword" ).bind('input' ,function( event ) {
			listSchools();
		});

		$('.typeSchool').on('click', function(e){
			$('.typeSchool').removeClass('btn-modify-active');
			$(this).addClass('btn-modify-active');
			$('#typeSchool').val($(this).attr('d'));
			listSchools();
			listMajors();
		});
		function listSchools(){
			$('.sk-spinner-wave').show();
			var values = {};
			values['from'] = $('#rankingFrom').val();
			values['to'] = $('#rankingTo').val();
			values['typeSchool'] = $('#typeSchool').val();
			values['keyword'] = $('#keyword').val();
			values['major'] = $('#filterMajor').val();
			values['state'] = $('#filterState').val();
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				url: '/list-school',
				type: 'POST',
				data: values,
				success: function (data) {
					$('.school-list').html(data);
					$('.sk-spinner-wave').hide();
					$('.number-records').html($('.school-child').length);
				}
			});
		}
		
		function listMajors() {
			var values = {};
			values['typeSchool'] = $('#typeSchool').val();
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				url: '/list-majors',
				type: 'POST',
				data: values,
				success: function (list) {
					$('#filterMajor').html(list);
					$('.sk-spinner-wave').hide();
				}
			});
		}

		var range = $("#ranking-range");
		$(range).ionRangeSlider({
			type: "double",
			min: 1,
			max: 300,
			from: 1,
			to: 300,
			step: 1,
			hide_min_max: true,
			onStart: function (data) {
			 //console.log(1);
			},
			onChange: function (data) {
			 //console.log(2);
			},
			onFinish: function (data) {
				$('#rankingFrom').val(data.from);
				$('#rankingTo').val(data.to);
				listSchools();
			},
			onUpdate: function (data) {
			 //console.log(4);
			}
		});
		$(range).on("change", function () {
			var $this = $(this),
					value = $this.prop("value").split(";");

			//console.log(value[0] + " - " + value[1]);
		});

		function loadMore(){
			var values = {};
			$('.sk-spinner-wave').show();
			currentPage = $('#page').val();
			page = parseInt(currentPage) + 1;
			values["page"] = page;
			values['from'] = $('#rankingFrom').val();
			values['to'] = $('#rankingTo').val();
			values['typeSchool'] = $('#typeSchool').val();
			values['keyword'] = $('#keyword').val();
			values['major'] = $('#filterMajor').val();
			values['state'] = $('#filterState').val();
			$.ajax({
				//headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				url: '/',
				type: 'GET',
				data: values,
				success: function (data) {
					$('.school-list').append(data);
					$('#page').val(page);
					$('.number-records').html($('.school-child').length);
					$('.sk-spinner-wave').hide();
				}
			});
		}
	</script>
@endsection