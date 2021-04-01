@extends('layouts.backend')
@section('title','উপকারভোগী আপলোড করুন')
@section('content')
    <div class="mainpanel">
        <div class="contentpanel">
            <div class="row row-stat">
                <div class="col-md-6 mt-5">
                    <div class="upload-form">
                        <form action="{{url('')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> ভিজিডি উপকারভোগী আপলোড করুন </h4>

                            <div class="form-group">
                                <input type="file" name="file" id="" accept=".xlsx,.csv">
                            </div>

                            <div class="">
                                <button id="addNewBtnId" class="btn btn-success btn-md" type="submit"><i class="fa fa-upload"></i> আপলোড</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
@endsection
