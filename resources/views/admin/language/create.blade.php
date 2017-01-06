<style type="text/css">
	.form-label {
		margin-bottom: 10px;
	}
</style>
<div class="modal-header">
<button aria-label="Close" data-dismiss="modal" class="close" type="button" ng-click="cancel()"><span aria-hidden="true">×</span></button>

@if(!empty($language->id))
	<h4 class="modal-title text-center">{{ trans('label.edit_language') }} {{$language->name}}</h4>
@else
	<h4 class="modal-title text-center">{{ trans('label.create_language') }}</h4>
@endif
	
</div>
<div class="modal-body user-modal">

	<form  class="" method="POST" accept-charset="UTF-8" name="formAddLanguage" ng-init='languageItem={{$language}}'>

		<div class="col-md-12 form-label" ng-class="{'has-error':formAddLanguage.name.$touched && formAddLanguage.name.$invalid}">
			<div class="col-md-3"><label for="name">{{ trans('label.language_name') }}<small> (*)</small></label></div>
			<div class="col-md-9">
				<input class="form-control" type="text" name="name" placeholder="{{ trans('label.language_name') }}" id="name" value="" ng-model="languageItem.name" ng-required="true">
				<label class="control-label" ng-show="formAddLanguage.name.$touched && formAddLanguage.name.$invalid">
					{{ trans('validation.invalid') }}
				</label>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="col-md-12 form-label" ng-class="{'has-error':formAddLanguage.key_name.$touched && (formAddLanguage.key_name.$invalid || isExists)}">
			<div class="col-md-3"><label for="name">{{ trans('label.key_name') }}<small> (*)</small></label></div>
			<div class="col-md-9">
				<input class="form-control" placeholder="{{ trans('label.key_name') }}" type="text" name="key_name" id="key_name" value="" ng-model="languageItem.key_name" ng-required="true">
				<label class="control-label" ng-show="formAddLanguage.key_name.$touched && formAddLanguage.key_name.$invalid">
					{{ trans('validation.invalid') }}
				</label>
				<label class="control-label" ng-show="isExists">
					{{ trans('validation.key_name_exists') }}
				</label>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="col-md-12" style="margin-bottom: 10px;">
			<div class="col-md-3"><label for="name">{{ trans('label.default') }}<small> </small></label></div>
			<div class="col-md-9">
				<input type="checkbox" value="1" name="default" ng-model="languageItem.default" ng-checked="languageItem.default">
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="col-md-12" style="margin-bottom: 10px;" ng-class="{'has-error':formAddLanguage.status.$touched && formAddLanguage.status.$invalid}">
			<div class="col-md-3"><label for="name">{{ trans('label.status') }}<small> (*)</small></label></div>
			<div class="col-md-9">
				<input type="radio" name="status" value="1" ng-model="languageItem.status" ng-required="true" id="radio1"> <label for="radio1">{{ trans('label.active') }}</label>
				<input type="radio" name="status" value="0" ng-model="languageItem.status" ng-required="true" id="radio2"> <label for="radio2">{{ trans('label.inactive') }}</label> 
				<label class="control-label" ng-show="formAddLanguage.status.$touched && formAddLanguage.status.$invalid">
					{{ trans('validation.invalid') }}
				</label>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="col-md-12" ng-class="{'has-error':formAddLanguage.ordering.$touched && formAddLanguage.ordering.$invalid}">
			<div class="col-md-3"><label for="name">{{ trans('label.ordering') }}<small> (*)</small></label></div>
			<div class="col-md-9">
				<div class="form-group">
					<input class="form-control" type="number" min="1" name="ordering" ng-model="languageItem.ordering" ng-required="true"> 
				</div>
				<label class="control-label" ng-show="formAddLanguage.ordering.$touched && formAddLanguage.ordering.$invalid">
					{{ trans('validation.invalid') }}
				</label>
			</div>
		</div>
		<div class="clearfix"></div>
	</form>
</div>
<div class="modal-footer">
	<div class="form-group center-block">
		<button ng-disabled="formAddLanguage.$invalid" class="btn btn-primary" ng-click="createLanguage()">
			@if(!empty($language->id))
				{{ trans('label.update') }}
			@else
				{{ trans('label.create') }}
			@endif
		</button>
		<button class="btn btn-default" ng-click="cancel()">{{ trans('label.cancel') }}</button>
	</div>
</div>
