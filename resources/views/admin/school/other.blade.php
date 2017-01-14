@foreach($otherText as $ot)
    <div class="child-other">
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" value="{{ $ot->name or '' }}" class="form-control" name="dataOld[{{$ot->id or 0}}][name]">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                            <textarea class="summernote summernote-modal" id="" name="dataOld[{{$ot->id or 0}}][content]" rows="40">
                                    {{ $ot->content or '' }}
                            </textarea>
            </div>
        </div>
    </div>
@endforeach