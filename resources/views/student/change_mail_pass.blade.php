@extends('layouts.register')
@section('content')
<style type="text/css">
    .section-register {
        height: 576px;
    }
</style>
<section>
    <div class="section-register inside-blank">
        <div class="inner inner-md-1">
            <div class="register-form">
                <div class="form-body">
                    <div class="form-col form-left">
                        <div class="heading clip">
                            <h1 class="form-title montserrat">Change <br>your <br>{{ $change_type=='email' ? 'email' : 'password'}}</h1>
                            <h2 class="form-sub-title">
                                @if ($change_type == 'email')
                                    {{ trans('label.to_change_the_email_address') }}
                                @else
                                    {{ trans('label.change_the_password') }}
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="form-col form-right clf">
                        <div class="col-block">
                            @include('flash::message')
                            <form class="form-horizontal form-primary" role="form" method="POST" action="{{ $change_type=='email' ? route('student.updateEmail') : route('student.updatePassword') }}" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}" >
                                {!! csrf_field() !!}
                                @if($change_type == 'email')
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.mail_address') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="email" class="form-control" name="old_email" value="" placeholder='example@schoolynk.com' data-parsley-required data-parsley-type="email">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.new_mail') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input id="email" type="email" class="form-control" name="email" value="" placeholder='example@schoolynk.com' data-parsley-required data-parsley-type="email">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.new_mail_confirm') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="email" class="form-control" name="re_email" value="" placeholder='example@schoolynk.com' data-parsley-required data-parsley-type="email" data-parsley-equalto="#email">
                                        </div>
                                    </dd>
                                </dl>
                                @endif
                                @if($change_type == 'password')   
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.current_password') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="password" class="form-control" name="current_password" placeholder='{{ trans('label.place_holder_password') }}' data-parsley-required minlength="8">
                                        </div>
                                    </dd>
                                </dl>             
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.new_password') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="password" id='pwd' class="form-control" name="password" placeholder='{{ trans('label.place_holder_password') }}' data-parsley-required minlength="8">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="form-row clf">
                                    <dt><label class="control-label">{{ trans('label.new_password_confirm') }}</label></dt>
                                    <dd>
                                        <div class="input-block">
                                            <input type="password" class="form-control" name="re_password" placeholder='{{ trans('label.place_holder_password') }}' data-parsley-required data-parsley-equalto="#pwd">
                                        </div>
                                    </dd>
                                </dl>
                                @endif
                                <button type="submit" class="btn">{{ trans('label.save_btn') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection