@extends('layouts.backend')
@section('title','Admin Dashboard')
@section('content')
    <div class="mainpanel">
        @include('backend.include.pageheader')

        <div class="contentpanel">

            <div class="row row-stat">

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">জানুয়ারী/২০২১-২০২২ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">1 বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">10 বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">15 বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->


            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
