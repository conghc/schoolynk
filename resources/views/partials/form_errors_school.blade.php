
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
        school_structure_id = $('#school_structure_id').val();
        //if(school_structure_id == 0){ $('.structure-hidden').hide(); }
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
					equalTo: '{{ trans('form.vali_re_password') }}'
				}
			},
			submitHandler: function(form) {
				$('#loading-fixed').show();
				var values = {};
				$.each($('#account_information').serializeArray(), function(i, field) {
					values[field.name] = field.value;
				});
				values['scholarship_id'] = $('#scholarship_id').val();
				values['user_type'] = $('#user_type').val();
				values['sponsor_id'] = $('#school_id').val();
				values['school_type'] = $('#sType').val();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '/admin/add-sponsor',
					type: 'POST',
					data: values,
					dataType: 'JSON',
					success: function (data) {
						if(data.code == 1){
							alert(data.msg);
						}else if(data.act == 'add'){
							window.location.href = data.rdr;
//							$('#school_id').val(data.id);
//							$('#sponsor_id').val(data.id);
						}
						$('#loading-fixed').hide();
					}
				});
			}
		});

		$('#profile-image').on('click', function() {
			school_id = $('#school_id').val();
			if(school_id == 0){
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
				processData: false,
				contentType: false,
				success:function(response){
					console.log(response);
				}
			});
		});
		// upload school images
		Dropzone.options.myAwesomeDropzone = {
			addRemoveLinks: true,
			autoProcessQueue: false,
			uploadMultiple: true,
			parallelUploads: 100,
			maxFiles: 100,
			maxFilesize: 2, //MB
			acceptedFiles: "image/*",
			dictInvalidFileType: "upload only JPG/PNG",
			// Dropzone settings
			init: function() {
				var myDropzone = this;
				this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
					e.preventDefault();
					e.stopPropagation();
					myDropzone.processQueue();
				});
				this.on("sendingmultiple", function() {
					$('#loading-fixed').show();
				});
				this.on("successmultiple", function(files, response) {
					alert('success');
					location.reload();
					//$('#loading-fixed').hide();
				});
				this.on("errormultiple", function(files, response) {
					alert('Whoops, looks like something went wrong.');
				});
			}
		};

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
        $("#school_structure").validate({
            rules: {
                structure: {required: true}
            }
        });
	});


	$("#list1").dragsort({ dragSelector: "div", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });
	function saveOrder() {
		$('#loading-fixed').show();
		var data = $("#list1 li").map(function() {
			return $(this).children().find('.child-image').attr('id');
		}).get();
		//$("input[name=list1SortOrder]").val(data.join("|"));
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: '/admin/sort-images',
			type: 'POST',
			data: {'files': data.join("|||"), 'type': 'school'},
			dataType: 'JSON',
			success: function (data) {
				//alert(data.msg);
				$('#loading-fixed').hide();
			}
		});
	};

	function schoolMajor(elem) {
		$('#loading-fixed').show();
		$('#list-major').html('');
		fs_name = $(elem).parent().find('.fs_name').val();
		$('#modalMajor .modal-title').text($(elem).parent().find('.fs_name').val());
		$('#modalMajor h4.modal-title-body').text($(elem).text());
		$('#modalMajor .fs_id').val($(elem).parent().find('.fs_name').attr('id'));

		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: '/admin/school-major-exist',
			type: 'POST',
			data: {
                'fs_id': $(elem).parent().find('.fs_name').attr('id'),
                'sType': $('#sType').val(),
                'school_id': $('#school_id').val()
            },
			success: function (data) {
				$('#list-major').append(data);
				$('#loading-fixed').hide();
			}
		});
		$("#modalMajor").modal('show');
	}
	function otherModal(elem) {
		$('#loading-fixed').show();
		$('#list-other').html('');
		fs_name = $(elem).parent().find('.fs_name').val();
		$('#schoolOthers .modal-title').text($(elem).parent().find('.fs_name').val());
		$('#schoolOthers h4.modal-title-body').text($(elem).text());
		$('#schoolOthers .fs_id').val($(elem).parent().find('.fs_name').attr('id'));

		other_type = $(elem).attr('other_type');
		$('#other_type').val(other_type);
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: '/admin/other-text-exist',
			type: 'POST',
			data: {
                'fs_id': $(elem).parent().find('.fs_name').attr('id'),
                'type': other_type,
                'sType': $('#sType').val(),
                'school_id': $('#school_id').val()
            },
			success: function (data) {
				$('#list-other').append(data);
				$('.summernote-modal').summernote({
					minHeight: 250
				});
				$('#loading-fixed').hide();
			}
		});
		$("#schoolOthers").modal('show');
	}
	function schoolScholarships(elem) {
		school_id = $('#school_id').val();
		$('#schoolScholarships .modal-title').text($(elem).parent().find('.fs_name').val());
		$('#schoolScholarships h4.modal-title-body').text($(elem).text());

		$("#schoolScholarships").modal('show');
	}
	$(document).ready(function(){
		$('#add_more_major').on('click', function() {
			html = '<div class="hr-line-dashed"></div>';
			html += '<div class="child-major">';
			html += '<div class="form-group">';
			html += '<div class="col-sm-12">';
			html += '<input type="text" value="" class="form-control" name="text[]">';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-sm-3 contr-ol-label">' + "{{ trans('school.degree_level') }}" + '</div>';
			html += '<div class="col-md-9">';
			html += '<select class="form-control m-b" name="degree_level[]">';
			@for($i=0; $i<count($degreelevel); $i++)
				html += '<option value="{{ $degreelevel[$i] }}">'+ "{{ trans('school.'. $degreelevel[$i]) }}" +'</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-sm-3 contr-ol-label">'+ "{{ trans('school.course_term') }}" +'</div>';
			html += '<div class="col-md-9">';
			html += '<select class="form-control m-b" name="course_term[]">';
			@for($i=0; $i<count($courseTerm); $i++)
					html += '<option value="{{ $courseTerm[$i] }}">'+ "{{ trans('school.'. $courseTerm[$i]) }}" +'</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-sm-3 control-label">'+ "{{ trans('school.enrollment') }}" +'</div>';
			html += '<div class="col-md-9">';
			html += '<select class="form-control m-b" name="enrollment[]">';
			@for($i=0; $i<count($enrollment); $i++)
					html += '<option value="{{ $enrollment[$i] }}">'+ "{{ trans('school.'. $enrollment[$i]) }}" +'</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-sm-3 control-label">'+ "{{ trans('school.language') }}" +'</div>';
			html += '<div class="col-md-9">';
			html += '<select class="form-control m-b" name="language[]">';
			@for($i=0; $i<count($majorLanguage); $i++)
					html += '<option value="{{ $majorLanguage[$i] }}">{{ $majorLanguage[$i] }}</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-sm-3 control-label">'+ "{{ trans('school.application_period') }}" +'</div>';
			html += '<div class="col-md-4">';
			html += '<select class="form-control m-b" name="application_period[]">';
			@for($i=0; $i<count($enrollment); $i++)
					html += '<option value="{{ $enrollment[$i] }}">'+ "{{ trans('school.'. $enrollment[$i]) }}" +'</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '<div class="col-md-1"><img class="ic-about" src="/img/ic-about.png" /></div>';
			html += '<div class="col-md-4">';
			html += '<select class="form-control m-b" name="application_period_max[]">';
			@for($i=0; $i<count($enrollment); $i++)
					html += '<option value="{{ $enrollment[$i] }}">'+ "{{ trans('school.'. $enrollment[$i]) }}" +'</option>';
			@endfor
			html += '</select>';
			html += '</div>';
			html += '</div>';
			html += '</div>';
			$('#list-major').append(html);
		});

		$('#add_more_other').on('click', function() {
			html = '<div class="child-other">';
			html += '<div class="form-group">';
			html += '<div class="col-sm-12">';
			html += '<input type="text" value="" class="form-control" name="name[]">';
			html += '</div>';
			html += '</div>';
			html += '<div class="form-group">';
			html += '<div class="col-md-12">';
			html += '<textarea class="summernote summernote-modal" id="" name="content[]" >';
			html += '</textarea>';
			html += '</div>';
			html += '</div>';
			html += '</div>';
			$('#list-other').append(html);
			$('.summernote-modal').summernote({
				minHeight: 250
			});
		});

		$('#add_school_other').on('click', function(){
			html = '<div class="hr-line-dashed"></div>';
            html += '<div class="form-group school_other_child">';
            html += '<label class="col-sm-2 control-label">'+ "{{ trans('school.texts') }}" +'</label>';
            html += '<div class="col-sm-10">';
            html += '<textarea class="summernote" id="" name="school_other[]" rows="40">';
            html += '</textarea>';
            html += '</div>';
            html += '</div>';
            $('#school_other_list').append(html);
            $('.summernote').summernote({
                minHeight: 250
            });
		});
	});
</script>