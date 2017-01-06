@extends('layouts.admin')
@section('header-2')
    {{ trans('label.list_languages') }}
@endsection
@section('content')
<style type="text/css">
</style>
<div class="container-fluid hidden" ng-controller="LanguageController">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12">
                    <h3 class="c-m">
                        <a data-toggle="modal" href="javascript:void(0)" ng-click="getModalLanguage()" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i> {{ trans('label.add_languages') }}
                        </a>
                    </h3>
                </div>
            <table class="table table-hover fix-height-tb table-striped" ng-table="tableParams">
                <tbody>
                    <tr ng-repeat="language in $data">
                        <td class="text-center" data-title="'#'">
                            @{{$index+1}}
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.name') }}'" sortable="'name'" >
                            @{{language.name}}
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.key_name') }}'" sortable="'key_name'" >
                            @{{language.key_name}}
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.default') }}'" sortable="'default'" >
                            <p ng-if="language.default == 1">{{ trans('label.true') }}</p>
                            <p ng-if="language.default != 1">{{ trans('label.false') }}</p>
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.status') }}'" sortable="'status'">
                            <p ng-if="language.status == 1">{{ trans('label.active') }}</p>
                            <p ng-if="language.status != 1">{{ trans('label.inactive') }}</p>
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.ordering') }}'" sortable="'ordering'">
                            @{{language.ordering}}
                        </td>
                        <td class="text-center" data-title="'{{ trans('label.created_date') }}'" sortable="'created_at'">
                            @{{language.created_at}}
                        </td>
                        <td class="text-center" data-title="''">
                            <a ng-click="getModalLanguage(language.id)" class="action-icon">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection

@section('js')
	<script>
        window.languages = {!! json_encode($languages) !!}
    </script>
    <script type="text/javascript" src='/components/language/LanguageService.js'></script>
    <script type="text/javascript" src='/components/language/LanguageController.js'></script>
@endsection