<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Patient_profile</strong></h3>
	</div>
	<div class="card-body">
		<div class="col-sm-12 col-md-12">
			<div class="pull-right text-right">
				<a href="{page_url}/import_excel_form" target="_blank" class="btn btn-success btn-lg" data-toggle="tooltip" title="นำเข้าข้อมูล">
					<i class="fas fa-file-excel"></i></span> นำเข้า Excel
				</a>
			</div>
		</div>

		<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
			{csrf_protection_field}
			<div class="form-group">
				<label class="col-sm-2 control-label" for="service_information_id">service_information_id :</label>
				<div class="col-sm-10">
					<select readonly="true" id="service_information_id" name="service_information_id" value="{source_service_information_id}">
						<option value="">- เลือก service_information_id -</option>
						{service_information_service_information_id_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="ohac_id">รหัส OHAC-ID :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="ohac_id" name="ohac_id" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="patient_name">ชื่อผู้ป่วย :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="patient_name" name="patient_name" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="age">อายุ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="age" name="age" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="sex">เพศ :</label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex1" value="1" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="sex1">ชาย</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex2" value="2" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="sex2">หญิง</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="right_medical">สิทธิการรักษา :</label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="radio" name="right_medical" id="right_medical1" value="1" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="right_medical1">ไม่มีสิทธิรักษาพยาบาล</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="right_medical" id="right_medical2" value="2" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="right_medical2">หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="right_medical" id="right_medical3" value="3" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="right_medical3">สิทธิกรมบัญชีกลาง</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="right_medical" id="right_medical4" value="4" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="right_medical4">ประกันสังคม</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="right_medical" id="right_medical5" value="5" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="right_medical5">อื่น ๆ</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="right_medical_remark">อื่นๆ ระบุ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="right_medical_remark" name="right_medical_remark" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="congenital_disease">โรคประจำตัว :</label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="radio" name="congenital_disease" id="congenital_disease1" value="1" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="congenital_disease1">มี</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="congenital_disease" id="congenital_disease2" value="2" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="congenital_disease2">ไม่มี</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="congenital_disease_patient">โรคประจำตัว :</label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient1" value="1" class="form-check-input" />
						<label for="congenital_disease_patient1" class="form-check-label">Diabetes (เบาหวาน)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient2" value="2" class="form-check-input" />
						<label for="congenital_disease_patient2" class="form-check-label">Hypertension (ความดันโลหิตสูง)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient3" value="3" class="form-check-input" />
						<label for="congenital_disease_patient3" class="form-check-label">Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient4" value="4" class="form-check-input" />
						<label for="congenital_disease_patient4" class="form-check-label">Respiratory disease (ระบบทางเดินหายใจ)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient5" value="5" class="form-check-input" />
						<label for="congenital_disease_patient5" class="form-check-label">Stroke/ CVA (หลอดเลือดในสมอง)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient6" value="6" class="form-check-input" />
						<label for="congenital_disease_patient6" class="form-check-label">Renal disease (ไต)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient7" value="7" class="form-check-input" />
						<label for="congenital_disease_patient7" class="form-check-label">Cancer (มะเร็ง)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient8" value="8" class="form-check-input" />
						<label for="congenital_disease_patient8" class="form-check-label">Dyslipidemia (ไขมันในเลือดสูง)</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" name="congenital_disease_patient[]" id="congenital_disease_patient9" value="9" class="form-check-input" />
						<label for="congenital_disease_patient9" class="form-check-label">อื่นๆ</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="congenital_disease_patient_remark">อื่นๆ ระบุ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="congenital_disease_patient_remark" name="congenital_disease_patient_remark" value="" />
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