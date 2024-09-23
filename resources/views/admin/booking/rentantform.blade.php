<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>House-Flat Owner/Renter Reservation Form</title>
    <style>
        .text-center{
            text-align: center !important;
        }
        body {
            font-family: 'Nikosh', sans-serif;
            background-color: #f1f1f1;
        }
        @media print {
            @page {
                size: A4;
                margin: 0mm;
            }
        }
        .container {
            width: 210mm;
            height: 297mm;
            padding: 6mm;
            margin: 0 auto;
            box-sizing: border-box;
            background-color: #fff;
        }

        h1,
        h2 {
            text-align: center;
            margin: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .section-title {
            font-size: 13px;
            text-align: left;
            padding: 5px 8px;
            position: relative;
        }

        .section-title span {
            width: 100%;
        }

        .small-text {
            font-size: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .header .header_top {
            margin: 0 25px;
            font-size: 12px;
            text-align: left;
        }

        .second_title {
            position: relative;
        }

        .second_title::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translate(-50%, 0);
            background-color: black;
            width: 100%;
            height: 1px;
        }

        .second_title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translate(-50%, 0);
            background-color: black;
            width: 100%;
            height: 1px;
        }

        .header {
            margin-bottom: 30px;
            text-align: center;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            height: 20px;
        }

        table tr td {
            font-size: 13px;
            text-align: center;
        }

        table {
            margin-left: 40px;
            border: 1px solid;
            width: 660px;
        }

        .straight_line {
            position: relative;
            font-size: 14px;
            padding: 0 24px;
        }

        .straight_line::before {
            content: "";
            position: absolute;
            bottom: 0px;
            left: 0;
            border-bottom: 1px dashed #000;
            height: 1px;
        }

        .straight_line001::before {
            width: 215px;
        }

        .section-title .straight_line1::before {
            width: 615px;
        }

        .section-title .straight_line2::before {
            width: 640px;
        }

        .section-title p {
            display: inline-block;
            width: 360px;
            margin: 0;
        }

        .section-title .straight_line3::before {
            width: 268px;
        }

        .section-title .straight_line4::before {
            width: 633px;
        }

        .section-title .straight_line5::before {
            width: 555px;
        }

        .section-title p:first-child .straight_line6::before {
            width: 315px;
        }

        .section-title p:nth-child(2) .straight_line6::before {
            width: 258px;
        }

        .section-title .straight_line7::before {
            width: 580px;
        }

        .section-title .straight_line8::before {
            width: 565px;
        }

        .section-title .inner-title {
            display: flex;
            margin-left: 40px;
            padding: 6px 0;
        }

        .section-title .inner-title .title {
            width: 330px;
        }

        .section-title .straight_line10::before {
            width: 270px;
        }

        .section-title .straight_line11::before {
            width: 292px;
        }

        .section-title .straight_line12::before {
            width: 258px;
        }
        .section-title .straight_line13::before {
            width: 250px;
        }
        .section-title .inner-title1 {
            display: flex;
            padding: 6px 0;
        }
        .inner-title1:nth-child(2){
            margin-left: 26px;
        }
        .section-title .inner-title1 .title {
            width: 330px;
        }

        .section-title .straight_line14::before {
            width: 218px;
        }

        .section-title .straight_line15::before {
            width: 252px;
        }

        .section-title .straight_line16::before {
            width: 242px;
        }

        .section-title .straight_line17::before {
            width: 290px;
        }
        .section-title .inner-title2 {
            display: flex;
            padding: 6px 0;
        }
        .inner-title2:nth-child(2){
            margin-left: 26px;
        }
        .section-title .inner-title2 .title {
            width: 330px;
        }
        .section-title .inner-title2 .title:first-child {
            width: 380px;
        }

        .section-title .straight_line18::before {
            width: 218px;
        }

        .section-title .straight_line19::before {
            width: 258px;
        }

        .section-title .straight_line20::before {
            width: 620px;
        }
        .section-title .straight_line21::before {
            width: 555px;
        }
        .section-title .straight_line22::before {
            width: 300px;
        }
        .section-title .straight_line23::before {
            width: 195px;
        }
        .section-title .straight_line24::before {
            width: 405px;
        }
        .straight-line-section p:first-child {
            display: inline-block;
            width: 460px;
            margin: 0;
        }
        .straight-line-section p:nth-child(2) {
            display: inline-block;
            width: 200px;
            margin: 0;
        }
        .header .left .photo{
            border: 1px solid #6161619a;
            border-radius: 8px;
            height: 130px;
            width: 120px;
            position: relative;

        }
        .header .left .photo span{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            color: #6161619a;
            width: 100%;
        }
        .holding-infos{
            border: 1px solid #6161619a;
            border-radius: 8px;
            height: 150px;
            width: 175px;
            position: relative;
        }
        .holding-infos p{
            font-size: 12px;
            text-align: left;
            width: 95px;
            margin: 8px 0 0px 6px;
            padding: 0;
        }
        .holding-infos .holding-straight-line{
            position: relative;
        }
        .holding-infos .holding-straight-line::after{
            content: '';
            position: absolute;
            bottom: 6px;
            left: 2px;
            border-bottom: 1px dashed #000;
            height: 1px;
            width: 80px;
        }
        .center h2{
            position: relative;
        }
        .center h2 img{
            position: absolute;
            left: -40px;
            bottom: -10px;
        }

        .footer {
            margin-top: 60px;
            text-align: left;
            margin-left: 60px;
        }
        .footer .footer-info{
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }
        .footer .footer-info p{
            position: relative;
        }
        .footer .footer-info p::after{
            position: absolute;
            top: -10px;
            left: -40px;
            content: '';
            width: 120px;
            border-top: 1px dashed;
        }
        .footer .footer-info p:nth-child(2){
            margin-right: 60px;
        }
    </style>
</head>

<body>

    <div class="container" id="content">
        <div class="header">
            <div class="left">
                <div class="photo">
                    <span>ভাড়াটিয়ার এক কপি পাসপোর্ট সাইজ ছবি</span>
                    <img src="" alt="">
                </div>
            </div>
            <div class="center">

                <h2>
                    {{-- <img src="./(DMP)_logo.svg" alt="" width="45px" height="45px"> --}}
                    ঢাকা মেট্রোপলিটন পুলিশ
                </h2>
                <div class="header_top">
                    <p>বিভাগঃ <span class="straight_line straight_line001 text-center"></span></p>
                    <p>থানাঃ <span class="straight_line straight_line001 text-center"></span></p>
                </div>
                <h4 class="second_title">বাড়ি-ফ্ল্যাট মালিক/ভাড়াটিয়া নিবন্ধন ফরম</h4>
            </div>
            <div class="right">
                <div class="holding-infos">
                    <p>স্থাপনার প্রকৃতিঃ </p><span class="holding-straight-line"></span>
                    <p>ফ্ল্যাট/তলাঃ </p><span class="holding-straight-line"></span>
                    <p>বাড়ী/ হোল্ডিংঃ </p><span class="holding-straight-line"></span>
                    <p>রাস্তাঃ </p><span class="holding-straight-line"></span>
                    <p>এলাকাঃ </p><span class="holding-straight-line"></span>
                    <p>পোস্ট কোডঃ </p><span class="holding-straight-line"></span>
                </div>
            </div>

        </div>

        <div class="table">
            <div class="section-title ">
                <span>১। ভাড়াটিয়ার নাম:</span>
                <span class="straight_line straight_line1"></span>
            </div>
            <div class="section-title ">
                <span>২। পিতার নাম:</span>
                <span class="straight_line straight_line2"></span>
            </div>
            <div class="section-title">
                <p>৩। জন্ম তারিখ:<span class="straight_line straight_line3"></span></p>
                <p>বৈবাহিক অবস্থাঃ <span class="straight_line straight_line3"></span></p>
            </div>
            <div class="section-title ">
                ৪। স্থায়ী ঠিকানাঃ
                <span class="straight_line straight_line4"></span>

            </div>
            <div class="section-title ">
                ৫। পেশা ও প্রতিষ্ঠানের ঠিকানাঃ
                <span class="straight_line straight_line5"></span>
            </div>
            <div class="section-title ">
                <p>৬। ধর্মঃ<span class="straight_line straight_line6"></span></p>
                <p>শিক্ষাগত যোগ্যতাঃ <span class="straight_line straight_line6"></span></p>
            </div>
            <div class="section-title ">
                <p>৭। মোবাইল নংঃ<span class="straight_line straight_line3"></span></p>
                <p>ইমেইল আইডিঃ <span class="straight_line straight_line3"></span></p>
            </div>
            <div class="section-title ">
                ৮। জাতীয় পরিচয়পত্র নং:
                <span class="straight_line straight_line7"></span>
            </div>
            <div class="section-title ">
                ৯। পাসপোর্ট নং (যদি থাকে):
                <span class="straight_line straight_line8"></span>
            </div>
            <div class="section-title "> ১০। জরুরী যোগাযোগ</div>
            <div class="section-title">
                <div class="inner-title">
                    <div class="title">(ক) নামঃ <span class="straight_line straight_line10"></span></div>
                    <div class="title">(খ) সম্পর্ক <span class="straight_line straight_line11"></span></div>
                </div>
                <div class="inner-title">
                    <div class="title"> (গ) ঠিকানাঃ <span class="straight_line straight_line12"></span></div>
                    <div class="title"> (ঘ) মোবাইল নম্বরঃ <span class="straight_line straight_line13"></span></div>
                </div>
            </div>
            <div class="section-title ">
                ১১। পরিবার / মেসের সদস্যদের বিবরণঃ
                <table>
                    <tr>
                        <th style="width:4%">ক্রঃ নং</th>
                        <th style="width:30%">নাম</th>
                        <th style="width:5%">বয়স</th>
                        <th style="width:8%">পেশা</th>
                        <th style="width:10%">মোবাইল নম্বর</th>
                    </tr>
                    <tr>
                        <td>১।</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>২।</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>৩।</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="section-title ">
                <div class="inner-title1">
                    <div class="title">১২।  গৃহকর্মী নামঃ <span class="straight_line straight_line14"></span></div>
                        <div class="title">জাতীয় পরিচয়পত্র নং ঃ<span class="straight_line straight_line15"></span></div>
                </div>
                <div class="inner-title1">
                    <div class="title">মোবাইল নম্বরঃ <span class="straight_line straight_line16"></span></div>
                    <div class="title">স্থায়ী ঠিকানাঃ <span class="straight_line straight_line17"></span></div>
                </div>
            </div>
            <div class="section-title ">
                <div class="inner-title1">
                    <div class="title">১৩। ড্রাইভারের নামঃ <span class="straight_line straight_line14"></span></div>
                        <div class="title">জাতীয় পরিচয়পত্র নং ঃ<span class="straight_line straight_line15"></span></div>
                </div>
                <div class="inner-title1">
                    <div class="title">মোবাইল নম্বরঃ <span class="straight_line straight_line16"></span></div>
                    <div class="title">স্থায়ী ঠিকানাঃ <span class="straight_line straight_line17"></span></div>
                </div>
            </div>
            <div class="section-title ">
                <div class="inner-title2">
                    <div class="title">১৪।পূর্ববর্তী বাড়িওয়ালার নামঃ <span class="straight_line straight_line18"></span></div>
                    <div class="title">মোবাইল নম্বরঃ <span class="straight_line straight_line19"></span></div>
                        <!-- <div class="title">জাতীয় পরিচয়পত্র নং ঃ<span class="straight_line straight_line15"></span></div> -->
                </div>
                <div class="inner-title2">
                    <div class="title">স্থায়ী ঠিকানাঃ <span class="straight_line straight_line20"></span></div>
                </div>

            </div>

            <div class="section-title ">
                <span>১৫।পূর্ববর্তী বাসা ছাড়ার কারনঃ</span>
                <span class="straight_line straight_line21"></span>
            </div>
            <div class="section-title straight-line-section">
                <p>১৬। বর্তমান বাড়িওয়ালার নাম<span class="straight_line straight_line22"></span></p>
                <p>মোবাইল নং: <span class="straight_line straight_line23"></span></p>
            </div>
            <div class="section-title ">
                ১৭। ভাড়াটিয়া বাড়িতে কোন তারিখ থেকে বসবাস করছেন:
                <span class="straight_line straight_line24"></span>
            </div>

        </div>

        <div class="footer">
            <div class="footer-info">
                <p>তারিখ:</p>
                <p>স্বাক্ষর:</p>
            </div>
            <p class="small-text">বিঃ দ্রঃ এই ফরমের একটি কপি বাড়ির মালিক অবশ্যই সংরক্ষণ করবেন।</p>
        </div>

    </div>
