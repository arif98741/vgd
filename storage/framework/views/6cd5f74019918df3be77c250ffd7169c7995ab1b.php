
<?php $__env->startSection('title','বরাদ্দকৃত অর্থ'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>বরাদ্দকৃত অর্থ</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger"> বরাদ্দকৃত অর্থের তালিকা </h2>
            
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>পরিমাণ</th>
                    <th>সংযোজন তারিখ</th>
                </tr>
                </thead>

                <tbody>

                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e(++$key); ?></span></td>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e($stock->amount); ?></span>  টাকা</td>
                        <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;"><?php echo e(date('d-m-Y',strtotime($stock->created_at))); ?></span>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                pageLength: 25, //hello bos
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/user/stock.blade.php ENDPATH**/ ?>