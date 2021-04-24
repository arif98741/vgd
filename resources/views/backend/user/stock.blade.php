@extends('layouts.backend')
@section('title','গুদামে মাল মজুদ করুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>গুদামে মজুদকৃত টাকা</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger"> গুদামে মজুদকৃত টাকাের তালিকা </h2>
            {{--            মাস বিতরণ করুন--}}
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>মাস</th>
                    <th>পরিমাণ</th>
                    <th>সংযোজন তারিখ</th>
                </tr>
                </thead>

                <tbody>

                @foreach($stocks as $key=> $stock)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ \App\Providers\HelperProvider::getBengaliName($stock->month) }}</td>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ $stock->amount }}</span></td>
                        <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($stock->created_at)) }}</span>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                pageLength: 25, //hello bos
            });
        });
    </script>
@endsection

