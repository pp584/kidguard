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
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_information_id">service_information_id :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="even_scene">ลักษณะของที่เกิดเหตุ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="even_scene" id="even_scene1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="even_scene1">ที่พักอาศัย</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="even_scene" id="even_scene2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="even_scene2">สถานที่ทำงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="even_scene" id="even_scene3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="even_scene3">สถานที่สาธารณะ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="even_scene" id="even_scene4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="even_scene4">ศูนย์ดูแลผู้ป่วย</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="even_scene" id="even_scene5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="even_scene5">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="even_scene_remark">อื่นๆ ระบุ ………............ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="even_scene_remark" name="even_scene_remark" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="accommodation">ที่พักอาศัย :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="accommodation1">หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="accommodation2">บ้านเดี่ยวของตนเอง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="accommodation3">หมู่บ้านจัดสรร</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="accommodation4">อื่น ๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="accommodation_remark">อื่นๆ ระบุ ………............ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="accommodation_remark" name="accommodation_remark" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="workplace">สถานที่ทำงาน :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="workplace1">โรงงาน/บริษัท/สำนักงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="workplace2">ค่ายทหาร</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="workplace3">หน่วยงานราชการ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="workplace4">อื่น ๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="workplace_remark">อื่นๆ ระบุ ………............ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="workplace_remark" name="workplace_remark" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="public_place">สถานที่สาธารณะ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place1">ตลาด</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place2">แหล่งท่องเที่ยว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place3">สนามบิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place4">ถนน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place5">ห้างสรรพสินค้า</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place6" value="6" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place6">สนามกีฬา</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place7" value="7" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place7">สถานบันเทิง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place8" value="8" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place8">สวนสาธารณะ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place9" value="9" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="public_place9">สถานีขนส่ง</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="eyewitnesses">ผู้พบเห็นเหตุการณ์ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="eyewitnesses1">ประชาชนทั่วไป</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="eyewitnesses2">บุคลากรทางการแพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="eyewitnesses3">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="general_public">ประชาชนทั่วไป :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public1">สมาชิกครอบครัว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public2">เพื่อนบ้าน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public3">เพื่อนร่วมงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public4">ตำรวจ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="general_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="medical_personnel">บุคลากรทางการแพทย์ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="medical_personnel1">แพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="medical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="medical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="medical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="medical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="eyewitnesses_remark">อื่นๆ ระบุ ………............ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="eyewitnesses_remark" name="eyewitnesses_remark" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="causes_cardiac_arres">สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres1">Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres2">Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres3">Hydrogen ion (Acidosis) ภาวะเลือดเป็นกรด</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres4">Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres5">Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres6" value="6" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres6">Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres7" value="7" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres7">Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres8" value="8" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres8">Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres9" value="9" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres9">Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres10" value="10" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres10">Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres11" value="11" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres11">Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres12" value="12" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres12">Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres13" value="13" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="causes_cardiac_arres13">อื่นๆ ระบุ</label>
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