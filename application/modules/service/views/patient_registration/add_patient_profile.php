<style>
	.steps .step {
		display: block;
		width: 100%;
		margin-bottom: 35px;
		text-align: center
	}

	.steps .step .step-icon-wrap {
		display: block;
		position: relative;
		width: 100%;
		height: 80px;
		text-align: center
	}

	.steps .step .step-icon-wrap::before,
	.steps .step .step-icon-wrap::after {
		display: block;
		position: absolute;
		top: 50%;
		width: 50%;
		height: 3px;
		margin-top: -1px;
		background-color: #e1e7ec;
		content: '';
		z-index: 1
	}

	.steps .step .step-icon-wrap::before {
		left: 0
	}

	.steps .step .step-icon-wrap::after {
		right: 0
	}

	.steps .step .step-icon {
		display: inline-block;
		position: relative;
		width: 80px;
		height: 80px;
		border: 1px solid #e1e7ec;
		border-radius: 50%;
		background-color: #f5f5f5;
		color: #374250;
		font-size: 38px;
		line-height: 81px;
		z-index: 5
	}

	.steps .step .step-title {
		margin-top: 16px;
		margin-bottom: 0;
		color: #606975;
		font-size: 14px;
		font-weight: 500
	}

	.steps .step:first-child .step-icon-wrap::before {
		display: none
	}

	.steps .step:last-child .step-icon-wrap::after {
		display: none
	}

	.steps .step.completed .step-icon-wrap::before,
	.steps .step.completed .step-icon-wrap::after {
		background-color: #0da9ef
	}

	.steps .step.completed .step-icon {
		border-color: #0da9ef;
		background-color: #0da9ef;
		color: #fff
	}

	@media (max-width: 576px) {

		.flex-sm-nowrap .step .step-icon-wrap::before,
		.flex-sm-nowrap .step .step-icon-wrap::after {
			display: none
		}
	}

	@media (max-width: 768px) {

		.flex-md-nowrap .step .step-icon-wrap::before,
		.flex-md-nowrap .step .step-icon-wrap::after {
			display: none
		}
	}

	@media (max-width: 991px) {

		.flex-lg-nowrap .step .step-icon-wrap::before,
		.flex-lg-nowrap .step .step-icon-wrap::after {
			display: none
		}
	}

	@media (max-width: 1200px) {

		.flex-xl-nowrap .step .step-icon-wrap::before,
		.flex-xl-nowrap .step .step-icon-wrap::after {
			display: none
		}
	}

	.bg-faded,
	.bg-secondary {
		background-color: #f5f5f5 !important;
	}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<div class="padding-bottom-3x mb-1">
	<div class="card mb-12">
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">3. ข้อมูลผู้ป่วย </span><span class="text-medium"></span>
			<div class="row gutters">
			</div>
		</div>
		<!-- <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
			<div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> UPS Ground</div>
			<div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> Checking Quality</div>
			<div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span> SEP 09, 2017</div>
		</div> -->
		<div class="card-body">

			<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">


				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-home"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/1">1. ข้อมูลหน่วยบริการ</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-car"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/2">2. ข้อมูลเวลาและระยะทาง</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-id"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/3">3. ข้อมูลผู้ป่วย</a></h4>
				</div>
				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-note"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/4">4. ข้อมูลเหตุการณ์</a></h4>
				</div>
				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-gleam"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/5">5. การกู้ชีพเบื้องต้น</a> </h4>
				</div>

				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-user"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/6">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
				</div>


				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-attention"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/7">7. นำส่งแผนกอุบัติเหตุ</a></h4>
				</div>

				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-smile"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/8">8. ผลลัพธ์</a></h4>
				</div>
				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-check"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/9">9. ตรวจสอบและยืนยัน</a></h4>
				</div>
			</div>
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card h-100">
						<div class="card-body">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</button>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">3. ข้อมูลผู้ป่วย</h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label for="fullName">รหัส OHAC-ID*</label>
										<input type="text" class="form-control" id="fullName" placeholder="">
									</div>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label for="eMail">3.1 ชื่อผู้ป่วย *</label>
										<input type="email" class="form-control" id="eMail" placeholder="">
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label for="phone">3.2 อายุ *</label>
										<input type="text" class="form-control" id="phone" placeholder="">
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label for="website">3.3 เพศ *</label>
										<table border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ชาย</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />หญิง</td>
											</tr>

										</table>
									</div>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">3.4 สิทธิการรักษา</h6>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่มีสิทธิรักษาพยาบาล</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />สิทธิกรมบัญชีกลาง</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ประกันสังคม </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />อื่น ๆ <input type="text" id="website" placeholder=" ระบุ…………………………….."> </td>
											</tr>

										</table>
									</div>
								</div>
							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">3.5 โรคประจำตัว </h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่มี </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />มี (ระบุได้มากกว่า 1 โรค) </td>
												<td>

												</td>
											</tr>
										</table>
									</div>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">Diabetes (เบาหวาน)</label><br>
										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2"> Hypertension (ความดันโลหิตสูง) </label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ) </label><br>

										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">Respiratory disease (ระบบทางเดินหายใจ)</label><br>
										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2"> Stroke/ CVA (หลอดเลือดในสมอง)</label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> Renal disease (ไต)</label><br>

										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2"> Cancer (มะเร็ง)</label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> Dyslipidemia (ไขมันในเลือดสูง)</label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> อื่นๆ <input type="text" id="website" placeholder=" ระบุ…………………………….."> </label><br>			
									</div>
								</div>



							</div>

							<br />

							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="text-left">
										<button type="button" id="submit" name="submit" class="btn btn-danger"><i class="fa fa-times"></i> ออกจากแบบฟอร์ม</button>
										<!-- <button type="button" id="submit" name="submit" class="btn btn-info">บันทึกร่าง</button>
										<button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป</button> -->
										<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ยกเลิก</button> -->
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="text-right">
										<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ออกจากแบบฟอร์ม</button> -->
										<button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> บันทึกร่าง</button>
										<button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button>
										<button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button>
										<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ยกเลิก</button> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
	<div class="custom-control custom-checkbox mr-3">
		<!-- <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
			<label class="custom-control-label" for="notify_me">Notify me when order is delivered</label> -->

	</div>
	<!-- <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div> -->
</div>
</div>