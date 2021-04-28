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


    <ul class="custom-menu">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span></a></li>
        <li><a href="{{url('admin/add-vgd-beneficiary')}}"> <i class="fa fa-plus"></i> উপকারভোগী সংযোজন</a></li>
        <li><a href="{{url('admin/upload-beneficiary-vgd')}}"> <i class="fa fa-upload"></i> উপকারভোগী আপলোড</a></li>
        <li><a href="{{url('admin/stock-beneficiary-vgd')}}"><i class="fa fa-pencil"></i> গুদামে মাল মজুদ করুন</a></li>
        <li><a href="{{url('admin/distribution/'.date('n'))}}"> <i class="fa fa-share-square-o"></i> উপকারভোগী চাউল প্রদান করুন</a></li>
        <li><a href="{{url('admin/view-vgd-beneficiaries')}}"> <i class="fa fa-list"></i> উপকারভোগী তালিকা</a></li>
        <li><a href="{{url('admin/uddokta-list')}}"> <i class="fa fa-users"></i> উদ্যোক্তা তালিকা</a></li>
        <li><a href="{{url('admin/reports')}}"> <i class="fa fa-folder-open"></i> প্রতিবেদন দেখুন</a></li>
{{--        <li><a href="{{url('admin/all-envelope-report')}}"> <i class="fa fa-envelope"></i> খাম তৈরী করুন</a></li>--}}
    </ul>


</div><!-- leftpanel -->
