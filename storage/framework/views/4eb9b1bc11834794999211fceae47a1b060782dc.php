
<?php $__env->startSection('title','সকল ইউনিয়নের ইউজার তালিকা'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">

        <?php echo $__env->make('backend.include.pageheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="contentpanel">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ক্রমিক</th>
                    <th>ইউনিয়ন</th>
                    <th>নাম</th>
                    <th>ইউজারনেইম</th>
                    <th>ইউজার রোল</th>
                    <th>একশন</th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $unionUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $unionUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td class="text-center"><?php echo e(++$key); ?></td>
                        <td>
                            <?php if($unionUser->role == 1): ?>
                                -

                            <?php else: ?>
                                <?php echo e($unionUser->union->union_name); ?>


                            <?php endif; ?>
                        </td>
                        <td><?php echo e($unionUser->name); ?></td>
                        <td><?php echo e($unionUser->email); ?></td>
                        <td>

                            <?php if($unionUser->role == 1): ?>
                                এডমিন
                            <?php else: ?>
                                ইউনিয়ন

                            <?php endif; ?>
                        </td>

                        <td><a href="<?php echo e(url('/admin/uddokta/edit/'.$unionUser->id)); ?>"
                               class="btn btn-primary btn-sm">সম্পাদন</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/uddokta.blade.php ENDPATH**/ ?>