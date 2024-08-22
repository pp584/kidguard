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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Cms_about_us</b></h3>
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
						<td class="text-right fit"><b>image :</b></td>
						<td>{preview_image}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>title_th :</b></td>
						<td>{record_title_th}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>title_en :</b></td>
						<td>{record_title_en}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>detail :</b></td>
						<td>{record_detail}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>cardiac_arrest :</b></td>
						<td>{record_cardiac_arrest}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>