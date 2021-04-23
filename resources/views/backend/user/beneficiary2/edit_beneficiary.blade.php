@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী সংযোজন')
@section('content')

    <div class="mainpanel">
        <div class="contentpanel">

            <form method="post" action="{{url('admin/update/beneficiary/'.$Beneficiary->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>
                            <input type="text" name="card_no" value="{{$Beneficiary->card_no}}" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>
                            <input type="text" name="nid_no" value="{{$Beneficiary->nid_no}}" class="form-control"  required/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>
                            <input type="text" name="name" value="{{$Beneficiary->name}}" class="form-control"  required/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>
                            <input type="text" name="fh_name" value="{{$Beneficiary->name}}" class="form-control" required/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>
                            <input type="text" name="mother_name" value="{{$Beneficiary->mother_name}}" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>
                            <select data-placeholder="Choose One" name="union_id"  class="form-control">
                                @foreach($union as $row)
                                    <option value="{{$row->id}}" <?php if ($Beneficiary->union_id==$row->id){
                                        echo "selected";
                                    } ?> >{{$row->union_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <input type="text" name="village" value="{{$Beneficiary->village}}" class="form-control" required />
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>
                            <input type="text" name="mobile" value="{{$Beneficiary->mobile}}" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">

                            <label class="control-label">নতুন ছবি (সর্বচ্চ ৫০ কে.বি)</label><br>
                            <img id="image" src="#"><br>
                            <input type="file" name="photo" accept="image/*" class="upload form-control" onchange="readURL(this);">

                        </div><!-- form-group -->
                        <div class="form-group">
                            <img src="{{asset($Beneficiary->photo)}}" name="old_photo" alt="" width="80" height="60">
                        </div><!-- form-group -->
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">হালনাগাদ</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->


    <!-- Input Image Show javascript -->

    <script type="text/javascript">
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- Input Image Show javascript -->

@endsection
