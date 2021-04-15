<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>খাম পিন্ট করুন</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{ asset('asset/backend/css/envelope.css')}}" rel="stylesheet">
</head>
<body>

    @foreach($Beneficiary as $row)
    <div class="container print-design">
        <div class="row">
            <div class="col-md-12">
                <div class="header-area">
                    <h4>মাননীয় প্রধানমন্ত্রীর উপহার</h4>
                    <h5>বাস্তাবায়নে: দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়</h5>
                </div>
                <div class="header-img">
                    <img src="{{asset('images/download.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <ul>
                    <li>কার্ড নং: {{$row->card_no}} , নাম: {{$row->name}}, পিতা/স্বামীর নাম: {{$row->fh_name}}</li>
                    <li>মাতার নাম: {{$row->mother_name}}, ইউনিয়ন: {{$row->union_name}}, গ্রাম: {{$row->village}}</li>
                    <li>ওয়ার্ড নং: {{$row->ward}}, ভোটার আইডি নং: {{$row->nid}}</li>
                    <li>মোবাইল নং: {{$row->mobile}}</li>
                </ul>
            </div>
        </div>
    </div>

    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"
</body>
