@extends('public.app')
@section('title', 'মেলান্দহ উপজেলার সকল উপকারভোগীর ডাটাবেইজ')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-9 mt-1">
                <div class="pm">
                    <a href="https://www.youtube.com/watch?v=v1R-CB3e-pw" target="_blank" title="শেখ হাসিনা">
                        <img src="{{asset('images/National-Portal-Card-PM.jpeg')}}" alt="National-Portal-Card-PM">
                    </a>
                </div>

                <div class="scroll">
                    <h3>
                        <marquee direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">
                            নো মাস্ক নো সার্ভিস। করোনাভাইরাসের বিস্তার রোধে এখনই ডাউনলোড করুন Corona Tracer BD অ্যাপ। ডাউনলোড করতে ক্লিক করুন <a href="https://bit.ly/coronatracerbd" target="_blank" style="color: blue;" title="https://bit.ly/coronatracerbd">https://bit.ly/coronatracerbd</a>। নিজে সুরক্ষিত থাকুন অন্যকেও নিরাপদ রাখুন। দেশের প্রথম ক্রাউডফান্ডিং প্ল্যাটফর্ম 'একদেশ'- এর মাধ্যমে আর্থিক অনুদান পৌঁছে দিন নির্বাচিত সরকারি-বেসরকারি প্রতিষ্ঠানসমূহে। ভিজিট করুন <a href="//ekdesh.ekpay.gov.bd" target="_blank" style="color: blue;" title="ekdesh.ekpay.gov.bd">ekdesh.ekpay.gov.bd</a> অথবা <a href="//play.google.com/store/apps/details?id=com.synesis.donationapp" target="_blank" style="color: blue;" title="“Ek Desh”">“Ek Desh”</a> অ্যাপ ডাউনলোড করুন। করোনার লক্ষণ দেখা দিলে গোপন না করে ডাক্তারের পরামর্শের জন্য ফ্রি কল করুন ৩৩৩ ও ১৬২৬৩ নম্বরে। করোনাভাইরাস প্রতিরোধে নিয়ম মেনে মাস্ক ব্যবহার করুন। আতঙ্কিত না হয়ে বরং সচেতন থাকুন। ভিজিট করুন <a href="//corona.gov.bd" target="_blank" style="color: blue;" title="corona.gov.bd">corona.gov.bd</a>
                        </marquee>
                    </h3>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="porikolpona-head mb-2 mt-5 animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>পরিকল্পনায়</h5>
                    <img src="{{asset('/images/chairman.jpg')}}" alt="">
                </div>
                <div class="single-team-item animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <p>ইন্জিঃ মোঃ কামরুজ্জামান <br> উপজেলা চেয়ারম্যান <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="porikolpona-head mb-2 mt-5 animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>বাস্তবায়নে</h5>
                    <img src="{{asset('/images/uno.jpg')}}" alt="">
                </div>
                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <p>তামিম আল ইয়ামীন <br> উপজেলা নির্বাহী অফিসার <br> মেলান্দহ জামালপুর </p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9">
                <h2 class="animated fadeInUp">জামালপুর জেলা মেলান্দহ উপজেলা ভিজিডি উপকারভোগী</h2>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>ইউনিয়নের নাম</th>
                            <th>ভিজিডি</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>দুরমুঠ</td>
                                <td>240</td>
                            </tr>
                            <tr>
                                <td>কুলিয়া</td>
                                <td>289</td>
                            </tr>
                            <tr>
                                <td>মাহমুদপুর</td>
                                <td>378</td>
                            </tr>
                            <tr>
                                <td>নাংল</td>
                                <td>270</td>
                            </tr>
                            <tr>
                                <td>নয়ানগর</td>
                                <td>262</td>
                            </tr>
                            <tr>
                                <td>আদ্রা</td>
                                <td>273</td>
                            </tr>
                            <tr>
                                <td>চরবানিপাকুরিয়া</td>
                                <td>331</td>
                            </tr>
                            <tr>
                                <td>ফুলকোচা</td>
                                <td>273</td>
                            </tr>
                            <tr>
                                <td>ঘোষেরপাড়া</td>
                                <td>356</td>
                            </tr>
                            <tr>
                                <td>ঝাউগড়া</td>
                                <td>287</td>
                            </tr>
                            <tr>
                                <td>শ্যামপুর</td>
                                <td>183</td>
                            </tr>
                            <tr>
                                <td>মোট</td>
                                <td>3142</td>
                            </tr>
                        <tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/ap.jpg')}}" alt="">
                    <p>মোঃ মোবারক হোসেন <span> <br/> সহকারী প্রোগ্রামার <br/> তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর <br/> মেলান্দহ, জামালপুর।</span></p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/zohurul.jpg')}}" alt="">
                    <p>মোঃ জহুরুল ইসলাম <span> <br/> উদ্যোক্তা ও ডেভেলপার <br/> ৪ নং নাংলা ইউপি <br/> মেলান্দহ, জামালপুর।</span></p>
                </div>
            </div>
        </div>


    </div>
@endsection

