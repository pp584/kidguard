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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Basic_resuscitation</b></h3>
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
						<td class="text-right fit"><b>การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง :</b></td>
						<td>{preview_first_life_resuscitation}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ลักษณะของการทำกู้ชีพเบื้องต้น :</b></td>
						<td>{preview_methods_first_life_resuscitation}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้ทำการกู้ชีพ (CPR) เบื้องต้น :</b></td>
						<td>{preview_rescuer_cpr}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ประชาชนทั่วไป :</b></td>
						<td>{preview_rescuer_cpr_general_public}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>บุคลากรทางการแพทย์ :</b></td>
						<td>{preview_rescuer_cpr_medical_personnel}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{preview_rescuer_cpr_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>มี AED ในที่สาธารณะ :</b></td>
						<td>{preview_general_public_aed}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ :</b></td>
						<td>{preview_use_general_public_aed}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ :</b></td>
						<td>{preview_first_use_aed}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ประชาชนทั่วไป :</b></td>
						<td>{preview_first_use_aedgeneral_public}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>บุคลากรทางการแพทย์ :</b></td>
						<td>{preview_first_use_aedmedical_personnel}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>