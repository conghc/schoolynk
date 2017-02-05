<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <link rel="icon" href="/frontend/img/favicon.ico">
    <title>{{ trans('label.my_page') }} | SchooLynk</title>
    <!-- Bootstrap core CSS -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/fonts/roboto-fonts/roboto-fonts.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/style.css" rel="stylesheet">
    @yield('style')
</head>
<body class="signIn">
<div class="">
    <div class="row"><br />
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel-heading">Schoo<span class="inner">Lynk</span>
                <span class="under">SIGN UP TO CONTINUE</span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal form-primary" id="register" role="form" method="POST" action="{{ route('student.store') }}" data-parsley-validate data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}" >
                    {!! csrf_field() !!}
                    <dl class="form-row clf name">
                        <dd class="clf">
                            <div class="input-inline col-md-6" style="padding-left:0px">
                                <input type="text" class="form-control ipModify" name="name" value="{{ old('name') }}" placeholder="First name" data-parsley-required="">
                            </div>
                            <div class="input-inline col-md-6" style="padding-right:0px;">
                                <input type="text" class="form-control ipModify" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" data-parsley-required="">
                            </div>
                        </dd>
                        <div class="clear"></div>
                    </dl>
                    <dl class="form-row clf">
                        <dd>
                            <div class="input-block">
                                <input id="email" type="email" class="form-control" name="email" value="" placeholder='example@schoolynk.com'　data-parsley-type="email" data-parsley-required>
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dd>
                            <div class="input-block">
                                <input type="password" id='pwd' class="form-control ipModify" name="password" placeholder='Password' data-parsley-required minlength="8">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dd>
                            <div class="input-block">
                                <input type="password" class="form-control ipModify" name="password_rp" placeholder='Confirm password' data-parsley-required data-parsley-equalto="#pwd">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dd>
                            <div class="input-block">
                                <select class="form-control slModify" id="sel1" >
                                    @foreach($nationalities as $na)
                                        <option value="{{ $na }}">{{ $na }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf birthday">
                        <dd class="clf">
                            <div class="input-inline col-md-4" style="padding-left:0px">
                                <select class="form-control slModify" name='year' data-parsley-required>
                                    <option value=''>{{ trans('label.year') }}</option>
                                    @for ($i = 1950; $i <= 2015; $i++)
                                        <option value='{{ $i }}'> {{ $i }} </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="input-inline col-md-4">
                                <select class="form-control slModify" name='month' data-parsley-required>
                                    <option value=''>{{ trans('label.month') }}</option>
                                    @foreach($months as $month)
                                        <option value='{{ $month[1] }}'> {{ $month[0] }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-inline col-md-4" style="padding-right:0px">
                                <select class="form-control slModify" name='day' data-parsley-required>
                                    <option value=''>{{ trans('label.day') }}</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value='{{ $i }}'> {{ $i }} </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="clear"></div>
                        </dd>
                    </dl>


                    <dl class="form-row clf">
                        <dd>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="" name="accept" data-parsley-required data-parsley-mincheck="1">
                                    <span class="checkbox-icon"></span>
                                    <span class="text">I have read and agree to Schoolynk's Privacy policy and Tearm of use...</span>
                                </label>
                            </div>
                        </dd>
                    </dl>
                    <div class="form-group buttonSignIn">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-modify btnLogin">Create new account</button>
                            <span>Already have an account? <a href="/doLogin">Sign in</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<script src="/frontend/js/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/js/plugins/validate/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#register").validate({
            rules: {
                name: {required: true},
                last_name: {required: true},
                email: {required: true, email: true},
                password: {required: true, minlength: 5},
                password_rp: {required: true, minlength: 5, equalTo : "#pwd"},
                year: {required: true},
                month: {required: true},
                day: {required: true},
                accept: {required: true}
            },
            messages: {
                name: '{{ trans('form.this_field_is_required') }}',
                email: {
                    required: '{{ trans('form.this_field_is_required') }}',
                    email: '{{ trans('form.valid_email_type') }}'
                },
                password: {
                    minlength: '{{ trans('form.vali_leng_str_5') }}'
                },
                re_password: {
                    minlength: '{{ trans('form.vali_leng_str_5') }}',
                    equalTo: '{{ trans('form.vali_re_password') }}',
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "accept" ) {
                    $(".checkbox").append(error);
                }else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                alert('go');
            }
        });
    });
</script>
@yield('js')
</body>
</html>
