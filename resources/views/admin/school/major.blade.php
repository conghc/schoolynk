@foreach($majors as $major)
    <div class="hr-line-dashed"></div>
    <div class="child-major">
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" value="{{ $major['text'] }}" class="form-control" name="dataOld[{{$major->id}}][text]">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 control-label">{{ trans('school.degree_level') }}</div>
            <div class="col-md-9">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][degree_level]">
                    @for($i=0; $i<count($degreelevel); $i++)
                    <option value="{{$degreelevel[$i]}}" {{ $degreelevel[$i] == $major->degree_level ? 'selected' : '' }}>{{ trans('school.'. $degreelevel[$i]) }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 control-label">{{ trans('school.course_term') }}</div>
            <div class="col-md-9">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][course_term]">
                    @for($i=0; $i<count($courseTerm); $i++)
                        <option value="{{$courseTerm[$i]}}" {{ $courseTerm[$i] == $major->course_term ? 'selected' : '' }}>{{ trans('school.'. $courseTerm[$i]) }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 control-label">{{ trans('school.enrollment') }}</div>
            <div class="col-md-9">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][enrollment]">
                    @for($i=0; $i<count($enrollment); $i++)
                        <option value="{{$enrollment[$i]}}" {{ $enrollment[$i] == $major->enrollment ? 'selected' : '' }}>{{ trans('school.'. $enrollment[$i]) }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 control-label">{{ trans('school.language') }}</div>
            <div class="col-md-9">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][language]">
                    @for($i=0; $i<count($majorLanguage); $i++)
                        <option value="{{$majorLanguage[$i]}}" {{ $majorLanguage[$i] == $major->language ? 'selected' : '' }}>{{ $majorLanguage[$i] }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 control-label">{{ trans('school.application_period') }}</div>
            <div class="col-md-4">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][application_period]">
                    @for($i=0; $i<count($enrollment); $i++)
                        <option value="{{$enrollment[$i]}}" {{ $enrollment[$i] == $major->application_period ? 'selected' : '' }}>{{ trans('school.'. $enrollment[$i]) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-1"><img class="ic-about" src="/img/ic-about.png" /></div>
            <div class="col-md-4">
                <select class="form-control m-b" name="dataOld[{{$major->id}}][application_period_max]">
                    @for($i=0; $i<count($enrollment); $i++)
                        <option value="{{$enrollment[$i]}}" {{ $enrollment[$i] == $major->application_period_max ? 'selected' : '' }}>{{ trans('school.'. $enrollment[$i]) }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
@endforeach