<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">1. ข้อมูลหน่วยบริการ </span><span class="text-medium"></span></div>
			<div class="card-body">
				<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-home"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/service_information/add">1. ข้อมูลหน่วยบริการ</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-car"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/time_distance/add">2. ข้อมูลเวลาและระยะทาง</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-id"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-note"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/add">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-gleam"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/add">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-user"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/add">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-attention"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/add">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><i class="pe-7s-smile"></i></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/add">8. ผลลัพธ์</a></h4>
					</div>
				</div>
			</div>
		</div>
		<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
			{csrf_protection_field}
			<div class="form-group">
				<label class="col-sm-2 control-label" for="service_unit_name">หน่วยบริการ :</label>
				<div class="col-sm-10">
					<select id="service_unit_name" name="service_unit_name" value="">
						<option value="">- เลือก หน่วยบริการ -</option>
						{services_service_unit_name_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="operating_command">ปฏิบัติการที่ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="operating_command" name="operating_command" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="zone_area">พื้นที่โซน :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="zone_area" name="zone_area" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="police_station">สน :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="police_station" name="police_station" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="operating_number">เลขที่ปฏิบัติการ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="operating_number" name="operating_number" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="regis_date">วันที่ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control  datepicker" id="regis_date" name="regis_date" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="performance">ผลการปฏิบัติ :</label>
				<div class="col-sm-10">

					<div class="form-check form-check-inline">
						<input type="radio" name="performance" id="performance1" value="1" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="performance1">พบเหตุ</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="performance" id="performance2" value="2" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="performance2">ไม่พบเหตุ</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="performance" id="performance3" value="3" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="performance3">ปฏิบัติการ</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="performance" id="performance4" value="4" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="performance4">ในพื้นที่</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="performance" id="performance5" value="5" class="form-check-input" autocomplete="off" />
						<label class="form-check-label" for="performance5">นอกพื้นที่</label>
					</div>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="locale">สถานที่เกิดเหตุ :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="locale" name="locale" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="event">เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC) :</label>
				<div class="col-sm-10">

					<input type="text" class="form-control " id="event" name="event" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="create_by_userid">สร้างโดย :</label>
				<div class="col-sm-10">
					<select readonly="true" id="create_by_userid" name="create_by_userid" value="{source_create_by_userid}">
						<option value="">- เลือก สร้างโดย -</option>
						{tb_members_create_by_userid_option_list}
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="hidden" id="add_encrypt_id" name="encrypt_service_information_id" />
					<input type="hidden" id="detail_ref_service_information_id" />
					<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
						&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
					</button>
					<a id="btnGotoEdit" class="btn btn-warning btn-lg" style="display:none" href="#" title="คลิกที่นี่เพื่อแก้ไขข้อมูลหลัก">
						<i class="fa fa-edit"></i> แก้ไขข้อมูล
					</a>
					<button type="button" id="btnAddListDialog" class="btn btn-info btn-lg" style="display:none" title="คลิกที่นี่เพื่อเพิ่มข้อมูลตารางรายการ">
						<i class="fa fa-arrow-circle-down"></i> เพิ่มรายการ
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
<div class="table-responsive">
	<table class="table table-hover table-bordered">
		<thead class="thead-light">
			<tr>
				<th width="20px;">#</th>
				<th>ID</th>
				<th>service_information_id</th>
				<th>เวลาที่มีผู้พบเห็นเหตุการณ์ </th>
				<th>เวลาที่ได้รับแจ้งเหตุ </th>
				<th>เวลาที่สั่งการ </th>
				<th>เวลาที่ออกจากฐาน</th>
				<th>เวลาที่ไปถึงที่เกิดเหตุ </th>
				<th>เวลาที่ออกจากที่เกิดเหตุ</th>
				<th>เวลาที่ไปถึงโรงพยาบาล</th>
				<th>เวลาที่ถึงฐาน </th>
				<th>ระยะทางจากฐานไปถึงที่เกิดเหตุ</th>
				<th>ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล </th>
				<th class="text-center" style="width:200px">จัดการข้อมูล</th>
			</tr>
		</thead>
		<tbody id="tbody_detail_list">
		</tbody>
	</table>
</div>

<!-- Modal Form Add List -->
<div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="addListModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title" id="addListModalLabel">เพิ่มรายการ time_distance</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body p-3">
				<form class="form-horizontal" id="formAddList" accept-charset="utf-8">
					{csrf_protection_field}
					<div class="form-group row d-none">
						<label class="col-sm-3 control-label text-right" for="service_information_id">Service_information_id :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_service_information_id" name="service_information_id" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="incident_time">เวลาที่มีผู้พบเห็นเหตุการณ์ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_incident_time" name="incident_time" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="incident_time_recrive">เวลาที่ได้รับแจ้งเหตุ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_incident_time_recrive" name="incident_time_recrive" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="time_order">เวลาที่สั่งการ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_time_order" name="time_order" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="base_time_start">เวลาที่ออกจากฐาน :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_base_time_start" name="base_time_start" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="base_time_stop">เวลาที่ไปถึงที่เกิดเหตุ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_base_time_stop" name="base_time_stop" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="time_of_leaving">เวลาที่ออกจากที่เกิดเหตุ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_time_of_leaving" name="time_of_leaving" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="time_to_hospital">เวลาที่ไปถึงโรงพยาบาล :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_time_to_hospital" name="time_to_hospital" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="base_time_finish">เวลาที่ถึงฐาน :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_base_time_finish" name="base_time_finish" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="distance_base_scene">ระยะทางจากฐานไปถึงที่เกิดเหตุ :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_distance_base_scene" name="distance_base_scene" value="" />
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-3 control-label text-right" for="distance_to_hospital">ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล :</label>
						<div class="col-sm-9">
							<input type="text" class="form-control " id="detail_distance_to_hospital" name="distance_to_hospital" value="" />
						</div>
					</div>
					<input type="hidden" id="detail_encrypt_itme_distance_id" name="encrypt_itme_distance_id" />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				<button type="button" class="btn btn-primary" id="btnConfirmSaveList"><i class="fa fa-save"></i>&nbsp;บันทึกข้อมูล&nbsp;</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="confirmDelListModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelListModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title" id="confirmDelModalListLabel">ยืนยันการลบข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<h4 class="text-center">*** ท่านต้องการลบข้อมูลแถวที่ <span id="xrow"></span> ??? ***</h4>
				<div id="div_del_list_detail"></div>
				<form id="formDeleteList">
					<div class="form-group">
						<div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="delete_remark">
						</div>
					</div>
					<input type="hidden" id="detail_del_encrypt_itme_distance_id" name="encrypt_itme_distance_id" />

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				<button type="button" class="btn btn-danger" id="btn_confirm_delete_list">Delete</button>
			</div>
		</div>
	</div>
</div>