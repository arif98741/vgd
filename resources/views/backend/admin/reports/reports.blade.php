@extends('layouts.backend')
@section('title','প্রতিবেদন')
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
                        <h3><a href="{{ url('admin/reports/all-months-dropdown') }}">সকল মাসের প্রতিবেদন</a></h3>
                        <h3><a href="{{ url('admin/reports/all-union-wise-beneficiaries-dropdown') }}">ইউনিয়ন অনুযায়ী বিতরণকৃত উপকারভোগীর তালিকা</a></h3>
                        <h3><a href="{{ url('admin/reports/not-distributed') }}">ইউনিয়ন অনুযায়ী অবিতরণকৃত উপকারভোগীর তালিকা</a></h3>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
