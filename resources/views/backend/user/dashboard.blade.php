@extends('layouts.backend')
@section('title','Union Dashboard')
@section('content')
    <div class="mainpanel">
        @include('backend.include.pageheader_union')

        <div class="contentpanel">
            <div class="row">

            </div>
            <br>
            <div class="row row-stat">

                @foreach($stocks as $stock)

                    <div class="col-md-6">

                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> {{ $stock->year }}-{{ date('Y') }}</span>
                                        অর্থ বছরের ভিজিএফ</h5>
                                    <h2 class="mt5"><span style="font-family:SutonnyMJ;" >{{ $stock->total_bosta }}</span> টাকা</h2>
                                    <p style="font-size: 18px;">{{ $stock->union_name }} ইউনিয়ন</p>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়েছে</h5>

                                        <h4 class="nomargin"><span style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['distribution'] }}</span> টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়নি</h5>
                                        <h4 class="nomargin"><span style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['due_distribution'] }}</span> টাকা</h4>
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
