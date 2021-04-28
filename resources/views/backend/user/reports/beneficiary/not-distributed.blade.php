@extends('layouts.backend')
@section('title','মাস অনুযায়ী অবিতরণকৃত উপকারভোগীর তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">
                    <h4>মাস অনুযায়ী অবিতরণকৃত উপকারভোগীর তালিকা
                    </h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url('user/reports/not-distributed') }}" method="get">
                        <div class="row">

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="control-label">মাস বাছাই করুন</label>
                                    <select name="month" data-placeholder="Choose One"
                                            class="form-control">
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach( $months as $key=>  $month)
                                            <option
                                                value="{{ $key }}">{{ $month }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">

                                <button type="submit" class="btn btn-primary">প্রতিবেদন দেখুন</button>

                            </div>
                        </div>
                    </form>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
