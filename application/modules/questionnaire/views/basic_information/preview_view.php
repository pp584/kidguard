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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Basic_information</b></h3>
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
					<td class="text-right fit"><b>จังหวัด :</b></td>
					<td>{provinceNameTh}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>เพศ :</b></td>
						<td>{preview_sex}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อายุ :</b></td>
						<td>{record_age}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สถานภาพการศึกษา :</b></td>
						<td>{preview_edu1}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่ :</b></td>
						<td>{preview_edu_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>จำนวนพี่น้อง :</b></td>
						<td>{preview_sisbro}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{record_sisbro_remain}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สถานภาพทางครอบครัว :</b></td>
						<td>{preview_family_status}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อาชีพของบิดา :</b></td>
						<td>{preview_dad_job}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{record_dad_job_remain}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อาชีพของมารดา :</b></td>
						<td>{preview_mom_job}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{record_mom_job_remain}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รายได้ของครบอครัว :</b></td>
						<td>{preview_family_earn}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง(ตอบได้มากกว่า1ข้อ) :</b></td>
						<td>{preview_consult}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{record_consult_remain}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ท่านเคยถูกให้ลองสารเสพติดหรือไม่ :</b></td>
						<td>{preview_try_drugs}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ท่านเคยลองใช้สารเสพติดใดบ้าง(ตอบได้มากกว่า1ข้อ) :</b></td>
						<td>{preview_type_drugs}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ :</b></td>
						<td>{record_type_drugs_remain}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>