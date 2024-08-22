<!-- [ View File name : preview_view.php ] -->

<style>
.table th.fit,
.table td.fit {
	white-space: nowrap;
	width: 2%;
}
</style>
<div class="card">

	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Employee</b></h3>
	</div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead class="well">
					<tr>
						<th class="text-right fit">หัวข้อ</th>
						<th>ข้อมูล</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td class="text-right fit"><b>EmpId :</b></td>
						<td>{record_emp_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รหัสPR :</b></td>
						<td>{record_name_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>CodeId :</b></td>
						<td>{record_code_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รหัสลงเวลา :</b></td>
						<td>{record_emp_barcode}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สาขา :</b></td>
						<td>{record_rf_branch_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>บริษัท :</b></td>
						<td>{record_rf_company}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คำนำหน้า :</b></td>
						<td>{record_rf_pre_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อ :</b></td>
						<td>{record_emp_name}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>นามสกุล :</b></td>
						<td>{record_emp_surname}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันเกิด :</b></td>
						<td>{record_birthday}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันที่ทำงาน :</b></td>
						<td>{record_start_date}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันที่ลาออก :</b></td>
						<td>{record_quit_date}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อายุงาน :</b></td>
						<td>{record_year_experience}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>