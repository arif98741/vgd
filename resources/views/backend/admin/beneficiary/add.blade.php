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
                            <label class="control-label">গ্রাম</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং</label>
                            <input type="text" name="firstname" class="form-control" />
                        </div>
                    </div>

                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">আইডি নং</label>
                            <input type="text" name="firstname" class="form-control" />
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
                <button type="submit" class="btn btn-primary">সেভ</button>
            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
@endsection
