@extends('layouts.backend')
@section('title','ভিজিএফ উপকারভোগী')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-users"></i>
                </div>
                <div class="media-body">
                    <h4>সকল ইউনিয়ন ভিজিএফ উপকারভোগী তালিকা</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            @include('backend.include.flash')
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    <th>এনআইডি নম্বর</th>
                    <th>কার্ড নং</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
                    <th>ইউনিয়ন</th>
                    <th>গ্রাম</th>
                    <th>ওয়ার্ড নং</th>
                    <th>মোবাইল নম্বর</th>
                    <th>একশন</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection
@section('script')

    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                processing: true,
                pageLength: 25,
                serverSide: true,
                ajax: "{{ url('admin/view-vgd-beneficiaries') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'nid', name: 'nid'},
                    {data: 'card_no', name: 'card_no'},
                    {data: 'fh_name', name: 'fh_name'},
                    {data: 'mother_name', name: 'mother_name'},
                    {data: 'union.union_name', name: 'union.union_name'},
                    {data: 'village', name: 'village'},
                    {data: 'ward', name: 'ward'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>
@endsection


