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

            <form action="{{url('admin/add/stock')}}" method="post" >
                @csrf
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">মাস</label>
                                <select   data-placeholder="Choose One" name="month" class="form-control" required >
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="jan">জানুয়ারী</option>
                                    <option value="feb">ফেবুয়ারী</option>
                                    <option value="mar">মার্চ</option>
                                    <option value="apr">এপ্রিল</option>
                                    <option value="may">মে</option>
                                    <option value="jun">জুন</option>
                                    <option value="jul">জুলাই</option>
                                    <option value="aug">আগষ্ট</option>
                                    <option value="sep">সেপ্টেম্বর</option>
                                    <option value="oct">অক্টোবর </option>
                                    <option value="nov">নভেম্বর</option>
                                    <option value="dec">ডিসেম্বর </option>
                                </select>
                            </div><!-- form-group -->
                        </div><!-- col-sm-6 -->

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">বছর</label>
                                <select   data-placeholder="Choose One" name="year" class="form-control" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="2021">২০২১</option>
                                    <option value="2022">২০২২</option>
                                    <option value="2023">২০২৩ </option>
                                    <option value="2024">২০২৪  </option>
                                    <option value="2025">২০২৫  </option>
                                    <option value="2026">২০২৬</option>
                                    <option value="2027">২০২৭</option>
                                    <option value="2028">২০২৮</option>
                                    <option value="2029">২০২৯</option>
                                    <option value="2030">২০৩০</option>
                                </select>
                            </div><!-- form-group -->
                        </div><!-- col-sm-6 -->

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">পরিমাণ</label>
                                <input type="text" name="amount" class="form-control" required/>
                            </div>
                        </div>


                    </div>
                </div><!-- panel-body -->
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> সংরক্ষন</button>
                </div><!-- panel-footer -->
            </div><!-- panel -->
            </form>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
