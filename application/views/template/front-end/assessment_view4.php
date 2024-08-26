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
                            <img src="{base_url}assets/images/icon/form3_gray.png" style="width: 150px;height: 150px;">
                            <p style="text-align:center;">ปัจจัยบริบท</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="text-align:center;">
                        <a href="{site_url}assessment/assessment4/add">
                            <img src="{base_url}assets/images/icon/form4.png" style="width: 150px;height: 150px;">
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


                                <h3 class="font-weight-bold">ตอนที่ 4 พฤติกรรมเสี่ยง</h3>
                            </div>
                        </div>
                        <hr />
                        <form class="form-horizontal" id="formAdd" accept-charset="utf-8">

                            <div class="row">
                                <div class="col-md-12">
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
                                                <td>ฉันเป็นคนมีสาระ </td>
                                                <td><input type="radio" value="1" name="quest_1" data-record-value="{record_quest_1}" value="4" id="quest_1_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_1" data-record-value="{record_quest_1}" value="3" id="quest_1_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_1" data-record-value="{record_quest_1}" value="2" id="quest_1_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_1" data-record-value="{record_quest_1}" value="1" id="quest_1_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ฉันไม่คิดก่อนพูด </td>
                                                <td><input type="radio" value="1" name="quest_2" data-record-value="{record_quest_2}" value="1" id="quest_2_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_2" data-record-value="{record_quest_2}" value="2" id="quest_2_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_2" data-record-value="{record_quest_2}" value="3" id="quest_2_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_2" data-record-value="{record_quest_2}" value="4" id="quest_2_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม</td>
                                                <td><input type="radio" value="1" name="quest_3" data-record-value="{record_quest_3}" value="1" id="quest_3_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_3" data-record-value="{record_quest_3}" value="2" id="quest_3_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_3" data-record-value="{record_quest_3}" value="3" id="quest_3_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_3" data-record-value="{record_quest_3}" value="4" id="quest_3_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ฉันรู้สึกมีความสุขในชีวิต</td>
                                                <td><input type="radio" value="1" name="quest_4" data-record-value="{record_quest_4}" value="4" id="quest_4_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_4" data-record-value="{record_quest_4}" value="3" id="quest_4_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_4" data-record-value="{record_quest_4}" value="2" id="quest_4_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_4" data-record-value="{record_quest_4}" value="1" id="quest_4_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง </td>
                                                <td><input type="radio" value="1" name="quest_5" data-record-value="{record_quest_5}" value="1" id="quest_5_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_5" data-record-value="{record_quest_5}" value="2" id="quest_5_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_5" data-record-value="{record_quest_5}" value="3" id="quest_5_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_5" data-record-value="{record_quest_5}" value="4" id="quest_5_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย </td>
                                                <td><input type="radio" value="1" name="quest_6" data-record-value="{record_quest_6}" value="1" id="quest_6_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_6" data-record-value="{record_quest_6}" value="2" id="quest_6_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_6" data-record-value="{record_quest_6}" value="3" id="quest_6_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_6" data-record-value="{record_quest_6}" value="4" id="quest_6_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง </td>
                                                <td><input type="radio" value="1" name="quest_7" data-record-value="{record_quest_7}" value="4" id="quest_7_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_7" data-record-value="{record_quest_7}" value="3" id="quest_7_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_7" data-record-value="{record_quest_7}" value="2" id="quest_7_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_7" data-record-value="{record_quest_7}" value="1" id="quest_7_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>ฉันรู้สึกวิตกกังวลจนปวดศีรษะ </td>
                                                <td><input type="radio" value="1" name="quest_8" data-record-value="{record_quest_8}" value="1" id="quest_8_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_8" data-record-value="{record_quest_8}" value="2" id="quest_8_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_8" data-record-value="{record_quest_8}" value="3" id="quest_8_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_8" data-record-value="{record_quest_8}" value="4" id="quest_8_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>ฉันรู้สึกกังวลในการทำบางสิ่ง </td>
                                                <td><input type="radio" value="1" name="quest_9" data-record-value="{record_quest_9}" value="1" id="quest_9_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_9" data-record-value="{record_quest_9}" value="2" id="quest_9_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_9" data-record-value="{record_quest_9}" value="3" id="quest_9_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_9" data-record-value="{record_quest_9}" value="4" id="quest_9_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง </td>
                                                <td><input type="radio" value="1" name="quest_10" data-record-value="{record_quest_10}" value="4" id="quest_10_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_10" data-record-value="{record_quest_10}" value="3" id="quest_10_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_10" data-record-value="{record_quest_10}" value="2" id="quest_10_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_10" data-record-value="{record_quest_10}" value="1" id="quest_10_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>ฉันทำอะไรโดยไม่คิด </td>
                                                <td><input type="radio" value="1" name="quest_11" data-record-value="{record_quest_11}" value="1" id="quest_11_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_11" data-record-value="{record_quest_11}" value="2" id="quest_11_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_11" data-record-value="{record_quest_11}" value="3" id="quest_11_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_11" data-record-value="{record_quest_11}" value="4" id="quest_11_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง </td>
                                                <td><input type="radio" value="1" name="quest_12" data-record-value="{record_quest_12}" value="1" id="quest_12_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_12" data-record-value="{record_quest_12}" value="2" id="quest_12_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_12" data-record-value="{record_quest_12}" value="3" id="quest_12_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_12" data-record-value="{record_quest_12}" value="4" id="quest_12_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>ฉันมีความภาคภูมิใจในตนเอง</td>
                                                <td><input type="radio" value="1" name="quest_13" data-record-value="{record_quest_13}" value="4" id="quest_13_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_13" data-record-value="{record_quest_13}" value="3" id="quest_13_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_13" data-record-value="{record_quest_13}" value="2" id="quest_13_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_13" data-record-value="{record_quest_13}" value="1" id="quest_13_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>ฉันเป็นคนขี้กลัว เวลาจะทำอะไรมักจะวิตกกังวล </td>
                                                <td><input type="radio" value="1" name="quest_14" data-record-value="{record_quest_14}" value="1" id="quest_14_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_14" data-record-value="{record_quest_14}" value="2" id="quest_14_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_14" data-record-value="{record_quest_14}" value="3" id="quest_14_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_14" data-record-value="{record_quest_14}" value="4" id="quest_14_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>ฉันเป็นคนหุนหันพลันแล่น</td>
                                                <td><input type="radio" value="1" name="quest_15" data-record-value="{record_quest_15}" value="1" id="quest_15_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_15" data-record-value="{record_quest_15}" value="2" id="quest_15_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_15" data-record-value="{record_quest_15}" value="3" id="quest_15_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_15" data-record-value="{record_quest_15}" data-record-value="{record_quest_15}" value="4" id="quest_15_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ </td>
                                                <td><input type="radio" value="1" name="quest_16" data-record-value="{record_quest_16}" value="1" id="quest_16_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_16" data-record-value="{record_quest_16}" value="2" id="quest_16_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_16" data-record-value="{record_quest_16}" value="3" id="quest_16_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_16" data-record-value="{record_quest_16}" value="4" id="quest_16_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ</td>
                                                <td><input type="radio" value="1" name="quest_17" data-record-value="{record_quest_17}" value="1" id="quest_17_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_17" data-record-value="{record_quest_17}" value="2" id="quest_17_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_17" data-record-value="{record_quest_17}" value="3" id="quest_17_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_17" data-record-value="{record_quest_17}" value="4" id="quest_17_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>ฉันใช้อารมณ์มากกว่าเหตุผล</td>
                                                <td><input type="radio" value="1" name="quest_18" data-record-value="{record_quest_18}" value="1" id="quest_18_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_18" data-record-value="{record_quest_18}" value="2" id="quest_18_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_18" data-record-value="{record_quest_18}" value="3" id="quest_18_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_18" data-record-value="{record_quest_18}" value="4" id="quest_18_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น </td>
                                                <td><input type="radio" value="1" name="quest_19" data-record-value="{record_quest_19}" value="1" id="quest_19_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_19" data-record-value="{record_quest_19}" value="2" id="quest_19_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_19" data-record-value="{record_quest_19}" value="3" id="quest_19_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_19" data-record-value="{record_quest_19}" value="4" id="quest_19_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>ฉันมีความพอใจในชีวิตของตนเอง</td>
                                                <td><input type="radio" value="1" name="quest_20" data-record-value="{record_quest_20}" value="4" id="quest_20_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_20" data-record-value="{record_quest_20}" value="3" id="quest_20_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_20" data-record-value="{record_quest_20}" value="2" id="quest_20_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_20" data-record-value="{record_quest_20}" value="1" id="quest_20_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง </td>
                                                <td><input type="radio" value="1" name="quest_21" data-record-value="{record_quest_21}" value="4" id="quest_21_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_21" data-record-value="{record_quest_21}" value="3" id="quest_21_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_21" data-record-value="{record_quest_21}" value="2" id="quest_21_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_21" data-record-value="{record_quest_21}" value="1" id="quest_21_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ </td>
                                                <td><input type="radio" value="1" name="quest_22" data-record-value="{record_quest_22}" value="1" id="quest_22_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_22" data-record-value="{record_quest_22}" value="2" id="quest_22_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_22" data-record-value="{record_quest_22}" value="3" id="quest_22_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_22" data-record-value="{record_quest_22}" value="4" id="quest_22_1-4"></td>
                                            </tr>
                                            <tr>
                                                <td>23</td>
                                                <td>ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง </td>
                                                <td><input type="radio" value="1" name="quest_23" data-record-value="{record_quest_23}" value="4" id="quest_23_1-1"></td>
                                                <td><input type="radio" value="2" name="quest_23" data-record-value="{record_quest_23}" value="3" id="quest_23_1-2"></td>
                                                <td><input type="radio" value="3" name="quest_23" data-record-value="{record_quest_23}" value="2" id="quest_23_1-3"></td>
                                                <td><input type="radio" value="4" name="quest_23" data-record-value="{record_quest_23}" value="1" id="quest_23_1-4"></td>
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

                                                    <a href="javascript:history.go(-1);" class="btn btn-success btn-lg" fdprocessedid="de4wdk"><i class='fas fa-angle-double-left'></i> ย้อนกลับ</a>
                                                    <!-- <button type="submit" class="btn btn-info btn-lg" fdprocessedid="de4wdk"><i class='fas fa-save'></i> ส่งแบบประเมิน </button> -->
                                                    <input type="hidden" id="add_encrypt_id" />
                                                    <button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
                                                        &nbsp;&nbsp;<i class="fa fa-save"></i> ส่งแบบประเมิน &nbsp;&nbsp;
                                                    </button>

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
                                        <h4 class="modal-title" id="addModalLabel">ส่งแบบประเมิน</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="alert alert-warning">ยืนยันการส่งแบบประเมิน ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> ปิด</button>
                                        <button type="button" class="btn btn-primary" id="btnSave"><i class="fa fa-save"></i> ส่งแบบประเมิน&nbsp;</button>
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
                    <p><a target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A1%E0%B8%B1%E0%B9%88%E0%B8%99%E0%B8%84%E0%B8%87%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%A8%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9C%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%88%E0%B8%B2%E0%B8%81%20%E0%B8%84%E0%B8%98%E0%B8%AD).pdf">นโยบายการใช้งานเว็บไซต์</a></p>
                    <p><a target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5.pdf">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</a></p>

                </div>
                <div class="col-md-3 col-lg-3">
                    <h6 class="footer-nav-heading mb-3">email</h6>
                    <p><a href="mailto:contact@coroso.com">contact@oncb.go.th</a></p>
                    <h6 class="footer-nav-heading mb-3">แหล่งทุนวิจัย</h6>
                    <p>

                        <span class="mr-3"><a href="https://www.nrct.go.th/" target="_blank" data-toggle="tooltip" data-placement="top" title="สำนักงานการวิจัยแห่งชาติ (วช.)"><img style="height: 45px;width: 45px;" src="{base_url}/assets/images/logo_วช_NRCT_re.png"></a></span>
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