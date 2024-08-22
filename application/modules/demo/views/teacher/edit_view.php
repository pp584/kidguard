<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>tb_teacher</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='id'>id  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="id" name="id" value="{record_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='prefix_name'>คำนำหน้าชื่อ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name3"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_prefix_name}" />
<label class="form-check-label" for="prefix_name3">นาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name4"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_prefix_name}" />
<label class="form-check-label" for="prefix_name4">นางสาว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="prefix_name" id="prefix_name5"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_prefix_name}" />
<label class="form-check-label" for="prefix_name5">นาง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='firstname'>ชื่อ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="firstname" name="firstname" value="{record_firstname}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='lastname'>นามสกุล  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="lastname" name="lastname" value="{record_lastname}"  />
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_id" value="{encrypt_id}" />


			</form>
		</div> <!--card-body-->
	</div> <!--card-->

<!-- Modal -->
<div class='modal fade' id='editModal' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
			<div class='modal-header'>
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
				<button type='button' class='btn btn-default' data-dismiss='modal'>ปิด</button>
				<button type='button' class='btn btn-primary' id='btnSaveEdit'>&nbsp;บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>
