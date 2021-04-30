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
        <li><a href="{{url('user/stock')}}"><i class="fa fa-university"></i> গুদামে মজুদকৃত চাউল</a></li>
        <li><a href="{{url('user/distribution/all')}}"> <i class="fa fa-share-square-o"></i> উপকারভোগী চাউল
                প্রদান
                করুন</a>
        </li>
        <li><a href="{{url('user/view-vgd-beneficiaries')}}"> <i class="fa fa-list"></i> উপকারভোগী তালিকা দেখুন</a></li>
        <li><a href="{{url('user/reports')}}"> <i class="fa fa-folder"></i>&nbsp;প্রতিবেদন</a>
        <li style="display:none;"><a href="{{url('user/view/notice')}}"> <i class="fa fa-list-ul"></i>নোটিশ দেখুন <sup><i>New</i></sup></a></li>
        <li style="display:none;"><a href="{{url('/')}}" target="_blank"> <i class="fa fa-globe"></i> মূল ওয়েবসাইট দেখুন</a></li>
    </ul>


</div><!-- leftpanel -->
