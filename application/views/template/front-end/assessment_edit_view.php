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
            opacity: 2 !important;
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
                    <div class="process">
                        <div class="process-row">
                            <div class="process-step">
                                <button type="button" class="btn btn-outline-success btn-circle" disabled="disabled">
                                    <img src="{base_url}assets/images/icon/form1_gray.png" style="width: 70px;height: 70px;">
                                </button>
                                <p> <a href="{site_url}assessment/assessment1/add"> ข้อมูลพื้นฐาน </a></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-default btn-circle" disabled="disabled">
                                    <img src="{base_url}assets/images/icon/form2_gray.png" style="width: 70px;height: 70px;">
                                </button>
                                <p> <a href="{site_url}assessment/assessment2/add">ปัจจัยภูมิคุ้มกัน </a></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-default btn-circle" disabled="disabled">
                                    <img src="{base_url}assets/images/icon/form3_gray.png" style="width: 70px;height: 70px;">
                                </button>
                                <p> <a href="{site_url}assessment/assessment3/add"> ปัจจัยบริบท </a></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-default btn-circle" disabled="disabled">
                                    <img src="{base_url}assets/images/icon/form4_gray.png" style="width: 70px;height: 70px;">
                                </button>
                                <p><a href="{site_url}assessment/assessment4/add">พฤติกรรมเสี่ยง</a></p>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- [ View File name : add_view.php ] -->
                <div class="card">

                    <div class="card-body">
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold" style="color:red;">ตอนที่ 1 ข้อมูลพื้นฐาน</h5>
                            </div>
                        </div>
                        <hr />
                        <form class="form-horizontal" id="formAdd" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="font-weight-bold">จังหวัด <span style="color:red;">*</span></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select id="province_id" name="province_id" value="{record_province_id}">
                                                        <option value="">-- โปรดระบุจังหวัด --</option>
                                                        {provinces_province_id_option_list}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">

                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">1. เพศ


                                                        <span style="color:red;">*</span>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_1" value="1" id="question_1" data-record-value="{record_question_1}" style="width:auto;" required>
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. ชาย</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_1" value="2" id="question_1" data-record-value="{record_question_1}" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. หญิง</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">2. อายุ <span style="color:red;">*</span> </h5>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" maxlength="2" id="question_2" value="{record_question_2}" maxlength="2" name="question_2" required="" fdprocessedid="m15qll" placeholder="กรุณากรอก">
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">3. สถานภาพการศึกษา <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_3" data-record-value="{record_question_3}" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. ศึกษาอยู่ </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_3" data-record-value="{record_question_3}" value="2" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;"> 2. ไม่ได้ศึกษา </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">4. ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่ <span style="color:red;">*</span> </h5>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="question_4" type="number" maxlength="2" name="question_4" value="{record_question_4}" required="" fdprocessedid="m15qll" placeholder="กรุณากรอก">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">5. จำนวนพี่น้อง <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_5" data-record-value="{record_question_5}" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. เป็นลูกคนเดียว </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_5" data-record-value="{record_question_5}" value="2" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. มีพี่น้องรวมทั้งหมด </label>
                                                            </div>
                                                            <input type="number" maxlength="2" id="question_6" name="question_6" value="{record_question_6}" required="" fdprocessedid="m15qll" placeholder="กรุณากรอก">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">6. สถานภาพทางครอบครัว <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_7" data-record-value="{record_question_7}" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. บิดามารดาอยู่ด้วยกัน </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_7" value="2" data-record-value="{record_question_7}" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. บิดามารดาแยกกันอยู่ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_7" data-record-value="{record_question_7}" value="3" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. บิดาเสียชีวิตแล้ว </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_7" data-record-value="{record_question_7}" value="4" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. มารดาเสียชีวิตแล้ว </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_7" data-record-value="{record_question_7}" value="5" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. บิดาและมารดาเสียชีวิตแล้ว </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">7. อาชีพของบิดา <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;"> 1. เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์) </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="2" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. รับราชการ / พนักงานราชการ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="3" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. พนักงานเอกชน </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="4" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. รัฐวิสาหกิจ </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="5" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. รับจ้างทั่วไป </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="6" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">6. ธุรกิจส่วนตัว/อิสระ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_8" data-record-value="{record_question_8}" value="7" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">7. อื่น ๆ</label>
                                                            </div>
                                                            <input type="text" id="question_8" name="question_9" value="{record_question_9}" fdprocessedid="m15qll" placeholder="กรุณากรอก ">
                                                        </div>
                                                    </div>





                                                </div>
                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">8. อาชีพของมารดา <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์) </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="2" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. รับราชการ / พนักงานราชการ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="3" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. พนักงานเอกชน </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="4" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. รัฐวิสาหกิจ </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="4" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. รับจ้างทั่วไป </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="5" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">6. ธุรกิจส่วนตัว/อิสระ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_10" data-record-value="{record_question_10}" value="6" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">7. อื่น ๆ </label>
                                                            </div>
                                                            <input type="text" id="question_10" name="question_11" value="{record_question_11}" fdprocessedid="m15qll" placeholder="กรุณากรอก ">
                                                        </div>
                                                    </div>



                                                </div>


                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">9. รายได้ของครอบครัว (เฉลี่ยต่อเดือน) <span style="color:red;">*</span></h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_12" data-record-value="{record_question_12}" id="quest_1_9-1" value="1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. ต่ำกว่า 15,000 บาท</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_12" data-record-value="{record_question_12}" id="quest_1_9-2" value="2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. 15,000 - 30,000 บาท </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_12" data-record-value="{record_question_12}" id="quest_1_9-1" value="1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. 30,001 - 40,000 บาท</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_12" data-record-value="{record_question_12}" id="quest_1_9-1" value="1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. 40,001 - 50,000 บาท </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="question_12" id="quest_1_9-1" value="1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. มากกว่า 50,000 บาท </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ) <span style="color:red;">*</span></h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="1" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. บิดา </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="2" id="quest_1_2-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. มารดา </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="3" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. ญาติ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="4" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. เพื่อน</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="5" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. ครู </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="6" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">6. คนรัก </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_13}" name="question_13[]" value="7" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">7. อื่น ๆ (ระบุ)</label>
                                                            </div>
                                                            <input type="text" id="subject" name="question_14" value="{record_question_14}" required="" fdprocessedid="m15qll" placeholder="กรุณากรอก ">
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">11. ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่ <span style="color:red;">*</span> </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" data-record-value="{record_question_15}" name="question_15" value="1" id="quest_1_1-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. เคย </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" data-record-value="{record_question_15}" name="question_15" value="2" id="quest_1_1-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">2. ไม่เคย </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <h5 class="font-weight-bold">12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ) <span style="color:red;">*</span></h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="1" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">1. ยาบ้า </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="2" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">2. ยาอี </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="3" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">3. ยาเค </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="4" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">4. ฝิ่น </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="5" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">5. เฮโรอีน </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="6" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">6. กัญชา </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="7" id="quest_1_2-2" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault2" style="position:relative;color:black;top:-3px;">7. ใบกระท่อม </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="8" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">8. ทินเนอร์/กาว </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="9" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">9. ยาไอซ์ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="10" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">10. บุหรี่ </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="11" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">11. สุรา </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-record-value="{record_question_16}" name="question_16[]" value="12" id="quest_1_2-1" style="width:auto;">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="position:relative;color:black;top:-3px;">12. อื่น ๆ โปรดระบุ </label>
                                                            </div>
                                                            <input type="text" id="subject" name="question_17" value="{record_question_17}" required="" fdprocessedid="m15qll" placeholder="กรุณากรอก ">
                                                        </div>
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
                                                                        <button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
                                                                            &nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
                                                                        </button>

                                                                        <!-- <button type="submit" class="btn btn-info btn-lg" fdprocessedid="de4wdk"><i class='fas fa-save'></i> บันทึกร่าง</button> -->
                                                                        <!-- <a href="{site_url}Assessment2" class="btn btn-success btn-lg" fdprocessedid="de4wdk"> ถัดไป<i class='fas fa-angle-double-right'></i></a> -->
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>



                                                </div>



                                            </div>




                                        </div>


                                    </div> <!--panel-body-->
                                </div> <!--panel-->
                            </div> <!--contrainer-->

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