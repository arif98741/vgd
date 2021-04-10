@extends('layouts.backend')
@section('title','Union Dashboard')
@section('content')
    <div class="mainpanel">
        @include('backend.include.pageheader_union')

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
                                <h5 class="md-title nomargin">জানুয়ারী/২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$janTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$janPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$janDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">ফেব্রুয়ারি/২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$febTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$febPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$febDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->




                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">মার্চ /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$marTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$marPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$marDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->





                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">এপ্রিল/২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$aprTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$aprPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$aprDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->





                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">মে/২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$mayTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$mayPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$mayDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->




                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">জুন /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$junTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$junPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$junDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->




                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">জুলাই /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$julTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$julPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$julDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->




                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">আগস্ট /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$augTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$augPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$augDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">সেপ্টেম্বর  /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$sepTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$sepPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$sepDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">অক্টোবর  /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$octTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$octPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$octDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">নভেম্বর  /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$novTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$novPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$novDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">
                                <h5 class="md-title nomargin">ডিসেম্বর  /২০২১ মাসের চাউল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">{{$decTotal}} বস্তা</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">চাউল গ্রহন করেছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$decPay}} বস্তা</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">চাউল বকেয়া আছে</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">{{$decDue}} বস্তা</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->





            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
