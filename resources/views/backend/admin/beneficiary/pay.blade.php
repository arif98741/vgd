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

                    <h4>ভিজিডি উপকারভোগী ভাতা প্রদান করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">মাসের নাম</label>
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
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->


        <div class="contentpanel">
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>নাম</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
                    <th>ইউনিয়ন</th>
                    <th>গ্রাম</th>
                    <th>ওয়ার্ড নং</th>
                    <th>মোবাইল নম্বর</th>
                    <th>একশন</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>45654654556</td>
                    <td>হাসানুজ্জামান কঞ্চন</td>
                    <td>করিম মন্ডল</td>
                    <td>করিমন বিবি</td>
                    <td>দুরমুঠ</td>
                    <td>হরিপুর</td>
                    <td>01</td>
                    <td>01777615690</td>
                    <td>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-hand-o-up"></i> গ্রহণ করুন</a>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>45654654556</td>
                    <td>হাসানুজ্জামান কঞ্চন</td>
                    <td>করিম মন্ডল</td>
                    <td>করিমন বিবি</td>
                    <td>দুরমুঠ</td>
                    <td>হরিপুর</td>
                    <td>01</td>
                    <td>01777615690</td>
                    <td>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-hand-o-up"></i> গ্রহণ করুন</a>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>45654654556</td>
                    <td>হাসানুজ্জামান কঞ্চন</td>
                    <td>করিম মন্ডল</td>
                    <td>করিমন বিবি</td>
                    <td>দুরমুঠ</td>
                    <td>হরিপুর</td>
                    <td>01</td>
                    <td>01777615690</td>
                    <td>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-hand-o-up"></i> গ্রহণ করুন</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
