<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="images/database.png" type="images/database" sizes="16x16">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/mdb.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/sidenav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">

</head>
<body>

<?php echo $__env->make('public.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('public.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/sticky-kit.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/custom.min-2.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/datatables-select.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/custom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/axios.min.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>


<a id="back-to-top" href="#" class="back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

</body>
</html>
<?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/public/app.blade.php ENDPATH**/ ?>