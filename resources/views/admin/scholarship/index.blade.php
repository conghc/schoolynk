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
                    {
                        text: '{{ trans("scholarship.scholarship_add") }}',
                        action: function (){
                            window.location.href = "http://schoolynk.dev/admin/scholarship/create";
                        }
                    }
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
                                        <button type="button" class="btn btn-default btn-xs">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="gradeX">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                                <td class="center">C</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.5
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5.5</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 6
                                </td>
                                <td>Win 98+</td>
                                <td class="center">6</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Internet Explorer 7</td>
                                <td>Win XP SP2+</td>
                                <td class="center">7</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                                <td class="center">A</td>
                            </tr>
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
                                    <input id="checkbox1" type="checkbox">
                                    <label for="inlineCheckbox1">Tuition fee</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="inlineCheckbox2">Living cost</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="inlineCheckbox3">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.amount_of_award') }}</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option value="">Above</option>
                                    <option value="">Below</option>
                                    <option value="">Equal</option>
                                </select>
                            </div>
                            <div class="col-sm-5"><input type="email" class="form-control"></div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">{{ trans('label.type_of_cost_covered') }}</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="inlineCheckbox1">Tuition fee</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="inlineCheckbox2">Living cost</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="inlineCheckbox3">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Number of  awards granted</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option value="">Above</option>
                                    <option value="">Below</option>
                                    <option value="">Equal</option>
                                </select>
                            </div>
                            <div class="col-sm-5"><input type="email" class="form-control"></div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Applicable scholarship year</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Application deadline</div>
                            <div class="col-sm-4" id="deadline">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-sm-4" id="deadline-max">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <h4>{{ trans('label.eligibility_requirement') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Age requirement</div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control m-b" name="account">
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Gender requirement</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="inlineCheckbox1">Tuition fee</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="inlineCheckbox2">Living cost</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="inlineCheckbox3">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Nationality requirement</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Current academic level</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Current place of residence</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <h4>{{ trans('label.qualified_school_&_academics') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Award can be used for</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Award can be used at</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Qualified majors</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Designated area</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><div class="col-sm-4 control-label">Designated school</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <h4>{{ trans('label.application_requirement_&_process') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Selection method</div>
                            <div class="col-sm-8">
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="inlineCheckbox1">Tuition fee</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="inlineCheckbox2">Living cost</label>
                                </div>
                                <div class="checkbox checkbox-inline">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="inlineCheckbox3">Others</label>
                                </div>
                            </div>
                        </div>
                        <h4>{{ trans('label.sponsors_information') }}</h4>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><div class="col-sm-4 control-label">Sponsor’s type</div>
                            <div class="col-sm-8">
                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018" selected>2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
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