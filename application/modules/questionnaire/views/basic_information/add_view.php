<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Basic_information</strong></h3>
		</div>
		<div class="card-body">	<div class="col-sm-12 col-md-12">
		<div class="pull-right text-right">
			<a href="{page_url}/import_excel_form" target="_blank" class="btn btn-success btn-lg" data-toggle="tooltip" title="นำเข้าข้อมูล">
				<i class="fas fa-file-excel"></i></span> นำเข้า Excel
			</a>
		</div>
	</div>

			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="province">จังหวัด  :</label>
					<div class="col-sm-10">
					<select  id="province" name="province" value="">
						<option value="">- เลือก จังหวัด -</option>
						{provinces_province_option_list}
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="sex">เพศ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="sex1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="sex1">ชาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="sex" id="sex2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="sex2">หญิง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="age">อายุ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="age" name="age" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="edu1">สถานภาพการศึกษา  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="edu1" id="edu11"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu11">ศึกษาอยู่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu1" id="edu12"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu12">ไม่ได้ศึกษา</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="edu_id">ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id1">ม1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id2">ม2</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id3">ม3</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id4">ม4</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id5">ม5</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="edu_id" id="edu_id6"
									value="6" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="edu_id6">ม6</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="sisbro">จำนวนพี่น้อง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="sisbro" id="sisbro1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="sisbro1">เป็นลูกคนเดียว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="sisbro" id="sisbro2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="sisbro2">มีพี่น้องรวมทั้งหมด</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="sisbro_remain">อื่นๆ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="sisbro_remain" name="sisbro_remain" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="family_status">สถานภาพทางครอบครัว  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="family_status" id="family_status1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_status1">บิดามารดาอยู่ด้วยกัน</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_status" id="family_status2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_status2">บิดามารดาแยกกันอยู่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_status" id="family_status3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_status3">บิดาเสียชีวิตแล้ว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_status" id="family_status4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_status4">มารดาเสียชีวิตแล้ว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_status" id="family_status5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_status5">บิดาและมารดาเสียชีวิตแล้ว</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="dad_job">อาชีพของบิดา  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job1">เกษตร</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job2">รับราชการ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job3">พนักงานเอกชน</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job4">รัฐวิสาหกิจ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job5">รับจ้างทั่วไป</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job6"
									value="6" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job6">ธุรกิจส่วนตัว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="dad_job" id="dad_job7"
									value="7" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="dad_job7">อื่นๆ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="dad_job_remain">อื่นๆ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="dad_job_remain" name="dad_job_remain" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="mom_job">อาชีพของมารดา  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job1">เกษตร</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job2">รับราชการ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job3">พนักงานเอกชน</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job4">รัฐวิสาหกิจ</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job5">รับจ้างทั่วไป</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job6"
									value="6" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job6">ธุรกิจส่วนตัว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="mom_job" id="mom_job7"
									value="7" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="mom_job7">อื่นๆ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="mom_job_remain">อื่นๆ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="mom_job_remain" name="mom_job_remain" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="family_earn">รายได้ของครบอครัว  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="family_earn" id="family_earn1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_earn1">ต่ำกว่า15000บาท</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_earn" id="family_earn2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_earn2">15000-30000</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_earn" id="family_earn3"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_earn3">30001-40000</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_earn" id="family_earn4"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_earn4">40001-50000</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="family_earn" id="family_earn5"
									value="5" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="family_earn5">มากกว่า50000</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="consult">เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง(ตอบได้มากกว่า1ข้อ)  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult1"
value="1" class="form-check-input" />
<label for="consult1" class="form-check-label">บิดา</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult2"
value="2" class="form-check-input" />
<label for="consult2" class="form-check-label">มารดา</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult3"
value="3" class="form-check-input" />
<label for="consult3" class="form-check-label">ญาติ</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult4"
value="4" class="form-check-input" />
<label for="consult4" class="form-check-label">เพื่อน</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult5"
value="5" class="form-check-input" />
<label for="consult5" class="form-check-label">ครู</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult6"
value="6" class="form-check-input" />
<label for="consult6" class="form-check-label">คนรัก</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="consult[]" id="consult7"
value="7" class="form-check-input" />
<label for="consult7" class="form-check-label">อื่นๆ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="consult_remain">อื่นๆ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="consult_remain" name="consult_remain" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="try_drugs">ท่านเคยถูกให้ลองสารเสพติดหรือไม่  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="try_drugs" id="try_drugs1"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="try_drugs1">เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="try_drugs" id="try_drugs2"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="try_drugs2">ไม่เคย</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="type_drugs">ท่านเคยลองใช้สารเสพติดใดบ้าง(ตอบได้มากกว่า1ข้อ)  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs1"
value="1" class="form-check-input" />
<label for="type_drugs1" class="form-check-label">ยาบ้า</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs2"
value="2" class="form-check-input" />
<label for="type_drugs2" class="form-check-label">ยาอี</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs3"
value="3" class="form-check-input" />
<label for="type_drugs3" class="form-check-label">ยาเค</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs4"
value="4" class="form-check-input" />
<label for="type_drugs4" class="form-check-label">ฝิ่น</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs5"
value="5" class="form-check-input" />
<label for="type_drugs5" class="form-check-label">เฮโรอีน</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs6"
value="6" class="form-check-input" />
<label for="type_drugs6" class="form-check-label">กัญชา</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs7"
value="7" class="form-check-input" />
<label for="type_drugs7" class="form-check-label">ใบกระท่อม</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs8"
value="8" class="form-check-input" />
<label for="type_drugs8" class="form-check-label">ทินเนอร์</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs9"
value="9" class="form-check-input" />
<label for="type_drugs9" class="form-check-label">ยาไอซ์</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs10"
value="10" class="form-check-input" />
<label for="type_drugs10" class="form-check-label">บุหรี่</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs11"
value="11" class="form-check-input" />
<label for="type_drugs11" class="form-check-label">สุรา</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  
name="type_drugs[]" id="type_drugs12"
value="12" class="form-check-input" />
<label for="type_drugs12" class="form-check-label">อื่นๆ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="type_drugs_remain">อื่นๆ  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="type_drugs_remain" name="type_drugs_remain" value=""  />
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