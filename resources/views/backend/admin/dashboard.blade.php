@extends('layouts.backend')
@section('title','Admin Dashboard')
@section('content')
    <div class="mainpanel">

        @include('backend.include.pageheader')

        <div class="contentpanel">
            <div class="row">

                <div class="col-md-4 pull-right">
                    <form action="{{ url('admin/dashboard') }}" method="get">
                        <select name="month" required class="form-control">
                            <option value="">মাস বাছাই করুন</option>
                            <option value="all" @if(array_key_exists('month',$_GET) && $_GET['month'] == 'all') selected
                                @endif>সকল মাস
                            </option>
                            @foreach($months as $key=> $month)
                                @if($key> date('n'))
                                    @php
                                        continue;
                                    @endphp
                                @endif
                                <option @if(array_key_exists('month',$_GET) && $_GET['month'] == $key) selected
                                        @endif value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn-sm btn-primary">দেখুন</button>
                    </form>
                </div>
            </div>
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

                                    <h5 class="md-title nomargin">
                                        {{ $monthBengali  }} <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> {{ $stock->year }}</span>-২০২২
                                        অর্থবছরের
                                        চাউল</h5>
                                    <h2 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} বস্তা</h2>
                                    <p style="18px;">{{ $stock->union_name }} ইউনিয়ন</p>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>

                                        <h4 style="font-family:SutonnyMJ;" class="nomargin">{{ \App\Providers\DistributionHelper::distributed($monthName, $stock->union_id,$stock->total_bosta)['distribution'] }} বস্তা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                        <h4 style="font-family:SutonnyMJ;" class="nomargin">{{ \App\Providers\DistributionHelper::distributed($monthName, $stock->union_id,$stock->total_bosta)['due_distribution'] }} বস্তা</h4>
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
