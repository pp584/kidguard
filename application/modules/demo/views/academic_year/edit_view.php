<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>tb_info_academic_year</strong></h3>
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
					<label class='col-sm-2 control-label' for='thai_year'>ปีการศึกษา  :</label>
					<div class='col-sm-10'>
					<select id='thai_year' name='thai_year' value="{record_thai_year}" >
						<option value="">- เลือก ปีการศึกษา -</option>
						{tb_year_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='term'>เทอม  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="term" name="term" value="{record_term}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='class_room'>รหัสอ้างอิง ตารางห้อง  :</label>
					<div class='col-sm-10'>
					<select id='class_room' name='class_room' value="{record_class_room}" >
						<option value="">- เลือก รหัสอ้างอิง ตารางห้อง -</option>
						{tb_room_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ref_student_id'>รหัสอ้างอิง ตารางนักเรียน  :</label>
					<div class='col-sm-10'>
					<select id='ref_student_id' name='ref_student_id' value="{record_ref_student_id}" >
						<option value="">- เลือก รหัสอ้างอิง ตารางนักเรียน -</option>
						{tb_student_option_list}
					</select>
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
