@extends('layouts.backend')
@section('title','জিআরক্যাশ উপকারভোগী')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4>দুরমুঠ ইউনিয়নের জিআরক্যাশ উপকারভোগী ভাতা প্রদান প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">জিআরক্যাশ উপকারভোগী ভাতা প্রদান করা হয়েছে</label>
                                <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জানুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">ফেবুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">মার্চ/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">এপ্রিল/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">মে/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জুন/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জুলাই/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">আগষ্ট/২০২১</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">জিআরক্যাশ উপকারভোগী ভাতা প্রদান করা হয় নি</label>
                                <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জানুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">ফেবুয়ারী/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">মার্চ/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">এপ্রিল/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">মে/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জুন/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">জুলাই/২০২১</option>
                                    <option value="{{url('admin/all-beneficiary-vgd-report')}}">আগষ্ট/২০২১</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
