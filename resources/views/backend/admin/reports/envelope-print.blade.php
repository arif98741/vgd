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
            margin: 20px auto;
            width: 95%;
        }

        img {
            width: 50px;
            height: 50px;
        }


        .card-div {
            border: 1px solid #000;
            padding: 5px;

        }
    </style>
</head>
<body>

<div class="row">

    @foreach($Beneficiary as $beni )

        <div class="col-md-4 card-div">

            <div class="row">
                <div class="col-md-9">
                    <h5>মাননীয় প্রধানমন্ত্রীর উপহার</h5>
                    <h6>বাস্তাবায়নে: দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়</h6>
                </div>

                <div class="col-md-3">
                    <img src="https://vgd.melandahbhata.gov.bd/public/images/download.jpg" alt="">
                </div>
            </div>


            <ul>
                <li>কার্ড নং: {{ $beni->card_no }}, নামঃ  {{ $beni->name }}</li>
                <li>পিতা/স্বামীর নামঃ মোঃ  {{ $beni->fh_name }}, মাতার নামঃ  {{ $beni->mother_name }}</li>
                <li> ইউনিয়নঃ  {{ $beni->union->union_name }}, গ্রামঃ  {{ $beni->village }}, ওয়ার্ড নংঃ  {{ $beni->ward }}</li>
                <li>আইডি নংঃ  {{ $beni->nid }}, মোবাইল নংঃ  {{ $beni->mobile }}</li>
            </ul>
        </div>
    @endforeach


</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"
</body>
