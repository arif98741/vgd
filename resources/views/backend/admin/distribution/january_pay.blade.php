@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী সংযোজন')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('admin/done/janDis')}}" >
                    @csrf

                    <div class="row">
                        <input type="hidden" name="id" value="{{$id}}">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">মোবাইল</label>
                                <input type="text" name="mobile" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" >.</label>
                                <button type="submit" class="btn btn-primary btn-block">বিতরণ নিশ্চিত করুন</button>
                            </div>
                        </div>

                    </div>


                </form><!-- panel-wizard -->
            </div>
        </div>
    </div>

@endsection
