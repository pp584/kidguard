<!-- [ View File name : addnew_import_form.php ] -->
<style>
	div.scroll {
		margin: 4px, 4px;
		padding: 4px;
		width: 100%;
		overflow-x: auto;
		overflow-y: hidden;
		white-space: nowrap;
	}
</style>

<div class="card">
	<div class="card-header bg-info">
		<h3 class="card-title">
			<i class="fa fa-plus-square"></i> นำเข้าข้อมูล Excel
			<strong>นำเข้าไฟล์ข้อมูล (Import)</strong>
		</h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" id="formImport" accept-charset="utf-8" enctype="multipart/form-data">
			{csrf_protection_field}

			<div class="form-group row">
				<!-- <label class="col-sm-2 col-form-label">ระบุแถวที่เริ่มต้นข้อมูล :</label>
				<div class="col-sm-1">
					<input type="number" value="{start_row}" name="start_row" class="form-control" />
				</div> -->

				<input type="hidden" name="start_row" value="2" />
				<label class="col-sm-2 col-form-label">Download template:</label>
				<div class="col-sm-2">
					<a href="{base_url}/assets/uploads/excel_template/template_import.xlsx" class="btn btn-success btn-sm" data-toggle="tooltip" title="ส่งออกข้อมูล">
						<i class="fas fa-file-excel"></i></span> Download
					</a>
				</div>


				<label class="col-sm- col-form-label">ข้อมูลปี :</label>
				<div class="col-sm-2">
					<select id="import_year" name="import_year" value="">
						<option value="">- เลือกข้อมูลปี -</option>
						<?php
						$year = date('Y') + 543;

						for ($i = $year - 5; $i <= $year; $i++) {
						?>
							<option value="<?= $year ?>"><?= $i ?></option>

						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">

			</div>


			<div class="form-group row">
				<div class="col-sm-12 upload-box">
					<div class="hold input-group">
						<span class="btn-file"> เลือกไฟล์ Excel
							<input type="file" id="FileUpload" name="FileUpload" data-elem-preview="FileUpload_preview" data-elem-label="FileUpload_label" />
						</span><input class="form-control" id="FileUpload_label" name="FileUpload_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="" />
					</div>
				</div>
				<div style="clear:both"></div>
			</div>

			<div class="form-group row">

				<div class="col-sm-1">
					<button type="button" id="btnReadExcel" class="btn btn-success btn-sm">
						&nbsp;&nbsp;<i class="fas fa-file-import"></i> แสดงข้อมูล
					</button>
				</div>

				<div class="col-sm-1" style="margin-left: 50px;">
					<button type="button" id="btnSaveExcel" class="btn btn-warning btn-sm">
						<i class="fas fa-file-save"></i> บันทึกข้อมูล &nbsp;&nbsp;
					</button>
				</div>
			</div>
		</form>
		<form id="frmImportList">
			<div class="scroll">
				<table class="table table-hover table-bordered">
					<thead class="thead-light">
						<tr>
							<th width="20px;">#</th>
							<th>จังหวัด</th>
							<th>ภาค</th>
							<th>1.เพศ</th>
							<th>2.อายุ</th>
							<th>3.สถานภาพการศึกษา</th>
							<th>4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่</th>
							<th>5.จำนวนพี่น้อง</th>
							<th>กรุณากรอก</th>
							<th>6.สถานภาพทางครอบครัว</th>
							<th>7.อาชีพของบิดา</th>
							<th>8. อาชีพของมารดา</th>
							<th>10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)</th>
							<th>กรุณากรอก</th>
							<th>11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่</th>
							<th>12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)</th>
							<th>กรุณากรอก</th>
							<th>create_datetime</th>
						</tr>
					</thead>
					<tbody id="tbody_import_list">
					</tbody>
				</table>
			</div>
		</form>

	</div> <!--panel-body-->
</div> <!--panel-->