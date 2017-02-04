@extends('layouts.user')
@section('style')

@endsection
@section('content')
    <div class="advanced-search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 s-keyword">
                    <input type="text" id="keyword" class="form-control input-text-modify" placeholder="Scholarship name" />
                </div>
                <div class="col-sm-8 s-more">
                    <div class="col-sm-3 s-more-label">Scholarship category</div>
                    <div class="col-sm-9 s-more-div">
                        <button type="button" class="btn btn-default btn-modify btn-modify-active" >All</button>
                        <button type="button" class="btn btn-default btn-modify" >Matched</button>
                        <button type="button" class="btn btn-default btn-modify" >Favorite</button>
                        <input type="hidden" id="scholarshipCat" value="all">
                    </div>
                    <div class="col-sm-3 s-more-label">Type of scholarship</div>
                    <div class="col-sm-9 s-more-div">
                        <button type="button" class="btn btn-default btn-modify type_of_scholarship btn-modify-active" d="0">All</button>
                        <button type="button" class="btn btn-default btn-modify type_of_scholarship" d="1">Scholarship</button>
                        <button type="button" class="btn btn-default btn-modify type_of_scholarship" d="2">Non-interest Loan</button>
                        <button type="button" class="btn btn-default btn-modify type_of_scholarship" d="3">Loan</button>
                        <input type="hidden" id="type_of_scholarship" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row count-and-sort">
            <div class="col-sm-6">
                <span><span class="number-records">{{ $scholarships->count() }}</span> search results</span>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-4"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"><span>Sort by</span></div>
                <div class="col-sm-4">
                    <select class="form-control input-select">
                        <option value="0" selected>All</option>
                        <option>Applied</option>
                        <option>In Progress</option>
                        <option>Not Applied</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row school-list scholarship-list">
            @foreach($scholarships as $ss)
                <div class="col-sm-6">
                    <div class="school-child scholarship-child">
                        <?php $img_profile = isset($ss->sponsor) ? $ss->sponsor->img_profile : 'img/no-image.png'?>
                        <a href="/scholarship/detail/{{ $ss->id }}" class="avatar"><img src="/{{ $img_profile }}"></a>
                        <a href="/scholarship/detail/{{ $ss->id }}" class="title">
                            <h4>{{ $ss->name or '--' }}<span>International</span></h4>
                        </a>
                        <div class="clear"></div>
                        <div class="row">
                            <div class="col-sm-7">
                                <span class="child-label">Sponsor :</span> {{ $ss->sponsor ? $ss->sponsor->name : 'n/a' }}
                            </div>
                            <div class="col-sm-5 wrap-deadline">
                                <span class="deadline"><span title="Deadline" style="cursor:pointer">D</span>{{ $ss->deadline_format or '' }}</span>
                            </div>
                            <div class="col-sm-12">
                                <span class="child-label">Type :</span>
                                <?php
                                    $type_of_award = $ss->type_of_award ? $ss->type_of_award : 0;
                                    if($type_of_award == 1){
                                        echo('Scholarship');
                                    }elseif($type_of_award == 2){
                                        echo('No interest loan');
                                    }elseif($type_of_award == 3){
                                        echo('Loan');
                                    }else{
                                        echo('--');
                                    }
                                ?>
                            </div>
                            <div class="col-sm-12">
                                <span class="child-label">Amount :</span> {{$ss->amount or ''}} {{$ss->currency or ''}} / {{$ss->frequency or ''}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <span class="child-label" style="line-height:41px">Number of awards granted :</span> {{ $ss->number_of_awards_granted or 0 }}
                                {{--<span class="child-label">Applicable scholarship year :</span> {{ $ss->applicable_year or '--' }} - {{ $ss->applicable_year_max or '--' }}--}}
                            </div>
                            <div class="col-sm-5">
                                <a href="" class="child-heart"></a>
                                <button type="button" class="btn btn-default btn-modify">In Progess</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <input type="hidden" id="page" value="{{ $scholarships->currentPage() }}">
        <div class="col-sm-12" id="home-load-more">
            <button type = "button" class = "btn btn-default btn-modify btn-modify-active btn-load-more" onclick="loadMore()">Load more</button>
        </div>
    </div>
    <br /><br /><br />

@endsection
@section('js')
    <script type="text/javascript">
        $( "#keyword" ).bind('input' ,function( event ) {
            listScholarships();
        });

        $('.type_of_scholarship').on('click', function(e){
            $('.type_of_scholarship').removeClass('btn-modify-active');
            $(this).addClass('btn-modify-active');
            $('#type_of_scholarship').val($(this).attr('d'));
            listScholarships();
        });
        function listScholarships(){
            $('.sk-spinner-wave').show();
            var values = {};
            values['type_of_scholarship'] = $('#type_of_scholarship').val();
            values['keyword'] = $('#keyword').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                url: '/scholarship/list-ajax',
                type: 'POST',
                data: values,
                success: function (data) {
                    $('.scholarship-list').html(data);
                    $('.sk-spinner-wave').hide();
                    $('.number-records').html($('.scholarship-child').length);
                }
            });
        }
        function loadMore(){
            var values = {};
            $('.sk-spinner-wave').show();
            currentPage = $('#page').val();
            page = parseInt(currentPage) + 1;
            values["page"] = page;
            values['type_of_scholarship'] = $('#type_of_scholarship').val();
            values['keyword'] = $('#keyword').val();
            $.ajax({
                //headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                url: '/scholarship',
                type: 'GET',
                data: values,
                success: function (data) {
                    $('.scholarship-list').append(data);
                    $('#page').val(page);
                    $('.number-records').html($('.school-child').length);
                    $('.sk-spinner-wave').hide();
                }
            });
        }
    </script>
@endsection