@extends('layouts.backend')
@section('title','Admin Dashboard')
@section('content')
    <div class="mainpanel">

        @include('backend.include.pageheader')

        <div class="contentpanel">
            <br>
            <div class="row row-stat">

                @foreach($stocks as $stock)

                    <div class="col-md-4">

                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> {{ $stock->year }} - {{ date('Y') }}</span>
                                        অর্থবছরের
                                        ভিজিএফ</h5>
                                    <h2 class="mt5">মোটঃ <span
                                            style="font-family:SutonnyMJ; font-size: 30px;">{{ $stock->total_amount }}</span>
                                        টাকা </h2>
                                    <h3 class="mt5">কার্ড সংখ্যাঃ <span
                                            style="font-family:SutonnyMJ; font-size: 25px;">{{ $stock->number_of_card }}</span>
                                        টি </h3>

                                    <p>{{ $stock->union_name }} ইউনিয়ন</p>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">বিতরণ হয়েছে</h5>

                                        <h4  class="nomargin"><span style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['distribution'] }}</span>
                                            টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">বিতরণ হয়নি</h5>
                                        <h4 class="nomargin"><span style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['due_distribution'] }}</span>
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
