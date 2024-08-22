<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>patient_profile</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='patient_profile_id'>ID  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="patient_profile_id" name="patient_profile_id" value="{record_patient_profile_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='service_information_id'>service_information_id  :</label>
					<div class='col-sm-10'>
					<select id='service_information_id'  name='service_information_id' value="{record_service_information_id}" >
						<option value="">- เลือก service_information_id -</option>
						{service_information_service_information_id_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ohac_id'>รหัส OHAC-ID  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="ohac_id" name="ohac_id" value="{record_ohac_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='patient_name'>ชื่อผู้ป่วย  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="patient_name" name="patient_name" value="{record_patient_name}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='age'>อายุ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="age" name="age" value="{record_age}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='sex'>เพศ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="sex1"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_sex}" />
<label class="form-check-label" for="sex1">ชาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="sex2"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_sex}" />
<label class="form-check-label" for="sex2">หญิง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='right_medical'>สิทธิการรักษา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="right_medical1"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_right_medical}" />
<label class="form-check-label" for="right_medical1">ไม่มีสิทธิรักษาพยาบาล</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="right_medical2"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_right_medical}" />
<label class="form-check-label" for="right_medical2">หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="right_medical3"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_right_medical}" />
<label class="form-check-label" for="right_medical3">สิทธิกรมบัญชีกลาง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="right_medical4"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_right_medical}" />
<label class="form-check-label" for="right_medical4">ประกันสังคม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="right_medical5"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_right_medical}" />
<label class="form-check-label" for="right_medical5">อื่น ๆ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='right_medical_remark'>อื่นๆ ระบุ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="right_medical_remark" name="right_medical_remark" value="{record_right_medical_remark}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='congenital_disease'>โรคประจำตัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="congenital_disease" id="congenital_disease1"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_congenital_disease}" />
<label class="form-check-label" for="congenital_disease1">มี</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="congenital_disease" id="congenital_disease2"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_congenital_disease}" />
<label class="form-check-label" for="congenital_disease2">ไม่มี</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='congenital_disease_patient'>โรคประจำตัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient1"
value="1" class="form-check-input" />
<label for="congenital_disease_patient1" class="form-check-label">Diabetes (เบาหวาน)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient2"
value="2" class="form-check-input" />
<label for="congenital_disease_patient2" class="form-check-label">Hypertension (ความดันโลหิตสูง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient3"
value="3" class="form-check-input" />
<label for="congenital_disease_patient3" class="form-check-label">Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient4"
value="4" class="form-check-input" />
<label for="congenital_disease_patient4" class="form-check-label">Respiratory disease (ระบบทางเดินหายใจ)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient5"
value="5" class="form-check-input" />
<label for="congenital_disease_patient5" class="form-check-label">Stroke/ CVA (หลอดเลือดในสมอง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient6"
value="6" class="form-check-input" />
<label for="congenital_disease_patient6" class="form-check-label">Renal disease (ไต)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient7"
value="7" class="form-check-input" />
<label for="congenital_disease_patient7" class="form-check-label">Cancer (มะเร็ง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient8"
value="8" class="form-check-input" />
<label for="congenital_disease_patient8" class="form-check-label">Dyslipidemia (ไขมันในเลือดสูง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_congenital_disease_patient}"
name="congenital_disease_patient[]" id="congenital_disease_patient9"
value="9" class="form-check-input" />
<label for="congenital_disease_patient9" class="form-check-label">อื่นๆ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='congenital_disease_patient_remark'>อื่นๆ ระบุ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="congenital_disease_patient_remark" name="congenital_disease_patient_remark" value="{record_congenital_disease_patient_remark}"  />
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_patient_profile_id" value="{encrypt_patient_profile_id}" />


			</form>
		</div> <!--card-body-->
	</div> <!--card-->

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
				<form class="form-horizontal" onsubmit="return false;" >
					<div class="form-group">
						<div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="edit_remark">
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
