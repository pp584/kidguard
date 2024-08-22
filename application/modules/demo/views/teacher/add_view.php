<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Teacher</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="prefix_name">คำนำหน้าชื่อ  :</label>
					<div class="col-sm-10">
						<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="prefix_name3">นาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="prefix_name4">นางสาว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="prefix_name5">นาง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="firstname">ชื่อ  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="firstname" name="firstname" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="lastname">นามสกุล  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="lastname" name="lastname" value=""  />
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
