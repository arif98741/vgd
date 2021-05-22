
<?php $__env->startSection('title','প্রতিবেদন দেখুন'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4><?php echo e(\App\User::getUnionName()); ?> ইউনিয়ন প্রতিবেদন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <h3><a href="<?php echo e(url('user/reports/all-union-wise-beneficiaries-dropdown')); ?>"> বিতরণকৃত উপকারভোগীর তালিকা</a></h3>
                        <h3><a href="<?php echo e(url('user/reports/not-distributed')); ?>"> অবিতরণকৃত উপকারভোগীর তালিকা</a></h3>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/user/reports/reports.blade.php ENDPATH**/ ?>