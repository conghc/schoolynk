
<!-- Jquery Validate -->
<script src="/js/plugins/validate/jquery.validate.min.js"></script>
<script>

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#sponsor-logo').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function(){
		{
			@if($addNew)
				$('.ibc-hidden, .col-hidden, .ibc-hidden-sponsor, .col-hidden-sponsor').hide();
			@endif
		}
		$("#account_information").validate({
			rules: {
				name: {required: true},
				email: {required: true, email: true},
				password: {minlength: 5},
				re_password: {minlength: 5, equalTo : "#password"}
			},
			messages: {
				name: '{{ trans('form.this_field_is_required') }}',
				email: {
					required: '{{ trans('form.this_field_is_required') }}',
					email: '{{ trans('form.valid_email_type') }}'
				},
				password: {
					minlength: '{{ trans('form.vali_leng_str_5') }}'
				},
				re_password: {
					minlength: '{{ trans('form.vali_leng_str_5') }}',
					equalTo: '{{ trans('form.vali_re_password') }}',
				}
			},
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#account_information').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['scholarship_id'] = $('#scholarship_id').val();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-sponsor',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							$('#select-sponsor').append('<option value="'+ data.id +'" >'+ data.email +'</option>');
							$('#select-sponsor').val(data.id); // if you want it to be automatically selected
							$('#select-sponsor').trigger("chosen:updated");
							$('.ibc-hidden-sponsor, .col-hidden-sponsor').show();
							$('.sponsor_name').val(data.name);
							$('.sponsor_email').val(data.email);
						}
						$('#loading-fixed').hide();
					}
				});
			}
		});

		$("#sponsors_information").validate({
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#sponsors_information').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['sponsor_id'] = $('#select-sponsor').val();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/update-sponsor-info',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {

						$('#loading-fixed').hide();
					}
				});
			}
		});

		$('#profile-image').on('click', function() {
			sponsor_id = $('#select-sponsor').val();
			if(sponsor_id == 0){
				alert('Please insert "Account Information" and Click "Save changes" first!');
			}else{
				$('#profile-image-upload').click();
			}
		});
		$("#profile-image-upload").change(function(){
			readURL(this);
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: '/admin/upload-user-logo',
				type: 'POST',
				data:new FormData($("#account_information")[0]),
				dataType:'json',
				async:false,
				type:'post',
				processData: false,
				contentType: false,
				success:function(response){
					console.log(response);
				}
			});
		});

		$('#scholarship-header').validate({
			rules: {
				name: {required: true},
				deadline: {required: true},
				contact_admission: {required: true, email: true}
			},
			messages: {
				name: '{{ trans('form.this_field_is_required') }}',
				deadline: '{{ trans('form.this_field_is_required') }}',
				contact_admission: {
					required: '{{ trans('form.this_field_is_required') }}',
					email: '{{ trans('form.valid_email_type') }}'
				}
			},
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#scholarship-header').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['scholarship_id'] = $('#scholarship_id').val();
				values['sponsor_id'] = $('#select-sponsor').val();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-scholarship',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							window.location.href = data.rdr;
						}else{
						}
						$('#loading-fixed').hide();
						$('#alert-success').show();
					}
				});
			}
		});

		$('#general_information').validate({
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#general_information').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['scholarship_id'] = $('#scholarship_id').val();
				values['sponsor_id'] = $('#select-sponsor').val();
				values['type_of_cost_covered'] = $('input[name=type_of_cost_covered]:checked').map(function(_, el) {
					return $(el).val();
				}).get();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-scholarship',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							window.location.href = data.rdr;
						}else{
						}
						$('#loading-fixed').hide();
						$('#alert-success').show();
					}
				});
			}
		});

		$('#eligibility_requirement').validate({
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var elementArray = $('#eligibility_requirement').serializeArray();
				var modifiedArray = [];
				var counts = {};
				var multipleValues = {};
				$.each(elementArray, function(index, value) {
					if (counts[value.name]){ counts[value.name] += 1; } else { counts[value.name] = 1; }
				});
				$.each(elementArray, function(index, value) {
					if (multipleValues[value.name] || counts[value.name] > 1){
						if (!multipleValues[value.name]) { multipleValues[value.name] = 0; } else { multipleValues[value.name] += 1; }
						modifiedArray.push({name: value.name + "_" + multipleValues[value.name], value: value.value});
					} else {
						modifiedArray.push({name: value.name, value: value.value});
					}
				});
				var result = $.param(modifiedArray);
				result += '&scholarship_id=' + $('#scholarship_id').val();
				result += '&sponsor_id=' + $('#sponsor_id').val();
				result += '&form=eligibility_requirement';
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-scholarship',
					type: 'POST',
					data: result,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							window.location.href = data.rdr;
						}else{
						}
						$('#loading-fixed').hide();
						$('#alert-success').show();
					}
				});
			}
		});

		$('#qualified_school_academics').validate({
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var elementArray = $('#qualified_school_academics').serializeArray();
				var modifiedArray = [];
				var counts = {};
				var multipleValues = {};
				$.each(elementArray, function(index, value) {
					if (counts[value.name]){ counts[value.name] += 1; } else { counts[value.name] = 1; }
				});
				$.each(elementArray, function(index, value) {
					if (multipleValues[value.name] || counts[value.name] > 1){
						if (!multipleValues[value.name]) { multipleValues[value.name] = 0; } else { multipleValues[value.name] += 1; }
						modifiedArray.push({name: value.name + "_" + multipleValues[value.name], value: value.value});
					} else {
						modifiedArray.push({name: value.name, value: value.value});
					}
				});
				var result = $.param(modifiedArray);
				result += '&scholarship_id=' + $('#scholarship_id').val();
				result += '&sponsor_id=' + $('#sponsor_id').val();
				result += '&form=qualified_school_academics';
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-scholarship',
					type: 'POST',
					data: result,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							window.location.href = data.rdr;
						}else{
						}
						$('#loading-fixed').hide();
						$('#alert-success').show();
					}
				});
			}
		});

		$('#application_method').validate({
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#application_method').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['scholarship_id'] = $('#scholarship_id').val();
				values['sponsor_id'] = $('#select-sponsor').val();
				values['application_method'] = $('input[name=application_method]:checked').map(function(_, el) {
					return $(el).val();
				}).get();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-scholarship',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {
						if(data.act == 'add'){
							window.location.href = data.rdr;
						}else{
						}
						$('#loading-fixed').hide();
						$('#alert-success').show();
					}
				});
			}
		});
	});
</script>