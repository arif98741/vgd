@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী সংযোজন')
@section('content')
    <div class="mainpanel">
        <div class="contentpanel">

            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>
                            <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="">দুরমুঠ</option>
                                <option value="">কুলিয়া</option>
                                <option value="">নাংলা</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং</label>
                            <select data-placeholder="Choose One" class="form-control" onchange="location = this.value;">
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ছবি (সর্বচ্চ ৫০ কে.বি)</label>
                            <input type="file" name="Photo" class="form-control" />
                        </div><!-- form-group -->
                    </div>


                </div>
                <button type="submit" class="btn btn-primary">সংরক্ষন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
@endsection
