@extends('layouts.register')
@section('content')
<style type="text/css">
    .mg-t-xlg {
        margin-top: 15px!important;
    }
</style>
<section>
    <div class="section-register inside-blank">
        <div class="inner inner-md-1">
            <div class="register-form">
                <div class="form-body">
                    <div class="form-col form-left">
                        <div class="heading clip">
                            <h1 class="form-title montserrat">Verify <br>your <br>account</h1>
                            <h2 class="form-sub-title">{{ trans('label.email_confirm_lable_step_2') }}</h2>
                            <div class="step">
                                <img src="/images/register/step02.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-col form-right clf">
                        <div class="col-block">
                            @include('flash::message')
                            <div class="section-verify">
                                <h2 class="verify-title">{{ trans('label.verify_title_1') }}</h2>
                                <p>{{ trans('label.verify_title_2') }}<br>
                                    {{ trans('label.verify_title_3') }}
                                </p>
                                <img src="/images/register/icon-mail.png" alt="" class="icon-mail">
                                <p>{{ trans('label.verify_title_4') }}<br>
                                    {{ trans('label.verify_title_5') }}<br>
                                    {{ trans('label.verify_title_6') }}
                                </p>
                                <p>{{ trans('label.verify_title_7') }}<br>
                                    <a href="mailto:contact@schoolynk.com">contact@schoolynk.com</a> {{ trans('label.verify_title_8') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection