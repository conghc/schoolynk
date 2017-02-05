@extends('layouts.admin')
@section('header-2')
    {{ trans('label.schoolarship_create') }}
@endsection
@section('js')
    <link href="/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Data picker -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- TouchSpin -->
    <script src="/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- SUMMERNOTE -->
    <script src="/js/plugins/summernote/summernote.js"></script>
    <!-- Chosen -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
    <!-- DROPZONE -->
    <script src="/js/plugins/dropzone/dropzone.js"></script>
    <script>
        var add_more_school = "{{ trans('school.add_more_school') }}";
    </script>
    <!-- add some js -->
    <script src="/js/js_app/school.js"></script>
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

        // check upload brochure
        function getExtension(filename) {
            var parts = filename.split('.');
            return parts[parts.length - 1];
        }
        function isImage(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'pdf':
                    return true;
            }
            return false;
        }
        function submitProfileBoard(){
            var file = $('#brochure');
            if(file.val() != ''){
                if (!isImage(file.val())) {
                    alert('Please upload file PDF');
                }else{
                    $("#profile_board").submit();
                }
            }else{
                $("#profile_board").submit();
            }
        };
    </script>
    @include('partials.form_errors_school')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <input type="hidden" name="school_id" id="school_id" value="{{ $school->id or 0 }}">
                <input type="hidden" name="user_type" id="user_type" value="school">
                <input type="hidden" name="sType" id="sType" value="{{ $sType }}">
                <form method="POST" role="form" class="form-horizontal" id="account_information">
                    <input type="hidden" name="sponsor_id" id="sponsor_id" value="{{ $school->id or 0 }}">
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
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('school.name_of_school') }}</label>
                                    <div class="col-sm-9"><input type="text" name="name" value="{{ $school->name or '' }}" class="form-control sponsor_name"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">{{ trans('label.contact_email') }}</label>
                                    <div class="col-sm-9"><input type="email" name="email" value="{{ $school->email or '' }}" class="form-control sponsor_email"></div>
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
                            <div class="col-sm-4"><h4>{{ trans('school.school_logo_photo') }}</h4>
                                <p class="text-center">
                                    <input id="profile-image-upload" name="img_profile" class="hidden" type="file">
                                    <a id="profile-image" href="javascript:;">
                                        <img id="sponsor-logo"src="/{{ isset($school) ? $school->img_profile : 'img/no-image.png' }}" />
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="post" role="form"  action="/admin/school-info-update" class="form-horizontal" id="profile_board" enctype="multipart/form-data">
                    <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="school_info_id" value="{{ $school->schoolInfo->id or 0 }}">
                    <div class="ibox-title">
                        <h5>{{ trans('school.profile_board') }}</h5>
                        <div class="ibox-tools col-hidden">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <button onclick="submitProfileBoard();" class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                            </a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        @if($sType != 'language')
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.university_ranking') }}</label>
                            <div class="col-sm-10"><input min="0" type="number" value="{{ $school->schoolInfo->ranking or '' }}" name="ranking" class="form-control"></div>
                        </div>
                        @endif
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.type_of_school') }}</label>
                            <div class="col-sm-10">
                                <?php $type_of_school = isset($school->schoolInfo) ? $school->schoolInfo->type_of_school : 'public'?>
                                <select class="form-control m-b" name="type_of_school">
                                    <option value="public" {{ $type_of_school == 'public' ? 'selected' : ''}}>Public</option>
                                    <option value="private" {{ $type_of_school == 'private' ? 'selected' : ''}}>Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.setting') }}</label>
                            <div class="col-sm-10">
                                <?php $setting = isset($school->schoolInfo) ? $school->schoolInfo->setting : 'city'?>
                                <select class="form-control m-b" name="setting">
                                    <option value="city" {{ $setting == 'city' ? 'selected' : ''}}>City</option>
                                    <option value="suburb" {{ $setting == 'suburb' ? 'selected' : ''}}>Suburb</option>
                                </select>
                            </div>
                        </div>
                        @if($sType == 'language')
                            <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.lesson_format') }}</label>
                                <div class="col-sm-10">
                                    <?php $lesson_format = isset($school->schoolInfo) ? $school->schoolInfo->lesson_format : 'group_lesson'?>
                                    <select class="form-control m-b" name="lesson_format">
                                        <option value="group_lesson" {{ $lesson_format == 'group_lesson' ? 'selected' : ''}}>{{ trans('school.group_lesson') }}</option>
                                        <option value="private_lesson" {{ $lesson_format == 'private_lesson' ? 'selected' : ''}}>{{ trans('school.private_lesson') }}</option>
                                        <option value="group_private" {{ $lesson_format == 'group_private' ? 'selected' : ''}}>{{ trans('school.group_private') }}</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        @if($sType != 'language')
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.english_course') }}</label>
                            <div class="col-sm-10">
                                <?php $english_course = isset($school->schoolInfo) ? $school->schoolInfo->english_course : 1?>
                                <select class="form-control m-b" name="english_course">
                                    <option value="1" {{ $english_course == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ $english_course == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.web_application') }}</label>
                            <div class="col-sm-10">
                                <?php $web_application = isset($school->schoolInfo) ? $school->schoolInfo->web_application : 1?>
                                <select class="form-control m-b" name="web_application">
                                    <option value="1" {{ $web_application == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ $web_application == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.school_website') }}</label>
                            <div class="col-sm-10"><input type="text" name="website" value="{{ $school->schoolInfo->website or '' }}" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.total_no_of_students') }}</label>
                            <div class="col-sm-10"><input min="0" type="number" value="{{ $school->schoolInfo->total_no_of_students or '' }}" name="total_no_of_students" class="form-control"></div>
                        </div>
                        @if($sType != 'language')
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.total_no_of_international_students') }}</label>
                            <div class="col-sm-10"><input min="0" type="number" value="{{ $school->schoolInfo->total_no_of_international_students or '' }}" name="total_no_of_international_students" class="form-control"></div>
                        </div>
                        @endif
                        @if($sType == 'language')
                            <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.no_of_students_per_class') }}</label>
                                <div class="col-sm-10"><input min="0" type="number" value="{{ $school->schoolInfo->no_of_students_per_class or '' }}" name="no_of_students_per_class" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.total_no_of_teachers') }}</label>
                                <div class="col-sm-10"><input min="0" type="number" value="{{ $school->schoolInfo->total_no_of_teachers or '' }}" name="total_no_of_teachers" class="form-control"></div>
                            </div>
                        @endif
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.tuition_fee') }}</label>
                            <div class="col-md-2"><input min="0" name="tuition_fee" value="{{ $school->schoolInfo->tuition_fee or '' }}" type="number" placeholder="Number" class="form-control"></div>
                            <div class="col-md-1" style="width:41px"><img class="ic-about" src="/img/icon-02.png" /></div>
                            <div class="col-md-2"><input min="0" name="tuition_fee_max" value="{{ $school->schoolInfo->tuition_fee_max or '' }}" type="number" placeholder="Number" class="form-control"></div>
                            <div class="col-md-3">
                                <?php $tuition_fee_currency = isset($school->schoolInfo) ? $school->schoolInfo->tuition_fee_currency : 'JPY'?>
                                <select class="form-control m-b" name="tuition_fee_currency">
                                    @foreach($currencies as $currence)
                                        <option value='{{ $currence->sort_name }}' {{ $tuition_fee_currency == $currence->sort_name ? 'selected' : '' }}>
                                            {{ $currence->sort_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.cost_of_living') }}</label>
                            <div class="col-md-2"><input min="0" name="cost_of_living" value="{{ $school->schoolInfo->cost_of_living or '' }}" type="number" placeholder="Number" class="form-control"></div>
                            <div class="col-md-1" style="width:41px"><img class="ic-about" src="/img/icon-02.png" /></div>
                            <div class="col-md-2"><input min="0" name="cost_of_living_max" value="{{ $school->schoolInfo->cost_of_living_max or '' }}" type="number" placeholder="Number" class="form-control"></div>
                            <div class="col-md-3">
                                <?php $cost_of_living_currency = isset($school->schoolInfo) ? $school->schoolInfo->cost_of_living_currency : 'JPY'?>
                                <select class="form-control m-b" name="cost_of_living_currency">
                                    @foreach($currencies as $currence)
                                        <option value='{{ $currence->soft_name }}' {{ $cost_of_living_currency == $currence->sort_name ? 'selected' : '' }}>
                                            {{ $currence->sort_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($sType == 'language')
                            <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.student_dorm') }}</label>
                                <div class="col-sm-10">
                                    <?php $student_dorm = isset($school->schoolInfo) ? $school->schoolInfo->student_dorm : 1?>
                                    <select class="form-control m-b" name="student_dorm">
                                        <option value="1" {{ $student_dorm == 1 ? 'selected' : ''}}>{{ trans('label.yes') }}</option>
                                        <option value="0" {{ $student_dorm == 0 ? 'selected' : ''}}>{{ trans('label.no') }}</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.download_brochure') }}</label>
                            <div class="col-sm-10">
                                <input type="file" id="brochure" name="brochure" >
                                <a target="_blank" href="/{{ $school->schoolInfo->brochure or '' }}">{{ $school->schoolInfo->brochure or '' }}</a>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.contact_admission') }}</label>
                            <div class="col-sm-10"><input type="email" value="{{ $school->schoolInfo->contact_admission or '' }}" name="contact_admission" class="form-control"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ trans('school.picture_library') }}</h5>
                    <div class="ibox-tools col-hidden">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibc-hidden">
                    <form method="POST" id="my-awesome-dropzone" class="dropzone" action="/admin/upload-images?id={{ $school->id or 0 }}&type=school" style="min-height:150px">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="dropzone-previews"></div>
                        <button type="submit" class="btn btn-primary pull-right">Submit this form!</button>
                    </form>
                </div>
                <div class="ibox-content ibc-hidden" id="box-gallery">
                    <ul id="list1">
                        @if(isset($school->images))
                            @if($school->images->count() > 0)
                                @foreach($school->images as $image)
                                    <li class="ui-state-default"><div><img class="child-image" id="{{ $image->id }}" width="128" height="70" src="/{{ $image->path }}" /></div></li>
                                @endforeach
                            @endif
                        @endif
                    </ul>
                    <input name="list1SortOrder" type="hidden" />
                </div>
            </div>
            @if($sType != 'language')
                <div class="ibox float-e-margins">
                    <form method="post" role="form"  action="/admin/school-structure" class="form-horizontal" id="school_structure" enctype="multipart/form-data">
                        <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sType" value="{{$sType}}">
                        <input type="hidden" name="school_structure_id" id="school_structure_id" value="{{ $school->structure->id or 0 }}">
                        <div class="ibox-title">
                            <h5>{{ trans('school.academics_board') }} <small>{{ trans('school.school_structure') }}</small></h5>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="ibox-tools col-hidden">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <button onclick="$('#school_structure').submit();" class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                                    <input type="hidden" name="fs_id_remove" id="fs_id_remove" value="0" />
                                    <input type="hidden" name="f_id_remove" id="f_id_remove" value="0" />
                                </a>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content ibc-hidden">
                            @if($sType == 'university')
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-primary btn-xs add-more-faculty">{{ trans('school.add_more_faculty') }}</button>
                                    </div>
                                </div>
                                <div class="list-faculty">
                                    @if(isset($school->faculty))
                                        @if($school->faculty->count() > 0)
                                            @foreach($school->faculty as $k=>$faculty)
                                                <div class="form-group child-faculty">
                                                    <div class="col-sm-1"><a f_id="{{ $faculty->id }}" class="btn btn-white" onclick="removeElem(this);"><i class="fa fa-minus"></i></a></div>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="{{ $faculty->name }}" name="structure[{{ $k+1 }}][name_faculty]" class="form-control name_faculty">
                                                        <input type="hidden" name="structure[{{ $k+1 }}][faculty_id]" value="{{ $faculty->id }}" />
                                                        <div class="list-school" stt="{{ $k+1 }}">
                                                            @foreach($faculty->facultySchool as $x=>$fs)
                                                                <div class="child-school">
                                                                    <input type="hidden" name="structure[{{ $k+1 }}][school][{{ $x+1 }}][fs_id]" value="{{ $fs->id }}" />
                                                                    <div class="col-sm-1">
                                                                        <a class="btn btn-white" fs_id="{{ $fs->id }}" onclick="removeElem(this);"><i class="fa fa-minus"></i></a>
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" value="{{ $fs->name }}" name="structure[{{ $k+1 }}][school][{{ $x+1 }}][name_school]" class="form-control name_school">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control m-b s_child" name="structure[{{ $k+1 }}][school][{{ $x+1 }}][child]">
                                                                            <option value="undergraduate" {{ $fs->academic_level == 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                                                            <option value="graduate" {{ $fs->academic_level == 'graduate' ? 'selected' : '' }}>Graduate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-11">
                                                                <button onclick="addMoreSchool(this);" type="button" class="btn btn-primary btn-xs">{{ trans('school.add_more_school') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            @elseif($sType == 'vocational')
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-primary btn-xs add-more-school">{{ trans('school.add_more_school') }}</button>
                                    </div>
                                </div>
                                <div class="list-fSchool">
                                    @if(isset($school->facultySchool))
                                        @if($school->facultySchool->count() > 0)
                                            @foreach($school->facultySchool as $k=>$fs)
                                                <div class="form-group child-school">
                                                    <div class="col-sm-9">
                                                        <input type="text" value="{{ $fs->name }}" name="fSchoolOld[{{ $fs->id }}]" class="form-control name_school">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="ibox float-e-margins">
                    <form method="get" class="form-horizontal">
                        <div class="ibox-title">
                            <h5>{{ trans('school.academics_board') }} <small>{{ trans('school.school_information') }}</small></h5>
                            <div class="ibox-tools structure-hidden">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{--<button class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>--}}
                                </a>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        @if(isset($school->faculty))
                            @if(($school->faculty->count() > 0 && $sType == 'university') || ($school->facultySchool->count() > 0 && $sType == 'vocational'))
                            <div class="ibox-content structure-hidden">
                                <div class="form-group">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <select class="chosen-select" style="width:400px"  name="faculty_school_id" id="fs_id">
                                            <option value="0" >{{ trans('school.pls_choose_school') }}</option>
                                            @if($sType == 'university')
                                                @foreach($school->faculty as $faculty)
                                                    @foreach($faculty->facultySchool as $fs)
                                                        <option value="{{ $fs['id'] }}" {{ $fs['added_info'] == 1 ? 'disabled' : '' }}>{{ $fs['name'] }}</option>
                                                    @endforeach
                                                @endforeach
                                            @elseif($sType == 'vocational')
                                                @foreach($school->facultySchool as $fs)
                                                    <option value="{{ $fs['id'] }}" {{ $fs['added_info'] == 1 ? 'disabled' : '' }}>{{ $fs['name'] }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" type="button" id="add_fs_info">{{ trans('label.add') }}</button>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div id="listFsInfo">
                                    @if($sType == 'university')
                                        @if(isset($school->faculty))
                                            @if($school->faculty->count() > 0)
                                                @foreach($school->faculty as $faculty)
                                                    @foreach($faculty->facultySchool as $fs)
                                                        @if($fs->added_info == 1)
                                                            <div class="form-group">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-7">
                                                                    <input type="text" disabled="" id="{{ $fs->id or 0 }}" value="{{ $fs->name or '' }}" class="form-control fs_name">
                                                                    <button type="button" onclick="schoolMajor(this);" class="btn btn-w-m btn-link">{{ trans('school.major') }}</button><br />
                                                                    <button type="button" other_type="admission" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.admission') }}</button><br />
                                                                    <button type="button" other_type="tuitionFee" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.tuition_fee') }}</button><br />
                                                                    <button type="button" onclick="schoolScholarships(this);" class="btn btn-w-m btn-link">{{ trans('school.scholarships') }}</button><br />
                                                                    <button type="button" other_type="others" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.others') }}</button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                    @elseif($sType == 'vocational')
                                        @foreach($school->facultySchool as $fs)
                                            @if($fs->added_info == 1)
                                                <div class="form-group">
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-7">
                                                        <input type="text" disabled="" id="{{ $fs->id or 0 }}" value="{{ $fs->name or '' }}" class="form-control fs_name">
                                                        <button type="button" onclick="schoolMajor(this);" class="btn btn-w-m btn-link">{{ trans('school.major') }}</button><br />
                                                        <button type="button" other_type="admission" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.admission') }}</button><br />
                                                        <button type="button" other_type="tuitionFee" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.tuition_fee') }}</button><br />
                                                        <button type="button" onclick="schoolScholarships(this);" class="btn btn-w-m btn-link">{{ trans('school.scholarships') }}</button><br />
                                                        <button type="button" other_type="others" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.others') }}</button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @endif
                        @endif
                    </form>
                </div>
            @else
                <div class="ibox float-e-margins">
                    <form method="post" role="form"  action="/admin/school-info-update" class="form-horizontal" id="language_course_board" enctype="multipart/form-data">
                        <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="school_info_id" value="{{ $school->schoolInfo->id or 0 }}">
                        <div class="ibox-title">
                            <h5>{{ trans('school.language_course_board') }}</h5>
                            <div class="ibox-tools structure-hidden">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <button onclick="$('#language_course_board').submit();" class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                                </a>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content structure-hidden">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('school.course_structure_tuition_fee') }}</label>
                                <div class="col-sm-10">
                                <textarea class="summernote" id="" name="course_structure_tuition_fee" rows="40">
                                    <?php $html = '<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>'?>
                                    {{ $school->schoolInfo->course_structure_tuition_fee or $html }}
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('school.course_structure_tuition_fee_b') }}</label>
                                <div class="col-sm-10">
                                <textarea class="summernote" id="" name="course_structure_tuition_fee_b" rows="40">
                                    <?php $html = '<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>'?>
                                    {{ $school->schoolInfo->course_structure_tuition_fee or $html }}
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('school.course_structure_tuition_fee_c') }}</label>
                                <div class="col-sm-10">
                                <textarea class="summernote" id="" name="course_structure_tuition_fee_c" rows="40">
                                    <?php $html = '<h3>Lesson feature</h3><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy.</p><h3>Tuition&nbsp;</h3><table class="table table-bordered"><tbody><tr><td><br></td><td><h5 style="text-align: center; ">1 year program</h5><p style="text-align: center;">850 hours</p></td><td><h5 style="text-align: center;">2 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">3 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">4 year program</h5><p style="text-align: center;">850 hours<br></p></td><td><h5 style="text-align: center;">5 year program</h5><p style="text-align: center;">850 hours<br></p></td></tr><tr><td><h4>Total fee</h4></td><td style="text-align: center;"><h4>$7,000</h4></td><td style="text-align: center;"><h4>$8,000</h4></td><td style="text-align: center;"><h4>$9,000</h4></td><td style="text-align: center;"><h4>$10,000</h4></td><td style="text-align: center;"><h4>$11,000</h4></td></tr><tr><td><h6>Enrollment fee</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr><tr><td><h6>Application fee</h6></td><td style="text-align: center;"><h6>$5,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td></tr><tr><td><h6>Facilities fee</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td></tr><tr><td><h6>Tuition fee</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$1,000</h6></td><td style="text-align: center;"><h6>$4,000</h6></td><td style="text-align: center;"><h6>$6,000</h6></td></tr></tbody></table>'?>
                                    {{ $school->schoolInfo->course_structure_tuition_fee or $html }}
                                </textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('school.school_information') }}</label>
                                <div class="col-sm-7">
                                    <input type="hidden" disabled="" id="{{ $fs->id or 0 }}" value="{{ $fs->name or '' }}" class="form-control fs_name">
                                    <button style="text-align:left" type="button" other_type="admission" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.admission') }}</button><br />
                                    <button style="text-align:left" type="button" onclick="schoolScholarships(this);" class="btn btn-w-m btn-link">{{ trans('school.scholarships') }}</button><br />
                                    <button style="text-align:left" type="button" other_type="student" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.student') }}</button><br />
                                    <button style="text-align:left" type="button" other_type="support" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.support') }}</button><br />
                                    <button style="text-align:left" type="button" other_type="others" onclick="otherModal(this);" class="btn btn-w-m btn-link">{{ trans('school.others') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            <div class="ibox float-e-margins">
                <form method="post" role="form"  action="/admin/school-info-update" class="form-horizontal" id="basic_information" enctype="multipart/form-data">
                    <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="school_info_id" value="{{ $school->schoolInfo->id or 0 }}">
                    <div class="ibox-title">
                        <h5>{{ trans('school.basic_information') }}</h5>
                        <div class="ibox-tools col-hidden">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <button onclick="$('#basic_information').submit();" class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                            </a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.overview') }}</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="" name="overview" rows="40">
                                    {{ $school->schoolInfo->overview or '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.college_feature') }}</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="" name="college_feature" rows="40">
                                    {{ $school->schoolInfo->college_feature or '' }}
                                </textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('school.texts') }}</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="" name="texts" rows="40">
                                    {{ $school->schoolInfo->texts or '' }}
                                </textarea>
                            </div>
                        </div>
                        <div id="school_other_list">
                            @if(isset($school->otherText))
                            @foreach($school->otherText as $otherText)
                                <div class="hr-line-dashed"></div>
                                <div class="form-group school_other_child">
                                    <label class="col-sm-2 control-label">{{ trans('school.texts') }}</label>
                                    <div class="col-sm-10">
                                <textarea class="summernote" id="" name="school_other_old[{{$otherText->id}}]" rows="40">
                                    {{ $otherText->content or '' }}
                                </textarea>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary btn-xs" id="add_school_other">{{ trans('school.add_sub_category') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox float-e-margins">
                <form method="post" role="form" action="/admin/school-info-update" class="form-horizontal" id="map" enctype="multipart/form-data">
                    <input type="hidden" name="school_id" value="{{ $school->id or 0 }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="school_info_id" value="{{ $school->schoolInfo->id or 0 }}">
                    <div class="ibox-title">
                        <h5>{{ trans('school.map') }}</h5>
                        <div class="ibox-tools col-hidden">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <button onclick="$('#map').submit();" class="btn btn-primary btn-xs" type="submit">{{ trans('label.save_changes') }}</button>
                            </a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibc-hidden">
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.country') }}</label>
                            <div class="col-sm-3">
                                <select name="country_code" data-placeholder="{{ trans('label.choice') }}" class="form-control"  tabindex="2">
                                    <option value="JP" selected>Japan</option>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                <?php $state = isset($school->schoolInfo) ? $school->schoolInfo->state : 23 ?>
                                <select name="state" data-placeholder="..." class="form-control m-b s_child">
                                    @foreach ( $states as $k => $st)
                                        <option value="{{ $k }}" {{ $state == $k ? 'Selected' : '' }}> {{ $st }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">{{ trans('label.google_map') }}</label>
                            <div class="col-sm-4">
                                <input type="text" name="longitude" id="longitude" placeholder="{{ trans('label.longitude') }}" class="form-control" value="{{ $school->schoolInfo->longitude or '35.689485' }}" />
                            </div>
                            <div class="col-md-1" style="width:45px"><img class="ic-about" src="/img/ic-about.png" /></div>
                            <div class="col-sm-4">
                                <input type="text" name="latitude" id="latitude" placeholder="{{ trans('label.latitude') }}" class="form-control" value="{{ $school->schoolInfo->latitude or '139.7601328' }}" />
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"></label>
                            <input id="pac-input" style="width:70%;margin-top:10px;height:29px;" class="controls" type="text" placeholder="Search Box">
                            <div class="col-sm-9" id="select_location" style="height:400px;"></div>
                            <script >
                                function initAutocomplete() {
                                    var map = new google.maps.Map(document.getElementById('select_location'), {
                                        center: {lat: 35.689485, lng: 139.7601328},
                                        zoom: 7,
                                    });

                                    // Create the search box and link it to the UI element.
                                    var input = document.getElementById('pac-input');
                                    var searchBox = new google.maps.places.SearchBox(input);
                                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                    // Bias the SearchBox results towards current map's viewport.
                                    map.addListener('bounds_changed', function() {
                                        searchBox.setBounds(map.getBounds());
                                    });

                                    var markers = [];
                                    // Listen for the event fired when the user selects a prediction and retrieve
                                    // more details for that place.
                                    searchBox.addListener('places_changed', function() {
                                        var places = searchBox.getPlaces();
                                        if (places.length == 0) {
                                            return;
                                        }
                                        // Clear out the old markers.
                                        markers.forEach(function(marker) {
                                            marker.setMap(null);
                                        });
                                        markers = [];

                                        // For each place, get the icon, name and location.
                                        var bounds = new google.maps.LatLngBounds();
                                        places.forEach(function(place) {
                                            if (!place.geometry) {
                                                console.log("Returned place contains no geometry");
                                                return;
                                            }
                                            var icon = {
                                                url: place.icon,
                                                size: new google.maps.Size(71, 71),
                                                origin: new google.maps.Point(0, 0),
                                                anchor: new google.maps.Point(17, 34),
                                                scaledSize: new google.maps.Size(25, 25)
                                            };

                                            // Create a marker for each place.
                                            markers.push(new google.maps.Marker({
                                                map: map,
                                                icon: icon,
                                                title: place.name,
                                                position: place.geometry.location
                                            }));

                                            if (place.geometry.viewport) {
                                                // Only geocodes have viewport.
                                                bounds.union(place.geometry.viewport);
                                            } else {
                                                bounds.extend(place.geometry.location);
                                            }
                                        });
                                        map.fitBounds(bounds);
                                    });
                                    google.maps.event.addDomListener(input, 'keydown', function (e) {
                                        if (e.keyCode === 13) {
                                            if (location_being_changed) {
                                                e.preventDefault();
                                                e.stopPropagation();
                                            }
                                        } else {
                                            // means the user is probably typing
                                            location_being_changed = true;
                                        }
                                    });
                                    google.maps.event.addListener(map, 'click', function (e) {
                                        $('#longitude').val(e.latLng.lng());
                                        $('#latitude').val(e.latLng.lat());
                                    });
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVXF0yIJoMyVJ0F1zEc_ODEG_Ojn2B3ko&libraries=places&callback=initAutocomplete" async defer></script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.modal_admin_school')
@endsection