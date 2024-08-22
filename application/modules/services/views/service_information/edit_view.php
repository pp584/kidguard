<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">1. ข้อมูลหน่วยบริการ </span><span class="text-medium"></span></div>
			<div class="card-body">
				<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon">
								<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/1.png"></div>
							</div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/service_information/edit_data">1. ข้อมูลหน่วยบริการ</a></h4>
					</div>
					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/2.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/time_distance/edit_data">2. ข้อมูลเวลาและระยะทาง</a></h4>
					</div>
					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/3.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/4.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/edit_data">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/5.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/edit_data">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/6.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/edit_data">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/7.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/edit_data">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step ">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/edit_data">8. ผลลัพธ์</a></h4>
					</div>


					<div class="step">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/verify_information/edit_data">9. ยืนยันเผยแพร่ข้อมูล</a></h4>
					</div>


				</div>
			</div>

			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<div class="card-body">
					<div class="row gutters">
						<input type="hidden" name="submit_case" value="edit" />
						<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{record_service_information_id}" readonly="readonly" />

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='service_unit_name'>1.1 หน่วยบริการ <label style="color:#e32">*</label> :</label>
								<select id='service_unit_name' name='service_unit_name' value="{record_service_unit_name}">
									<option value="">- เลือก หน่วยบริการ -</option>
									{services_service_unit_name_option_list}
								</select>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='operating_command'>1.2 ปฏิบัติการที่ <label style="color:#e32">*</label> :</label>


								<input type="text" class="form-control " id="operating_command" name="operating_command" value="{record_operating_command}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='zone_area'>1.3 พื้นที่โซน  <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="zone_area" name="zone_area" value="{record_zone_area}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='police_station'>1.4 สน  <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="police_station" name="police_station" value="{record_police_station}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='operating_number'>1.5. เลขที่ปฏิบัติการ <label style="color:#e32">*</label> :</label>


								<input type="text" class="form-control " id="operating_number" name="operating_number" value="{record_operating_number}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='regis_date'>1.6 วันที่ <label style="color:#e32">*</label> :</label>


								<input type="text" class="form-control  datepicker" id="regis_date" name="regis_date" value="{record_regis_date}" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='performance'>1.7 ผลการปฏิบัติ <label style="color:#e32">*</label> :</label> <br/>
								<div class="form-check form-check-inline">
									<input type="radio" name="performance" id="performance1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_performance}" />
									<label class="form-check-label" for="performance1">พบเหตุ</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="performance" id="performance2" value="2" class="form-check-input" autocomplete="off" data-record-value="{record_performance}" />
									<label class="form-check-label" for="performance2">ไม่พบเหตุ</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="performance" id="performance3" value="3" class="form-check-input" autocomplete="off" data-record-value="{record_performance}" />
									<label class="form-check-label" for="performance3">ปฏิบัติการ</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="performance" id="performance4" value="4" class="form-check-input" autocomplete="off" data-record-value="{record_performance}" />
									<label class="form-check-label" for="performance4">ในพื้นที่</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="performance" id="performance5" value="5" class="form-check-input" autocomplete="off" data-record-value="{record_performance}" />
									<label class="form-check-label" for="performance5">นอกพื้นที่</label>
								</div>

							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='locale'>1.8 สถานที่เกิดเหตุ <label style="color:#e32">*</label>:</label>


								<input type="text" class="form-control " id="locale" name="locale" value="{record_locale}" />
							</div>
						</div>
						<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'> -->
						<!-- <label for='event'>1.9 เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC) :</label> -->
						<input type="hidden" class="form-control " id="event" name="event" value="{record_event}" />
						<!-- </div>
						</div> -->
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<label for='create_by_userid'>สร้างโดย :</label>

								<select id='create_by_userid' readonly="true" name='create_by_userid' value="{record_create_by_userid}">
									<option value="">- เลือก สร้างโดย -</option>
									{tb_members_create_by_userid_option_list}
								</select>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class='form-group'>
								<div class='col-sm-offset-2 col-sm-10'>


								</div>
							</div>

							<input type="hidden" name="encrypt_service_information_id" value="{encrypt_service_information_id}" />
							<input type="hidden" id="detail_ref_service_information_id" value="{encrypt_service_information_id}" />

						</div>
					</div>

					<br />

					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="text-left">
								<a href="{site_url}services/service_information">
									<button type="button" id="submit" name="submit" class="btn btn-danger"><i class="fa fa-times"></i> ออกจากแบบฟอร์ม</button>
								</a>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="text-right">


								<button type="button" class='btn btn-primary' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึกร่าง &nbsp;&nbsp;</button>

								<button type="button" id="btnAddListDialog" class="btn btn-info" data-toggle="modal" data-target="#addListModal" title="คลิกที่นี่เพื่อเพิ่มข้อมูลตารางรายการ">
									<i class="fa fa-users"></i> เพิ่มรายชื่อเจ้าหน้าที่ปฏิบัติการ
								</button>
								<!-- <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> -->
								<a href="{site_url}services/time_distance/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
								<!-- <button type="button" id="submit" name="submit" class="btn btn-danger">ยกเลิก</button> -->
							</div>
						</div>
					</div>

				</div>

			</form>
		</div>
		<!--card-body-->
	</div>
	<!--card-->
	<br />
	<div class="card">

		<div class="card-header bg-info">
			<h3 class="card-title">ตารางรายชื่อเจ้าหน้าที่ปฏิบัติการ</h3>
			</h3>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table  table-bordered table-hover">
					<thead class="thead-light">
						<tr>
							<th width="20px;">#</th>
							<th>ชื่อ-นามสกุล เจ้าหน้าที่</th>
							<th width="100px;">จัดการข้อมูล</th>
						</tr>
					</thead>
					<tbody id="tbody_detail_list">
						<tr parser-repeat="[detail_list]" id="list_row_{record_number}">
							<td style="text-align:center;">[{record_number}]</td>
							<td>{detailUserIdFirstname} - {detailUserIdLastname}</td>
							<td>
								<div class="btn-group pull-right">
									<button class="btn-edit-list-row my-tooltip btn btn-warning btn-sm" data-toggle="tooltip" title="แก้ไขข้อมูล" data-id="{detail_encrypt_id}" data-row-number="{record_number}" data-url-encrypt-id="{detail_url_encrypt_id}">
										<i class="fa fa-edit"></i> แก้ไข
									</button>
									<a href="javascript:void(0);" class="btn-delete-list-row my-tooltip btn btn-danger btn-sm" data-toggle="tooltip" title="ลบรายการนี้" data-id="{detail_encrypt_id}" data-row-number="{record_number}">
										<i class="fa fa-trash"></i> ลบ
									</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

			</div>

		</div>
	</div>
	<br />

	<!-- Modal Form Add List -->
	<div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="addListModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h4 class="modal-title" id="addListModalLabel">รายชื่อเจ้าหน้าที่ปฏิบัติการ</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body p-3">
					<form class="form-horizontal" id="formAddList" accept-charset="utf-8">
						{csrf_protection_field}
						<div class="form-group row ">
							<label class="col-sm-3 control-label text-right" for="user_id">User_id :</label>
							<div class="col-sm-9">
								<select id="detail_user_id" name="user_id" value="{detail_record_user_id}">
									<option value="">- เลือก User_id -</option>
									{detail_tb_members_user_id_option_list}
								</select>
							</div>
						</div>
						<div class="form-group row d-none">
							<label class="col-sm-3 control-label text-right" for="service_information_id">Service_information_id :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control " id="detail_service_information_id" name="service_information_id" value="{detail_record_service_information_id}" />
							</div>
						</div>
						<input type="hidden" id="detail_encrypt_id" name="encrypt_id" />
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
					<button type="button" class="btn btn-primary" id="btnConfirmSaveList"><i class="fa fa-save"></i> &nbsp;บันทึกรายการ&nbsp;</button>
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
						<input type="hidden" id="detail_del_encrypt_id" name="encrypt_id" />

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
					<button type="button" class="btn btn-danger" id="btn_confirm_delete_list"><i class="fas fa-trash-alt"></i> Delete</button>
				</div>
			</div>
		</div>
	</div>

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