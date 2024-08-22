<!-- [ View File name : add_view.php ] -->
<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Ci_log_history</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_user">อ้างอิงตาราง User  :</label>
					<div class="col-sm-10">
					<select  id="log_edit_user" name="log_edit_user" value="">
						<option value="">- เลือก อ้างอิงตาราง User -</option>
						{tb_members_log_edit_user_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_datetime">เมื่อไหร่  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="log_edit_datetime" name="log_edit_datetime" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_remark">หมายเหตุ (ต้องระบุ)  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_edit_remark" name="log_edit_remark" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_table">ที่ตารางไหน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_edit_table" name="log_edit_table" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_table_pk_name">PK ฟิลด์  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_edit_table_pk_name" name="log_edit_table_pk_name" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_table_pk_value">PK ข้อมูล  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_edit_table_pk_value" name="log_edit_table_pk_value" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_edit_condition">เก็บเงื่อนไขการอัพเดต  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_edit_condition" name="log_edit_condition" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="log_login_id">อ้างอิงการ ตาราง Login  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="log_login_id" name="log_login_id" value=""  />
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