<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Delivery_information</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_information_id">service_information_id  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="service_information_id" name="service_information_id" value="{source_service_information_id}" readonly="readonly" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="delivery_hospital">โรงพยาบาลที่นำส่ง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="delivery_hospital" id="delivery_hospital1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="delivery_hospital1">รัฐบาล</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="delivery_hospital" id="delivery_hospital2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="delivery_hospital2">เอกชน</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="delivery_hospital_course">เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ)  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input type="checkbox"  
name="delivery_hospital_course[]" id="delivery_hospital_course1"
value="1" class="form-check-input" />
<label for="delivery_hospital_course1" class="form-check-label">เหมาะสม สามารถให้การรักษาได้</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="delivery_hospital_course[]" id="delivery_hospital_course2"
value="2" class="form-check-input" />
<label for="delivery_hospital_course2" class="form-check-label">อยู่ใกล้</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="delivery_hospital_course[]" id="delivery_hospital_course3"
value="3" class="form-check-input" />
<label for="delivery_hospital_course3" class="form-check-label">มีสิทธิการรักษา</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="delivery_hospital_course[]" id="delivery_hospital_course4"
value="4" class="form-check-input" />
<label for="delivery_hospital_course4" class="form-check-label">เป็นผู้ป่วยเก่า</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="delivery_hospital_course[]" id="delivery_hospital_course5"
value="5" class="form-check-input" />
<label for="delivery_hospital_course5" class="form-check-label">เป็นความต้องการของญาติ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="screening_level">ระดับการคัดกรอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="screening_level" id="screening_level1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="screening_level1">สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation)</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="screening_level" id="screening_level2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="screening_level2">สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency)</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="screening_level" id="screening_level3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="screening_level3">สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency)</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="screening_level" id="screening_level4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="screening_level4">สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency)</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="screening_level" id="screening_level5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="screening_level5">สีขาว ผู้ป่วยทั่วไป (Non-Urgency)</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="resuscitation">การ Resuscitation  ณ แผนกอุบัติเหตุและฉุกเฉิน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="resuscitation" id="resuscitation1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="resuscitation1">ไม่ทำ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="resuscitation" id="resuscitation2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="resuscitation2">ทำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="respiratory_system">ระบบทางเดินหายใจ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="respiratory_system" id="respiratory_system1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="respiratory_system1">ไม่จำเป็น</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="respiratory_system" id="respiratory_system2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="respiratory_system2">ไม่ได้ทำ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="respiratory_system" id="respiratory_system3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="respiratory_system3">ทำและเหมาะสม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="respiratory_system" id="respiratory_system4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="respiratory_system4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="respiratory_system_remark">respiratory_system_remark  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="respiratory_system_remark" name="respiratory_system_remark" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="water_supply">การให้สารน้ำ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="water_supply" id="water_supply1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="water_supply1">ไม่จำเป็น</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="water_supply" id="water_supply2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="water_supply2">ไม่ได้ทำ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="water_supply" id="water_supply3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="water_supply3">ทำและเหมาะสม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="water_supply" id="water_supply4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="water_supply4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="water_supply_remark">water_supply_remark  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="water_supply_remark" name="water_supply_remark" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="hemostasis">การห้ามเลือด  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="hemostasis" id="hemostasis1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="hemostasis1">ไม่จำเป็น</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="hemostasis" id="hemostasis2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="hemostasis2">ไม่ได้ทำ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="hemostasis" id="hemostasis3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="hemostasis3">ทำและเหมาะสม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="hemostasis" id="hemostasis4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="hemostasis4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="hemostasis_remark">hemostasis_remark  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="hemostasis_remark" name="hemostasis_remark" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="splint">การดามกระดูก  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="splint" id="splint1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="splint1">ไม่จำเป็น</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="splint" id="splint2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="splint2">ไม่ได้ทำ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="splint" id="splint3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="splint3">ทำและเหมาะสม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="splint" id="splint4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="splint4">ทำแต่ไม่เหมาะสม(ระบุ……)</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="splint_remark">splint_remark  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="splint_remark" name="splint_remark" value=""  />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" id="add_encrypt_id" />
						<button type="button" id="btnConfirmSave"
							class="btn btn-primary btn-lg" data-toggle="modal"
							data-target="#addModal" >
							&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
						</button>
					</div>
				</div>

			</form>
		</div> <!--panel-body-->
	</div> <!--panel-->
</div> <!--contrainer-->

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
