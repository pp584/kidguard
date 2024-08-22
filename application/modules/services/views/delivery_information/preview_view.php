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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Delivery_information</b></h3>
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
						<td class="text-right fit"><b>โรงพยาบาลที่นำส่ง :</b></td>
						<td>{preview_delivery_hospital}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ) :</b></td>
						<td>{preview_delivery_hospital_course}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ระดับการคัดกรอง :</b></td>
						<td>{preview_screening_level}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การ Resuscitation  ณ แผนกอุบัติเหตุและฉุกเฉิน :</b></td>
						<td>{preview_resuscitation}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ระบบทางเดินหายใจ :</b></td>
						<td>{preview_respiratory_system}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>respiratory_system_remark :</b></td>
						<td>{record_respiratory_system_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การให้สารน้ำ :</b></td>
						<td>{preview_water_supply}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>water_supply_remark :</b></td>
						<td>{record_water_supply_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การห้ามเลือด :</b></td>
						<td>{preview_hemostasis}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>hemostasis_remark :</b></td>
						<td>{record_hemostasis_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การดามกระดูก :</b></td>
						<td>{preview_splint}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>splint_remark :</b></td>
						<td>{record_splint_remark}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>