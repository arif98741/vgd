
<?php $__env->startSection('title','এডমিন ড্যাশবোর্ড'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">

        <?php echo $__env->make('backend.include.pageheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="contentpanel">
            <br>
            <div class="row row-stat">

                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $card = \App\Providers\HelperProvider::calculateCard($stock->union_id);
                    ?>
                    <div class="col-md-4">
                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"></span> <?php echo e($stock->union_name); ?>

                                        ইউনিয়ন <span
                                            style="font-family:SutonnyMJ; font-size: 20px;"><?php echo e($stock->year); ?></span> -
                                        <span
                                            style="font-family:SutonnyMJ; font-size: 20px;"><?php echo e(date('Y')); ?></span></span>
                                        অর্থ বছরের ভিজিএফ</h5>
                                    <h2 class="mt5">বরাদ্দঃ <span
                                            style="font-family:SutonnyMJ; font-size: 30px;"><?php echo e(\App\Providers\HelperProvider::takaFormat($stock->total_amount)); ?></span>
                                        টাকা </h2>
                                    <h4 class="mt5">বরাদ্দকৃত কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;"><?php echo e(\App\Providers\HelperProvider::takaFormat($card['card']['total'])); ?></span>
                                        টি<br> বিতরণকৃত কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;"><?php echo e(\App\Providers\HelperProvider::takaFormat($card['card']['distributed'])); ?></span>টি<br>
                                        অবিতরণকৃত
                                        কার্ডঃ <span
                                            style="font-family:SutonnyMJ; font-size: 20px;"><?php echo e(\App\Providers\HelperProvider::takaFormat($card['card']['not_distributed'])); ?></span>টি
                                    </h4>
                                </div><!-- media-body -->

                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়েছে</h5>

                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;"><?php echo e(\App\Providers\HelperProvider::takaFormat(\App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['distribution'])); ?></span>
                                            টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়নি</h5>
                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;"><?php echo e(\App\Providers\HelperProvider::takaFormat(\App\Providers\DistributionHelper::distributed( $stock->union_id,$stock->total_amount)['due_distribution'])); ?></span>
                                            টাকা</h4>
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/dashboard.blade.php ENDPATH**/ ?>