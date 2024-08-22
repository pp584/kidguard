<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">4. ข้อมูลเหตุการณ์ </span><span class="text-medium"></span></div>
			<div class="card-body">
				<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-home"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/service_information/add">1. ข้อมูลหน่วยบริการ</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-car"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/time_distance/add">2. ข้อมูลเวลาและระยะทาง</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-id"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-note"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/add">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-gleam"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/add">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-user"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/add">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-attention"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/add">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-smile"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/add">8. ผลลัพธ์</a></h4>
					</div>
				</div>
			</div>

			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_information_id">service_information_id :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="patient_status">สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status" id="patient_status1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status1">มีชีวิต รักษาในโรงพยาบาล</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status" id="patient_status2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status2">เสียชีวิต</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="patient_status_dead">เสียชีวิต :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status_dead" id="patient_status_dead1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status_dead1">เสียชีวิตก่อนถึงโรงพยาบาล</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status_dead" id="patient_status_dead2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status_dead2">เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status_dead" id="patient_status_dead3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status_dead3">เสียชีวิตระหว่างนอนโรงพยาบาล</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="patient_status_dead" id="patient_status_dead4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="patient_status_dead4">กลับไปเสียชีวิตที่บ้าน</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="department">แผนกที่ผู้ป่วยเข้ารับการรักษา :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="department" id="department1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="department1">หอผู้ป่วยหนัก</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="department" id="department2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="department2">หอผู้ป่วยสามัญ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="survival">การรอดชีวิต จำหน่ายออกจากโรงพยาบาล :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="survival" id="survival1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="survival1">ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="survival" id="survival2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="survival2">มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="survival" id="survival3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="survival3">มี Neuro deficit ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="days_admitted">จำนวนวันที่รับไว้รักษาในโรงพยาบาล :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="days_admitted" name="days_admitted" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="date_out">วันเวลาที่จำหน่าย :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="date_out" name="date_out" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="date_out_course">เหตุผลในการจำหน่าย :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="date_out_course" id="date_out_course1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="date_out_course1">ญาติปฏิเสธการรักษา</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="date_out_course" id="date_out_course2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="date_out_course2">มีชีวิต</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="date_out_course" id="date_out_course3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="date_out_course3">เสียชีวิต</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" id="add_encrypt_id" />
						<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
							&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
						</button>
					</div>
				</div>

			</form>
		</div>
		<!--panel-body-->
	</div>
	<!--panel-->
</div>
<!--contrainer-->

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