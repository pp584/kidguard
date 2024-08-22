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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Service_patient_profile</b></h3>
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
						<td>{record_service_information_id}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>หน่วยบริการ :</b></td>
					<td>{serviceUnitNameServicesName}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>ปฏิบัติการที่ :</b></td>
						<td>{record_operating_command}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พื้นที่โซน :</b></td>
						<td>{record_zone_area}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สน :</b></td>
						<td>{record_police_station}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เลขที่ปฏิบัติการ :</b></td>
						<td>{record_operating_number}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันที่ :</b></td>
						<td>{record_regis_date}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผลการปฏิบัติ :</b></td>
						<td>{preview_performance}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สถานที่เกิดเหตุ :</b></td>
						<td>{record_locale}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC) :</b></td>
						<td>{record_event}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>สร้างโดย :</b></td>
					<td>{createByUseridFirstname} {createByUseridLastname}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>วันที่สร้าง :</b></td>
						<td>{record_create_date}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
<br/>
<div class="card">
 
	<div class="card-header bg-info">
		<h3 class="card-title">ตารางรายการ <b>patient_profile</b></h3></h3>
	</div>
	
	<div class="card-body">	<div class="table-responsive">
		<table class="table  table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th width="20px;">#</th>
					<th>ID</th>
					<th>Service_information_id</th>
					<th>รหัส OHAC-ID</th>
					<th>ชื่อผู้ป่วย </th>
					<th>อายุ</th>
					<th>เพศ[1=ชาย,2=หญิง]</th>
					<th>สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]</th>
					<th>อื่นๆ ระบุ </th>
					<th>โรคประจำตัว[1=มี,2=ไม่มี]</th>
					<th>โรคประจำตัว[1=Diabetes (เบาหวาน),2=Hypertension (ความดันโลหิตสูง),3=Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ),4=Respiratory disease (ระบบทางเดินหายใจ),5=Stroke/ CVA (หลอดเลือดในสมอง),6=Renal disease (ไต),7=Cancer (มะเร็ง),8=Dyslipidemia (ไขมันในเลือดสูง),9=อื่นๆ]</th>
					<th>อื่นๆ ระบุ </th>
				</tr>
			</thead>
			<tbody>
				<tr parser-repeat="[detail_list]" id="row_{record_number}">
					<td style="text-align:center;">[{record_number}]</td>
					<td>{detail_patient_profile_id}</td>
					<td>{detail_service_information_id}</td>
					<td>{detail_ohac_id}</td>
					<td>{detail_patient_name}</td>
					<td>{detail_age}</td>
					<td>{detail_sex}</td>
					<td>{detail_right_medical}</td>
					<td>{detail_right_medical_remark}</td>
					<td>{detail_congenital_disease}</td>
					<td>{detail_congenital_disease_patient}</td>
					<td>{detail_congenital_disease_patient_remark}</td>
				</tr>
			</tbody>
		</table>
	</div>


</div>
<br/>
</div>