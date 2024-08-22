<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข่าวสาร/กิจกรรม/ข่าวประชาสัมพันธ์</h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
			{csrf_protection_field}
			<div class="form-group">
				<label class="col-sm-2 control-label" for="image">รูปภาพ :</label>
				<div class="col-sm-10">

					<div class="upload-box">
						<div class="hold input-group">
							<span class="btn-file"> คลิกเพื่อแนบไฟล์
								<input type="file" id="image" name="image" data-elem-preview="image_preview" data-elem-label="image_label" />
							</span><input class="form-control" id="image_label" name="image_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="{record_image_label}" />
						</div>
					</div>
					{preview_image}
					<input type="hidden" id="image_old_path" name="image_old_path" value="" />
					<div style="clear:both"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="title">เรื่อง :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="title" name="title" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="message">รายละเอียด :</label>
				<div class="col-sm-10">

					<textarea class="form-control ck_text_editor" id="message" name="message" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="category_id">หมวดหมู่ :</label>
				<div class="col-sm-10">
					<select id="category_id" name="category_id" value="">
						<option value="">-- เลือก หมวดหมู่ --</option>
						{cms_category_category_id_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="userid">ผู้เขียน :</label>
				<div class="col-sm-10">
					<select readonly="true" id="userid" name="userid" value="{source_userid}">
						<option value="">-- เลือก ผู้เขียน --</option>
						{tb_members_userid_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="status">สถานะ :</label>
				<div class='col-sm-10'>
					<select id='status' name='status'>
						<option value="">-- เลือก สถานะ --</option>
						<option value="draft">draft</option>
						<option value="published">published</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="hidden" id="add_encrypt_id" />
					<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
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