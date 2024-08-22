<div class="padding-bottom-3x mb-1">
	<div class="card mb-12">
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">5. การกู้ชีพเบื้องต้น </span><span class="text-medium"></span></div>
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
				<div class="step completed">
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
				
				<!-- <div class="step">
					<div class="step-icon-wrap">
						<div class="step-icon">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/9.png"></div>
						</div>
					</div>
					<h4 class="step-title">9. ยืนยันข้อมูล</h4>
				</div> -->

			</div>
		</div>
		<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
			{csrf_protection_field}
			<input type="hidden" name="submit_case" value="edit" />
			<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='first_life_resuscitation'>5.1 การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง <label style="color:#e32">*</label>:</label>


					<div class="form-check form-check-inline">
						<input type="radio" name="first_life_resuscitation" id="first_life_resuscitation1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_first_life_resuscitation}" />
						<label class="form-check-label" for="first_life_resuscitation1">มี</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="first_life_resuscitation" id="first_life_resuscitation2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_first_life_resuscitation}" />
						<label class="form-check-label" for="first_life_resuscitation2">ไม่มี</label>
					</div>

				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='methods_first_life_resuscitation'>5.2 ลักษณะของการทำกู้ชีพเบื้องต้น เลือกประเภท <label style="color:#e32">*</label>:</label>

					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation1">Compressions only (กดหน้าอกอย่างเดียว)</label>
					</div>
					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation2">Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม)</label>
					</div>
					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation3">Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว)</label>
					</div>
					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation4">AED</label>
					</div>
					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation5">Stop bleeding (ห้ามเลือด)</label>
					</div>
					<div class="form-check ">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation6" value="6" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation6">Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="methods_first_life_resuscitation" id="methods_first_life_resuscitation7" value="7" class="form-check-input" autocomplete="off" data-record-value="{record_methods_first_life_resuscitation}" />
						<label class="form-check-label" for="methods_first_life_resuscitation7">อื่นๆ</label>
						<input type="text" class="form-control " id="methods_first_life_resuscitation_remark" name="methods_first_life_resuscitation_remark" value="" placeholder="ระบุ..." />
					</div>

				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='rescuer_cpr'>5.3 ผู้ทำการกู้ชีพ (CPR) เบื้องต้น <label style="color:#e32">*</label>:</label>
					<div class="form-check">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<input type="radio" name="rescuer_cpr" id="rescuer_cpr1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr}" />
							<label class="form-check-label" for="rescuer_cpr1">ประชาชนทั่วไป เลือกประเภท</label>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class='form-group'>

								<div class="form-check form-check-inline">
									<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_general_public}" />
									<label class="form-check-label" for="rescuer_cpr_general_public1">สมาชิกครอบครัว</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_general_public}" />
									<label class="form-check-label" for="rescuer_cpr_general_public2">เพื่อนบ้าน</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_general_public}" />
									<label class="form-check-label" for="rescuer_cpr_general_public3">เพื่อนร่วมงาน</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_general_public}" />
									<label class="form-check-label" for="rescuer_cpr_general_public4">ตำรวจ</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="rescuer_cpr_general_public" id="rescuer_cpr_general_public5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_general_public}" />
									<label class="form-check-label" for="rescuer_cpr_general_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
								</div>

							</div>
						</div>

					</div>
					<div class="form-check">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<input type="radio" name="rescuer_cpr" id="rescuer_cpr2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr}" />
							<label class="form-check-label" for="rescuer_cpr2">บุคลากรทางการแพทย์ เลือกประเภท</label>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class='form-group'>
								<div class="form-check">
									<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_medical_personnel}" />
									<label class="form-check-label" for="rescuer_cpr_medical_personnel1">แพทย์</label>
								</div>
								<div class="form-check">
									<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_medical_personnel}" />
									<label class="form-check-label" for="rescuer_cpr_medical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_medical_personnel}" />
									<label class="form-check-label" for="rescuer_cpr_medical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_medical_personnel}" />
									<label class="form-check-label" for="rescuer_cpr_medical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="rescuer_cpr_medical_personnel" id="rescuer_cpr_medical_personnel5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_medical_personnel}" />
									<label class="form-check-label" for="rescuer_cpr_medical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="rescuer_cpr" id="rescuer_cpr3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr}" />
						<label class="form-check-label" for="rescuer_cpr3">อื่นๆ</label>
						<input type="text" class="form-control " id="rescuer_cpr_remark" name="rescuer_cpr_remark" value="" placeholder="ระบุ..." />
					</div>

				</div>
			</div>


			<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='rescuer_cpr_remark'>:</label>
					<div class="form-check form-check-inline">
						<input type="radio" name="rescuer_cpr_remark" id="rescuer_cpr_remark1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_remark}" />
						<label class="form-check-label" for="rescuer_cpr_remark1">Choice 1</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="rescuer_cpr_remark" id="rescuer_cpr_remark2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_rescuer_cpr_remark}" />
						<label class="form-check-label" for="rescuer_cpr_remark2">Choice 2</label>
					</div>

				</div>
			</div> -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='general_public_aed'>5.4 มี AED ในที่สาธารณะ <label style="color:#e32">*</label>:</label>

					<div class="form-check form-check-inline">
						<input type="radio" name="general_public_aed" id="general_public_aed1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_general_public_aed}" />
						<label class="form-check-label" for="general_public_aed1">มี</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="general_public_aed" id="general_public_aed2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_general_public_aed}" />
						<label class="form-check-label" for="general_public_aed2">ไม่มี</label>
					</div>

				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='use_general_public_aed'>5.5 มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ <label style="color:#e32">*</label>:</label>

					<div class="form-check form-check-inline">
						<input type="radio" name="use_general_public_aed" id="use_general_public_aed1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_use_general_public_aed}" />
						<label class="form-check-label" for="use_general_public_aed1">มี</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="use_general_public_aed" id="use_general_public_aed2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_use_general_public_aed}" />
						<label class="form-check-label" for="use_general_public_aed2">ไม่มี</label>
					</div>

				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<label for='first_use_aed'>5.6 ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ <label style="color:#e32">*</label> :</label>
					<div class="form-check">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<input type="radio" name="first_use_aed" id="first_use_aed1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aed}" />
							<label class="form-check-label" for="first_use_aed1">ประชาชนทั่วไป เลือกประเภท</label>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class='form-group'>

								<div class="form-check form-check-inline">
									<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedgeneral_public}" />
									<label class="form-check-label" for="first_use_aedgeneral_public1">สมาชิกครอบครัว</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedgeneral_public}" />
									<label class="form-check-label" for="first_use_aedgeneral_public2">เพื่อนบ้าน</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedgeneral_public}" />
									<label class="form-check-label" for="first_use_aedgeneral_public3">เพื่อนร่วมงาน</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedgeneral_public}" />
									<label class="form-check-label" for="first_use_aedgeneral_public4">ตำรวจ</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="first_use_aedgeneral_public" id="first_use_aedgeneral_public5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedgeneral_public}" />
									<label class="form-check-label" for="first_use_aedgeneral_public5">ผู้พบเห็นเหตุการณ์/พลเมืองดี</label>
								</div>

							</div>
						</div>

					</div>
					<div class="form-check">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<input type="radio" name="first_use_aed" id="first_use_aed2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aed}" />
							<label class="form-check-label" for="first_use_aed2">บุคลากรทางการแพทย์ เลือกประเภท</label>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class='form-group'>

								<div class="form-check">
									<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedmedical_personnel}" />
									<label class="form-check-label" for="first_use_aedmedical_personnel1">แพทย์</label>
								</div>
								<div class="form-check">
									<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedmedical_personnel}" />
									<label class="form-check-label" for="first_use_aedmedical_personnel2">ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedmedical_personnel}" />
									<label class="form-check-label" for="first_use_aedmedical_personnel3">พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedmedical_personnel}" />
									<label class="form-check-label" for="first_use_aedmedical_personnel4">พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="first_use_aedmedical_personnel" id="first_use_aedmedical_personnel5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_first_use_aedmedical_personnel}" />
									<label class="form-check-label" for="first_use_aedmedical_personnel5">อาสาสมัครสาธารณสุข อสส./อสม.</label>
								</div>

							</div>
						</div>

					</div>

				</div>
			</div>


			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<!-- <button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button> -->

					</div>
				</div>

				<input type="hidden" name="encrypt_basic_resuscitation_id" value="{encrypt_basic_resuscitation_id}" />
				<input type="hidden" name="rescuer_cpr_remark" value="อื่นๆ " />

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
						<a href="{site_url}services/event_information/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> </a>
						<a href="{site_url}services/treatment_information/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
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
						<!-- <div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div> -->
						<div class="col-sm-12">
							<input type="hidden" class="form-control" id="edit_remark" value="Save data ">
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