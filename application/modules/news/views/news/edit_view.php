<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>cms_posts</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='id'>ID  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="id" name="id" value="{record_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='image'>รูปภาพ  :</label>
					<div class='col-sm-10'>

						<div class="upload-box">
							<div class="hold input-group">
								<span class="btn-file"> คลิกเพื่อแนบไฟล์
									<input type="file" id="image" name="image" data-elem-preview="image_preview" data-elem-label="image_label" />
								</span><input class="form-control" id="image_label" name="image_label" 
									placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด"  readonly="readonly" value="{record_image_label}" />
							</div>
						</div>
						 {preview_image}
						<input type="hidden" id="image_old_path" name="image_old_path" value="{record_image}" />
						<div style="clear:both"></div>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='title'>เรื่อง  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="title" name="title" value="{record_title}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='message'>รายละเอียด  :</label>
					<div class='col-sm-10'>

						<textarea  class="form-control ck_text_editor" id="message" name="message" rows="5">{record_message}</textarea>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='category_id'>หมวดหมู่  :</label>
					<div class='col-sm-10'>
					<select id='category_id'  name='category_id' value="{record_category_id}" >
						<option value="">- เลือก หมวดหมู่ -</option>
						{cms_category_category_id_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='userid'>ผู้เขียน  :</label>
					<div class='col-sm-10'>
					<select id='userid' readonly="true" name='userid' value="{record_userid}" >
						<option value="">- เลือก ผู้เขียน -</option>
						{tb_members_userid_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='status'>สถานะ  :</label>
					<div class='col-sm-10'>

						<select id="status" name="status" value="{record_status}" >
							<option value="">- เลือก สถานะ -</option>
							<option value="published">published</option>
							<option value="draft">draft</option>
							<option value="archived]"> archived]</option>
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
