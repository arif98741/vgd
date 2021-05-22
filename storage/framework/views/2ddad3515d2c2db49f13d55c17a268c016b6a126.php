<header>
    <div class="headerwrapper">
        <div class="header-left">
            <a href="<?php echo e(url('/user/dashboard')); ?>" class="logo">
               ভিজিএফ সফটওয়্যার
            </a>
            <div class="pull-right">
                <a href="" class="menu-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div><!-- header-left -->

        <div class="header-right">

            <div class="pull-right">

                

                <div class="btn-group btn-group-list btn-group-notification">
                    
                    <div class="dropdown-menu pull-right">
                        <a href="" class="link-right"></a>
                        <h5>Notification</h5>
                        <ul class="media-list dropdown-list">
                            <li class="media">
                                <img class="img-circle pull-left noti-thumb"
                                     src="<?php echo e(asset('asset/backend/images/photos/user1.png')); ?>" alt="">
                                <div class="media-body">
                                    <strong>আপডেট </strong> এর কাজ চলমান
                                    <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                                </div>
                            </li>

                            </li>
                        </ul>
                        <div class="dropdown-footer text-center">

                        </div>
                    </div><!-- dropdown-menu -->
                </div><!-- btn-group -->



                <div class="btn-group btn-group-option">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="profile_settings.php"><i class="glyphicon glyphicon-list"></i> সাইট প্রোফাইল</a>
                        </li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> অ্যাক্টিভ লগ</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> সহযোগীতা</a></li>
                        <li class="divider"></li>
                        <li><a href="user_settings.php"><i class="glyphicon glyphicon-cog"></i> ইউজার সেটিংস</a></li>
                        <li><a href="<?php echo e(url('do-logout')); ?>"><i class="glyphicon glyphicon-log-out"></i>লগআউট</a></li>
                    </ul>
                </div><!-- btn-group -->

            </div><!-- pull-right -->

        </div><!-- header-right -->

    </div><!-- headerwrapper -->
</header>
<?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/include/header_union.blade.php ENDPATH**/ ?>