
<?php $__env->startSection('title','ভিজিএফ উপকারভোগী'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">
                    <h4><?php echo e(\App\User::getUnionName()); ?> ভিজিএফ উপকারভোগী তালিকা</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            <?php echo $__env->make('backend.include.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    <th>এনআইডি নম্বর</th>
                    <th>কার্ড নং</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
                    <th>গ্রাম</th>
                    <th>ওয়ার্ড নং</th>
                    <th>মোবাইল নম্বর</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                processing: true,
                pageLength: 25,
                serverSide: true,
                ajax: "<?php echo e(url('user/view-vgd-beneficiaries')); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'nid', name: 'nid'},
                    {data: 'card_no', name: 'card_no'},
                    {data: 'fh_name', name: 'fh_name'},
                    {data: 'mother_name', name: 'mother_name'},
                    {data: 'village', name: 'village'},
                    {data: 'ward', name: 'ward'},
                    {data: 'mobile', name: 'mobile'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/user/beneficiary/index.blade.php ENDPATH**/ ?>