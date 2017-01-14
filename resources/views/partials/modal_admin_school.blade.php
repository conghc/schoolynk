<div class="modal inmodal schoolModal" id="modalMajor" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Modal bootstrap</h4>
			</div>
			<div class="modal-body body-modify">
                <form method="post" role="form"  action="/admin/school-add-major" class="form-horizontal" id="add-major" enctype="multipart/form-data">
					<h4 class="modal-title-body"></h4>
					<div class="form-group">
						<div class="col-sm-12">
							<button type="button" class="btn btn-primary btn-xs" id="add_more_major">{{ trans('school.add_more_major') }}</button>
                            <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                            <input type="hidden" name="fs_id" class="fs_id" value="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="school_type" value="{{ $sType }}">
						</div>
					</div>
                    <div id="list-major"></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
				<button type="button" class="btn btn-primary" onclick="$('#add-major').submit()">{{ trans('label.save_changes') }}</button>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal schoolModal" id="schoolOthers" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Modal bootstrap</h4>
			</div>
			<div class="modal-body body-modify">
                <form method="post" role="form"  action="/admin/other-text-update" class="form-horizontal" id="addOtherText" enctype="multipart/form-data">
                    <h4 class="modal-title-body"></h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary btn-xs" id="add_more_other">{{ trans('school.add_sub_category') }}</button>
                            <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                            <input type="hidden" name="fs_id" class="fs_id" value="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="other_type" id="other_type" value="">
                        </div>
                    </div>
                    <div id="list-other"></div>
                </form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                <button type="button" class="btn btn-primary" onclick="$('#addOtherText').submit()">{{ trans('label.save_changes') }}</button>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal schoolModal" id="schoolScholarships" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Modal bootstrap</h4>
			</div>
			<div class="modal-body body-modify">
				<form method="get" class="form-horizontal">
					<h4 class="modal-title-body"></h4>
					<div class="form-group">
						<div class="col-sm-12">
							@if(isset($school->scholarships))
							<ul class="list-group clear-list m-t">
								@foreach($school->scholarships as $k=>$scholarship)
									<li class="list-group-item {{ $k== 0 ? 'fist-item' : '' }}">
										<span class="label label-primary">{{ $k+1 }}</span>&nbsp; {{ $scholarship->name }}
									</li>
								@endforeach
							</ul>
							@endif
						</div>
					</div>
				</form>
			</div><div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                <button type="button" class="btn btn-primary">{{ trans('label.save_changes') }}</button>
			</div>
		</div>
	</div>
</div>

