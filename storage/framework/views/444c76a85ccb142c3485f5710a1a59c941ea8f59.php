
<?php $__env->startSection('title','ভিজিএফ উপকারভোগী'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">
                    <h4>ইউনিয়ন অনুযায়ী বিতরণকৃত মাষ্টাররোল</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php echo e(url()->current()); ?>" method="get">
                        <div class="row">

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন বাছাই করুন</label>
                                    <select name="union_id" data-placeholder="Choose One"
                                            class="form-control">
                                        <option value="">---নির্বাচন করুন---</option>
                                        <?php $__currentLoopData = $unions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>  $union): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($union->id); ?>"><?php echo e($union->union_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-2">

                                <button type="submit" class="btn btn-primary">প্রতিবেদন দেখুন</button>

                            </div>
                        </div>
                    </form>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->
    </div><!-- mainwrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/reports/beneficiary/distributed.blade.php ENDPATH**/ ?>