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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Result_data</b></h3>
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
						<td class="text-right fit"><b>สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต :</b></td>
						<td>{preview_patient_status}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เสียชีวิต :</b></td>
						<td>{preview_patient_status_dead}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>แผนกที่ผู้ป่วยเข้ารับการรักษา :</b></td>
						<td>{preview_department}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การรอดชีวิต จำหน่ายออกจากโรงพยาบาล :</b></td>
						<td>{preview_survival}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>จำนวนวันที่รับไว้รักษาในโรงพยาบาล :</b></td>
						<td>{record_days_admitted}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันเวลาที่จำหน่าย :</b></td>
						<td>{record_date_out}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เหตุผลในการจำหน่าย :</b></td>
						<td>{preview_date_out_course}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>