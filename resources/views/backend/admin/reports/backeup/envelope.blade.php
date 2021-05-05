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

                    <h4>সকল ইউনিয়নের খাম প্রিন্ট করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">ইউনিয়নের নাম</label>
                                <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                    <option value="">---নির্বাচন করুন---</option>
                                    @foreach($Union as $row)
                                        <option value="{{url('admin/envelope-print/'.$row->id)}}">{{$row->union_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->




@endsection
