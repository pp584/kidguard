<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">2. ข้อมูลเวลาและระยะทาง </span><span class="text-medium"></span></div>
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
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-id"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-note"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/add">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-gleam"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/add">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-user"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/add">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-attention"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/add">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-smile"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/add">8. ผลลัพธ์</a></h4>
					</div>
				</div>
			</div>



			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="card-body">
					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="service_information_id">service_information_id :</label>
								<input type="text" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="incident_time">2.1 เวลาที่มีผู้พบเห็นเหตุการณ์ (น.):</label>


								<input type="text" class="form-control " id="incident_time" name="incident_time" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="incident_time_recrive">2.2 เวลาที่ได้รับแจ้งเหตุ (น.) :</label>


								<input type="text" class="form-control " id="incident_time_recrive" name="incident_time_recrive" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="time_order">2.3 เวลาที่สั่งการ (น.) :</label>


								<input type="text" class="form-control " id="time_order" name="time_order" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="base_time_start">2.4 เวลาที่ออกจากฐาน  (น.):</label>


								<input type="text" class="form-control " id="base_time_start" name="base_time_start" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="base_time_stop">2.5 เวลาที่ไปถึงที่เกิดเหตุ (น.) :</label>


								<input type="text" class="form-control " id="base_time_stop" name="base_time_stop" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="time_of_leaving">2.6 เวลาที่ออกจากที่เกิดเหตุ  (น.) :</label>


								<input type="text" class="form-control " id="time_of_leaving" name="time_of_leaving" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="time_to_hospital">2.7 เวลาที่ไปถึงโรงพยาบาล (น.) :</label>


								<input type="text" class="form-control " id="time_to_hospital" name="time_to_hospital" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="base_time_finish">2.8 เวลาที่ถึงฐาน (น.) :</label>


								<input type="text" class="form-control " id="base_time_finish" name="base_time_finish" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="distance_base_scene">2.9 ระยะทางจากฐานไปถึงที่เกิดเหตุ (กม.) :</label>


								<input type="text" class="form-control " id="distance_base_scene" name="distance_base_scene" value="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="distance_to_hospital">2.10 ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล (กม.) :</label>


								<input type="text" class="form-control " id="distance_to_hospital" name="distance_to_hospital" value="" />
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