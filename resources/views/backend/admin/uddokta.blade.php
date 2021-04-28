@extends('layouts.backend')
@section('title','এডমিন ড্যাশবোর্ড')
@section('content')
    <div class="mainpanel">

        @include('backend.include.pageheader')

        <div class="contentpanel">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ক্রমিক</th>
                    <th>ইউনিয়ন</th>
                    <th>নাম</th>
                    <th>ইউজারনেইম</th>
                    <th>ইউজার রোল</th>
                    <th>একশন</th>
                </tr>
                </thead>

                <tbody>
                @foreach($unionUsers as $key=> $unionUser)

                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td>
                            @if($unionUser->role == 1)
                                -

                            @else
                                {{ $unionUser->union->union_name }}

                            @endif
                        </td>
                        <td>{{ $unionUser->name }}</td>
                        <td>{{ $unionUser->email }}</td>
                        <td>

                            @if($unionUser->role == 1)
                                এডমিন
                            @else
                                ইউনিয়ন

                            @endif
                        </td>

                        <td><a href="{{ url('/admin/uddokta/edit/'.$unionUser->id) }}"
                               class="btn btn-primary btn-sm">সম্পাদন</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
