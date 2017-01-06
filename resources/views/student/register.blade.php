@extends('layouts.register')
@section('content')
<section>
    <div class="section-register inside-blank">
        <div class="inner inner-md-1">
            <div class="register-form">
                <div class="form-body">
                    <div class="form-col form-left">
                        <div class="heading clip">
                            <h1 class="form-title montserrat">Create <br>your <br>account</h1>
                            <h2 class="form-sub-title">{{ trans('label.account_created') }}</h2>
                            <div class="step">
                                <img src="/images/register/step01.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-col form-right clf">
                        <div class="col-block">
                            <div class="regis-social-wrapper">
                                <a href="/redirect/facebook" class="lg-social lg-fb"><img src="/schoolynk/detailpage/images/icon-fb.png"></a>
                                <a href="/redirect/twitter" class="lg-social lg-tw"><img src="/schoolynk/detailpage/images/icon-tw.png"></a>
                                <a href="/redirect/google" class="lg-social lg-gg"><img src="/schoolynk/detailpage/images/icon-g.png"></a>
                            </div>

                            <!-- Show message email exists -->
                            @if (session('flash_notification.message') == 'email_exists')
                                <div class="alert alert-danger col-md-9 col-md-push-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ trans('validation.email_exists') }}
                                </div>
                            @endif
                            <!-- /Show message email exists-->
                            
                            <form class="form-horizontal form-primary" role="form" method="POST" action="{{ route('student.store') }}" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}" >
                                {!! csrf_field() !!}
                                <dl class="form-row clf name">
                                    <dt><label class="control-label">{{ trans('label.name') }}</label></dt>
                                    <dd class="clf">
                                        <div class="input-inline col-md-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('label.first_name') }}" data-parsley-required="">
                                        </div>
                                        <div class="input-inline col-md-2">
                                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="{{ trans('label.last_name') }}" data-parsley-required="">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.gender') }}</label></dt>
                                    <dd class="clf">
                                        <div class="input-inline col-md-1 radio">
                                            <label>
                                                <input type="radio" name="gender" value="0" required="" data-parsley-multiple="gender">
                                                <span class="radio-icon"></span>{{ trans('label.male') }}
                                            </label>
                                        </div>
                                        <div class="input-inline col-md-1 radio">
                                            <label>
                                                <input type="radio" name="gender" value="1" required="" data-parsley-multiple="gender">
                                                <span class="radio-icon"></span>{{ trans('label.female') }}
                                            </label>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.account_registration') }}</label></dt>
                                    <dd>
                                        <div class="input-inline col-md-1 radio">
                                            <label>
                                            <input type="radio" name="user_mode" value='0'>
                                            <span class="radio-icon"></span>{{ trans('label.person_study_abroad') }}
                                            </label>
                                        </div>
                                        <div class="input-inline col-md-1 radio">
                                            <label>
                                            <input type="radio" name="user_mode" value='1' required="">
                                            <span class="radio-icon"></span>{{ trans('label.guardian') }}
                                            </label>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf birthday">
                                    <dt><label class="control-label">{{ trans('label.birthday') }}</label></dt>
                                    <dd class="clf">
                                        <div class="input-inline col-md-3">
                                            <select class="custom-select" name='year' data-parsley-required>
                                                <option value=''>{{ trans('label.year') }}</option>
                                                @for ($i = 1950; $i <= 2015; $i++)
                                                <option value='{{ $i }}'> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-inline col-md-3">
                                            <select class="custom-select" name='month' data-parsley-required>
                                                <option value=''>{{ trans('label.month') }}</option>
                                                @foreach($months as $month)
                                                <option value='{{ $month[1] }}'> {{ $month[0] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-inline col-md-3">
                                            <select class="custom-select" name='day' data-parsley-required>
                                                <option value=''>{{ trans('label.day') }}</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                <option value='{{ $i }}'> {{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.mail_address') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input id="email" type="email" class="form-control" name="email" value="" placeholder='example@schoolynk.com'　data-parsley-type="email" data-parsley-required>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.mail_address_confirm') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="email" class="form-control" name="re_email" value="" placeholder='example@schoolynk.com' data-parsley-required data-parsley-type="email" data-parsley-equalto="#email">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.password') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="password" id='pwd' class="form-control" name="password" placeholder='{{ trans('label.place_holder_password') }}' data-parsley-required minlength="8">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.password_confirm') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="password" class="form-control" name="password_rp" placeholder='{{ trans('label.place_holder_password') }}' data-parsley-required data-parsley-equalto="#pwd">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.persional_information') }}</label></dt>
                                    <dd>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" value="" name="accept" data-parsley-required data-parsley-mincheck="1">
                                            <span class="checkbox-icon"></span>
                                            <span class="text">{{ trans('label.of_schoolynk') }}<a href="/student/terms/">{{ trans('label.terms_of_use') }}</a>{{ trans('label.and') }}<a href="/student/privacy/">{{ trans('label.privacy_policy') }}</a>{{ trans('label.and_agree_to') }}</span>
                                            </label>
                                        </div>
                                    </dd>
                                </dl>
                                <button type="submit" class="btn">{{ trans('label.and_agree_to') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script type="text/javascript">
    function daysInMonth(month,year) {
        return new Date(year, month, 0).getDate();
    }
    $(function(){
        $("select[name='day']").change(function(){
            var month = $("select[name='month']").val();
            var year = $("select[name='year']").val();
            if(!month || !year){
                // alert('Please select month and year first');
                // $(this).val(null);
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
            var year  = $("select[name='year']").val();
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