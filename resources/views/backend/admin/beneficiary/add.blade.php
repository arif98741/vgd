@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী সংযোজন')
@section('content')
    <div class="mainpanel">
        <div class="contentpanel">
            {{--            {{ dd($errors) }}--}}
            @include('backend.include.flash')
            <form method="post" action="{{ route('admin.add-vgd-beneficiary') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>
                            <input type="text" name="card_no" value="{{ old('card_no') }}" class="form-control"/>
                            @if($errors->has('card_no'))
                                <div class="error">{{ $errors->first('card_no') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>
                            <input type="text" value="{{ old('nid') }}" name="nid" class="form-control"/>
                            @if($errors->has('nid'))
                                <div class="error">{{ $errors->first('nid') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>
                            <input type="text" name="fh_name" value="{{ old('fh_name') }}" class="form-control"/>
                            @if($errors->has('fh_name'))
                                <div class="error">{{ $errors->first('fh_name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>
                            <input type="text" value="{{ old('mother_name') }}" name="mother_name"
                                   class="form-control"/>
                            @if($errors->has('mother_name'))
                                <div class="error">{{ $errors->first('mother_name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>
                            <select name="union_id" class="form-control">
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach($unions as $union)
                                    <option
                                        @if(!empty(old('union_id')) && $union->id == old('union_id')) selected
                                        @endif value="{{ $union->id }}">{{ $union->union_name }}</option>
                                @endforeach

                            </select>
                            @if($errors->has('union_id'))
                                <div class="error">{{ $errors->first('union_id') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <input type="text" name="village" value="{{ old('village') }}" class="form-control"/>
                            @if($errors->has('village'))
                                <div class="error">{{ $errors->first('village') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং</label>
                            <select name="ward" class="form-control">
                                <option value="">---নির্বাচন করুন---</option>
                                <option
                                    @if(!empty(old('ward')) && old('ward') == 1) selected
                                    @endif  value="1">1
                                </option>
                                <option
                                    @if(!empty(old('ward')) && old('ward') == 2) selected
                                    @endif  value="2">2
                                </option>
                                <option @if(!empty(old('ward')) && old('ward') == 3) selected
                                        @endif  value="3">3
                                </option>
                            </select>
                            @if($errors->has('ward'))
                                <div class="error">{{ $errors->first('ward') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>
                            <input type="text" name="mobile" class="form-control"/>
                            @if($errors->has('mobile'))
                                <div class="error">{{ $errors->first('mobile') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ছবি (সর্বচ্চ ৫০ কে.বি)</label>
                            <input type="file" name="photo" class="form-control"/>
                            @if($errors->has('photo'))
                                <div class="error">{{ $errors->first('photo') }}</div>
                            @endif
                        </div><!-- form-group -->
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">সংরক্ষন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
@endsection
