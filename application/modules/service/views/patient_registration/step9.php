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
				<div class="step completed">
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
									<h6 class="mb-2 text-primary">7.1 โรงพยาบาลที่นำส่ง</h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> รัฐบาล </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> เอกชน </td>
											</tr>
										</table>
									</div>
								</div>

							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">7.2 เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ)</h6>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">เหมาะสม/สามารถให้การรักษาได้</label><br>
										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2"> อยู่ใกล้</label><br>
										<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
										<label for="vehicle3"> มีสิทธิการรักษา</label><br>

										<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
										<label for="vehicle1">เป็นผู้ป่วยเก่า</label><br>
										<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
										<label for="vehicle2">เป็นความต้องการของญาติ</label><br>

									</div>
								</div>

							</div>

							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<h6 class="mb-2 text-primary">7.3 ระดับการคัดกรอง ณ แผนกอุบัติเหตุและฉุกเฉิน โรงพยาบาลที่นำส่ง (คัดแยกตามแนวทาง Emergency severity index; ESI)</h6>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation)<br />
										<input type="radio" name="imgsel" value="" checked="checked" />สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency) <br />
										<input type="radio" name="imgsel" value="" checked="checked" />สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency) <br />
										<input type="radio" name="imgsel" value="" checked="checked" />สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency)<br />
										<input type="radio" name="imgsel" value="" checked="checked" />สีขาว ผู้ป่วยทั่วไป (Non-Urgency) <br />

									</div>
								</div>

							</div>
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<h6 class="mb-2 text-primary">7.4 การ Resuscitation ณ แผนกอุบัติเหตุและฉุกเฉิน</h6>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" /> ไม่ทำ
										<input type="radio" name="imgsel" value="" checked="checked" /> ทำ <br />
									</div>
								</div>
							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">7.5 การประเมินการรักษาของทีมปฏิบัติการแพทย์ฉุกเฉิน (แผนกอุบัติเหตุและฉุกเฉินเป็นผู้ประเมิน)</h6>
								</div>

								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label>7.5.1 ระบบทางเดินหายใจ </label>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่จำเป็น<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่ได้ทำ<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำและเหมาะสม<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำแต่ไม่เหมาะสม <input type="text" name="imgsel" value="" placeholder="ระบุ" /><br />


									</div>
								</div>

								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label>7.5.2 การให้สารน้ำ </label>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่จำเป็น<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่ได้ทำ<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำและเหมาะสม<br />
										<!-- <input type="radio" name="imgsel" value="" checked="checked" />ทำแต่ไม่เหมาะสม <input type="text" name="imgsel" value="" placeholder="ระบุ" /><br /> -->


									</div>
								</div>


								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label>7.5.3 การห้ามเลือด </label>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่จำเป็น<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่ได้ทำ<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำและเหมาะสม<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำแต่ไม่เหมาะสม <input type="text" name="imgsel" value="" placeholder="ระบุ" /><br />
									</div>
								</div>


								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<label>7.5.4 การดามกระดูก </label>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่จำเป็น<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ไม่ได้ทำ<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำและเหมาะสม<br />
										<input type="radio" name="imgsel" value="" checked="checked" />ทำแต่ไม่เหมาะสม <input type="text" name="imgsel" value="" placeholder="ระบุ" /><br />
									</div>
								</div>

							</div>


							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.6 การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่</h6>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ณ จุดเกิดเหตุ </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล </td>
											</tr>

										</table>
									</div>
								</div>

							</div>


							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.7 การใช้ Defibrillator </h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ใช่</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ใช่</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.8 การประเมิน EKG หลังทำ CPR</h6>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia) </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Non-shockable rhythm (Asystole / Pulseless Electrical Activity)</td>
											</tr>
										</table>
									</div>
								</div>
							</div>


							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.9 จำนวนครั้งการกระตุกหัวใจที่ได้รับ <input type="text" name="imgsel" value="" checked="checked" /></h6>
								</div>


							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.11 การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ)</h6>
								</div>

								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Non-definite airway เลือกประเภท</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />การจัดท่า เช่น Head tilt, Chin lift, Jaw thrust maneuver </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Oral airway หรือ oropharyngeal airway (ท่อเปิดทางเดินหายใจทางปาก)</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Nasal airway หรือ nasopharyngeal airway (ท่อเปิดทางเดินหายใจทางจมูก)</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Laryngeal mask airway (LMA) หรือหน้ากากครอบกล่องเสียง เป็นอุปกรณ์ช่วยหายใจเหนือสายเสียง (Supraglottic airway device)</td>
											</tr>

										</table>
									</div>
								</div>


								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Definite airway เลือกประเภท</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Endotracheal tube (ใส่ท่อช่วยหายใจ)</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Nasotracheal tube (ใส่ท่อช่วยหายใจทางจมูก)</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Surgical airway (เช่น เจาะคอ)</td>
											</tr>

										</table>
									</div>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Oxygen cannula/mask</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Bag-valve-mask ventilation</td>
											</tr>

										</table>
									</div>
								</div>

								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> อื่น ๆ <input type="text" name="imgsel" checked="checked" /></td>
											</tr>

										</table>
									</div>
								</div>



							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.12 การ Stop bleeding (การห้ามเลือด) </h6>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ใช่</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ใช่</td>
											</tr>
										</table>
									</div>
								</div>
							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.13 การให้สารน้ำทางหลอดเลือดดำ </h6>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ให้</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />0.9% Nacl </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Acetar </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Lactate ringer</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />อื่นๆ <input type="text" name="imgsel" checked="checked" /></td>
											</tr>

										</table>
									</div>
								</div>
							</div>


							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.14 การให้ยา</h6>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ให้</td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ให้ ระบุประเภทและขนาดยา</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Adrenaline</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Atropine </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Cordarone </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />อื่นๆ <input type="text" name="imgsel" checked="checked" /></td>
											</tr>

										</table>
									</div>
								</div>
							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.15 การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ </h6>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ทำ </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ทำ</td>
											</tr>
										</table>
									</div>
								</div>


							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">6.17 เครื่อง Auto CPR </h6>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่มีเครื่อง Auto CPR </td>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> มีเครื่อง Auto CPR</td>
											</tr>
										</table>
									</div>
								</div>

								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ไม่ใช้ </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />ใช้</td>
											</tr>
										</table>
									</div>
								</div>


							</div>

							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary"> 6.18 สาเหตุการหยุด Resuscitation</h6>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Loss of Spontaneous Circulation; LOSC (ไม่มีสัญญาณชีพกลับมา)</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล) </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" />Return of Spontaneous Circulation; ROSC (กลับมามีสัญญาณชีพ) </td>
											</tr>
										</table>
									</div>
								</div>

							</div>


							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary"> 6.19 ผลลัพธ์การ CPR</h6>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<table width="100%" border="0">
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> ทุเลา</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> คงเดิม </td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> เสียชีวิต ณ จุดเกิดเหตุ</td>
											</tr>
											<tr>
												<td><input type="radio" name="imgsel" value="" checked="checked" /> เสียชีวิตขณะนำส่งโรงพยาบาล</td>
											</tr>
										</table>
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