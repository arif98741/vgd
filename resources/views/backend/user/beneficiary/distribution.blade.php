@extends('layouts.backend')
@section('title',' উপকারভোগী চাউল প্রদান করুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="pull-left">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="media-body">

                        <h4> উপকারভোগী চাউল প্রদান করুন</h4>
                    </div>
                </div><!-- media -->
            </div>

            <div class="pull-right">
                <div class="pageicon pull-left">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="media-body">
                    <marquee behavior="" direction="">
                        <h4>&nbsp; আজকের বিতরণঃ <span
                                style="font-family:SutonnyMJ; font-size: 25px;">{{ $today->total }}</span> বস্তা, গতকালকের বিতরণঃ <span
                                style="font-family:SutonnyMJ; font-size: 25px;">{{ $yesterday->total }}</span> বস্তা</h4>
                    </marquee>
                </div>
            </div>
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <form action="{{ url('admin/january/distribution/february') }}">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select id="search_table" class="form-control">
                                        <option value="">মাস বাছাই করুন</option>
                                        @foreach($months as $key => $value)
                                            <option @if($value->month == $month) selected @endif value="{{ $value->month }}">{{ \App\Providers\HelperProvider::getBengaliName($value->month) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger">@if($month =='all') বিতরণকৃত মাস বাছাই
                করুন @else {{ $monthName }} @endif</h2>
            {{--            মাস বিতরণ করুন--}}
            <h4 class="text-center">বিতরণকৃত চাউলঃ <span
                    style="font-family:SutonnyMJ;"> {{ $distribution['distribution'] }}</span> বস্তা, বিতরণ
                হয়নিঃ <span style="font-family:SutonnyMJ;">{{ $distribution['due_distribution'] }}</span> বস্তা, মোট
                মজুদঃ <span style="font-family:SutonnyMJ;">{{ $distribution['stock'] }}</span>
                বস্তা</h4>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>পিতার/স্বামীর নাম</th>
{{--                    <th>মাতার নাম</th>--}}
                    <th>গ্রাম</th>
                    <th>ওয়ার্ড</th>
                    <th>মোবাইল নম্বর</th>
                    <th>একশন</th>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">ওটিপি সাবমিট করুন</h5>
                    <p class="message alert"></p>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" minlength="4" maxlength="4" class="form-control text-center" id="otp"
                               placeholder="XXXX">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">বন্ধ করুন</button>
                    <button type="button" class="btn btn-primary otp-verify-btn"> কনফার্ম</button>
                    <input type="hidden" id="rowid">
                </div>
            </div>
        </div>
    </div>

    <style>
        #loader {
            z-index: 999999;
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url({{ asset('images/loader.gif') }}) 50% 50% no-repeat #cccccc;
        }
    </style>
@endsection

@section('script')
    @if($month !='all')



        <script type="text/javascript">

            $(document).ready(function () {
                var table = $('#basicTable').DataTable({
                    processing: true,
                    pageLength: 25, //hello bos
                    serverSide: true,
                    ajax: "{{ url('user/distribution/'.$month) }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'card_no', name: 'card_no'},
                        {data: 'nid', name: 'nid'},
                        {data: 'fh_name', name: 'fh_name'},
                        // {data: 'mother_name', name: 'mother_name'},
                        {data: 'village', name: 'village'},
                        {data: 'ward', name: 'ward'},
                        {data: 'mobile', name: 'mobile'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            });

        </script>

    @endif

    <script>

        $('#search_table').change(function () {
            let searchValue = $(this).val();
            if (searchValue != '') {
                let url = '{{ url("/") }}' + '/user/distribution/' + searchValue;
                window.location.href = url;
            }
        });

        $(document).on('click', '.modalOTP', function () {

            $('input').val('');
            $('#staticBackdrop').modal('show');
            //get row id
            let rowid = $(this).attr('rowid');
            $('#loader').css('display', 'block');
            $("#loader").fadeOut(1500);
            $.ajax({
                url: '{{ url("api/sendOtp") }}',
                method: 'post',
                data: {
                    'distribution_id': rowid,
                    'purpose': 'distribution_verification',
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.code === 200) {
                        $('.message').html(response.message)
                            .removeClass('alert-warning')
                            .addClass('alert-success');
                        ;
                        $('#rowid').val(rowid);

                    } else if (response.code == 4025) {
                        $('.message').html(response.message)
                            .removeClass('alert-success')
                            .addClass('alert-warning');
                        $('#rowid').val(rowid);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).on('click', '.otp-verify-btn', function () {
            let otp = $('#otp').val();
            let rowid = $('#rowid').val();
            if (otp == '') {
                $('.message').html('ওটিপি পুরণ করে কনফার্ম করুন')
                    .removeClass('alert-success')
                    .addClass('alert-danger');
            } else {

                $('#loader').css('display', 'block');
                $("#loader").fadeOut(2000);
                $.ajax({
                    url: '{{ url("api/verifyOtp") }}',
                    method: 'post',
                    data: {
                        'distribution_id': rowid,
                        'purpose': 'distribution_verification',
                        'code': otp
                    },
                    dataType: 'json',
                    success: function (response) {

                        if (response.code === 200) {

                            $('.message').html(response.message).removeClass('alert-danger')
                                .addClass('alert-success');
                            setTimeout(function () {

                                $('#staticBackdrop').modal('hide');
                                location.reload();
                            }, 1000);

                        } else if (response.code == 204 || response.code == 205) {
                            $('.message').html(response.message).removeClass('alert-success')
                                .addClass('alert-danger');
                        }
                        $('#loader').css('display', 'none');
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

        });
    </script>
@endsection




