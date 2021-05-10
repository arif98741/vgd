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
                    <h4>ইউনিয়ন অনুযায়ী বিতরণকৃত মাষ্টাররোল</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url()->current() }}" method="get">
                        <div class="row">

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন বাছাই করুন</label>
                                    <select name="union_id" data-placeholder="Choose One"
                                            class="form-control">
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach( $unions as $key=>  $union)
                                            <option
                                                value="{{ $union->id }}">{{ $union->union_name }}
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
