@extends('layouts.backend')
@section('title','Union Dashboard')
@section('content')
    <div class="mainpanel">
        @include('backend.include.pageheader_union')

        <div class="contentpanel">
            <div class="row">

            </div>
            <br>
            <div class="row row-stat">
                @foreach($stocks as $stock)

                    <div class="col-md-6">

                        <div class="panel panel-info-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                            class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="media-body">

                                    <h5 class="md-title nomargin"> <span
                                            style="font-family:SutonnyMJ; font-size: 18px;"> {{ $stock->year }}-{{ date('Y') }}</span>
                                        অর্থ বছরের ভিজিএফ</h5>
                                    <h2 class="mt5"><span
                                            style="font-family:SutonnyMJ;">{{ $stock->total_bosta }}</span> টাকা</h2>
                                </div><!-- media-body -->
                                <hr>
                                <div class="media-body">
                                    <p>কার্ড সংখ্যাঃ <span
                                            style="font-family:SutonnyMJ; font-size: 18px;">{{$card['total']}}</span>টি,
                                        বিতরণ করা হয়েছেঃ <span
                                            style="font-family:SutonnyMJ; font-size: 18px;">{{$card['distributed']}}</span>টি,
                                        বিতরণ হয়নিঃ <span
                                            style="font-family:SutonnyMJ; font-size: 18px;">{{$card['not_distributed']}}</span>টি
                                    </p>
                                </div><!-- media-body -->

                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়েছে</h5>

                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['distribution'] }}</span>
                                            টাকা</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">টাকা দেওয়া হয়নি</h5>
                                        <h4 class="nomargin"><span
                                                style="font-family:SutonnyMJ;">{{ \App\Providers\DistributionHelper::distributed($stock->union_id,$stock->total_bosta)['due_distribution'] }}</span>
                                            টাকা</h4>
                                    </div>
                                </div>

                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                @endforeach

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">

                            <div class="media-body">
                                <canvas id="myChart" width="400" height="300"></canvas>
                            </div><!-- media-body -->
                            <hr>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- contentpanel -->

        </div><!-- mainpanel -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script>
            // Any of the following formats may be used
            var ctx = document.getElementById('myChart');
            var ctx = document.getElementById('myChart').getContext('2d');
            var ctx = $('#myChart');
            var ctx = 'myChart';

            setInterval(function () {
                var myBarChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['10AM', '11AM', '12PM', '2PM', '4PM', '6PM', '8PM', '10PM','12AM','2AM'],
                        datasets: [
                            {
                                label: 'প্রদানের ডেমো তালিকা গ্রাফ',
                                data: shuffle([145, 345, 135, 432, 152, 60, 320, 213,165,695]),
                                fill: false,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(10, 99, 132, 1)',
                                    'rgba(54, 45, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 95, 192, 1)',
                                    'rgba(10, 102, 255, 1)',
                                    'rgba(85, 159, 64, 1)'
                                ],
                                borderWidth: 2
                            }
                        ]
                    },
                    // options: options
                });
            },4000);

            function shuffle(array) {
                var currentIndex = array.length, temporaryValue, randomIndex;

                // While there remain elements to shuffle...
                while (0 !== currentIndex) {

                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;

                    // And swap it with the current element.
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }

                return array;
            }
        </script>
@endsection
