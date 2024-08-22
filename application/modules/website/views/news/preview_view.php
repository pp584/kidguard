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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>News</b></h3>
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
						<td class="text-right fit"><b>รูปภาพ :</b></td>
						<td>{preview_image}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เรื่อง :</b></td>
						<td>{record_title}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รายละเอียด :</b></td>
						<td>{record_message}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>หมวดหมู่ :</b></td>
					<td>{categoryIdName}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ผู้เขียน :</b></td>
					<td>{useridFirstname} {useridLastname}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>สถานะ :</b></td>
						<td>{record_status}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>