@extends('layouts.admin')
@section('header-2')
    {{ trans('label.schoolarship_create') }}
@endsection
@section('js')
    <link href="/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <!-- Data picker -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- TouchSpin -->
    <script src="/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- SUMMERNOTE -->
    <script src="/js/plugins/summernote/summernote.js"></script>
    <!-- Chosen -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
    <!-- add some js -->
    <script src="/js/js_app/scholarship.js"></script>
    <script>
        $(document).ready(function(){
            $('#data_1 .input-group.date, #data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });
            $('.summernote').summernote({
                minHeight: 250
            });

            // chosen select
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

            //select-all or deselect all
            $('.chosen-toggle').each(function(index) {
                $(this).on('click', function(){
                    $(this).parent().parent().find('.chosen-select option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
                });
            });
        });
    </script>
    @include('partials.form_errors')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" id="scholarship_id" name="scholarship_id" value="{{ $id }}" />
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="account_information">
                <div class="ibox-title">
                    <h5>{{ trans('label.account_information') }}</h5>
                    <div class="ibox-tools">
                        <button class="btn btn-primary btn-xs save_acc_information" type="submit">{{ trans('label.save_changes') }}</button>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                            <div class="col-sm-8 b-r">
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.choose_sponsor') }}</label>
                                    <div class="col-sm-9">
                                        <select name="sponsor_id" id="select-sponsor" class="chosen-select" style="width:100%" tabindex="4">
                                            <option value="0">{{ trans('label.create_new') }}</option>
                                            @foreach($sponsors as $sponsor)
                                                <option value="{{ $sponsor->id }}" {{ $sponsor_id == $sponsor->id ? 'selected' : '' }}>{{ $sponsor->email }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block">Select Sponsor from list or create new!</div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.name_of_sponsor') }}</label>
                                    <div class="col-sm-9"><input type="text" name="name" value="{{ $sponsor_info->name or '' }}" class="form-control sponsor_name"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.contact_email') }}</label>
                                    <div class="col-sm-9"><input type="email" name="email" value="{{ $sponsor_info->email or '' }}" class="form-control sponsor_email"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.password') }}</label>
                                    <div class="col-sm-9"><input type="password" id="password" name="password" class="form-control sponsor_password"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.re_enter_password') }}</label>
                                    <div class="col-sm-9"><input type="password" name="re_password" class="form-control sponsor_repassword"></div>
                                </div>
                            </div>
                            <div class="col-sm-4"><h4>{{ trans('label.sponsor_logo_photo') }}</h4>
                                <p class="text-center">
                                    <input id="profile-image-upload" name="img_profile" class="hidden" type="file">
                                    <a id="profile-image" href="javascript:;">
                                        <img id="sponsor-logo"src="/{{ $sponsor_info ? $sponsor_info->img_profile : 'img/no-image.png' }}" />
                                    </a>
                                </p>
                            </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="scholarship-header">
                    <div class="ibox-title">
                        <h5>{{ trans('label.header') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_scholarship') }}</label>
                            <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ $scholarship->name or '' }}"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_sponsor') }}</label>
                            <div class="col-sm-10"><input type="text" disabled="" value="{{ $sponsor_info->name or '' }}" class="form-control sponsor_name"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_deadline') }}</label>
                            <div class="col-sm-10" id="data_1">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="deadline" class="form-control" value="{{ $scholarship->deadline or '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.contact_admission') }}</label>
                            <div class="col-sm-10">
                                <input type="email" name="contact_admission" class="form-control" value="{{ $scholarship->contact_admission or '' }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="general_information">
                    <div class="ibox-title">
                        <h5>{{ trans('label.general_information') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs col-hidden" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link col-hidden">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.type_of_award') }}</label>
                            <?php $type_of_award = $scholarship ? $scholarship->type_of_award : 0 ?>
                            <div class="col-sm-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="1" name="type_of_award" {{ $addNew == true ? 'checked' : '' }} {{ $type_of_award == 1 ? 'checked' : '' }}>
                                    <label for="type_of_scholarship">Scholarship</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="2" name="type_of_award" {{ $type_of_award == 2 ? 'checked' : '' }}>
                                    <label for="type_of_scholarship">No interest loan</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="3" name="type_of_award" {{ $type_of_award == 3 ? 'checked' : '' }}>
                                    <label for="type_of_scholarship">Loan</label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.amount_of_award') }}</label>
                            <div class="col-md-2">
                                <input type="text" value="{{ $scholarship->amount or 0 }}" name="amount" placeholder="Number" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <?php $currency_val = $scholarship ? $scholarship->currency : '' ?>
                                <select class="form-control m-b" name="currency">
                                    @foreach($currencies as $currence)
                                        <option value='{{ $currence->sort_name }}' {{ $currency_val == $currence->sort_name ? 'selected' : '' }}>
                                            {{ $currence->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <?php $frequency = $scholarship ? $scholarship->frequency : '' ?>
                                <select class="form-control m-b" name="frequency">
                                    <option value="month" {{ $frequency == 'month' ? 'selected' : '' }}>Month</option>
                                    <option value="quarter" {{ $frequency == 'quarter' ? 'selected' : '' }}>Quarter</option>
                                    <option value="year" {{ $frequency == 'year' ? 'selected' : '' }}>Year</option>
                                    <option value="single payment" {{ $frequency == 'single payment' ? 'selected' : '' }}>Single payment</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.type_of_cost_covered') }}</label>
                            <?php $type_of_cost_covered = $scholarship ? $scholarship->type_of_cost_covered : 0 ?>
                            <div class="col-sm-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="1" name="type_of_cost_covered" {{ $type_of_cost_covered == 1 ? 'checked' : '' }}>
                                    <label for="type_of_cost_covered">Tuition fee</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="2" name="type_of_cost_covered" {{ $type_of_cost_covered == 2 ? 'checked' : '' }}>
                                    <label for="type_of_cost_covered">Living cost</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="" value="3" name="type_of_cost_covered" {{ $type_of_cost_covered == 3 ? 'checked' : '' }}>
                                    <label for="type_of_cost_covered">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.number_of_awards_granted') }}</label>
                            <div class="col-sm-4"><input class="touchspin1" type="text" value="{{ $scholarship->number_of_awards_granted or 0 }}" name="number_of_awards_granted"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.applicable_scholarship_year') }}</label>
                            <div class="col-md-3">
                                <?php $applicable_year = $scholarship ? $scholarship->applicable_year : 0 ?>
                                <select class="form-control m-b" name="applicable_year">
                                    <?php for($i=2017; $i<2030; $i++): ?>
                                    <option value="{{ $i }}" {{ $applicable_year == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <?php $applicable_year_max = $scholarship ? $scholarship->applicable_year_max : 0 ?>
                                <select class="form-control m-b" name="applicable_year_max">
                                    <?php for($i=2017; $i<2030; $i++): ?>
                                    <option value="{{ $i }}" {{ $applicable_year_max == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.scholarship_url') }}</label>
                            <div class="col-sm-10"><input type="text" name="url" class="form-control" value="{{ $scholarship->url or '' }}"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="eligibility_requirement">
                    <div class="ibox-title">
                        <h5>{{ trans('label.eligibility_requirement') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs col-hidden" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link col-hidden">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.age') }}</label>
                            <div class="col-md-3">
                                <?php $age = $scholarship ? $scholarship->age : 0; ?>
                                <select class="form-control m-b" name="age">
                                    @for($i=1; $i<=80; $i++)
                                        <option value="{{ $i }}" {{ $age == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <?php $age_max = $scholarship ? $scholarship->age_max : 0; ?>
                                <select class="form-control m-b" name="age_max">
                                    @for($i=1; $i<=80; $i++)
                                        <option value="{{ $i }}" {{ $age_max == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.gender') }}</label>
                            <div class="col-sm-10">
                                <div class="col-sm-10">
                                    <?php $gender = $scholarship ? $scholarship->gender : ''?>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="male" name="gender" {{ $gender == 'male' ? 'checked' : '' }}>
                                        <label for="gender">Male</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="female" name="gender" {{ $gender == 'female' ? 'checked' : '' }}>
                                        <label for="gender">Female</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="both" name="gender" {{ $gender == 'both' ? 'checked' : '' }}>
                                        <label for="gender">Both</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.nationality') }}</label>
                            <div class="col-sm-7">
                                <?php $nationality_arr = isset($scholarship->nationality_arr) ? $scholarship->nationality_arr : []; ?>
                                <select id="nationality" name="nationality[]" data-placeholder="{{ trans('label.choice') }}" class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @foreach($nationalities as $nationality)
                                        <option value='{{ $nationality }}' {{ in_array(strtolower($nationality), $nationality_arr) ? 'Selected' : '' }}>
                                            {{ $nationality }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                                <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.applicants_current_academic_level') }}</label>
                            <div class="col-sm-7">
                                <?php $academic_level_arr = isset($scholarship->academic_level_arr) ? $scholarship->academic_level_arr : [];?>
                                <select name="applicants_current_academic_level[]" data-placeholder="{{ trans('label.choice') }}" class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @foreach($academics as $academic)
                                        <option value="{{ $academic->id }}" {{ in_array($academic->id, $academic_level_arr) ? 'Selected' : '' }}>
                                            {{ $academic->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                                <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.current_place_of_residence') }}</label>
                            <div class="col-sm-7">
                                <?php $place_of_residence_arr = isset($scholarship->place_of_residence_arr) ? $scholarship->place_of_residence_arr : [];?>
                                <select name="current_place_of_residence[]" data-placeholder="{{ trans('label.choice') }}" class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @foreach ( $countries as $k => $country)
                                        <option value="{{ $k }}" {{ in_array(strtolower($k), $place_of_residence_arr) ? 'Selected' : '' }}>
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                                <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="qualified_school_academics">
                    <div class="ibox-title">
                        <h5>{{ trans('label.qualified_school_&_academics') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs col-hidden" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link col-hidden">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.award_can_be_used_for') }}</label>
                            <div class="col-sm-10">
                                <?php $award_used_for_arr = isset($scholarship->award_used_for_arr) ? $scholarship->award_used_for_arr : []; ?>
                                <select name="award_can_be_used_for[]" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @foreach($awardUsedFor as $p)
                                        <option value="{{ $p->id }}" {{ in_array($p->id, $award_used_for_arr) ? 'Selected' : '' }}>
                                            {{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.award_can_be_used_at') }}</label>
                            <div class="col-sm-10">
                                <?php $award_used_at_arr = isset($scholarship->award_used_at_arr) ? $scholarship->award_used_at_arr : [];?>
                                <select name="award_can_be_used_at[]" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                    <option value="university" {{ in_array('university', $award_used_at_arr) ? 'Selected' : '' }}>University</option>
                                    <option value="vocational_school" {{ in_array('vocational_school', $award_used_at_arr) ? 'Selected' : '' }}>Vocational school</option>
                                    <option value="language_school" {{ in_array('language_school', $award_used_at_arr) ? 'Selected' : '' }}>Language school</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.qualified_majors') }}</label>
                            <div class="col-sm-7">
                                <select name="qualified_majors[]" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                    <?php $majors_arr = isset($scholarship->majors_arr) ? $scholarship->majors_arr : []; ?>
                                    @foreach($dataMajors as $k=>$majors)
                                        <optgroup label="{{ $k }}">
                                            @foreach($majors as $k=>$major)
                                                <option value="{{ $k }}" {{ in_array($k, $majors_arr) ? 'Selected' : '' }}>{{ $major }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                                <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.designated_area') }}</label>
                            <div class="col-sm-3">
                                <select name="designated_country[]" data-placeholder="{{ trans('label.choice') }}" class="chosen-select" style="width:100%" tabindex="2">
                                    <option value="JP" selected>Japan</option>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                <?php $designated_area_arr = isset($scholarship->designated_area_arr) ? $scholarship->designated_area_arr : []; ?>
                                <select name="designated_state[]" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @foreach ( $states as $k => $state)
                                        <option value="{{ $k }}" {{ in_array($k, $designated_area_arr) ? 'Selected' : '' }}>
                                            {{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.designated_school') }}</label>
                            <div class="col-sm-7">
                                <?php $schools_arr = isset($scholarship->schools_arr) ? $scholarship->schools_arr : [];?>
                                <select name="designated_school[]" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                    @for($i=1; $i<6; $i++)
                                        <option value="{{ $i }}" {{ in_array($i, $schools_arr) ? 'Selected' : '' }}>School 0{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                                <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="application_method">
                    <div class="ibox-title">
                        <h5>{{ trans('label.application_requirement_&_process') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs col-hidden" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link col-hidden">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_method') }}</label>
                            <div class="col-sm-10">
                                <div class="col-sm-10">
                                    <?php $application_method = $scholarship ? $scholarship->application_method : 0 ?>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="1" {{ $application_method == 1 ? 'checked' : '' }} name="application_method" >
                                        <label for="inlineRadio1">Document screening</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="2" {{ $application_method == 2 ? 'checked' : '' }} name="application_method">
                                        <label for="inlineRadio2">Interview</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="3" {{ $application_method == 3 ? 'checked' : '' }} name="application_method">
                                        <label for="inlineRadio2">Examination</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_requirement') }}</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="" name="application_requirement" rows="40">
                                    {{ $scholarship->application_requirement or '' }}
                                </textarea>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-2 control-label"></label>--}}
                            {{--<div class="col-sm-10 test_showtext">--}}
                                {{--{!! $scholarship->application_requirement !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="POST" role="form" class="form-horizontal" id="sponsors_information">
                    <div class="ibox-title">
                        <h5>{{ trans('label.sponsors_information') }}</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary btn-xs col-hidden-sponsor" type="submit">{{ trans('label.save_changes') }}</button>
                            <a class="collapse-link col-hidden-sponsor">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden-sponsor">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_sponsor') }}</label>
                            <div class="col-sm-10">
                                <input type="text" disabled="" class="form-control sponsor_name" value="{{ $sponsor_info->name or '' }}" />
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsor_type') }}</label>
                            <?php $sp_type = isset($sponsor_info->sponsorInfo->type) ? $sponsor_info->sponsorInfo->type : 0; ?>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="type">
                                    @foreach($sponsorTypes as $type)
                                        <option value="{{ $type->id }}" {{ $sp_type == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsors_address') }}</label>
                            <div class="col-sm-10"><input type="text" name="address" class="form-control" value="{{ $sponsor_info->sponsorInfo->address or '' }}"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsors_website') }}</label>
                            <div class="col-sm-10"><input type="text" name="website" class="form-control" value="{{ $sponsor_info->sponsorInfo->website or '' }}"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.contact') }}</label>
                            <div class="col-sm-10"><input type="text" disabled="" value="{{ $sponsor_info->email or '' }}" class="form-control sponsor_email"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.other_information') }}</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="summernote" name="other_information" rows="40">
                                    {{ $sponsor_info->sponsorInfo->other_information or '' }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection