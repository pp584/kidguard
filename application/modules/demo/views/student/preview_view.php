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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Student</b></h3>
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
						<td class="text-right fit"><b>Id :</b></td>
						<td>{record_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รหัสประจำตัว :</b></td>
						<td>{record_student_code}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คำนำหน้าชื่อ :</b></td>
						<td>{preview_prefix_name}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อ :</b></td>
						<td>{record_firstname}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>นามสกุล :</b></td>
						<td>{record_lastname}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>