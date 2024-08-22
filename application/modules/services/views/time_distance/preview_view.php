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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Time_distance</b></h3>
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
						<td class="text-right fit"><b>service_information_id :</b></td>
						<td>{record_service_information_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่มีผู้พบเห็นเหตุการณ์ :</b></td>
						<td>{record_incident_time}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ได้รับแจ้งเหตุ :</b></td>
						<td>{record_incident_time_recrive}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่สั่งการ :</b></td>
						<td>{record_time_order}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ออกจากฐาน :</b></td>
						<td>{record_base_time_start}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ไปถึงที่เกิดเหตุ :</b></td>
						<td>{record_base_time_stop}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ออกจากที่เกิดเหตุ :</b></td>
						<td>{record_time_of_leaving}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ไปถึงโรงพยาบาล :</b></td>
						<td>{record_time_to_hospital}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่ถึงฐาน :</b></td>
						<td>{record_base_time_finish}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ระยะทางจากฐานไปถึงที่เกิดเหตุ :</b></td>
						<td>{record_distance_base_scene}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล :</b></td>
						<td>{record_distance_to_hospital}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>