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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Contact_us</b></h3>
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
						<td class="text-right fit"><b>cms_contact_us_id :</b></td>
						<td>{record_cms_contact_us_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อผู้ติดต่อ :</b></td>
						<td>{record_contact_name}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เบอร์โทร :</b></td>
						<td>{record_phone}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เรื่อง :</b></td>
						<td>{record_subject}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รายละเอียด :</b></td>
						<td>{record_detail}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>