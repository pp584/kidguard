<!--  [ View File name : edit_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลผู้ใช้งาน</h3>
	</div>
	<div class="card-body">
		<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
			{csrf_protection_field}
			<input type="hidden" name="submit_case" value="edit" />
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='userid'>userid :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>
					<input type="text" class="form-control " id="userid" name="userid" value="{record_userid}" readonly="readonly" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>ชื่อผู้ใช้งาน :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="username" name="username" value="{record_username}" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='email'>อีเมล :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="email" name="email" value="{record_email}" />
				</div>
			</div>

			<!-- <div class='form-group'>
				<label class='col-sm-2 control-label' for='password'>รหัสผ่าน :</label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="password" name="password" value="{record_password}" />
				</div>
			</div> -->

			<div class='form-group'>
				<label class='col-sm-2 control-label' for='prefix'>คำนำหน้า :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>
					<select id='prefix' name='prefix' value="{record_prefix}">
						<option value="">-- เลือก คำนำหน้า --</option>
						{tb_members_prefix_prefix_option_list}
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='firstname'>ชื่อ :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="firstname" name="firstname" value="{record_firstname}" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='lastname'>นามสกุล :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="lastname" name="lastname" value="{record_lastname}" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='sex'>เพศ :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_sex}" />
						<label class="form-check-label" for="sex1">ชาย</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="sex" id="sex2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_sex}" />
						<label class="form-check-label" for="sex2">หญิง</label>
					</div>

				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='level'>สิทธิ์การใช้งาน :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>
					<select id='level' name='level' value="{record_level}">
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

					<input type="text" class="form-control " id="university_name" name="university_name" value="{university_name}" />
				</div>
			</div>

			<div class='form-group'>
				<label class='col-sm-2 control-label' for='tel_number'>เบอร์โทรศัพท์ :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="tel_number" name="tel_number" value="{record_tel_number}" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='line_id'>ไอดี Line :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<input type="text" class="form-control " id="line_id" name="line_id" value="{record_line_id}" />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='photo'>ภาพประจำตัว :<span style="color: red;">*</span></label>
				<div class='col-sm-10'>

					<div class="upload-box">
						<div class="hold input-group">
							<span class="btn-file"> คลิกเพื่อแนบไฟล์
								<input type="file" id="photo" name="photo" data-elem-preview="photo_preview" data-elem-label="photo_label" />
							</span><input class="form-control" id="photo_label" name="photo_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="{record_photo_label}" />
						</div>
					</div>
					{preview_photo}
					<input type="hidden" id="photo_old_path" name="photo_old_path" value="{record_photo}" />
					<div style="clear:both"></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-sm-offset-2 col-sm-10'>
					<button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

				</div>
			</div>

			<input type="hidden" name="encrypt_userid" value="{encrypt_userid}" />


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
				<form class="form-horizontal" onsubmit="return false;">
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