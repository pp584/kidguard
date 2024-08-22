<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>assessment1</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='province_id'>จังหวัด  :</label>
					<div class='col-sm-10'>
					<select id='province_id'  name='province_id' value="{record_province_id}" >
						<option value="">- เลือก จังหวัด -</option>
						{provinces_province_id_option_list}
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_1'>1.เพศ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_1" id="question_11"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_1}" />
<label class="form-check-label" for="question_11">ชาย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_1" id="question_12"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_1}" />
<label class="form-check-label" for="question_12">หญิง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_2'>2.อายุ  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="question_2" name="question_2" value="{record_question_2}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_3'>3.สถานภาพการศึกษา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_3" id="question_31"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_3}" />
<label class="form-check-label" for="question_31">1.ศึกษาอยู่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_3" id="question_32"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_3}" />
<label class="form-check-label" for="question_32">2. ไม่ได้ศึกษา</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_4'>4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="question_4" name="question_4" value="{record_question_4}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_5'>5.จำนวนพี่น้อง  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_5" id="question_51"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_5}" />
<label class="form-check-label" for="question_51">1. เป็นลูกคนเดียว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_5" id="question_52"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_5}" />
<label class="form-check-label" for="question_52">2. มีพี่น้องรวมทั้งหมด</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_6'>กรุณากรอก  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_6" id="question_61"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_6}" />
<label class="form-check-label" for="question_61">Choice 1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_6" id="question_62"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_6}" />
<label class="form-check-label" for="question_62">Choice 2</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_7'>6.สถานภาพทางครอบครัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_7" id="question_71"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_7}" />
<label class="form-check-label" for="question_71">1. บิดามารดาอยู่ด้วยกัน</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_7" id="question_72"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_7}" />
<label class="form-check-label" for="question_72">2. บิดามารดาแยกกันอยู่</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_7" id="question_73"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_7}" />
<label class="form-check-label" for="question_73">3. บิดาเสียชีวิตแล้ว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_7" id="question_74"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_7}" />
<label class="form-check-label" for="question_74">4. มารดาเสียชีวิตแล้ว</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_7" id="question_75"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_7}" />
<label class="form-check-label" for="question_75">5. บิดาและมารดาเสียชีวิตแล้ว</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_8'>7.อาชีพของบิดา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_81"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_81">1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_82"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_82">2</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_83"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_83">3</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_84"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_84">4</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_85"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_85">5</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_86"
									value="6" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_86">6</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_8" id="question_87"
									value="7" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_8}" />
<label class="form-check-label" for="question_87">อื่น ๆ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_9'>8. อาชีพของมารดา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_91"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_91">1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_92"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_92">2</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_93"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_93">3</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_94"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_94">4</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_95"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_95">5</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_96"
									value="6" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_96">6</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_9" id="question_97"
									value="7" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_9}" />
<label class="form-check-label" for="question_97">อื่น ๆ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_10'>10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_101"
value="1" class="form-check-input" />
<label for="question_101" class="form-check-label">1</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_102"
value="2" class="form-check-input" />
<label for="question_102" class="form-check-label">2</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_103"
value="3" class="form-check-input" />
<label for="question_103" class="form-check-label">3</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_104"
value="4" class="form-check-input" />
<label for="question_104" class="form-check-label">4</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_105"
value="5" class="form-check-input" />
<label for="question_105" class="form-check-label">5</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_106"
value="6" class="form-check-input" />
<label for="question_106" class="form-check-label">6</label>
</div>
<div class="form-check form-check-inline">
<input type="checkbox"  data-record-value="{record_question_10}"
name="question_10[]" id="question_107"
value="7" class="form-check-input" />
<label for="question_107" class="form-check-label">อื่น ๆ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_11'>กรุณากรอก  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="question_11" name="question_11" value="{record_question_11}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_12'>11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_12" id="question_121"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_12}" />
<label class="form-check-label" for="question_121">เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_12" id="question_122"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_12}" />
<label class="form-check-label" for="question_122">ไม่เคย</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_13'>12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_131"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_131">1</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_132"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_132">2</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_133"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_133">3</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_134"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_134">4</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_135"
									value="5" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_135">5</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_136"
									value="6" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_136">6</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_137"
									value="7" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_137">7</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_138"
									value="8" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_138">8</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_139"
									value="9" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_139">9</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_1310"
									value="10" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_1310">10</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_1311"
									value="11" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_1311">11</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question_13" id="question_1312"
									value="12" class="form-check-input"
									autocomplete="off" data-record-value="{record_question_13}" />
<label class="form-check-label" for="question_1312">อื่น ๆ โปรดระบุ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question_14'>กรุณากรอก  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="question_14" name="question_14" value="{record_question_14}"  />
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
