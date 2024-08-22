<div class="padding-bottom-3x mb-1">
	<div class="card mb-12">
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">8. ผลลัพธ์ </span><span class="text-medium"></span></div>
		<div class="card-body">
			<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/1.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/service_information/edit_data">1. ข้อมูลหน่วยบริการ</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/2.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/time_distance/edit_data">2. ข้อมูลเวลาและระยะทาง</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/3.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
				</div>
				<div class="step  completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/4.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/event_information/edit_data">4. ข้อมูลเหตุการณ์</a></h4>
				</div>
				<div class="step completed ">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/5.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/edit_data">5. การกู้ชีพเบื้องต้น</a> </h4>
				</div>

				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/6.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/treatment_information/edit_data">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
				</div>


				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/7.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/delivery_information/edit_data">7. นำส่งแผนกอุบัติเหตุ</a></h4>
				</div>

				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/result_data/edit_data">8. ผลลัพธ์</a></h4>
				</div>

				<div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/verify_information/edit_data">9. ยืนยันเผยแพร่ข้อมูล</a></h4>
				</div>
				
			</div>
		</div>
		<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
			{csrf_protection_field}
			<div class="card-body">
				<div class="row gutters">
					<input type="hidden" name="submit_case" value="edit" />

					<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='patient_status'>8.1 สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต <label style="color:#e32">*</label> :</label>


							<div class="form-check">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="radio" name="patient_status" id="patient_status1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status}" />
									<label class="form-check-label" for="patient_status1">มีชีวิต รักษาในโรงพยาบาล</label>
								</div>
							</div>
							<div class="form-check">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="radio" name="patient_status" id="patient_status2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status}" />
									<label class="form-check-label" for="patient_status2">เสียชีวิต</label>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class='form-group'>
										<!-- <label for='patient_status_dead'>เสียชีวิต :</label> -->


										<div class="form-check">
											<input type="radio" name="patient_status_dead" id="patient_status_dead1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status_dead}" />
											<label class="form-check-label" for="patient_status_dead1">เสียชีวิตก่อนถึงโรงพยาบาล</label>
										</div>
										<div class="form-check">
											<input type="radio" name="patient_status_dead" id="patient_status_dead2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status_dead}" />
											<label class="form-check-label" for="patient_status_dead2">เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน</label>
										</div>
										<div class="form-check">
											<input type="radio" name="patient_status_dead" id="patient_status_dead3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status_dead}" />
											<label class="form-check-label" for="patient_status_dead3">เสียชีวิตระหว่างนอนโรงพยาบาล</label>
										</div>
										<div class="form-check">
											<input type="radio" name="patient_status_dead" id="patient_status_dead4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_patient_status_dead}" />
											<label class="form-check-label" for="patient_status_dead4">กลับไปเสียชีวิตที่บ้าน</label>
										</div>

									</div>
								</div>

							</div>

						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='department'>8.2 แผนกที่ผู้ป่วยเข้ารับการรักษา <label style="color:#e32">*</label>  :</label>


							<div class="form-check">
								<input type="radio" name="department" id="department1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_department}" />
								<label class="form-check-label" for="department1">หอผู้ป่วยหนัก</label>
							</div>
							<div class="form-check">
								<input type="radio" name="department" id="department2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_department}" />
								<label class="form-check-label" for="department2">หอผู้ป่วยสามัญ</label>
							</div>

						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='survival'>8.3 การรอดชีวิต จำหน่ายออกจากโรงพยาบาล <label style="color:#e32">*</label>  :</label>
							<div class="form-check">
								<input type="radio" name="survival" id="survival1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_survival}" />
								<label class="form-check-label" for="survival1">ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล</label>
							</div>
							<div class="form-check">
								<input type="radio" name="survival" id="survival2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_survival}" />
								<label class="form-check-label" for="survival2">มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง</label>
							</div>
							<div class="form-check">
								<input type="radio" name="survival" id="survival3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_survival}" />
								<label class="form-check-label" for="survival3">มี Neuro deficit ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)</label>
							</div>

						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='days_admitted'>8.4 จำนวนวันที่รับไว้รักษาในโรงพยาบาล(วัน) <label style="color:#e32">*</label> :</label>
							<input type="text" placeholder="ระบุ..." class="form-control " id="days_admitted" name="days_admitted" value="{record_days_admitted}" />
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='date_out'>8.5 วันเวลาที่จำหน่าย :</label>
							<input type="text" class="form-control  datepicker" id="date_out" name="date_out" value="{record_date_out}" />
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<label for='date_out_course'>8.6 เหตุผลในการจำหน่าย <label style="color:#e32">*</label>  :</label>
							<div class="form-check form-check-inline">
								<input type="radio" name="date_out_course" id="date_out_course1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_date_out_course}" />
								<label class="form-check-label" for="date_out_course1">ญาติปฏิเสธการรักษา</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="date_out_course" id="date_out_course2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_date_out_course}" />
								<label class="form-check-label" for="date_out_course2">มีชีวิต</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="date_out_course" id="date_out_course3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_date_out_course}" />
								<label class="form-check-label" for="date_out_course3">เสียชีวิต</label>
							</div>

						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<!-- <button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button> -->

							</div>
						</div>
						<input type="hidden" name="encrypt_result_data_id" value="{encrypt_result_data_id}" />
					</div>
				</div>

				<br />
				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						<div class="text-left">
							<button type="button" id="submit" name="submit" class="btn btn-danger"><i class="fa fa-times"></i> ออกจากแบบฟอร์ม</button>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						<div class="text-right">
							<button type="button" class='btn btn-primary' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>
							<button type="button" id="btndarf" name="btndarf" class="btn btn-info"><i class="fa fa-save"></i> บันทึกร่าง</button>
							<a href="{site_url}services/treatment_information/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> </a>
							<a href="{site_url}services/result_data/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
						</div>
					</div>
				</div>
			</div>

		</form>
	</div>
	<!--card-body-->
</div>
<!--card-->

<!-- Modal -->
<div class='modal fade' id='editModal' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
			<div class='modal-header bg-warning'>
				<h4 class='modal-title' id='editModalLabel'>บันทึกข้อมูล</h4>
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
			</div>
			<div class='modal-body'>
				<h4>ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?</h4>
				<form class="form-horizontal" onsubmit="return false;">
					<div class="form-group">
						<div class="col-sm-8">
							<!-- <label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label> -->
						</div>
						<div class="col-sm-12">
							<input type="hidden" class="form-control" id="edit_remark" value="edit data">
						</div>
					</div>
				</form>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-lg btn-default' data-dismiss='modal'><i class="fas fa-window-close"></i> ปิด</button>
				<button type='button' class='btn btn-lg btn-primary' id='btnSaveEdit'>&nbsp;<i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>