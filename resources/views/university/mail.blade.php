@extends('layouts.user') 
@section('style')
<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
@endsection

@section('content')
<section>
    <div class="inner inner-md-1">
		 {{-- Message list --}}
		 <table class="table table-loan tb-01 mail">
		     <thead>
		         <tr>
		             <th>{{ trans('label.university') }}</th>
		             <th>{{ trans('label.message') }}</th>
		             <th>{{ trans('label.attach_a_file') }}</th>
		             <th>{{ trans('label.time') }}</th>
		             <th class="no-icon"></th>
		         </tr>
		     </thead>
		     <tbody>
		         @foreach($messages as $message)
	                 <tr class="get-info" data-id="{{ $message->student->id }}" data-status="{{ $message->status }}" data-message-id="{{ $message->id }}">
	                     <td data-label="{{ trans('label.university') }}"> {{ $message->student->user->fullname }} </td>
	                     <td data-label="{{ trans('label.message') }}"> 
	                         <div class="title fw-b"> {{ $message->title }} </div> 
	                         <div class="message nowrap"> -- {{ $message->message }} </div>
	                     </td>
	                     <td data-label="Attach file" class="ta-c file">
	                         @if($message->file)
	                             <a href="{{ $message->file }}" download>
	                                 <i class="glyphicon glyphicon-save-file fs-xxlg"></i>
	                             </a>
	                         @endif
	                     </td>
	                     <td data-label="Time" class="time">
	                         {{ $message->created_at->toDayDateTimeString() }}
	                     </td>
	                     <td data-label="Send Mail" class="ta-c">
	                        <i class="glyphicon glyphicon-envelope cus-p fs-xxlg send-message text-success" title="{{ trans('label.send_message') }}"></i>
	                     </td>
	                 </tr>
		         @endforeach
		     </tbody>
		 </table>
		 {{-- ./Message list --}}
    </div>
</section>
<!-- ./ Container -->

<!-- Modal Send Message-->
<div class="modal fade" id="modalSendMessage" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3>{{ trans('label.send_message') }}</h3>
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
	      	    			<label class="col-md-3 control-label">{{ trans('label.title') }}</label>
	      	    			<div class="col-md-9">
	      	    				<input type="text" name="title" class="form-control" data-parsley-required>
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-3 control-label">{{ trans('label.message') }}</label>
	      	    			<div class="col-md-9">
	      	    				<textarea name="message" rows='16' class="form-control res-n" data-parsley-required></textarea>
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-3 control-label">{{ trans('label.attach_a_file') }}</label>
	      	    			<div class="col-md-9">
	      	    				<input type="file" name="file" class="form-control" onchange="ValidateSingleInput(this)">
	      	    				<p class="text-danger mg-t-sm">{{ trans('label.file_accept') }}</p>
	      	    			</div>
	      	    		</div>
	      	    		<div class="form-group">
	      	    			<label class="col-md-3 control-label"></label>
	      	    			<div class="col-md-9">
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

<!-- Modal Detail Message-->
<div class="modal fade" id="modalDetailMessage" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3>本文</h3>
         </div>
         <!-- modal-body -->
         <div class="modal-body">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <form class="form-horizontal">
                       <div class="form-group">
                          <label class="col-md-3">{{ trans('label.title') }}</label>
                          <div class="col-md-9" id="detail-title"></div>
                       </div>
                       <div class="form-group">
                          <label class="col-md-3">{{ trans('label.message') }}</label>
                          <div class="col-md-9" id="detail-message"></div>
                       </div>
                       <div class="form-group">
                          <label class="col-md-3">{{ trans('label.attach_a_file') }}</label>
                          <div class="col-md-9" id="detail-file"></div>
                       </div>
                       <div class="form-group">
                          <label class="col-md-3">{{ trans('label.time') }}</label>
                          <div class="col-md-9" id="detail-time"></div>
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
$(function(){
	var universityID = {{ Auth::user()->university->id }};

	$('.send-message').click(function(e){
		e.preventDefault();
		e.stopPropagation();
		var studentID = $(this).closest('.get-info').data('id');
		$('#modalSendMessage input[name=student_id]').val(studentID);
		$('#modalSendMessage input[name=university_id]').val(universityID);

		$('#detailModal').modal('hide');
		$('#modalSendMessage').modal('show');
	});

	$('tr.get-info').click(function(){
        $this = $(this);
        $this.attr('data-status',1);
        $('#detail-title').html( $this.find('.title').html() );
        $('#detail-message').html( $this.find('.message').html() );
        $('#detail-file').html( $this.find('.file').html() );
        $('#detail-time').html( $this.find('.time').html() );
        $('#modalDetailMessage').modal('show');

        var messageID = $this.data('message-id');
        $.ajax({
            method: "GET",
            url: '{{ route('api.message.readMessage') }}',
            dataType: 'json',
            data: {
              id : messageID
            }
        }).done(function(rs){

        }).fail(function(rs){

        }).always(function(){

        })
    });

    // $('table.mail').dataTable();
})
var _validFileExtensions = [".doc", ".docx", ".pdf", ".xls", ".xlsx", ".txt"];
var maxSize = 2; //Mb 
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("{{ trans('label.supports_the_file_formats') }}: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }

        if( (oInput.files[0].size / 1048576) > maxSize ) {
        	alert("{{ trans('label.size_limitation_must_less_than') }} " + maxSize + "Mb");
                oInput.value = "";
                return false;
        }
    }
    return true;
}
</script>
@endsection
