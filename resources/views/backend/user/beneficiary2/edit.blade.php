@extends('layouts.backend')
@section('title','জিআরক্যাশ উপকারভোগী সংযোজন')
@section('content')
    <div class="mainpanel">
        <div class="contentpanel">
            {{--                        {{ dd($beneficiary) }}--}}
            @include('backend.include.flash')
            <form method="post" action="{{ route('admin.update-vgd-beneficiary',$beneficiary->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>
                            <input type="text" name="card_no"
                                   value="@if(!empty(old('card_no'))) {{ old('card_no') }} @else {{ $beneficiary->card_no }} @endif"
                                   class="form-control"/>
                            @if($errors->has('card_no'))
                                <div class="error">{{ $errors->first('card_no') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>
                            <input type="text"
                                   value="@if(!empty(old('nid'))) {{ old('nid') }} @else {{ $beneficiary->nid }} @endif"
                                   name="nid" class="form-control"/>
                            @if($errors->has('nid'))
                                <div class="error">{{ $errors->first('nid') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>
                            <input type="text" name="name"
                                   value="@if(!empty(old('name'))) {{ old('name') }} @else {{ $beneficiary->name }} @endif"
                                   class="form-control"/>
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>
                            <input type="text" name="fh_name"
                                   value="@if(!empty(old('fh_name'))) {{ old('fh_name') }} @else {{ $beneficiary->fh_name }} @endif"
                                   class="form-control"/>
                            @if($errors->has('fh_name'))
                                <div class="error">{{ $errors->first('fh_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>
                            <input type="text"
                                   value="@if(!empty(old('mother_name'))) {{ old('mother_name') }} @else {{ $beneficiary->mother_name }} @endif"
                                   name="mother_name"
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
                                    <option @if($union->id == $beneficiary->union_id) selected
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
                            <input type="text" name="village"  value="@if(!empty(old('village'))) {{ old('village') }} @else {{ $beneficiary->village }} @endif" class="form-control"/>
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
                                    @elseif($beneficiary->union_id == 1)
                                    selected
                                    @endif  value="1">1
                                </option>
                                <option
                                    @if(!empty(old('ward')) && old('ward') == 2) selected
                                    @elseif($beneficiary->union_id == 2)
                                    selected
                                    @endif  value="2">2
                                </option>
                                <option @if(!empty(old('ward')) && old('ward') == 3) selected
                                        @elseif($beneficiary->union_id == 3)
                                        selected
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
                            <input type="text"
                                   value="@if(!empty(old('mobile'))) {{ old('mobile') }} @else {{ $beneficiary->mobile }} @endif"
                                   name="mobile" class="form-control"/>
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
                <button type="submit" class="btn btn-primary">সম্পাদন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
@endsection
