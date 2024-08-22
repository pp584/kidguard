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

	<!-- Require -->
	<link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
	<link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

	{another_css}

	<style>
		#myDiv {
			font-size: 12px;
			height: 100px;
			overflow: hidden;
			width: 256px;
			white-space: wrap;
			text-overflow: ellipsis;
		}

		.hero-text {
			font-size: 50px;
			font-weight: bold;
			line-height: 1;
		}

		#background-holder3 {
			background: url('../images/bg_statistics.png') no-repeat center;
			background-size: cover;
			background-attachment: fixed;
			padding-bottom: 50px;
			position: absolute;
			width: 100%;
			min-height: 100%;
			top: 0;
			left: 0;
			background-position: center;
			z-index: -1;
			overflow: hidden;
			will-change: transform, opacity, filter;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			background-repeat: no-repeat;
		}
	</style>

</head>

<body>

	<!-- Body Wrapper -->
	<div id="homepage-three" class="overflow-hidden">
		<!-- Header Section -->
		<!-- <header class="position-absolute">
			<div class="container">
				<div class="row">
					<div class="col-sm-2 col-md-2 col-xl-3">
						<a class="navbar-brand" class="img-fluid" style="width:100px;height: auto; " href="{site_url}home">
							<img src="{base_url}assets/images/icon/logo7.png" style="width:270px;height: auto; " alt="Logo" />
						</a>
					</div>
					<div class="col-sm-8 col-md-8 col-xl-7 d-flex ms-header-bg">
						<nav class="navbar navbar-expand-lg">
							<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#hamburgernavmenucontent" aria-controls="hamburgernavmenucontent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="menu_toggle">
									<span class="hamburger">
										<span></span>
										<span></span>
										<span></span>
									</span>
									<span class="hamburger-cross">
										<span></span>
										<span></span>
									</span>
								</span>
							</button>
							<div class="collapse navbar-collapse justify-content-center" id="hamburgernavmenucontent">
								<ul class="navbar-nav align-items-lg-center">
									<li class="nav-item"><a href="{site_url}home">หน้าหลัก</a></li>
									<li class="nav-item"><a href="{site_url}about">เกี่ยวกับเรา</a></li>
									<li class="dropdown nav-item">
                                        <a data-toggle="dropdown" href="#." role="button" aria-haspopup="true" aria-expanded="false">เกี่ยวกับเรา</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="about">โครงการวิจัย</a>
                                        </div>
                                    </li>

									<li class="dropdown nav-item">
										<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ข่าวสาร</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="{site_url}announcement">ข่าวสาร</a>
											<a class="dropdown-item" href="{site_url}postnews">ประชาสัมพันธ์</a>
											<a class="dropdown-item" href="{site_url}activities">กิจกรรม</a>
										</div>
									</li>

									<li class="dropdown nav-item">
										<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ป้องกันสารเสพติด</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="{site_url}news_basic_info">ข้อมูลพื้นฐาน</a>
											<a class="dropdown-item" href="{site_url}news_research_info">ข้อมูลงานวิจัย</a>
										</div>
									</li>


									<li class="nav-item"><a href="{site_url}asked_questions">FAQ</a></li>
									<li class="nav-item"><a href="{site_url}contactus">ติดต่อเรา</a></li>
									<li class="dropdown nav-item">
										<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">แบบประเมิน</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="{site_url}evaluation_form/evaluationExplanation">แบบประเมิน</a>
											<a class="dropdown-item" target="_blank" href="{site_url}/assets/uploads/pdf/คู่มือการใช้งานนักเรียน.pdf">PDF คู่มือนักเรียน</a>
											<a class="dropdown-item" target="_blank" href="{site_url}/assets/uploads/vdo/VDO คู่มือการใช้งานของนักเรียน.mp4">VDO คู่มือนักเรียน</a>

										</div>
									</li>
									<li class="dropdown nav-item">
										<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">สืบค้นข้อมูล</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>

					<div class="col-sm-2 col-md-2 col-xl-2">
						<?php
						$level_user =  $this->session->userdata("user_level");
						$user_firstname = $this->session->userdata('user_firstname');
						$user_lastname  = $this->session->userdata('user_lastname');

						$redirect_url = '';
						if ($level_user == 1) {
							$redirect_url = base_url() . 'dashboard/DashboardHistorical';
						} else if ($level_user == 2) {
							$redirect_url = base_url() . 'dashboard/DashboardHistorical';
						} else if ($level_user == 3) {
							$redirect_url = base_url() . 'dashboard/DashboardHistorical';
						} else if ($level_user == 4) {
							$redirect_url = base_url() . 'dashboard/DashboardHistorical';
						} else if ($level_user == 9) {
							$redirect_url = base_url() . 'website/slides';
						}

						if ($this->session->userdata('login_validated') == false) {

						?>
							<a href="{site_url}member/login">
								<button class="btnlogin bg-info" value="Sign in"> <i class="fa fa-lock"></i> Login</button>
							</a>
						<?php
						} else {
						?>
							<a href="<?= $redirect_url ?>">
								<button class="btnlogin bg-info" value="Sign in"> <i class="fa fa-user"></i> <?php echo $user_firstname  . ' ' . $user_lastname  ?></button>
							</a>
						<?php  }
						?>
					</div>
				</div>
			</div>
		</header> -->

		<header class="position-absolute">
			<!-- Navbar -->
			{top_navbar}
		</header>


		<!-- Slider Section -->
		<section id="home-three-bnr" class="position-relative">
			<div id="ms-hero-slider" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators carousel-indicators-numbers">
					<?php
					$i = 0;
					foreach ($list_data_cms_slide as $row) {
						$i = $i + 1;
					?>
						<?php if ($i == 1) { ?>
							<li data-target="#ms-hero-slider" data-slide-to="<?php echo $i ?>" class="active"><?php echo $i ?></li>

						<?php } else { ?>
							<li data-target="#ms-hero-slider" data-slide-to="<?php echo $i ?>"><?php echo $i ?></li>

						<?php } ?>

					<?php } ?>
				</ol>
				<div class="carousel-inner">

					<?php
					$i = 0;
					foreach ($list_data_cms_slide as $row) {
						$i = $i + 1;
					?>
						<?php if ($i == 1) { ?>
							<div class="carousel-item active">
								<img src="{base_url}<?php echo $row->image;  ?>" style="height: 200px;  width: 100%;" class="img-fluid ms-slide-img" alt="Slider Image">
								<div class="carousel-caption">
									<span class="three-subheading"><?php echo $row->title;  ?></span>
									<h1 class="hero-text mt-5"><?php echo $row->title;  ?></h1>
									<h5 class="font-weight-bold mb-5">ล้อมรักให้ครอบครัว เหมือนล้อมรั้วป้องกันยาเสพติด</h5>
									<!-- <a href="www.facebook.com" data-toggle="modal" data-target="#msvideobox"><img src="images/home-3-play.png" class="img-fluid ms-resp-img" alt="Play Button Image"></a> -->
								</div>
							</div>
						<?php } else { ?>
							<div class="carousel-item">
								<img src="{base_url}<?php echo $row->image;  ?>" style="height: 200px;  width: 100%;" class="img-fluid ms-slide-img" alt="Slider Image">
								<div class="carousel-caption">
									<span class="three-subheading"><?php echo $row->title;  ?></span>
									<h1 class="hero-text mt-5"><?php echo $row->title;  ?></h1>
									<h5 class="font-weight-bold mb-5">ล้อมรักให้ครอบครัว เหมือนล้อมรั้วป้องกันยาเสพติด</h5>
									<!-- <a href="www.facebook.com" data-toggle="modal" data-target="#msvideobox"><img src="images/home-3-play.png" class="img-fluid ms-resp-img" alt="Play Button Image"></a> -->
								</div>
							</div>

						<?php } ?>

					<?php } ?>


				</div>
				<a class="carousel-control-prev" href="#ms-hero-slider" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#ms-hero-slider" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</section>



		<!-- Blue Section -->
		<section id="home-three-blue-sec">
			<div class="container">
				<div class="row">
					<!-- <div class="col-12">
						<h1>{site_url}about</h1>
					</div> -->
					<div class="col-lg-6">
						<span class="three-subheading">Anti Narcoticst</span>
						<h2 class="font-weight-bold text-white mb-4">ต่อต้านสารเสพติด</h2>
						<h5 class="font-weight-bold text-white pr-3">เสริมสร้างความตระหนักรู้ ถึงภัยจากสารเสพติดและเข้าร่วมในการแก้ไขปัญหาสาเสพติด
							อย่างจริงจังและต่อเนื่อง เพื่อการเอาชนะสารเสพติดให้ได้ผลอย่างยั่งยืน</h5>
					</div>
				</div>
			</div>
		</section>

		<!-- What is coronavirus Section -->
		<section id="home-three-coronavirus-sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<!-- <h5 class="mb-5 pr-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</h5> -->
						<div class="row">

							<?php $i = 0;
							foreach ($list_data_cardiac_arrest as $row) {
								$i++;
							?>
								<div class="col-md-6">
									<div class="ms-icon-box">
										<img src="{base_url}assets/themes/front-end/images/why-choose-us-icon.png" class="img-fluid mb-2" alt="Icon">
										<div id="myDiv">
											<p><?php echo  $row->detail;  ?></p>
										</div>
										<a href="{site_url}news_basic_info/preview/<?php echo $row->ca_basic_info ?>">More</a>
									</div>
								</div>
							<?php } ?>

						</div>
						<!-- <a href="#." class="btn ms-gradient-btn mt-4">LEARN MORE</a> -->
					</div>
					<div class="col-lg-6">
						<div id="home-3-blue-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $i = 0;
								foreach ($cms_cardiac_arrest_slide as $row) {
									$i = $i + 1;

									if ($i == 1) { ?>
										<div class="carousel-item active" data-interval="10000">
											<img src="{base_url}<?php echo $row->image ?>" class="d-block w-100" alt="Image">
										</div>

									<?php
									} else { ?>
										<div class="carousel-item" data-interval="10000">
											<img src="{base_url}<?php echo $row->image ?>" class="d-block w-100" alt="Image">
										</div>

									<?php }
									?>




								<?php } ?>

							</div>
							<a class="carousel-control-prev" href="#home-3-blue-carousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#home-3-blue-carousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Coronavirus Symptoms Section -->
		<section id="home-three-symptoms-sec" class="pad-100  pb-0">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h5 class="hree-subheading">" Understand" and "Present an Opportunity" to be Addicted to Drug Treatment "</h5>
						<!-- <span class="three-subheading"></span> -->
						<h4 class="font-weight-bold mb-4">"เข้าใจ" และ "ให้โอกาส" ติดยารักษาได้: เทคนิคเปลี่ยนผู้ติดยาเสพติดเป็นคนใหม่ </h4>
					</div>
				</div>
				<div class="ms-spacer-80"></div>
				<div class="row">

					<?php foreach ($list_data_cms_ca_symptoms as $row) { ?>
						<div class="col-md-6 col-lg-4">
							<div class="ms-three-symptom-box position-relative">
								<img src="{base_url}<?php echo $row->image ?>" style="height: 110px;" class="img-fluid position-absolute symptom-img" alt="Image">
								<br />
								<h4 class="font-weight-bold mb-4"><?php echo $row->ca_symptoms_name; ?></h4>
								<div id="myDiv">
									<p class="mb-4"><?php echo $row->ca_symptoms_detail; ?></p>
								</div>
								<a href="{site_url}home/ca_preview/<?php echo $row->ca_symptoms_id ?>" class="font-weight-bold text-white">More <i class="fas fa-long-arrow-alt-right ms-right-arrow"></i></a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<section id="home-four-spread-sec" class="pad-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-2">
						<div class="flex-1">
							<h2 class="text-warning d-inline-block custom-space" style="font-size:70px;">
								<span class="me-3 align-middle">
									<img src="{base_url}assets/themes/front-end/images/checkmark.png" alt="checkmark" style="width: 45px" />
								</span> สถิตินักเรียน<br />
								<span class="text-white" style="font-size:40px;">ที่เข้าประเมินสมรรถนะประจำปี <?= date('Y') + 543; ?></span>
							</h2>
							<div class="row mt-4 pe-lg-10 justify-content-center">
								<div class="overflow-hidden col-12 col-md-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
									<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":52}'>{total_student}</div>
									<h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Number of Student</h6>
								</div>
								<div class="overflow-hidden col-12 col-md-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
									<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":164}'>{self_management}</div>
									<h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Self-management</h6>
								</div>
								<div class="w-100 d-lg-none"></div>
								<div class="overflow-hidden col-12 col-md-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
									<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":38}'>{psychological_capital}</div>
									<h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Psychological capital</h6>
								</div>
								<div class="overflow-hidden col-12 col-md-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
									<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":100}'>{self_esteem}</div>
									<h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Self-esteem</h6>
								</div>
								<div class="overflow-hidden col-12 col-md-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
									<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":100}'>{identity_power}</div>
									<h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Identity power</h6></br></br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="home-three-symptoms-sec" class="pad-100  pb-0" style="font-size: 0.7rem;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-2">
						<div class="flex-1">
							<div class="row mt-12 pe-lg-10 justify-content-center">
								<div class="overflow-hidden col-12 col-md-12" data-zanim-timeline="{}" data-zanim-trigger="scroll">


									<canvas id="myChart1" style="height:400px; max-width:100%"></canvas>
									<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
									<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
									<script>
										var barColors = {
											'2562': "#007BA7",
											'2564': "#FF00FF",
											'2566': "#00FFFF"
										};

										const data2 = {
											labels: ['การบริหารจัดการตน', 'ทุนทางจิตวิทยา', 'การเห็นคุณค่าในตนเอง', 'พลังตัวตน'],
											datasets: [{
												label: 'ปีการศึกษา {date2},{date1},{date0}',
												backgroundColor: barColors['2562'],
												data: [<?= $self_management_score_3 ?>, <?= $psychological_capital_score_3 ?>, <?= $self_esteem_score_3 ?>, <?= $identity_power_score_3 ?>],
											}, ]
										};

										const options2 = {
											responsive: true,
											interaction: {
												mode: 'index',
												intersect: false,
											},
											plugins: {
												title: {
													display: true,
													text: 'ผลประเมินเฉลี่ยย้อนหลัง 3 ปี เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยภูมิคุ้มกัน',
													font: {
														size: 18
													}
												},
												legend: {
													position: 'top',
													labels: {
														boxWidth: 20,
														padding: 20
													}
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
											},
											scales: {
												y: {
													beginAtZero: true,
													ticks: {
														stepSize: 0.5,
														max: 5
													}
												},
												x: {
													stacked: false,
												}
											}
										};

										new Chart('myChart1', {
											type: 'bar',
											data: data2,
											options: options2
										});
									</script>

									<table class="table" style="width:100%;">
										<tr>
											<th></th>
											<th class="text-center emphasized-header">การบริหารจัดการตน</th>
											<th class="text-center emphasized-header">ทุนทางจิตวิทยา</th>
											<th class="text-center emphasized-header">การเห็นคุณค่าในตนเอง</th>
											<th class="text-center emphasized-header">พลังตัวตน</th>
										</tr>
										<tr>
											<td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
											<!-- For each value, replace the static value with PHP code -->
											<?php $values = [2.74, 3.04, 3.20, 3.07]; // Replace with actual values if they are dynamic 
											?>
											<?php foreach ($values as $value) : ?>
												<td class="text-center">
													<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
												</td>
											<?php endforeach; ?>
										</tr>
										<tr>
											<td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
											<!-- Repeat the process for the next set of values -->
											<?php $values = [2.58, 2.88, 3.00, 2.87]; // Replace with actual values if they are dynamic 
											?>
											<?php foreach ($values as $value) : ?>
												<td class="text-center">
													<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
												</td>
											<?php endforeach; ?>
										</tr>
									</table>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-6 col-md-2">
						<div class="flex-1">
							<div class="row mt-12 pe-lg-10 justify-content-center">
								<canvas id="myChart3" style="height:400px; max-width:100%"></canvas>
								<script>
									var barColors = {
										'2562': "#007BA7",
										'2564': "#FF00FF",
										'2566': "#00FFFF"
									};

									const data4 = {
										labels: ['พลังครอบครัว', 'พลังสถานศึกษา ', 'พลังเพื่อนและกิจกรรม ', 'พลังชุมชน'],
										datasets: [{
											label: 'ปีการศึกษา {date2},{date1},{date0}',
											backgroundColor: barColors['2562'],
											data: [<?= $family_power_score_3 ?>, <?= $school_power_score_3 ?>, <?= $friend_power_score_3 ?>, <?= $community_power_score_3 ?>],
										}, ]
									};

									const options4 = {
										responsive: true,
										interaction: {
											mode: 'index',
											intersect: false,
										},
										plugins: {
											title: {
												display: true,
												text: 'ผลประเมินเฉลี่ยย้อนหลัง 3 ปี เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยบวก',
												font: {
													size: 18
												}
											},
											legend: {
												position: 'top',
												labels: {
													boxWidth: 20,
													padding: 20
												}
											},
											annotation: {
												annotations: {
													greenLine1: {
														type: 'line',
														xMax: -0.5,
														xMin: 0.5,
														yMin: 3.38,
														yMax: 3.38,
														borderColor: 'green',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '3.38',
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
													greenLine2: {
														type: 'line',
														xMin: 0.5,
														xMax: 1.5,
														yMin: 3.00,
														yMax: 3.00,
														borderColor: 'green',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '3.00',
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
														yMin: 2.73,
														yMax: 2.73,
														borderColor: 'red',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '2.73',
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
														yMin: 3.00,
														yMax: 3.00,
														borderColor: 'green',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '3.00',
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
														yMin: 2.83,
														yMax: 2.83,
														borderColor: 'red',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '2.83',
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
														yMin: 2.75,
														yMax: 2.75,
														borderColor: 'green',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '2.75',
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
														yMin: 2.50,
														yMax: 2.50,
														borderColor: 'red',
														borderWidth: 2,
														label: {
															enabled: true,
															content: '2.50',
															position: 'right',
															backgroundColor: 'red',
															color: 'white',
															yAdjust: 6,
														}
													}
												}
											}
										},
										scales: {
											y: {
												beginAtZero: true,
												ticks: {
													stepSize: 0.5,
													max: 5
												}
											},
											x: {
												stacked: false,
											}
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
										<th class="text-center emphasized-header">พลังครอบครัว</th>
										<th class="text-center emphasized-header">พลังสถานศึกษา</th>
										<th class="text-center emphasized-header">พลังเพื่อนและกิจกรรม</th>
										<th class="text-center emphasized-header">พลังชุมชน</th>
									</tr>
									<tr>
										<td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
										<!-- For each value, replace the static value with PHP code -->
										<?php $values = [3.38, 3.00, 3.00, 2.75]; // Replace with actual values if they are dynamic 
										?>
										<?php foreach ($values as $value) : ?>
											<td class="text-center">
												<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
											</td>
										<?php endforeach; ?>
									</tr>
									<tr>
										<td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
										<!-- Repeat the process for the next set of values -->
										<?php $values = [3.00, 2.73, 2.83, 2.50]; // Replace with actual values if they are dynamic 
										?>
										<?php foreach ($values as $value) : ?>
											<td class="text-center">
												<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
											</td>
										<?php endforeach; ?>
									</tr>
								</table>

							</div>


						</div>
					</div>

					<div class="col-md-12 col-md-2">
						<div class="row mt-12 pe-lg-10 justify-content-center">
							<canvas id="myChart2" style="height:400px; max-width:100%"></canvas>
							<script>
								var barColors = {
									'2562': "#007BA7",
									'2564': "#FF00FF",
									'2566': "#00FFFF"
								};

								const data3 = {
									labels: ['การคล้อยตาม', 'ความรุนแรง', 'การเป็นแบบอย่าง', 'การเปิดรับ', 'เจตคติทางบวก', 'การรับรู้แหล่ง'],
									datasets: [{
										label: 'ปีการศึกษา {date2},{date1},{date0}',
										backgroundColor: barColors['2562'],
										data: [<?= $compliance_score_3 ?>, <?= $domestic_violence_score_3 ?>, <?= $exemplary_score_3 ?>, <?= $media_exposure_score_3 ?>, <?= $attitude_score_3 ?>, <?= $source_purchase_score_3 ?>],
									}, ]
								};

								const options3 = {
									responsive: true,
									interaction: {
										mode: 'index',
										intersect: false,
									},
									plugins: {
										title: {
											display: true,
											text: 'ผลประเมินเฉลี่ยย้อนหลัง 3 ปี เมื่อเทียบกับเกณฑ์มาตรฐานปัจจัยลบ',
											font: {
												size: 18
											}
										},
										legend: {
											position: 'top',
											labels: {
												boxWidth: 20,
												padding: 20
											}
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
									},
									scales: {
										y: {
											beginAtZero: true,
											ticks: {
												stepSize: 0.5,
												max: 5
											}
										},
										x: {
											stacked: false,
										}
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
									<th class="text-center emphasized-header">การคล้อยตามกลุ่มคนใช้สารเสพติด</th>
									<th class="text-center emphasized-header">ความรุนแรงในครอบครัว</th>
									<th class="text-center emphasized-header">การเป็นแบบอย่างในการใช้สารเสพติด</th>
									<th class="text-center emphasized-header">การเปิดรับเกี่ยวกับสื่อสารเสพติด</th>
									<th class="text-center emphasized-header">เจตคติทางบวกต่อการใช้สารเสพติด</th>
									<th class="text-center emphasized-header">การรับรู้แหล่งซื้อสารเสพติด</th>
								</tr>
								<tr>
									<td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
									<!-- For each value, replace the static value with PHP code -->
									<?php $values = [1.38, 1.45, 1.31, 1.00, 1.63, 1.29]; // Replace with actual values if they are dynamic 
									?>
									<?php foreach ($values as $value) : ?>
										<td class="text-center">
											<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
										</td>
									<?php endforeach; ?>
								</tr>
								<tr>
									<td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
									<!-- Repeat the process for the next set of values -->
									<?php $values = [1.75, 1.64, 1.56, 1.25, 2.00, 1.86]; // Replace with actual values if they are dynamic 
									?>
									<?php foreach ($values as $value) : ?>
										<td class="text-center">
											<span class="rounded" style="background-color:<?php echo ($value >= 3.50 && $value <= 4.00) ? '#00ced1' : (($value >= 3.00 && $value < 3.50) ? '#4CBB17' : (($value >= 2.00 && $value < 3.00) ? '#FFC000' : '#DC143C')); ?>;color:<?php echo ($value >= 2.00 && $value < 3.00) ? 'black' : 'white'; ?>;padding: 4px;"><?php echo number_format($value, 2, '.', ''); ?></span>
										</td>
									<?php endforeach; ?>
								</tr>
							</table>

						</div>


					</div>

				</div>
			</div>
		</section>

		<!-- Virus Spread Section -->
		<section id="home-three-spread-sec" class="pad-100">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<span class="three-subheading">Result of Behavioral Assessment of Substance Abuse</span>
						<h2 class="font-weight-bold mb-4 text-white" style="white-space: nowrap;">ผลประเมินปัจจัยบริบทและพฤติกรรมเสี่ยงต่อการใช้สารเสพติด</h2>
					</div>
					<div class="col-md-3 d-flex justify-content-end align-items-center">

					</div>
				</div>
				<div class="ms-spacer-30"></div>
				<div class="row">
					<?php $i = 0;
					foreach ($cms_ca_resuscitation as $row) {
						$i = $i + 1; ?>
						<div class="col-md-6">
							<div class="spread-box">
								<a href="{site_url}result/preview/<?php echo $row->ca_resuscitation_id ?>"><img src="{base_url}<?php echo $row->image ?>" class="img-fluid" alt="Image"></a>
								<a href="{site_url}result/preview/<?php echo $row->ca_resuscitation_id ?>" class="three-title-box"><?php echo $row->ca_resuscitation_name ?></a>
							</div>

						</div>
					<?php } ?>
				</div>
			</div>
		</section>

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
							<span class="mr-3"><a href="https://www.oncb.go.th/Pages/main.aspx" target="_blank" data-toggle="tooltip" data-placement="top" title="ปปส ">
									<img src="{base_url}/assets/images/creative_common.png">
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
				<!-- <iframe width="auto" height="auto" src="https://www.youtube.com/embed/T9oDbdsyjrM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/jquery/jquery.min.js"></script>
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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



</body>


</html>