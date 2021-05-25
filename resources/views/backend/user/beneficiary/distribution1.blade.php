@extends('layouts.backend')
@section('title','ভিজিএফ উপকারভোগী টাকা প্রদান')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">
                    <h4>ভিজিএফ উপকারভোগী ভাতা প্রদান করুন</h4>
                </div>
            </div>
        </div>


        <div class="contentpanel">

            <h4 class="text-center">বিতরণকৃত টাকাঃ <span id="distribution"
                                                         style="font-family:SutonnyMJ;"> {{ $distribution['distribution'] }}</span>
                টাকা, বিতরণ
                হয়নিঃ
                <spa id="due_distribution" style="font-family:SutonnyMJ;">{{ $distribution['due_distribution'] }}</span>
                    টাকা, মোট
                    বরাদ্দঃ <span id="stock" style="font-family:SutonnyMJ;">{{ $distribution['stock'] }}</span>
                    টাকা
            </h4>

            <h4 class="text-center">বিতরণকৃত কার্ডঃ <span
                    style="font-family:SutonnyMJ; font-size: 18px;">{{ $distributed }}</span>
                টি,
                বিতরণ হয়নিঃ
                <span style="font-family:SutonnyMJ; font-size: 18px;">{{ $not_distributed }}</span> টি,
                মোট
                কার্ডঃ <span
                    style="font-family:SutonnyMJ; font-size: 18px;">{{ $total }}</span>
                টি
            </h4>

            @if($last_distributed !=null)
                <h4 class="text-center">সর্বশেষ ভাতা গ্রহণকারীঃ <span
                        id="last_distributed_name">{{ $last_distributed->beneficiary->name }}</span>, পিতা/স্বামীঃ <span
                        id="last_distributed_fh_name">{{ $last_distributed->beneficiary->fh_name }}</span> , কার্ড
                    নম্বরঃ
                    <span
                        id="last_distributed_card_no"
                        style="font-family:SutonnyMJ; font-size: 18px;">{{ $last_distributed->beneficiary->card_no }}</span>,
                    এনআইডি নম্বরঃ <span id="last_distributed_nid"
                                        style="font-family:SutonnyMJ; font-size: 18px;">{{ $last_distributed->beneficiary->nid }}</span>,
                    ওয়ার্ডঃ <span id="last_distributed_ward"
                                  style="font-family:SutonnyMJ; font-size: 18px;">{{ $last_distributed->beneficiary->ward }}</span>
                </h4>

            @endif


            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
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



    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                processing: true,
                pageLength: 25, //hello bos
                serverSide: true,
                ajax: "{{ url('user/distribution') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'card_no', name: 'card_no'},
                    {data: 'nid', name: 'nid'},
                    {data: 'fh_name', name: 'fh_name'},
                    {data: 'mother_name', name: 'mother_name'},
                    {data: 'village', name: 'village'},
                    {data: 'ward', name: 'ward'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

    </script>

    <script>

        $('#search_table').change(function () {
            let searchValue = $(this).val();
            if (searchValue != '') {
                let url = '{{ url("/") }}' + '/admin/distribution/' + searchValue;
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

        setTimeout(function () {
            lastDistribution();
            distributionUnion();
        }, 10000);

        /**
         * Last Distribution Function
         * Repeat Call Every 10 seconds
         */
        function lastDistribution() {
            setInterval(function () {
                $.ajax({
                    url: '{{ url("api/last-distributed/".$union_id) }}',
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.code == 200) {
                            $('#last_distributed_name').html(response.data.beneficiary.name);
                            $('#last_distributed_fh_name').html(response.data.beneficiary.fh_name);
                            $('#last_distributed_ward').html(response.data.beneficiary.ward);
                            $('#last_distributed_nid').html(response.data.beneficiary.nid);
                            $('#last_distributed_card_no').html(response.data.beneficiary.card_no);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }, 15000);
        }

        /**
         * Union Total Distributed Money
         * Repeat Call Every 10 seconds
         */
        function distributionUnion() {
            setInterval(function () {
                $.ajax({
                    url: '{{ url("api/union_distribution/".$union_id) }}',
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.distribution);
                        if (response.code == 200) {
                            $('#distribution').html(response.distribution);
                            $('#due_distribution').html(response.due_distribution);

                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }, 20000);
        }

    </script>
@endsection

