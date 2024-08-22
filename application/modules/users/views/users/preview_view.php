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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Users</b></h3>
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
						<td class="text-right fit"><b>userid :</b></td>
						<td>{record_userid}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อผู้ใช้งาน :</b></td>
						<td>{record_username}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อีเมล :</b></td>
						<td>{record_email}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>คำนำหน้า :</b></td>
					<td>{prefixPrefixName}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อ :</b></td>
						<td>{record_firstname}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>นามสกุล :</b></td>
						<td>{record_lastname}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เพศ :</b></td>
						<td>{preview_sex}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>สิทธิ์การใช้งาน :</b></td>
					<td>{levelLevelTitle}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>เบอร์โทรศัพท์ :</b></td>
						<td>{record_tel_number}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ไอดี Line :</b></td>
						<td>{record_line_id}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>อ้างอิง ชื่อสังกัด :</b></td>
					<td>{departmentIdServicesName}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>ภาพประจำตัว :</b></td>
						<td>{preview_photo}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>