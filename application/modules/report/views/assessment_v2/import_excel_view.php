<div class="card">
	<div class="card-header bg-success">
		<h3 class="card-title">
			<i class="fa fa-file-import me-2"></i>
			นำเข้าข้อมูลแบบประเมิน
		</h3>
	</div>
	<div class="card-body">
		<div class="text-center text-md-right">
			<a href="{templateFilePath}" class="btn btn-success" data-toggle="tooltip" title="ดาวน์โหลดเทมเพลตนำเข้าข้อมูล">
				<i class="fas fa-cloud-download-alt mr-1"></i>
				รับ Template
			</a>
		</div>
		<form method="post" action="" class="mt-2" accept-charset="utf-8" enctype="multipart/form-data">
			เลือกไฟล์สำหรับอ่านข้อมูล <small class="text-danger" style="font-size: 0.8rem;">(*นำเข้าได้สูงสุดครั้งละ <?= $importRowLimit ?> รายการ)</small>
			<div class="input-group" style="max-width:450px">
				<div class="custom-file">
					<input id="uploadFile" type="file" name="uploadFile" class="custom-file-input" accept=".xls, .xlsx, .csv" onchange="updateFileInputName()" required>
					<label id="uploadFileName" class="custom-file-label" for="uploadFile">เลือกไฟล์...</label>
				</div>
				<div class="input-group-append">
					<button id="readFileBtn" class="btn btn-info" type="submit">อ่านไฟล์</button>
				</div>
			</div>
		</form>

		<form id="importForm" action="{formEndpoint}" method="post" class="my-2">
			<?php if (count($importData) > 0): ?>
				เลือกวันที่สำหรับข้อมูล
				<div class="input-group mb-2" style="max-width:450px">
					<input type="date" class="form-control" name="import_date" value="<?= date('Y-m-d') ?>" min="2024-01-01 00:00" max="<?= date('Y-m-d') ?>" required>
				</div>

				<button id="submitImportBtn" class="btn btn-primary" type="submit">
					นำเข้า <?= min(count($importData), $importRowLimit) ?> รายการ
				</button>

				<?php if (count($importData) > $importRowLimit): ?>
					<div class="text-danger my-2 small">
						* สามารถนำเข้าข้อมูลได้สูงสุดครั้งละ <?= $importRowLimit ?> รายการ
					</div>
				<?php endif ?>
			<?php endif ?>

			<div class="table-responsive mt-2">
				<table class="table table-bordered table-striped table-hover text-nowrap">
					<thead>
						<tr style="background-color: #dddddd">
							<td class="text-center"><b>#</b></td>
							<td class="text-center"><b>จังหวัด</b></td>
							<td class="text-center"><b>อำเภอ</b></td>
							<td class="text-center"><b>เพศ</b></td>
							<td class="text-center"><b>อายุ</b></td>
							<td class="text-center"><b>สถานภาพทางการศึกษา</b></td>
							<td class="text-center"><b>จำนวนพี่น้อง</b></td>
							<td class="text-center"><b>สถานภาพทางครอบครัว</b></td>
							<td class="text-center"><b>อาชีพของบิดา</b></td>
							<td class="text-center"><b>อาชีพของมารดา</b></td>
							<td class="text-center"><b>รายได้ของครอบครัว (เฉลี่ยต่อเดือน)</b></td>
							<td class="text-center"><b>เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง</b></td>
							<td class="text-center"><b>ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่</b></td>
							<td class="text-center"><b>ท่านเคยลองใช้สารเสพติดใดบ้าง</b></td>
							<?php $tableColumnCount = 15; ?>
							<?php foreach ($questionList as $index => $question) : $tableColumnCount++; ?>
								<td class="text-center"><b>ข้อที่ <?= $index + 1; ?></b></td>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php if (count($importData) > 0) : ?>
							<?php foreach ($importData as $recordIndex => $record) : ?>
								<tr>
									<td><?= $recordIndex + 1 ?></td>

									<!-- START: user_info -->
									<?php foreach ($record['user_info'] as $key => $value): ?>
										<td>
											<?= $value ?>
											<input type="hidden" name="import_data[<?= $recordIndex ?>][user_info][<?= $key ?>]" value="<?= $value ?>">
										</td>
									<?php endforeach; ?>
									<!-- END: user_info -->

									<!-- START: answer -->
									<?php foreach ($record['answers'] as $index => $answer): ?>
										<td>
											<?= $answer['choice'] ?>
											<input type="hidden" name="import_data[<?= $recordIndex ?>][answers][<?= $index ?>][question_id]" value="<?= $answer['question_id'] ?>">
											<input type="hidden" name="import_data[<?= $recordIndex ?>][answers][<?= $index ?>][choice_id]" value="<?= $answer['choice_id'] ?>">
											<input type="hidden" name="import_data[<?= $recordIndex ?>][answers][<?= $index ?>][graph_bar_id]" value="<?= $answer['graph_bar_id'] ?>">
											<input type="hidden" name="import_data[<?= $recordIndex ?>][answers][<?= $index ?>][score]" value="<?= $answer['score'] ?>">
										</td>
									<?php endforeach; ?>
									<!-- END: answer -->
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td class="text-center" colspan="<?= $tableColumnCount ?>"> ----- ไม่พบข้อมูลสำหรับแสดงผล ----- </td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>

<script>
	function updateFileInputName() {
		const fileInput = document.getElementById("uploadFile");
		const fileName = document.getElementById("uploadFileName");
		if (fileInput.files.length > 0) {
			fileName.textContent = fileInput.files[0].name;
		} else {
			fileName.textContent = "เลือกไฟล์...";
		}
	}

	document.getElementById("readFileBtn").addEventListener("click", function(event) {
		const loadingTarget = $('#readFileBtn');
		loading_on(loadingTarget);
		console.log('Reading file...')
	})

	document.getElementById("importForm").addEventListener("submit", function(event) {
		event.preventDefault();
		const formData = new FormData(this);

		const loadingTarget = $('#submitImportBtn');
		loading_on(loadingTarget);
		$.ajax({
			method: this.method,
			url: this.action,
			dataType: 'json',
			data: formData,
			processData: false,
			contentType: false,
			success: function(results) {
				console.log("Response => ", results);
				if (results.status) {
					alert_type = 'success';
				} else {
					alert_type = 'danger';
				}
				notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
				loading_on_remove(loadingTarget);
			},
			error: function(jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
				notify('บันทึกข้อมูล', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล', 'danger', 'center');
				loading_on_remove(loadingTarget);
			}
		});
	});
</script>