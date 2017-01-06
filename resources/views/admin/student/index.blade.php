@extends('layouts.admin')
@section('header-2')
    {{ trans('label.list_student') }}
@endsection
@section('content')
<style type="text/css">
    .register-form .form-row {
        display: table;
        width: 100%;
    }
    .register-form dt {
        width: 20%;
        white-space: nowrap;
        padding-right: 2em;
        text-align: right;
    }
    .register-form dt, .register-form dd {
        display: table-cell;
        vertical-align: middle;
        padding-bottom: 1.4em;
    }
    label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
    }
    .register-form dd {
        width: 70%;
        text-align: left;
    }
    .register-form dt, .register-form dd {
        display: table-cell;
        vertical-align: middle;
        padding-bottom: 1.4em;
    }
    dd {
        position: relative;
    }
    dl {
        margin: 0px;
    }
    .register-form .col-md-2 {
        float: left;
        width: 100%;
        padding: 0px;
    }
    .register-form .form-control {
        width: 80%;
    }
    .clf .radio {
        width: auto;
    }
    .clf .radio label {
        padding: 0px;
    }
    .clf select {
        padding: 0px;
    }
    .register-form {
        margin-top: 20px;
    }
    .radio input[type=radio] {
        margin-left: -14px;
    }
    .date-select {
        padding: 0px;
    }
    .next1 {
        margin-left: 420px;
    }
    .input-inline {
        margin-top: 8px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped list">
                <thead>
                    <tr>
                        <th>{{ trans('label.name') }}</th>
                        <th>{{ trans('label.birthday') }}</th>
                        <th>{{ trans('label.country') }}</th>
                        <th>{{ trans('label.date_of_registration') }}</th>
                        <th>{{ trans('label.study_destination') }}</th>
                        <th>{{ trans('label.current_education_level') }}</th>
                        <th class="no-icon"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td><a href="" class="dialog" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ $user->student->birthday }}</td>
                                <td>{{ $user->student->nationality }}</td>
                                <td>{{ $user->student->created_at }}</td>
                                <td>{{ ($user->student->country) ? $countries[$user->student->country] : 'N/A' }}</td>
                                <td>{{ ($user->student->degree) ? $degrees[$user->student->degree] : 'N/A' }}</td>
                                <td class='ta-c'><i class="glyphicon glyphicon-remove-circle text-danger remove-school"></i></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            <form id="TheForm" method="post" action="{{ route('admin.student.destroy', ['id' => 0]) }}">
                {!! csrf_field() !!}
                <input id="removeID" type="hidden" name="id" value="" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="formShow">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">{{ trans('label.student_detail') }}</h4>
            </div>
            <div class="modal-body">
                <fieldset class="form-horizontal form-primary register-form">
                    <dl class="form-row clf  name">
                        <dt><label class="control-label">{{ trans('label.name') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-name" >
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.gender') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-gender" >
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.account_registration') }}</label></dt>
                        <dd>
                            <div class="input-inline col-md-2" id="input-user-mode">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf birthday">
                        <dt><label class="control-label">{{ trans('label.birthday') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-birth-day">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.mail_address') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-email">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.country_of_citizenship') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-nationality">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.prefectures') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-state">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.municipal_district') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-city">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.address_building_name') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-address">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.degree') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-degree">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.school_name') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-school-name">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label class="control-label">{{ trans('label.expected_graduation_time') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-date-graduation">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label>{{ trans('label.profile_photo') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-avatar">
                                <img id="preview" width="128" height="128" src="/images/no-avatar.png">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label>{{ trans('label.study_abroad_type') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-type-study">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label>{{ trans('label.study_abroad_destination') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-academic">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label>{{ trans('label.study_abroad_period') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-expected-start">
                            </div>
                        </dd>
                    </dl>
                    <dl class="form-row clf">
                        <dt><label>{{ trans('label.major_areas_of_interest') }}</label></dt>
                        <dd class="clf">
                            <div class="input-inline col-md-2" id="input-major">
                            </div>
                        </dd>
                    </dl>
                </fieldset>
                <fieldset class="form-horizontal form-primary register-form" id="step2">
                </fieldset>
                <fieldset class="form-horizontal form-primary register-form" id="step3">
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){
    $('.list').DataTable( {"order": []} );
    $(document).on('click', '.remove-school', function(){
        var id = $(this).closest('tr').data('id');
        bootbox.confirm("Are you sure?", function(result) {
            if(result){
                $('#removeID').val(id);
                var url = $('#TheForm').attr('action');
                $('#TheForm').attr('action', url + id);
                $('#TheForm').submit();
            }
        }); 
    });

    $('.dialog').on('click', function() {
        $('#formShow').find('input').attr('value', '');
        $('#formShow').find('select').attr('value', '');
        $('#formShow').find('.goabroad-group').remove();
        $('#formShow').find('.language-group').remove();
        $.ajax({
            type: "GET",
            url: 'student/' + $(this).data('id'),
            success: function(data, status) {
                $('#input-name').text(data.user.name + ' ' + ((data.user.last_name != null) ? data.user.last_name : ''));

                $('#input-gender').text((data.student.gender == 0) ? '{{ trans('label.male') }}' : '{{ trans('label.female') }}');

                $('#input-user-mode').text((data.student.user_mode == 0) ? '{{ trans('label.student') }}' : '{{ trans('label.parent_of_student') }}');

                $('#input-birth-day').text(data.student.birthday);

                $('#input-email').text(data.user.email);

                $('#input-nationality').text(data.student.nationality);
                
                $('#input-state').text(data.student.state);

                $('#input-city').text(data.student.city);

                $('#input-address').text(data.student.address);

                $('#input-degree').text(data.student.degree);

                $('#input-school-name').text(data.student.name_of_school);

                $('#input-date-graduation').text(data.student.date_graduation);

                if (data.student.avatar) {
                    $('#input-avatar').find('img').attr('src', data.student.avatar);
                } else {
                    $('#input-avatar').find('img').attr('src', '/images/no-avatar.png');
                }
                
                $('#input-type-study').text(data.student.type_of_study);

                $('#input-academic').text(data.student.academic);

                $('#input-expected-start').text(data.student.expected_start);

                $('#input-major').text(data.student.majors);

                var educationAbroads = data.educationAbroads;
                $.each(educationAbroads, function(i, e) {
                    var html =  '<div class="goabroad-group">' +
                                    '<h3 class="section-sub-title text-center">{{ trans('label.hope_to_study_abroad') }} ' + (i + 1) + '</h3>' +
                                    '<dl class="form-row clf">' +
                                        '<dt><label>{{ trans('label.study_abroad_country') }}</label></dt>' +
                                        '<dd>' + e.country_interested + '</dd>' +
                                    '</dl>';
                    html = html +  '<dl class="form-row clf">' +
                                            '<dt class="va-top"><label>{{ trans('label.school_name') }}</label></dt>' +
                                            '<dd class="va-top">' +
                                                '<div class="input-block">' +
                                                    e.school_interested
                                                '</div>' +
                                            '</dd>' +
                                        '</dl>';
                    
                    html = html + '</div>';
                    $('#step2').append(html);
                });

                var langs = data.student.language;
                $.each(langs, function(i2, e2) {
                    var level = '';
                    if (e2[1] == 0) {
                        level = '{{ trans('label.native') }}';
                    } else if (e2[1] == 1) {
                        level = '{{ trans('label.business_level') }}';
                    } else {
                        level = '{{ trans('label.daily_conversation_level') }}';
                    }
                    var html1 = '<div class="language-group" >' +
                                    '<h3 class="section-sub-title text-center">{{ trans('label.language') }} ' + (i2 + 1) + '</h3>' +
                                    '<dl class="form-row clf">' +
                                        '<dt><label>{{ trans('label.language') }}</label></dt>' +
                                        '<dd>' +
                                            '<div class="input-block">' + e2[0] + '</div>' +
                                        '</dd>' +
                                    '</dl>' +
                                    '<dl class="form-row clf">' +
                                        '<dt><label>{{ trans('label.level_language') }}</label></dt>' +
                                        '<dd class="clf">' +
                                            '<div class="input-inline col-md-1 radio">' +
                                                '<label><span class="radio-icon"></span>' +
                                                    {{ trans('label.level') }}
                                                '</label>' +
                                            '</div>' +
                                        '</dd>' +
                                    '</dl>' +
                                '</div>';
                    $('#step3').append(html1);
                });
            }
        });
    })
});
</script>
@endsection