@extends('layouts.backend')
@section('title','গুদামে মাল মজুদ করুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>গুদামে মাল মজুদ করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> মাস/বছর</label>
                                <select   data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="">জানুয়ারী/২০২১</option>
                                    <option value="">ফেবুয়ারী/২০২১</option>
                                    <option value="">মার্চ/২০২১</option>
                                    <option value="">এপ্রিল/২০২১</option>
                                    <option value="">মে/২০২১</option>
                                    <option value="">জুন/২০২১</option>
                                    <option value="">জুলাই/২০২১</option>
                                    <option value="">আগষ্ট/২০২১</option>
                                </select>
                            </div><!-- form-group -->
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">পরিমাণ</label>
                                <input type="url" name="password" class="form-control" />
                            </div>
                        </div>


                    </div>
                </div><!-- panel-body -->
                <div class="panel-footer">
                    <button class="btn btn-primary"><i class="fa fa-check-circle"></i> সংরক্ষন</button>
                </div><!-- panel-footer -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
