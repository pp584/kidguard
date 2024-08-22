<div class="card">
	<div class="card-header bg-info">
		<h3 class="card-title">
			<i class="fa fa-plus-square"></i>
			นำเข้าข้อมูลด้วย Excel
		</h3>
	</div>
	<div class="card-body">
		<div class="row">
			<label class="col-12 col-form-label">
				ดาวน์โหลดเทมเพลตนำเข้าข้อมูล :
				<a href="{base_url}/assets/uploads/excel_template/template_importV2.xlsx" class="btn btn-success btn-sm" data-toggle="tooltip" title="เทมเพลตนำเข้าข้อมูล">
					Download
				</a>
			</label>
		</div>
		<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>import/Assessment/importFile" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="form-group row mt-4">
				<div class="col-sm-12 upload-box">
					<div class="hold input-group">
						<span class="btn-file">
							เลือกไฟล์ Excel
							<input type="file" id="uploadFile" name="uploadFile" data-elem-preview="FileUpload_preview" data-elem-label="FileUpload_label" onchange="updateFileLabel()" />
						</span>
						<input class="form-control" id="FileUpload_label" name="FileUpload_label" placeholder="กรุณาเลือกไฟล์ที่ต้องการอัพโหลด" readonly="readonly" value="" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

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