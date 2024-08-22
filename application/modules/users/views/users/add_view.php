<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title">
			<i class="fa fa-plus-square"></i>
			เพิ่มข้อมูลผู้ใช้งาน
		</h3>
	</div>
	<div class="card-body">
		<div class="col-sm-12 col-md-12">
			<div class="pull-right text-right">
				<a href="{page_url}/import_excel_form" target="_blank" class="btn btn-success btn-lg" data-toggle="tooltip" title="นำเข้าข้อมูล">
					<i class="fas fa-file-excel"></i></span> นำเข้า Excel
				</a>
			</div>
		</div>

		<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
			{csrf_protection_field}
			<div class="form-group">
				<label class="col-sm-2 control-label" for="username"> ชื่อผู้ใช้งาน :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="username" name="username" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">อีเมล :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="email" name="email" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="password">รหัสผ่าน :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="password" name="password" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="prefix">คำนำหน้า :<span style="color: red;">*</span></label>
				<div class="col-sm-10">
					<select id="prefix" name="prefix" value="">
						<option value="">-- เลือก คำนำหน้า --</option>
						{tb_members_prefix_prefix_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="firstname">ชื่อ :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="firstname" name="firstname" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="lastname">นามสกุล :<span style="color: red;">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control " id="lastname" name="lastname" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="sex">เพศ :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex1" value="1" class="form-check-input" autocomplete="off" data-record-value="1" />
						<label class="form-check-label" for="sex1">ชาย</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex2" value="2" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="sex2">หญิง</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="level">สิทธิ์การใช้งาน :<span style="color: red;">*</span></label>
				<div class="col-sm-10">
					<select id="level" name="level" value="">
						<option value="">-- เลือก สิทธิ์การใช้งาน --</option>
						{tb_members_level_level_option_list}
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="level">โปรดระบุจังหวัด :<span style="color: red;">*</span></label>
				<div class="col-sm-10">
					<select id="province_id" name="province_id" value="{record_province_id}">
						<option value="">-- เลือก จังหวัด --</option>
						<?php
						$result = $this->db->query("select * from provinces")->result();
						foreach ($result as $row) {

						?>
							<option value="<?= $row->id ?>"><?= $row->name_th ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="university_name">ชื่อสถานศึกษา :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="university_name" name="university_name" value="" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="tel_number">เบอร์โทรศัพท์ :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="tel_number" name="tel_number" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="line_id">ไอดี Line :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="line_id" name="line_id" value="" />
				</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-sm-2 control-label" for="department_id">อ้างอิง ชื่อสังกัด :</label>
				<div class="col-sm-10">
					<select id="department_id" name="department_id" value="">
						<option value="">- เลือก อ้างอิง ชื่อสังกัด -</option>
						{services_department_id_option_list}
					</select>
				</div>
			</div> -->

			<div class="form-group">
				<label class="col-sm-2 control-label" for="photo">ภาพประจำตัว :<span style="color: red;">*</span></label>
				<div class="col-sm-10">

					<div class="upload-box">
						<div class="hold input-group">
							<span class="btn-file"> คลิกเพื่อแนบไฟล์
								<input type="file" id="photo" name="photo" data-elem-preview="photo_preview" data-elem-label="photo_label" />
							</span><input class="form-control" id="photo_label" name="photo_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="{record_photo_label}" />
						</div>
					</div>
					{preview_photo}
					<input type="hidden" id="photo_old_path" name="photo_old_path" value="" />
					<div style="clear:both"></div>
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
	</div>
	<!--panel-body-->
</div>
<!--panel-->
</div>
<!--contrainer-->

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