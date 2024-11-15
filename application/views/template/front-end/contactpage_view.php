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
		<section class="inner-bnr d-flex align-items-end pb-5" style="min-height: 550px;padding: unset; background: url({base_url}/assets/images/banner/1.jpg) no-repeat center; background-size: cover">
			<div class="container pb-5">
				<div class="row">
					<div class="col-12" class="text" style="text-shadow: 1px 3px 8px rgba(0, 0, 0, 1);">
						<span class="text text-white">Contact us</span>
						<h3 class="hero-text text-white my-2">ติดต่อเรา</h3>
						<h5 class="text-white"><a href="./" class="text text-white"><u>Home</u></a> - Contact us</h5>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact Form Area -->
		<section id="ms-form-sec">
			<div class="contact-bnr pad-100">
				<div class="container">
					<br />
					<div class="row">
						<div class="col-md-6">
							<h5 class="font-weight-bold">ติดต่อเรา</h5>
							<!-- <h5 class="font-weight-bold">For any enquiries, get in touch and contact us.</h5> -->
							<hr />
							<h6></h6>
							<div class="ms-spacer-40"> <?php echo validation_errors(); ?></div>

							<form action="<?= base_url('contactus/save') ?>" method="POST">
								{csrf_protection_field}
								<div class="row">
									<div class="form-group col-12">
										<input type="text" id="contact_name" name="contact_name" required="">
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>ชื่อ-นามสกุล</label>
									</div>
									<div class="form-group col-md-6">
										<input type="tel" id="phone" name="phone" required="">
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>เบอร์โทร</label>
									</div>
									<div class="form-group col-md-6">
										<input type="email" id="email" name="email" required="">
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>อีเมล</label>
									</div>
									<div class="form-group col-md-12">
										<input type="text" id="subject" name="subject" required="">
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>เรื่อง</label>
									</div>
									<div class="mt-2 form-group col-md-12 mb-4">
										<textarea rows="4" id="detail" name="detail" required=""></textarea>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>รายละเอียด</label>
									</div>
									<div class="mt-2 form-group col-md-12">
										<button type="submit" class="btn ms-primary-btn">บันทึก</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Get In Touch Section -->
		<section id="get-touch-sec">
			<div id="ms-touch-sec">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="map-section extra-space">
								<div class="container-fluid px-0">
									<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15495.177481073566!2d100.5301222!3d13.8513783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e6f420f837a4751!2z4Liq4LiW4Liy4Lia4Lix4LiZ4LiB4Liy4Lij4LmB4Lie4LiX4Lii4LmM4LiJ4Li44LiB4LmA4LiJ4Li04LiZ4LmB4Lir4LmI4LiH4LiK4Liy4LiV4Li0!5e0!3m2!1sth!2sth!4v1650894156787!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.2393252979614!2d100.54192287595367!3d13.764436096999136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ebbbf378e13%3A0x140123209037e9d0!2z4Liq4Liz4LiZ4Lix4LiB4LiH4Liy4LiZ4LiE4LiT4Liw4LiB4Lij4Lij4Lih4LiB4Liy4Lij4Lib4LmJ4Lit4LiH4LiB4Lix4LiZ4LmB4Lil4Liw4Lib4Lij4Liy4Lia4Lib4Lij4Liy4Lih4Lii4Liy4LmA4Liq4Lie4LiV4Li04LiU!5e0!3m2!1sth!2sth!4v1683536703158!5m2!1sth!2sth" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<h3 class="font-weight-bold">สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</h3>
							<div class="ms-spacer-40"></div>
							<div class="row">
								<div class="col-md-6">
									<!-- <span class="heading">เบอร์โทร</span> -->
									<h4 class="font-weight-bold" style="color:#BEBEBE ;">เบอร์โทร</h4>
									<h5 class="mb-3 mb-md-5">โทรศัพท์ 02-247-0901-19</h5>
								</div>
								<div class="col-md-6">
									<!-- <span class="heading">อีเมล</span> -->
									<h4 class="font-weight-bold" style="color:#BEBEBE ;">อีเมล</h4>
									<h5 class="mb-3 mb-md-5">contact@oncb.go.th</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<!-- <span class="heading"></span> -->
									<h4 class="font-weight-bold" style="color:#BEBEBE ;">ที่ตั้ง</h4>
									<h5 class="mb-3">
										เลขที่ 5 ถนนดินแดง แขวงสามเสนใน เขตพญาไท กรุงเทพมหานคร 10400</h5>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<!-- <span class="heading">ทีมวิจัย</span> -->
									<h4 class="font-weight-bold" style="color:#BEBEBE ;">ทีมวิจัย</h4>
									<h5 class="mb-3" style="margin-left: 50px;">1. รศ.ดร.วิไลลักษณ์ ลังกา</h5>
									<h5 class="mb-3" style="margin-left: 50px;">2. ผศ.ดร.อรอุมา เจริญสุข</h5>
									<h5 class="mb-3" style="margin-left: 50px;">3. รศ.ดร.พัชราภรณ์ ศรีสวัสดิ์</h5>
									<h5 class="mb-3" style="margin-left: 50px;">4. ผศ.ดร.นริสรา พึ่งโพธิ์สภ</h5>
									<h5 class="mb-3" style="margin-left: 50px;">5. ผศ.ดร.ทวิกา ตั้งประภา</h5>
									<h5 class="mb-3" style="margin-left: 50px;">6. ผศ.ดร.มนตา ตุลย์เมธาการ</h5>
									<h5 class="mb-3" style="margin-left: 50px;">7. รศ.ดร.อิทธิพัทธ์ สุวทันพรกูล</h5>
									<h5 class="mb-3" style="margin-left: 50px;">8. ผศ.ดร.พนิดา ศกุนตนาค</h5>
									<h5 class="mb-3">มหาวิทยาลัยศรีนครินทรวิโรฒ</h5>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<!-- <span class="heading">ทีมพัฒนาและดูแลระบบ </span> -->
									<h4 class="font-weight-bold" style="color:#BEBEBE ;">ทีมพัฒนาและดูแลระบบ</h4>
									<h5 class="mb-3" style="margin-left: 50px;">1. ผศ.สุรเดช บุญลือ </h5>
									<h5 class="mb-3" style="margin-left: 50px;">2. ว่าที่ร้อยตรี ปาริทรรศ์ ดาเดช</h5>
									<h5 class="mb-3">บริษัท Control Plus Consulting Co., Ltd.</h5>
								</div>
							</div>
						</div>
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

	<!-- {another_js} -->

</body>

</html>