@extends('layouts.backend')
@section('title','Admin Dashboard')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="media-body">

                    <h4>ড্যাশবোর্ড</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            <div class="row row-stat">
                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                            <div class="media-body">
                                <h5 class="md-title nomargin">চলতি মাসের বিল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">8,102.32</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">গ্রহন</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">29,009.17</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">বকেয়া</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">99,103.67</h4>
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
                            <div class="panel-icon"><i class="fa fa-users"></i></div>
                            <div class="media-body">
                                <h5 class="md-title nomargin">গ্রাহক সংখ্যা</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">138,102</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin"> নিঃস্ক্রিয়</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">10,009</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin"> বন্ধ গ্রাহক</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">178,222</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->

                <div class="col-md-4">
                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" data-placement="left"
                                   title="Close Panel"><i class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                            <div class="media-body">
                                <h5 class="md-title nomargin">মোট বিল</h5>
                                <h2 style="font-family:SutonnyMJ;" class="mt5">153,900</h2>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin"> আদায়</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">144,009</h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin"> বকেয়া </h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">987,212</h4>
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
            </div><!-- row -->


            <div class="row">

                <div class="col-md-8">
                    <div class="panel panel-warning widget-todo">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a title="" data-toggle="tooltip" class="tooltips mr5" href=""
                                   data-original-title="Settings"><i class="glyphicon glyphicon-cog"></i></a>
                                <a title="" data-toggle="tooltip" class="tooltips" id="addnewtodo" href=""
                                   data-original-title="Add New"><i class="glyphicon glyphicon-plus"></i></a>
                            </div><!-- panel-btns -->
                            <h3 class="panel-title">নোট</h3>
                        </div>
                        <ul class="panel-body list-group nopadding">
                            <li class="list-group-item">
                                <div class="ckbox ckbox-default">
                                    <input type="checkbox" id="washcar" value="1">
                                    <label for="washcar"> পৌরসভা গেইট লাইন সংষ্কার</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="ckbox ckbox-default">
                                    <input type="checkbox" checked="checked" id="eatpizza" value="1">
                                    <label for="eatpizza">নতুন গ্রাহকদের বিল আদায়</label>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- col-md-8 -->

                <div class="col-md-4">
                    <div class="panel panel-warning widget-newsletter">
                        <div class="panel-heading">
                            <h4 class="panel-title">অভিযোগ/মন্তব্য</h4>
                        </div>
                        <div class="panel-body">

                            <input type="text" name="name" class="form-control mt10 mb10" value=""
                                   placeholder="মোবাইল নম্বর লিখুন"/>

                            <textarea class="form-control mb10" rows="3" id="comment">আপনার মন্তব্য লিখুন</textarea>
                            <button class="btn btn-primary btn-block"><i class="fa fa-send"> </i> Send</button>
                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-9 -->
            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
