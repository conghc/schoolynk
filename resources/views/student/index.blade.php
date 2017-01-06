@extends('layouts.user')
@section('style')
<meta name="_token" content="{!! csrf_token() !!}"/>
<style type="text/css">
    .cur-p{
    cursor: pointer;
    }
    * {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    }
    .fa-times-circle-o {
        color: #920a27;
        font-size: 2.4em;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
@if($mgsUnread)
<section>
    <div class="news-area">
        <div class="inner inner-md-1 table">
            <span class="title">{{ trans('label.notice') }}</span>
            <ul class="news-items">
                <li>
                    <a href="{{ route('student.recruiting') }}?tab=2">{{ trans('label.unread_email') }} {{ $mgsUnread }} {{ trans('label.there_matter') }}</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endif
<section>
    <div class="inner inner-md-1">
        <div class="section-ui">
            <div class="section-ui-header">
                <h2 class="section-ui-title">{{ trans('label.benefit_scholarship_list') }}<small>（{{ trans('label.all') }}<span class="total">{{ $count }}</span>{{ trans('label.matter') }})</small></h2>
                <div class="select-box">
                    <ul>
                        <li>
                            <select name="" class="select-styled sort-amount">
                                <option value="" selected="selected">{{ trans('label.the_amount_of_support') }}</option>
                                <option value="1">{{ trans('label.rise') }}</option>
                                <option value="2">{{ trans('label.down') }}</option>
                            </select>
                        </li>
                        <li>
                            <select name="" class="select-styled sort-status">
                                <option value="0" selected="selected">{{ trans('label.application_situation') }}</option>
                                <option value="1">{{ trans('label.not_offered') }}</option>
                                <option value="2">{{ trans('label.applied_raised_in') }}</option>
                                <option value="3">{{ trans('label.subcribed') }}</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
                $schoolarshipArr = [];
                $statusArr = [];
                foreach(Auth::user()->schoolarships as $value){
                    $schoolarshipArr[] = $value->schoolarship_id;
                    $statusArr[] = $value->status;
                }
            ?>
            <ul class="ui-tabs clf">
                <li id="tab1" class="tab active table-cell">
                    <a href="#cont1">{{ trans('label.payment_type') }}<br>{{ trans('label.not_return') }}</a>
                </li>
                <li id="tab2" class="tab table-cell">
                    <a href="#cont2">{{ trans('label.loan_type') }}<br>{{ trans('label.interest_mu') }}</a>
                </li>
                <li id="tab3" class="tab table-cell">
                    <a href="#cont3">{{ trans('label.loan_type') }}<br>{{ trans('label.lee_has_a_child') }}</a>
                </li>
                <li id="tab4" class="tab table-cell">
                    <a href="#cont4">{{ trans('label.list_favorite') }}</a>
                </li>
            </ul>
            <div class="panels st-schoolarships">
                <div id="cont1" class="panel active">
                    <table class="table table-loan tb-01">
                        <thead>
                            <tr>
                                <th class="title">{{ trans('label.organization_name') }}</th>
                                <th class="cost">{{ trans('label.payment_target') }}</th>
                                <th>{{ trans('label.payment_amount') }}</th>
                                <th>{{ trans('label.benefit_period') }}</th>
                                <th>{{ trans('label.acquisition') }}<br>{{ trans('label.difficulty') }}</th>
                                <th>{{ trans('label.screening_method') }}</th>
                                <th>{{ trans('label.application_deadline') }}</th>
                                <th>{{ trans('label.application_situation') }}</th>
                                <th>{{ trans('label.detail_and_application') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nonRefun as $schoolarship)
                            <tr>
                                <organization_namebel="">
                                    <span class="loan-type">
                                        <a href="/schoolynk-detailpage/{{$schoolarship->id}}">{{ $schoolarship->name }}</a>
                                    </span>
                                    <span class="loan-name">
                                    <a href="">{{ $schoolarship->oranization }}</a>
                                    </span>
                                </td>
                                <?php
                                    /**
                                     * Get img covering_cost
                                     */
                                    $img = 'icon-cost1.png';
                                    $c1 = array_search(1,$schoolarship->covering_cost) !== false;
                                    $c2 = array_search(2,$schoolarship->covering_cost) !== false;
                                    $c3 = array_search(3,$schoolarship->covering_cost) !== false;
                                    if($c1 && !$c2 && !$c3) $img = 'icon-cost4.png';
                                    if(!$c1 && $c2 && !$c3) $img = 'icon-cost6.png';
                                    if(!$c1 && !$c2 && $c3) $img = 'icon-cost7.png';
                                    
                                    if($c1 && $c2 && !$c3) $img = 'icon-cost2.png';
                                    if($c1 && !$c2 && $c3) $img = 'icon-cost3.png';
                                    if(!$c1 && $c2 && $c3) $img = 'icon-cost5.png';
                                    
                                    if($c1 && $c2 && $c3) $img = 'icon-cost1.png';
                                    ?>
                                <td data-label="{{ trans('label.organizpayment_target') }}">
                                    <span class="icon-wrap">
                                    <img src="./images/{{ $img }}" alt="" class="icon-cost">
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.organizpayment_amount') }}">
                                    <div class="dp-il">{{ $schoolarship->amount_currency }}</div>
                                    <div class="dp-il">{{ $schoolarship->currency }} / </div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 0 ? 'Monthly' : '' }}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 1 ? 'Annually' : ''}}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 2 ? 'One shot' : ''}}</div>
                                </td>
                                <td data-label="{{ trans('label.organizbenefit_period') }}">
                                    @if($schoolarship->benefit_period_year > 0)
                                    <span>{{ $schoolarship->benefit_period_year }} {{ trans('label.year') }} </span>
                                    @endif
                                    @if($schoolarship->benefit_period_month > 0)
                                    <span>{{ $schoolarship->benefit_period_month }} {{ trans('label.month') }}</span>
                                    @endif
                                </td>
                                <?php
                                    $competition = $schoolarship->competition;
                                ?>
                                <td data-label="{{ trans('label.acquisition_difficulty') }}">
                                    <span class="icon-wrap">
                                        <img src="./images/icon-star{{ $schoolarship->competition ? $schoolarship->competition : '1'}}.png" alt="" class="icon-star">
                                        <span class="review">
                                            @if ($competition == 3)
                                                {{ trans('label.difficult') }}
                                            @elseif ($competition == 2)
                                                {{ trans('label.ordinary') }}
                                            @elseif ($competition == 1)
                                                {{ trans('label.easy') }}
                                            @else
                                            @endif
                                        </span>
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.screening_method') }}">
                                    @if($schoolarship->process)
                                    @foreach($schoolarship->process as $process)
                                        @if ($process == 1)
                                            {{ trans('label.doccument') }}, 
                                        @elseif ($process == 2)
                                            {{ trans('label.interview') }}, 
                                        @elseif ($process == 3)
                                            {{ trans('label.scribe') }}.
                                        @else
                                        @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td data-label="{{ trans('label.application_deadline') }}">{{ $schoolarship->date_app_end }}</td>
                                <?php
                                    /**
                                    * Get status for schoolarship
                                    */
                                    $key = array_search($schoolarship->id, $schoolarshipArr);                          
                                    $status = $key === false ? 0 : $statusArr[$key];
                                    ?>
                                <td data-label="{{ trans('label.application_situation') }}" >
                                    <select name="s_status" class="select-styled filler" data-schoolarship-id="{{ $schoolarship->id }}">
                                    <option value="1" {{ $status == 1 ? 'selected' : ''}}>{{ trans('label.not_offered') }}</option>
                                    <option value="2" {{ $status == 2 ? 'selected' : ''}}>{{ trans('label.applied_raised_in') }}</option>
                                    <option value="3" {{ $status == 3 ? 'selected' : ''}}>{{ trans('label.subcribed') }}</option>
                                    </select>
                                </td>
                                <td data-label="{{ trans('label.detail_and_application') }}"><a href="{{ $schoolarship->url }}" class="btn" target="_blank"><span>{{ trans('label.to_the_organization_site') }}<i class="icon icon-blank"></i></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="cont2" class="panel">
                    <table class="table table-loan tb-02">
                        <thead>
                            <tr>
                                <th class="title">{{ trans('label.organization_name') }}</th>
                                <th class="cost">{{ trans('label.payment_target') }}</th>
                                <th>{{ trans('label.payment_amount') }}</th>
                                <th>{{ trans('label.benefit_period') }}</th>
                                <th>{{ trans('label.acquisition') }}<br>{{ trans('label.difficulty') }}</th>
                                <th>{{ trans('label.screening_method') }}</th>
                                <th>{{ trans('label.application_deadline') }}</th>
                                <th>{{ trans('label.application_situation') }}</th>
                                <th>{{ trans('label.detail_and_application') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refun as $schoolarship)
                            <tr>
                                <organization_namebel="">
                                    <span class="loan-type">{{ $schoolarship->name }}</span>
                                    <span class="loan-name">
                                    <a href="">{{ $schoolarship->oranization }}</a>
                                    </span>
                                </td>
                                <?php
                                    /**
                                     * Get img covering_cost
                                     */
                                    $img = 'icon-cost1.png';
                                    $c1 = array_search(1,$schoolarship->covering_cost) !== false;
                                    $c2 = array_search(2,$schoolarship->covering_cost) !== false;
                                    $c3 = array_search(3,$schoolarship->covering_cost) !== false;
                                    if($c1 && !$c2 && !$c3) $img = 'icon-cost4.png';
                                    if(!$c1 && $c2 && !$c3) $img = 'icon-cost6.png';
                                    if(!$c1 && !$c2 && $c3) $img = 'icon-cost7.png';
                                    
                                    if($c1 && $c2 && !$c3) $img = 'icon-cost2.png';
                                    if($c1 && !$c2 && $c3) $img = 'icon-cost3.png';
                                    if(!$c1 && $c2 && $c3) $img = 'icon-cost5.png';
                                    
                                    if($c1 && $c2 && $c3) $img = 'icon-cost1.png';
                                    ?>
                                <td data-label="{{ trans('label.payment_target') }}">
                                    <span class="icon-wrap">
                                    <img src="./images/{{ $img }}" alt="" class="icon-cost">
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.payment_amount') }}">
                                    <div class="dp-il">{{ $schoolarship->amount_currency }}</div>
                                    <div class="dp-il">{{ $schoolarship->currency }} / </div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 0 ? 'Monthly' : '' }}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 1 ? 'Annually' : ''}}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 2 ? 'One shot' : ''}}</div>
                                </td>
                                <td data-label="{{ trans('label.benefit_period') }}">
                                    @if($schoolarship->benefit_period_year > 0)
                                    <span>{{ $schoolarship->benefit_period_year }} {{ trans('label.year') }} </span>
                                    @endif
                                    @if($schoolarship->benefit_period_month > 0)
                                    <span>{{ $schoolarship->benefit_period_month }} {{ trans('label.month') }}</span>
                                    @endif
                                </td>
                                <?php
                                    $competition = $schoolarship->competition;
                                ?>
                                <td data-label="{{ trans('label.acquisition_difficulty') }}">
                                    <span class="icon-wrap">
                                        <img src="./images/icon-star{{ $schoolarship->competition ? $schoolarship->competition : '1'}}.png" alt="" class="icon-star">
                                        <span class="review">
                                            @if ($competition == 3)
                                                {{ trans('label.difficult') }}
                                            @elseif ($competition == 2)
                                                {{ trans('label.ordinary') }}
                                            @elseif ($competition == 1)
                                                {{ trans('label.easy') }}
                                            @else
                                            @endif
                                        </span>
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.screening_method') }}">
                                    @if($schoolarship->process)
                                    @foreach($schoolarship->process as $process)
                                        @if ($process == 1)
                                            {{ trans('label.doccument') }}, 
                                        @elseif ($process == 2)
                                            {{ trans('label.interview') }}, 
                                        @elseif ($process == 3)
                                            {{ trans('label.scribe') }}.
                                        @else
                                        @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td data-label="{{ trans('label.application_deadline') }}">{{ $schoolarship->date_app_end }}</td>
                                <?php
                                    /**
                                    * Get status for schoolarship
                                    */
                                    $key = array_search($schoolarship->id, $schoolarshipArr);                          
                                    $status = $key === false ? 0 : $statusArr[$key];
                                    ?>
                                <td data-label="{{ trans('label.detail_and_aapplication_situation') }}" >
                                    <select name="s_status" class="select-styled filler" data-schoolarship-id="{{ $schoolarship->id }}">
                                    <option value="1" {{ $status == 1 ? 'selected' : ''}}>{{ trans('label.not_offered') }}</option>
                                    <option value="2" {{ $status == 2 ? 'selected' : ''}}>{{ trans('label.applied_raised_in') }}</option>
                                    <option value="3" {{ $status == 3 ? 'selected' : ''}}>{{ trans('label.subcribed') }}</option>
                                    </select>
                                </td>
                                <td data-label="{{ trans('label.detail_and_application') }}"><a href="{{ $schoolarship->url }}" class="btn" target="_blank"><span>{{ trans('label.to_the_organization_site') }}<i class="icon icon-blank"></i></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="cont3" class="panel">
                    <table class="table table-loan tb-03">
                        <thead>
                            <tr>
                                <th class="title">{{ trans('label.organization_name') }}</th>
                                <th class="cost">{{ trans('label.payment_target') }}</th>
                                <th>{{ trans('label.payment_amount') }}</th>
                                <th>{{ trans('label.benefit_period') }}</th>
                                <th>{{ trans('label.acquisition') }}<br>{{ trans('label.difficulty') }}</th>
                                <th>{{ trans('label.screening_method') }}</th>
                                <th>{{ trans('label.application_deadline') }}</th>
                                <th>{{ trans('label.application_situation') }}</th>
                                <th>{{ trans('label.detail_and_application') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refunwith as $schoolarship)
                            <tr>
                                <td data-label="{{ trans('label.organization_name') }}">
                                    <span class="loan-type">{{ $schoolarship->name }}</span>
                                    <span class="loan-name">
                                    <a href="">{{ $schoolarship->oranization }}</a>
                                    </span>
                                </td>
                                <?php
                                    /**
                                     * Get img covering_cost
                                     */
                                    $img = 'icon-cost1.png';
                                    $c1 = array_search(1,$schoolarship->covering_cost) !== false;
                                    $c2 = array_search(2,$schoolarship->covering_cost) !== false;
                                    $c3 = array_search(3,$schoolarship->covering_cost) !== false;
                                    if($c1 && !$c2 && !$c3) $img = 'icon-cost4.png';
                                    if(!$c1 && $c2 && !$c3) $img = 'icon-cost6.png';
                                    if(!$c1 && !$c2 && $c3) $img = 'icon-cost7.png';
                                    
                                    if($c1 && $c2 && !$c3) $img = 'icon-cost2.png';
                                    if($c1 && !$c2 && $c3) $img = 'icon-cost3.png';
                                    if(!$c1 && $c2 && $c3) $img = 'icon-cost5.png';
                                    
                                    if($c1 && $c2 && $c3) $img = 'icon-cost1.png';
                                    ?>
                                <td data-label="{{ trans('label.payment_target') }}">
                                    <span class="icon-wrap">
                                    <img src="./images/{{ $img }}" alt="" class="icon-cost">
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.payment_amount') }}">
                                    <div class="dp-il">{{ $schoolarship->amount_currency }}</div>
                                    <div class="dp-il">{{ $schoolarship->currency }} / </div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 0 ? 'Monthly' : '' }}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 1 ? 'Annually' : ''}}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 2 ? 'One shot' : ''}}</div>
                                </td>
                                <td data-label="{{ trans('label.benefit_period') }}">
                                    @if($schoolarship->benefit_period_year > 0)
                                    <span>{{ $schoolarship->benefit_period_year }} {{ trans('label.year') }} </span>
                                    @endif
                                    @if($schoolarship->benefit_period_month > 0)
                                    <span>{{ $schoolarship->benefit_period_month }} {{ trans('label.month') }}</span>
                                    @endif
                                </td>
                                <?php
                                    $competition = $schoolarship->competition;
                                ?>
                                <td data-label="{{ trans('label.acquisition_difficulty') }}">
                                    <span class="icon-wrap">
                                        <img src="./images/icon-star{{ $schoolarship->competition ? $schoolarship->competition : '1'}}.png" alt="" class="icon-star">
                                        <span class="review">
                                            @if ($competition == 3)
                                                {{ trans('label.difficult') }}
                                            @elseif ($competition == 2)
                                                {{ trans('label.ordinary') }}
                                            @elseif ($competition == 1)
                                                {{ trans('label.easy') }}
                                            @else
                                            @endif
                                        </span>
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.screening_method') }}">
                                    @if($schoolarship->process)
                                    @foreach($schoolarship->process as $process)
                                        @if ($process == 1)
                                            {{ trans('label.doccument') }}, 
                                        @elseif ($process == 2)
                                            {{ trans('label.interview') }}, 
                                        @elseif ($process == 3)
                                            {{ trans('label.scribe') }}.
                                        @else
                                        @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td data-label="{{ trans('label.application_deadline') }}">{{ $schoolarship->date_app_end }}</td>
                                <?php
                                    /**
                                    * Get status for schoolarship
                                    */
                                    $key = array_search($schoolarship->id, $schoolarshipArr);                          
                                    $status = $key === false ? 0 : $statusArr[$key];
                                    ?>
                                <td data-label="{{ trans('label.application_situation') }}" >
                                    <select name="s_status" class="select-styled filler" data-schoolarship-id="{{ $schoolarship->id }}">
                                    <option value="1" {{ $status == 1 ? 'selected' : ''}}>{{ trans('label.not_offered') }}</option>
                                    <option value="2" {{ $status == 2 ? 'selected' : ''}}>{{ trans('label.applied_raised_in') }}</option>
                                    <option value="3" {{ $status == 3 ? 'selected' : ''}}>{{ trans('label.subcribed') }}</option>
                                    </select>
                                </td>
                                <td data-label="{{ trans('label.detail_and_application') }}"><a href="{{ $schoolarship->url }}" class="btn" target="_blank"><span>{{ trans('label.to_the_organization_site') }}<i class="icon icon-blank"></i></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="cont4" class="panel">
                    <table class="table table-loan tb-01">
                        <thead>
                            <tr>
                                <th class="title">{{ trans('label.organization_name') }}</th>
                                <th class="cost">{{ trans('label.payment_target') }}</th>
                                <th>{{ trans('label.payment_amount') }}</th>
                                <th>{{ trans('label.benefit_period') }}</th>
                                <th>{{ trans('label.acquisition') }}<br>{{ trans('label.difficulty') }}</th>
                                <th>{{ trans('label.screening_method') }}</th>
                                <th>{{ trans('label.application_deadline') }}</th>
                                <th>{{ trans('label.application_situation') }}</th>
                                <th>{{ trans('label.detail_and_application') }}</th>
                                <th>{{ trans('label.delete_favorite_btn') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($favoriteSchoolarships as $schoolarship)
                            <tr id="schoolar-{{ $schoolarship->id }}">
                                <td data-label="{{ trans('label.organization_name') }}">
                                    <span class="loan-type">
                                        <a href="{{ route('schoolarship.detail', ['id' => $schoolarship->id]) }}">{{ $schoolarship->name }}</a>
                                    </span>
                                    <span class="loan-name">
                                    <a href="">{{ $schoolarship->oranization }}</a>
                                    </span>
                                </td>
                                <?php
                                    /**
                                     * Get img covering_cost
                                     */
                                    $img = 'icon-cost1.png';
                                    $c1 = array_search(1,$schoolarship->covering_cost) !== false;
                                    $c2 = array_search(2,$schoolarship->covering_cost) !== false;
                                    $c3 = array_search(3,$schoolarship->covering_cost) !== false;
                                    if($c1 && !$c2 && !$c3) $img = 'icon-cost4.png';
                                    if(!$c1 && $c2 && !$c3) $img = 'icon-cost6.png';
                                    if(!$c1 && !$c2 && $c3) $img = 'icon-cost7.png';
                                    
                                    if($c1 && $c2 && !$c3) $img = 'icon-cost2.png';
                                    if($c1 && !$c2 && $c3) $img = 'icon-cost3.png';
                                    if(!$c1 && $c2 && $c3) $img = 'icon-cost5.png';
                                    if($c1 && $c2 && $c3) $img = 'icon-cost1.png';
                                    ?>
                                <td data-label="{{ trans('label.payment_target') }}">
                                    <span class="icon-wrap">
                                    <img src="./images/{{ $img }}" alt="" class="icon-cost">
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.payment_amount') }}">
                                    <div class="dp-il">{{ $schoolarship->amount_currency }}</div>
                                    <div class="dp-il">{{ $schoolarship->currency }} / </div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 0 ? 'Monthly' : '' }}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 1 ? 'Annually' : ''}}</div>
                                    <div class="dp-il">{{ $schoolarship->amount_paid == 2 ? 'One shot' : ''}}</div>
                                </td>
                                <td data-label="{{ trans('label.benefit_period') }}">
                                    @if($schoolarship->benefit_period_year > 0)
                                    <span>{{ $schoolarship->benefit_period_year }} {{ trans('label.year') }} </span>
                                    @endif
                                    @if($schoolarship->benefit_period_month > 0)
                                    <span>{{ $schoolarship->benefit_period_month }} {{ trans('label.month') }}</span>
                                    @endif
                                </td>
                                <?php
                                    $competition = $schoolarship->competition;
                                ?>
                                <td data-label="{{ trans('label.acquisition_difficulty') }}">
                                    <span class="icon-wrap">
                                        <img src="./images/icon-star{{ $schoolarship->competition ? $schoolarship->competition : '1'}}.png" alt="" class="icon-star">
                                        <span class="review">
                                            @if ($competition == 3)
                                                {{ trans('label.difficult') }}
                                            @elseif ($competition == 2)
                                                {{ trans('label.ordinary') }}
                                            @elseif ($competition == 1)
                                                {{ trans('label.easy') }}
                                            @else
                                            @endif
                                        </span>
                                    </span>
                                </td>
                                <td data-label="{{ trans('label.screening_method') }}">
                                    @if($schoolarship->process)
                                    @foreach($schoolarship->process as $process)
                                        @if ($process == 1)
                                            {{ trans('label.doccument') }}, 
                                        @elseif ($process == 2)
                                            {{ trans('label.interview') }}, 
                                        @elseif ($process == 3)
                                            {{ trans('label.scribe') }}.
                                        @else
                                        @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td data-label="{{ trans('label.application_deadline') }}">{{ $schoolarship->date_app_end }}</td>
                                <?php
                                    /**
                                    * Get status for schoolarship
                                    */
                                    $key = array_search($schoolarship->id, $schoolarshipArr);                          
                                    $status = $key === false ? 0 : $statusArr[$key];
                                    ?>
                                <td data-label="{{ trans('label.application_situation') }}" >
                                    <select name="s_status" class="select-styled filler" data-schoolarship-id="{{ $schoolarship->id }}">
                                    <option value="1" {{ $status == 1 ? 'selected' : ''}}>{{ trans('label.not_offered') }}</option>
                                    <option value="2" {{ $status == 2 ? 'selected' : ''}}>{{ trans('label.applied_raised_in') }}</option>
                                    <option value="3" {{ $status == 3 ? 'selected' : ''}}>{{ trans('label.subcribed') }}</option>
                                    </select>
                                </td>
                                <td data-label="{{ trans('label.detail_and_application') }}">
                                    <a href="{{ $schoolarship->url }}" class="btn" target="_blank">
                                        <span>
                                            {{ trans('label.to_the_organization_site') }}
                                        </span>
                                    </a>
                                </td>
                                <td data-label="Action" class="text-center">
                                    <i class="fa fa-times-circle-o removeFavorite" aria-hidden="true" data-student="{{ \Auth::user()->id }}" data-schoolar="{{ $schoolarship->id }}"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="inner inner-md-1">
    <a href="{{ route('student.save-status-schoolarship') }}" name="save" value="" class="btn btn-large btn-save cur-p">{{ trans('label.to_save_application_status') }}<i class="fa fa-angle-right fa-lg"></i>
    </a>
    @if($schoolarships->count() > 1)
    <div class="page-navigation">
        <a class="previous postlink" rel="prev" href=""><i class="fa fa-angle-left fa-1x"></i></a>
        <a class="current" href="#">1</a>
        <a class="next postlink" rel="next" href=""><i class="fa fa-angle-right fa-1x"></i></a>
    </div>
    @endif
    </diuv>
</section>
<input type="hidden" id="user_token" value="{{ Auth::user()->remember_token }}">
@endsection
@section('js')
<script type="text/javascript">
    $(function(){
    
    
        $('.sort-status').change(function(){
            var val = $(this).val();
            $('.filler').each(function(key, el){
                var tr = $(el).closest('tr');
                if($(el).val() == val || val == 0){
                  tr.show();
                }else{
                  tr.hide();
                }
            });
        })
    
        $('select[name=s_status]').change(function(){
            var id = $(this).data('schoolarship-id');
            var token = $('#user_token').val();
            var status = $(this).val();
            $.ajax({
                url: '{{ route('student.update-status-schoolarship') }}',
                data: { id: id, token: token, status: status},
                dataType: 'json'
            }).done(function() {
                console.log( "success" );
            })
            .fail(function() {
                console.log( "error" );
            })
        });
    })
    // End Ready
    
</script>
<script type="text/javascript">
    $(document).ready(function() {

        // Remove favorite
        $(".removeFavorite").click(function (e) {
            
            if (!confirm('{{ trans('label.confirm_delete_favorite_msg') }}')) return;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            e.preventDefault(); 

            var dataInput = {};
            dataInput.studentId  = $(this).data('student');
            dataInput.schoolarId = $(this).data('schoolar');

            $.ajax({

                type: 'POST',
                url: '/api/student/removeFavorite',
                data: dataInput,
                dataType: 'json',
                success: function (data) {
                    if (data.status != 0) {
                        alert('{{ trans('label.delete_favorite_success_msg') }}');
                        $('#schoolar-' + dataInput.schoolarId).empty();
                    } else if (data.status == -1) {
                        alert('{{ trans('label.favorite_not_exists_msg') }}');
                    } else {
                        alert('{{ trans('label.delete_favorite_faild_msg') }}');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
@endsection