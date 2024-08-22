<!-- [ View File name : list_view.php ] -->
<style>
	.pagination {
		margin: 0px;
	}
</style>

<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title">
			<i class="fas fa-file-alt me-2"></i>
			<span id="table-title">ออกรายงาน (แบบประเมิน)</span>
		</h3>
	</div>
	<div class="card-body">
		<div class="row" style="gap: 5px;">
			<div class="col-12 col-lg-4 order-0 order-lg-1">
				<div class="text-center text-md-right">
					<a id="exportExcelClick" class="btn btn-success text-white" data-toggle="tooltip" title="ส่งออกข้อมูล">
						<i class="fas fa-file-excel"></i></span> Export to Excel
					</a>
				</div>
			</div>

			<form class="form-inline col m-0" name="formSearch" method="post" action="{page_url}">
				{csrf_protection_field}
				<div class="form-group row m-0" style="gap: 5px;">
					<span>ตั้งแต่</span>
					<input type="date" class="form-control" name="start_date" value="<?= $formData['start_date'] ?>" min="2024-01-01" max="<?= date('Y-m-d') ?>">

					<span>ถึง</span>
					<input type="date" class="form-control" name="end_date" value="<?= $formData['end_date'] ?>" min="2024-01-01" max="<?= date('Y-m-d') ?>">

					<span>จัดเรียง</span>
					<select class="form-control" name="order_by">
						<option value="ASC" <?php if ($formData['order_by'] === "ASC") echo "selected" ?>> เก่าสุด - ล่าสุด </option>
						<option value="DESC" <?php if ($formData['order_by'] === "DESC") echo "selected" ?>> ล่าสุด - เก่าสุด </option>
					</select>

					<span>แสดง</span>
					<select class="form-control" name="page_size">
						<option value="10" <?php if ($formData['page_size'] == "10") echo "selected" ?>> 10 </option>
						<option value="30" <?php if ($formData['page_size'] == "30") echo "selected" ?>> 30 </option>
						<option value="50" <?php if ($formData['page_size'] == "50") echo "selected" ?>> 50 </option>
						<option value="70" <?php if ($formData['page_size'] == "70") echo "selected" ?>> 70 </option>
						<option value="100" <?php if ($formData['page_size'] == "100") echo "selected" ?>> 100 </option>
						<option value="0" <?php if ($formData['page_size'] == "0") echo "selected" ?>> ทั้งหมด </option>
					</select>

					<button type="submit" name="submit" class="btn btn-info">
						<span class="glyphicon glyphicon-search"></span> ค้นหา
					</button>
				</div>
			</form>
		</div>
		<div class="row dataTables_wrapper mb-2 mt-2" style="gap: 5px;">
			<div class="col-12 col-md-6 text-center text-md-left p-md-0 pl-md-3">
				<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
					แสดง <span class="badge badge-light"><?= $pagination_table['first_item'] ?></span>
					ถึง <span class="badge badge-light"><?= $pagination_table['last_item'] ?></span>
					จาก <span class="badge badge-info"><?= $pagination_table['total_item'] ?></span> รายการ
				</div>
			</div>
			<div class="col">
				<div class="row justify-content-center justify-content-md-end pr-md-3">
					{pagination_link}
				</div>
			</div>
		</div>
		<div class="table-responsive" id="export-summary">
			<table class="table table-bordered table-striped table-hover text-nowrap">
				<thead>
					<tr style="background-color: #dddddd">
						<td class="text-center"><b>#</b></td>
						<td class="text-center"><b>Ticket</b></td>
						<td class="text-center"><b>เวลา</b></td>
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
						<?php $tableColumnCount = 16; ?>
						<?php foreach ($data_header as $index => $header) : $tableColumnCount++; ?>
							<td class="text-center"><b>ข้อที่ <?= $index + 1; ?></b></td>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?php if ($pagination_table['result_item'] > 0) : $itemIndex = $pagination_table['first_item'] - 1 ?>
						<?php foreach ($data_table as $data) : $itemIndex++ ?>
							<tr>
								<td class="text-center"><?= $itemIndex; ?></td>
								<td><?= $data['ticket'] ?></td>
								<td><?= $data['submit_date'] ?></td>
								<td><?= $data['province'] ?></td>
								<td><?= $data['district'] ?></td>
								<td><?= $data['gender'] ?></td>
								<td class="text-center"><?= $data['age'] ?></td>
								<td><?= $data['education_status'] ?></td>
								<td><?= $data['num_siblings'] ?></td>
								<td><?= $data['family_status'] ?></td>
								<td><?= $data['father_occupation'] ?></td>
								<td><?= $data['mother_occupation'] ?></td>
								<td><?= $data['family_income'] ?></td>
								<td><?= $data['consult_people'] ?></td>
								<td><?= $data['drug_history'] ?></td>
								<td><?= $data['type_of_drugs'] ?></td>

								<?php foreach ($data['answers'] as $answer) : ?>
									<td class="text-center"><?= $answer['choice'] ?></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td class="text-center" colspan="<?= $tableColumnCount ?>"> ----- ไม่พบข้อมูลสำหรับแสดงผล ----- </td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<div class="row dataTables_wrapper mt-2" style="gap: 5px;">
			<div class="col-12 col-md-6 text-center text-md-left p-md-0 pl-md-3">
				<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
					แสดง <span class="badge badge-light"><?= $pagination_table['first_item'] ?></span>
					ถึง <span class="badge badge-light"><?= $pagination_table['last_item'] ?></span>
					จาก <span class="badge badge-info"><?= $pagination_table['total_item'] ?></span> รายการ
				</div>
			</div>
			<div class="col">
				<div class="row justify-content-center justify-content-md-end pr-md-3" id="dataTable_paginate">
					{pagination_link}
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
					<input type="hidden" name="encrypt_id" />

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