<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="{{asset('asset/backend/images/photos/profile.png')}}" height="50" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">মোঃ জহুরুল ইসলাম</h4>
            <small class="text-muted">অ্যাডমিন</small>
        </div>
    </div><!-- media -->


    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span></a></li>

        <li class="parent"><a href=""><i class="fa fa-users"></i> <span>ভিজিডি উপকারভোগী</span></a>
            <ul class="children">
                <li><a href="{{url('admin/add-vgd-beneficiary')}}">ভিজিডি উপকারভোগী সংযোজন</a></li>
                <li><a href="{{url('admin/view-vgd-beneficiary')}}">ভিজিডি উপকারভোগী তালিকা</a></li>
                <li><a href="client_report.php">গ্রাহক প্রতিবেদন</a></li>
            </ul>
        </li>


    </ul>


</div><!-- leftpanel -->
