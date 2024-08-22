<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Academic_year</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="thai_year">ปีการศึกษา  :</label>
					<div class="col-sm-10">
					<select id="thai_year" name="thai_year">
						<option value="">- เลือก ปีการศึกษา -</option>
						{tb_year_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="term">เทอม  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="term" name="term" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="class_room">รหัสอ้างอิง ตารางห้อง  :</label>
					<div class="col-sm-10">
					<select id="class_room" name="class_room">
						<option value="">- เลือก รหัสอ้างอิง ตารางห้อง -</option>
						{tb_room_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_student_id">รหัสอ้างอิง ตารางนักเรียน  :</label>
					<div class="col-sm-10">
					<select id="ref_student_id" name="ref_student_id">
						<option value="">- เลือก รหัสอ้างอิง ตารางนักเรียน -</option>
						{tb_student_option_list}
					</select>
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
			<div class="modal-header">
				<h4 class="modal-title" id="addModalLabel">บันทึกข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p class="alert alert-warning">ยืนยันการบันทึกข้อมูล ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				<button type="button" class="btn btn-primary" id="btnSave">&nbsp;บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>
