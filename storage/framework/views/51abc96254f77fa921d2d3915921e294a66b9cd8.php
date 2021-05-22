
<?php $__env->startSection('title','ইউজার সম্পাদনা '); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">

        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="media-body">

                    <?php if($user->role == 1): ?>
                        <h4>এডমিন সম্পাদনা</h4>
                    <?php endif; ?>

                    <?php if($user->role == 2): ?>
                        <h4>ইউজার সম্পাদনা - <?php echo e($user->union->union_name); ?> ইউনিয়ন</h4>
                    <?php endif; ?>


                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            <form method="post" action="<?php echo e(url('admin/uddokta/edit/'.$user->id)); ?>"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">নাম</label>
                            <input type="text" name="name"
                                   value="<?php echo e($user->name); ?>"
                                   class="form-control"/>
                            <?php if($errors->has('name')): ?>
                                <div class="error"><?php echo e($errors->first('name')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">পাসওয়ার্ড</label>
                            <input type="password" name="password"
                                   class="form-control"/>
                            <?php if($errors->has('password')): ?>
                                <div class="error"><?php echo e($errors->first('password')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">সম্পাদন</button>

            </form><!-- panel-wizard -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/edit-uddokta.blade.php ENDPATH**/ ?>