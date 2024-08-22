<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</title>
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
   <!-- Favicon -->
   <link rel="shortcut icon" href="logooncb-onweb_png.png" type="image/x-icon">
    <!-- Custom Fonts Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/custom_fonts/fonts.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/fontawesome/css/all.min.css">
    <!-- Elegant Icons Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/elegant/css/style.css">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.theme.default.css">
    <!-- Custom Style Css -->
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/style.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Require -->
    <link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
    <link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    {another_css}
    <!-- {another_css} -->
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .process-row {
            display: table-row;
        }

        .process {
            display: table;
            width: 100%;
            position: relative;
        }

        .process-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .process-row:before {
            top: 50px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;

        }

        .process-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .process-step p {
            margin-top: 10px;

        }

        .btn-circle {
            width: 100px;
            height: 100px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>

    <script>
        var baseURL = '{base_url}/';
        var siteURL = '{site_url}/';
        var csrf_token_name = '{csrf_token_name}';
        var csrf_cookie_name = '{csrf_cookie_name}';
    </script>
</head>

<body>


    <div id="homepage-three" class="overflow-hidden">

        <header class="position-absolute">

            {top_navbar}
        </header>


        <section class="inner-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-12" class="text">
                        <span class="text">Assessment</span>
                        <h3 class="hero-text">แบบประเมิน</h3>
                        <h5><a href="index.html" class="text">Home</a> - Assessment</h5>
                    </div>
                </div>
            </div>
        </section>

        <section id="ms-disease-sec">
            <div class="container">
            <div class="row">
                    
                    <div class="col-lg-3 col-sm-3" style="text-align:center;">
                        <a href="{site_url}assessment/assessment1/add">
                            <img src="{base_url}assets/images/icon/form1_gray.png" style="width: 150px;height: 150px;">
                            <p style="text-align:center;">ข้อมูลพื้นฐาน</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="text-align:center;">
                        <a href="{site_url}assessment/assessment2/add">
                            <img src="{base_url}assets/images/icon/form2_gray.png" style="width: 150px;height: 150px;">
                            <p style="text-align:center;">ปัจจัยภูมิคุ้มกัน</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="text-align:center;">
                        <a href="{site_url}assessment/assessment3/add">
                            <img src="{base_url}assets/images/icon/form3.png" style="width: 150px;height: 150px;">
                            <p style="text-align:center;">ปัจจัยบริบท</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="text-align:center;">
                        <a href="{site_url}assessment/assessment4/add">
                            <img src="{base_url}assets/images/icon/form4_gray.png" style="width: 150px;height: 150px;">
                            <p style="text-align:center;">พฤติกรรมเสี่ยง</p>
                        </a>
                    </div>


                </div>


                <!-- [ View File name : add_view.php ] -->
                <div class="card">

                    <div class="card-body">
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="font-weight-bold">ตอนที่ 3 ปัจจัยบริบท</h3>
                            </div>
                        </div>
                        <hr />
                        <form class="form-horizontal" id="formAdd" accept-charset="utf-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <legend>3.1 การคล้อยตาม <span style="color:red;">*</span></legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่จริง</th>
                                            <th style="text-align: center;">ค่อนข้างไม่จริง</th>
                                            <th style="text-align: center;">ค่อนข้างจริง</th>
                                            <th style="text-align: center;">จริง</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="1" id="quest_1_1-1"></td>
                                                <td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="2" id="quest_1_1-2"></td>
                                                <td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="3" id="quest_1_1-3"></td>
                                                <td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="4" id="quest_1_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา </td>
                                                <td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="1" id="quest_2_1-1"></td>
                                                <td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="2" id="quest_2_1-2"></td>
                                                <td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="3" id="quest_2_1-3"></td>
                                                <td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="4" id="quest_2_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน</td>
                                                <td><input type="radio" name="quest_3" data-record-value="{record_quest_3}" value="1" id="quest_3_1-1"></td>
                                                <td><input type="radio" name="quest_3" data-record-value="{record_quest_3}" value="2" id="quest_3_1-2"></td>
                                                <td><input type="radio" name="quest_3" data-record-value="{record_quest_3}" value="3" id="quest_3_1-3"></td>
                                                <td><input type="radio" name="quest_3" data-record-value="{record_quest_3}" value="4" id="quest_3_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด</td>
                                                <td><input type="radio" name="quest_4" data-record-value="{record_quest_4}" value="4" id="quest_4_1-1"></td>
                                                <td><input type="radio" name="quest_4" data-record-value="{record_quest_4}" value="3" id="quest_4_1-2"></td>
                                                <td><input type="radio" name="quest_4" data-record-value="{record_quest_4}" value="2" id="quest_4_1-3"></td>
                                                <td><input type="radio" name="quest_4" data-record-value="{record_quest_4}" value="1" id="quest_4_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน </td>
                                                <td><input type="radio" name="quest_5" data-record-value="{record_quest_5}" value="1" id="quest_5_1-1"></td>
                                                <td><input type="radio" name="quest_5" data-record-value="{record_quest_5}" value="2" id="quest_5_1-2"></td>
                                                <td><input type="radio" name="quest_5" data-record-value="{record_quest_5}" value="3" id="quest_5_1-3"></td>
                                                <td><input type="radio" name="quest_5" data-record-value="{record_quest_5}" value="4" id="quest_5_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ </td>
                                                <td><input type="radio" name="quest_6" data-record-value="{record_quest_6}" value="1" id="quest_6_1-1"></td>
                                                <td><input type="radio" name="quest_6" data-record-value="{record_quest_6}" value="2" id="quest_6_1-2"></td>
                                                <td><input type="radio" name="quest_6" data-record-value="{record_quest_6}" value="3" id="quest_6_1-3"></td>
                                                <td><input type="radio" name="quest_6" data-record-value="{record_quest_6}" value="4" id="quest_6_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน </td>
                                                <td><input type="radio" name="quest_7" data-record-value="{record_quest_7}" value="1" id="quest_7_1-1"></td>
                                                <td><input type="radio" name="quest_7" data-record-value="{record_quest_7}" value="2" id="quest_7_1-2"></td>
                                                <td><input type="radio" name="quest_7" data-record-value="{record_quest_7}" value="3" id="quest_7_1-3"></td>
                                                <td><input type="radio" name="quest_7" data-record-value="{record_quest_7}" value="4" id="quest_7_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด </td>
                                                <td><input type="radio" name="quest_8" data-record-value="{record_quest_8}" value="4" id="quest_8_1-1"></td>
                                                <td><input type="radio" name="quest_8" data-record-value="{record_quest_8}" value="3" id="quest_8_1-2"></td>
                                                <td><input type="radio" name="quest_8" data-record-value="{record_quest_8}" value="2" id="quest_8_1-3"></td>
                                                <td><input type="radio" name="quest_8" data-record-value="{record_quest_8}" value="1" id="quest_8_1-4"></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <hr />
                                    <br />
                                    <legend>3.2 ครอบครัว <span style="color:red;">*</span></legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่เคย</th>
                                            <th style="text-align: center;">นาน ๆ ครั้ง</th>
                                            <th style="text-align: center;">บ่อยครั้ง</th>
                                            <th style="text-align: center;">เป็นประจำ</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ฉันถูกทำร้ายร่างกายจากคนในครอบครัว </td>
                                                <td><input type="radio" name="quest_9" data-record-value="{record_quest_9}" value="1" id="quest_9_1-1"></td>
                                                <td><input type="radio" name="quest_9" data-record-value="{record_quest_9}" value="2" id="quest_9_1-2"></td>
                                                <td><input type="radio" name="quest_9" data-record-value="{record_quest_9}" value="3" id="quest_9_1-3"></td>
                                                <td><input type="radio" name="quest_9" data-record-value="{record_quest_9}" value="4" id="quest_9_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ </td>
                                                <td><input type="radio" name="quest_10" data-record-value="{record_quest_10}" value="1" id="quest_10_1-1"></td>
                                                <td><input type="radio" name="quest_10" data-record-value="{record_quest_10}" value="2" id="quest_10_1-2"></td>
                                                <td><input type="radio" name="quest_10" data-record-value="{record_quest_10}" value="3" id="quest_10_1-3"></td>
                                                <td><input type="radio" name="quest_10" data-record-value="{record_quest_10}" value="4" id="quest_10_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ</td>
                                                <td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="1" id="quest_11_1-1"></td>
                                                <td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="2" id="quest_11_1-2"></td>
                                                <td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="3" id="quest_11_1-3"></td>
                                                <td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="4" id="quest_11_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย </td>
                                                <td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="1" id="quest_12_1-1"></td>
                                                <td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="2" id="quest_12_1-2"></td>
                                                <td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="3" id="quest_12_1-3"></td>
                                                <td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="4" id="quest_12_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย </td>
                                                <td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="1" id="quest_13_1-1"></td>
                                                <td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="2" id="quest_13_1-2"></td>
                                                <td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="3" id="quest_13_1-3"></td>
                                                <td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="4" id="quest_13_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว </td>
                                                <td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="4" id="quest_14_1-1"></td>
                                                <td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="3" id="quest_14_1-2"></td>
                                                <td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="2" id="quest_14_1-3"></td>
                                                <td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="1" id="quest_14_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน </td>
                                                <td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="1" id="quest_15_1-1"></td>
                                                <td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="2" id="quest_15_1-2"></td>
                                                <td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="3" id="quest_15_1-3"></td>
                                                <td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="4" id="quest_15_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>ฉันถูกห้ามไม่ให้คบเพื่อนบางคน </td>
                                                <td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="1" id="quest_16_1-1"></td>
                                                <td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="2" id="quest_16_1-2"></td>
                                                <td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="3" id="quest_16_1-3"></td>
                                                <td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="4" id="quest_16_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน </td>
                                                <td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="1" id="quest_17_1-1"></td>
                                                <td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="2" id="quest_17_1-2"></td>
                                                <td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="3" id="quest_17_1-3"></td>
                                                <td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="4" id="quest_17_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>ฉันถูกห้ามไม่ให้ออกนอกบ้าน </td>
                                                <td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="1" id="quest_18_1-1"></td>
                                                <td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="2" id="quest_18_1-2"></td>
                                                <td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="3" id="quest_18_1-3"></td>
                                                <td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="4" id="quest_18_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ </td>
                                                <td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="1" id="quest_19_1-1"></td>
                                                <td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="2" id="quest_19_1-2"></td>
                                                <td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="3" id="quest_19_1-3"></td>
                                                <td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="4" id="quest_19_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น </td>
                                                <td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="1" id="quest_20_1-1"></td>
                                                <td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="2" id="quest_20_1-2"></td>
                                                <td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="3" id="quest_20_1-3"></td>
                                                <td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="4" id="quest_20_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน </td>
                                                <td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="1" id="quest_21_1-1"></td>
                                                <td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="2" id="quest_21_1-2"></td>
                                                <td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="3" id="quest_21_1-3"></td>
                                                <td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="4" id="quest_21_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ </td>
                                                <td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="4" id="quest_22_1-1"></td>
                                                <td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="3" id="quest_22_1-2"></td>
                                                <td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="2" id="quest_22_1-3"></td>
                                                <td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="1" id="quest_22_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน </td>
                                                <td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="1" id="quest_23_1-1"></td>
                                                <td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="2" id="quest_23_1-2"></td>
                                                <td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="3" id="quest_23_1-3"></td>
                                                <td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="4" id="quest_23_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา </td>
                                                <td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="1" id="quest_24_1-1"></td>
                                                <td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="2" id="quest_24_1-2"></td>
                                                <td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="3" id="quest_24_1-3"></td>
                                                <td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="4" id="quest_24_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้ </td>
                                                <td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="1" id="quest_25_1-1"></td>
                                                <td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="2" id="quest_25_1-2"></td>
                                                <td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="3" id="quest_25_1-3"></td>
                                                <td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="4" id="quest_25_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน </td>
                                                <td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="1" id="quest_26_1-1"></td>
                                                <td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="2" id="quest_26_1-2"></td>
                                                <td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="3" id="quest_26_1-3"></td>
                                                <td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="4" id="quest_26_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ </td>
                                                <td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="1" id="quest_27_1-1"></td>
                                                <td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="2" id="quest_27_1-2"></td>
                                                <td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="3" id="quest_27_1-3"></td>
                                                <td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="4" id="quest_27_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น</td>
                                                <td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="1" id="quest_28_1-1"></td>
                                                <td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="2" id="quest_28_1-2"></td>
                                                <td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="3" id="quest_28_1-3"></td>
                                                <td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="4" id="quest_28_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน </td>
                                                <td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="1" id="quest_29_1-1"></td>
                                                <td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="2" id="quest_29_1-2"></td>
                                                <td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="3" id="quest_29_1-3"></td>
                                                <td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="4" id="quest_29_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์ </td>
                                                <td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="1" id="quest_30_1-1"></td>
                                                <td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="2" id="quest_30_1-2"></td>
                                                <td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="3" id="quest_30_1-3"></td>
                                                <td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="4" id="quest_30_1-4"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <hr />
                                    <br />
                                    <legend>3.3 การเป็นแบบอย่าง <span style="color:red;">*</span></legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่เคย</th>
                                            <th style="text-align: center;">นาน ๆ ครั้ง</th>
                                            <th style="text-align: center;">บ่อยครั้ง</th>
                                            <th style="text-align: center;">เป็นประจำ</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์</td>
                                                <td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="1" id="quest_31_1-1"></td>
                                                <td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="2" id="quest_31_1-2"></td>
                                                <td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="3" id="quest_31_1-3"></td>
                                                <td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="4" id="quest_31_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น </td>
                                                <td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="1" id="quest_32_1-1"></td>
                                                <td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="2" id="quest_32_1-2"></td>
                                                <td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="3" id="quest_32_1-3"></td>
                                                <td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="4" id="quest_32_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ </td>
                                                <td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="1" id="quest_33_1-1"></td>
                                                <td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="2" id="quest_33_1-2"></td>
                                                <td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="3" id="quest_33_1-3"></td>
                                                <td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="4" id="quest_33_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น </td>
                                                <td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="1" id="quest_34_1-1"></td>
                                                <td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="2" id="quest_34_1-2"></td>
                                                <td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="3" id="quest_34_1-3"></td>
                                                <td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="4" id="quest_34_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ </td>
                                                <td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="1" id="quest_35_1-1"></td>
                                                <td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="2" id="quest_35_1-2"></td>
                                                <td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="3" id="quest_35_1-3"></td>
                                                <td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="4" id="quest_35_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น </td>
                                                <td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="1" id="quest_36_1-1"></td>
                                                <td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="2" id="quest_36_1-2"></td>
                                                <td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="3" id="quest_36_1-3"></td>
                                                <td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="4" id="quest_36_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ </td>
                                                <td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="1" id="quest_37_1-1"></td>
                                                <td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="2" id="quest_37_1-2"></td>
                                                <td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="3" id="quest_37_1-3"></td>
                                                <td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="4" id="quest_37_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="1" id="quest_38_1-1"></td>
                                                <td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="2" id="quest_38_1-2"></td>
                                                <td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="3" id="quest_38_1-3"></td>
                                                <td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="4" id="quest_38_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="1" id="quest_39_1-1"></td>
                                                <td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="2" id="quest_39_1-2"></td>
                                                <td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="3" id="quest_39_1-3"></td>
                                                <td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="4" id="quest_39_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>คนในชุมชนชักชวนให้ฉันใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="1" id="quest_40_1-1"></td>
                                                <td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="2" id="quest_40_1-2"></td>
                                                <td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="3" id="quest_40_1-3"></td>
                                                <td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="4" id="quest_40_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด </td>
                                                <td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="1" id="quest_41_1-1"></td>
                                                <td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="2" id="quest_41_1-2"></td>
                                                <td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="3" id="quest_41_1-3"></td>
                                                <td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="4" id="quest_41_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="1" id="quest_42_1-1"></td>
                                                <td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="2" id="quest_42_1-2"></td>
                                                <td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="3" id="quest_42_1-3"></td>
                                                <td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="4" id="quest_42_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="1" id="quest_43_1-1"></td>
                                                <td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="2" id="quest_43_1-2"></td>
                                                <td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="3" id="quest_43_1-3"></td>
                                                <td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="4" id="quest_43_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด </td>
                                                <td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="1" id="quest_44_1-1"></td>
                                                <td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="2" id="quest_44_1-2"></td>
                                                <td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="3" id="quest_44_1-3"></td>
                                                <td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="4" id="quest_44_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว </td>
                                                <td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="1" id="quest_45_1-1"></td>
                                                <td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="2" id="quest_45_1-2"></td>
                                                <td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="3" id="quest_45_1-3"></td>
                                                <td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="4" id="quest_45_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ </td>
                                                <td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="1" id="quest_46_1-1"></td>
                                                <td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="2" id="quest_46_1-2"></td>
                                                <td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="3" id="quest_46_1-3"></td>
                                                <td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="4" id="quest_46_1-4"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <hr />
                                    <br />
                                    <legend>3.4 การเปิดรับสื่อ <span style="color:red;">*</span></legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่เคย</th>
                                            <th style="text-align: center;">นาน ๆ ครั้ง</th>
                                            <th style="text-align: center;">บ่อยครั้ง</th>
                                            <th style="text-align: center;">เป็นประจำ</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ</td>
                                                <td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="1" id="quest_47_1-1"></td>
                                                <td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="2" id="quest_47_1-2"></td>
                                                <td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="3" id="quest_47_1-3"></td>
                                                <td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="4" id="quest_47_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันหาข้อมูลเกี่ยวกับวิธีการใช้สารเสพติดจากสื่อต่าง ๆ </td>
                                                <td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="1" id="quest_48_1-1"></td>
                                                <td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="2" id="quest_48_1-2"></td>
                                                <td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="3" id="quest_48_1-3"></td>
                                                <td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="4" id="quest_48_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ฉันติดตามข้อมูลเกี่ยวกับการซื้อขายสารเสพติดจากสื่อต่าง ๆ </td>
                                                <td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="1" id="quest_49_1-1"></td>
                                                <td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="2" id="quest_49_1-2"></td>
                                                <td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="3" id="quest_49_1-3"></td>
                                                <td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="4" id="quest_49_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันพูดคุยกับเพื่อนเกี่ยวกับการเสพหรือการขายสารเสพติดตามที่พบในสื่อต่าง ๆ </td>
                                                <td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="1" id="quest_50_1-1"></td>
                                                <td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="2" id="quest_50_1-2"></td>
                                                <td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="3" id="quest_50_1-3"></td>
                                                <td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="4" id="quest_50_1-4"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <hr />
                                    <br />
                                    <legend>3.5 พลังด้านต่าง ๆ <span style="color:red;">*</span> </legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่เลย</th>
                                            <th style="text-align: center;">บางครั้ง</th>
                                            <th style="text-align: center;">บ่อยครั้ง</th>
                                            <th style="text-align: center;">เป็นประจำ</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>พลังครอบครัว<span style="color:red;">*</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>การได้รับความรัก ความอบอุ่น เอาใจใส่ และการสนับสนุนในทางที่ดีจากครอบครัว</td>
                                                <td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="1" id="quest_51_1-1"></td>
                                                <td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="2" id="quest_51_1-2"></td>
                                                <td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="3" id="quest_51_1-3"></td>
                                                <td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="4" id="quest_51_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>การที่จะสามารถปรึกษาหารือ และขอคำแนะนำจากผู้ปกครองได้อย่างสบายใจไม่ว่าเรื่องเล็กหรือเรื่องใหญ่ </td>
                                                <td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="1" id="quest_52_1-1"></td>
                                                <td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="2" id="quest_52_1-2"></td>
                                                <td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="3" id="quest_52_1-3"></td>
                                                <td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="4" id="quest_52_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>การมีผู้ปกครองที่ส่งเสริม สนับสนุน ช่วยเหลือด้านการเรียนรู้</td>
                                                <td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="1" id="quest_53_1-1"></td>
                                                <td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="2" id="quest_53_1-2"></td>
                                                <td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="3" id="quest_53_1-3"></td>
                                                <td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="4" id="quest_53_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ความรู้สึกปลอดภัย อบอุ่น และมีความสุขเมื่ออยู่ในครอบครัวตัวเอง</td>
                                                <td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="1" id="quest_54_1-1"></td>
                                                <td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="2" id="quest_54_1-2"></td>
                                                <td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="3" id="quest_54_1-3"></td>
                                                <td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="4" id="quest_54_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>การที่ตนเองอยู่ในครอบครัวที่มีระเบียบกฎเกณฑ์ชัดเจน มีเหตุผล และมีการดูแลให้ปฏิบัติตาม </td>
                                                <td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="1" id="quest_55_1-1"></td>
                                                <td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="2" id="quest_55_1-2"></td>
                                                <td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="3" id="quest_55_1-3"></td>
                                                <td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="4" id="quest_55_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>การที่มีผู้ปกครองเป็นแบบอย่างที่ดีให้ทำตาม </td>
                                                <td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="1" id="quest_56_1-1"></td>
                                                <td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="2" id="quest_56_1-2"></td>
                                                <td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="3" id="quest_56_1-3"></td>
                                                <td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="4" id="quest_56_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>การมีผู้ปกครองที่สนับสนุนให้ทำในสิ่งที่ชอบหรืออยากทำ </td>
                                                <td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="1" id="quest_57_1-1"></td>
                                                <td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="2" id="quest_57_1-2"></td>
                                                <td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="3" id="quest_57_1-3"></td>
                                                <td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="4" id="quest_57_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>การที่จะสามารถพูดคุย แลกเปลี่ยนเรียนรู้เรื่องราวเกี่ยวกับสื่อ เช่น วิทยุ ทีวี สื่อประเภทอื่น ๆ ภายในครอบครัว </td>
                                                <td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="1" id="quest_58_1-1"></td>
                                                <td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="2" id="quest_58_1-2"></td>
                                                <td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="3" id="quest_58_1-3"></td>
                                                <td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="4" id="quest_58_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>พลังสร้างปัญญา <span style="color:red;">*</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>การอยู่ในสถาบันการศึกษาที่เอาใจใส่ สนับสนุนและช่วยเหลือผู้เรียนได้ดี</td>
                                                <td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="1" id="quest_59_1-1"></td>
                                                <td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="2" id="quest_59_1-2"></td>
                                                <td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="3" id="quest_59_1-3"></td>
                                                <td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="4" id="quest_59_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ความรู้สึกปลอดภัยเมื่ออยู่ในสถาบันการศึกษา </td>
                                                <td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="1" id="quest_60_1-1"></td>
                                                <td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="2" id="quest_60_1-2"></td>
                                                <td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="3" id="quest_60_1-3"></td>
                                                <td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="4" id="quest_60_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>การอยู่ในสถาบันการศึกษาที่มีระเบียบกฎเกณฑ์ชัดเจน มีเหตุผลและมีการดูแลให้ปฏิบัติตาม</td>
                                                <td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="1" id="quest_61_1-1"></td>
                                                <td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="2" id="quest_61_1-2"></td>
                                                <td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="3" id="quest_61_1-3"></td>
                                                <td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="4" id="quest_61_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>การที่มีครูสนับสนุนให้ทำในสิ่งที่ชอบหรืออยากทำ</td>
                                                <td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="1" id="quest_62_1-1"></td>
                                                <td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="2" id="quest_62_1-2"></td>
                                                <td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="3" id="quest_62_1-3"></td>
                                                <td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="4" id="quest_62_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>ความพยายามและอยากเรียนให้ได้ดี ไม่เอาเปรียบและรู้จักแบ่งปันผู้อื่น </td>
                                                <td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="1" id="quest_63_1-1"></td>
                                                <td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="2" id="quest_63_1-2"></td>
                                                <td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="3" id="quest_63_1-3"></td>
                                                <td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="4" id="quest_63_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>การเอาใจใส่ในการเรียนอย่างสม่ำเสมอ </td>
                                                <td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="1" id="quest_64_1-1"></td>
                                                <td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="2" id="quest_64_1-2"></td>
                                                <td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="3" id="quest_64_1-3"></td>
                                                <td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="4" id="quest_64_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>การทำการบ้านหรือทบทวนบทเรียน </td>
                                                <td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="1" id="quest_65_1-1"></td>
                                                <td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="2" id="quest_65_1-2"></td>
                                                <td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="3" id="quest_65_1-3"></td>
                                                <td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="4" id="quest_65_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>การมีความรักและผูกพันกับสถาบันการศึกษา </td>
                                                <td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="1" id="quest_66_1-1"></td>
                                                <td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="2" id="quest_66_1-2"></td>
                                                <td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="3" id="quest_66_1-3"></td>
                                                <td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="4" id="quest_66_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>การอ่านหนังสือด้วยความเพลิดเพลิน </td>
                                                <td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="1" id="quest_67_1-1"></td>
                                                <td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="2" id="quest_67_1-2"></td>
                                                <td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="3" id="quest_67_1-3"></td>
                                                <td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="4" id="quest_67_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>การใฝ่รู้ภูมิปัญญา และวัฒนธรรมของชุมชน </td>
                                                <td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="1" id="quest_68_1-1"></td>
                                                <td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="2" id="quest_68_1-2"></td>
                                                <td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="3" id="quest_68_1-3"></td>
                                                <td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="4" id="quest_68_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>การที่จะสามารถพูดคุย แลกเปลี่ยนเรียนรู้เรื่องราวเกี่ยวกับสื่อ เช่น วิทยุ ทีวี สื่อประเภทอื่น ๆ กับครูเป็นประจำ </td>
                                                <td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="1" id="quest_69_1-1"></td>
                                                <td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="2" id="quest_69_1-2"></td>
                                                <td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="3" id="quest_69_1-3"></td>
                                                <td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="4" id="quest_69_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>พลังเพื่อนและกิจกรรม <span style="color:red;">*</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>การมีเพื่อนสนิทที่เป็นแบบอย่างที่ดีและชักนำให้ทำดี</td>
                                                <td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="1" id="quest_70_1-1"></td>
                                                <td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="2" id="quest_70_1-2"></td>
                                                <td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="3" id="quest_70_1-3"></td>
                                                <td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="4" id="quest_70_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>การทำกิจกรรมสร้างสรรค์ตามความชอบและพึงพอใจ เช่น ทำงานศิลปะ เล่นดนตรี วาดรูป เป็นต้น </td>
                                                <td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="1" id="quest_71_1-1"></td>
                                                <td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="2" id="quest_71_1-2"></td>
                                                <td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="3" id="quest_71_1-3"></td>
                                                <td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="4" id="quest_71_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>การได้เล่นกีฬาหรือออกกำลังกายเป็นประจำ</td>
                                                <td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="1" id="quest_72_1-1"></td>
                                                <td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="2" id="quest_72_1-2"></td>
                                                <td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="3" id="quest_72_1-3"></td>
                                                <td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="4" id="quest_72_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>การเข้าร่วมกิจกรรมทางศาสนาหรือประกอบพิธีกรรม</td>
                                                <td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="1" id="quest_73_1-1"></td>
                                                <td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="2" id="quest_73_1-2"></td>
                                                <td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="3" id="quest_73_1-3"></td>
                                                <td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="4" id="quest_73_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>การที่ได้ชวนกันทำกิจกรรมที่ดีเป็นประจำร่วมกับเพื่อนๆ </td>
                                                <td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="1" id="quest_74_1-1"></td>
                                                <td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="2" id="quest_74_1-2"></td>
                                                <td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="3" id="quest_74_1-3"></td>
                                                <td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="4" id="quest_74_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>การมีโอกาสเข้าร่วมกิจกรรมเกี่ยวกับสื่อที่สร้างสรรค์กับเพื่อน </td>
                                                <td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="1" id="quest_75_1-1"></td>
                                                <td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="2" id="quest_75_1-2"></td>
                                                <td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="3" id="quest_75_1-3"></td>
                                                <td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="4" id="quest_75_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>พลังชุมชน <span style="color:red;">*</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>การที่มีญาติหรือผู้ใหญ่ นอกเหนือจากผู้ปกครองที่สามารถปรึกษาหารือและขอความช่วยเหลือได้อย่างสบายใจ</td>
                                                <td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="1" id="quest_76_1-1"></td>
                                                <td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="2" id="quest_76_1-2"></td>
                                                <td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="3" id="quest_76_1-3"></td>
                                                <td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="4" id="quest_76_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>การมีเพื่อนบ้านที่สนใจและให้กำลังใจ </td>
                                                <td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="1" id="quest_77_1-1"></td>
                                                <td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="2" id="quest_77_1-2"></td>
                                                <td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="3" id="quest_77_1-3"></td>
                                                <td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="4" id="quest_77_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ความรู้สึกว่าคนในชุมชนให้ความสำคัญและเห็นคุณค่าของเด็กและเยาวชน</td>
                                                <td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="1" id="quest_78_1-1"></td>
                                                <td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="2" id="quest_78_1-2"></td>
                                                <td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="3" id="quest_78_1-3"></td>
                                                <td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="4" id="quest_78_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>การได้รับมอบหมายบทบาทหน้าที่ที่มีคุณค่าและเป็นประโยชน์ต่อชุมชน</td>
                                                <td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="1" id="quest_79_1-1"></td>
                                                <td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="2" id="quest_79_1-2"></td>
                                                <td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="3" id="quest_79_1-3"></td>
                                                <td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="4" id="quest_79_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>การเข้าร่วมทำกิจกรรมบำเพ็ญประโยชน์ในชุมชน </td>
                                                <td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="1" id="quest_80_1-1"></td>
                                                <td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="2" id="quest_80_1-2"></td>
                                                <td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="3" id="quest_80_1-3"></td>
                                                <td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="4" id="quest_80_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ความรู้สึกอบอุ่น มีความสุข และภูมิใจในวิถีชีวิตเมื่ออยู่ในชุมชนของฉัน </td>
                                                <td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="1" id="quest_81_1-1"></td>
                                                <td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="2" id="quest_81_1-2"></td>
                                                <td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="3" id="quest_81_1-3"></td>
                                                <td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="4" id="quest_81_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>การมีเพื่อนบ้านคอยสอดส่อง และดูแลพฤติกรรมของเด็กและเยาวชนให้อยู่ในกรอบที่เหมาะสม </td>
                                                <td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="1" id="quest_82_1-1"></td>
                                                <td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="2" id="quest_82_1-2"></td>
                                                <td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="3" id="quest_82_1-3"></td>
                                                <td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="4" id="quest_82_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>การที่มีผู้ใหญ่อื่นนอกจากผู้ปกครองที่เป็นแบบอย่างที่ดีให้ทำตาม </td>
                                                <td><input type="radio" name="quest_83" value="1" data-record-value="{record_quest_83}" id="quest_83_1-1"></td>
                                                <td><input type="radio" name="quest_83" value="2" data-record-value="{record_quest_83}" id="quest_83_1-2"></td>
                                                <td><input type="radio" name="quest_83" value="3" data-record-value="{record_quest_83}" id="quest_83_1-3"></td>
                                                <td><input type="radio" name="quest_83" value="4" data-record-value="{record_quest_83}" id="quest_83_1-4"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <br />
                                    <legend>3.6 เจตคติและการรับรู้แหล่ง <span style="color:red;">*</span></legend>
                                    <table class="table" style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <th style="width:5%;">ข้อ</th>
                                            <th style="width:50%;text-align: center;">ข้อความ</th>
                                            <th style="text-align: center;">ไม่จริง</th>
                                            <th style="text-align: center;">ค่อนข้างไม่จริง</th>
                                            <th style="text-align: center;">ค่อนข้างจริง</th>
                                            <th style="text-align: center;">จริง</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ฉันรู้สึกว่า ผู้ที่ใช้สารเสพติดเป็นบุคคลที่สังคมรังเกียจ </td>
                                                <td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="4" id="quest_84_1-1"></td>
                                                <td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="3" id="quest_84_1-2"></td>
                                                <td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="2" id="quest_84_1-3"></td>
                                                <td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="1" id="quest_84_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันเชื่อว่าการใช้สารเสพติดช่วยให้ลืมความเครียดและปัญหาที่เกิดขึ้นได้ </td>
                                                <td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="1" id="quest_85_1-1"></td>
                                                <td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="2" id="quest_85_1-2"></td>
                                                <td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="3" id="quest_85_1-3"></td>
                                                <td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="4" id="quest_85_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ฉันเชื่อว่าสารเสพติดจะช่วยให้ฉันคลายความทุกข์ </td>
                                                <td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="1" id="quest_86_1-1"></td>
                                                <td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="2" id="quest_86_1-2"></td>
                                                <td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="3" id="quest_86_1-3"></td>
                                                <td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="4" id="quest_86_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันเชื่อว่าการใช้สารเสพติดไม่มีผลเสียต่อร่างกาย </td>
                                                <td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="1" id="quest_87_1-1"></td>
                                                <td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="2" id="quest_87_1-2"></td>
                                                <td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="3" id="quest_87_1-3"></td>
                                                <td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="4" id="quest_87_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>ฉันคิดว่าการใช้สารเสพติดเป็นสาเหตุที่ทำให้เกิดปัญหาสังคม </td>
                                                <td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="4" id="quest_88_1-1"></td>
                                                <td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="3" id="quest_88_1-2"></td>
                                                <td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="2" id="quest_88_1-3"></td>
                                                <td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="1" id="quest_88_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ฉันคิดว่าการใช้สารเสพติดในปริมาณมาก ๆ และเป็นเวลานาน ๆ อาจทำให้ตายได้ </td>
                                                <td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="4" id="quest_89_1-1"></td>
                                                <td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="3" id="quest_89_1-2"></td>
                                                <td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="2" id="quest_89_1-3"></td>
                                                <td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="1" id="quest_89_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>ฉันรู้สึกว่าคนที่ใช้สารเสพติดเป็นคนโก้เก๋ </td>
                                                <td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="1" id="quest_90_1-1"></td>
                                                <td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="2" id="quest_90_1-2"></td>
                                                <td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="3" id="quest_90_1-3"></td>
                                                <td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="4" id="quest_90_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>ฉันคิดว่าการทดลองสารเสพติดเพียงครั้งเดียวเพื่อหาประสบการณ์ เป็นเรื่องปกติ </td>
                                                <td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="1" id="quest_91_1-1"></td>
                                                <td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="2" id="quest_91_1-2"></td>
                                                <td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="3" id="quest_91_1-3"></td>
                                                <td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="4" id="quest_91_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>ฉันเคยเห็นคนรู้จัก ซื้อสารเสพติดจากร้านค้าในชุมชน </td>
                                                <td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="1" id="quest_92_1-1"></td>
                                                <td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="2" id="quest_92_1-2"></td>
                                                <td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="3" id="quest_92_1-3"></td>
                                                <td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="4" id="quest_92_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>ฉันรู้ว่าจะซื้อสารเสพติดได้จากที่ไหนบ้าง </td>
                                                <td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="1" id="quest_93_1-1"></td>
                                                <td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="2" id="quest_93_1-2"></td>
                                                <td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="3" id="quest_93_1-3"></td>
                                                <td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="4" id="quest_93_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>เวลาเพื่อนของฉันซื้อสารเสพติด เขาไม่เคยถูกถามเรื่องอายุจากคนขาย </td>
                                                <td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="1" id="quest_94_1-1"></td>
                                                <td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="2" id="quest_94_1-2"></td>
                                                <td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="3" id="quest_94_1-3"></td>
                                                <td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="4" id="quest_94_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>ฉันเคยเห็นเพื่อนซื้อสารเสพติดจากแหล่งผู้ขาย </td>
                                                <td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="1" id="quest_95_1-1"></td>
                                                <td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="2" id="quest_95_1-2"></td>
                                                <td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="3" id="quest_95_1-3"></td>
                                                <td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="4" id="quest_95_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>ฉันเห็นว่าชุมชนของฉันเป็นแหล่งหาซื้อสารเสพติดได้ง่าย </td>
                                                <td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="1" id="quest_96_1-1"></td>
                                                <td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="2" id="quest_96_1-2"></td>
                                                <td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="3" id="quest_96_1-3"></td>
                                                <td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="4" id="quest_96_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>เพื่อนของฉันไม่เคยถูกปฏิเสธในการซื้อสารเสพติดจากร้านค้า </td>
                                                <td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="1" id="quest_97_1-1"></td>
                                                <td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="2" id="quest_97_1-2"></td>
                                                <td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="3" id="quest_97_1-3"></td>
                                                <td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="4" id="quest_97_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>ฉันเคยเห็นคนรู้จัก ซื้อสารเสพติดมาจากหมู่บ้านอื่น </td>
                                                <td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="1" id="quest_98_1-1"></td>
                                                <td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="2" id="quest_98_1-2"></td>
                                                <td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="3" id="quest_98_1-3"></td>
                                                <td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="4" id="quest_98_1-4"></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <br />
                                    <div class="col-md-12">
                                        <br /><br />
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div align="left">
                                                    <a href="{site_url}home" class="btn btn-danger btn-lg" fdprocessedid="de4wdk">
                                                        <i class="fa fa-times"></i> ออกจากแบบฟอร์ม
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div align="right">

                                                    <input type="hidden" id="add_encrypt_id" />
                                                   


                                                    <a href="{site_url}assessment/assessment2/add" class="btn btn-success btn-lg" fdprocessedid="de4wdk"><i class='fas fa-angle-double-left'></i> ย้อนกลับ</a>
                                                    <button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
                                                        &nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
                                                    </button>
                                                    <!-- <a href="{site_url}assessment/assessment4/add" class="btn btn-success btn-lg" fdprocessedid="de4wdk"> ถัดไป<i class='fas fa-angle-double-right'></i></a> -->


                                                </div>
                                            </div>
                                        </div>


                                    </div>





                                </div>

                            </div>


                        </form>
                        <!-- Modal Confirm Save -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title" id="addModalLabel">บันทึกข้อมูล</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="alert alert-warning">ยืนยันการบันทึกข้อมูล ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> ปิด</button>
                                        <button type="button" class="btn btn-primary" id="btnSave"><i class="fa fa-save"></i> บันทึก&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div> <!--contrainer-->

        </section>


    </div> <!--contrainer-->

    <!-- Footer Section -->
    <footer id="footer-home-three" class="pad-100">
            <div class="container">
                <div class="row text-center text-md-left">
                    <div class="col-md-3 col-lg-2 mt-md-5 ms-border-right mb-4 mb-md-0">
                        <img src="https://upload.wikimedia.org/wikipedia/th/thumb/2/20/Office_of_the_Narcotics_Control_Board_Logo.png/220px-Office_of_the_Narcotics_Control_Board_Logo.png" style="height: 100px;" class="img-fluid" alt="Logo">
                        <h6 class="footer-nav-heading mt-3">&copy; 2022 - ONCB</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 mb-4 mb-md-0">
                        <h6 class="footer-nav-heading mb-3">Navigation</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><a href="{site_url}home">หน้าหลัก </a></p>
                                <p><a href="{site_url}about">เกี่ยวกับเรา </a></p>
                                <p><a href="{site_url}news_research_info">โครงการวิจัย </a></p>
                                <p><a href="{site_url}announcement">ข่าวสาร</a></p>
                                <p><a href="{site_url}asked_questions">FAQ</a></p>
                                <p><a href="{site_url}contactus">ติดต่อเรา</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-1"></div>
                    <div class="col-md-3 col-lg-3 mb-4 mb-md-0">
                        <h6 class="footer-nav-heading mb-3">สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</h6>
                        <p>เลขที่ 5 ถนนดินแดง แขวงสามเสนใน เขตพญาไท กรุงเทพมหานคร 104000</p>
                        <h6 class="footer-nav-heading mb-3">โทรศัพท์ติดต่อ</h6>
                        <p><a href="tel:+12345671313">โทรศัพท์ 02-247-0901-19</a></p>
                        <h6 class="footer-nav-heading mb-3">นโยบายการใช้งาน</h6>
                        <p><a  target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A1%E0%B8%B1%E0%B9%88%E0%B8%99%E0%B8%84%E0%B8%87%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%A8%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9C%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%88%E0%B8%B2%E0%B8%81%20%E0%B8%84%E0%B8%98%E0%B8%AD).pdf">นโยบายการใช้งานเว็บไซต์</a></p>
                        <p><a  target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5.pdf">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</a></p>

                    </div>
                    <div class="col-md-3 col-lg-3">
                        <h6 class="footer-nav-heading mb-3">email</h6>
                        <p><a href="mailto:contact@coroso.com">contact@oncb.go.th</a></p>
                        <h6 class="footer-nav-heading mb-3">แหล่งทุนวิจัย</h6>
                        <p>

                            <span class="mr-3"><a href="https://www.nrct.go.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สำนักงานการวิจัยแห่งชาติ (วช.)"><img style="height: 45px;width: 45px;" src="https://www.job-108.com/icon/1575089961.jpg?v=1"></a></span>
                            <span class="mr-3"><a href="https://www.tsri.or.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สำนักงานคณะกรรมการส่งเสริมวิทยาศาสตร์ วิจัยและนวัตกรรม (สกสว.)"><img style="height: 45px;width: 45px;" src="https://riie.wu.ac.th/wp-content/uploads/2021/04/%E0%B8%81%E0%B8%AD%E0%B8%87%E0%B8%97%E0%B8%B8%E0%B8%99%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B4%E0%B8%A1%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C-%E0%B8%A7%E0%B8%B4%E0%B8%88%E0%B8%B1%E0%B8%A2-%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%99%E0%B8%A7%E0%B8%B1%E0%B8%95%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1-%E0%B8%81%E0%B8%AA%E0%B8%A7.-230x300.png"></a></span>
                            <span class="mr-3"><a href="https://www.hsri.or.th/researcher" target="_blank" data-toggle="tooltip" data-placement="top" title="สถาบันวิจัยระบบสาธารณสุข"><img style="height: 45px;width: 45px;" src="https://www.hitap.net/wp-content/uploads/2019/11/%E0%B8%AA%E0%B8%A7%E0%B8%A3%E0%B8%AA_1-300x300.png"></a></span>
                        </p>
                        <div class="ms-spacer-30"></div>
                        <h6 class="footer-nav-heading mb-3">ภาคีเครือข่าย</h6>
                        <p>
                            <span class="mr-3"><a href="https://www.oncb.go.th/Pages/main.aspx" target="_blank" data-toggle="tooltip" data-placement="top" title="ปปส "><img style="height: 45px;width: 45px;" src="https://upload.wikimedia.org/wikipedia/th/thumb/2/20/Office_of_the_Narcotics_Control_Board_Logo.png/220px-Office_of_the_Narcotics_Control_Board_Logo.png"></a></span>
                            <span class="mr-3"><a href="https://www.nhso.go.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สปสช"><img style="height: 45px;width: 45px;" src="https://www.nhso.go.th/storage/uploads/news/20220517180205212.png"></a></span>
                            <span class="mr-3"><a href="https://www.moj.go.th/index.php" target="_blank" data-toggle="tooltip" data-placement="top" title="กระทรวงยุติธรรม"><img style="height: 45px;width: 45px;" src="https://www.moj.go.th/img/all_logo/00.png"></a></span>
                        </p>

                        <div class="ms-spacer-30"></div>
                        <h6 class="footer-nav-heading mb-3">Open data </h6>
                        <p>
                            <span class="mr-3"><a href="https://www.oncb.go.th/Pages/main.aspx"
                             target="_blank" data-toggle="tooltip"
                              data-placement="top" title="ปปส ">
                              <img 
                               src="{base_url}/assets/images/creative_common.png">
                            </a></span>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- Body Wrapper Ends -->

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Banner Section Video Button Modal Box -->
    <div class="modal fade" id="msvideobox" tabindex="-1" role="dialog" aria-labelledby="msvideobox" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/T9oDbdsyjrM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- General Js -->
    <script src="{base_url}assets/themes/front-end/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="{base_url}assets/themes/front-end/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Font Awesome Js -->
    <script src="{base_url}assets/themes/front-end/vendor/fontawesome/js/all.min.js"></script>
    <!-- Elegant Icons Css -->
    <script src="{base_url}assets/themes/front-end/vendor/elegant/js/lte-ie7.js"></script>
    <!-- Owl Carousel Js -->
    <script src="{base_url}assets/themes/front-end/vendor/owl_carousel/js/owl.carousel.min.js"></script>
    <!-- Themes's Custom Js -->
    <script src="{base_url}assets/themes/front-end/js/theme.js"></script>

    <!-- Require -->
    <script src="{base_url}assets/js/jquery-ui.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/bootstrap-notify.min.js"></script>
    <script src="{base_url}assets/bootstrap_extras/select2/select2.min.js"></script>
    <script src="{base_url}assets/js/jquery.cookie.min.js"></script>
    <script src="{base_url}assets/js/ci_utilities.js?ver=1541805506"></script>

    {another_js}

</body>

</html>