
<style>
	body {
		font-family: 'TH SarabunPSK';
		font-size : 16pt;
		margin : 0px;
	}
	table{
		width : 100%;
		border-collapse: collapse;
	}
	table { page-break-inside:auto; }
	
	th {
	   background-color:lightgrey;
	   text-align : center;
	}
</style>

<h3 class="card-title"><i class="fa fa-list-alt"></i> ตารางแสดงรายการ ข้อมูล <b>patient_profile</b></h3>
<table border="0.1" cellpadding="2">
	<thead class="info">
		<tr bgcolor="#dddddd">
			<th width="20px;">#</th>						<th>service_information_id</th>
						<th>รหัส OHAC-ID</th>
						<th>ชื่อผู้ป่วย</th>
						<th>อายุ</th>
						<th>เพศ</th>
						<th>สิทธิการรักษา</th>
						<th>อื่นๆ ระบุ</th>
						<th>โรคประจำตัว</th>
						<th>โรคประจำตัว</th>
						<th>อื่นๆ ระบุ</th>
</tr>
	</thead>
	<tbody>
		<tr parser-repeat="[data_list]" id="row_{record_number}">
			<td  width="20px;">[{record_number}]</td>						<td>{serviceInformationIdServiceUnitName}</td>
						<td>{ohac_id}</td>
						<td>{patient_name}</td>
						<td>{age}</td>
						<td>{preview_sex}</td>
						<td>{preview_right_medical}</td>
						<td>{right_medical_remark}</td>
						<td>{preview_congenital_disease}</td>
						<td>{preview_congenital_disease_patient}</td>
						<td>{congenital_disease_patient_remark}</td>
</tr>
	</tbody>
</table>