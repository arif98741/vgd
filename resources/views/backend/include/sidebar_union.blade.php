<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="{{asset('asset/backend/images/photos/profile.png')}}" height="50" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
            <small class="text-muted">ইউনিয়ন উদ্যোক্তা</small>
        </div>
    </div><!-- media -->


    <ul class="custom-menu">
        <li><a href="{{url('/user/dashboard')}}"><i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span></a></li>
        <li><a href="{{url('user/stock')}}"><i class="fa fa-university"></i> বরাদ্দকৃত অর্থের পরিমাণ</a></li>
        <li><a href="{{url('user/distribution')}}"> <i class="fa fa-share-square-o"></i> উপকারভোগী টাকা
                প্রদান
                করুন</a>
        <li><a href="{{url('user/reports')}}"> <i class="fa fa-folder"></i>&nbsp;প্রতিবেদন দেখুন</a>
        </li>
        <li><a href="{{url('user/view-vgd-beneficiaries')}}"> <i class="fa fa-list"></i> উপকারভোগী তালিকা</a></li>
    </ul>


</div><!-- leftpanel -->
