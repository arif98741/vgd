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
                                <label class="control-label">ইউনিয়ন</label>
                                <select   data-placeholder="Choose One" name="month" class="form-control" required >
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="jan">দুরমুঠ</option>
                                    <option value="feb">কুলিয়া</option>
                                    <option value="mar">মাহমুদপুর</option>
                                    <option value="apr">নাংলা</option>
                                    <option value="may">নয়ানগর</option>
                                    <option value="jun">আদ্রা</option>
                                    <option value="jul">চরবানীপাকুরিয়া</option>
                                    <option value="aug">ফুলকোচা</option>
                                    <option value="sep">ঘোষেরপাড়া</option>
                                    <option value="oct">ঝাউগড়া </option>
                                    <option value="nov">শ্যামপুর</option>
                                </select>
                            </div><!-- form-group -->
                        </div><!-- col-sm-6 -->

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
                                <label class="control-label">অর্থ বছর</label>
                                <select   data-placeholder="Choose One" name="year" class="form-control" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                    <option value="2021">২০২১-২০২২</option>
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
