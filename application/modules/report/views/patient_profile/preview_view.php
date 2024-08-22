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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Patient_profile</b></h3>
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
						<td class="text-right fit"><b>ID :</b></td>
						<td>{record_patient_profile_id}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>service_information_id :</b></td>
					<td>{serviceInformationIdServiceUnitName} {serviceInformationIdOperatingCommand}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>รหัส OHAC-ID :</b></td>
						<td>{record_ohac_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ชื่อผู้ป่วย :</b></td>
						<td>{record_patient_name}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อายุ :</b></td>
						<td>{record_age}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เพศ :</b></td>
						<td>{preview_sex}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สิทธิการรักษา :</b></td>
						<td>{preview_right_medical}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ :</b></td>
						<td>{record_right_medical_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>โรคประจำตัว :</b></td>
						<td>{preview_congenital_disease}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>โรคประจำตัว :</b></td>
						<td>{preview_congenital_disease_patient}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ :</b></td>
						<td>{record_congenital_disease_patient_remark}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>