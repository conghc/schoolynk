@extends('layouts.admin')
@section('header-2')
     Sponsor Create
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-success fw-b">Create Schoolynk</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.schoolynk.store') }}" data-parsley-validate>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" data-parsley-required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" data-parsley-required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" id="pwd" class="form-control" name="password" data-parsley-required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Comfirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_rp" data-parsley-required data-parsley-equalto="#pwd">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success mg-t-sm">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
