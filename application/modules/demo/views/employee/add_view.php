<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Employee</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="name_id">รหัสPR  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="name_id" name="name_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="code_id">code_id  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="code_id" name="code_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="emp_barcode">รหัสลงเวลา  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="emp_barcode" name="emp_barcode" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rf_branch_id">สาขา  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="rf_branch_id" name="rf_branch_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rf_company">บริษัท  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="rf_company" name="rf_company" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="rf_pre_id">คำนำหน้า  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="rf_pre_id" name="rf_pre_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="emp_name">ชื่อ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="emp_name" name="emp_name" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="emp_surname">นามสกุล  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="emp_surname" name="emp_surname" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="birthday">วันเกิด  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="birthday" name="birthday" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 control-label" for="start_date">วันที่ทำงาน  : <span id="display_year_experience">-</span></label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="start_date" name="start_date" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="quit_date">วันที่ลาออก  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="quit_date" name="quit_date" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="year_experience">อายุงาน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="year_experience" name="year_experience" value=""  />
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
