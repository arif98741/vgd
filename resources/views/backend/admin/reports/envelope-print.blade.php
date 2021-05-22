<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>খাম পিন্ট করুন</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://vgd.melandahbhata.gov.bd/public/asset/backend/css/envelope.css" rel="stylesheet">
    <style type="text/css">

        body {
            margin: 10px auto;
            width: 95%;
        }

        /*img {*/
        /*    width: 50px;*/
        /*    height: 50px;*/
        /*}*/
        .card-div p {
            margin: 0;
        }

        .card-div {
            border: 1px solid #000;
            padding: 10px;
        }
        ul {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }
        .card-div ul li {
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="row">

    @foreach($Beneficiary as $beni )
        <div class="col-md-3 card-div">
             <p class="text-center">পবিত্র ঈদ-উল ফিতর উপলক্ষ্যে</p>
            <ul>
                <li>কার্ড: {{ $beni->card_no }}</li>
                <li>নামঃ {{ $beni->name }}</li>
                <li>ওয়ার্ডঃ {{ $beni->ward }}</li>
                <li>পিতা/স্বামীর নামঃ {{ $beni->fh_name }}</li>
                <li>মাতার নামঃ {{ $beni->mother_name }}</li>
                <li>গ্রামঃ {{ $beni->village }}</li>
                <li>আইডিঃ {{ $beni->nid }}</li>
                <li>মোবাইলঃ {{ $beni->mobile }}</li>
                <li>বিঃদ্রঃ অবশ্যই মোবাইলটি সাথে নিয়ে আসতে হবে</li>
            </ul>
        </div>
    @endforeach
{{--    ইউনিয়নঃ  {{ $beni->union->union_name }},--}}


</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"
</body>
