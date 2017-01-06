@extends('layouts.user') 
@section('style')
<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
<style type="text/css">
    input[type="radio"]{
        -webkit-appearance: radio;
    }
</style>
<section>
    <div class="inner inner-md-1">
        <div class="section-ui">
            <div class="container-fluid">
                <div class="row">
                    <form class="form-horizontal form-primary" role="form" method="POST" action="{{ route('student.update', ['id'=>Auth::user()->id]) }}" enctype="multipart/form-data" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="panel panel-success">
                            <div class="panel-heading text-success fw-b">Your profile</div>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.profile_photo') }}</label>

                                        <div class="col-md-6">
                                            @if (Auth::user()->student->avatar != '')
                                                <img id="preview" src="{{ Auth::user()->student->avatar }}" alt="" />
                                            @else
                                                <img id="preview" src="/images/_no-avatar.png" alt="" />
                                            @endif
                                            <input class="form-control" id="avatar" type="file" name="avatar" accept="image/*">
                                            <p class="text-danger mg-t-sm">{{ trans('label.image_accept') }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label label-name">{{ trans('label.name') }}</label>
                                        <div class="col-md-3">  
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder='First Name' data-parsley-required>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder='Last Name' data-parsley-required>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.gender') }}</label>

                                        <div class="col-md-6">
                                            <div class="radio-inline">
                                                <label><input type="radio" name="gender" value='0' required="" {{ $user->student->gender == 0 ? 'checked' : '' }}>{{ trans('label.male') }}</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label><input type="radio" name="gender" value='1' required="" {{ $user->student->gender == 1 ? 'checked' : '' }}>{{ trans('label.female') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.i_am_a') }}</label>

                                        <div class="col-md-6">
                                            <div class="radio-inline">
                                                <label><input type="radio" name="user_mode" value='0' {{ $user->student->user_mode == 0 ? 'checked' : '' }} > {{ trans('label.student') }}</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label><input type="radio" name="user_mode" value='1' required="" {{ $user->student->user_mode == 1 ? 'checked' : '' }} > {{ trans('label.parent_of_student') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.birthday') }}</label>
                                        <?php $bdays = explode("-", $user->student->birthday); ?>
                                        <div class="col-md-2">
                                            <select class="form-control" name='month' data-parsley-required>
                                                <option value=''> ○○{{ trans('label.month') }} </option>
                                                @foreach($months as $month)
                                                    <option value='{{ $month[1] }}' {{ $month[1] == $bdays[1] ? 'selected' : '' }}> {{ $month[0] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <select class="form-control" name='day' data-parsley-required>
                                                <option value=''> ○○{{ trans('label.day') }} </option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value='{{ $i }}' {{ $i == $bdays[2] ? 'selected' : '' }}> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <?php $currentY = date("Y"); ?>
                                        <div class="col-md-2">
                                            <select class="form-control" name='year' data-parsley-required>
                                                <option value=''> ○○○○{{ trans('label.year') }} </option>
                                                @for ($i = 1950; $i <= $currentY; $i++)
                                                    <option value='{{ $i }}' {{ $i == $bdays[0] ? 'selected' : '' }}> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.country_of_citizenship') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name='nationality' data-parsley-required>
                                                <option value=''> {{ trans('label.name') }} </option>
                                                @foreach($nationalities as $nationality)
                                                    <option value='{{ $nationality }}' {{ $user->student->nationality ==  $nationality ? 'selected' : ''}}> 
                                                    {{ $nationality }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.mail_address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" data-parsley-required disabled="true">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.password') }}</label>

                                        <div class="col-md-6">
                                            <input type="password" id='pwd' class="form-control" name="password" minlength="8">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.password_confirm') }}</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_rp" data-parsley-equalto="#pwd">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                        </div>
                                    </div>                            
                            </div>
                            <!-- End Body Your profile-->
                            <div class="panel-heading text-success fw-b">{{ trans('label.street_address') }}</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.country') }}</label>
                                        {{-- dd(Auth::user()->student->country) --}}
                                    <div class="col-md-6">
                                        <select class="form-control" name ="country" data-parsley-required>
                                                <option>Select</option>
                                            @foreach ( $countries as $k => $country)
                                                <option value="{{ $k }}" {{ $user->student->country == $k ? 'selected' : ''}} > {{ $country }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.prefectures') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name ="state"  data-parsley-required >
                                            <option>Select</option>
                                            @foreach ( $states as $k => $state)
                                                <option value="{{ $k }}" {{ $user->student->state == $k ? 'selected' : ''}} >{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.municipal_district') }}</label>
                                        
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="city" placeholder="City" value="{{ $user->student->city }}">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.street_address') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->student->address }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End body Home address-->
                            <div class="panel-heading text-success fw-b">{{ trans('label.school_year') }}</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.school_year') }}</label>

                                    <div class="col-md-6">
                                        
                                        <select class="form-control" name='degree' data-parsley-required>
                                            <option value=''> {{ trans('label.choice') }} </option>
                                            @foreach($degrees as $degree)
                                                <option value='{{ $degree->id }}'  {{ $degree->id == $user->student->degree ? 'selected' : '' }}> {{ $degree->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.school_name') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name_of_school" placeholder="School name" value="{{ $user->student->name_of_school }}" data-parsley-required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.graduation_date') }}</label>
                                    <?php $graduation = explode("-", $user->student->date_graduation); ?>
                                    
                                    <div class="col-md-3">
                                        <select class="form-control" name='month_graduation' data-parsley-required>
                                            <option value=''> {{ trans('label.name') }}○○月 </option>
                                            @foreach($months as $month)
                                                <option value='{{ $month[1] }}' {{ $month[1] == $graduation[1] ? 'selected' : '' }}> {{ $month[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <select class="form-control" name='year_graduation' data-parsley-required>
                                            <option value=''> ○○○○{{ trans('label.year') }} </option>
                                            @for ($i = $currentY; $i <= ($currentY + 10); $i++)
                                                <option value='{{ $i }}' {{ $i == $graduation[0] ? 'selected' : '' }}> {{ $i }} </option>
                                            @endfor
                                        </select>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!-- End Body Current Education-->
                            <div class="panel-heading text-success fw-b">{{ trans('label.study_abroad_to_be_desired') }}</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.study_abroad_type') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name='type_of_study' data-parsley-required>
                                            <option value=''> {{ trans('label.choice') }} </option>
                                            @foreach($typeOfStudies as $typeOfStudy)
                                                <option value='{{ $typeOfStudy->id }}' {{ $user->student->type_of_study == $typeOfStudy->id ? 'selected' : '' }}> {{ $typeOfStudy->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.course') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name='academic' data-parsley-required>
                                            <option value=''> {{ trans('label.choice') }} </option>
                                            @foreach($academics as $academics)
                                                <option value='{{ $academics->id }}' {{ $user->student->academic == $academics->id ? 'selected' : '' }}> {{ $academics->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.hope_start_date') }}</label>
                                    <?php $expected_start = explode("-", $user->student->expected_start); ?>
                                    <div class="col-md-3">
                                        <select class="form-control" name='month_' data-parsley-required>
                                            <option value=''> {{ trans('label.name') }}○○月 </option>
                                            @foreach($months as $month)
                                                <option value='{{ $month[1] }}' {{ $month[1] == $expected_start[1] ? 'selected' : '' }}> {{ $month[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <select class="form-control" name='year_' data-parsley-required>
                                            <option value=''> {{ trans('label.year') }} </option>
                                            @for ($i = $currentY; $i <= ($currentY+10); $i++)
                                                <option value='{{ $i }}' {{ $i == $expected_start[0] ? 'selected' : '' }}> {{ $i }} </option>
                                            @endfor
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> {{ trans('label.major_areas_of_interest') }} </label>

                                    <div class="col-md-6 default-bootstrap-btn">
                                        <?php 
                                            $sMajor = $user->student->major ? $user->student->major : [];
                                        ?>
                                        <select class="form-control parsley-change" name='major[]' multiple data-live-search="true" data-max-options="5">
                                            @foreach($majors as $major)
                                                <option value='{{ $major->id }}' {{ in_array($major->id, $sMajor) ? 'selected' : '' }}> {{ $major->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                       

                                @foreach($user->educations as $key => $education)
                                <div class="country-group" data-group-index='{{ $key }}'>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> 
                                            @if($key > 0)
                                            <i class="glyphicon glyphicon-remove-circle text-danger remove-choice"></i>
                                            @endif
                                            <?php
                                                // Get Cardinal number
                                                $number = $key == 0 ? 'st' : ( $key == 1 ? 'nd' : ( $key == 2 ? 'rd' : 'th') );
                                            ?>
                                            <span class="group-count">{{ $key+1 }}{{$number}} {{ trans('label.choice') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.study_abroad_country') }}</label>
                                        <div class="col-md-6 ">
                                            <select class="form-control" name="country_interested[{{ $key }}]" data-parsley-required>
                                                    <option value="">Select</option>
                                                    @foreach ( $countries as $k => $country)
                                                        <option value="{{ $k }}" {{ $k == $education['country_interested'] ? 'selected' : '' }}>{{ $country }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @foreach($education['school_interested'] as $k => $val)
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.study_abroad_destination_school') }} {{ $k }}</label>
                                        <div class="col-md-{{ $k > 0 ? '5' : '6' }} ">
                                            <input type="text" class="form-control" name="school_interested[{{ $key }}][]" value="{{ $val }}" placeholder="School" >
                                        </div>
                                        @if($k > 0)
                                        <div class="col-md-1 ">
                                            <i class="glyphicon glyphicon-remove-circle text-danger remove-school"></i>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.add_the_school_name') }}</label>
                                        <div class="col-md-6 ">
                                            <i class="glyphicon glyphicon-plus-sign add-more-school"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="form-group mg-t-lg">
                                    <label class="col-md-4 control-label">
                                        <i class="glyphicon glyphicon-plus-sign add-more-country"></i>
                                        <span class="mg-t-md"> {{ trans('label.choice') }}</span>
                                    </label>
                                    <div class="col-md-6 ">
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Body Education abroad -->

                            <div class="panel-heading text-success fw-b">{{ trans('label.linguistic_talent') }}</div>
                            <div class="panel-body">  
                            @if($user->student->language)
                                @foreach($user->student->language as $key => $val)
                                <div class="language-group">
                                    <div class="form-group">

                                        <label class="col-md-2 control-label label-language">
                                            @if($key > 0)
                                            <i class="glyphicon glyphicon-remove-circle text-danger remove-language"></i>
                                            @endif
                                        </label>
                                        <label class="col-md-2 control-label">
                                            
                                            <select name="language[{{ $key }}][0]" class="form-control li-{{ $key }}" data-parsley-required>
                                                @foreach($langs as $key1 => $lang)
                                                <option value="{{ $key1 }}" {{ $val[0] == $key1 ?'selected' : '' }}> {{ $lang }} </option>
                                                @endforeach
                                            </select>
                                        </label>
                                        
                                        <div class="col-md-6">
                                            <div class="radio-inline">
                                                <label><input type="radio" name="language[{{ $key }}][1]" value='0' {{ $val[1]==0?'checked' : '' }} required="">{{ trans('label.mother_language') }}</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label><input type="radio" name="language[{{ $key }}][1]" value='1' {{ $val[1]==1?'checked' : '' }}>{{ trans('label.business_level') }}</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label><input type="radio" name="language[{{ $key }}][1]" value='2' {{ $val[1]==2?'checked' : '' }}>{{ trans('label.daily_conversation_level') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif 
                                <div class="form-group">
                                    <label class="col-md-4 control-label">
                                        <i class="glyphicon glyphicon-plus-sign add-more-language"></i>
                                        <span>Language</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success mg-t-sm">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Body Language ability -->
                        </div>
                        <!-- End panel success -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('js')
<script>
        var countries;
    $(function(){
        $.ajax({
          url: "/list-country",
          dataType: 'json'
        }).done(function(data) {
            countries = data;
        });

        $('select[name="major[]"]').selectpicker();
        
        $('.parsley-change').on('changed.bs.select', function (e) {
            $(this).parsley().validate();
        });

        $('select[name=country]').change(function(){
            var val = $(this).val();
            $.ajax({
              url: "/country-state/get-states/"+val,
              dataType: 'json'
            }).done(function(data) {
                var states;
                $('select[name=state]').html('');
                console.log( data.states);
                if(data && data.states){
                    $.each(data.states, function( k, v ) {
                        $('select[name=state]').append('<option value="'+k+'"> '+v+' </option>')
                    });
                }else{
                    $('select[name=state]').append('<option value="0"> null </option>')
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr({src: e.target.result});
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function(){
            readURL(this);
        });

        // function reviewImage(input, tag) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
                
        //         reader.onload = function (e) {
        //             $(tag).attr('src', e.target.result);
        //         }
                
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        
        // $('[name=avatar]').change(function(){
        //     if( ValidateSingleInput(this) ){
        //         // reviewImage(this, '#preview');
        //     }
        // });
    })
    
    function getDomSchool(index){
        return '<div class="form-group">\
            <label class="col-md-4 control-label"></label>\
            <div class="col-md-5 ">\
                <input type="text" class="form-control" name="school_interested['+index+'][]" placeholder="School">\
            </div>\
            <div class="col-md-1 ">\
                <i class="glyphicon glyphicon-remove-circle text-danger remove-school"></i>\
            </div>\
        </div>';
    }
    
    function getDomCountry(index){
        return '<div class="country-group" data-group-index='+index+'>\
                    <div class="form-group">\
                        <label class="col-md-4 control-label"> \
                            <i class="glyphicon glyphicon-remove-circle text-danger remove-choice"></i>\
                            <span class="group-count"></span>\
                        </label>\
                    </div>\
                    <div class="form-group">\
                        <label class="col-md-4 control-label">Country Interested </label>\
                        <div class="col-md-6 ">\
                            <select class="form-control ci-'+index+'" name="country_interested['+index+']" placeholder="Country" data-parsley-required>\
                                    <option value="">Select</option>\
                            </select>\
                        </div>\
                    </div>\
                    \
                    <div class="form-group">\
                        <label class="col-md-4 control-label">Interested school (if any)</label>\
                        <div class="col-md-6 ">\
                            <input type="text" class="form-control" name="school_interested['+index+'][]" placeholder="School" >\
                        </div>\
                    </div>\
                    \
                    <div class="form-group">\
                        <label class="col-md-4 control-label">Interested school (if any)</label>\
                        <div class="col-md-6 ">\
                            <i class="glyphicon glyphicon-plus-sign add-more-school"></i>\
                        </div>\
                    </div>\
                </div>';
    }
    
    function getDomLanguage(index){
        return '<div class="language-group">\
            <div class="form-group">\
                <label class="col-md-2 control-label label-language">\
                    <i class="glyphicon glyphicon-remove-circle text-danger remove-language"></i>\
                </label>\
                <label class="col-md-2 control-label">\
                    <select name="language['+index+'][0]" class="form-control li-'+index+'" data-parsley-required>\
                        <option value=""> Selected </option>\
                    </select>\
                </label>\
                <div class="col-md-6">\
                    <div class="radio-inline">\
                        <label><input type="radio" name="language['+index+'][1]" value="0" required="">{{ trans('label.mother_language') }}</label>\
                    </div>\
                    <div class="radio-inline">\
                        <label><input type="radio" name="language['+index+'][1]" value="1">{{ trans('label.business_level') }}</label>\
                    </div>\
                    <div class="radio-inline">\
                        <label><input type="radio" name="language['+index+'][1]" value="2">{{ trans('label.daily_conversation_level') }}</label>\
                    </div>\
                </div>\
            </div>\
        </div>';
    }
    
    $(document).on('click', '.add-more-school', function(){
        var $group = $(this).closest('.country-group');
        var index = $group.data('group-index');
        var newDom = getDomSchool(index);
        $(this).closest('.form-group').before(newDom);
    });
    
    $(document).on('click', '.remove-school', function(){
        $(this).closest('.form-group').remove();
    });
    
    
    $(document).on('click', '.remove-choice', function(){
        $(this).closest('.country-group').remove();
        reIndexGroupCount();
    });
    
    $(document).on('click', '.remove-language', function(){
        $(this).closest('.language-group').remove();
    });
    

    $('.add-more-country').click(function(){
        var index = $('.country-group').length;
        if(index>4) return;
        var newDom = getDomCountry(index);
        $(this).closest('.form-group').before(newDom);
        reIndexGroupCount();
        var selectDom = $('.ci-'+index);
        $.each(countries, function(k,v){
            selectDom.append('<option value="'+k+'">'+v+'</option>')
        });
    })
    
    function reIndexGroupCount(){
        $('.group-count').each(function(i,v){
            var num = (i == 0) ? 'st' : ( (i == 1) ? 'nd' : ( (i == 2) ? 'rd' : 'th' ) );
            $(v).html( (i+1) + num + ' {{ trans('label.choice') }}');
        });
    }
    
    
    $('.add-more-language').click(function(){
        var index = $('.language-group').length;
        if(index>3) return;
        var newDom = getDomLanguage(index);
        $(this).closest('.form-group').before(newDom);
        var selectDom = $('.li-'+index);
        $.each(langs, function(k,v){
            selectDom.append('<option value="'+v.English+'">'+v.English+'</option>')
        });
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

    function daysInMonth(month,year) {
        return new Date(year, month, 0).getDate();
    }
    $(function(){
        $("select[name='day']").change(function(){
            var month = $("select[name='month']").val();
            var year = $("select[name='year']").val();
            if(!month || !year){
            }
        });
        $("select[name='month']").change(function(){
            // setDay();
        });
        $("select[name='year']").change(function(){
            // setDay();
        });

        function setDay(){
            var month = $("select[name='month']").val();
            var year = $("select[name='year']").val();
            var getDays = daysInMonth(month ? month : 0, year ? year : 0);
            $("select[name='day']").html('');
            $("select[name='day']").append("<option value=''> Day </option>");
            for ($i = 1; $i <= getDays; $i++){
                $("select[name='day']").append("<option value='"+$i+"'> "+$i+" </option>");
            }
        }
    });
</script>
@endsection