<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="<?php echo e(asset('asset/backend/images/photos/profile.png')); ?>" height="50" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></h4>
            <small class="text-muted"><?php echo e(\App\User::getUnionName()); ?> ইউনিয়ন সচিব</small>
        </div>
    </div><!-- media -->


    <ul class="custom-menu">
        <li><a href="<?php echo e(url('/user/dashboard')); ?>"><i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span></a></li>
        <li><a href="<?php echo e(url('user/stock')); ?>"><i class="fa fa-university"></i> বরাদ্দকৃত অর্থের পরিমাণ</a></li>
        <li><a href="<?php echo e(url('user/distribution')); ?>"> <i class="fa fa-share-square-o"></i> উপকারভোগী টাকা
                প্রদান
                করুন</a>
        <li><a href="<?php echo e(url('user/reports')); ?>"> <i class="fa fa-folder"></i>&nbsp;প্রতিবেদন দেখুন</a>
        </li>
        <li><a href="<?php echo e(url('user/view-vgd-beneficiaries')); ?>"> <i class="fa fa-list"></i> উপকারভোগী তালিকা</a></li>
    </ul>


</div><!-- leftpanel -->
<?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/include/sidebar_union.blade.php ENDPATH**/ ?>