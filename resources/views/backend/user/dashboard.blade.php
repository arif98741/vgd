@extends('layouts.backend')
@section('title',\App\User::getUnionName().' ইউনিয়ন ড্যাশবোর্ড')
@section('content')
    <div class="mainpanel">
        @include('backend.include.pageheader_union')

        <div class="contentpanel">
            <div class="row row-stat">

                @foreach($stocks as $stock)

                    <div class="col-md-3">

                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin">
                                        {{ $monthBengali  }} <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> {{ $stock->year }}</span>-২০২২
                                        অর্থ বছরের চাউল</h5>
                                    <h2 class="mt5"><span style="font-family:SutonnyMJ;">{{ $stock->total_bosta }}</span> বস্তা</h2>
                                    <p style="font-size: 16px;">{{  \App\Providers\HelperProvider::getBengaliName($stock->month)  }}</p>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>

                                        <h4 style="font-family:SutonnyMJ; font-size: 16px;"  class="nomargin">{{ \App\Providers\DistributionHelper::distributed($stock->month, $stock->union_id,$stock->total_bosta)['distribution'] }} বস্তা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                        <h4 style="font-family:SutonnyMJ;" class="nomargin">{{ \App\Providers\DistributionHelper::distributed($stock->month, $stock->union_id,$stock->total_bosta)['due_distribution'] }} বস্তা</h4>
                                    </div>
                                </div>

                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                @endforeach
            </div><!-- row -->
            <br>



        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
