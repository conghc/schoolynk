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
    <script src="/js/plugins/summernote/summernote.min.js"></script>
    <!-- Chosen -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
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
            $('.summernote').summernote();
            $('#profile-image').on('click', function() {
                $('#profile-image-upload').click();
            });
            $("#profile-image-upload").change(function(){
                readURL(this);
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#sponsor-logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.account_information') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <form method="get" class="form-horizontal">
                        <div class="col-sm-8 b-r">
                            <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.choose_sponsor') }}</label>
                                <div class="col-sm-9">
                                    <select data-placeholder="{{ trans('label.add_new') }}" class="chosen-select" multiple style="width:100%" tabindex="4">
                                        <option>National Government</option>
                                        <option>Prefectural Government</option>
                                        <option>City hall</option>
                                        <option>Private company</option>
                                        <option>University</option>
                                        <option>Foundation</option>
                                        <option>Individual</option>
                                        <option>Others</option>
                                    </select>
                                    <div class="help-block">Select Sponsor from list or create new!</div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.name_of_sponsor') }}</label>
                                <div class="col-sm-9"><input type="text" name="name" class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.contact_email') }}</label>
                                <div class="col-sm-9"><input type="email" name="contact_email" class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.password') }}</label>
                                <div class="col-sm-9"><input type="password" name="password" class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.re_enter_password') }}</label>
                                <div class="col-sm-9"><input type="password" name="re_password" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-sm-4"><h4>{{ trans('label.sponsor_logo_photo') }}</h4>
                            <p class="text-center">
                                <input id="profile-image-upload" name="img_profile" class="hidden" type="file">
                                <a id="profile-image" href="javascript:;"><img id="sponsor-logo" style="border-radius: 50%" src="/img/hotgirl.png" /></a>
                            </p>
                        </div>
                        {{--<button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>--}}
                    </form>
                </div>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.header') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_scholarship') }}</label>
                        <div class="col-sm-10"><input type="text" name="name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_sponsor') }}</label>
                        <div class="col-sm-10"><p class="form-control-static">Mr Bomba</p></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_deadline') }}</label>
                        <div class="col-sm-10" id="data_1">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="application_deadline" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.contact_admission') }}</label>
                        <div class="col-sm-10"><input type="email" name="contact_admission" class="form-control"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.general_information') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.type_of_award') }}</label>
                        <div class="col-sm-10">
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="" value="1" name="type_of_scholarship" checked="">
                                <label for="type_of_scholarship">Scholarship</label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" id="" value="2" name="type_of_scholarship">
                                <label for="type_of_scholarship">No interest loan</label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" id="" value="3" name="type_of_scholarship">
                                <label for="type_of_scholarship">Loan</label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.amount_of_award') }}</label>
                        <div class="col-md-2"><input type="text" placeholder="Number" class="form-control"></div>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="amount">
                                @foreach($currencies as $currence)
                                    <option value='{{ $currence->soft_name }}'>
                                        {{ $currence->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="account">
                                <option value="month" selected>Month</option>
                                <option value="quarter">Quarter</option>
                                <option value="year">Year</option>
                                <option value="single payment">Single payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.type_of_cost_covered') }}</label>
                        <div class="col-sm-10">
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="" value="1" name="type_of_cost_covered" checked="">
                                <label for="type_of_cost_covered">Tuition fee</label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="" value="2" name="type_of_cost_covered">
                                <label for="type_of_cost_covered">Living cost</label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="" value="3" name="type_of_cost_covered">
                                <label for="type_of_cost_covered">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.number_of_awards_granted') }}</label>
                        <div class="col-sm-4"><input class="touchspin1" type="text" value="66" name="number_of_awards_granted"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.applicable_scholarship_year') }}</label>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="applicable_year['from']">
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="applicable_year['to']">
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_deadline') }}</label>
                        <div class="col-sm-10" id="data_2">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.scholarship_url') }}</label>
                        <div class="col-sm-10"><input type="text" class="form-control"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.eligibility_requirement') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.age') }}</label>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="account">
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control m-b" name="account">
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.gender') }}</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                    <label for="inlineRadio1">Male</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                    <label for="inlineRadio2">Female</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                    <label for="inlineRadio2">Both</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.nationality') }}</label>
                        <div class="col-sm-7">
                            <select name="test" data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach($nationalities as $nationality)
                                    <option value='{{ $nationality }}'>
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
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach($academics as $academic)
                                    <option value="{{ $academic->id }}">{{ $academic->name }}</option>
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
                            <select data-placeholder="{{ trans('label.choice') }}" class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach ( $countries as $k => $country)
                                    <option value="{{ $k }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                            <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.qualified_school_&_academics') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.award_can_be_used_for') }}</label>
                        <div class="col-sm-10">
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach($awardUsedFor as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.award_can_be_used_at') }}</label>
                        <div class="col-sm-10">
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                <option value="university">University</option>
                                <option value="vocational_school">Vocational school</option>
                                <option value="language_school">Language school</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.qualified_majors') }}</label>
                        <div class="col-sm-7">
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach($dataMajors as $k=>$majors)
                                    <optgroup label="{{ $k }}">
                                        @foreach($majors as $k=>$major)
                                        <option value="{{ $k }}">{{ $major }}</option>
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
                            <select data-placeholder="{{ trans('label.choice') }}" class="chosen-select" style="width:100%" tabindex="2">
                                <option value="JP" selected>Japan</option>
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                @foreach ( $states as $k => $state)
                                    <option value="{{ $k }}">{{ $state }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.designated_school') }}</label>
                        <div class="col-sm-7">
                            <select data-placeholder="..." class="chosen-select" multiple style="width:100%" tabindex="4">
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-default btn-sm chosen-toggle select">Select All</button>
                            <button type="button" class="btn btn-default btn-sm chosen-toggle deselect">Deselect All</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.application_requirement_&_process') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_method') }}</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                    <label for="inlineRadio1">Document screening</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                    <label for="inlineRadio2">Interview</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                    <label for="inlineRadio2">Examination</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.application_requirement') }}</label>
                        <div class="col-sm-10">
                            <div class="summernote">
                                <h3>Lorem Ipsum is simply</h3>
                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                <br/>
                                <br/>
                                <ul>
                                    <li>Remaining essentially unchanged</li>
                                    <li>Make a type specimen book</li>
                                    <li>Unknown printer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('label.sponsors_information') }}</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.name_of_sponsor') }}</label>
                        <div class="col-sm-10">Show what is written above</div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsor_type') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control m-b" name="account">
                                @foreach($sponsorTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsors_address') }}</label>
                        <div class="col-sm-10"><input type="text" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.sponsors_website') }}</label>
                        <div class="col-sm-10"><input type="text" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.contact') }}</label>
                        <div class="col-sm-10">Show what is written above</div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.other_information') }}</label>
                        <div class="col-sm-10">
                            <div class="summernote">
                                <h3>Lorem Ipsum is simply</h3>
                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                <br/>
                                <br/>
                                <ul>
                                    <li>Remaining essentially unchanged</li>
                                    <li>Make a type specimen book</li>
                                    <li>Unknown printer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection