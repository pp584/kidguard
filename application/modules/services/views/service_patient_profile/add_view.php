<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Service_patient_profile</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_unit_name">หน่วยบริการ  :</label>
					<div class="col-sm-10">
					<select  id="service_unit_name" name="service_unit_name" value="">
						<option value="">- เลือก หน่วยบริการ -</option>
						{services_service_unit_name_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="operating_command">ปฏิบัติการที่  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="operating_command" name="operating_command" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="zone_area">พื้นที่โซน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="zone_area" name="zone_area" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="police_station">สน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="police_station" name="police_station" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="operating_number">เลขที่ปฏิบัติการ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="operating_number" name="operating_number" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="regis_date">วันที่  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="regis_date" name="regis_date" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="performance">ผลการปฏิบัติ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance1">พบเหตุ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance2">ไม่พบเหตุ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance3">ปฏิบัติการ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance4">ในพื้นที่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance5">นอกพื้นที่</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="locale">สถานที่เกิดเหตุ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="locale" name="locale" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="event">เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="event" name="event" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="create_by_userid">สร้างโดย  :</label>
					<div class="col-sm-10">
					<select readonly="true" id="create_by_userid" name="create_by_userid" value="{source_create_by_userid}">
						<option value="">- เลือก สร้างโดย -</option>
						{tb_members_create_by_userid_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" id="add_encrypt_id" name="encrypt_service_information_id" />
						<input type="hidden" id="detail_ref_service_information_id" />
						<button type="button" id="btnConfirmSave"
							class="btn btn-primary btn-lg" data-toggle="modal"
							data-target="#addModal" >
							&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
						</button>
						<a id="btnGotoEdit" class="btn btn-warning btn-lg" 
							style="display:none" href="#" title="คลิกที่นี่เพื่อแก้ไขข้อมูลหลัก">
							<i class="fa fa-edit"></i> แก้ไขข้อมูล
						</a>
						<button type="button" id="btnAddListDialog" class="btn btn-info btn-lg" 
							style="display:none" title="คลิกที่นี่เพื่อเพิ่มข้อมูลตารางรายการ">
							<i class="fa fa-arrow-circle-down"></i> เพิ่มรายการ
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
<div class="table-responsive">
	<table class="table table-hover table-bordered">
		<thead class="thead-light">
			<tr>
				<th width="20px;">#</th>
				<th>ID</th>
				<th>service_information_id</th>
				<th>รหัส OHAC-ID</th>
				<th>ชื่อผู้ป่วย </th>
				<th>อายุ</th>
				<th>เพศ[1=ชาย,2=หญิง]</th>
				<th>สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]</th>
				<th>อื่นๆ ระบุ </th>
				<th>โรคประจำตัว[1=มี,2=ไม่มี]</th>
				<th>โรคประจำตัว[1=Diabetes (เบาหวาน),2=Hypertension (ความดันโลหิตสูง),3=Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ),4=Respiratory disease (ระบบทางเดินหายใจ),5=Stroke/ CVA (หลอดเลือดในสมอง),6=Renal disease (ไต),7=Cancer (มะเร็ง),8=Dyslipidemia (ไขมันในเลือดสูง),9=อื่นๆ]</th>
				<th>อื่นๆ ระบุ </th>
				<th class="text-center" style="width:200px">จัดการข้อมูล</th>
			</tr>
		</thead>
		<tbody id="tbody_detail_list">
		</tbody>
	</table>
</div>

<!-- Modal Form Add List -->
<div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="addListModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title" id="addListModalLabel">เพิ่มรายการ patient_profile</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body p-3">
				<form class="form-horizontal" id="formAddList" accept-charset="utf-8">
					{csrf_protection_field}
					<div class="form-group row d-none">
						<label class="col-sm-3 control-label text-right" for="service_information_id">Service_information_id  :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_service_information_id" name="service_information_id" value=""  />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="ohac_id">รหัส OHAC-ID  :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_ohac_id" name="ohac_id" value=""  />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="patient_name">ชื่อผู้ป่วย   :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_patient_name" name="patient_name" value=""  />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="age">อายุ  :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_age" name="age" value=""  />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="sex">เพศ[1=ชาย,2=หญิง]  :</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="detail_sex1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_sex1">ชาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="detail_sex2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_sex2">หญิง</label>
</div>

						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="right_medical">สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]  :</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="detail_right_medical1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_right_medical1">ไม่มีสิทธิรักษาพยาบาล</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="detail_right_medical2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_right_medical2">หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="detail_right_medical3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_right_medical3">สิทธิกรมบัญชีกลาง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="detail_right_medical4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_right_medical4">ประกันสังคม</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="right_medical" id="detail_right_medical5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_right_medical5">อื่น ๆ</label>
</div>

						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="right_medical_remark">อื่นๆ ระบุ   :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_right_medical_remark" name="right_medical_remark" value=""  />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="congenital_disease">โรคประจำตัว[1=มี,2=ไม่มี]  :</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
<input  type="radio"
									name="congenital_disease" id="detail_congenital_disease1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_congenital_disease1">มี</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="congenital_disease" id="detail_congenital_disease2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="detail_congenital_disease2">ไม่มี</label>
</div>

						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="congenital_disease_patient">โรคประจำตัว[1=Diabetes (เบาหวาน),2=Hypertension (ความดันโลหิตสูง),3=Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ),4=Respiratory disease (ระบบทางเดินหายใจ),5=Stroke/ CVA (หลอดเลือดในสมอง),6=Renal disease (ไต),7=Cancer (มะเร็ง),8=Dyslipidemia (ไขมันในเลือดสูง),9=อื่นๆ]  :</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient1"
value="1" class="form-check-input" />
<label for="detail_congenital_disease_patient1" class="form-check-label">Diabetes (เบาหวาน)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient2"
value="2" class="form-check-input" />
<label for="detail_congenital_disease_patient2" class="form-check-label">Hypertension (ความดันโลหิตสูง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient3"
value="3" class="form-check-input" />
<label for="detail_congenital_disease_patient3" class="form-check-label">Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient4"
value="4" class="form-check-input" />
<label for="detail_congenital_disease_patient4" class="form-check-label">Respiratory disease (ระบบทางเดินหายใจ)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient5"
value="5" class="form-check-input" />
<label for="detail_congenital_disease_patient5" class="form-check-label">Stroke/ CVA (หลอดเลือดในสมอง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient6"
value="6" class="form-check-input" />
<label for="detail_congenital_disease_patient6" class="form-check-label">Renal disease (ไต)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient7"
value="7" class="form-check-input" />
<label for="detail_congenital_disease_patient7" class="form-check-label">Cancer (มะเร็ง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient8"
value="8" class="form-check-input" />
<label for="detail_congenital_disease_patient8" class="form-check-label">Dyslipidemia (ไขมันในเลือดสูง)</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="congenital_disease_patient[]" id="detail_congenital_disease_patient9"
value="9" class="form-check-input" />
<label for="detail_congenital_disease_patient9" class="form-check-label">อื่นๆ</label>
</div>

						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="congenital_disease_patient_remark">อื่นๆ ระบุ   :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_congenital_disease_patient_remark" name="congenital_disease_patient_remark" value=""  />
						</div>
					</div>
					<input type="hidden" id="detail_encrypt_patient_profile_id" name="encrypt_patient_profile_id" />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				<button type="button" class="btn btn-primary" id="btnConfirmSaveList"><i class="fa fa-save"></i>&nbsp;บันทึกข้อมูล&nbsp;</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="confirmDelListModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelListModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title" id="confirmDelModalListLabel">ยืนยันการลบข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<h4 class="text-center">***  ท่านต้องการลบข้อมูลแถวที่ <span id="xrow"></span> ???  ***</h4>
				<div id="div_del_list_detail"></div>
				<form id="formDeleteList">
					<div class="form-group">
						<div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="delete_remark">
						</div>
					</div>
					<input type="hidden" id="detail_del_encrypt_patient_profile_id" name="encrypt_patient_profile_id" />

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				<button type="button" class="btn btn-danger" id="btn_confirm_delete_list" >Delete</button>
			</div>
		</div>
	</div>
</div>
