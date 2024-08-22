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
							<img src="{base_url}assets/images/icon/form2.png" style="width: 150px;height: 150px;">
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
								<h3 class="font-weight-bold">ตอนที่ 2 ปัจจัยภูมิคุ้มกัน</h3>
							</div>
						</div>
						<hr />
						<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
							<div class="row">
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<legend>2.1 การบริหารจัดการตน <span style="color:red;">*</span></legend>
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
															<td>1</td>
															<td>ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง </td>
															<td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="1" id="quest-1"></td>
															<td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="2" id="quest-2"></td>
															<td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="3" id="quest-3"></td>
															<td><input type="radio" name="quest_1" data-record-value="{record_quest_1}" value="4" id="quest-4"></td>
														</tr>
														<tr>
															<td>2</td>
															<td>ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก </td>
															<td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="1" id="quest_2-1"></td>
															<td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="2" id="quest_2-2"></td>
															<td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="3" id="quest_2-3"></td>
															<td><input type="radio" name="quest_2" data-record-value="{record_quest_2}" value="4" id="quest_2-4"></td>
														</tr>
														<tr>
															<td>3</td>
															<td>ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ</td>
															<td><input type="radio" name="quest_3" value="4" data-record-value="{record_quest_3}" id="quest_3-1"></td>
															<td><input type="radio" name="quest_3" value="3" data-record-value="{record_quest_3}" id="quest_3-2"></td>
															<td><input type="radio" name="quest_3" value="2" data-record-value="{record_quest_3}" id="quest_3-3"></td>
															<td><input type="radio" name="quest_3" value="1" data-record-value="{record_quest_3}" id="quest_3-4"></td>
														</tr>
														<tr>
															<td>4</td>
															<td>ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย</td>
															<td><input type="radio" name="quest_4" value="4" data-record-value="{record_quest_4}" id="quest_4-1"></td>
															<td><input type="radio" name="quest_4" value="3" data-record-value="{record_quest_4}" id="quest_4-2"></td>
															<td><input type="radio" name="quest_4" value="2" data-record-value="{record_quest_4}" id="quest_4-3"></td>
															<td><input type="radio" name="quest_4" value="1" data-record-value="{record_quest_4}" id="quest_4-4"></td>
														</tr>
														<tr>
															<td>5</td>
															<td>ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร </td>
															<td><input type="radio" name="quest_5" value="4" data-record-value="{record_quest_5}" id="quest_5-1"></td>
															<td><input type="radio" name="quest_5" value="3" data-record-value="{record_quest_5}" id="quest_5-2"></td>
															<td><input type="radio" name="quest_5" value="2" data-record-value="{record_quest_5}" id="quest_5-3"></td>
															<td><input type="radio" name="quest_5" value="1" data-record-value="{record_quest_5}" id="quest_5-4"></td>
														</tr>
														<tr>
															<td>6</td>
															<td>ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ </td>
															<td><input type="radio" name="quest_6" value="4" data-record-value="{record_quest_6}" id="quest_6-1"></td>
															<td><input type="radio" name="quest_6" value="3" data-record-value="{record_quest_6}" id="quest_6-2"></td>
															<td><input type="radio" name="quest_6" value="2" data-record-value="{record_quest_6}" id="quest_6-3"></td>
															<td><input type="radio" name="quest_6" value="1" data-record-value="{record_quest_6}" id="quest_6-4"></td>
														</tr>
														<tr>
															<td>7</td>
															<td>เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง </td>
															<td><input type="radio" name="quest_7" value="4" data-record-value="{record_quest_7}" id="quest_7-1"></td>
															<td><input type="radio" name="quest_7" value="3" data-record-value="{record_quest_7}" id="quest_7-2"></td>
															<td><input type="radio" name="quest_7" value="2" data-record-value="{record_quest_7}" id="quest_7-3"></td>
															<td><input type="radio" name="quest_7" value="1" data-record-value="{record_quest_7}" id="quest_7-4"></td>
														</tr>
														<tr>
															<td>8</td>
															<td>ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้ </td>
															<td><input type="radio" name="quest_8" value="1" data-record-value="{record_quest_8}" id="quest_8-1"></td>
															<td><input type="radio" name="quest_8" value="2" data-record-value="{record_quest_8}" id="quest_8-2"></td>
															<td><input type="radio" name="quest_8" value="3" data-record-value="{record_quest_8}" id="quest_8-3"></td>
															<td><input type="radio" name="quest_8" value="4" data-record-value="{record_quest_8}" id="quest_8-4"></td>
														</tr>
														<tr>
															<td>9</td>
															<td>ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้ </td>
															<td><input type="radio" name="quest_9" value="1" data-record-value="{record_quest_9}" id="quest_9-1"></td>
															<td><input type="radio" name="quest_9" value="2" data-record-value="{record_quest_9}" id="quest_9-2"></td>
															<td><input type="radio" name="quest_9" value="3" data-record-value="{record_quest_9}" id="quest_9-3"></td>
															<td><input type="radio" name="quest_9" value="4" data-record-value="{record_quest_9}" id="quest_9-4"></td>
														</tr>
														<tr>
															<td>10</td>
															<td>ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์) </td>
															<td><input type="radio" name="quest_10" value="4" data-record-value="{record_quest_10}" id="quest0-1"></td>
															<td><input type="radio" name="quest_10" value="3" data-record-value="{record_quest_10}" id="quest0-2"></td>
															<td><input type="radio" name="quest_10" value="2" data-record-value="{record_quest_10}" id="quest0-3"></td>
															<td><input type="radio" name="quest_10" value="1" data-record-value="{record_quest_10}" id="quest0-4"></td>
														</tr>
														<tr>
															<td>11</td>
															<td>ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้ </td>
															<td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="1" id="quest1-1"></td>
															<td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="2" id="quest1-2"></td>
															<td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="3" id="quest1-3"></td>
															<td><input type="radio" name="quest_11" data-record-value="{record_quest_11}" value="4" id="quest1-4"></td>
														</tr>
														<tr>
															<td>12</td>
															<td>ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้ </td>
															<td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="1" id="quest2-1"></td>
															<td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="2" id="quest2-2"></td>
															<td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="3" id="quest2-3"></td>
															<td><input type="radio" name="quest_12" data-record-value="{record_quest_12}" value="4" id="quest2-4"></td>
														</tr>
														<tr>
															<td>13</td>
															<td>ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป</td>
															<td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="4" id="quest3-1"></td>
															<td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="3" id="quest3-2"></td>
															<td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="2" id="quest3-3"></td>
															<td><input type="radio" name="quest_13" data-record-value="{record_quest_13}" value="1" id="quest3-4"></td>
														</tr>
														<tr>
															<td>14</td>
															<td>ฉันถูกเบี่ยงเบนความสนใจได้ง่าย ในขณะทำกิจกรรม </td>
															<td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="4" id="quest4-1"></td>
															<td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="3" id="quest4-2"></td>
															<td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="2" id="quest4-3"></td>
															<td><input type="radio" name="quest_14" data-record-value="{record_quest_14}" value="1" id="quest4-4"></td>
														</tr>
														<tr>
															<td>15</td>
															<td>ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ</td>
															<td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="1" id="quest5-1"></td>
															<td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="2" id="quest5-2"></td>
															<td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="3" id="quest5-3"></td>
															<td><input type="radio" name="quest_15" data-record-value="{record_quest_15}" value="4" id="quest5-4"></td>
														</tr>
														<tr>
															<td>16</td>
															<td>ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน </td>
															<td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="1" id="quest6-1"></td>
															<td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="2" id="quest6-2"></td>
															<td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="3" id="quest6-3"></td>
															<td><input type="radio" name="quest_16" data-record-value="{record_quest_16}" value="4" id="quest6-4"></td>
														</tr>
														<tr>
															<td>17</td>
															<td>ฉันไม่สามารถจดจ่อกับงานที่ทำ แม้จะเป็นงานที่ชอบ</td>
															<td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="4" id="quest7-1"></td>
															<td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="3" id="quest7-2"></td>
															<td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="2" id="quest7-3"></td>
															<td><input type="radio" name="quest_17" data-record-value="{record_quest_17}" value="1" id="quest7-4"></td>
														</tr>
														<tr>
															<td>18</td>
															<td>ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ</td>
															<td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="4" id="quest8-1"></td>
															<td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="3" id="quest8-2"></td>
															<td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="2" id="quest8-3"></td>
															<td><input type="radio" name="quest_18" data-record-value="{record_quest_18}" value="1" id="quest8-4"></td>
														</tr>
														<tr>
															<td>19</td>
															<td>ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ </td>
															<td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="4" id="quest9-1"></td>
															<td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="3" id="quest9-2"></td>
															<td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="2" id="quest9-3"></td>
															<td><input type="radio" name="quest_19" data-record-value="{record_quest_19}" value="1" id="quest9-4"></td>
														</tr>
														<tr>
															<td>20</td>
															<td>ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน</td>
															<td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="1" id="quest_20-1"></td>
															<td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="2" id="quest_20-2"></td>
															<td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="3" id="quest_20-3"></td>
															<td><input type="radio" name="quest_20" data-record-value="{record_quest_20}" value="4" id="quest_20-4"></td>
														</tr>
														<tr>
															<td>21</td>
															<td>ฉันจัดลำดับความสำคัญของงานที่จะทำได้ </td>
															<td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="1" id="quest_21-1"></td>
															<td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="2" id="quest_21-2"></td>
															<td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="3" id="quest_21-3"></td>
															<td><input type="radio" name="quest_21" data-record-value="{record_quest_21}" value="4" id="quest_21-4"></td>
														</tr>
														<tr>
															<td>22</td>
															<td>การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน </td>
															<td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="4" id="quest_22-1"></td>
															<td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="3" id="quest_22-2"></td>
															<td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="2" id="quest_22-3"></td>
															<td><input type="radio" name="quest_22" data-record-value="{record_quest_22}" value="1" id="quest_22-4"></td>
														</tr>
														<tr>
															<td>23</td>
															<td>ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน </td>
															<td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="1" id="quest_23-1"></td>
															<td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="2" id="quest_23-2"></td>
															<td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="3" id="quest_23-3"></td>
															<td><input type="radio" name="quest_23" data-record-value="{record_quest_23}" value="4" id="quest_23-4"></td>
														</tr>
														<tr>
															<td>24</td>
															<td>ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์ </td>
															<td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="1" id="quest_24-1"></td>
															<td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="2" id="quest_24-2"></td>
															<td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="3" id="quest_24-3"></td>
															<td><input type="radio" name="quest_24" data-record-value="{record_quest_24}" value="4" id="quest_24-4"></td>
														</tr>
														<tr>
															<td>25</td>
															<td>ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน </td>
															<td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="1" id="quest_25-1"></td>
															<td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="2" id="quest_25-2"></td>
															<td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="3" id="quest_25-3"></td>
															<td><input type="radio" name="quest_25" data-record-value="{record_quest_25}" value="4" id="quest_25-4"></td>
														</tr>
														<tr>
															<td>26</td>
															<td>ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง </td>
															<td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="1" id="quest_26-1"></td>
															<td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="2" id="quest_26-2"></td>
															<td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="3" id="quest_26-3"></td>
															<td><input type="radio" name="quest_26" data-record-value="{record_quest_26}" value="4" id="quest_26-4"></td>
														</tr>
														<tr>
															<td>27</td>
															<td>ฉันติดตามผลการปรับปรุงงานของตนเอง </td>
															<td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="1" id="quest_27-1"></td>
															<td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="2" id="quest_27-2"></td>
															<td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="3" id="quest_27-3"></td>
															<td><input type="radio" name="quest_27" data-record-value="{record_quest_27}" value="4" id="quest_27-4"></td>
														</tr>
														<tr>
															<td>28</td>
															<td>ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้ </td>
															<td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="1" id="quest_28-1"></td>
															<td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="2" id="quest_28-2"></td>
															<td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="3" id="quest_28-3"></td>
															<td><input type="radio" name="quest_28" data-record-value="{record_quest_28}" value="4" id="quest_28-4"></td>
														</tr>
														<tr>
															<td>29</td>
															<td>ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้ </td>
															<td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="4" id="quest_29-1"></td>
															<td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="3" id="quest_29-2"></td>
															<td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="2" id="quest_29-3"></td>
															<td><input type="radio" name="quest_29" data-record-value="{record_quest_29}" value="1" id="quest_29-4"></td>
														</tr>
														<tr>
															<td>30</td>
															<td>ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย </td>
															<td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="4" id="quest_30-1"></td>
															<td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="3" id="quest_30-2"></td>
															<td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="2" id="quest_30-3"></td>
															<td><input type="radio" name="quest_30" data-record-value="{record_quest_30}" value="1" id="quest_30-4"></td>
														</tr>
														<tr>
															<td>31</td>
															<td>ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้ </td>
															<td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="1" id="quest_31-1"></td>
															<td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="2" id="quest_31-2"></td>
															<td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="3" id="quest_31-3"></td>
															<td><input type="radio" name="quest_31" data-record-value="{record_quest_31}" value="4" id="quest_31-4"></td>
														</tr>
														<tr>
															<td>32</td>
															<td>ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป </td>
															<td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="4" id="quest_32-1"></td>
															<td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="3" id="quest_32-2"></td>
															<td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="2" id="quest_32-3"></td>
															<td><input type="radio" name="quest_32" data-record-value="{record_quest_32}" value="1" id="quest_32-4"></td>

														</tr>
														<tr>
															<td>33</td>
															<td>ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว </td>
															<td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="4" id="quest_33-1"></td>
															<td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="3" id="quest_33-2"></td>
															<td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="2" id="quest_33-3"></td>
															<td><input type="radio" name="quest_33" data-record-value="{record_quest_33}" value="1" id="quest_33-4"></td>
														</tr>
														<tr>
															<td>34</td>
															<td>ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด </td>
															<td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="1" id="quest_34-1"></td>
															<td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="2" id="quest_34-2"></td>
															<td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="3" id="quest_34-3"></td>
															<td><input type="radio" name="quest_34" data-record-value="{record_quest_34}" value="4" id="quest_34-4"></td>
														</tr>
														<tr>
															<td>35</td>
															<td>เวลาประสบปัญหาเล็ก ๆ น้อย ๆ ฉันแสดงออกทางอารมณ์มากเกินไป </td>
															<td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="4" id="quest_35-1"></td>
															<td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="3" id="quest_35-2"></td>
															<td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="2" id="quest_35-3"></td>
															<td><input type="radio" name="quest_35" data-record-value="{record_quest_35}" value="1" id="quest_35-4"></td>
														</tr>
														<tr>
															<td>36</td>
															<td>ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้ </td>
															<td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="1" id="quest_36-1"></td>
															<td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="2" id="quest_36-2"></td>
															<td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="3" id="quest_36-3"></td>
															<td><input type="radio" name="quest_36" data-record-value="{record_quest_36}" value="4" id="quest_36-4"></td>
														</tr>
														<tr>
															<td>37</td>
															<td>ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ </td>
															<td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="4" id="quest_37-1"></td>
															<td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="3" id="quest_37-2"></td>
															<td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="2" id="quest_37-3"></td>
															<td><input type="radio" name="quest_37" data-record-value="{record_quest_37}" value="1" id="quest_37-4"></td>
														</tr>
														<tr>
															<td>38</td>
															<td>ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา </td>
															<td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="4" id="quest_38-1"></td>
															<td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="3" id="quest_38-2"></td>
															<td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="2" id="quest_38-3"></td>
															<td><input type="radio" name="quest_38" data-record-value="{record_quest_38}" value="1" id="quest_38-4"></td>
														</tr>
														<tr>
															<td>39</td>
															<td>ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว </td>
															<td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="4" id="quest_39-1"></td>
															<td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="3" id="quest_39-2"></td>
															<td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="2" id="quest_39-3"></td>
															<td><input type="radio" name="quest_39" data-record-value="{record_quest_39}" value="1" id="quest_39-4"></td>
														</tr>
														<tr>
															<td>40</td>
															<td>ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์ </td>
															<td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="1" id="quest_40-1"></td>
															<td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="2" id="quest_40-2"></td>
															<td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="3" id="quest_40-3"></td>
															<td><input type="radio" name="quest_40" data-record-value="{record_quest_40}" value="4" id="quest_40-4"></td>
														</tr>
														<tr>
															<td>41</td>
															<td>ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ </td>
															<td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="1" id="quest_41-1"></td>
															<td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="2" id="quest_41-2"></td>
															<td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="3" id="quest_41-3"></td>
															<td><input type="radio" name="quest_41" data-record-value="{record_quest_41}" value="4" id="quest_41-4"></td>
														</tr>
														<tr>
															<td>42</td>
															<td>ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน </td>
															<td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="1" id="quest_42-1"></td>
															<td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="2" id="quest_42-2"></td>
															<td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="3" id="quest_42-3"></td>
															<td><input type="radio" name="quest_42" data-record-value="{record_quest_42}" value="4" id="quest_42-4"></td>
														</tr>
														<tr>
															<td>43</td>
															<td>ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้ </td>
															<td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="1" id="quest_43-1"></td>
															<td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="2" id="quest_43-2"></td>
															<td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="3" id="quest_43-3"></td>
															<td><input type="radio" name="quest_43" data-record-value="{record_quest_43}" value="4" id="quest_43-4"></td>
														</tr>
														<tr>
															<td>44</td>
															<td>ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ </td>
															<td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="1" id="quest_44-1"></td>
															<td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="2" id="quest_44-2"></td>
															<td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="3" id="quest_44-3"></td>
															<td><input type="radio" name="quest_44" data-record-value="{record_quest_44}" value="4" id="quest_44-4"></td>
														</tr>
														<tr>
															<td>45</td>
															<td>ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค </td>
															<td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="1" id="quest_45-1"></td>
															<td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="2" id="quest_45-2"></td>
															<td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="3" id="quest_45-3"></td>
															<td><input type="radio" name="quest_45" data-record-value="{record_quest_45}" value="4" id="quest_45-4"></td>
														</tr>
														<tr>
															<td>46</td>
															<td>ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน </td>
															<td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="1" id="quest_46-1"></td>
															<td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="2" id="quest_46-2"></td>
															<td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="3" id="quest_46-3"></td>
															<td><input type="radio" name="quest_46" data-record-value="{record_quest_46}" value="4" id="quest_46-4"></td>
														</tr>
														<tr>
															<td>47</td>
															<td>ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ </td>
															<td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="1" id="quest_47-1"></td>
															<td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="2" id="quest_47-2"></td>
															<td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="3" id="quest_47-3"></td>
															<td><input type="radio" name="quest_47" data-record-value="{record_quest_47}" value="4" id="quest_47-4"></td>
														</tr>
														<tr>
															<td>48</td>
															<td>เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที </td>
															<td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="4" id="quest_48-1"></td>
															<td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="3" id="quest_48-2"></td>
															<td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="2" id="quest_48-3"></td>
															<td><input type="radio" name="quest_48" data-record-value="{record_quest_48}" value="1" id="quest_48-4"></td>
														</tr>

													</tbody>
												</table>
												<hr />
												<br />
												<legend>2.2 ทุนทางจิตวิทยา <span style="color:red;">*</span> </legend>
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
															<td>ฉันสามารถกำหนดเป้าหมายชีวิตของตนเองได้</td>
															<td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="1" id="quest_49-1"></td>
															<td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="2" id="quest_49-2"></td>
															<td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="3" id="quest_49-3"></td>
															<td><input type="radio" name="quest_49" data-record-value="{record_quest_49}" value="4" id="quest_49-4"></td>
														</tr>
														<tr>
															<td>2</td>
															<td>ฉันหาความรู้จากแหล่งต่าง ๆ เพื่อทำงานที่ได้รับมอบหมายให้สำเร็จ </td>
															<td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="1" id="quest_50-1"></td>
															<td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="2" id="quest_50-2"></td>
															<td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="3" id="quest_50-3"></td>
															<td><input type="radio" name="quest_50" data-record-value="{record_quest_50}" value="4" id="quest_50-4"></td>
														</tr>
														<tr>
															<td>3</td>
															<td>ฉันเรียนแบบสบาย ๆ ไม่ได้วางแผนอะไรเลย</td>
															<td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="4" id="quest_51-1"></td>
															<td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="3" id="quest_51-2"></td>
															<td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="2" id="quest_51-3"></td>
															<td><input type="radio" name="quest_51" data-record-value="{record_quest_51}" value="1" id="quest_51-4"></td>
														</tr>
														<tr>
															<td>4</td>
															<td>ทุกครั้งที่ได้รับมอบหมายงาน ฉันต้องทำให้เสร็จตามเวลาที่กำหนด </td>
															<td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="1" id="quest_52-1"></td>
															<td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="2" id="quest_52-2"></td>
															<td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="3" id="quest_52-3"></td>
															<td><input type="radio" name="quest_52" data-record-value="{record_quest_52}" value="4" id="quest_52-4"></td>
														</tr>
														<tr>
															<td>5</td>
															<td>ฉันคิดหาวิธีการต่าง ๆ ที่ช่วยให้การเรียนบรรลุตามเป้าหมาย </td>
															<td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="1" id="quest_53-1"></td>
															<td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="2" id="quest_53-2"></td>
															<td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="3" id="quest_53-3"></td>
															<td><input type="radio" name="quest_53" data-record-value="{record_quest_53}" value="4" id="quest_53-4"></td>
														</tr>
														<tr>
															<td>6</td>
															<td>เมื่อมีอุปสรรคในการเรียน ฉันสามารถหาทางออกได้ </td>
															<td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="1" id="quest_54-1"></td>
															<td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="2" id="quest_54-2"></td>
															<td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="3" id="quest_54-3"></td>
															<td><input type="radio" name="quest_54" data-record-value="{record_quest_54}" value="4" id="quest_54-4"></td>
														</tr>
														<tr>
															<td>7</td>
															<td>ฉันหวังว่าจะเรียนจบตามแผนที่วางไว้ </td>
															<td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="1" id="quest_55-1"></td>
															<td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="2" id="quest_55-2"></td>
															<td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="3" id="quest_55-3"></td>
															<td><input type="radio" name="quest_55" data-record-value="{record_quest_55}" value="4" id="quest_55-4"></td>
														</tr>
														<tr>
															<td>8</td>
															<td>ฉันมุ่งมั่นในการเรียนเพื่อความสำเร็จในอนาคต </td>
															<td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="1" id="quest_56-1"></td>
															<td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="2" id="quest_56-2"></td>
															<td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="3" id="quest_56-3"></td>
															<td><input type="radio" name="quest_56" data-record-value="{record_quest_56}" value="4" id="quest_56-4"></td>
														</tr>
														<tr>
															<td>9</td>
															<td>เมื่อเกิดสิ่งเลวร้าย ฉันคิดว่ามันจะผ่านพ้นไปได้ </td>
															<td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="1" id="quest_57-1"></td>
															<td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="2" id="quest_57-2"></td>
															<td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="3" id="quest_57-3"></td>
															<td><input type="radio" name="quest_57" data-record-value="{record_quest_57}" value="4" id="quest_57-4"></td>
														</tr>
														<tr>
															<td>10</td>
															<td>เมื่อเกิดข้อผิดพลาด ฉันจะให้อภัยและปรับปรุงตนเอง </td>
															<td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="1" id="quest_58-1"></td>
															<td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="2" id="quest_58-2"></td>
															<td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="3" id="quest_58-3"></td>
															<td><input type="radio" name="quest_58" data-record-value="{record_quest_58}" value="4" id="quest_58-4"></td>
														</tr>
														<tr>
															<td>11</td>
															<td>ฉันมีสติเมื่อต้องเผชิญกับสถานการณ์คับขัน </td>
															<td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="1" id="quest_59-1"></td>
															<td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="2" id="quest_59-2"></td>
															<td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="3" id="quest_59-3"></td>
															<td><input type="radio" name="quest_59" data-record-value="{record_quest_59}" value="4" id="quest_59-4"></td>
														</tr>
														<tr>
															<td>12</td>
															<td>ฉันเชื่อว่าทุก ๆ ปัญหามีทางออก </td>
															<td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="1" id="quest_60-1"></td>
															<td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="2" id="quest_60-2"></td>
															<td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="3" id="quest_60-3"></td>
															<td><input type="radio" name="quest_60" data-record-value="{record_quest_60}" value="4" id="quest_60-4"></td>
														</tr>
														<tr>
															<td>13</td>
															<td>ฉันมักตำหนิงานทุกอย่างที่คนอื่นทำ </td>
															<td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="4" id="quest_61-1"></td>
															<td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="3" id="quest_61-2"></td>
															<td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="2" id="quest_61-3"></td>
															<td><input type="radio" name="quest_61" data-record-value="{record_quest_61}" value="1" id="quest_61-4"></td>
														</tr>
														<tr>
															<td>14</td>
															<td>ฉันเชื่อว่าตนเองพร้อมที่จะดำเนินการต่าง ๆ เพื่อให้ชีวิตดีขึ้น </td>
															<td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="1" id="quest_62-1"></td>
															<td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="2" id="quest_62-2"></td>
															<td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="3" id="quest_62-3"></td>
															<td><input type="radio" name="quest_62" data-record-value="{record_quest_62}" value="4" id="quest_62-4"></td>
														</tr>
														<tr>
															<td>15</td>
															<td>ฉันเชื่อว่าตนเองสามารถจัดการกับภาระรับผิดชอบได้ดี </td>
															<td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="1" id="quest_63-1"></td>
															<td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="2" id="quest_63-2"></td>
															<td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="3" id="quest_63-3"></td>
															<td><input type="radio" name="quest_63" data-record-value="{record_quest_63}" value="4" id="quest_63-4"></td>
														</tr>
														<tr>
															<td>16</td>
															<td>ฉันเชื่อว่าผลการเรียนจะเป็นไปตามที่คาดหวัง </td>
															<td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="1" id="quest_64-1"></td>
															<td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="2" id="quest_64-2"></td>
															<td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="3" id="quest_64-3"></td>
															<td><input type="radio" name="quest_64" data-record-value="{record_quest_64}" value="4" id="quest_64-4"></td>
														</tr>
														<tr>
															<td>17</td>
															<td>ฉันเชื่อว่าจะสามารถปรับปรุงผลการเรียน ให้ดีขึ้นตามที่คาดหวังได้ </td>
															<td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="1" id="quest_65-1"></td>
															<td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="2" id="quest_65-2"></td>
															<td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="3" id="quest_65-3"></td>
															<td><input type="radio" name="quest_65" data-record-value="{record_quest_65}" value="4" id="quest_65-4"></td>
														</tr>
														<tr>
															<td>18</td>
															<td>ฉันเชื่อว่าตนเองสามารถทำงานได้ทันตามเวลาที่กำหนด </td>
															<td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="1" id="quest_66-1"></td>
															<td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="2" id="quest_66-2"></td>
															<td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="3" id="quest_66-3"></td>
															<td><input type="radio" name="quest_66" data-record-value="{record_quest_66}" value="4" id="quest_66-4"></td>
														</tr>
														<tr>
															<td>19</td>
															<td>ฉันไม่เชื่อว่าจะจัดการกับปัญหาของตนเองได้ </td>
															<td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="4" id="quest_67-1"></td>
															<td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="3" id="quest_67-2"></td>
															<td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="2" id="quest_67-3"></td>
															<td><input type="radio" name="quest_67" data-record-value="{record_quest_67}" value="1" id="quest_67-4"></td>
														</tr>
														<tr>
															<td>20</td>
															<td>เพื่อน ๆ ยอมรับในความสามารถของฉัน</td>
															<td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="1" id="quest_68-1"></td>
															<td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="2" id="quest_68-2"></td>
															<td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="3" id="quest_68-3"></td>
															<td><input type="radio" name="quest_68" data-record-value="{record_quest_68}" value="4" id="quest_68-4"></td>
														</tr>
														<tr>
															<td>21</td>
															<td>ถ้าเจอสถานการณ์เลวร้าย ฉันสามารถปรับตัวให้กลับสู่สภาพเดิมได้ </td>
															<td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="1" id="quest_69-1"></td>
															<td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="2" id="quest_69-2"></td>
															<td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="3" id="quest_69-3"></td>
															<td><input type="radio" name="quest_69" data-record-value="{record_quest_69}" value="4" id="quest_69-4"></td>
														</tr>
														<tr>
															<td>22</td>
															<td>ฉันรู้สึกเครียดในทุก ๆ เรื่องจนทำให้ตนเองไม่สามารถปรับตัวได้ </td>
															<td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="4" id="quest_70-1"></td>
															<td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="3" id="quest_70-2"></td>
															<td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="2" id="quest_70-3"></td>
															<td><input type="radio" name="quest_70" data-record-value="{record_quest_70}" value="1" id="quest_70-4"></td>
														</tr>
														<tr>
															<td>23</td>
															<td>ฉันสามารถจัดการกับอารมณ์ได้ดีเมื่อมีความทุกข์ </td>
															<td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="1" id="quest_71-1"></td>
															<td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="2" id="quest_71-2"></td>
															<td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="3" id="quest_71-3"></td>
															<td><input type="radio" name="quest_71" data-record-value="{record_quest_71}" value="4" id="quest_71-4"></td>
														</tr>
														<tr>
															<td>24</td>
															<td>ฉันเป็นคนโกรธง่ายหายเร็ว</td>
															<td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="1" id="quest_72-1"></td>
															<td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="2" id="quest_72-2"></td>
															<td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="3" id="quest_72-3"></td>
															<td><input type="radio" name="quest_72" data-record-value="{record_quest_72}" value="4" id="quest_72-4"></td>
														</tr>
														<tr>
															<td>25</td>
															<td>ฉันสามารถผ่านสถานการณ์ที่ยากลำบากในชีวิตได้ </td>
															<td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="1" id="quest_73-1"></td>
															<td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="2" id="quest_73-2"></td>
															<td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="3" id="quest_73-3"></td>
															<td><input type="radio" name="quest_73" data-record-value="{record_quest_73}" value="4" id="quest_73-4"></td>
														</tr>
														<tr>
															<td>26</td>
															<td>ฉันรู้ว่าฉันสามารถที่จะเอาชนะอุปสรรคต่าง ๆ ที่ผ่านมาในชีวิตได้ </td>
															<td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="1" id="quest_74-1"></td>
															<td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="2" id="quest_74-2"></td>
															<td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="3" id="quest_74-3"></td>
															<td><input type="radio" name="quest_74" data-record-value="{record_quest_74}" value="4" id="quest_74-4"></td>
														</tr>
													</tbody>
												</table>
												<hr />
												<br />
												<legend>2.3 การเห็นคุณค่าในตนเอง <span style="color:red;">*</span> </legend>
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
															<td>ฉันมีความสามารถในการช่วยเหลือคนอื่น</td>
															<td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="1" id="quest_75-1"></td>
															<td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="2" id="quest_75-2"></td>
															<td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="3" id="quest_75-3"></td>
															<td><input type="radio" name="quest_75" data-record-value="{record_quest_75}" value="4" id="quest_75-4"></td>
														</tr>
														<tr>
															<td>2</td>
															<td>ฉันมีความสุขในการลงมือทำสิ่งต่าง ๆ ด้วยตัวเอง </td>
															<td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="1" id="quest_76-1"></td>
															<td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="2" id="quest_76-2"></td>
															<td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="3" id="quest_76-3"></td>
															<td><input type="radio" name="quest_76" data-record-value="{record_quest_76}" value="4" id="quest_76-4"></td>
														</tr>
														<tr>
															<td>3</td>
															<td>ฉันคิดว่าตนเองมีคุณค่า </td>
															<td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="1" id="quest_77-1"></td>
															<td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="2" id="quest_77-2"></td>
															<td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="3" id="quest_77-3"></td>
															<td><input type="radio" name="quest_77" data-record-value="{record_quest_77}" value="4" id="quest_77-4"></td>
														</tr>
														<tr>
															<td>4</td>
															<td>ฉันรู้สึกว่าตนเองสามารถทำประโยชน์เพื่อผู้อื่นได้ </td>
															<td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="1" id="quest_78-1"></td>
															<td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="2" id="quest_78-2"></td>
															<td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="3" id="quest_78-3"></td>
															<td><input type="radio" name="quest_78" data-record-value="{record_quest_78}" value="4" id="quest_78-4"></td>
														</tr>
														<tr>
															<td>5</td>
															<td>ฉันเป็นคนไม่เอาไหน </td>
															<td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="4" id="quest_79-1"></td>
															<td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="3" id="quest_79-2"></td>
															<td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="2" id="quest_79-3"></td>
															<td><input type="radio" name="quest_79" data-record-value="{record_quest_79}" value="1" id="quest_79-4"></td>
														</tr>
														<tr>
															<td>6</td>
															<td>ฉันรู้สึกว่าเป็นส่วนเกินของสังคม </td>
															<td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="4" id="quest_80-1"></td>
															<td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="3" id="quest_80-2"></td>
															<td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="2" id="quest_80-3"></td>
															<td><input type="radio" name="quest_80" data-record-value="{record_quest_80}" value="1" id="quest_80-4"></td>
														</tr>
														<tr>
															<td>7</td>
															<td>ฉันรู้สึกว่าฉันเป็นที่รักของคนรอบข้าง </td>
															<td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="1" id="quest_81-1"></td>
															<td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="2" id="quest_81-2"></td>
															<td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="3" id="quest_81-3"></td>
															<td><input type="radio" name="quest_81" data-record-value="{record_quest_81}" value="4" id="quest_81-4"></td>
														</tr>
														<tr>
															<td>8</td>
															<td>ฉันมั่นใจในการแสดงความคิดเห็นกับกลุ่มคนที่มีความเห็นแตกต่างจากฉันได้ </td>
															<td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="1" id="quest_82-1"></td>
															<td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="2" id="quest_82-2"></td>
															<td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="3" id="quest_82-3"></td>
															<td><input type="radio" name="quest_82" data-record-value="{record_quest_82}" value="4" id="quest_82-4"></td>
														</tr>
														<tr>
															<td>9</td>
															<td>ฉันกล้าพูดคุยทักทายกับคนที่ไม่เคยรู้จักมาก่อนได้ </td>
															<td><input type="radio" name="quest_83" data-record-value="{record_quest_83}" value="1" id="quest_83-1"></td>
															<td><input type="radio" name="quest_83" data-record-value="{record_quest_83}" value="2" id="quest_83-2"></td>
															<td><input type="radio" name="quest_83" data-record-value="{record_quest_83}" value="3" id="quest_83-3"></td>
															<td><input type="radio" name="quest_83" data-record-value="{record_quest_83}" value="4" id="quest_83-4"></td>
														</tr>
														<tr>
															<td>10</td>
															<td>ฉันกล้าบอกกับเพื่อนตรง ๆ เมื่อฉันไม่เห็นด้วยกับความคิดเห็นของเพื่อน </td>
															<td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="1" id="quest_84-1"></td>
															<td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="2" id="quest_84-2"></td>
															<td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="3" id="quest_84-3"></td>
															<td><input type="radio" name="quest_84" data-record-value="{record_quest_84}" value="4" id="quest_84-4"></td>
														</tr>
														<tr>
															<td>11</td>
															<td>ฉันมั่นใจว่าสามารถทำงานที่ท้าทายให้สำเร็จได้ </td>
															<td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="1" id="quest_85-1"></td>
															<td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="2" id="quest_85-2"></td>
															<td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="3" id="quest_85-3"></td>
															<td><input type="radio" name="quest_85" data-record-value="{record_quest_85}" value="4" id="quest_85-4"></td>
														</tr>
														<tr>
															<td>12</td>
															<td>ฉันให้ความสำคัญในการดูแลสุขภาพของตนเอง </td>
															<td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="1" id="quest_86-1"></td>
															<td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="2" id="quest_86-2"></td>
															<td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="3" id="quest_86-3"></td>
															<td><input type="radio" name="quest_86" data-record-value="{record_quest_86}" value="4" id="quest_86-4"></td>
														</tr>
														<tr>
															<td>13</td>
															<td>เวลาฉันโกรธ ไม่พอใจ ฉันก็ไม่เคยคิดทำร้ายตนเอง </td>
															<td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="1" id="quest_87-1"></td>
															<td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="2" id="quest_87-2"></td>
															<td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="3" id="quest_87-3"></td>
															<td><input type="radio" name="quest_87" data-record-value="{record_quest_87}" value="4" id="quest_87-4"></td>
														</tr>
														<tr>
															<td>14</td>
															<td>ฉันคิดว่าตนเองมีสิทธิเสรีภาพเท่าเทียมกับคนอื่น </td>
															<td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="1" id="quest_88-1"></td>
															<td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="2" id="quest_88-2"></td>
															<td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="3" id="quest_88-3"></td>
															<td><input type="radio" name="quest_88" data-record-value="{record_quest_88}" value="4" id="quest_88-4"></td>
														</tr>
														<tr>
															<td>15</td>
															<td>ฉันเลือกสิ่งดี ๆ ให้กับตนเอง </td>
															<td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="1" id="quest_89-1"></td>
															<td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="2" id="quest_89-2"></td>
															<td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="3" id="quest_89-3"></td>
															<td><input type="radio" name="quest_89" data-record-value="{record_quest_89}" value="4" id="quest_89-4"></td>
														</tr>
														<tr>
															<td>16</td>
															<td>ฉันเลือกทำในสิ่งที่ถูกต้องและมีผลดีกับชีวิตของตนเอง </td>
															<td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="1" id="quest_90-1"></td>
															<td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="2" id="quest_90-2"></td>
															<td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="3" id="quest_90-3"></td>
															<td><input type="radio" name="quest_90" data-record-value="{record_quest_90}" value="4" id="quest_90-4"></td>
														</tr>
														<tr>
															<td>17</td>
															<td>ฉันปฏิบัติตนเป็นลูกที่ดีของพ่อแม่ </td>
															<td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="1" id="quest_91-1"></td>
															<td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="2" id="quest_91-2"></td>
															<td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="3" id="quest_91-3"></td>
															<td><input type="radio" name="quest_91" data-record-value="{record_quest_91}" value="4" id="quest_91-4"></td>
														</tr>
														<tr>
															<td>18</td>
															<td>การได้ช่วยเหลือคนอื่น เป็นสิ่งที่ฉันมีความสุข </td>
															<td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="1" id="quest_92-1"></td>
															<td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="2" id="quest_92-2"></td>
															<td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="3" id="quest_92-3"></td>
															<td><input type="radio" name="quest_92" data-record-value="{record_quest_92}" value="4" id="quest_92-4"></td>
														</tr>
														<tr>
															<td>19</td>
															<td>ฉันช่วยเพื่อนทำงานกลุ่มอย่างเต็มความสามารถ </td>
															<td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="1" id="quest_93-1"></td>
															<td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="2" id="quest_93-2"></td>
															<td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="3" id="quest_93-3"></td>
															<td><input type="radio" name="quest_93" data-record-value="{record_quest_93}" value="4" id="quest_93-4"></td>
														</tr>
														<tr>
															<td>20</td>
															<td>ฉันไม่เคยบกพร่องในงานที่ได้รับมอบหมาย </td>
															<td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="1" id="quest_94-1"></td>
															<td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="2" id="quest_94-2"></td>
															<td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="3" id="quest_94-3"></td>
															<td><input type="radio" name="quest_94" data-record-value="{record_quest_94}" value="4" id="quest_94-4"></td>
														</tr>
														<tr>
															<td>21</td>
															<td>ฉันยอมรับข้อผิดพลาดของตนเองแล้วนำมาปรับปรุงแก้ไข </td>
															<td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="1" id="quest_95-1"></td>
															<td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="2" id="quest_95-2"></td>
															<td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="3" id="quest_95-3"></td>
															<td><input type="radio" name="quest_95" data-record-value="{record_quest_95}" value="4" id="quest_95-4"></td>
														</tr>
														<tr>
															<td>22</td>
															<td>ไม่ว่าผลของการทำงานจะออกมาเป็นอย่างไร ฉันก็ยอมรับผลที่เกิดได้ </td>
															<td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="1" id="quest_96-1"></td>
															<td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="2" id="quest_96-2"></td>
															<td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="3" id="quest_96-3"></td>
															<td><input type="radio" name="quest_96" data-record-value="{record_quest_96}" value="4" id="quest_96-4"></td>
														</tr>
														<tr>
															<td>23</td>
															<td>ฉันพร้อมที่จะเปลี่ยนแปลงตนเอง เมื่อพบว่ามีข้อบกพร่อง </td>
															<td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="1" id="quest_97-1"></td>
															<td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="2" id="quest_97-2"></td>
															<td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="3" id="quest_97-3"></td>
															<td><input type="radio" name="quest_97" data-record-value="{record_quest_97}" value="4" id="quest_97-4"></td>
														</tr>
														<tr>
															<td>24</td>
															<td>ฉันยอมรับจุดดีและจุดด้อยของตนเองได้ </td>
															<td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="1" id="quest_98-1"></td>
															<td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="2" id="quest_98-2"></td>
															<td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="3" id="quest_98-3"></td>
															<td><input type="radio" name="quest_98" data-record-value="{record_quest_98}" value="4" id="quest_98-4"></td>
														</tr>
														<tr>
															<td>25</td>
															<td>ฉันคิดว่าทุกคนสามารถผิดพลาดกันได้ </td>
															<td><input type="radio" name="quest_99" data-record-value="{record_quest_99}" value="1" id="quest_99-1"></td>
															<td><input type="radio" name="quest_99" data-record-value="{record_quest_99}" value="2" id="quest_99-2"></td>
															<td><input type="radio" name="quest_99" data-record-value="{record_quest_99}" value="3" id="quest_99-3"></td>
															<td><input type="radio" name="quest_99" data-record-value="{record_quest_99}" value="4" id="quest_99-4"></td>
														</tr>

													</tbody>
												</table>
												<hr />
												<br />
												<legend>2.4 พลังตัวตน <span style="color:red;">*</span> </legend>
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
															<td>1</td>
															<td>การได้ช่วยเหลือคนอื่นเป็นสิ่งที่มีคุณค่าอย่างมาก</td>
															<td><input type="radio" name="quest_100" data-record-value="{record_quest_100}" value="1" id="quest100-1"></td>
															<td><input type="radio" name="quest_100" data-record-value="{record_quest_100}" value="2" id="quest100-2"></td>
															<td><input type="radio" name="quest_100" data-record-value="{record_quest_100}" value="3" id="quest00-3"></td>
															<td><input type="radio" name="quest_100" data-record-value="{record_quest_100}" value="4" id="quest00-4"></td>
														</tr>
														<tr>
															<td>2</td>
															<td>การให้ความสำคัญและส่งเสริมให้เกิดความเท่าเทียมในสังคม เช่น ผู้พิการ ผู้สูงอายุ เพศชาย/เพศหญิง/เพศทางเลือก </td>
															<td><input type="radio" name="quest_101" data-record-value="{record_quest_101}" value="1" id="quest01-1"></td>
															<td><input type="radio" name="quest_101" data-record-value="{record_quest_101}" value="2" id="quest01-2"></td>
															<td><input type="radio" name="quest_101" data-record-value="{record_quest_101}" value="3" id="quest01-3"></td>
															<td><input type="radio" name="quest_101" data-record-value="{record_quest_101}" value="4" id="quest01-4"></td>
														</tr>
														<tr>
															<td>3</td>
															<td>การกล้ายืนหยัดในสิ่งที่ฉันเชื่อ และกล้าที่จะเสนอความคิดเห็นหรือข้อเสนอแนะต่าง ๆ </td>
															<td><input type="radio" name="quest_102" data-record-value="{record_quest_102}" value="1" id="quest02-1"></td>
															<td><input type="radio" name="quest_102" data-record-value="{record_quest_102}" value="2" id="quest02-2"></td>
															<td><input type="radio" name="quest_102" data-record-value="{record_quest_102}" value="3" id="quest02-3"></td>
															<td><input type="radio" name="quest_102" data-record-value="{record_quest_102}" value="4" id="quest02-4"></td>
														</tr>
														<tr>
															<td>4</td>
															<td>การพูดความจริง ไม่พูดโกหกหรือหลอกลวงผู้อื่น </td>
															<td><input type="radio" name="quest_103" data-record-value="{record_quest_103}" value="1" id="quest03-1"></td>
															<td><input type="radio" name="quest_103" data-record-value="{record_quest_103}" value="2" id="quest03-2"></td>
															<td><input type="radio" name="quest_103" data-record-value="{record_quest_103}" value="3" id="quest03-3"></td>
															<td><input type="radio" name="quest_103" data-record-value="{record_quest_103}" value="4" id="quest03-4"></td>
														</tr>
														<tr>
															<td>5</td>
															<td>การรับผิดชอบในสิ่งที่ตนเองทำ </td>
															<td><input type="radio" name="quest_104" data-record-value="{record_quest_104}" value="1" id="quest04-1"></td>
															<td><input type="radio" name="quest_104" data-record-value="{record_quest_104}" value="2" id="quest04-2"></td>
															<td><input type="radio" name="quest_104" data-record-value="{record_quest_104}" value="3" id="quest04-3"></td>
															<td><input type="radio" name="quest_104" data-record-value="{record_quest_104}" value="4" id="quest04-4"></td>
														</tr>
														<tr>
															<td>6</td>
															<td>การยึดมั่นในพฤติกรรมที่ดี </td>
															<td><input type="radio" name="quest_105" data-record-value="{record_quest_105}" value="1" id="quest05-1"></td>
															<td><input type="radio" name="quest_105" data-record-value="{record_quest_105}" value="2" id="quest05-2"></td>
															<td><input type="radio" name="quest_105" data-record-value="{record_quest_105}" value="3" id="quest05-3"></td>
															<td><input type="radio" name="quest_105" data-record-value="{record_quest_105}" value="4" id="quest05-4"></td>
														</tr>
														<tr>
															<td>7</td>
															<td>การมีการวางแผนและการตัดสินใจก่อนลงมือทำเสมอ </td>
															<td><input type="radio" name="quest_106" data-record-value="{record_quest_106}" value="1" id="quest06-1"></td>
															<td><input type="radio" name="quest_106" data-record-value="{record_quest_106}" value="2" id="quest06-2"></td>
															<td><input type="radio" name="quest_106" data-record-value="{record_quest_106}" value="3" id="quest06-3"></td>
															<td><input type="radio" name="quest_106" data-record-value="{record_quest_106}" value="4" id="quest06-4"></td>
														</tr>
														<tr>
															<td>8</td>
															<td>การเห็นอกเห็นใจ และใส่ใจในความรู้สึกผู้อื่น </td>
															<td><input type="radio" name="quest_107" data-record-value="{record_quest_107}" value="1" id="quest07-1"></td>
															<td><input type="radio" name="quest_107" data-record-value="{record_quest_107}" value="2" id="quest07-2"></td>
															<td><input type="radio" name="quest_107" data-record-value="{record_quest_107}" value="3" id="quest07-3"></td>
															<td><input type="radio" name="quest_107" data-record-value="{record_quest_107}" value="4" id="quest07-4"></td>
														</tr>
														<tr>
															<td>9</td>
															<td>การที่สามารถเรียนรู้ และปรับตัวให้อยู่ร่วมกับคนที่มีความคิดเห็นหรือการดำเนินชีวิตแตกต่างกันได้เป็นอย่างดี </td>
															<td><input type="radio" name="quest_108" data-record-value="{record_quest_108}" value="1" id="quest08-1"></td>
															<td><input type="radio" name="quest_108" data-record-value="{record_quest_108}" value="2" id="quest08-2"></td>
															<td><input type="radio" name="quest_108" data-record-value="{record_quest_108}" value="3" id="quest08-3"></td>
															<td><input type="radio" name="quest_108" data-record-value="{record_quest_108}" value="4" id="quest08-4"></td>
														</tr>
														<tr>
															<td>10</td>
															<td>การกล้าปฏิเสธพฤติกรรมเสี่ยง (เช่น เพศสัมพันธ์ ยาเสพติด ความรุนแรง และสื่อที่ไม่ดี) </td>
															<td><input type="radio" name="quest_109" data-record-value="{record_quest_109}" value="1" id="quest09-1"></td>
															<td><input type="radio" name="quest_109" data-record-value="{record_quest_109}" value="2" id="quest09-2"></td>
															<td><input type="radio" name="quest_109" data-record-value="{record_quest_109}" value="3" id="quest09-3"></td>
															<td><input type="radio" name="quest_109" data-record-value="{record_quest_109}" value="4" id="quest09-4"></td>
														</tr>
														<tr>
															<td>11</td>
															<td>ความพยายามแก้ปัญหาข้อขัดแย้งด้วยสติปัญญามากกว่าอารมณ์ (ไม่ใช่ความรุนแรง) </td>
															<td><input type="radio" name="quest_110" data-record-value="{record_quest_110}" value="1" id="quest10-1"></td>
															<td><input type="radio" name="quest_110" data-record-value="{record_quest_110}" value="2" id="quest10-2"></td>
															<td><input type="radio" name="quest_110" data-record-value="{record_quest_110}" value="3" id="quest10-3"></td>
															<td><input type="radio" name="quest_110" data-record-value="{record_quest_110}" value="4" id="quest10-4"></td>
														</tr>
														<tr>
															<td>12</td>
															<td>ความสามารถควบคุมสถานการณ์ที่เกิดขึ้นกับตนเองได้ เช่น ควบคุมอารมณ์เวลาโกรธได้ดี เมื่อเกิดการโต้เถียงหรือขัดแย้ง </td>
															<td><input type="radio" name="quest_111" data-record-value="{record_quest_111}" value="1" id="quest11-1"></td>
															<td><input type="radio" name="quest_111" data-record-value="{record_quest_111}" value="2" id="quest11-2"></td>
															<td><input type="radio" name="quest_111" data-record-value="{record_quest_111}" value="3" id="quest11-3"></td>
															<td><input type="radio" name="quest_111" data-record-value="{record_quest_111}" value="4" id="quest11-4"></td>
														</tr>
														<tr>
															<td>13</td>
															<td>ความรู้สึกว่าตนเองมีคุณค่า </td>
															<td><input type="radio" name="quest_112" data-record-value="{record_quest_112}" value="1" id="quest12-1"></td>
															<td><input type="radio" name="quest_112" data-record-value="{record_quest_112}" value="2" id="quest12-2"></td>
															<td><input type="radio" name="quest_112" data-record-value="{record_quest_112}" value="3" id="quest12-3"></td>
															<td><input type="radio" name="quest_112" data-record-value="{record_quest_112}" value="4" id="quest12-4"></td>
														</tr>
														<tr>
															<td>14</td>
															<td>การมีเป้าหมายชัดเจน </td>
															<td><input type="radio" name="quest_113" data-record-value="{record_quest_113}" value="1" id="quest13-1"></td>
															<td><input type="radio" name="quest_113" data-record-value="{record_quest_113}" value="2" id="quest13-2"></td>
															<td><input type="radio" name="quest_113" data-record-value="{record_quest_113}" value="3" id="quest13-3"></td>
															<td><input type="radio" name="quest_113" data-record-value="{record_quest_113}" value="4" id="quest13-4"></td>
														</tr>
														<tr>
															<td>15</td>
															<td>ความรู้สึกพึงพอใจในชีวิตความเป็นอยู่ของตนเอง </td>
															<td><input type="radio" name="quest_114" data-record-value="{record_quest_114}" value="1" id="quest14-1"></td>
															<td><input type="radio" name="quest_114" data-record-value="{record_quest_114}" value="2" id="quest14-2"></td>
															<td><input type="radio" name="quest_114" data-record-value="{record_quest_114}" value="3" id="quest14-3"></td>
															<td><input type="radio" name="quest_114" data-record-value="{record_quest_114}" value="4" id="quest14-4"></td>
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

																<!-- <button type="submit" class="btn btn-info btn-lg" fdprocessedid="de4wdk"><i class='fas fa-save'></i> บันทึกร่าง</button> -->
																<input type="hidden" id="add_encrypt_id" />
																<a href="{site_url}assessment/assessment1/add" class="btn btn-success btn-lg" fdprocessedid="de4wdk"><i class='fas fa-angle-double-left'></i> ย้อนกลับ</a>

																<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
																	&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
																</button>
																<!-- <a href="{site_url}assessment/assessment3/add" class="btn btn-success btn-lg" fdprocessedid="de4wdk"> ถัดไป<i class='fas fa-angle-double-right'></i></a> -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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