<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Require -->
    <link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
    <link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    {another_css}
    <script>
        var baseURL = '{base_url}/';
        var siteURL = '{site_url}/';
        var csrf_token_name = '{csrf_token_name}';
        var csrf_cookie_name = '{csrf_cookie_name}';
    </script>

</head>

<body>

    <!-- Body Wrapper -->
    <div id="homepage-three" class="overflow-hidden">
        <!-- Header Section -->
        <header class="position-absolute">
            <!-- Navbar -->
            {top_navbar}
        </header>

        <!-- Banner Section -->
        <section class="inner-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-12" class="text">
                        <span class="text">Preview assessment</span>
                        <h3 class="hero-text">ผลการประเมินปัจจัย</h3>
                        <h5><a href="index.html" class="text">Home</a> - Preview assessment</h5>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Area -->
            <div class="contact-bnr pad-100 d-flex">
                <br />
                <div class="col-12" style="align-content: center;" id="printableArea">
                    <div class="row justify-content-center">
                        <!-- [ View File name : preview_view.php ] -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

                        <style>
                            td {
                                font: 0.8em sans-serif;
                            }

                            th {
                                font: 1em sans-serif;
                                font-style: normal;

                            }
                            .table {
                                max-width: 100%;
                                width: auto;
                            }
                            .table th, .table td {
                                max-width: 200px;
                                text-overflow: ellipsis;             
                            }
                            @media screen and (max-width: 768px) {
                                .table {
                                    width: 100%;
                                    display: block;
                                    overflow-x: auto;
                                }
                            }
                            
                        </style>
                        <div class="card border">
                            <div class="card-body">
                                <?php $query_result = $this->db->query("select * from assessment_form where id = '" . $_SESSION["assessment_id"] . "'  ")->row(); ?>

                                <table width="100%" border="0">
                                    <tr>
                                        <th>ผลการประเมินปัจจัยภูมิคุ้มกัน ปัจจัยบริบทและพฤติกรรมเสี่ยงต่อการใช้สารเสพติด</th>
                                        <th></th>
                                        <th> </th>
                                        <th style="text-align:right;"> <img style="height: 105px;" src="{base_url}/assets/images/oncbTh_png.png"> <img style="height: 90px; width:90px" src="{base_url}/assets/images/Picture2.png"> </th>
                                    </tr>
                                    <tr>
                                        <th><b>รหัสผู้ประเมิน: <?php echo $province_code . '' . $query_result->assessment_code; ?></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align:right;">วันเวลาเข้าประเมิน: <?= setDateToThai(date($query_result->create_date), 'full_month'); ?> </th>
                                    </tr>
                                </table>
                                <hr />

                                <div class="justify-content-center">
                                    <div class="card-body">
                                        <canvas id="myChart1" style="height:400px; max-width:100%"></canvas>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
                                        <script>
                                            var barColors = {
                                                'ผู้ประเมิน': "#FFA07A",
                                            };
                                            
                                            const xValues = ['การบริหารจัดการตน', 'ทุนทางจิตวิทยา', 'การเห็นคุณค่าในตนเอง', 'พลังตัวตน'];

                                            new Chart("myChart1", {
                                                type: "bar",
                                                data: {
                                                    labels: xValues,
                                                    datasets: [
                                                        {
                                                            data: [<?= $self_management_net_sum_score3 ?>, <?= $psychological_capital_score3 ?>, <?= $self_esteem_score3 ?>, <?= $identity_power_score3 ?>],
                                                            backgroundColor: barColors['ผู้ประเมิน'],
                                                            label: 'ผู้ประเมิน',
                                                            fill: false
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    responsive: true,
                                                    interaction: {
                                                        mode: 'index',
                                                        intersect: false,
                                                    },
                                                    plugins: {
                                                        title: {
                                                            display: true,
                                                            text: 'ผลการประเมินของนักเรียนเทียบกับมาตรฐานระดับชาติด้านปัจจัยภูมิค้มกัน',
                                                            font: { size: 18 }
                                                    },
                                                    legend: {
                                                        position: 'top',
                                                        labels: {
                                                            boxWidth: 20,
                                                            padding: 20
                                                        }
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            display: true,
                                                            scaleLabel: {
                                                                display: true,
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            display: true,
                                                            ticks: {
                                                                beginAtZero: true,
                                                                steps: 0.5,
                                                                stepValue: 5,
                                                                max: 5
                                                            },
                                                            scaleLabel: {
                                                                labelString: 'ระดับคะแนนประเมิน',
                                                                display: true,

                                                            }
                                                        }]
                                                    },
                                                    annotation: {
                                                        annotations: {
                                                            greenLine1: {
                                                                type: 'line',
                                                                xMax: -0.5,
                                                                xMin: 0.5,
                                                                yMin: 2.74,  
                                                                yMax: 2.74, 
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.74',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine1: {
                                                                type: 'line',
                                                                xMin: -0.5,
                                                                xMax: 0.5,
                                                                yMin: 2.58,
                                                                yMax: 2.58,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.58',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 3.04,
                                                                yMax: 3.04,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.04',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 2.88,
                                                                yMax: 2.88,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.88',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 3.20,
                                                                yMax: 3.20,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.20',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 3.00,
                                                                yMax: 3.00,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.00',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 3.07,
                                                                yMax: 3.07,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.07',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 2.87,
                                                                yMax: 2.87,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.87',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                        </script>
                                        
                                        <table class="table table-borderless" style="width:100%;max-width:800px">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center emphasized-header">การบริหารจัดการตน</th>
                                                    <th class="text-center emphasized-header">ทุนทางจิตวิทยา</th>
                                                    <th class="text-center emphasized-header">การเห็นคุณค่าในตนเอง</th>
                                                    <th class="text-center emphasized-header">พลังตัวตน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class='fas fa-user' style="color: #FFA07A;"></i> ผู้ประเมิน </td>
                                                    <?php $values = [$self_management_net_sum_score3, $psychological_capital_score3, $self_esteem_score3, $identity_power_score3]; ?>
                                                    <?php foreach ($values as $value): ?>
                                                    <td class="text-center">
                                                        <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                    </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                                <tr>
                                                    <td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
                                                    <?php $values = [2.74, 3.04, 3.20, 3.07]; ?>
                                                    <?php foreach ($values as $value): ?>
                                                    <td class="text-center">
                                                        <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                    </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                                <tr>
                                                    <td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
                                                    <?php $values = [2.58, 2.88, 3.00, 2.87]; ?>
                                                    <?php foreach ($values as $value): ?>
                                                    <td class="text-center">
                                                        <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                    </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-body">
                                        <canvas id="myChart2" style="height:400px; max-width:100%"></canvas>
                                        <script>
                                            var barColors = {
                                                'ผู้ประเมิน': "#FFA07A",
                                            };

                                            const xValues2 = ['การคล้อยตาม', 'ความรุนแรง', 'การเป็นแบบอย่าง', 'การเปิดรับ', 'เจตคติทางบวก', 'การรับรู้แหล่ง'];

                                            new Chart("myChart2", {
                                                type: "bar",
                                                data: {
                                                    labels: xValues2,
                                                    datasets: [
                                                        {
                                                            data: [<?= $compliance_score3; ?>, <?= $domestic_violence_score3 ?>, <?= $exemplary_score3 ?>, <?= $media_exposure_score3 ?>, <?= $attitude_score3 ?>, <?= $source_purchase_score3 ?>],
                                                            backgroundColor: barColors['ผู้ประเมิน'],
                                                            label: 'ผู้ประเมิน',
                                                            fill: false
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    responsive: true,
                                                    interaction: {
                                                        mode: 'index',
                                                        intersect: false,
                                                    },
                                                    plugins: {
                                                        title: {
                                                            display: true,
                                                            text: 'ผลการประเมินของนักเรียนเทียบกับมาตรฐานระดับชาติด้านบริบทเชิงลบ',
                                                            font: { size: 18 }
                                                    },
                                                    legend: {
                                                        position: 'top',
                                                        labels: {
                                                            boxWidth: 20,
                                                            padding: 20
                                                        }
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            display: true,
                                                            scaleLabel: {
                                                                display: true,
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            display: true,
                                                            ticks: {
                                                                beginAtZero: true,
                                                                steps: 0.5,
                                                                stepValue: 5,
                                                                max: 5
                                                            },
                                                            scaleLabel: {
                                                                labelString: 'ระดับคะแนนประเมิน',
                                                                display: true,

                                                            }
                                                        }]
                                                    },
                                                    annotation: {
                                                        annotations: {
                                                            greenLine1: {
                                                                type: 'line',
                                                                xMax: -0.5,
                                                                xMin: 0.5,
                                                                yMin: 1.38,  
                                                                yMax: 1.38, 
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.38',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine1: {
                                                                type: 'line',
                                                                xMin: -0.5,
                                                                xMax: 0.5,
                                                                yMin: 1.75,
                                                                yMax: 1.75,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.75',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 1.45,
                                                                yMax: 1.45,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.45',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 1.64,
                                                                yMax: 1.64,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.64',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 1.31,
                                                                yMax: 1.31,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.31',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 1.56,
                                                                yMax: 1.56,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.56',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 1.00,
                                                                yMax: 1.00,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.00',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 1.25,
                                                                yMax: 1.25,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.25',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine5: {
                                                                type: 'line',
                                                                xMin: 3.5,
                                                                xMax: 4.5,
                                                                yMin: 1.63,
                                                                yMax: 1.63,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.63',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine5: {
                                                                type: 'line',
                                                                xMin: 3.5,
                                                                xMax: 4.5,
                                                                yMin: 2.00,
                                                                yMax: 2.00,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.00',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine6: {
                                                                type: 'line',
                                                                xMin: 4.5,
                                                                xMax: 5.5,
                                                                yMin: 1.29,
                                                                yMax: 1.29,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.29',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine6: {
                                                                type: 'line',
                                                                xMin: 4.5,
                                                                xMax: 5.5,
                                                                yMin: 1.86,
                                                                yMax: 1.86,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '1.86',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                            
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                        </script>

                                        <table class="table table-borderless" style="width:100%;max-width:800px">
                                            <tr>
                                                <th></th>
                                                <th class="text-center emphasized-header">การคล้อยตามกลุ่มคนใช้สารเสพติด</th>
                                                <th class="text-center emphasized-header">ความรุนแรงในครอบครัว</th>
                                                <th class="text-center emphasized-header">การเป็นแบบอย่างในการใช้สารเสพติด</th>
                                                <th class="text-center emphasized-header">การเปิดรับเกี่ยวกับสื่อสารเสพติด</th>
                                                <th class="text-center emphasized-header">เจตคติทางบวกต่อการใช้สารเสพติด</th>
                                                <th class="text-center emphasized-header">การรับรู้แหล่งซื้อสารเสพติด</th>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-user' style="color: #FFA07A;"></i> ผู้ประเมิน</td>
                                                <?php $values = [$compliance_score3, $domestic_violence_score3, $exemplary_score3, $media_exposure_score3,$attitude_score3,$source_purchase_score3]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
                                                <?php $values = [1.38, 1.45, 1.31, 1.00, 1.63, 1.29]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
                                                <?php $values = [1.75, 1.64, 1.56, 1.25, 2.00, 1.86]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="card-body">
                                        <canvas id="myChart3" style="height:400px; max-width:100%"></canvas>
                                        <script>
                                            var barColors = {
                                                'ผู้ประเมิน': "#FFA07A",
                                            };

                                            const xValues3 = ['พลังครอบครัว', 'พลังสถานศึกษา ', 'พลังเพื่อนและกิจกรรม ', 'พลังชุมชน'];

                                            new Chart("myChart3", {
                                                type: "bar",
                                                data: {
                                                    labels: xValues3,
                                                    datasets: [
                                                    {
                                                        data: [<?= $family_power_score3 ?>, <?= $school_power_score3 ?>, <?= $friend_power_score3 ?>, <?= $community_power_score3 ?>],
                                                        backgroundColor: barColors['ผู้ประเมิน'],
                                                        label: 'ผู้ประเมิน',
                                                        fill: false
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    interaction: {
                                                        mode: 'index',
                                                        intersect: false,
                                                    },
                                                    plugins: {
                                                        title: {
                                                            display: true,
                                                            text: 'ผลประเมินระดับภาคทั่วประเทศ เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยบวก',
                                                            font: { size: 18 }
                                                    },
                                                    legend: {
                                                        position: 'top',
                                                        labels: {
                                                            boxWidth: 20,
                                                            padding: 20
                                                        }
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            display: true,
                                                            scaleLabel: {
                                                                display: true,
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            display: true,
                                                            ticks: {
                                                                beginAtZero: true,
                                                                steps: 0.5,
                                                                stepValue: 5,
                                                                max: 5
                                                            },
                                                            scaleLabel: {
                                                                labelString: 'ระดับคะแนนประเมิน',
                                                                display: true,
                                                            }
                                                        }]
                                                    },
                                                    annotation: {
                                                        annotations: {
                                                            greenLine1: {
                                                                type: 'line',
                                                                xMax: -0.5,
                                                                xMin: 0.5,
                                                                yMin: 2.74,  
                                                                yMax: 2.74, 
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.74',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine1: {
                                                                type: 'line',
                                                                xMin: -0.5,
                                                                xMax: 0.5,
                                                                yMin: 2.58,
                                                                yMax: 2.58,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.58',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 3.04,
                                                                yMax: 3.04,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.04',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine2: {
                                                                type: 'line',
                                                                xMin: 0.5,
                                                                xMax: 1.5,
                                                                yMin: 2.88,
                                                                yMax: 2.88,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.88',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 3.20,
                                                                yMax: 3.20,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.20',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine3: {
                                                                type: 'line',
                                                                xMin: 1.5,
                                                                xMax: 2.5,
                                                                yMin: 3.00,
                                                                yMax: 3.00,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.00',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            },
                                                            greenLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 3.07,
                                                                yMax: 3.07,
                                                                borderColor: 'green',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '3.07',
                                                                    position: 'right',
                                                                    backgroundColor: 'green',
                                                                    color: 'white',
                                                                    yAdjust: -6,
                                                                }
                                                            },
                                                            redLine4: {
                                                                type: 'line',
                                                                xMin: 2.5,
                                                                xMax: 3.5,
                                                                yMin: 2.87,
                                                                yMax: 2.87,
                                                                borderColor: 'red',
                                                                borderWidth: 2,
                                                                label: {
                                                                    enabled: true,
                                                                    content: '2.87',
                                                                    position: 'right',
                                                                    backgroundColor: 'red',
                                                                    color: 'white',
                                                                    yAdjust: 6,
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });    
                                        </script>
                                        <table class="table table-borderless" style="width:100%;max-width:800px">
                                            <tr>
                                                <th></th>
                                                <th class="text-center emphasized-header">พลังครอบครัว</th>
                                                <th class="text-center emphasized-header">พลังสถานศึกษา</th>
                                                <th class="text-center emphasized-header">พลังเพื่อนและกิจกรรม</th>
                                                <th class="text-center emphasized-header">พลังชุมชน</th>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-user' style="color: #FFA07A;"></i> ผู้ประเมิน</td>
                                                <?php $values = [$family_power_score3, $school_power_score3, $friend_power_score3, $community_power_score3]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
                                                <?php $values = [3.38, 3.00, 3.00, 2.75]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
                                                <?php $values = [3.00, 2.73, 2.83, 2.50]; ?>
                                                <?php foreach ($values as $value): ?>
                                                <td class="text-center">
                                                    <span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </table>
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <br />
                                        <br />
                                        <div class="row">
                                            <div class="col-6">
                                                <div align="left">
                                                    <a href="{site_url}home" class="btn btn-danger btn-lg" fdprocessedid="de4wdk">
                                                        <i class="fa fa-times"></i> ออกจากแบบฟอร์ม
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div align="right">
                                                    <a href="{site_url}assessment/Preview_view_pdf" target="_blank" class="btn btn-info btn-lg" fdprocessedid="de4wdk">
                                                        <i class="fa fa-print"></i> Print
                                                    </a>
                                                    <!-- <button type="submit" onclick="printDiv('printableArea')" class="btn btn-info btn-lg noPrint" fdprocessedid="de4wdk"><i class='fas fa-print'></i> Print</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                               
        <!-- Get In Touch Section -->


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

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <!-- {another_js} -->



</body>

</html>