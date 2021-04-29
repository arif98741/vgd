@extends('layouts.backend')
@section('title','প্রতিবেদন দেখুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4>{{ \App\User::getUnionName() }} ইউনিয়ন প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <h3><a href="{{ url('user/reports/all-union-wise-beneficiaries-dropdown') }}"> বিতরণকৃত উপকারভোগীর তালিকা</a></h3>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
