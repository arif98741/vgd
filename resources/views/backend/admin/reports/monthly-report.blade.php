@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4>সকল ইউনিয়নের ভিজিডি উপকারভোগী ভাতা প্রদান প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">মাসের নাম</label>
                                <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">জানুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">ফেবুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">মার্চ/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">এপ্রিল/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">মে/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">জুন/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">জুলাই/২০২১</option>
                                    <option value="{{url('admin/all-union-vgd-report')}}">আগষ্ট/২০২১</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
