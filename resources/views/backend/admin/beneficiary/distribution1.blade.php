@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">

                    <h4>ভিজিডি উপকারভোগী ভাতা প্রদান করুন</h4>
                </div>
            </div><!-- media -->
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
                                            <option @if($month == $key) selected @endif value="{{ $key }}">{{ $value }}
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
            <h2 class="control-label text-center text-danger">@if($month =='all') বিতরণকৃত মাস বাছাই করুন @else {{ $months[$month] }} মাস বিতরণ করুন@endif</h2>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>নাম</th>
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
                    <p class="message alert alert-success"></p>

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
                    ajax: "{{ url('admin/distribution/'.$month) }}",
                    columns: [
                        {data: 'beneficiary.card_no', name: 'beneficiary.card_no'},
                        {data: 'beneficiary.nid', name: 'beneficiary.nid'},
                        {data: 'beneficiary.name', name: 'beneficiary.name'},
                        {data: 'beneficiary.fh_name', name: 'beneficiary.fh_name'},
                        {data: 'beneficiary.mother_name', name: 'beneficiary.mother_name'},
                        {data: 'beneficiary.village', name: 'beneficiary.village'},
                        {data: 'beneficiary.ward', name: 'beneficiary.ward'},
                        {data: 'beneficiary.mobile', name: 'beneficiary.mobile'},
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
                    if (response.code === 200) {
                        $('.message').html(response.message);
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




