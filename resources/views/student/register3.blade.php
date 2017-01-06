@extends('layouts.register')
@section('content')
<link rel="stylesheet" href="https://silviomoreto.github.io/bootstrap-select/dist/css/bootstrap-select.min.css">
<script type="text/javascript" src="https://silviomoreto.github.io/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="http://parsleyjs.org/dist/parsley.min.js"></script>
<style type="text/css">
    .dropdown-menu li:hover {
        background: #920a27!important;
    }
    .dropdown-menu li:hover .text {
        background: #920a27!important;
    }
    .dropdown-menu > li:hover > a {
        color: #fff;
    }
    dd {
        position: relative;
    }
    .fancy-select .parsley-errors-list {
        position: absolute;
        bottom: 0px;
        top: 30px;
    }
    .multiple-select .trigger {
        display: none;
    }
    .multiple-select .bootstrap-select {
        width: 100%!important;
    }
    .add-school-group input {
        margin-top: 10px;
    }
    .icon-plus {
        cursor: pointer;
    }
    .show-tick {
        position: absolute;
        margin-top: -13px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 0.9em;
        margin-top: -3px;
    }
    .clf .multiple-select .dropdown-toggle {
        height: 34px;
        padding-right: 35px;
    }
    .icon-trash {
        font-size: 30px;
    }

    .dropdown-menu.inner {
        margin: 0px!important;
    }
    .dropdown-menu.inner li {
        padding: .6em .7em;
    }

</style>
<section>
    <div class="section-register inside-blank">
    <div class="inner inner-md-1">
        <div class="register-form">
            <div class="form-body">
                <div class="form-col form-left">
                    <div class="heading clip">
                        <h1 class="form-title montserrat">Create <br>your <br>profile</h1>
                        <h2 class="form-sub-title">{{ trans('label.profile_registration') }}</h2>
                        <div class="step">
                            <img src="../images/register/step03.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-col form-right clf">
                    <form id="createForm" class="form-horizontal form-primary" role="form" method="POST" action="{{ route('student.update-profile') }}" enctype="multipart/form-data" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}">
                        {!! csrf_field() !!}
                        <div class="section-profile">
                            <ul id="progressbar">
                                <li class="st-1 active">{{ trans('label.basic_infomation') }}</li>
                                <li class="st-2">{{ trans('label.for_study_abroad') }}</li>
                                <li class="st-3">{{ trans('label.about_speak_english') }}</li>
                            </ul>
                            <fieldset class="step-1">
                                <h2 class="section-title"><i class="fa fa-graduation-cap"></i>{{ trans('label.basic_infomation') }}</h2>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.country_of_citizenship') }}</label></dt>
                                    <dd>
                                        <select class="custom-select" name="country" data-parsley-required data-parsley-group="1">
                                            <option value="">{{ trans('label.please_select') }}</option>
                                            @foreach ( $countriesStep1 as $k => $country)
                                            <option value="{{ $k }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.prefectures') }}</label></dt>
                                    <dd>
                                        <select class="custom-select" name="state" data-parsley-required data-parsley-group="1">
                                            <option value="">{{ trans('label.please_select') }}</option>
                                            @foreach ( $states as $k => $state)
                                            <option value="{{ $k }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.municipal_district') }}</label></dt>
                                    <dd><input type="text" class="form-control" name="city"></dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.address_building_name') }}</label></dt>
                                    <dd><input type="text" class="form-control" name="address"></dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.the_current_curriculum') }}</label></dt>
                                    <dd>
                                        <select class="custom-select" name='degree' data-live-search="true" data-parsley-required data-parsley-group="1">
                                            <option value="">{{ trans('label.please_select') }}</option>
                                            @foreach($degrees as $degree)
                                            <option value='{{ $degree->id }}'> {{ $degree->name }} </option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.school_name') }}</label></dt>
                                    <dd>
                                        <input type="text" class="form-control" name="name_of_school" data-parsley-required data-parsley-group="1">
                                    </dd>
                                </dl>
                                <?php $currentY = date("Y"); ?>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.expected_graduation_time') }}</label></dt>
                                    <dd class="clf">
                                        <div class="col-md-2">
                                            <select class="custom-select" name='year_graduation' data-parsley-required data-parsley-group="1">
                                                <option value="">{{ trans('label.year') }}</option>
                                                @for ($i = $currentY; $i <= ($currentY+10); $i++)
                                                <option value='{{ $i }}'> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="custom-select" name='month_graduation' data-parsley-required data-parsley-group="1">
                                                <option value="">{{ trans('label.month') }}</option>
                                                @foreach($months as $month)
                                                <option value='{{ $month[1] }}'> {{ $month[0] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.profile_photo') }}</label></dt>
                                    <dd>
                                        <img id="preview" src="/images/no-avatar.png">
                                        <input class="avatar-file" type="file" name="avatar" accept="image/*" style="width: 100%; border: none; box-shadow: none">
                                        <p class="note"><small>{{ trans('label.image_accept') }}</small></p>
                                    </dd>
                                </dl>
                                <input type="button" name="next" class="btn next action-button" value="次へ" onclick="nextStep(2)" />
                            </fieldset>
                            <fieldset class="step-2">
                                <h2 class="section-title"><i class="fa fa-graduation-cap"></i>{{ trans('label.for_study_abroad') }}</h2>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.study_abroad_type') }}</label></dt>
                                    <dd>
                                        <select class="custom-select" name='type_of_study' data-parsley-required data-parsley-group="2">
                                            <option value=''>{{ trans('label.please_select') }}</option>
                                            @foreach($typeOfStudies as $typeOfStudy)
                                            <option value='{{ $typeOfStudy->id }}'> {{ $typeOfStudy->name }} </option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.study_abroad_destination') }}</label></dt>
                                    <dd>
                                        <select class="custom-select" name='academic' data-parsley-required data-parsley-group="2">
                                            <option value=''>{{ trans('label.please_select') }}</option>
                                            @foreach($academics as $academics)
                                            <option value='{{ $academics->id }}'> {{ $academics->name }}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.study_abroad_period') }}</label></dt>
                                    <dd class="clf">
                                        <div class="input-inline col-md-2">
                                            <select class="custom-select" name='year_' data-parsley-required data-parsley-group="2">
                                                <option value=''>{{ trans('label.year') }}</option>
                                                @for ($i = $currentY; $i <= ($currentY + 10); $i++)
                                                <option value='{{ $i }}'> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-inline col-md-2">
                                            <select class="custom-select" name='month_' data-parsley-required data-parsley-group="2">
                                                <option value=''>{{ trans('label.month') }}</option>
                                                @foreach($months as $month)
                                                <option value='{{ $month[1] }}'> {{ $month[0] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label>{{ trans('label.major_areas_of_interest') }}</label></dt>
                                    <dd class="clf multiple-select">
                                        <select class="custom-select" name='major[]' multiple="true" data-live-search="true">
                                            @foreach($majors as $major)
                                            <option value='{{ $major->id }}'> {{ $major->name }} </option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <div class="goabroad-group" data-index="1">
                                    <h3 class="section-sub-title">{{ trans('label.hope_to_study_abroad') }} 1</h3>
                                    <div class="btns">
                                        <div class="add-btn add-country">
                                            <i class="icon icon-plus add-more-country"></i>{{ trans('label.add_a_study_abroad_hope') }}
                                        </div>
                                    </div>
                                    <dl class="form-row clf">
                                        <dt><label>{{ trans('label.study_abroad_country') }}</label></dt>
                                        <dd>
                                            <select class="custom-select" name="country_interested[0]" data-parsley-required data-parsley-group="2">
                                                <option value="">{{ trans('label.please_select') }}</option>
                                                @foreach ( $countriesStep2 as $k => $country)
                                                <option value="{{ $k }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </dd>
                                    </dl>
                                    <dl class="form-row clf">
                                        <dt class="va-top"><label>{{ trans('label.school_name') }}</label></dt>
                                        <dd class="va-top">
                                            <div class="input-block">
                                                <input type="text" class="form-control" name="school_interested[0][0]" placeholder="">
                                            </div>
                                            <div class="add-school">
                                                <i class="icon icon-plus add-more-school"></i>{{ trans('label.add_the_school_name') }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                                <input type="button" name="previous" class="btn previous action-button" value="{{ trans('label.previous_btn') }}" onclick="prevStep(1)" />
                                <input type="button" name="next" class="btn next action-button" value="{{ trans('label.next_btn') }}" onclick="nextStep(3)" />
                            </fieldset>
                            <fieldset class="step-3">
                                <h2 class="section-title"><i class="fa fa-graduation-cap"></i>{{ trans('label.about_speak_english') }}</h2>
                                <div class="language-group" data-index="1">
                                    <h3 class="section-sub-title">{{ trans('label.language') }} 1</h3>
                                    <div class="btns">
                                        <div class="add-btn">
                                            <i class="icon icon-plus add-language"></i>{{ trans('label.add_language') }}
                                        </div>
                                    </div>
                                    <dl class="form-row clf">
                                        <dt><label>{{ trans('label.language') }}</label></dt>
                                        <dd>
                                            <div class="input-block">
                                                <select name="language[0][0]" class='custom-select li-0' data-parsley-required data-parsley-group="3" >
                                                    <option value="">{{ trans('label.please_select') }}</option>
                                                    @foreach ( $langs as $k => $lang)
                                                    <option value="{{ $k }}">{{ $lang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="form-row clf">
                                        <dt><label>{{ trans('label.level_language') }}</label></dt>
                                        <dd class="clf">
                                            <div class="input-inline col-md-1 radio">
                                                <label>
                                                <input type="radio" name="language[0][1]" value='0' data-parsley-required data-parsley-group="3" >
                                                <span class="radio-icon"></span>{{ trans('label.native') }}
                                                </label>
                                            </div>
                                            <div class="input-inline col-md-1 radio">
                                                <label>
                                                <input type="radio" name="language[0][1]" value='1' data-parsley-required data-parsley-group="3" >
                                                <span class="radio-icon"></span>{{ trans('label.business_level') }}
                                                </label>
                                            </div>
                                            <div class="input-inline col-md-1 radio">
                                                <label>
                                                <input type="radio" name="language[0][1]" value='2' data-parsley-required data-parsley-group="3" >
                                                <span class="radio-icon"></span>{{ trans('label.daily_conversation_level') }}
                                                </label>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                                <input type="button" name="previous" class="btn previous action-button" value="{{ trans('label.previous_btn') }}" onclick="prevStep(2)" />
                                <button type="submit" class="btn btn-pc" onclick="nextStep(4)">{{ trans('label.to_save_this_content') }}</button>
                            </fieldset>
                            <button type="submit" class="btn btn-tab">{{ trans('label.to_save_this_content') }}</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
<script>
    // $('select[name=degree]').selectpicker();
    
    var countries;
    $(function(){
        $.ajax({
          url: "/list-country",
          dataType: 'json'
        }).done(function(data) {
            countries = data;
        });
        $('select[name="major[]"]').selectpicker({title:"{{ trans('label.please_select') }}"});
    
        $('.parsley-change').on('changed.bs.select', function (e) {
            $(this).parsley().validate();
        });

        /**
         * Sort states alphabeta
         * @param  {Object} obj The states object
         * @return {Arrray}     The states array
         */
        function sortProperties(obj){
            // convert object into array
            var sortable=[];
            for(var key in obj)
                if(obj.hasOwnProperty(key))
                    sortable.push([key, obj[key]]); // each item is an array in format [key, value]

            // sort items by value
            sortable.sort(function(a, b)
            {
                var x=a[1].toLowerCase(),
                    y=b[1].toLowerCase();
                return x<y ? -1 : x>y ? 1 : 0;
            });
            return sortable; // array in format [ [ key1, val1 ], [ key2, val2 ], ... ]
        }

        // When user select country then change states
        $('.custom-select[name=country]').fancySelect().on('change.fs', function () {
            var val = $(this).val();
            $.ajax({
              url: "/country-state/get-states/"+val,
              dataType: 'json'
            }).done(function(data) {
                var states = sortProperties(data.states);
                console.log(states, 'states');
                $('.custom-select[name=state]').html('');
                if(states){
                    $.each(states, function( k, v ) {
                        $('.custom-select[name=state]').append('<option value="' + v[0] + '">' + v[1] + '</option>');
                        $('.custom-select[name=state]').trigger('update.fs');
                    });
                } else {
                    $('.custom-select[name=state]').append('<option value="0"> null </option>');
                    $('.custom-select[name=state]').trigger('update.fs');
                }
            });
        });
    
        function reviewImage(input, tag) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
    
               reader.onload = function (e) {
                   $(tag).attr('src', e.target.result);
               }
    
               reader.readAsDataURL(input.files[0]);
           }
       }
    
       $('[name=avatar]').change(function(){
            if( ValidateSingleInput(this) ){
                // reviewImage(this, '#preview');
            }
       });
    });
    
    function getDomSchool(index1, index2){
        return '<div class="add-school-group" data-index="' + index2 + '">' +
                    '<div class="input-block clf">' +
                        '<input type="text" class="form-control name-school-added" name="school_interested[' + (index1) + '][' + index2 + ']" placeholder="">' +
                        '<span class="trash"><i class="icon icon-trash delete-school"></i></span>' +
                    '</div>' +
                '</div>';
    }
    
    function getDomCountry(index){
        return  '<div class="goabroad-group" data-index="' + (index + 1) + '" >' +
                    '<h3 class="section-sub-title">{{ trans('label.hope_to_study_abroad') }} ' + (index + 1) + '</h3>' +
                    '<div class="btns">' +
                        '<div class="add-btn add-country">' +
                            '<i class="icon icon-plus add-more-country"></i>{{ trans('label.add_a_study_abroad_hope') }}' +
                        '</div>' +
                        '<div class="remove-btn remove-country">' +
                            '<i class="icon icon-trash"></i>{{ trans('label.delete_the_study_hope') }}' +
                        '</div>' +
                    '</div>' +
                    '<dl class="form-row clf">' +
                        '<dt><label>{{ trans('label.study_abroad_country') }}</label></dt>' +
                        '<dd>' +
                            '<select class="custom-select" name="country_interested['+ index +']" data-parsley-required data-parsley-group="2">' +
                                '<option value="">{{ trans('label.please_select') }}</option>' +
                                '@foreach ( $countriesStep2 as $k => $country)' +
                                    '<option value="{{ $k }}">{{ $country }}</option>' +
                                '@endforeach' +
                            '</select>' +
                        '</dd>' +
                    '</dl>' +
                    '<dl class="form-row clf">' +
                        '<dt class="va-top"><label>{{ trans('label.school_name') }}</label></dt>' +
                        '<dd class="va-top">' +
                            '<div class="input-block">' +
                                '<input type="text" class="form-control" name="school_interested[' + index + '][0]" placeholder="">' +
                            '</div>' +
                            '<div class="add-school">' +
                                '<i class="icon icon-plus add-more-school"></i>{{ trans('label.add_the_school_name') }}' +
                            '</div>' +
                        '</dd>' +
                    '</dl>' +
                '</div>';
    }
    
    function getDomLanguage(index){

        return  '<div class="language-group" data-index="' + (index + 1) + '">' +
                    '<h3 class="section-sub-title">{{ trans('label.language') }} ' + (index + 1) + '</h3>' +
                    '<div class="btns">' +
                        '<div class="add-btn add-language">' +
                            '<i class="icon icon-plus"></i>{{ trans('label.add_language') }}' +
                        '</div>' +
                        '<div class="remove-btn">' +
                            '<i class="icon icon-trash remove-language"></i>{{ trans('label.remove_language') }}' +
                        '</div>' +
                    '</div>' +
                    '<dl class="form-row clf">' +
                        '<dt><label>{{ trans('label.language') }}</label></dt>' +
                        '<dd>' +
                            '<div class="input-block">' +
                                '<select name="language[' + index + '][0]" class="custom-select li-0" data-parsley-required data-parsley-group="3" >' +
                                    '<option value="">{{ trans('label.please_select') }}</option>' +
                                    '@foreach ( $langs as $k => $lang)' +
                                    '<option value="{{ $k }}">{{ $lang }}</option>' +
                                    '@endforeach' +
                                '</select>' +
                            '</div>' +
                        '</dd>' +
                    '</dl>' +
                    '<dl class="form-row clf">' +
                        '<dt><label>{{ trans('label.level_language') }}</label></dt>' +
                        '<dd class="clf">' +
                            '<div class="input-inline col-md-1 radio">' +
                                '<label>' +
                                '<input type="radio" name="language[' + index + '][1]" value="0" required="" data-parsley-multiple="language01">' +
                                '<span class="radio-icon"></span>{{ trans('label.native') }}' +
                                '</label>' +
                            '</div>' +
                            '<div class="input-inline col-md-1 radio">' +
                                '<label>' +
                                '<input type="radio" name="language[' + index + '][1]" value="1" data-parsley-multiple="language01">' +
                                '<span class="radio-icon"></span>{{ trans('label.business_level') }}' +
                                '</label>' +
                            '</div>' +
                            '<div class="input-inline col-md-1 radio">' +
                                '<label>' +
                                '<input type="radio" name="language[' + index + '][1]" value="2" data-parsley-multiple="language01">' +
                                '<span class="radio-icon"></span>{{ trans('label.daily_conversation_level') }}' +
                                '</label>' +
                            '</div>' +
                        '</dd>' +
                    '</dl>' +
                '</div>';
    }
    
    // Add more country
    $('.section-profile').delegate('.add-more-country', 'click', function() {
        var index = $('.goabroad-group').length;
        if(index > 4) return;
        var newDom = getDomCountry(index);
        $('.goabroad-group').last().after(newDom);
        $('.custom-select').fancySelect();
    });
    
    // Remove country
    $('.section-profile').delegate('.remove-country', 'click', function() {
        $index = $(this).closest('.goabroad-group').data('index');
        $group = $(this).closest('.goabroad-group');
        $groupNext = $group.nextAll('.goabroad-group');
        $group.remove();
        $groupNext.each(function(index) {
            $(this).find('.section-sub-title').text('{{ trans('label.hope_to_study_abroad') }} ' + ($index + index));
            $(this).closest('.goabroad-group').attr('data-index', ($index + index));
            $(this).find('.custom-select').attr('name', 'country_interested['+ ($index + index - 1) +']');
            $input = $(this).find('dd.va-top').find('input');
            $input.each(function(index1) {
                $(this).attr('name', 'school_interested[' + ($index + index - 1) + '][' + index1 + ']');
            });
        });
    });

    // Add more school
    $('.section-profile').delegate('.add-more-school', 'click', function() {
        var group = $(this).parent().parent().first('input-block');
        var index1 = $(this).closest('.goabroad-group').data('index');
        var index2 = $(this).parent().parent().find('input').length;     
        // console.log('index1:' + index1, 'index2: ' + index2);
        var newDom = getDomSchool(index1 - 1, index2);
        group.append(newDom);
    });

    // Remove school
    $('.section-profile').delegate('.delete-school', 'click', function() {
        var index1 = $(this).closest('.goabroad-group').data('index');
        var index2 = $(this).closest('.add-school-group').data('index');
        var group  = $(this).closest('.add-school-group');
        var groupNext = group.nextAll('.add-school-group');
        groupNext.each(function(index) {
            $(this).attr('data-index', (index2 + index));
            $(this).find('input').attr('name', 'school_interested[' + (index1 - 1) + '][' + (index2 + index) + ']');
        });
        group.remove();
    });
    
    // Add more language
    $('.step-3').delegate('.add-language', 'click', function() {
        var index = $('.language-group').length;
        if(index > 3) return;
        var newDom = getDomLanguage(index);
        $(this).closest('.step-3').find('.language-group:last').after(newDom);
        $('.custom-select').fancySelect();
    });

    // Remove language
    $('.step-3').delegate('.remove-language', 'click', function() {
        var group = $(this).closest('.language-group');
        var index = group.data('index');
        var groupNext = group.nextAll('.language-group');
        groupNext.each(function(index1) {
            var newIndex = index + index1 - 1;
            $(this).find('.section-sub-title').text('{{ trans('label.language') }} ' + (index + index1));
            $(this).find('.custom-select').attr('name', 'language[' + newIndex + '][0]');
            $(this).attr('data-index', (index + index1));
            $(this).find('input').attr('name', 'language[' + newIndex + '][1]');
        });
        group.remove();
    });
    
    var _validFileExtensions = [".jpg", ".jpeg", ".png", ".gif"];
    
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
                    alert("Only supports the following file formats: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
    
            if( (oInput.files[0].size / 1048576) > maxSize ) {
                alert("Size limitation must less than " + maxSize + "Mb");
                oInput.value = "";
                return false;
            }
        }
        return true;
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr({src: e.target.result});
                $('img#preview').css({width: '128px', height: '128px'});
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".avatar-file").change(function(){
        readURL(this);
    });
    
</script>
@endsection