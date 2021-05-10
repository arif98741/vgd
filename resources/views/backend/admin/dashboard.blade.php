@extends('layouts.backend')
@section('title','এডমিন ড্যাশবোর্ড')
@section('content')
    <div class="mainpanel">

        @include('backend.include.pageheader')

        <div class="contentpanel">
            <br>
            <div class="row row-stat">

                @foreach($stocks as $stock)

                    @php
                        $card = \App\Providers\HelperProvider::calculateCard($stock->union_id);
                    @endphp
                    <div class="col-md-4">
                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"></span> {{ $stock->union_name }}
                                        ইউনিয়ন <span
                                            style="font-family:SutonnyMJ; font-size: 20px;">{{ $stock->year }}</span> - <span
                                            style="font-family:SutonnyMJ; font-size: 20px;">{{ date('Y') }}</span></span>
                                        অর্থ বছরের ভিজিএফ</h5>
                                    <h2 class="mt5">বরাদ্দঃ <span
                                            style="font-family:SutonnyMJ; font-size: 30px;">{{ $stock->total_amount }}</span>
                                        টাকা </h2>
                                    <h4 class="mt5">বরাদ্দকৃত কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;">{{ $card['card']['total'] }}</span>
                                        টি<br> বিতরণকৃত কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;">{{ $card['card']['distributed'] }}</span>টি<br> অবিতরণকৃত
                                        কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;">{{ $card['card']['not_distributed'] }}</span>টি</h4>
                                </div><!-- media-body -->

                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়েছে</h5>

                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['distribution'] }}</span>
                                            টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়নি</h5>
                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['due_distribution'] }}</span>
                                            টাকা</h4>
                                    </div>
                                </div>

                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                @endforeach
            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
