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
                    <h4>দুরমুঠ ইউনিয়নের ভিজিডি উপকারভোগী ভাতা প্রদান প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <form action="">
                                <div class="form-group">
                                    <label class="control-label">মাস বাছাই করুন</label>
                                    <select data-placeholder="Choose One" onchange="location = this.value;"
                                            class="form-control"
                                            onchange="location = this.value;">
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach( $months as $key=>  $month)

                                            <option
                                                value="{{ url('admin/reports/all-months-dropdown/?month='.$key) }}">{{ $month }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </form>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
