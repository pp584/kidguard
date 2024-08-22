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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Research</b></h3>
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
						<td class="text-right fit"><b>cms_researchs_id :</b></td>
						<td>{record_cms_researchs_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เรื่อง :</b></td>
						<td>{record_subject}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รายละเอียด :</b></td>
						<td>{record_detail}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้วิจัย :</b></td>
						<td>{record_research_name}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันที่สร้าง :</b></td>
						<td>{record_create_date}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>สร้างโดย :</b></td>
					<td>{createByUseridFirstname} {createByUseridLastname}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>ไฟล์แนบ :</b></td>
						<td>{preview_files}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>