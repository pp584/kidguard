<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>dashboard_data</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='self_management_score'>การบริหารจัดการตน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="self_management_score" name="self_management_score" value="{record_self_management_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='psychological_capital_score'>ทุนทางจิตวิทยา  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="psychological_capital_score" name="psychological_capital_score" value="{record_psychological_capital_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='self_esteem_score'>การเห็นคุณค่าในตนเอง  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="self_esteem_score" name="self_esteem_score" value="{record_self_esteem_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='identity_power_score'>พลังตัวตน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="identity_power_score" name="identity_power_score" value="{record_identity_power_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='compliance_score'>การคล้อยตามกลุ่มคนใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="compliance_score" name="compliance_score" value="{record_compliance_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='domestic_violence_score'>ความรุนแรงในครอบครัว  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="domestic_violence_score" name="domestic_violence_score" value="{record_domestic_violence_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='exemplary_score'>การเป็นแบบอย่างในการใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="exemplary_score" name="exemplary_score" value="{record_exemplary_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='media_exposure_score'>การเปิดรับเกี่ยวกับสื่อสารเสพติด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="media_exposure_score" name="media_exposure_score" value="{record_media_exposure_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='attitude_score'>เจตคติทางบวกต่อการใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="attitude_score" name="attitude_score" value="{record_attitude_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='source_purchase_score'>การรับรู้แหล่งซื้อสารเสพติด  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="source_purchase_score" name="source_purchase_score" value="{record_source_purchase_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='family_power_score'>พลังครอบครัว  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="family_power_score" name="family_power_score" value="{record_family_power_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='school_power_score'>พลังสถานศึกษา  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="school_power_score" name="school_power_score" value="{record_school_power_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='friend_power_score'>พลังเพื่อนและกิจกรรม  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="friend_power_score" name="friend_power_score" value="{record_friend_power_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='community_power_score'>พลังชุมชน  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="community_power_score" name="community_power_score" value="{record_community_power_score}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='group_type_id'>กลุ่ม  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="group_type_id" name="group_type_id" value="{record_group_type_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='data_year'>ปี  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="data_year" name="data_year" value="{record_data_year}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='section'>Section  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="section" name="section" value="{record_section}"  />
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
			<div class='modal-header bg-warning'>
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
				<button type='button' class='btn btn-lg btn-default' data-dismiss='modal'><i class="fas fa-window-close"></i> ปิด</button>
				<button type='button' class='btn btn-lg btn-primary' id='btnSaveEdit'>&nbsp;<i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>
