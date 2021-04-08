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

                        <div class="col-sm-8">
                            <div class="form-group">
                                <h2 class="control-label text-center">মাসের নাম নির্বাচন করুন</h2>
                                <hr>
                                <a class="btn btn-primary" href="{{url('admin/january/distribution')}}">জানুয়ারি</a>
                                <a class="btn btn-success" href="{{url('admin/february/distribution')}}">ফেব্রুয়ারি</a>
                                <a class="btn btn-info" href="">মার্চ</a>
                                <a class="btn btn-danger" href="">এপ্রিল</a>
                                <a class="btn btn-primary" href="">মে</a>
                                <a class="btn btn-success" href="">জুন </a>
                                <a class="btn btn-info" href="">জুলাই</a>
                                <a class="btn btn-danger" href="">আগস্ট</a>
                                <a class="btn btn-primary" href="">সেপ্টেম্বর</a>
                                <a class="btn btn-success" href="">অক্টোবর</a>
                                <a class="btn btn-info" href="">নভেম্বর </a>
                                <a class="btn btn-danger" href="">ডিসেম্বর</a>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->


        <div class="contentpanel">
            <h2 class="control-label text-center text-danger">জানুয়ারি মাসের ভিজিডি উপকারভোগী</h2>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>নাম</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
                    <th>ইউনিয়ন</th>
                    <th>গ্রাম</th>
                    <th>মোবাইল নম্বর</th>
                    <th>একশন</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Beneficiary as $row)
                    <tr>
                        <td>{{$row->card_no}}</td>
                        <td>{{$row->nid_no}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->fh_name}}</td>
                        <td>{{$row->mother_name}}</td>
                        <td>{{$row->union_name}}</td>
                        <td>{{$row->village}}</td>
                        <td>{{$row->mobile}}</td>

                        @if($row->id==$janDis[1]['beneficiary_id'] && $janDis[0]['status']==1)

                        <td>
                            <span class="badge badge-danger">প্রদান হয়েছে</span>
                        </td>
                            @else
                            <td>
                                <a href="{{url('admin/confirm/disPage/'.$row->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-hand-o-up"></i> প্রদান করুন</a>
                            </td>

                        @endif

                    </tr>

                @endforeach



                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->


@endsection

@section('script')
    <script>
        jQuery(document).ready(function(){
            jQuery('#basicTable').DataTable({
                responsive: true
            });
            var shTable = jQuery('#shTable').DataTable({
                "fnDrawCallback": function(oSettings) {
                    jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                },
                responsive: true
            });
            // Show/Hide Columns Dropdown
            jQuery('#shCol').click(function(event){
                event.stopPropagation();
            });
            jQuery('#shCol input').on('click', function() {
                // Get the column API object
                var column = shTable.column($(this).val());
                // Toggle the visibility
                if ($(this).is(':checked'))
                    column.visible(true);
                else
                    column.visible(false);
            });
            var exRowTable = jQuery('#exRowTable').DataTable({
                responsive: true,
                "fnDrawCallback": function(oSettings) {
                    jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                },
                "ajax": "ajax/objects.txt",
                "columns": [
                    {
                        "class":          'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data": "name" },
                    { "data": "position" },
                    { "data": "office" },
                    { "data": "salary" }
                ],
                "order": [[1, 'asc']]
            });
            // Add event listener for opening and closing details
            jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = exRowTable.row( tr );
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
            // DataTables Length to Select2
            jQuery('div.dataTables_length select').removeClass('form-control input-sm');
            jQuery('div.dataTables_length select').css({width: '60px'});
            jQuery('div.dataTables_length select').select2({
                minimumResultsForSearch: -1
            });
        });
        function format (d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered nomargin">'+
                '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
                '</tr>'+
                '</table>';
        }
    </script>
@endsection




