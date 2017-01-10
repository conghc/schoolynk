
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
</script>