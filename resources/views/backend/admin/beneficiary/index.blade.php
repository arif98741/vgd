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
                    <h4>নাংলা ইউনিয়ন ভিজিডি উপকারভোগী তালিকা</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            @include('backend.include.flash')
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
                    <th>ওয়ার্ড নং</th>
                    <th>মোবাইল নম্বর</th>
                    <th>একশন</th>
                </tr>
                </thead>
                <tbody>
                @foreach($beneficiaries as $key => $beneficiary)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $beneficiary->nid }}</td>
                        <td>{{ $beneficiary->name }}</td>
                        <td>{{ $beneficiary->fh_name }}</td>
                        <td>{{ $beneficiary->mother_name }}</td>
                        <td>{{ $beneficiary->union->union_name }}</td>
                        <td>{{ $beneficiary->village }}</td>
                        <td>{{ $beneficiary->ward }}</td>
                        <td>{{ $beneficiary->mobile }}</td>

                        <td>
                            
                            <a href="{{ url('admin/edit-beneficiary/'.$beneficiary->id) }}"
                               class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ url('admin/edit-beneficiary/'.$beneficiary->id) }}"
                               class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i
                                    class="fa fa-trash-o"></i></a>
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
        jQuery(document).ready(function () {
            jQuery('#basicTable').DataTable({
                responsive: true
            });
            var shTable = jQuery('#shTable').DataTable({
                "fnDrawCallback": function (oSettings) {
                    jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                },
                responsive: true
            });
            // Show/Hide Columns Dropdown
            jQuery('#shCol').click(function (event) {
                event.stopPropagation();
            });
            jQuery('#shCol input').on('click', function () {
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
                "fnDrawCallback": function (oSettings) {
                    jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                },
                "ajax": "ajax/objects.txt",
                "columns": [
                    {
                        "class": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {"data": "name"},
                    {"data": "position"},
                    {"data": "office"},
                    {"data": "salary"}
                ],
                "order": [[1, 'asc']]
            });
            // Add event listener for opening and closing details
            jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = exRowTable.row(tr);
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
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

        function format(d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered nomargin">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extension number:</td>' +
                '<td>' + d.extn + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '</table>';
        }
    </script>
@endsection


