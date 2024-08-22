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
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_information_id">service_information_id :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="first_life_resuscitation">การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="first_life_resuscitation" id="first_life_resuscitation1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_life_resuscitation1">มี</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_life_resuscitation" id="first_life_resuscitation2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_life_resuscitation2">ไม่มี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="methods_first_life_resuscitation">ลักษณะของการทำกู้ชีพเบื้องต้น :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation1">Compressions only (กดหน้าอกอย่างเดียว)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation2">Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation3">Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation4">AED</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation5">Stop bleeding (ห้ามเลือด)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation6" value="6" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation6">Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation7" value="7" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="methods_first_life_resuscitation7">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rescuer_cpr">ผู้ทำการกู้ชีพ (CPR) เบื้องต้น :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr" id="rescuer_cpr1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr1">ประชาชนทั่วไป</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr" id="rescuer_cpr2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr2">บุคลากรทางการแพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr" id="rescuer_cpr3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr3">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rescuer_cpr_general_public">ประชาชนทั่วไป :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_general_public1">สมาชิกครอบครัว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_general_public2">เพื่อนบ้าน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_general_public3">เพื่อนร่วมงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_general_public4">ตำรวจ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_general_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rescuer_cpr_medical_personnel">บุคลากรทางการแพทย์ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_medical_personnel1">แพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_medical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_medical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_medical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_medical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rescuer_cpr_remark">อื่นๆ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_remark" id="rescuer_cpr_remark1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_remark1">Choice 1</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rescuer_cpr_remark" id="rescuer_cpr_remark2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rescuer_cpr_remark2">Choice 2</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="general_public_aed">มี AED ในที่สาธารณะ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="general_public_aed" id="general_public_aed1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public_aed1">มี</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public_aed" id="general_public_aed2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public_aed2">ไม่มี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="use_general_public_aed">มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="use_general_public_aed" id="use_general_public_aed1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="use_general_public_aed1">มี</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="use_general_public_aed" id="use_general_public_aed2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="use_general_public_aed2">ไม่มี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="first_use_aed">ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aed" id="first_use_aed1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aed1">ประชาชนทั่วไป</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aed" id="first_use_aed2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aed2">บุคลากรทางการแพทย์</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="first_use_aedgeneral_public">ประชาชนทั่วไป :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedgeneral_public1">สมาชิกครอบครัว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedgeneral_public2">เพื่อนบ้าน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedgeneral_public3">เพื่อนร่วมงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedgeneral_public4">ตำรวจ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedgeneral_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="first_use_aedmedical_personnel">บุคลากรทางการแพทย์ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedmedical_personnel1">แพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedmedical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedmedical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedmedical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="first_use_aedmedical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
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