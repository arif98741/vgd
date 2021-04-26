@extends('public.app')
@section('title', 'ভিজিডি ম্যানেজমেন্ট সিস্টেম - VGD Management System')
@section('content')

    <div class="container bg-white">

        <div class="row">
            <div class="col-md-9">
                <h3>ইউনিয়নঃ {{ $union->union_name }}</h3>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>ক্রমিক</th>
                            <th>নাম</th>
                            <th>পিতা/স্বামী</th>
                            <th>মাতা</th>
                            <th>ওয়ার্ড</th>
                            <th>গ্রাম</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($beneficiaries as $key=> $beneficiary)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $beneficiary->name }}</td>
                                <td>{{ $beneficiary->fh_name }}</td>
                                <td>{{ $beneficiary->mother_name }}</td>
                                <td>{{ $beneficiary->ward }}</td>
                                <td>{{ $beneficiary->village }}</td>
                            </tr>

                        @endforeach

                        <tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 text-center mt-5">
                <div class="porikolpona-head mb-2 mt-5 animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>পরিকল্পনায়</h5>
                    <img src="{{asset('/images/chairman.jpg')}}" alt="ইন্জিঃ মোঃ কামরুজ্জামান {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <p>ইন্জিঃ মোঃ কামরুজ্জামান <br> উপজেলা চেয়ারম্যান <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="porikolpona-head mb-2 mt-5 animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>বাস্তবায়নে</h5>
                    <img src="{{asset('/images/uno.jpg')}}" alt="তামিম আল ইয়ামীন {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <p>তামিম আল ইয়ামীন <br> উপজেলা নির্বাহী অফিসার <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/ap.jpg')}}" alt="মোঃ মোবারক হোসেন {{ url('/') }}">
                    <p>মোঃ মোবারক হোসেন <span> <br/> সহকারী প্রোগ্রামার <br/> তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর <br/> মেলান্দহ, জামালপুর।</span>
                    </p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/zohurul.jpg')}}" alt="মোঃ জহুরুল ইসলাম {{ url('/') }}">
                    <p>মোঃ জহুরুল ইসলাম <span> <br/> উদ্যোক্তা ও ডেভেলপার <br/> ৪ নং নাংলা ইউপি <br/> মেলান্দহ, জামালপুর।</span>
                    </p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/ariful-islam.jpg')}}" alt="Ariful Islam - {{ url('/') }}">
                    <p>আরিফুল ইসলাম <span>
                            <br/> সফটওয়্যার ইঞ্জিনিয়ার
                            <br>
                            কালিহাতি, টাংগাইল।</span>
                    </p>
                </div>
            </div>
        </div>


    </div>
@endsection

