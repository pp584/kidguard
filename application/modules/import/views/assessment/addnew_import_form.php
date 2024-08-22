<div class="card">
	<div class="card-header bg-info">
		<h3 class="card-title">
			<i class="fa fa-plus-square"></i> นำเข้าข้อมูล Excel
			<strong>นำเข้าไฟล์ข้อมูล (Import)</strong>
		</h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>import/Assessment/importFile" accept-charset="utf-8"  enctype="multipart/form-data">
			

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
							<option value="<?= $i ?>"><?= $i ?></option>

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
							<input type="file" id="uploadFile" name="uploadFile" data-elem-preview="FileUpload_preview" data-elem-label="FileUpload_label" onchange="updateFileLabel()" />
						</span>
						<input class="form-control" id="FileUpload_label" name="FileUpload_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="" />
					</div>

			
					
				</div>
				<div class="col-sm-12 upload-box">
					{upload_status}
					</div>
				<div style="clear:both"></div>
			</div>

			<div class="form-group row">


				<div class="col-sm-1">
                <input type="submit" name="submit" value="Upload" class="btn btn-warning" />
					<!-- <button type="button" id="btnSaveExcel" class="btn btn-warning btn-sm">
						<i class="fas fa-file-save"></i> Upload &nbsp;&nbsp;
					</button> -->
				</div>


			</div>
		</form>
		

	</div> <!--panel-body-->
</div> <!--panel-->

<script>
function updateFileLabel() {
    var fileInput = document.getElementById("uploadFile");
    var fileLabel = document.getElementById("FileUpload_label");
    if (fileInput.files.length > 0) {
        fileLabel.value = fileInput.files[0].name;
    } else {
        fileLabel.value = '';
    }
}
</script>

