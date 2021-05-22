
<?php $__env->startSection('title','ভিজিএফ উপকারভোগী সংযোজন'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <div class="contentpanel">
            
            <?php echo $__env->make('backend.include.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form method="post" action="<?php echo e(route('admin.update-vgd-beneficiary',$beneficiary->id)); ?>"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>
                            <input type="text" name="card_no"
                                   value="<?php if(!empty(old('card_no'))): ?> <?php echo e(old('card_no')); ?> <?php else: ?> <?php echo e($beneficiary->card_no); ?> <?php endif; ?>"
                                   class="form-control"/>
                            <?php if($errors->has('card_no')): ?>
                                <div class="error"><?php echo e($errors->first('card_no')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>
                            <input type="text"
                                   value="<?php if(!empty(old('nid'))): ?> <?php echo e(old('nid')); ?> <?php else: ?> <?php echo e($beneficiary->nid); ?> <?php endif; ?>"
                                   name="nid" class="form-control"/>
                            <?php if($errors->has('nid')): ?>
                                <div class="error"><?php echo e($errors->first('nid')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>
                            <input type="text" name="name"
                                   value="<?php if(!empty(old('name'))): ?> <?php echo e(old('name')); ?> <?php else: ?> <?php echo e($beneficiary->name); ?> <?php endif; ?>"
                                   class="form-control"/>
                            <?php if($errors->has('name')): ?>
                                <div class="error"><?php echo e($errors->first('name')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>
                            <input type="text" name="fh_name"
                                   value="<?php if(!empty(old('fh_name'))): ?> <?php echo e(old('fh_name')); ?> <?php else: ?> <?php echo e($beneficiary->fh_name); ?> <?php endif; ?>"
                                   class="form-control"/>
                            <?php if($errors->has('fh_name')): ?>
                                <div class="error"><?php echo e($errors->first('fh_name')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>
                            <input type="text"
                                   value="<?php if(!empty(old('mother_name'))): ?> <?php echo e(old('mother_name')); ?> <?php else: ?> <?php echo e($beneficiary->mother_name); ?> <?php endif; ?>"
                                   name="mother_name"
                                   class="form-control"/>
                            <?php if($errors->has('mother_name')): ?>
                                <div class="error"><?php echo e($errors->first('mother_name')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>
                            <select name="union_id" class="form-control">
                                <option value="">---নির্বাচন করুন---</option>
                                <?php $__currentLoopData = $unions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $union): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($union->id == $beneficiary->union_id): ?> selected <?php endif; ?> value="<?php echo e($union->id); ?>"><?php echo e($union->union_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <?php if($errors->has('union_id')): ?>
                                <div class="error"><?php echo e($errors->first('union_id')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <input type="text" name="village"
                                   value="<?php if(!empty(old('village'))): ?> <?php echo e(old('village')); ?> <?php else: ?> <?php echo e($beneficiary->village); ?> <?php endif; ?>"
                                   class="form-control"/>
                            <?php if($errors->has('village')): ?>
                                <div class="error"><?php echo e($errors->first('village')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং</label>
                            <select name="ward" class="form-control">
                                <option value="">---নির্বাচন করুন---</option>
                                <?php for($i=1; $i<=9; $i++): ?>
                                    <option  <?php if(!empty(old('ward')) && old('ward') == $i): ?> selected <?php elseif($beneficiary->ward == $i): ?>
                                        selected <?php endif; ?>  value="<?php echo e($i); ?>"><?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>

                                <?php if($errors->has('ward')): ?>
                                    <div class="error"><?php echo e($errors->first('ward')); ?></div>
                                <?php endif; ?>
                            </select>
                            <?php if($errors->has('ward')): ?>
                                <div class="error"><?php echo e($errors->first('ward')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>
                            <input type="text"
                                   value="<?php if(!empty(old('mobile'))): ?> <?php echo e(old('mobile')); ?> <?php else: ?> <?php echo e($beneficiary->mobile); ?> <?php endif; ?>"
                                   name="mobile" class="form-control"/>
                            <?php if($errors->has('mobile')): ?>
                                <div class="error"><?php echo e($errors->first('mobile')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ছবি (সর্বচ্চ ৫০ কে.বি)</label>
                            <input type="file" name="photo" class="form-control"/>
                            <img class="img-fluid mt-3" style="width: 50px; height: 50px;"
                                 src="<?php echo e(asset('storage/'.$beneficiary->photo)); ?>"
                                 alt="">
                            <?php if($errors->has('photo')): ?>
                                <div class="error"><?php echo e($errors->first('photo')); ?></div>
                            <?php endif; ?>
                        </div><!-- form-group -->
                    </div>


                </div>
                <button type="submit" class="btn btn-primary">সম্পাদন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/beneficiary/edit.blade.php ENDPATH**/ ?>