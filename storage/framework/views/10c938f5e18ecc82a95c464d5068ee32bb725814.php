
<?php $__env->startSection('title','Union Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <?php echo $__env->make('backend.include.pageheader_union', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="contentpanel">
            <div class="row">

            </div>
            <br>
            <div class="row row-stat">
                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-6">

                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> <?php echo e($stock->year); ?>-<?php echo e(date('Y')); ?></span>
                                        অর্থ বছরের ভিজিএফ</h5>
                                    <h2 class="mt5"><span style="font-family:SutonnyMJ;" ><?php echo e($stock->total_bosta); ?></span> টাকা</h2>
                                </div><!-- media-body -->
                                <hr>
                                <div class="media-body">
                                    <p>কার্ড সংখ্যাঃ <span style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e($card['total']); ?></span>টি, বিতরণ করা হয়েছেঃ <span style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e($card['distributed']); ?></span>টি, বিতরণ হয়নিঃ <span style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e($card['not_distributed']); ?></span>টি</p>
                                </div><!-- media-body -->

                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়েছে</h5>

                                        <h4 class="nomargin"><span style="font-family:SutonnyMJ;"><?php echo e(\App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['distribution']); ?></span> টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়নি</h5>
                                        <h4 class="nomargin"><span style="font-family:SutonnyMJ;"><?php echo e(\App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['due_distribution']); ?></span> টাকা</h4>
                                    </div>
                                </div>

                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/user/dashboard.blade.php ENDPATH**/ ?>