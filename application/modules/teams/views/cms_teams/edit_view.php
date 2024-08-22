<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลทีมงานวิจัย</h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='photo'>photo  :</label>
					<div class='col-sm-10'>

						<div class="upload-box">
							<div class="hold input-group">
								<span class="btn-file"> คลิกเพื่อแนบไฟล์
									<input type="file" id="photo" name="photo" data-elem-preview="photo_preview" data-elem-label="photo_label" />
								</span><input class="form-control" id="photo_label" name="photo_label" 
									placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด"  readonly="readonly" value="{record_photo_label}" />
							</div>
						</div>
						 {preview_photo}
						<input type="hidden" id="photo_old_path" name="photo_old_path" value="{record_photo}" />
						<div style="clear:both"></div>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='name'>ชื่อ-นามสกุล  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="name" name="name" value="{record_name}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='company_name'>หน่วยงาน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="company_name" name="company_name" value="{record_company_name}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='tel'>เบอร์โทร  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="tel" name="tel" value="{record_tel}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='level'>ลำดับ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="level" name="level" value="{record_level}"  />
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_cms_team_id" value="{encrypt_cms_team_id}" />


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
