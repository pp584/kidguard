<div class="padding-bottom-3x mb-1">
	<div class="card mb-12">
		<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">7. นำส่งแผนกอุบัติเหตุ </span><span class="text-medium"></span></div>
		<div class="card-body">
			<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/1.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/service_information/edit_data">1. ข้อมูลหน่วยบริการ</a></h4>
				</div>
				<div class="step completed ">
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
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/4.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/event_information/edit_data">4. ข้อมูลเหตุการณ์</a></h4>
				</div>
				<div class="step completed">
					<div class="step-icon-wrap">
						<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/5.png" ></div>
					</div>
					<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/edit_data">5. การกู้ชีพเบื้องต้น</a> </h4>
				</div>

				<div class="step completed ">
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

				<div class="step ">
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
				<input type="hidden" name="submit_case" value="edit" />

				<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

					<div class='form-group'>
						<label for='delivery_hospital'>7.1 โรงพยาบาลที่นำส่ง <label style="color:#e32">*</label>:</label><br />


						<div class="form-check form-check-inline">
							<input type="radio" name="delivery_hospital" id="delivery_hospital1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_delivery_hospital}" />
							<label class="form-check-label" for="delivery_hospital1">รัฐบาล</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="delivery_hospital" id="delivery_hospital2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_delivery_hospital}" />
							<label class="form-check-label" for="delivery_hospital2">เอกชน</label>
						</div>

					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='delivery_hospital_course'>7.2 เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ) <label style="color:#e32">*</label>:</label>
						<div class="form-check">
							<input type="checkbox" data-record-value="{record_delivery_hospital_course}" name="delivery_hospital_course[]" id="delivery_hospital_course1" value="1" class="form-check-input" />
							<label for="delivery_hospital_course1" class="form-check-label">เหมาะสม สามารถให้การรักษาได้</label>
						</div>
						<div class="form-check">
							<input type="checkbox" data-record-value="{record_delivery_hospital_course}" name="delivery_hospital_course[]" id="delivery_hospital_course2" value="2" class="form-check-input" />
							<label for="delivery_hospital_course2" class="form-check-label">อยู่ใกล้</label>
						</div>
						<div class="form-check">
							<input type="checkbox" data-record-value="{record_delivery_hospital_course}" name="delivery_hospital_course[]" id="delivery_hospital_course3" value="3" class="form-check-input" />
							<label for="delivery_hospital_course3" class="form-check-label">มีสิทธิการรักษา</label>
						</div>
						<div class="form-check">
							<input type="checkbox" data-record-value="{record_delivery_hospital_course}" name="delivery_hospital_course[]" id="delivery_hospital_course4" value="4" class="form-check-input" />
							<label for="delivery_hospital_course4" class="form-check-label">เป็นผู้ป่วยเก่า</label>
						</div>
						<div class="form-check">
							<input type="checkbox" data-record-value="{record_delivery_hospital_course}" name="delivery_hospital_course[]" id="delivery_hospital_course5" value="5" class="form-check-input" />
							<label for="delivery_hospital_course5" class="form-check-label">เป็นความต้องการของญาติ</label>
						</div>

					</div>
				</div>
				<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='screening_level'>7.3 ระดับการคัดกรอง ณ แผนกอุบัติเหตุและฉุกเฉิน โรงพยาบาลที่นำส่ง (คัดแยกตามแนวทาง Emergency severity index; ESI) <label style="color:#e32">*</label>:</label>
						<div class="form-check">
							<input type="radio" name="screening_level" id="screening_level1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_screening_level}" />
							<label class="form-check-label" for="screening_level1">สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation)</label>
						</div>
						<div class="form-check">
							<input type="radio" name="screening_level" id="screening_level2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_screening_level}" />
							<label class="form-check-label" for="screening_level2">สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency)</label>
						</div>
						<div class="form-check">
							<input type="radio" name="screening_level" id="screening_level3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_screening_level}" />
							<label class="form-check-label" for="screening_level3">สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency)</label>
						</div>
						<div class="form-check">
							<input type="radio" name="screening_level" id="screening_level4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_screening_level}" />
							<label class="form-check-label" for="screening_level4">สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency)</label>
						</div>
						<div class="form-check">
							<input type="radio" name="screening_level" id="screening_level5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_screening_level}" />
							<label class="form-check-label" for="screening_level5">สีขาว ผู้ป่วยทั่วไป (Non-Urgency)</label>
						</div>

					</div>
				</div> -->
				
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='resuscitation'>7.4 การ Resuscitation ณ แผนกอุบัติเหตุและฉุกเฉิน <label style="color:#e32">*</label>:</label><br />
						<div class="form-check form-check-inline">
							<input type="radio" name="resuscitation" id="resuscitation1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_resuscitation}" />
							<label class="form-check-label" for="resuscitation1">ไม่ทำ</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="resuscitation" id="resuscitation2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_resuscitation}" />
							<label class="form-check-label" for="resuscitation2">ทำ</label>
						</div>

					</div>
				</div>
				<hr/>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label for='resuscitation'> 7.5 การประเมินการรักษาของทีมปฏิบัติการแพทย์ฉุกเฉิน (แผนกอุบัติเหตุและฉุกเฉินเป็นผู้ประเมิน) :</label><br />

					<div class='form-group'>
						<label for='respiratory_system'>7.5.1 ระบบทางเดินหายใจ <label style="color:#e32">*</label> :</label>

						<div class="form-check">
							<input type="radio" name="respiratory_system" id="respiratory_system1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_respiratory_system}" />
							<label class="form-check-label" for="respiratory_system1">ไม่จำเป็น</label>
						</div>
						<div class="form-check">
							<input type="radio" name="respiratory_system" id="respiratory_system2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_respiratory_system}" />
							<label class="form-check-label" for="respiratory_system2">ไม่ได้ทำ</label>
						</div>
						<div class="form-check">
							<input type="radio" name="respiratory_system" id="respiratory_system3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_respiratory_system}" />
							<label class="form-check-label" for="respiratory_system3">ทำและเหมาะสม</label>
						</div>
						<div class="form-check">
							<input type="radio" name="respiratory_system" id="respiratory_system4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_respiratory_system}" />
							<label class="form-check-label" for="respiratory_system4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
						</div>

						<div class="form-check">
							<input type="text" placeholder="ระบุ……" class="form-control " id="respiratory_system_remark" name="respiratory_system_remark" value="{record_respiratory_system_remark}" />
						</div>

					</div>
				</div>


				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='water_supply'>7.5.2 การให้สารน้ำ <label style="color:#e32">*</label>:</label>


						<div class="form-check">
							<input type="radio" name="water_supply" id="water_supply1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_water_supply}" />
							<label class="form-check-label" for="water_supply1">ไม่จำเป็น</label>
						</div>
						<div class="form-check">
							<input type="radio" name="water_supply" id="water_supply2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_water_supply}" />
							<label class="form-check-label" for="water_supply2">ไม่ได้ทำ</label>
						</div>
						<div class="form-check">
							<input type="radio" name="water_supply" id="water_supply3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_water_supply}" />
							<label class="form-check-label" for="water_supply3">ทำและเหมาะสม</label>
						</div>
						<div class="form-check">
							<input type="radio" name="water_supply" id="water_supply4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_water_supply}" />
							<label class="form-check-label" for="water_supply4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
						</div>

						<div class="form-check">
							<input type="text" placeholder="ระบุ……" class="form-control " id="water_supply_remark" name="water_supply_remark" value="{record_water_supply_remark}" />
						</div>

					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='hemostasis'>7.5.3 การห้ามเลือด <label style="color:#e32">*</label>:</label>


						<div class="form-check">
							<input type="radio" name="hemostasis" id="hemostasis1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_hemostasis}" />
							<label class="form-check-label" for="hemostasis1">ไม่จำเป็น</label>
						</div>
						<div class="form-check">
							<input type="radio" name="hemostasis" id="hemostasis2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_hemostasis}" />
							<label class="form-check-label" for="hemostasis2">ไม่ได้ทำ</label>
						</div>
						<div class="form-check">
							<input type="radio" name="hemostasis" id="hemostasis3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_hemostasis}" />
							<label class="form-check-label" for="hemostasis3">ทำและเหมาะสม</label>
						</div>
						<div class="form-check">
							<input type="radio" name="hemostasis" id="hemostasis4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_hemostasis}" />
							<label class="form-check-label" for="hemostasis4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
						</div>
						<div class="form-check">
							<input type="text" placeholder="ระบุ……" class="form-control " id="hemostasis_remark" name="hemostasis_remark" value="{record_hemostasis_remark}" />
						</div>


					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<label for='splint'>7.5.4 การดามกระดูก <label style="color:#e32">*</label>:</label>
						<div class="form-check">
							<input type="radio" name="splint" id="splint1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_splint}" />
							<label class="form-check-label" for="splint1">ไม่จำเป็น</label>
						</div>
						<div class="form-check">
							<input type="radio" name="splint" id="splint2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_splint}" />
							<label class="form-check-label" for="splint2">ไม่ได้ทำ</label>
						</div>
						<div class="form-check">
							<input type="radio" name="splint" id="splint3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_splint}" />
							<label class="form-check-label" for="splint3">ทำและเหมาะสม</label>
						</div>
						<div class="form-check">
							<input type="radio" name="splint" id="splint4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_splint}" />
							<label class="form-check-label" for="splint4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
						</div>

						<div class="form-check">
							<input type="text" placeholder="ระบุ……" class="form-control " id="splint_remark" name="splint_remark" value="{record_splint_remark}" />
						</div>


					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class='form-group'>
						<div class='col-sm-offset-2 col-sm-10'>
							<!-- <button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button> -->

						</div>
					</div>

					<input type="hidden" name="encrypt_id" value="{encrypt_id}" />

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
						<!-- <div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
						<div class="col-sm-12"> -->
						<input type="hidden" class="form-control" id="edit_remark" value="บันทึกข้อมูล">
						<!-- </div> -->
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