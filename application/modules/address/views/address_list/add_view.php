<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Address_list</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_student_id">ไอดีอ้างอิง นักเรียน  :</label>
					<div class="col-sm-10">
					<select id="ref_student_id" name="ref_student_id">
						<option value="">- เลือก ไอดีอ้างอิง นักเรียน -</option>
						{tb_student_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_geo_id">ไอดีภาค  :</label>
					<div class="col-sm-10">
					<select id="ref_geo_id" name="ref_geo_id">
						<option value="">- เลือก ไอดีภาค -</option>
						{tb_addr_geography_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_province_id">ไอดีจังหวัด  :</label>
					<div class="col-sm-10">
						<select id="ref_province_id" name="ref_province_id" value="" >
							<option value="">- เลือก ไอดีจังหวัด -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_amphur_id">ไอดีอำเภอ  :</label>
					<div class="col-sm-10">
						<select id="ref_amphur_id" name="ref_amphur_id" value="" >
							<option value="">- เลือก ไอดีอำเภอ -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ref_district_id">ไอดีตำบล  :</label>
					<div class="col-sm-10">
						<select id="ref_district_id" name="ref_district_id" value="" >
							<option value="">- เลือก ไอดีตำบล -</option>
							<option value="1">Choice 1</option>
							<option value="2">Choice 2</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="zip_code">รหัสไปรษณีย์  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="zip_code" name="zip_code" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="address">เลขที่,หมู่ที่,หมู่บ้าน,อาคาร,ถนน,ซอย,อื่นๆ  :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control " id="address" name="address" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="remark">คำอธิบายเพิ่มเติม  :</label>
					<div class="col-sm-10">
						<textarea  class="form-control" id="remark" name="remark" rows="5"></textarea>
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
