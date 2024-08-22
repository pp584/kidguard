<!-- [ View File name : list_view.php ] -->
<div class="card">

	<div class="padding-bottom-3x mb-1">
		<div class="card mb-12">
			<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">3. ข้อมูลผู้ป่วย </span><span class="text-medium"></span></div>
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
					<div class="step completed ">
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
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12 col-md-12 mb-3">
						<div class="text-right">
							<a href="{page_url}/add" class="btn btn-success" data-toggle="tooltip" title="เพิ่มข้อมูลใหม่">
								<i class="fa fa-plus-square"></i></span> เพิ่มผู้ป่วยใหม่
							</a>
						</div>
					</div>
				</div>

				<div class="table-responsive">

					<table class="table table-bordered table-striped table-hover">
						<thead class="info">
							<tr bgcolor="#dddddd">
								<th width="20px;">#</th>
								<th>รหัส OHAC-ID</th>
								<!-- <th>ชื่อผู้ป่วย</th> -->
								<th>อายุ</th>
								<th>เพศ</th>
								<th>สิทธิการรักษา</th>
								<!-- <th>อื่นๆ ระบุ</th> -->
								<th>โรคประจำตัว</th>
								<!-- <th>โรคประจำตัว</th> -->
								<th>อื่นๆ ระบุ</th>
								<th class="text-center" style="width:200px">จัดการข้อมูล</th>
							</tr>
						</thead>
						<tbody>
							<tr parser-repeat="[data_list]" id="row_{record_number}">
								<td style="text-align:center;">[{record_number}]</td>
								<td>{ohac_id}</td>
								<!-- <td>{patient_name}</td> -->
								<td>{age}</td>
								<td>{preview_sex}</td>
								<!-- <td>{preview_right_medical}</td> -->
								<td>{right_medical_remark}</td>
								<td>{preview_congenital_disease}</td>
								<!-- <td>{preview_congenital_disease_patient}</td> -->
								<td>{congenital_disease_patient_remark}</td>
								<td>
									<div class="btn-group pull-right">
										<!-- <a href="{page_url}/preview/{url_encrypt_id}" target="_blank" class="my-tooltip btn btn-info btn-sm" data-toggle="tooltip" title="แสดงข้อมูลรายละเอียด">
											<i class="fa fa-list"></i> รายละเอียด
										</a> -->
										<a href="{page_url}/edit/{url_encrypt_id}" target="_blank" class="my-tooltip btn btn-warning btn-sm" data-toggle="tooltip" title="แก้ไขข้อมูล">
											<i class="fa fa-edit"></i> แก้ไข
										</a>
										<a href="javascript:void(0);" class="btn-delete-row my-tooltip btn btn-danger btn-sm" data-toggle="tooltip" title="ลบรายการนี้" data-patient_profile_id="{encrypt_patient_profile_id}" data-row-number="{record_number}">
											<i class="fa fa-trash"></i> ลบ
										</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

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

						
							<a href="{site_url}services/time_distance/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button> </a>
							<a href="{site_url}services/event_information/edit_data"> <button type="button" id="submit" name="submit" class="btn btn-info">ถัดไป <i class="fa fa-angle-double-right"></i> </button> </a>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Modal Delete -->
		<div class="modal fade" id="confirmDelModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="confirmDelModalLabel">ยืนยันการลบข้อมูล</h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					</div>
					<div class="modal-body">
						<h4 class="text-center">*** ท่านต้องการลบข้อมูลแถวที่ <span id="xrow"></span> ??? ***</h4>
						<div id="div_del_detail"></div>
						<form id="formDelete">
							<div class="form-group">
								<div class="col-sm-8">
									<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
								</div>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="delete_remark">
								</div>
							</div>
							<input type="hidden" name="encrypt_patient_profile_id" />

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
						<button type="button" class="btn btn-danger" id="btn_confirm_delete"><i class="fas fa-trash-alt"></i> Delete</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreviewLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="modalPreviewLabel">แสดงข้อมูล</h4>
					</div>
					<div class="modal-body">
						<div id="divPreview"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			var param_search_field = '{search_field}';
			var param_current_page = '{current_page_offset}';
			var param_current_path = '{current_path_uri}';
		</script>