<div class="modal inmodal schoolModal" id="modalMajor" tabindex="-1" role="dialog"  aria-hidden="true">
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
							<button type="button" class="btn btn-primary btn-xs add-more-faculty">{{ trans('school.add_more_major') }}</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" value="" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">{{ trans('school.degree_level') }}</div>
						<div class="col-md-9">
							<select class="form-control m-b" name="account">
								<option value="">Above</option>
								<option value="">Below</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">{{ trans('school.course_term') }}</div>
						<div class="col-md-9">
							<select class="form-control m-b" name="account">
								<option value="">Above</option>
								<option value="">Below</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 control-label">{{ trans('school.enrollment') }}</div>
						<div class="col-md-9">
							<select class="form-control m-b" name="account">
								<option value="">Above</option>
								<option value="">Below</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">{{ trans('school.language') }}</div>
                        <div class="col-md-9">
                            <select class="form-control m-b" name="account">
                                <option value="">Above</option>
                                <option value="">Below</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">{{ trans('school.application_period') }}</div>
                        <div class="col-md-4">
                            <select class="form-control m-b" name="account">
                                <option value="">Above</option>
                                <option value="">Below</option>
                            </select>
                        </div>
                        <div class="col-md-1">~</div>
                        <div class="col-md-4">
                            <select class="form-control m-b" name="account">
                                <option value="">Above</option>
                                <option value="">Below</option>
                            </select>
                        </div>
                    </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
				<button type="button" class="btn btn-primary">{{ trans('label.save_changes') }}</button>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal schoolModal" id="schoolAdmission" tabindex="-1" role="dialog"  aria-hidden="true">
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
                            <button type="button" class="btn btn-primary btn-xs add-more-faculty">{{ trans('school.add_sub_category') }}</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                </form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                <button type="button" class="btn btn-primary">{{ trans('label.save_changes') }}</button>
			</div>
		</div>
	</div>
</div>
<div class="modal inmodal schoolModal" id="schoolTuitionFee" tabindex="-1" role="dialog"  aria-hidden="true">
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
                            <button type="button" class="btn btn-primary btn-xs add-more-faculty">{{ trans('school.add_sub_category') }}</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                <button type="button" class="btn btn-primary">{{ trans('label.save_changes') }}</button>
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
							<ul class="list-group clear-list m-t">
								<li class="list-group-item fist-item">
									<span class="label label-primary">1</span>&nbsp; Please contact me
								</li>
								<li class="list-group-item">
									<span class="label label-primary">2</span>&nbsp; Sign a contract
								</li>
								<li class="list-group-item">
									<span class="label label-primary">3</span>&nbsp; Open new shop
								</li>
								<li class="list-group-item">
									<span class="label label-primary">4</span>&nbsp; Call back to Sylvia
								</li>
								<li class="list-group-item">
									<span class="label label-primary">5</span>&nbsp; Write a letter to Sandra
								</li>
							</ul>
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
<div class="modal inmodal schoolModal" id="schoolOthers" tabindex="-1" role="dialog"  aria-hidden="true">
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
                            <button type="button" class="btn btn-primary btn-xs add-more-faculty">{{ trans('school.add_sub_category') }}</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                <button type="button" class="btn btn-primary">{{ trans('label.save_changes') }}</button>
            </div>
		</div>
	</div>
</div>
