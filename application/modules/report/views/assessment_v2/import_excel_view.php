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
		<form method="post" action="?read" class="mt-2" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="input-group">
				<div class="custom-file" style="max-width:450px">
					<input id="uploadFile" type="file" name="uploadFile" class="custom-file-input" accept=".xls, .xlsx, .csv" onchange="updateFileInputName()" required>
					<label id="uploadFileName" class="custom-file-label" for="uploadFile">เลือกไฟล์...</label>
				</div>
				<div class="input-group-append">
					<button class="btn btn-info" type="submit">อ่านไฟล์</button>
				</div>
			</div>
		</form>

		<form class="mt-3 mb-2">
			<?php if (count($importData) > 0): ?>
				<button class="btn btn-primary" type="submit">
					นำเข้าข้อมูล <?= count($importData) ?> รายการ
				</button>
			<?php endif ?>
		</form>

		<div class="table-responsive">
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
						<?php foreach ($importData as $record => $data) : ?>
							<tr>
								<td><?= $record + 1 ?></td>
								<?php foreach ($data as $key => $value) : $index = 1 ?>
									<td><?= $value ?></td>
								<?php endforeach; ?>
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
</script>