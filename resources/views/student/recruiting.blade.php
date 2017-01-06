@extends('layouts.user') 
@section('style')
<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
<style type="text/css">
    #list-search .item img{
    max-width: 100%;
    height: 200px;
    }
    .max-h300{
    max-height: 300px;
    }

    @media (max-width: 991px) {
        .col-md-2 {
            width: 50%;
            float: left;
        }
        
    }
</style>
@endsection
@section('content')
<section>
    <div class="inner inner-md-1">
        <div class="section-ui">
            <div class="section-ui-header"></div>
            <ul class="ui-tabs clf mg-b-n">
                <li id="tab1" class="tab table-cell {{ $tab ? '' : 'active' }}">
                    <a href="#cont1">{{ trans('label.university') }}</a>
                </li>
                <li id="tab2" class="tab table-cell {{ $tab == 2 ? 'active' : ''}}">
                    <a href="#cont2">{{ trans('label.email') }}</a>
                </li>
                <li id="tab3" class="tab table-cell {{ $tab == 3 ? 'active' : ''}}">
                    <a href="#cont3">{{ trans('label.favorite') }}</a>
                </li>
            </ul>
            <div class="panels">
                <div id="cont1" class="panel {{ $tab ? '' : 'active' }}">
                    <form class="form-horizontal mg-t-md" id="frm-search">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('label.school_name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" data-parsley-required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('label.type') }}</label>
                            <div class="col-md-6">
                                <select name="school_type" class='form-control' data-parsley-required>
                                    <option value=""> {{ trans('label.choice') }}</option>
                                    <option value="0"> {{ trans('label.university') }} </option>
                                    <option value="1"> {{ trans('label.language_school') }} </option>
                                    <option value="2"> {{ trans('label.foundation') }} </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('label.country') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country" data-parsley-required>
                                    <option value=""> {{ trans('label.choice') }}</option>
                                    @foreach ( $countries as $k => $country)
                                    <option value="{{ $k }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('label.prefectures') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="state">
                                    <option value="">{{ trans('label.choice') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('label.university_rankings') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="ranking">
                                    <option value="0">{{ trans('label.select_all') }}</option>
                                    <option value="1">1 ~ 10</option>
                                    <option value="2">11 ~ 20</option>
                                    <option value="3">21 ~ 50</option>
                                    <option value="4">50 ~ 100</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-2">{{ trans('label.other') }}</div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="from" placeholder="From">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="to" placeholder="to">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="btn btn-success mg-t-sm" id="btn-search">
                                    {{ trans('label.search') }}
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel panel-default">
                        <div class="panel-heading text-success fw-b">{{ trans('label.search_result') }}</div>
                        <div class="panel-body">
                            <div class="control form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('label.changing_conditions') }}:</label>
                                    <div class="col-md-6">
                                        <select name="filter" class="form-control">
                                            <option value="0"> {{ trans('label.tse') }} </option>
                                            <option value="1"> {{ trans('label.click_already') }} </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="list-search" class="ww-wb">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Panel content tab 02 --}}
                <div id="cont2" class="panel {{ $tab == 2 ? 'active' : ''}}">
                    {{-- Message list --}}
                    <table class="table table-loan tb-01 mail">
                        <thead>
                            <tr>
                                <th>{{ trans('label.university') }}</th>
                                <th>{{ trans('label.message') }}</th>
                                <th>{{ trans('label.attach_a_file') }}</th>
                                <th>{{ trans('label.time') }}</th>
                                <th class="no-icon"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr class="get-info" data-id="{{ $message->university->id }}" data-status="{{ $message->status }}" data-message-id="{{ $message->id }}">
                                <td data-label="大学"> {{ $message->university->user->name }} </td>
                                <td data-label="メサジェ">
                                    <div class="title fw-b"> {{ $message->title }} </div>
                                    <div class="message nowrap"> -- {{ $message->message }} </div>
                                </td>
                                <td data-label="Attach file" class="ta-c file">
                                    @if($message->file)
                                    <a href="{{ $message->file }}" download>
                                    <i class="glyphicon glyphicon-save-file fs-xxlg"></i>
                                    </a>
                                    @endif
                                </td>
                                <td data-label="Time" class="time">
                                    {{ $message->created_at->toDayDateTimeString() }}
                                </td>
                                <td data-label="Send Mail" class="ta-c">
                                    <i class="glyphicon glyphicon-envelope cus-p fs-xxlg send-message text-success" title="Send message"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- ./Message list --}}
                </div>
                {{-- ./Panel content tab 02 --}}
                <div id="cont3" class="panel row pd-t-xlg ww-wb {{ $tab == 3 ? 'active' : ''}}">
                    <?php 
                        // Set count for add class clear fix after 4 item
                        $count = 0;
                    ?>
                    @foreach ( $favorites as $favorite)
                    @if($count == 4)
                    <div class="clearfix"></div>
                    <?php $count = 0 ?>
                    @endif
                    <div class="col-xs-12 col-sm-6 col-md-3 item ta-c" data-unifavorite="false">
                        <img class="view-detail cur-p" src="{{ $favorite->university->logo }}" data-id="{{ $favorite->university->id }}">                        
                        <div class="name pd-sm fw-b">{{ $favorite->university->user->name }}</div>
                        <div class="location"></div>
                        <div class="ranking"> {{ trans('label.ranking') }}: {{ $favorite->university->ranking }}</div>
                        <div class="favorite cus-p text-danger dp-ib" data-favorite="true" data-universityid="{{ $favorite->university->id }}">                  
                            <i class="glyphicon glyphicon-heart "></i>                            
                            <span>{{ $favorite->university->favorites->count() }}</span>                        
                        </div>
                    </div>
                    <?php $count++;?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('label.university_detail') }}</h4>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <!-- panel -->
                <div class="panel panel-success get-info" data-id="">
                    <!-- Overview -->
                    <div class="panel-heading text-success fw-b">
                        <span>{{ trans('label.overview') }}</span>
                        <div class="fl-r">
                            <span id="add-favorite" class="favorite" data-favorite="false" data-universityid="">
                            <i class="glyphicon glyphicon-heart glyphicon-heart-empty cus-p fs-xxlg mg-r-sm"  title="Favorite" ></i>
                            </span>
                            <i class="glyphicon glyphicon-envelope cus-p fs-xxlg send-message" title="Send message"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 ta-c">
                                <img id="logo" class="thumbnail" data-holder-rendered="true" style="height: 70px; display: inline-block;"> 
                            </div>
                            <div class="col-xs-6">Name:</div>
                            <div class="col-xs-6 data-name ovh">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Email:</div>
                            <div class="col-xs-6 data-email">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">School type:</div>
                            <div class="col-xs-6 data-school-type">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">About:</div>
                            <div class="col-xs-6 data-about">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Country:</div>
                            <div class="col-xs-6 data-country">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">State:</div>
                            <div class="col-xs-6 data-state">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">City:</div>
                            <div class="col-xs-6 data-city">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Address:</div>
                            <div class="col-xs-6 data-address">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Year of establishment:</div>
                            <div class="col-xs-6 data-year-of">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">International student ratio</div>
                            <div class="col-xs-6 data-ratio">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">University ranking</div>
                            <div class="col-xs-6 data-ranking">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Major</div>
                            <div class="col-xs-6 data-major max-h300">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Tuition fee</div>
                            <div class="col-xs-6 data-tuition-fee">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Employment rate</div>
                            <div class="col-xs-6 data-employment-rate">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Offered degrees</div>
                            <div class="col-xs-6 data-degreee">.</div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">Website</div>
                            <div class="col-xs-6 data-website">.</div>
                        </div>
                    </div>
                    <!--./ panel -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Send Message-->
<div class="modal fade" id="modalSendMessage" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>Send Message</h3>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10">
                        <form class="form-horizontal" id="frm-send-mes" action="{{ route('student.sendMessage') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="hidden" name="student_id">
                                <input type="hidden" name="university_id">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Message</label>
                                <div class="col-md-9">
                                    <textarea name="message" rows='8' class="form-control res-n" data-parsley-required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Attach file</label>
                                <div class="col-md-9">
                                    <input type="file" name="file" class="form-control" onchange="ValidateSingleInput(this)">
                                    <p class="text-danger mg-t-sm">Note: Just allow upload the file format (Word, PDF, Excel, Txt) and file size less than 2Mb</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Detail Message-->
<div class="modal fade" id="modalDetailMessage" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>{{ trans('label.text') }}</h3>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3">{{ trans('label.title') }}</label>
                                <div class="col-md-9" id="detail-title"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">{{ trans('label.text') }}</label>
                                <div class="col-md-9" id="detail-message"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">{{ trans('label.attach_a_file') }}</label>
                                <div class="col-md-9" id="detail-file"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">{{ trans('label.time') }}</label>
                                <div class="col-md-9" id="detail-time"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    $.fn.serializeObject = function()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    
    $(function(){
        var studentID = {{ Auth::user()->student->id }};
        var listFavorites = [];
        var listUniversityFavorite = [];
    
        // Ajax get list favorite
        $.ajax({
            method: "GET",
            url: "{{ route('api.student.listFavorite', [
                'id' => Auth::user()->student->id ]) }}",
            dataType: 'json'
        })
        .done(function( result ) {
            listFavorites = result;
            console.log('listFavorite',listFavorites);
        })
        .fail(function() {
        })
        .always(function() {
        });
    
        // Ajax get list favorite
        $.ajax({
            method: "GET",
            url: "{{ route('api.student.listUniversityFavorite', [
                'id' => Auth::user()->student->id ]) }}",
            dataType: 'json'
        })
        .done(function( result ) {
            listUniversityFavorite = result;
            console.log('listUniversityFavorite',listUniversityFavorite);
        })
        .fail(function() {
        })
        .always(function() {
        });
    
        $('select[name="country[]"]').selectpicker();
        $('[name=country]').change(function(){
            var $this = $(this);
            $.ajax({
              url: "/country-state/get-states/"+$(this).val(),
              dataType: 'json'
            }).done(function(data) {
                var $domTarget = $('[name=state]');
                $domTarget.html('');
                if(data && data.states){
                    $domTarget.append('<option value=""> Choose </option>')
                    $.each(data.states, function( k, v ) {
                        $domTarget.append('<option value="'+k+'"> '+v+' </option>')
                    });
                }else{
                    $domTarget.append('<option value=""> Choose </option>')
                }
            });
        });
    
        var listSearch = $('#list-search');
        $('#btn-search').click(function(){
            $('#waiting').show();
            var data = $('#frm-search').serializeObject();
            console.log(data);
            $.ajax({
                method: "GET",
                url: "{{ route('universitySearch') }}",
                data: data,
                dataType: 'json'
            })
            .done(function( result ) {
                console.log(result);
                listSearch.html('');
                if(result.length == 0) {
                    listSearch.html('No matching University found');
                    listSearch.addClass('text-danger');
                }else{
                    listSearch.removeClass('text-danger');
                }
                count = 0;
                $.each(result, function(k,v){
                    console.log('University:', v.user.name );
                    var isFavorite = listFavorites.indexOf(v.id) < 0 ? false : true;
                    var uniFavorite = listUniversityFavorite.indexOf(v.id) < 0 ? false : true;
                    console.log('isFavorite', isFavorite );
                    console.log('uniFavorite', uniFavorite );
                    if(count == 4) {
                      listSearch.append('<div class="clearfix"></div>');
                      count = 0;
                    }
                    listSearch.append('\
                        <div class="col-xs-12 col-sm-6 col-md-3 item ta-c" data-uniFavorite="'+uniFavorite+'">\
                            <img class="view-detail cur-p" src="'+v.logo+'" data-id="'+v.id+'">\
                            <div class="name pd-sm fw-b">'+ v.user.name +'</div>\
                            <div class="location"></div>\
                            <div class="ranking"> Ranking: '+ v.ranking +'</div>\
                            <div class="favorite cus-p text-danger dp-ib" data-favorite="'+isFavorite+'"  data-universityid="'+v.id+'">\
                                <i class="glyphicon glyphicon-heart ' + (isFavorite ? "" : "glyphicon-heart-empty") + ' "></i>\
                                <span>'+ v.favorites.length +'</span>\
                            </div>\
                        </div>\
                        ');
                    console.log('------------------');
                    count++;
                });
            })
            .fail(function() {
                alert( "search fail" );
            })
            .always(function() {
                $('#waiting').hide();
            });
        });
    
        /**
         * Add university to favorite
         * @param  {[action click]} )
         */
        $(document).on('click', '.favorite', function(){
            $this = $(this);
            var universityID = $this.data('universityid');
            var isFavorite = $this.data('favorite');
            console.log(universityID, studentID, isFavorite);
            
            if($this.data('favorite')){
                $this.find('i').addClass('glyphicon-heart-empty');
            }else{
                $this.find('i').removeClass('glyphicon-heart-empty');
            }
            // Update favorite current status
            $this.data('favorite', !$this.data('favorite'));
            $.ajax({
                method: "GET",
                url: "{{ route('api.student.addFavorite') }}",
                dataType: 'json',
                data: { 'student_id':studentID,
                    'university_id':universityID,
                    'favorite': isFavorite }
            })
            .done(function( result ) {
                console.log('listFavorite', result);
                if(result){
                    listFavorites = result;
                }
    
                var numFavorite = parseInt( $this.find('span').html() );
                if(isFavorite) numFavorite -=1;
                else numFavorite += 1;
    
                $this.find('span').html(numFavorite);            
            })
            .fail(function() {
            })
            .always(function() {
                $('body').css('cursor', 'default');
            });
        })
    
        $('select[name=filter]').change(function(){
            $this = $(this);
            if($this.val() == 1){
                $('[data-uniFavorite=false]').hide();
            }else{
                $('[data-uniFavorite=false]').show();
            }
        })
    
        /**
         * View detail university
         * @param  {action click} ){                 } 
         * @return {popop}     
         */
        $(document).on('click','.view-detail', function(){
            $('#waiting').show();
            var id = $(this).data('id');
            $.ajax({
                method: "GET",
                url: '/api/university/' + id,
                dataType: 'json'
            }).done(function( result ) {
                console.log(result);
                $('#detailModal .get-info').data('id', id);
    
                $("#add-favorite").data('universityid', id);
                // Check favorite
                var isFavorite = listFavorites.indexOf(id) < 0 ? false : true;
                console.log('isFavorite', isFavorite );
                $('#add-favorite').data('favorite', isFavorite);
                if(isFavorite) $('#add-favorite i').removeClass('glyphicon-heart-empty');
                else $('#add-favorite i').addClass('glyphicon-heart-empty');
    
                $('#logo').attr('src', result.logo);
                if(result.user){
                    $('.data-name').html(result.user.fullname);
                    $('.data-email').html(result.user.email);
                }
                $('.data-school-type').html(result.school_type);
                $('.data-about').html(result.about);
                $('.data-country').html(result.country);
                $('.data-state').html(result.state);
                $('.data-city').html(result.city);
                $('.data-address').html(result.address);
                $('.data-year-of').html(result.year_of_establishment);
                $('.data-ratio').html(result.student_radio);
    
                $('.data-ranking').html(result.ranking);
                // $('.data-major').html(result.major);
                $('.data-tuition-fee').html(result.tuition_fee);
                $('.data-employment-rate').html(result.employment_rate);
                $('.data-degreee').html(result.degreee);
                $('.data-website').html(result.website);
                
                $('#detailModal').modal('show');
            })
            .fail(function() {
                alert( "Get info fail" );
            })
            .always(function() {
                $('#waiting').hide();
            });
        });
        // END VIEW DETAIL
        
        // Send message
        $('.send-message').click(function(e){
            e.preventDefault();
            e.stopPropagation();
          var universityID = $(this).closest('.get-info').data('id');
          $('#modalSendMessage input[name=student_id]').val(studentID);
          $('#modalSendMessage input[name=university_id]').val(universityID);
    
          $('#detailModal').modal('hide');
          $('#modalSendMessage').modal('show');
          
        });
    
        $('tr.get-info').click(function(){
            $this = $(this);
            $this.attr('data-status',1);
            $('#detail-title').html( $this.find('.title').html() );
            $('#detail-message').html( $this.find('.message').html() );
            $('#detail-file').html( $this.find('.file').html() );
            $('#detail-time').html( $this.find('.time').html() );
            $('#modalDetailMessage').modal('show');
    
            var messageID = $this.data('message-id');
            $.ajax({
                method: "GET",
                url: '{{ route('api.message.readMessage') }}',
                dataType: 'json',
                data: {
                  id : messageID
                }
            }).done(function(rs){
    
            }).fail(function(rs){
    
            }).always(function(){
    
            })
        });
    
        $('#tab3').click(function(){
            window.location = '{{ route("student.recruiting") }}?tab=3';
        });
    
        // $('table.mail').dataTable();
    })
    // END READY
    // 
    
    var _validFileExtensions = [".doc", ".docx", ".pdf", ".xls", ".xlsx", ".txt"];
    
    var maxSize = 2; //Mb 
    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            
             if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                 
                if (!blnValid) {
                    alert("Only supports the following file formats: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
    
            if( (oInput.files[0].size / 1048576) > maxSize ) {
              alert("Size limitation must less than " + maxSize + "Mb");
                    oInput.value = "";
                    return false;
            }
        }
        return true;
    }
</script>
@endsection