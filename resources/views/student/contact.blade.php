@extends('layouts.user') 
@section('style')
<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
@endsection

@section('content')
<section>
    <div class="inner inner-md-1">
        <div class="section-ui">
            <div class="container-fluid">
                <div class="row">
                    <form class="form-horizontal form-primary" role="form" method="POST" data-parsley-validate action="{{ route('student.contact') }}" data-parsley-required-message="{{ trans('validation.required') }}" data-parsley-equalto-message="{{ trans('validation.invalid') }}" data-parsley-type-message="{{ trans('validation.invalid_email') }}" data-parsley-minlength-message="{{ trans('validation.min_length') }}">
                        {!! csrf_field() !!}
                        <div class="panel panel-success">
                            <div class="panel-heading text-success fw-b">{{ trans('label.contact_us') }}</div>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.name') }}</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="name"  placeholder='{{ trans('label.first_name') }}' data-parsley-required>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="last_name"  placeholder='{{ trans('label.last_name') }}' data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.mail_address') }}</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email"  placeholder='' data-parsley-required>
                                        </div>                                
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('label.question') }}</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="16" name="question" data-parsley-required></textarea>
                                        </div>                                
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-6 ta-c">
                                            <button class="btn btn-success" type="submit">{{ trans('label.send_btn') }}</button>
                                        </div>                                
                                    </div>      
                            </div>
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

@endsection