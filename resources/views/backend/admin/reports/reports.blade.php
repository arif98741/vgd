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

                    <h4>সকল ইউনিয়নের ভিজিএফ উপকারভোগী ভাতা প্রদান প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <h3><a href="{{ url('admin/reports/all-months-dropdown') }}">সকল ইউনিয়নের প্রতিবেদন</a></h3>
                        <h3><a href="{{ url('admin/reports/union_wise_distributed') }}">ইউনিয়ন অনুযায়ী
                                বিতরণকৃত মাষ্টাররোল
                                <h3><a href="{{ url('admin/reports/union_wise_not_distributed') }}">ইউনিয়ন অনুযায়ী
                                        অবিতরণকৃত মাষ্টাররোল
                                    </a></h3>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
