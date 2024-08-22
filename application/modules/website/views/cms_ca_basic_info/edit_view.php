<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลพื้นฐาน </h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='subject'>เรื่อง  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="subject" name="subject" value="{record_subject}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='detail'>รายละเอียด  :</label>
					<div class='col-sm-10'>

						<textarea  class="form-control" id="detail" name="detail" rows="5">{record_detail}</textarea>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='images'>รูปภาพ  :</label>
					<div class='col-sm-10'>

						<div class="upload-box">
							<div class="hold input-group">
								<span class="btn-file"> คลิกเพื่อแนบไฟล์
									<input type="file" id="images" name="images" data-elem-preview="images_preview" data-elem-label="images_label" />
								</span><input class="form-control" id="images_label" name="images_label" 
									placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด"  readonly="readonly" value="{record_images_label}" />
							</div>
						</div>
						 {preview_images}
						<input type="hidden" id="images_old_path" name="images_old_path" value="{record_images}" />
						<div style="clear:both"></div>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='create_by_userid'>สร้างโดย  :</label>
					<div class='col-sm-10'>
					<select id='create_by_userid' readonly="true" name='create_by_userid' value="{record_create_by_userid}" >
						<option value="">- เลือก สร้างโดย -</option>
						{tb_members_create_by_userid_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='files'>ไฟล์แนบ  :</label>
					<div class='col-sm-10'>

						<div class="upload-box">
							<div class="hold input-group">
								<span class="btn-file"> คลิกเพื่อแนบไฟล์
									<input type="file" id="files" name="files" data-elem-preview="files_preview" data-elem-label="files_label" />
								</span><input class="form-control" id="files_label" name="files_label" 
									placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด"  readonly="readonly" value="{record_files_label}" />
							</div>
						</div>
						 {preview_files}
						<input type="hidden" id="files_old_path" name="files_old_path" value="{record_files}" />
						<div style="clear:both"></div>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_ca_basic_info" value="{encrypt_ca_basic_info}" />


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
