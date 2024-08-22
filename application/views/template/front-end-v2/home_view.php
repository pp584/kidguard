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

	<script>
		var baseURL = '{base_url}/';
		var siteURL = '{site_url}';
		var csrf_token_name = '{csrf_token_name}';
		var csrf_cookie_name = '{csrf_cookie_name}';
	</script>

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
					<?php foreach ($list_data_cms_slide as $index => $row):; ?>
						<div class="carousel-item <?php if ($index === 0) echo 'active'; ?> display-flex">
							<img src="{base_url}<?php echo $row->image;  ?>" style="height: 200px;  width: 100%;" class="img-fluid ms-slide-img" alt="Slider Image">
							<div class="carousel-caption">
								<h1 class="hero-text text-white" style="text-shadow: 1px 3px 8px rgba(0, 0, 0, 1); font-size: 2.8rem">
									<?php echo $row->title; ?>
								</h1>
							</div>
						</div>
					<?php endforeach ?>
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
								<?php
								$i = 0;
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
									<?php } ?>
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
							<h2 class="text-warning" style="font-size:60px;">
								<span class="me-3 align-items-center d-flex flex-row justify-content-center">
									<img src="{base_url}assets/themes/front-end/images/checkmark.png" alt="checkmark" style="width: 45px; height:45px; margin-right:10px" />
									สถิตินักเรียน
								</span>
								<span class="text-white justify-content-center d-flex" style="font-size:35px;">
									ที่เข้าประเมินสมรรถนะประจำปี <?= date('Y') + 543; ?>
								</span>
							</h2>
							<div class="row mt-4 pe-lg-10 justify-content-center">
								<?php if (isset($stats) && isset($stats['submit_count'])) : ?>
									<div class="overflow-hidden col-12 col-lg-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
										<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-3 text-center" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":52}'>
											<?= $stats['submit_count'] ?>
										</div>
										<h6 class="fs-0 text-white text-center" data-zanim-xs='{"delay":0.2}'>
											จำนวนผู้ทำแบบประเมิน
										</h6>
									</div>

									<?php if (isset($stats['score_averages'])) : ?>
										<?php foreach ($stats['score_averages'] as $data): ?>
											<div class="overflow-hidden col-12 col-lg-2" data-zanim-timeline="{}" data-zanim-trigger="scroll">
												<div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-3 text-center" style="font-size: 28px;" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":52}'>
													<?= $data['scores'] ?>
												</div>
												<h6 class="fs-0 text-white text-center" data-zanim-xs='{"delay":0.2}'>
													<?= $data['name'] ?>
												</h6>
											</div>
										<?php endforeach ?>
									<?php endif ?>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="home-three-symptoms-sec" class="pad-100s" style="font-size: 0.7rem; padding:50px 0px">
			<div class="container">
				<div class="row">
					<!-- <canvas id="myChart1" style="height:400px; max-width:100%"></canvas> -->
					<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
					<script src="{base_url}assets/js/jquery.cookie.min.js"></script>
					<script src="{base_url}assets/js/ci_utilities.js?ver=1541805506"></script>
					<script src="{base_url}assets/js_modules/home_v2/home_v2.js?v=1"></script>
					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.2"></script>
				</div>
				<div class="chart-card row"></div>
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

	<!-- Bootstrap core JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/jquery/jquery.min.js"></script>
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- jQuery and Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



</body>


</html>