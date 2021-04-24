<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>মেলান্দহ সকল ভিজিএফ হিসাব</title>
    <link href="{{ asset('asset/backend/css/print.css')}}" rel="stylesheet">
</head>
<body>
<div class="bt-div" id="bt-div">
    <input type="button" class="button blue" title="Print" onclick="printFunc()"
           printfunc()" value="Print">
    <a class="button blue" href="{{ url('admin/reports/all-months-dropdown') }}">Back</a>
</div>
<div class="wraper">
    <table width="100%" border="0">
        <tr>
            <td colspan="3" align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="41%" valign="top">
                            <div style="font-size:20px; text-align: center" class="title-1 ">
                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
                                মহিলা বিষয়ক অধিদপ্তর <br>

                            </div>
                            <div style="font-size:18px; text-align: center" class="title-1 ">
                                উপজেলাঃ মেলান্দহ, জেলাঃ জামালপুর
                            </div>
                            <div style="font-size:17px; text-align: center" class="title-1 ">
                                সকল
                                ইউনিয়নের {{ \App\Providers\HelperProvider::getBengaliName(\App\Providers\HelperProvider::getMonthByNumber(request()->get('month'))) }}
                                মাসের ভিজিএফ টাকা প্রদানের প্রতিবেদন
                            </div>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <th height="86" colspan="3" align="left" valign="middle">

                <table width="100%" class="table" border="0">
                    <tr>
                        <th align="left" style="text-align: center" valign="top">ইউনিয়ন</th>
                        <th align="left" style="text-align: center" valign="top">বিতরণকৃত</th>
                        <th align="left" style="text-align: center" valign="top">বিতরণ হয়নি</th>
                        <th align="left" style="text-align: center" valign="top">মোট</th>
                    </tr>
                    @php
                        $distributed = $stock = $total = 0;
                    @endphp
                    @foreach( $reports as $report)

                        @php
                            $distributed  += \App\Providers\DistributionHelper::distributed($monthName, $report->union_id,$report->total_bosta)['distribution'];
                        $total += \App\Providers\DistributionHelper::distributed($monthName, $report->union_id,$report->total_bosta)['due_distribution'];
                        $stock += $report->total_bosta;
                        @endphp
                        <tr style="text-align: center">
                            <td style="text-align: center" align="left">{{ $report->union_name }}</td>
                            <td style="text-align: center"
                                align="left"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 500;">{{ \App\Providers\DistributionHelper::distributed($monthName, $report->union_id,$report->total_bosta)['distribution'] }}
                                </span>  টাকা
                            </td>
                            <td style="text-align: center"
                                align="left"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 700;">{{ \App\Providers\DistributionHelper::distributed($monthName, $report->union_id,$report->total_bosta)['due_distribution'] }}
                                </span>  টাকা
                            </td>
                            <td style="text-align: center"
                                align="left"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 700;">{{ $report->total_bosta  }}</span> টাকা
                            </td>
                        </tr>

                    @endforeach

                    <tr>
                        <td style="text-align: center">সর্বমোটঃ</td>
                        <td style="text-align: center"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 700;">{{ $distributed }}</span> টাকা</td>
                        <td style="text-align: center"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 700;">{{ $stock }} </span>টাকা</td>
                        <td style="text-align: center"><span style="font-family:SutonnyMJ; font-size: 18px; font-weight: 700;">{{ $total }} </span>টাকা</td>
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
