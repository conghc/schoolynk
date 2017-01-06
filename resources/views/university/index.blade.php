@extends('layouts.user') 
@section('style')
<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
@endsection

@section('content')
<section>
    <div class="inner inner-md-1">
        <div class="section-ui">
            <div class="container-fluid">
				<form class="form-horizontal form-primary" id="frm-search">
					<div class="panel panel-default">
						<div class="panel-heading fw-b">{{ trans('label.search_students') }}</div>
						<div class="panel-body">
							<!-- Search left -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.country_of_citizenship') }}</label>
									<div class="col-md-8 default-bootstrap-btn">
										<select class="form-control" name='nationality[]' data-parsley-required multiple data-live-search="true" data-actions-box="true">
											@foreach($nationalities as $nationality)
											<option value='{{ $nationality }}'> 
												{{ $nationality }} 
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.we_are_interested_in_country') }}</label>
									<div class="col-md-8 default-bootstrap-btn">
										<select class="form-control" name="country_interested[]" data-parsley-required multiple data-live-search="true" data-actions-box="true">
											@foreach ( $countries as $k => $country)
											<option value="{{ $k }}">{{ $country }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.gender') }}</label>
									<div class="col-md-8">
										<div class="radio-inline">
											<label><input type="radio" name="gender" value='0' required="">{{ trans('label.male') }}</label>
										</div>
										<div class="radio-inline">
											<label><input type="radio" name="gender" value='1' required="">{{ trans('label.female') }}女性</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.age') }}</label>
									<div class="col-md-4">
										<select class="form-control ta-c" name='min_age' data-parsley-required>
											<option value=''> {{ trans('label.begin') }} </option>
											@for ($i = 1; $i <= 60 + 10; $i++)
											<option value='{{ $i }}'> {{ $i }} </option>
											@endfor
										</select>
									</div>
									<div class="col-md-4">
										<select class="form-control ta-c" name='max_age' data-parsley-required>
											<option value=''> {{ trans('label.end') }} </option>
											@for ($i = 1; $i <= 60 + 10; $i++)
											<option value='{{ $i }}'> {{ $i }} </option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<!-- ./Search left -->

							<!-- Search right -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.school_year') }}</label>
									<div class="col-md-8 default-bootstrap-btn">
										<select class="form-control" name='degree[]' data-parsley-required multiple>
											@foreach($degrees as $degree)
											<option value='{{ $degree->id }}'> {{ $degree->name }} </option>
											@endforeach
										</select>
									</div>
								</div>
								{{-- Study abroad start year --}}
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.year_i_want_to_study_abroad') }}</label>
									<div class="col-md-4">
										<select class="form-control" name='benefit_period_month' data-parsley-required>
											<option value=''> ○○{{ trans('label.day') }} </option>
											@for ($i = 0; $i <= 12; $i++)
											<option value='{{ $i }}'> {{ $i }} ○○{{ trans('label.day') }}</option>
											@endfor
										</select>
									</div>
									<div class="col-md-4">
										<select class="form-control" name='benefit_period_year' data-parsley-required>
											<option value=''> {{ trans('label.year') }} </option>
											@for ($i = 0; $i <= 20; $i++)
											<option value='{{ $i }}'> {{ $i }} {{ trans('label.year') }}</option>
											@endfor
										</select>
									</div>                            
								</div>
								{{-- ./ Study abroad start year --}}
								{{-- Study abroad end year --}}
								<div class="form-group">
									<label class="col-md-4 control-label"></label>
									<div class="col-md-4">
										<select class="form-control" name='benefit_period_month_max'>
											<option value=''> {{ trans('label.day') }} </option>
											@for ($i = 0; $i <= 12; $i++)
											<option value='{{ $i }}'> {{ $i }} {{ trans('label.day') }}</option>
											@endfor
										</select>
									</div>

									<div class="col-md-4">
										<select class="form-control" name='benefit_period_year_max'>
											<option value=''> {{ trans('label.year') }} </option>
											@for ($i = 0; $i <= 20; $i++)
											<option value='{{ $i }}'> {{ $i }} {{ trans('label.year') }}</option>
											@endfor
										</select>
									</div>
								</div>
								{{-- ./ Study abroad end year --}}
								{{-- Type of Study abroad --}}
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.type_of_study_abroad') }}</label>
									<div class="col-md-8 default-bootstrap-btn">
										<select class="form-control" name='type_of_study[]' data-parsley-required multiple data-actions-box="true">
											@foreach($typeOfStudies as $typeOfStudy)
											<option value='{{ $typeOfStudy->id }}'> {{ $typeOfStudy->name }} </option>
											@endforeach
										</select>
									</div>
								</div>        
								{{-- ./ Type of Study abroad --}}
								{{-- Interested major --}}
								<div class="form-group">
									<label class="col-md-4 control-label">{{ trans('label.major_areas_of_interest') }}</label>
									<div class="col-md-8 default-bootstrap-btn">
										<select class="form-control parsley-change" name='major[]' multiple data-live-search="true" data-actions-box="true">
											@foreach($majors as $major)
											<option value='{{ $major->id }}'> {{ $major->name }} </option>
											@endforeach
										</select>
									</div>
								</div>
								{{-- ./ Interested major --}}
							</div>
							<div class="col-xs-12 ta-r">
								<div id="btn-search" type="submit" class="btn btn-success mg-t-sm btn-init">{{ trans('label.search') }}</div>
							</div>
							<!-- ./Search right -->
						</div>
					</div>
				</form>

				<div class="panel panel-success student-search">
					<div class="panel-heading fw-b">{{ trans('label.search_result') }}</div>
					<div class="panel-body dataTB-hidden-length dataTB-hidden-filter dataTB-hidden-info">
						<table class="table table-hover " id="table-search">
							<thead>
								<tr>
									<th>{{ trans('label.name') }}</th>
									<th>{{ trans('label.age') }}</th>
									<th>{{ trans('label.country_of_citizenship') }}</th>
									<th>{{ trans('label.school_year') }}</th>
									<th>{{ trans('label.type_of_study_abroad') }}</th>
									<th>{{ trans('label.major_areas_of_interest') }}</th>
									<th class="no-icon"></th>
								</tr>
							</thead>
							<tbody id="search-body">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- ./ Container -->

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('label.student_profile') }}</h4>
	      </div>
	      <!-- modal-body -->
	      <div class="modal-body">
	      	<!-- panel -->
	      	<div class="panel panel-success get-student-info" data-id="">
	      		<!-- Overview -->
	      	    <div class="panel-heading text-success fw-b">
	      	    	<span>{{ trans('label.overview') }}</span>
	      	    	<div class="fl-r" >
      	    			<i id="add-favorite" class="glyphicon glyphicon-star glyphicon-star-empty cus-p fs-xxlg mg-r-sm" data-favorite="false" title="Favorite" data-studentID=""></i>
      	    			<i class="glyphicon glyphicon-envelope cus-p fs-xxlg send-message" title="Send message"></i>
	      	    	</div>
	  	    	</div>
	      	    <div class="panel-body">
	      	    	<div class="row">
		  	            <div class="col-xs-8">
		  	            	<div class="row">
				  	            <div class="col-xs-6">{{ trans('label.name') }}:</div>
				  	            <div class="col-xs-6 data-name ovh">.</div>
				  	            <div class="col-xs-6">{{ trans('label.age') }}:</div>
				  	            <div class="col-xs-6 data-age">.</div>
				  	            <div class="col-xs-6">{{ trans('label.gender') }}:</div>
				  	            <div class="col-xs-6 data-gender">.</div>
				  	            <div class="col-xs-6">{{ trans('label.country') }}:</div>
				  	            <div class="col-xs-6 data-nationality">.</div>
				  	            <div class="col-xs-6">{{ trans('label.address') }}:</div>
				  	            <div class="col-xs-6 data-address">.</div>
		  	            	</div>
		  	            </div>
		  	            <div class="col-xs-4">
	  	            		<img id="avatar" class="thumbnail" data-holder-rendered="true" style="width: 200px; display: block;"> 
		  	            </div>
	      	    	</div>
	            </div>                            
	      		<!-- ./Overview -->
	      		<!-- Current education -->
	      		<div class="panel-heading text-success fw-b">{{ trans('label.current_education') }}</div>
	      	    <div class="panel-body">
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.current_education_level') }}: </div>
		  	            <div class="col-xs-6 col-md-8 data-education">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.school_name') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-name-of-school">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.expected_graduation_time') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-expected-graduation">.</div>
	      	    	</div>
	            </div>                            
	      		<!--./Current education -->
	      		<!-- Study-abroad -->
	      		<div class="panel-heading text-success fw-b">{{ trans('label.current_education') }}</div>
	      	    <div class="panel-body">
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.academic_program') }}: </div>
		  	            <div class="col-xs-6 col-md-8 data-program">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.type') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-type">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.expected_start') }}</div>
		  	            <div class="col-xs-6 col-md-8 data-expected-start">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.major') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-major">.</div>
	      	    	</div>
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.destination') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-destination">.</div>
	      	    	</div>
	            </div>                            
	      		<!--./Study-abroad -->
	      		<div class="panel-heading text-success fw-b">{{ trans('label.skill') }}</div>
	      	    <div class="panel-body">
	      	    	<div class="row">
		  	            <div class="col-xs-6 col-md-4">{{ trans('label.language') }}:</div>
		  	            <div class="col-xs-6 col-md-8 data-language">.</div>
	      	    	</div>
	            </div>                            
	      	<!--./ panel -->
	      </div>
	    </div>
	  </div>
  </div>
</div>

<!-- Modal Send Message-->
<div class="modal fade" id="modalSendMessage" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <!-- modal-body -->
	      <div class="modal-body">
	      	<div class="row">
	      	    <div class="col-xs-offset-1 col-xs-10">
	      	    	<form class="form-horizontal" id="frm-send-mes" action="{{ route('university.sendMessage') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
	      	    		{!! csrf_field() !!}
	      	    		<div class="form-group">
	      	    			<input type="hidden" name="student_id">
	      	    			<input type="hidden" name="university_id">
	      	    			<label class="col-md-4 control-label">{{ trans('label.title') }}</label>
	      	    			<div class="col-md-8">
	      	    				<input type="text" name="title" class="form-control" data-parsley-required>
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-4 control-label">{{ trans('label.message') }}</label>
	      	    			<div class="col-md-8">
	      	    				<textarea name="message" class="form-control" data-parsley-required></textarea>
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-4 control-label">{{ trans('label.file') }}</label>
	      	    			<div class="col-md-8">
	      	    				<input type="file" name="file" class="form-control">
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-4 control-label"></label>
	      	    			<div class="col-md-8">
	      	    				<button class="btn btn-success">{{ trans('label.send_btn') }}</button>
	      	    			</div>
	      	    		</div>
	      	    	</form>
	      	    </div>
      	    </div>
	      </div>
	    </div>
	  </div>
  </div>
</div>
@endsection

@section('js')
<script>
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(function(){
	var universityID = {{ Auth::user()->university->id }};
	console.log('universityID', universityID);
	var majors = [];
	var listFavorites = [];

	// Ajax get list major
	$.ajax({
		method: "GET",
		url: "/list-major",
		dataType: 'json'
	})
	.done(function( result ) {
		result.forEach(function(v, k){
			majors[v.id] = v.name;
		});
		// console.log(majors);
	})
	.fail(function() {
		major = [];
	})
	.always(function() {
	});

	// Ajax get list favorite
	$.ajax({
		method: "GET",
		url: "{{ route('api.university.listFavorite', [
			'id' => Auth::user()->university->id ]) }}",
		dataType: 'json'
	})
	.done(function( result ) {
		listFavorites = result;
		console.log('listFavorite',listFavorites);
	})
	.fail(function() {
	})
	.always(function() {
	});
	
	/**
	 * Convert list object to string
	 * @param  {array object}
	 * @return {[string]}
	 */
	function getListNameMajor(_majors){
		if(!_majors) return '';
		var result = [];
		_majors.forEach(function(v, k){
			result[k] = majors[v];
		});
		return result.join(", ");
	}
	/**
	 * Convert array to ul - li
	 * @param  {array}
	 * @return {[string list ul - li]}
	 */
	function majorToUL(_majors){
		if(!_majors) return '';
		var result = '<ul style="list-style: initial">'
		_majors.forEach(function(v, k){
			result+= '<li>' + majors[v] + '</li>'
		});
		result + '</ul>';
		return result;
	}
	
	/**
	 * Convert array languages to  ul - li
	 * @param  {array}
	 * @return {[string list ul - li]}
	 */
	function getLanguage(_langs){
		if(!_langs) return '';
		var result = '<ul style="list-style: initial">'
		_langs.forEach(function(v, k){
			var langLevel = v[1] == 0 ? '{{ trans('label.native') }}' : v[1] == 1 ? '{{ trans('label.business_level') }}' : '{{ trans('label.daily_conversation_level') }}';
			result+= '<li>' + v[0] + ' - ' + langLevel +'</li>'
		});
		result + '</ul>';
		return result;
	}
	// Init selectpicker
	$('select[name="nationality[]"]').selectpicker({title:"{{ trans('label.none_established') }}"});
	$('select[name="country_interested[]"]').selectpicker({title:"{{ trans('label.none_established') }}"});
	$('select[name="type_of_study[]"]').selectpicker({title:"{{ trans('label.none_established') }}"});
	$('select[name="degree[]"]').selectpicker({title:"{{ trans('label.none_established') }}"});
	$('select[name="major[]"]').selectpicker({title:"{{ trans('label.none_established') }}"});

	// $dtSearch = $('#table-search').DataTable();
	$('#btn-search').click(function(){
		$('#waiting').show();
		var data = $('#frm-search').serializeObject();
		console.log(data);
		$.ajax({
			method: "GET",
			url: "{{ route('studentSearch') }}",
			data: data,
			dataType: 'json'
		})
		.done(function( result ) {
			console.log(result);
			$('#table-search').DataTable().destroy();
			$sBody = $('#search-body');
			$sBody.html('');
			$.each(result, function(k,v){
				var majorString = '';
				if(v.major) majorString = getListNameMajor(v.major);
				$sBody.append('\
					<tr class="get-student-info" data-id="'+v.id+'">\
						<td class="view-detail">'+ (v.user ? v.user.name : '') +'</td>\
						<td>'+v.age+'</td>\
						<td>'+v.nationality+'</td>\
						<td>'+( v.degree ? v.degree.name : '' )+'</td>\
						<td>'+( v.type_of_study ? v.type_of_study.name : '' )+'</td>\
						<td>'+ majorString +'</td>\
						<td> <i class="glyphicon glyphicon-envelope text-success cus-p fs-xxlg send-message"></i> </td>\
					</tr>');
			});
			// $dtSearch.init();
			$('#table-search').DataTable();
			
		})
		.fail(function() {
			alert( "search fail" );
		})
		.always(function() {
			$('#waiting').hide();
		});
	});

	/**
	 * Show Popup student details
	 * @param  {action click NAME}
	 * @return {[popup]
	 */
	$(document).on('click', '.view-detail', { param: 'param' } , function(e){
		// console.log(e.data.param);
		$('#waiting').show();
		var id = $(this).closest('tr').data('id');
		$.ajax({
			method: "GET",
			url: "/api/student/" + id,
			dataType: 'json'
		})
		.done(function( result ) {
			console.log(result);
			// Set student id for modal detail
			$('#detailModal .get-student-info').data('id', result.id);
			// Set favorite
			$('#add-favorite').data('studentID', result.id);
			// Check favorite
			var isFavorite = listFavorites.indexOf(result.id) < 0 ? false : true;
			console.log('isFavorite', isFavorite );
			$('#add-favorite').data('favorite', isFavorite);
			if(isFavorite) $('#add-favorite').removeClass('glyphicon-star-empty');
			else $('#add-favorite').addClass('glyphicon-star-empty');

			// Set overview
			if(result.user)
				$('.data-name').html(result.user.fullname);
			$('.data-age').html(result.age);
			$('.data-gender').html(!result.gender ? '{{ trans('label.male') }}' : '{{ trans('label.female') }}');
			$('.data-nationality').html(result.nationality);
			$('.data-address').html(result.address);

			// Set current education
			if(result.degree)
				$('.data-education').html(result.degree.name);
			$('.data-name-of-school').html(result.name_of_school);
			$('.data-rank').html();
			$('.data-expected-graduation').html(result.date_graduation);

			// Set student abroad
			if(result.academic)
				$('.data-program').html(result.academic.name);
			if(result.type_of_study)
				$('.data-type').html(result.type_of_study.name);
			$('.data-expected-start').html(result.expected_start);
			$('.data-major').html( majorToUL(result.major) );
			$('.data-destination').html();
			if(result.avatar)
				$('#avatar').attr('src', result.avatar);
			else{
				$('#avatar').attr('src', '/images/no-avatar.png');
			}
			// Set skill
			$('.data-language').html( getLanguage(result.language) );

			$('#detailModal').modal('show');		
		})
		.fail(function() {
			alert( "search fail" );
		})
		.always(function() {
			$('#waiting').hide();
		});
	});

	// Button favorite
	$('#add-favorite').click(function(){
		var $this = $(this);
		var isFavorite = $this.data('favorite');
		var studentID = $this.data('studentID');
		$('body').css('cursor', 'wait !important');

		if(!isFavorite){
			$this.removeClass('glyphicon-star-empty');
		}else{
			$this.addClass('glyphicon-star-empty');
		}
		
		$.ajax({
			method: "GET",
			url: "{{ route('api.university.addFavorite') }}",
			dataType: 'json',
			data: {	'student_id':studentID,
				'university_id':universityID,
				'favorite': isFavorite }
		})
		.done(function( result ) {
			console.log('listFavorite', result);
			if(result){
				listFavorites = result;
			}
			$this.data('favorite', !isFavorite);
		})
		.fail(function() {
		})
		.always(function() {
			$('body').css('cursor', 'default');
		});
	});

	// Send message
	$(document).on('click', '.send-message', function(){
		var studentID = $(this).closest('.get-student-info').data('id');
		$('#modalSendMessage input[name=student_id]').val(studentID);
		$('#modalSendMessage input[name=university_id]').val(universityID);

		$('#detailModal').modal('hide');
		$('#modalSendMessage').modal('show');

		// api.message.create
	});

})
</script>
@endsection
