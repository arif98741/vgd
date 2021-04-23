@extends('layouts.backend')
@section('title','গুদামে মাল মজুদ করুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>গুদামে মাল মজুদ করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{url('admin/add/stock')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন</label>
                                    <select data-placeholder="Choose One" name="union_id" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach($unions as $key=> $union)
                                            <option value="{{ $union->id }}">{{ $union->union_name }}</option>
                                        @endforeach

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">মাস</label>

                                    <select data-placeholder="Choose One" name="month" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach($months as $key=> $month)
                                            <option value="{{ $key }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">অর্থ বছর</label>
                                    <select data-placeholder="Choose One" name="year" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        <option value="2021" selected>২০২১-২০২২</option>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">পরিমাণ (ইংরেজিতে লিখুন)</label>
                                    <input type="number" name="amount" class="form-control" required/>

                                </div>
                            </div>


                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> সংরক্ষন
                        </button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
            </form>
        </div><!-- panel -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger"> গুদামে মজুদকৃত চাউল তালিকা </h2>
            {{--            মাস বিতরণ করুন--}}
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>ইউনিয়ন</th>
                    <th>মাস</th>
                    <th>পরিমাণ</th>
                    <th>সংযোজন তারিখ</th>
                </tr>
                </thead>

                <tbody>

                @foreach($stocks as $key=> $stock)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $stock->union->union_name }}</td>
                        <td>{{ \App\Providers\HelperProvider::getBengaliName($stock->month) }}</td>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ $stock->amount }}</span></td>
                        <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($stock->created_at)) }}</span>
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
        $(document).ready(function () {
            var table = $('#basicTable').DataTable({
                pageLength: 25, //hello bos
            });
        });
    </script>
@endsection

