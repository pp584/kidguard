<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">2. ข้อมูลเวลาและระยะทาง </span><span class="text-medium"></span></div>
			<div class="card-body">
				<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/1.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/service_information/edit_data">1. ข้อมูลหน่วยบริการ</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/2.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/time_distance/edit_data">2. ข้อมูลเวลาและระยะทาง</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/3.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/4.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/edit_data">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/5.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/edit_data">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/6.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/edit_data">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/7.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/edit_data">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/add">8. ผลลัพธ์</a></h4>
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

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='incident_time'>2.1 เวลาที่มีผู้พบเห็นเหตุการณ์ (น.) <label style="color:#e32">*</label>:</label>
								<input type="text" class="form-control " id="incident_time" name="incident_time" value="{record_incident_time}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='incident_time_recrive'>2.2 เวลาที่ได้รับแจ้งเหตุ (น.) <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="incident_time_recrive" name="incident_time_recrive" value="{record_incident_time_recrive}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='time_order'>2.3 เวลาที่สั่งการ (น.) <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="time_order" name="time_order" value="{record_time_order}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='base_time_start'>2.4 เวลาที่ออกจากฐาน (น.) <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="base_time_start" name="base_time_start" value="{record_base_time_start}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='base_time_stop'>2.5 เวลาที่ไปถึงที่เกิดเหตุ (น.) <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="base_time_stop" name="base_time_stop" value="{record_base_time_stop}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='time_of_leaving'>2.6 เวลาที่ออกจากที่เกิดเหตุ <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="time_of_leaving" name="time_of_leaving" value="{record_time_of_leaving}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='time_to_hospital'>2.7 เวลาที่ไปถึงโรงพยาบาล <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="time_to_hospital" name="time_to_hospital" value="{record_time_to_hospital}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='base_time_finish'>2.8 เวลาที่ถึงฐาน <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="base_time_finish" name="base_time_finish" value="{record_base_time_finish}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='distance_base_scene'>2.9 ระยะทางจากฐานไปถึงที่เกิดเหตุ <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="distance_base_scene" name="distance_base_scene" value="{record_distance_base_scene}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='distance_to_hospital'>2.10 ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล <label style="color:#e32">*</label>:</label>
								<input type="text" class="form-control " id="distance_to_hospital" name="distance_to_hospital" value="{record_distance_to_hospital}" />
							</div>
						</div>

						<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='distance_to_hospital'>2.11 ระยะทางจากโรงพยาบาลไปถึงฐาน <label style="color:#e32">*</label>:</label>
								<input type="text" class="form-control " id="hospital_to_base" name="hospital_to_base" value="{record_hospital_to_base}" />
							</div>
						</div> -->


						<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<div class='col-sm-offset-2 col-sm-10'>
									<button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

								</div>
							</div> -->

						<input type="hidden" name="encrypt_itme_distance_id" value="{encrypt_itme_distance_id}" />

						<!-- </div> -->
					</div>
				</div>

				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						<div class="text-left">
							<a href="{site_url}services/service_information">
								<button type="button" id="submit" name="submit" class="btn btn-danger"><i class="fa fa-times"></i> ออกจากแบบฟอร์ม</button>
							</a>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						<div class="text-right">
							<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ออกจากแบบฟอร์ม</button> -->
							<!-- <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> บันทึกร่าง</button> -->
							<button type="button" class='btn btn-primary' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึกร่าง &nbsp;&nbsp;</button>

							<!-- <button type="button" id="btndarf" name="btndarf" class="btn btn-info"><i class="fa fa-save"></i> บันทึกร่าง</button> -->
							<a href="{site_url}services/service_information/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> </a>
							<a href="{site_url}services/patient_profile"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
							<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ยกเลิก</button> -->

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
					<h4>ยืนยันการบันทึกข้อมูลข้อมูล ?</h4>
					<form class="form-horizontal" onsubmit="return false;">
						<div class="form-group">
							<input type="hidden" class="form-control" id="edit_remark" value="Save Data">
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