<script>
	

	function even_sceneFunction(id) {
	
		
	}


</script>

<div class="padding-bottom-3x mb-1">
	<div class="card mb-12">
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">
				4. ข้อมูลเหตุการณ์ </span><span class="text-medium"></span></div>
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
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/3.png"></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
				</div>
				<div class="step completed">
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
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<!-- <label for='service_information_id'>service_information_id :</label> -->
					<div class='col-sm-12'>
						<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label for='even_scene'>4.1 ลักษณะของที่เกิดเหตุ <label style="color:#e32">*</label>:</label>
					<div class='col-sm-12' style="display: none;">

						<div class="form-check form-check-inline">
							<input onchange="even_sceneFunction(1)" type="radio" name="even_scene" id="even_scene1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_even_scene}" />
							<label class="form-check-label" for="even_scene1">ที่พักอาศัย</label>
						</div>
						<div class="form-check form-check-inline">
							<input onchange="even_sceneFunction(2)" type="radio" name="even_scene" id="even_scene2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_even_scene}" />
							<label class="form-check-label" for="even_scene2">สถานที่ทำงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input onchange="even_sceneFunction(3)" type="radio" name="even_scene" id="even_scene3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_even_scene}" />
							<label class="form-check-label" for="even_scene3">สถานที่สาธารณะ</label>
						</div>
						<div class="form-check form-check-inline">
							<input onchange="even_sceneFunction(4)" type="radio" name="even_scene" id="even_scene4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_even_scene}" />
							<label class="form-check-label" for="even_scene4">ศูนย์ดูแลผู้ป่วย</label>
						</div>
						<div class="form-check form-check-inline">
							<input onchange="even_sceneFunction(5)" type="radio" name="even_scene" id="even_scene5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_even_scene}" />
							<label class="form-check-label" for="even_scene5">อื่นๆ</label>
						</div>
						<div class="form-check form-check-inline">
						

						</div>

					</div>
				</div>

				<div class='form-group' id="accommodation">
					<label for='accommodation'>ที่พักอาศัย :</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_accommodation}" />
							<label class="form-check-label" for="accommodation1">หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_accommodation}" />
							<label class="form-check-label" for="accommodation2">บ้านเดี่ยวของตนเอง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_accommodation}" />
							<label class="form-check-label" for="accommodation3">หมู่บ้านจัดสรร</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="accommodation" id="accommodation4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_accommodation}" />
							<label class="form-check-label" for="accommodation4">อื่น ๆ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="text" class="form-control " id="accommodation_remark" name="accommodation_remark" value="{record_accommodation_remark}" placeholder="อื่นๆระบุ...." />
						</div>


					</div>
				</div>
				<div class='form-group' id="workplace" >
					<label for='workplace'>สถานที่ทำงาน :</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_workplace}" />
							<label class="form-check-label" for="workplace1">โรงงาน/บริษัท/สำนักงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_workplace}" />
							<label class="form-check-label" for="workplace2">ค่ายทหาร</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_workplace}" />
							<label class="form-check-label" for="workplace3">หน่วยงานราชการ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="workplace" id="workplace4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_workplace}" />
							<label class="form-check-label" for="workplace4">อื่น ๆ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="text" class="form-control " id="workplace_remark" name="workplace_remark" value="{record_workplace_remark}" placeholder="อื่นๆระบุ...." />
						</div>

					</div>
				</div>

				<div class='form-group' id="public_place">
					<label for='public_place'>สถานที่สาธารณะ :</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place1">ตลาด</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place2">แหล่งท่องเที่ยว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place3">สนามบิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place4">ถนน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place5">ห้างสรรพสินค้า</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place6" value="6" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place6">สนามกีฬา</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place7" value="7" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place7">สถานบันเทิง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place8" value="8" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place8">สวนสาธารณะ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="public_place" id="public_place9" value="9" class="form-check-input" autocomplete="off" data-record-value="{record_public_place}" />
							<label class="form-check-label" for="public_place9">สถานีขนส่ง</label>
						</div>

					</div>
				</div>

				
				<div class='form-group'>
					<label for='eyewitnesses_remark'>อื่นๆ :</label>
					<div class='col-sm-12'>

					<input type="text" class="form-control " id="even_scene_remark" name="even_scene_remark" value="{record_even_scene_remark}" placeholder="อื่นๆระบุ...." />
					</div>
				</div>

				<div class='form-group'>
					<label for='eyewitnesses'>4.2 ผู้พบเห็นเหตุการณ์ ผู้ป่วยหัวใจหยุดเต้น ณ จุดเกิดเหตุ ในทันที <label style="color:#e32">*</label>:</label>
					<div class='col-sm-12' style="display: none;">

						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_eyewitnesses}" />
							<label class="form-check-label" for="eyewitnesses1">ประชาชนทั่วไป</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_eyewitnesses}" />
							<label class="form-check-label" for="eyewitnesses2">บุคลากรทางการแพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="eyewitnesses" id="eyewitnesses3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_eyewitnesses}" />
							<label class="form-check-label" for="eyewitnesses3">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class='form-group'>
					<label for='general_public'>ประชาชนทั่วไป :</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_general_public}" />
							<label class="form-check-label" for="general_public1">สมาชิกครอบครัว</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_general_public}" />
							<label class="form-check-label" for="general_public2">เพื่อนบ้าน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_general_public}" />
							<label class="form-check-label" for="general_public3">เพื่อนร่วมงาน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_general_public}" />
							<label class="form-check-label" for="general_public4">ตำรวจ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="general_public" id="general_public5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_general_public}" />
							<label class="form-check-label" for="general_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
						</div>

					</div>
				</div>
				<div class='form-group'>
					<label for='medical_personnel'>บุคลากรทางการแพทย์ :</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_medical_personnel}" />
							<label class="form-check-label" for="medical_personnel1">แพทย์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_medical_personnel}" />
							<label class="form-check-label" for="medical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_medical_personnel}" />
							<label class="form-check-label" for="medical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_medical_personnel}" />
							<label class="form-check-label" for="medical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="medical_personnel" id="medical_personnel5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_medical_personnel}" />
							<label class="form-check-label" for="medical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
						</div>

					</div>
				</div>
				<div class='form-group'>
					<label for='eyewitnesses_remark'>อื่นๆ ระบุ ………............ :</label>
					<div class='col-sm-12'>

						<input type="text" class="form-control " id="eyewitnesses_remark" name="eyewitnesses_remark" value="{record_eyewitnesses_remark}" />
					</div>
				</div>
				<div class='form-group'>
					<label for='causes_cardiac_arres'>4.4 สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น (หลักการภาวะหัวใจหยุดเต้น 6H6T) <label style="color:#e32">*</label>:</label>
					<div class='col-sm-12'>

						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres1">Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres2">Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres3">Hydrogen ion (Acidosis) ภาวะเลือดเป็นกรด</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres4">Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres5">Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres6" value="6" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres6">Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres7" value="7" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres7">Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres8" value="8" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres8">Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres9" value="9" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres9">Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres10" value="10" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres10">Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres11" value="11" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres11">Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres12" value="12" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres12">Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="causes_cardiac_arres" id="causes_cardiac_arres13" value="13" class="form-check-input" autocomplete="off" data-record-value="{record_causes_cardiac_arres}" />
							<label class="form-check-label" for="causes_cardiac_arres13">อื่นๆ ระบุ</label>
						</div>

					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<!-- <button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button> -->

					</div>
				</div>


				<br />
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
							<button type="button" class='btn btn-primary' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึกร่าง &nbsp;&nbsp;</button>
							<!-- <button type="button" id="btndarf" name="btndarf" class="btn btn-info"><i class="fa fa-save"></i> บันทึกร่าง</button> -->
							<a href="{site_url}services/patient_profile"> <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> </a>
							<a href="{site_url}services/basic_resuscitation/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
						</div>
					</div>
				</div>

				<input type="hidden" name="encrypt_event_information_id" value="{encrypt_event_information_id}" />
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
						<!-- <div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div> -->
						<div class="col-sm-12">
							<input type="hidden" class="form-control" id="edit_remark" value="บันทึกข้อมูล">
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