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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Event_information</b></h3>
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
						<td class="text-right fit"><b>ลักษณะของที่เกิดเหตุ :</b></td>
						<td>{preview_even_scene}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ ………............ :</b></td>
						<td>{record_even_scene_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ที่พักอาศัย :</b></td>
						<td>{preview_accommodation}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ ………............ :</b></td>
						<td>{record_accommodation_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สถานที่ทำงาน :</b></td>
						<td>{preview_workplace}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ ………............ :</b></td>
						<td>{record_workplace_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สถานที่สาธารณะ :</b></td>
						<td>{preview_public_place}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้พบเห็นเหตุการณ์ :</b></td>
						<td>{preview_eyewitnesses}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ประชาชนทั่วไป :</b></td>
						<td>{preview_general_public}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>บุคลากรทางการแพทย์ :</b></td>
						<td>{preview_medical_personnel}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ ………............ :</b></td>
						<td>{record_eyewitnesses_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น :</b></td>
						<td>{preview_causes_cardiac_arres}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>