@extends('layouts.admin')
@section('header-2')
    {{ trans('label.university_edit') }}
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-success fw-b">{{ trans('label.information') }}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.university.update', ['id'=> $university->id]) }}" enctype="multipart/form-data" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}">
                    {!! csrf_field() !!}
                    <input type='hidden' name="_method" value='put'></input>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.school_name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $university->user->name }}" data-parsley-required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.email') }}</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $university->user->email }}" data-parsley-required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.password') }}</label>

                        <div class="col-md-6">
                            <input type="password" id="pwd" class="form-control" name="password" minlength="6">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.password_confirm') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_rp" data-parsley-equalto="#pwd">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.school_type') }}</label>

                        <div class="col-md-6">
                            <select name="school_type" class='form-control' data-parsley-required>
                                <option value=""> {{ trans('label.selected') }} </option>
                                <option value="0" {{ $university->school_type == 0 ? 'selected' : '' }}> {{ trans('label.university') }} </option>
                                <option value="1" {{ $university->school_type == 1 ? 'selected' : '' }}> {{ trans('label.language_school') }}  </option>
                                <option value="2" {{ $university->school_type == 2 ? 'selected' : '' }}> {{ trans('label.foundation') }} </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.about') }}</label>
                        <div class="col-md-6">
                            <textarea rows="8" class="form-control" name="about" value="{{ $university->about }}">{{ $university->about }}</textarea>
                        </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.location') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="ta-c">{{ trans('label.country') }}</p>
                                    <select class="form-control" name="country" data-parsley-required data-live-search="true" data-size="10">
                                        <option value=""> {{ trans('label.choice') }} </option>
                                        @foreach ( $countries as $k => $country)
                                            <option value="{{ $k }}" {{ $university->country == $k ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <p class="ta-c">{{ trans('label.state_province') }}</p>
                                    <select class="form-control" name="state">
                                        <option value="">{{ trans('label.choice') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <p class="ta-c">{{ trans('label.city') }}</p>
                                    <input type="text" class="form-control" name="city" value="{{ $university->city }}" placeholder="{{ trans('label.city') }}" data-parsley-required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control mg-t-md" name="address" value="{{ $university->address }}" placeholder="{{ trans('label.address') }}" data-parsley-required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.year_of_establishment') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="year_of_establishment" value="{{ $university->year_of_establishment }}" data-parsley-required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.international_student_ratio') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="student_radio" placeholder="%" max="100" value="{{ $university->student_radio }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.university_rankings') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="ranking" value="{{ $university->ranking }}" data-parsley-required>
                        </div>
                    </div>                   

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.logo') }}</label>
                        <div class="col-md-6">
                            <img id="preview" style="max-width: 200px" src="{{ $university->logo }}">
                            <input class="form-control" type="file" name="logo" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.major') }}</label>
                        <div class="col-md-6">
                            <select class="form-control parsley-change" name='major[]' multiple data-live-search="true" data-max-options="5" data-actions-box="true" data-size="10">
                                @foreach($majors as $major)
                                    <option value='{{ $major->id }}' {{ in_array($major->id, $university->major) ? 'selected' : ''}}> {{ $major->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.tuition_fee') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="tuition_fee" value="{{ $university->tuition_fee }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.employment_rate') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="employment_rate" placeholder="%" max="100" value="{{ $university->employment_rate }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.offered_degrees') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name='offer_degree[]' multiple>
                                @foreach($degrees as $degree) 
                                    <option value='{{ $degree->id }}' {{ in_array($degree->id, $university->offer_degree) ? 'selected' : '' }}> {{ $degree->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('label.website') }}</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" name="website" value="{{ $university->website }}" data-parsley-required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success mg-t-sm">
                                {{ trans('label.update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js"></script>
<script>    
    $(function(){
        $('select[name="tag[]"]').selectpicker();
        $('select[name="major[]"]').selectpicker();
        $('select[name="offer_degree[]"]').selectpicker();
        $('select[name="country"]').selectpicker();
        $('input[name=tuition_fee]').mask('000,000,000', {reverse: true});

        $('[name=country]').change(function(){
            var $this = $(this);
            $.ajax({
              url: "/country-state/get-states/"+$(this).val(),
              dataType: 'json'
            }).done(function(data) {
                console.log(data);
                var $domTarget = $('[name=state]');
                $domTarget.html('');
                console.log( data.states);
                if(data && data.states){
                    $domTarget.append('<option value=""> {{ trans('label.choice') }} </option>')
                    $.each(data.states, function( k, v ) {
                        $domTarget.append('<option value="'+k+'"> '+v+' </option>')
                    });
                }else{
                    $domTarget.append('<option value=""> {{ trans('label.choice') }} </option>')
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
        
        $('[name=logo]').change(function(){
            if( ValidateSingleInput(this) )
                reviewImage(this, '#preview');
        });

        var _validFileExtensions = [".jpg", ".png"];
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
                        alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                        oInput.value = "";
                        return false;
                    }
                }

                if( (oInput.files[0].size / 1048576) > maxSize ) {
                    alert("Sorry, " + sFileName + " is invalid, file size less than " + maxSize + "Mb");
                        oInput.value = "";
                        return false;
                }
            }
            return true;
        }
    })
</script>
@endsection