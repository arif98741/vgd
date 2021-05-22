<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ভিজিএফ ভাতা প্রদান লগিন করুন</title>

    <link href="<?php echo e(asset('asset/backend/css/style.default.css')); ?>" rel="stylesheet">

</head>

<body class="signin">


<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div style="font-size: 24px;
					text-align: center;
					color: #428bca;">
                লগইন
            </div>

            <div class="mb30"></div>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" name="email" class="form-control" placeholder="Username">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><!-- input-group -->



        </div><!-- panel-body -->
        <div class="panel-footer">
            <center>
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i> লগইন</button>
                <center>
        </div><!-- panel-footer -->
        </form>
    </div><!-- panel -->

</section>


<script src="<?php echo e(asset('asset/backend/js/jquery-1.11.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/pace.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/retina.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/backend/js/jquery.cookies.js')); ?>"></script>

<script src="js/custom.js')}}"></script>

</body>
</html>
<?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/auth/login1.blade.php ENDPATH**/ ?>