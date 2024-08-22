<!--  [ View File name : edit_view.php ] -->
<style>
	.table th.fit,
	.table td.fit {
		white-space: nowrap;
		width: 2%;
	}
</style>

<div class="card">
	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">9. ยืนยันเผยแพร่ข้อมูล </span><span class="text-medium"></span></div>
			<div class="card-body">
				<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/1.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/service_information/edit_data">1. ข้อมูลหน่วยบริการ</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/2.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/time_distance/edit_data">2. ข้อมูลเวลาและระยะทาง</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/3.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/patient_profile">3. ข้อมูลผู้ป่วย</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/4.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/event_information/edit_data">4. ข้อมูลเหตุการณ์</a></h4>
					</div>
					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/5.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/basic_resuscitation/edit_data">5. การกู้ชีพเบื้องต้น</a> </h4>
					</div>

					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/6.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/treatment_information/edit_data">6. การรักษาโดยทีมปฏิบัติการ</a></h4>
					</div>


					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/7.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/delivery_information/edit_data">7. นำส่งแผนกอุบัติเหตุ</a></h4>
					</div>

					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/result_data/edit_data">8. ผลลัพธ์</a></h4>
					</div>

					<div class="step completed">
						<div class="step-icon-wrap">
							<div class="step-icon"><img style="height: 65px; width: 65px;" src="{base_url}/assets/images/icon/8.png"></div>
						</div>
						<h4 class="step-title"><a href="{site_url}services/verify_information/edit_data">9. ยืนยันเผยแพร่ข้อมูล</a></h4>
					</div>

				</div>
			</div>
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<!-- <div class='form-group'>
					<label class='col-sm-2 control-label' for='service_information_id'>ID :</label>
					<div class='col-sm-10'> -->
				<input type="hidden" class="form-control " id="service_information_id" name="service_information_id" value="{record_service_information_id}" readonly="readonly" />
				<!-- </div>
				</div> -->
				<div class="card">
					<div class="card-body">
						<div class='form-group'>

							<table class="table table-bordered table-hover">
								<thead class="well">
									<tr>
										<th class="text-right fit">หัวข้อ</th>
										<th>ข้อมูล</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right fit"><b>หน่วยบริการ :</b></td>
										<td>{serviceUnitNameServiceUnitName}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>ปฏิบัติการที่ :</b></td>
										<td>{record_operating_command}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>พื้นที่โซน :</b></td>
										<td>{record_zone_area}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>สน :</b></td>
										<td>{record_police_station}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>เลขที่ปฏิบัติการ :</b></td>
										<td>{record_operating_number}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>วันที่ :</b></td>
										<td>{record_regis_date}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>ผลการปฏิบัติ :</b></td>
										<td>{preview_performance}</td>
									</tr>
									<tr>
										<td class="text-right fit"><b>สถานที่เกิดเหตุ :</b></td>
										<td>{record_locale}</td>
									</tr>


								</tbody>
							</table>


							<label class='col-sm-2 control-label' for='status'>เลือกสถานะข้อมูล :</label>
							<div class='col-sm-10'>

								<div class="form-check form-check-inline">
									<input type="radio" name="status" id="status0" value="0" class="form-check-input" autocomplete="off" data-record-value="{record_status}" />
									<label class="form-check-label" for="status0">ฉบับร่าง</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="status" id="status1" value="1" class="form-check-input" autocomplete="off" data-record-value="{record_status}" />
									<label class="form-check-label" for="status1">เผยแพร่</label>
								</div>

							</div>

							<hr/>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type="button" class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editModal'>&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="encrypt_service_information_id" value="{encrypt_service_information_id}" />
			</form>
		</div>
		<!--card-body-->
	</div>
	<!--card-->
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
						<!-- <div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div> -->
						<div class="col-sm-12">
							<input type="hidden" class="form-control" id="edit_remark" value="Edit Data ">
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