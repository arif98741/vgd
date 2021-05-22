<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>মেলান্দহ সকল ভিজিএফ হিসাব</title>
    <link href="<?php echo e(asset('asset/backend/css/print.css')); ?>" rel="stylesheet">
</head>
<body>
<div class="bt-div" id="bt-div">
    <input type="button" class="button blue" title="Print" onclick="printFunc()"
           printfunc()" value="Print">
    <button class="button blue" onclick="goBack()">Back</button>
</div>
<div class="wraper">
    <table width="100%" border="0">
        <tr>
            <td colspan="3" align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="41%" valign="top">
                            <div style="font-size:19px; text-align: center" class="title-1 ">
                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
                                <?php echo e($union->union_name); ?> ইউনিয়ন পরিষদ <br>
                            </div>
                            <div style="font-size:17px; text-align: center" class="title-1 ">

                                ইউনিয়ন অনুযায়ী বিতরণকৃত মাষ্টাররোল
                            </div>
                            <div style="font-size:17px; text-align: center" class="title-1 ">

                                কার্ডধারী সংখ্যাঃ <span style="font-family:SutonnyMJ;"><?php echo e($total_card); ?></span> টি,
                                প্রদান করা হয়েছেঃ <span style="font-family:SutonnyMJ;"><?php echo e($reports->count()); ?></span>
                                টি,
                                বাকী আছেঃ <span style="font-family:SutonnyMJ;"><?php echo e($total_card - $reports->count()); ?></span> টি
                            </div>

                            <div style="font-size:17px; text-align: center" class="title-1 ">
                                মোট বরাদ্দ
                                <span style="font-family:SutonnyMJ;"><?php echo e($total_amount->total_amount); ?></span> টাকা,
                                প্রদান করা হয়েছে <span
                                    style="font-family:SutonnyMJ;"><?php echo e($total_distribution->total_distributed); ?></span>
                                টাকা,
                                প্রদান করা
                                হয়নি <span
                                    style="font-family:SutonnyMJ;"><?php echo e($total_amount->total_amount  - $total_distribution->total_distributed); ?></span>
                                টাকা

                            </div>

                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <th height="86" colspan="3" align="left" valign="middle">
                <table width="100%" class="table" border="0">
                    <tr>
                        <th align="left" valign="top">ক্রমিক নং</th>
                        <th align="left" valign="top">নাম</th>
                        <th align="left" valign="top">কার্ড নাম্বার</th>
                        <th align="left" valign="top">পিতা/স্বামী</th>
                        <th align="left" valign="top">মাতার নাম</th>
                        <th align="left" valign="top">গ্রাম</th>
                        <th align="left" valign="top">ওয়ার্ড</th>
                        <th align="left" valign="top">এনআইডি</th>
                        <th align="left" valign="top">মোবাইল</th>
                    </tr>

                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="text-align: center">
                            <td align="left" style="text-align: center"><span
                                    style="font-family:SutonnyMJ;"> <?php echo e(++$key); ?></span></td>
                            <td align="left"><?php echo e($report->name); ?></td>
                            <td align="left" style="text-align: center"><?php echo e($report->card_no); ?></td>
                            <td align="left"><?php echo e($report->fh_name); ?></td>
                            <td align="left"><?php echo e($report->mother_name); ?></td>
                            <td align="left"><?php echo e($report->village); ?></td>
                            <td align="left"><?php echo e($report->ward); ?></td>
                            <td align="left"><?php echo e($report->nid); ?></td>
                            <td align="left"><?php echo e($report->mobile); ?></td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr class="custom-design">
                        <td colspan="3">ট্যাগ অফিসারের স্বাক্ষর</td>
                        <td colspan="4"></td>
                        <td colspan="2">চেয়ারম্যান/সচিবের স্বাক্ষর</td>
                    </tr>
                </table>
            </th>
        </tr>
    </table>
</div>

<script>
    function printFunc() {
        let print = document.getElementById('bt-div');
        print.style.display = 'none';
        window.print();
        print.style.display = 'block';
    }

    function goBack() {
        window.history.back();
    }

</script>
<?php /**PATH /home/melandah/vgf.melandahbhata.gov.bd/resources/views/backend/admin/reports/beneficiary/distributed_print.blade.php ENDPATH**/ ?>