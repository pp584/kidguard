<!DOCTYPE html>
<html>

<head>
    <title>ผลการประเมินปัจจัยภูมิคุ้มกัน</title>
    <!-- <link rel="icon" type="image/png" href="logooncb-onweb_png.png"> -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/custom_fonts/fonts.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/elegant/css/style.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/style.css">
    <link rel="stylesheet" href="{base_url}assets/themes/front-end/css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
        td {
            font: 0.8em sans-serif;
        }

        th {
            font: 1em sans-serif;
            font-style: normal;
        }

        @media print {
            .printableArea {
                width: 100%;
                margin: 0 auto;
            }
            .printableArea * {
                margin: auto;
            }
        }
    </style>
</head>


<body onload="printpage()">
	<div class="col-12 printableArea" id="printableArea">
		<div class="row">

			<style>
				td {
					font: 0.8em sans-serif;
				}

				th {
					font: 1em sans-serif;
					font-style: normal;
				}
			</style>

			<div class="card border">
				<div class="card-body">
					<?php $query_result = $this->db->query("select * from assessment_form where id = '" . $_SESSION["assessment_id"] . "'  ")->row(); ?>
					<table width="100%" border="0">
						<tr>
							<th>ผลการประเมินปัจจัยภูมิคุ้มกัน ปัจจัยบริบทและพฤติกรรมเสี่ยงต่อการใช้สารเสพติด</th>
							<th></th>
							<th></th>
							<th style="text-align:right;"> <img style="height: 105px;" src="{base_url}/assets/images/oncbTh_png.png"> <img style="height: 90px; width:90px" src="{base_url}/assets/images/Picture2.png"> </th>
						</tr>
						<tr>
							<th style="text-align:left;"><b>รหัสผู้ประเมิน: <?= $query_result->assessment_code; ?></th>
							<th></th>
							<th></th>
							<th style="text-align:right;">วันเวลาเข้าประเมิน: <?= setDateToThai(date($query_result->create_date), 'full_month'); ?> </th>
						</tr>
					</table>
					<hr />

					<div class="justify-content-center">
						<hr>
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
                                                    <td><i class='fas fa-user' style="color: #FFA07A;"></i> ผู้ประเมิน</td>
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
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		function printpage() {
			window.print();
		}
	</script>
</body>

</html>