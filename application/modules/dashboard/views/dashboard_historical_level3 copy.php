<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<style type="text/css">
    body,
    html {
        height: 100%;
    }

    /* workaround modal-open padding issue */

    body.modal-open {
        padding-right: 0 !important;
    }

    #sidebar {
        padding-left: 0;
    }

    /*
 * Off Canvas at medium breakpoint
 * --------------------------------------------------
 */

    @media screen and (max-width: 48em) {
        .row-offcanvas {
            position: relative;
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .row-offcanvas-left .sidebar-offcanvas {
            left: -33%;
        }

        .row-offcanvas-left.active {
            left: 33%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            position: absolute;
            top: 0;
            width: 33%;
            height: 100%;
        }
    }

    /*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */

    @media screen and (max-width: 34em) {
        .row-offcanvas-left .sidebar-offcanvas {
            left: -45%;
        }

        .row-offcanvas-left.active {
            left: 45%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            width: 45%;
        }
    }

    .card {
        overflow: hidden;
    }

    .card-block .rotate {
        z-index: 8;
        float: right;
        height: 100%;
    }

    .card-block .rotate i {
        color: rgba(20, 20, 20, 0.15);
        position: absolute;
        left: 0;
        left: auto;
        right: -10px;
        bottom: 0;
        display: block;
        -webkit-transform: rotate(-44deg);
        -moz-transform: rotate(-44deg);
        -o-transform: rotate(-44deg);
        -ms-transform: rotate(-44deg);
        transform: rotate(-44deg);
    }
</style>


<?php

$area = array();
// 0	กทม	กทมทุกเขต
$area['1'] = 0;
// ภาค 1	ปทุมธานี, อยุธยา , นนทบุรี, สมุทรปราการ, อ่างทอง, สระบุรี, ชัยนาท, สิงห์บุรี, ลพบุรี
$area['2'] = 1;
$area['3'] = 1;
$area['4'] = 1;
$area['6'] = 1;
$area['7'] = 1;
$area['8'] = 1;
$area['9'] = 1;
$area['10'] = 1;
// ภาค 2	จันทบุรี , ฉะเชิงเทรา , ชลบุรี , ตราด , นครนายก, ปราจีนบุรี, ระยอง, สระแก้ว
$area['11'] = 2;
$area['12'] = 2;
$area['13'] = 2;
$area['14'] = 2;
$area['15'] = 2;
$area['16'] = 2;
$area['17'] = 2;
$area['18'] = 2;
// 3	ภาค 3	ชัยภูมิ , นครราชสีมา , บุรีรัมย์, สุรินทร์, ศรีษะเกษ, อุบลราชธานี, ยโสธร  , อำนาจเจริญ, 
$area['19'] = 3;
$area['20'] = 3;
$area['21'] = 3;
$area['22'] = 3;
$area['23'] = 3;
$area['24'] = 3;
$area['25'] = 3;
$area['26'] = 3;
// 4	ภาค 4	เลย , หนองคาย, บึงกาฬ, หนองบัวลำภู , อุดรธานี , สกลนคร, นครพนม, ขอนแก่น, มหาสารคาม ,ร้อยเอ็ด, กาฬสินธุ์ , มุกดาหาร
$area['27'] = 4;
$area['28'] = 4;
$area['29'] = 4;
$area['30'] = 4;
$area['31'] = 4;
$area['32'] = 4;
$area['33'] = 4;
$area['34'] = 4;
$area['35'] = 4;
$area['36'] = 4;
$area['37'] = 4;
$area['77'] = 4;
// 5	ภาค 5	แม่ฮ่องสอน, เชียงใหม่ , เชียงราย, ลำพูน, ลำปาง,  พะเยา, แพร่, น่าน, 
$area['38'] = 5;
$area['39'] = 5;
$area['40'] = 5;
$area['42'] = 5;
$area['43'] = 5;
$area['44'] = 5;
$area['45'] = 5;
$area['46'] = 5;
// 6	ภาค 6	ตาก,  สุโขทัย, อุตรดิตถ์ , กำแพงเพชร, พิษณุโลก, อุทัยธานี, พิจิตร, นครสวรรค์ , เพชรบูรณ์ 
$area['41'] = 6;
$area['47'] = 6;
$area['48'] = 6;
$area['49'] = 6;
$area['50'] = 6;
$area['51'] = 6;
$area['52'] = 6;
$area['53'] = 6;
$area['54'] = 6;
// 7	ภาค 7	สมุทรสงคราม, สมุทรสาคร, นครปฐม, สุพรรณบุรี, กาญจนบุรี, ราชบุรี, เพชรบุรี, ประจวบคีรีขันธ์
$area['55'] = 7;
$area['56'] = 7;
$area['57'] = 7;
$area['58'] = 7;
$area['59'] = 7;
$area['60'] = 7;
$area['61'] = 7;
$area['62'] = 7;
// 8	ภาค 8	ชุมพร , ระนอง, พังงา , ภูเก็ต , สุราษฏร์ธานี, กระบี่ , นครศรีธรรมราช
$area['63'] = 7;
$area['64'] = 7;
$area['65'] = 7;
$area['66'] = 7;
$area['67'] = 7;
$area['68'] = 7;
$area['69'] = 7;
// 9	ภาค 9	ตรัง , พัทลุง, สตูล,  สงขลา , ปัตตานี , ยะลา ,นราธิวาส , 
$area['70'] = 7;
$area['71'] = 7;
$area['72'] = 7;
$area['73'] = 7;
$area['74'] = 7;
$area['75'] = 7;
$area['76'] = 7;


?>
<div class="card">

    <div class="card-body">


        <div class="pull-right" style="margin-right:120px">



            <div class="justify-content-center">

                <div class="card-body">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <canvas id="myChart1" style="width:100%;max-width:1000px"></canvas>
                    <script>
                        var barColors = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145"
                        ];

                        const data2 = {
                            labels: ["กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
                            datasets: [

                                {
                                    label: 'การบริหารจัดการตน',
                                    borderColor: 'red',
                                    backgroundColor: barColors[0],
                                    fill: false,
                                    data: [3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'ทุนทางจิตวิทยา',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[1],
                                    fill: false,
                                    data: [3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การเห็นคุณค่าในตนเอง ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[2],
                                    fill: false,
                                    data: [3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'พลังตัวตน ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[3],
                                    fill: false,
                                    data: [3.04, 2.3, 3.12, 2.8, 3.80, 2.10, 2.80, 2.90, 2.90, 2.90],
                                    yAxisID: 'y1',
                                    order: 1
                                }
                            ]
                        };

                        const options2 = {
                            responsive: true,
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            stacked: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'ผลประเมินย้อนหลังปี 2562 เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยภูมิคุ้มกัน'
                                },
                                legend: {
                                    position: 'right',
                                    labels: {
                                        boxWidth: 20,
                                        padding: 20
                                    }
                                },

                            },
                            scales: {



                            }

                        };

                        new Chart('myChart1', {
                            type: 'bar',
                            data: data2,
                            options: options2
                        });
                    </script>

                    <table class="table" style="width:100%;max-width:1000px">
                        <tr>
                            <th></th>
                            <th>การบริหารจัดการตน</th>
                            <th>ทุนทางจิตวิทยา</th>
                            <th>การเห็นคุณค่าในตนเอง</th>
                            <th>พลังตัวตน</th>
                        </tr>
                        <tr>
                            <!--2.74	3.04	3.20	3.07-->
                            <td>PR50 กลุ่มไม่เคยลอง</td>
                            <td> 2.74 </td>
                            <td>3.04</td>
                            <td>3.20</td>
                            <td>3.07 </td>
                        </tr>
                        <tr>
                            <td>PR50 กลุ่มเคยลอง </td>
                            <td>2.58</td>
                            <td>2.88</td>
                            <td>3.00</td>
                            <td>2.87</td>
                        </tr>


                    </table>

                </div>
                <div class="card-body">

                    <canvas id="myChart2" style="width:100%;max-width:1000px"></canvas>

                    <script>
                        var barColors = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145"
                        ];

                        const data3 = {
                            labels: [
                                "2562 กลุ่มไม่เคยลอง ",
                                "2562  กลุ่มเคยลอง ",
                                "2564 กลุ่มไม่เคยลอง ",
                                "2564  กลุ่มเคยลอง ",
                                "2566 กลุ่มไม่เคยลอง ",
                                "2566  กลุ่มเคยลอง"
                            ],
                            datasets: [

                                {
                                    label: 'การคล้อยตามกลุ่มคนใช้สารเสพติด',
                                    borderColor: 'red',
                                    backgroundColor: barColors[0],
                                    fill: false,
                                    data: [1.38,
                                        1.75,
                                        1.40,
                                        1.50,
                                        1.50,
                                        1.85
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'ความรุนแรงในครอบครัว ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[1],
                                    fill: false,
                                    data: [1.45,
                                        1.64,
                                        1.50,
                                        1.70,
                                        1.50,
                                        1.65
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การเป็นแบบอย่างในการใช้สารเสพติด  ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[2],
                                    fill: false,
                                    data: [1.31,
                                        1.56,
                                        1.31,
                                        1.56,
                                        1.40,
                                        1.50
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การเปิดรับเกี่ยวกับบ่อสารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[3],
                                    fill: false,
                                    data: [1.40,
                                        1.25,
                                        1.20,
                                        1.25,
                                        1.50,
                                        1.25
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'เจตคติทางบวกต่อการใช้สารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[4],
                                    fill: false,
                                    data: [1.63,
                                        2.00,
                                        1.63,
                                        2.00,
                                        1.63,
                                        2.00
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การรับรู้แหล่งซื่อสารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[5],
                                    fill: false,
                                    data: [1.29,
                                        1.86,
                                        1.29,
                                        1.86,
                                        1.29,
                                        1.86,
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }
                            ]
                        };

                        const options3 = {
                            responsive: true,
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            stacked: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'ผลประเมินย้อนหลัง 3 ปี เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยลบ'
                                },
                                legend: {
                                    position: 'right',
                                    labels: {
                                        boxWidth: 20,
                                        padding: 20
                                    }
                                },

                            },
                            scales: {


                            }

                        };

                        new Chart('myChart2', {
                            type: 'bar',
                            data: data3,
                            options: options3
                        });
                    </script>


                    <table class="table" style="width:100%;max-width:1000px">
                        <tr>
                            <th></th>
                            <th>การคล้อยตามกลุ่มคนใช้สารเสพติด</th>
                            <th>ความรุนแรงในครอบครัว</th>
                            <th>การเป็นแบบอย่างในการใช้สารเสพติด</th>
                            <th>การเปิดรับเกี่ยวกับสื่อสารเสพติด</th>
                            <th>เจตคติทางบวกต่อการใช้สารเสพติด</th>
                            <th>การรับรู้แหล่งซื่อสารเสพติด</th>
                        </tr>
                        <tr>
                            <td>PR50 กลุ่มไม่เคยลอง</td>
                            <td>1.38</td>
                            <td>1.45</td>
                            <td>1.31</td>
                            <td>1.00</td>
                            <td>1.63</td>
                            <td>1.29</td>
                        </tr>
                        <tr>


                            <td>PR50 กลุ่มเคยลอง </td>
                            <td>1.75</td>
                            <td>1.64</td>
                            <td>1.56</td>
                            <td>1.25</td>
                            <td>2.00</td>
                            <td>1.86</td>
                        </tr>

                    </table>



                </div>


                <div class="card-body">
                    <canvas id="myChart3" style="width:100%;max-width:1000px"></canvas>

                    <script>
                        var barColors = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145"
                        ];

                        const data4 = {
                            labels: [
                                "2562 กลุ่มไม่เคยลอง ",
                                "2562  กลุ่มเคยลอง ",
                                "2564 กลุ่มไม่เคยลอง ",
                                "2564  กลุ่มเคยลอง ",
                                "2566 กลุ่มไม่เคยลอง ",
                                "2566  กลุ่มเคยลอง"
                            ],
                            datasets: [

                                {
                                    label: 'การคล้อยตามกลุ่มคนใช้สารเสพติด',
                                    borderColor: 'red',
                                    backgroundColor: barColors[0],
                                    fill: false,
                                    data: [1.38,
                                        1.75,
                                        1.40,
                                        1.50,
                                        1.50,
                                        1.85
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'ความรุนแรงในครอบครัว ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[1],
                                    fill: false,
                                    data: [1.45,
                                        1.64,
                                        1.50,
                                        1.70,
                                        1.50,
                                        1.65
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การเป็นแบบอย่างในการใช้สารเสพติด  ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[2],
                                    fill: false,
                                    data: [1.31,
                                        1.56,
                                        1.31,
                                        1.56,
                                        1.40,
                                        1.50
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การเปิดรับเกี่ยวกับบ่อสารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[3],
                                    fill: false,
                                    data: [1.40,
                                        1.25,
                                        1.20,
                                        1.25,
                                        1.50,
                                        1.25
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'เจตคติทางบวกต่อการใช้สารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[4],
                                    fill: false,
                                    data: [1.63,
                                        2.00,
                                        1.63,
                                        2.00,
                                        1.63,
                                        2.00
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }, {
                                    label: 'การรับรู้แหล่งซื่อสารเสพติด ',
                                    borderColor: 'rgb(54, 162, 235)',
                                    backgroundColor: barColors[5],
                                    fill: false,
                                    data: [1.29,
                                        1.86,
                                        1.29,
                                        1.86,
                                        1.29,
                                        1.86,
                                    ],
                                    yAxisID: 'y1',
                                    order: 1
                                }
                            ]
                        };

                        const options4 = {
                            responsive: true,
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            stacked: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'ผลประเมินย้อนหลัง 3 ปี เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยลบ'
                                },
                                legend: {
                                    position: 'right',
                                    labels: {
                                        boxWidth: 20,
                                        padding: 20
                                    }
                                },

                            },
                            scales: {


                            }

                        };

                        new Chart('myChart3', {
                            type: 'bar',
                            data: data4,
                            options: options4
                        });
                    </script>


                    <table class="table" style="width:100%;max-width:1000px">
                        <tr>
                            <th></th>
                            <th>การบริหารจัดการตน</th>
                            <th>ทุนทางจิตวิทยา</th>
                            <th>การเห็นคุณค่าในตนเอง</th>
                            <th>พลังตัวตน</th>
                        </tr>
                        <tr>
                            <!--2.74	3.04	3.20	3.07-->
                            <td>PR50 กลุ่มไม่เคยลอง</td>
                            <td> 2.74 </td>
                            <td>3.04</td>
                            <td>3.20</td>
                            <td>3.07 </td>
                        </tr>
                        <tr>


                            <td>PR50 กลุ่มเคยลอง </td>
                            <td>2.58</td>
                            <td>2.88</td>
                            <td>3.00</td>
                            <td>2.87</td>
                        </tr>


                    </table>

                    <br>

                </div>




                <div class="card-body">

                    <canvas id="myChart4" style="width:100%;max-width:800px"></canvas>

                    <script>
                        const xValues = ['', 'การบริหารจัดการตน', 'ทุนทางจิตวิทยา ', 'การเห็นคุณค่าในตนเอง ', 'พลังตัวตน', ''];

                        new Chart("myChart4", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    // 2.74	3.04	3.20	3.07
                                    data: [null, 2.74, 3.04, 3.20, 3.07, null],
                                    label: 'PR50 กลุ่มไม่เคยลอง ',
                                    borderColor: "blue",
                                    fill: false

                                }, {
                                    //2.58	2.88	3.00	2.87
                                    data: [null, 2.58, 2.88, 3.00, 2.87, null],
                                    borderColor: "red",
                                    label: 'PR50 กลุ่มเคยลอง ',
                                    fill: false
                                }]
                            },
                            options: {
                                // barValueSpacing: 0,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Norm ปัจจัยภูมิคุ้มกัน'
                                    },
                                    legend: {
                                        position: 'right',
                                        labels: {
                                            boxWidth: 20,
                                            padding: 20
                                        }
                                    },

                                }

                            }
                        });
                    </script>

                    <table class="table table-borderless" style="width:100%;max-width:800px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>การบริหารจัดการตน</th>
                                <th>ทุนทางจิตวิทยา</th>
                                <th>การเห็นคุณค่าในตนเอง</th>
                                <th>พลังตัวตน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--2.74	3.04	3.20	3.07-->
                                <td>PR50 กลุ่มไม่เคยลอง</td>
                                <td> 2.74 </td>
                                <td>3.04</td>
                                <td>3.20</td>
                                <td>3.07 </td>
                            </tr>
                            <tr>


                                <td>PR50 กลุ่มเคยลอง </td>
                                <td>2.58</td>
                                <td>2.88</td>
                                <td>3.00</td>
                                <td>2.87</td>
                            </tr>

                        </tbody>
                    </table>



                </div>




                <div class="card-body">

                    <canvas id="myChart5" style="width:100%;max-width:800px"></canvas>
                    <script>
                        const xValues2 = ['', 'การคล้อยตาม', 'ความรุนแรง', 'การเป็นแบบอย่าง', 'การเปิดรับ', 'เจตคติทางบวก', 'การรับรู้แหล่ง', ''];

                        new Chart("myChart5", {
                            type: "line",
                            data: {
                                labels: xValues2,
                                datasets: [{
                                    // 2.74	3.04	3.20	3.07
                                    data: [null, 1.38, 1.45, 1.31, 1.00, 1.63, 1.29, null],
                                    label: 'PR50 กลุ่มไม่เคยลอง ',
                                    borderColor: "blue",
                                    fill: false
                                }, {
                                    //2.58	2.88	3.00	2.87
                                    data: [null, 1.75, 1.64, 1.56, 1.25, 2.00, 1.86, null],
                                    borderColor: "red",
                                    label: 'PR50 กลุ่มเคยลอง ',
                                    fill: false
                                }]
                            },
                            options: {
                                // barValueSpacing: 0,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Norm ปัจจัยด้านลบ'
                                    },
                                    legend: {
                                        position: 'right',
                                        labels: {
                                            boxWidth: 20,
                                            padding: 20
                                        }
                                    },

                                }

                            }
                        });
                    </script>

                    <table class="table table-borderless" style="width:100%;max-width:800px">
                        <tr>
                            <th></th>
                            <th>การคล้อยตามกลุ่มคนใช้สารเสพติด</th>
                            <th>ความรุนแรงในครอบครัว</th>
                            <th>การเป็นแบบอย่างในการใช้สารเสพติด</th>
                            <th>การเปิดรับเกี่ยวกับสื่อสารเสพติด</th>
                            <th>เจตคติทางบวกต่อการใช้สารเสพติด</th>
                            <th>การรับรู้แหล่งซื่อสารเสพติด</th>
                        </tr>
                        <tr>
                            <td>PR50 กลุ่มไม่เคยลอง</td>
                            <td>1.38</td>
                            <td>1.45</td>
                            <td>1.31</td>
                            <td>1.00</td>
                            <td>1.63</td>
                            <td>1.29</td>
                        </tr>
                        <tr>


                            <td>PR50 กลุ่มเคยลอง </td>
                            <td>1.75</td>
                            <td>1.64</td>
                            <td>1.56</td>
                            <td>1.25</td>
                            <td>2.00</td>
                            <td>1.86</td>
                        </tr>

                    </table>



                </div>


                <div class="card-body">
                    <canvas id="myChart6" style="width:100%;max-width:800px"></canvas>
                    <script>
                        const xValues3 = ['', 'พลังครอบครัว', 'พลังสถานศึกษา ', 'พลังเพื่อนและกิจกรรม ', 'พลังชุมชน', ''];

                        new Chart("myChart6", {
                            type: "line",
                            data: {
                                labels: xValues3,
                                datasets: [{
                                    // 2.74	3.04	3.20	3.07
                                    data: [null, 3.38, 3.00, 3.00, 2.75, null],
                                    label: 'PR50 กลุ่มไม่เคยลอง ',
                                    borderColor: "blue",
                                    fill: false
                                }, {
                                    //2.58	2.88	3.00	2.87
                                    data: [null, 3.00, 2.73, 2.83, 2.50, null],
                                    borderColor: "red",
                                    label: 'PR50 กลุ่มเคยลอง ',
                                    fill: false
                                }]
                            },
                            options: {
                                // barValueSpacing: 0,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Norm ปัจจัยด้านบวก'
                                    },
                                    legend: {
                                        position: 'right',
                                        labels: {
                                            boxWidth: 20,
                                            padding: 20
                                        }
                                    },

                                }

                            }
                        });
                    </script>
                    <table class="table table-borderless" style="width:100%;max-width:800px">
                        <tr>


                            <th></th>
                            <th>พลังครอบครัว</ th>
                            <th>พลังสถานศึกษา</th>
                            <th>พลังเพื่อนและกิจกรรม</th>
                            <th>พลังชุมชน</th>
                        </tr>
                        <tr>
                            <!--2.74	3.04	3.20	3.07-->
                            <td>PR50 กลุ่มไม่เคยลอง</td>
                            <td> 3.38</td>
                            <td> 3.00</td>
                            <td>3.00</td>
                            <td> 2.75</td>
                        </tr>
                        <tr>


                            <td>PR50 กลุ่มเคยลอง </td>
                            <td>3.00</td>
                            <td>2.73</td>
                            <td>2.83</td>
                            <td>2.50</td>
                        </tr>


                    </table>

                    <br>

                </div>


            </div>

        </div>

    </div>