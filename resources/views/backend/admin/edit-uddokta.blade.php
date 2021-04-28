@extends('layouts.backend')
@section('title','উদ্যোক্তা সম্পাদনা')
@section('content')
    <div class="mainpanel">

        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="media-body">

                    @if($user->role == 1)
                        <h4>এডমিন সম্পাদনা</h4>
                    @endif

                    @if($user->role == 2)
                        <h4>উদ্যোক্তা সম্পাদনা - {{ $user->union->union_name }} ইউনিয়ন</h4>
                    @endif


                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            <form method="post" action="{{ url('admin/uddokta/edit/'.$user->id)  }}"
                  enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">নাম</label>
                            <input type="text" name="name"
                                   value="{{ $user->name }}"
                                   class="form-control"/>
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">পাসওয়ার্ড</label>
                            <input type="password" name="password"
                                   class="form-control"/>
                            @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">সম্পাদন</button>

            </form><!-- panel-wizard -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
