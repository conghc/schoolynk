@extends('layouts.admin')
@section('header-2')
    {{ trans('label.schoolarship_list') }}
@endsection
@section('js')
    <link href="/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/css/plugins/chosen/chosen.css" rel="stylesheet">
    <script src="/js/plugins/dataTables/datatables.min.js"></script>
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Data picker -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- TouchSpin -->
    <script src="/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Chosen -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#deadline .input-group.date, #deadline-max .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
            $('.dataTables-list').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {
                        text: 'Advanced Search',
                        action: function ( e, dt, node, config ) {
                            $('.chosen-container-multi').width('100%');
                            $("#modalAdvanceSearch").modal('show');
                        }
                    },
                    {{--{--}}
                        {{--text: '{{ trans("scholarship.scholarship_add") }}',--}}
                        {{--action: function (){--}}
                            {{--window.location.href = "http://schoolynk.dev/admin/scholarship/create";--}}
                        {{--}--}}
                    {{--}--}}
                ],
                columnDefs: [ {
                    "targets": 'no-sort',
                    "orderable": false
                } ],
                "bLengthChange": false
            });
            $('.dataTables_info').hide();

            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        });
    </script>
@endsection
@section('content')
    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>SCHOLARSHIP LIST</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-list" >
                            <thead>
                            <tr>
                                <th>{{ trans('label.profile_photo') }}</th>
                                <th>{{ trans('scholarship.name_of_scholarship') }}</th>
                                <th>{{ trans('scholarship.name_of_sponsor') }}</th>
                                <th>{{ trans('scholarship.type_of_award') }}</th>
                                <th>{{ trans('scholarship.amount_of_award') }}</th>
                                <th>{{ trans('scholarship.application_deadline') }}</th>
                                <th>{{ trans('scholarship.no_of_followers') }}</th>
                                <th>url</th>
                                <th class="no-sort">{{ trans('label.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scholarships as $scholarship)
                                <tr class="gradeX">
                                    <td><img class="sponsor-logo-list" src="/{{ $scholarship->sponsor->img_profile or '/img/no-image.png' }}" /></td>
                                    <td>{{ $scholarship->name or 'n/a' }}</td>
                                    <td>{{ $scholarship->sponsor->name or 'n/a' }}</td>
                                    <td class="center">{{ $scholarship->type_of_award or 'n/a' }}</td>
                                    <td class="center">{{ $scholarship->amount or 0 }}</td>
                                    <td class="center">{{ $scholarship->deadline or 'n/a' }}</td>
                                    <td class="center">100</td>
                                    <td class="center">{{ $scholarship->url or '' }}</td>
                                    <td class="center tb-action">
                                        <a href="{{ route('admin.scholarship.create') }}?id={{ $scholarship->id }}" class="btn btn-default btn-xs">{{ trans('label.edit') }}</a>
                                        {{--<button type="button" class="btn btn-default btn-xs">Delete</button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="modalAdvanceSearch" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Advanced Search</h4>
                </div>
                <div class="modal-body body-modify">
                    <form method="get" class="form-horizontal">
                        <h4>{{ trans('label.general_information') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.type_of_scholarship') }}</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="1" name="type_of_award[]">
                                    <label for="type_of_scholarship">Scholarship</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="2" name="type_of_award[]">
                                    <label for="type_of_scholarship">No interest loan</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="3" name="type_of_award[]">
                                    <label for="type_of_scholarship">Loan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.amount_of_award') }}</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option value=">">Above</option>
                                    <option value="<">Below</option>
                                    <option value="=">Equal</option>
                                </select>
                            </div>
                            <div class="col-sm-5"><input type="email" class="form-control"></div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.type_of_cost_covered') }}</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="1" name="type_of_cost_covered[]">
                                    <label for="type_of_cost_covered">Tuition fee</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="2" name="type_of_cost_covered[]">
                                    <label for="type_of_cost_covered">Living cost</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="" value="3" name="type_of_cost_covered[]">
                                    <label for="type_of_cost_covered">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Number of  awards granted</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option value=">">Above</option>
                                    <option value="<">Below</option>
                                    <option value="=">Equal</option>
                                </select>
                            </div>
                            <div class="col-sm-5"><input type="email" class="form-control"></div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Applicable scholarship year</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="applicable_year">
                                    <?php for($i=2017; $i<2040; $i++): ?>
                                    <option value="{{ $i }}" >{{ $i }}</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <img class="ic-about" src="/img/ic-about.png" />
                            </div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="applicable_year_max">
                                    <?php for($i=2017; $i<2040; $i++): ?>
                                    <option value="{{ $i }}" >{{ $i }}</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Application deadline</div>
                            <div class="col-sm-3" id="deadline">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="" name="deadline">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <img class="ic-about" src="/img/ic-about.png" />
                            </div>
                            <div class="col-sm-4" id="deadline-max">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="deadline_max" value="">
                                </div>
                            </div>
                        </div>
                        <h4>{{ trans('label.eligibility_requirement') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Age requirement</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="age">
                                    @for($i=1; $i<=80; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-1">
                                <img class="ic-about" src="/img/ic-about.png" />
                            </div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="age_max">
                                    @for($i=1; $i<=80; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Gender requirement</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="male" name="gender[]">
                                    <label for="gender">Male</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="female" name="gender[]">
                                    <label for="gender">Female</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="both" name="gender[]">
                                    <label for="gender">Both</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Nationality requirement</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="nationality[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($nationalities as $nationality)
                                        <option value='{{ $nationality }}' >
                                            {{ $nationality }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Current academic level</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="applicants_current_academic_level[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($academics as $academic)
                                        <option value="{{ $academic->id }}">
                                            {{ $academic->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Current place of residence</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="current_place_of_residence[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach ( $countries as $k => $country)
                                        <option value="{{ $k }}">
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h4>{{ trans('label.qualified_school_&_academics') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Award can be used for</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="award_can_be_used_for[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($awardUsedFor as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Award can be used at</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="award_can_be_used_at[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="university" >University</option>
                                    <option value="vocational_school" >Vocational school</option>
                                    <option value="language_school" >Language school</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Qualified majors</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="qualified_majors[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($dataMajors as $k=>$majors)
                                        <optgroup label="{{ $k }}">
                                            @foreach($majors as $k=>$major)
                                                <option value="{{ $k }}" >{{ $major }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.designated_area') }}</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="designated_state[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach ( $states as $k => $state)
                                        <option value="{{ $k }}" >
                                            {{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.designated_school') }}</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="designated_school[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}" > {{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h4>{{ trans('label.application_requirement_&_process') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Selection method</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="1" name="application_method[]" >
                                    <label for="inlineRadio1">Document screening</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="2" name="application_method[]">
                                    <label for="inlineRadio2">Interview</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" value="3" name="application_method[]">
                                    <label for="inlineRadio2">Examination</label>
                                </div>
                            </div>
                        </div>
                        <h4>{{ trans('label.sponsors_information') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.sponsor_type') }}</div>
                            <div class="col-sm-8">
                                <select data-placeholder="" name="type[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    @foreach($sponsorTypes as $type)
                                        <option value="{{ $type->id }}" >{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Search now</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script>
    $(document).ready(function(){

    });
</script>
@endsection