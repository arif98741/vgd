@extends('layouts.backend')
@section('title','ভিজিএফ উপকারভোগী')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4>ভিজিএফ উপকারভোগী ভাতা প্রদান করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <h2 class="control-label text-center">মাসের নাম নির্বাচন করুন</h2>
                                <hr>
                                <a class="btn btn-primary" href="{{url('admin/january/distribution')}}">জানুয়ারি</a>
                                <a class="btn btn-success" href="{{url('admin/february/distribution')}}">ফেব্রুয়ারি</a>
                                <a class="btn btn-info" href="">মার্চ</a>
                                <a class="btn btn-danger" href="">এপ্রিল</a>
                                <a class="btn btn-primary" href="">মে</a>
                                <a class="btn btn-success" href="">জুন </a>
                                <a class="btn btn-info" href="">জুলাই</a>
                                <a class="btn btn-danger" href="">আগস্ট</a>
                                <a class="btn btn-primary" href="">সেপ্টেম্বর</a>
                                <a class="btn btn-success" href="">অক্টোবর</a>
                                <a class="btn btn-info" href="">নভেম্বর </a>
                                <a class="btn btn-danger" href="">ডিসেম্বর</a>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->




@endsection




