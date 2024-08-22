<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>tb_employee</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='emp_id'>emp_id  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="emp_id" name="emp_id" value="{record_emp_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='name_id'>รหัสPR  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="name_id" name="name_id" value="{record_name_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='code_id'>code_id  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="code_id" name="code_id" value="{record_code_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='emp_barcode'>รหัสลงเวลา  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="emp_barcode" name="emp_barcode" value="{record_emp_barcode}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='rf_branch_id'>สาขา  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="rf_branch_id" name="rf_branch_id" value="{record_rf_branch_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='rf_company'>บริษัท  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="rf_company" name="rf_company" value="{record_rf_company}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='rf_pre_id'>คำนำหน้า  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="rf_pre_id" name="rf_pre_id" value="{record_rf_pre_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='emp_name'>ชื่อ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="emp_name" name="emp_name" value="{record_emp_name}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='emp_surname'>นามสกุล  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="emp_surname" name="emp_surname" value="{record_emp_surname}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='birthday'>วันเกิด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control  datepicker" id="birthday" name="birthday" value="{record_birthday}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='start_date'>วันที่ทำงาน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control  datepicker" id="start_date" name="start_date" value="{record_start_date}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='quit_date'>วันที่ลาออก  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control  datepicker" id="quit_date" name="quit_date" value="{record_quit_date}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='year_experience'>อายุงาน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="year_experience" name="year_experience" value="{record_year_experience}"  />
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_emp_id" value="{encrypt_emp_id}" />


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
