<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>tb_address_list</strong></h3>
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
					<label class='col-sm-2 control-label' for='ref_student_id'>ไอดีอ้างอิง นักเรียน  :</label>
					<div class='col-sm-10'>
					<select id='ref_student_id' name='ref_student_id' value="{record_ref_student_id}" >
						<option value="">- เลือก ไอดีอ้างอิง นักเรียน -</option>
						{tb_student_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ref_geo_id'>ไอดีภาค  :</label>
					<div class='col-sm-10'>
					<select id='ref_geo_id' name='ref_geo_id' value="{record_ref_geo_id}" >
						<option value="">- เลือก ไอดีภาค -</option>
						{tb_addr_geography_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ref_province_id'>ไอดีจังหวัด  :</label>
					<div class='col-sm-10'>

						<select id="ref_province_id" name="ref_province_id" value="{record_ref_province_id}" >
							<option value="">- เลือก ไอดีจังหวัด -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ref_amphur_id'>ไอดีอำเภอ  :</label>
					<div class='col-sm-10'>

						<select id="ref_amphur_id" name="ref_amphur_id" value="{record_ref_amphur_id}" >
							<option value="">- เลือก ไอดีอำเภอ -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='ref_district_id'>ไอดีตำบล  :</label>
					<div class='col-sm-10'>

						<select id="ref_district_id" name="ref_district_id" value="{record_ref_district_id}" >
							<option value="">- เลือก ไอดีตำบล -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='zip_code'>รหัสไปรษณีย์  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="zip_code" name="zip_code" value="{record_zip_code}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='address'>เลขที่,หมู่ที่,หมู่บ้าน,อาคาร,ถนน,ซอย,อื่นๆ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="address" name="address" value="{record_address}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='remark'>คำอธิบายเพิ่มเติม  :</label>
					<div class='col-sm-10'>

						<textarea  class="form-control" id="remark" name="remark" rows="5">{record_remark}</textarea>
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
