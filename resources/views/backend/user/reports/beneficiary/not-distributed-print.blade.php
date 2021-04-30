<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>অবিতরণকৃত উপকারভোগীর তালিকা</title>
    <link href="{{ asset('asset/backend/css/print.css')}}" rel="stylesheet">
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
                                {{ $union->union_name }} ইউনিয়ন পরিষদ <br>
                            </div>
                            <div style="font-size:17px; text-align: center" class="title-1 ">

                                {{ \App\Providers\HelperProvider::getBengaliName(\App\Providers\HelperProvider::getMonthByNumber(request()->get('month'))) }}
                                মাসের অবিতরণকৃত উপকারভোগীর তালিকা
                            </div>
                            <div  style="font-size:17px; font-family:SutonnyMJ; text-align: center" class="title-1 ">
                                মোট সংখ্যাঃ {{ $reports->count() }} জন
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
{{--                        <th align="left" valign="top">মাতার নাম</th>--}}
                        <th align="left" valign="top">গ্রাম</th>
                        <th align="left" valign="top">ওয়ার্ড</th>
                        <th align="left" valign="top">এনআইডি</th>
                        <th align="left" valign="top">মোবাইল</th>
                    </tr>

                    @foreach( $reports as $key=> $report)
                        <tr style="text-align: center">
                            <td align="left" style="text-align: center">{{ ++$key }}</td>
                            <td align="left">{{ $report->name }}</td>
                            <td align="left" style="text-align: center">{{ $report->card_no }}</td>
                            <td align="left">{{ $report->fh_name }}</td>
{{--                            <td align="left">{{ $report->mother_name }}</td>--}}
                            <td align="left">{{ $report->village }}</td>
                            <td align="left">{{ $report->ward }}</td>
                            <td align="left">{{ $report->nid }}</td>
                            <td align="left">{{ $report->mobile }}</td>
                        </tr>

                    @endforeach

                    <tr class="custom-design">
                        <td colspan="3">ট্যাগ অফিসারের স্বাক্ষর ও সিল</td>

                        <td colspan="4"></td>


                        <td colspan="2">চেয়ারম্যান/সচিবের স্বাক্ষর ও সিল</td>
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
