<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Verify_information</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="master_ohca_id">master_ohca_id  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="master_ohca_id" name="master_ohca_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="service_unit_name">หน่วยบริการ  :</label>
					<div class="col-sm-10">
					<select  id="service_unit_name" name="service_unit_name" value="">
						<option value="">- เลือก หน่วยบริการ -</option>
						{service_information_service_unit_name_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="operating_command">ปฏิบัติการที่  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="operating_command" name="operating_command" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="zone_area">พื้นที่โซน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="zone_area" name="zone_area" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="police_station">สน  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="police_station" name="police_station" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="operating_number">เลขที่ปฏิบัติการ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="operating_number" name="operating_number" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="regis_date">วันที่  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control  datepicker" id="regis_date" name="regis_date" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="performance">ผลการปฏิบัติ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance1">พบเหตุ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance2">ไม่พบเหตุ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance3">ปฏิบัติการ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance4">ในพื้นที่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="performance" id="performance5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="performance5">นอกพื้นที่</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="locale">สถานที่เกิดเหตุ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="locale" name="locale" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="event">เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="event" id="event1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="event1">Choice 1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="event" id="event2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="event2">Choice 2</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="create_by_userid">สร้างโดย  :</label>
					<div class="col-sm-10">
					<select  id="create_by_userid" name="create_by_userid" value="">
						<option value="">- เลือก สร้างโดย -</option>
						{tb_members_create_by_userid_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="status">สถานะ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="status" id="status0"
									value="0" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="status0">ฉบับร่าง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="status" id="status1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="status1">เผยแพร่</label>
</div>

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
