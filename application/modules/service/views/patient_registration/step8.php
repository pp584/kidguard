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
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">8. ข้อมูลผลลัพธ์</span><span class="text-medium"></span>
			<div class="row gutters">
			</div>
		</div>
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
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-note"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/4">4. ข้อมูลเหตุการณ์</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-gleam"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/5">5. การกู้ชีพเบื้องต้น</a> </h4>
				</div>

				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-user"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/6">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
				</div>


				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><i class="pe-7s-attention"></i></div>
					</div>
					<h4 class="step-title"><a href="{site_url}service/patient_registration/register_process/7">7. นำส่งแผนกอุบัติเหตุ</a></h4>
				</div>

				<div class="step completed">
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
									<h6 class="mb-2 text-primary">8.1 สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต</h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> มีชีวิต รักษาในโรงพยาบาล </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> เสียชีวิต </td>
											</tr>
										</table>
									</div>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">เสียชีวิตก่อนถึงโรงพยาบาล</label><br>
										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2"> เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน</label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> เสียชีวิตระหว่างนอนโรงพยาบาล</label><br>
										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">กลับไปเสียชีวิตที่บ้าน</label><br>
									</div>
								</div>


							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">8.2 แผนกที่ผู้ป่วยเข้ารับการรักษา</h6>
								</div>

								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> หอผู้ป่วยหนัก</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> หอผู้ป่วยสามัญ </td>
											</tr>
										</table>
									</div>
								</div>



							</div>

							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<h6 class="mb-2 text-primary">8.3 การรอดชีวิต จำหน่ายออกจากโรงพยาบาล </h6>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล<br />
										<input type="radio" name="imgsel" value="" checked="checked" />มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง<br />
										<input type="radio" name="imgsel" value="" checked="checked" />มี Neuro deficit ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent) <br />
									</div>
								</div>

							</div>
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<h6 class="mb-2 text-primary">8.4 จำนวนวันที่รับไว้รักษาในโรงพยาบาล(วัน) <input type="text" name="imgsel" value="" placeholder="ระบุ" /></h6>
								</div>

							</div>
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<h6 class="mb-2 text-primary">8.5 วันเวลาที่จำหน่าย <input type="text" name="imgsel" value="" placeholder="ระบุ" /></h6>
								</div>


							</div>



							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">8.6 เหตุผลในการจำหน่าย</h6>
								</div>

								
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" /> ญาติปฏิเสธการรักษา <br />
										<input type="radio" name="imgsel" value="" checked="checked" /> มีชีวิต <br />
										<input type="radio" name="imgsel" value="" checked="checked" /> เสียชีวิต <br />
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