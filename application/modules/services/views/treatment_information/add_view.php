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
					<label class="col-sm-2 control-label" for="rosc_time_save">การบันทึกเวลา ROSC (การกลับมามีสัญญาณชีพ) ครั้งแรกเมื่อทีมปฏิบัติการแพทย์ฉุกเฉินไปถึง :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rosc_time_save" id="rosc_time_save1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rosc_time_save1">ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rosc_time_save" id="rosc_time_save2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rosc_time_save2">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rosc_time_save" id="rosc_time_save3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rosc_time_save3">ไม่ทราบเวลา</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="cpr">การทำ CPR ของทีมปฏิบัติการแพทย์ฉุกเฉิน :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="cpr" id="cpr1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr" id="cpr2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr2">ทำ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="time_cpr_start">เวลาที่เริ่ม CPR ณ จุดเกิดเหตุ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="time_cpr_start" name="time_cpr_start" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="time_cpr_end">เวลาที่สิ้นสุดการ CPR ณ จุดเกิดเหตุ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="time_cpr_end" name="time_cpr_end" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rosc_time_alert">การมี ROSC (การกลับมามีสัญญาณชีพ) :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rosc_time_alert" id="rosc_time_alert1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rosc_time_alert1">มี</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rosc_time_alert" id="rosc_time_alert2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rosc_time_alert2">ไม่มี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rta_have">มี :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="rta_have" id="rta_have1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rta_have1">หลังจาก CPR โดยผู้พบเห็นเหตุการณ์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rta_have" id="rta_have2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rta_have2">หลังจาก CPR โดยทีมปฏิบัติการแพทย์ฉุกเฉิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rta_have" id="rta_have3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rta_have3">หลังจากใช้ AED โดยผู้พบเห็นเหตุการณ์</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rta_have" id="rta_have4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rta_have4">หลังจากใช้ AED โดยทีมปฏิบัติการแพทย์ฉุกเฉิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="rta_have" id="rta_have5" value="5" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="rta_have5">หลังจากทีมปฏิบัติการแพทย์ฉุกเฉินทำ Advanced cardiac life support (การช่วยฟื้นคืนชีพระดับสูง)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="cpr_rosc_nomal">การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_rosc_nomal" id="cpr_rosc_nomal1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_rosc_nomal1">ณ จุดเกิดเหตุ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_rosc_nomal" id="cpr_rosc_nomal2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_rosc_nomal2">ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_rosc_nomal" id="cpr_rosc_nomal3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_rosc_nomal3">ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="use_defibrillator">การใช้ Defibrillator :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="use_defibrillator" id="use_defibrillator1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="use_defibrillator1">มี</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="use_defibrillator" id="use_defibrillator2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="use_defibrillator2">ไม่มี</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ekg">การประเมิน EKG หลังทำ CPR :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="ekg" id="ekg1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="ekg1">Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="ekg" id="ekg2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="ekg2">Non-shockable rhythm (Asystole / Pulseless Electrical Activity)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="defibrillations_number">จำนวนครั้งการกระตุกหัวใจที่ได้รับ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="defibrillations_number" name="defibrillations_number" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="airway_opening">การเปิดทางเดินหายใจ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="airway_opening" id="airway_opening1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="airway_opening1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="airway_opening" id="airway_opening2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="airway_opening2">ทำ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="airway_management">การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ) :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="checkbox" name="airway_management[]" id="airway_management1" value="1" class="form-check-input" />
							<label for="airway_management1" class="form-check-label">Non-definite airway เลือกประเภท</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="airway_management[]" id="airway_management2" value="2" class="form-check-input" />
							<label for="airway_management2" class="form-check-label">Definite airway เลือกประเภท</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="airway_management[]" id="airway_management3" value="3" class="form-check-input" />
							<label for="airway_management3" class="form-check-label">Oxygen cannula/mask</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="airway_management[]" id="airway_management4" value="4" class="form-check-input" />
							<label for="airway_management4" class="form-check-label">Bag-valve-mask ventilation</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="airway_management[]" id="airway_management5" value="5" class="form-check-input" />
							<label for="airway_management5" class="form-check-label">อื่น ๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="non_definite_airway">Non-definite airway :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="checkbox" name="non_definite_airway[]" id="non_definite_airway1" value="1" class="form-check-input" />
							<label for="non_definite_airway1" class="form-check-label">การจัดท่า เช่น Head tilt Chin lift Jaw thrust maneuver</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="non_definite_airway[]" id="non_definite_airway2" value="2" class="form-check-input" />
							<label for="non_definite_airway2" class="form-check-label">Oral airway หรือ oropharyngeal airway (ท่อเปิดทางเดินหายใจทางปาก)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="non_definite_airway[]" id="non_definite_airway3" value="3" class="form-check-input" />
							<label for="non_definite_airway3" class="form-check-label">Nasal airway หรือ nasopharyngeal airway (ท่อเปิดทางเดินหายใจทางจมูก)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="non_definite_airway[]" id="non_definite_airway4" value="4" class="form-check-input" />
							<label for="non_definite_airway4" class="form-check-label">Laryngeal mask airway (LMA) หรือหน้ากากครอบกล่องเสียง เป็นอุปกรณ์ช่วยหายใจเหนือสายเสียง (Supraglottic airway device)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="definite_airway">Definite airway :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="checkbox" name="definite_airway[]" id="definite_airway1" value="1" class="form-check-input" />
							<label for="definite_airway1" class="form-check-label">Endotracheal tube (ใส่ท่อช่วยหายใจ)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="definite_airway[]" id="definite_airway2" value="2" class="form-check-input" />
							<label for="definite_airway2" class="form-check-label">Nasotracheal tube (ใส่ท่อช่วยหายใจทางจมูก)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" name="definite_airway[]" id="definite_airway3" value="3" class="form-check-input" />
							<label for="definite_airway3" class="form-check-label">Surgical airway (เช่น เจาะคอ)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="stop_bleeding">การ Stop bleeding (การห้ามเลือด) :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="stop_bleeding" id="stop_bleeding1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="stop_bleeding1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="stop_bleeding" id="stop_bleeding2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="stop_bleeding2">ทำ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="intravenous_fluid">การให้สารน้ำทางหลอดเลือดดำ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid" id="intravenous_fluid1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid1">ไม่ให้</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid" id="intravenous_fluid2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid2">ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="intravenous_fluid_yes">ให้ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid_yes" id="intravenous_fluid_yes1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid_yes1">9% Nacl</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid_yes" id="intravenous_fluid_yes2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid_yes2">Acetar</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid_yes" id="intravenous_fluid_yes3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid_yes3">Lactate ringer</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="intravenous_fluid_yes" id="intravenous_fluid_yes4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="intravenous_fluid_yes4">อื่นๆ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="intravenous_fluid_remark">อื่นๆ ระบุ :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="intravenous_fluid_remark" name="intravenous_fluid_remark" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="drug">การให้ยา :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="drug" id="drug1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drug1">ไม่ให้</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="drug" id="drug2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drug2">ให้ ระบุประเภท</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="drag_yes">ให้ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="drag_yes" id="drag_yes1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drag_yes1">Adrenaline</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="drag_yes" id="drag_yes2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drag_yes2">Atropine</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="drag_yes" id="drag_yes3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drag_yes3">Cordarone</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="drag_yes" id="drag_yes4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="drag_yes4">อื่นๆ</label>
							<input type="text" class="form-control " id="drug_remark" name="drug_remark" value=""  placeholder="ระบุ..."/>
						</div>

					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label" for="hkw_local">การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="hkw_local" id="hkw_local1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="hkw_local1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="hkw_local" id="hkw_local2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="hkw_local2">ทำ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="hkw_hospital">การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) อย่างต่อเนื่องจนถึงโรงพยาบาล :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="hkw_hospital" id="hkw_hospital1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="hkw_hospital1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="hkw_hospital" id="hkw_hospital2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="hkw_hospital2">ทำ</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="auto_cpr">เครื่อง Auto CPR :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="auto_cpr" id="auto_cpr1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="auto_cpr1">ไม่มีเครื่อง Auto CPR</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="auto_cpr" id="auto_cpr2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="auto_cpr2">มีเครื่อง Auto CPR</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="auto_cpr_yes">มีเครื่อง Auto CPR :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="auto_cpr_yes" id="auto_cpr_yes1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="auto_cpr_yes1">ไม่ใช้</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="auto_cpr_yes" id="auto_cpr_yes2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="auto_cpr_yes2">ใช้</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="course_resuscitation">สาเหตุการหยุด Resuscitation :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="course_resuscitation" id="course_resuscitation1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="course_resuscitation1">Loss of Spontaneous Circulation LOSC (ไม่มีสัญญาณชีพกลับมา)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="course_resuscitation" id="course_resuscitation2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="course_resuscitation2">Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล)</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="course_resuscitation" id="course_resuscitation3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="course_resuscitation3">Return of Spontaneous Circulation ROSC (กลับมามีสัญญาณชีพ)</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="cpr_output">ผลลัพธ์การ CPR :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_output" id="cpr_output1" value="1" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_output1">ทุเลา</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_output" id="cpr_output2" value="2" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_output2">คงเดิม</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_output" id="cpr_output3" value="3" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_output3">เสียชีวิต ณ จุดเกิดเหตุ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="cpr_output" id="cpr_output4" value="4" class="form-check-input" autocomplete="off" />
							<label class="form-check-label" for="cpr_output4">เสียชีวิตขณะนำส่งโรงพยาบาล</label>
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