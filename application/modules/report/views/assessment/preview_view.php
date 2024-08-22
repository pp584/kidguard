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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Assessment</b></h3>
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
						<td class="text-right fit"><b>การบริหารจัดการตน :</b></td>
						<td>{record_self_management_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ทุนทางจิตวิทยา :</b></td>
						<td>{record_psychological_capital_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การเห็นคุณค่าในตนเอง :</b></td>
						<td>{record_self_esteem_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พลังตัวตน :</b></td>
						<td>{record_identity_power_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การคล้อยตามกลุ่มคนใช้สารเสพติด :</b></td>
						<td>{record_compliance_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ความรุนแรงในครอบครัว :</b></td>
						<td>{record_domestic_violence_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การเป็นแบบอย่างในการใช้สารเสพติด :</b></td>
						<td>{record_exemplary_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การเปิดรับเกี่ยวกับสื่อสารเสพติด :</b></td>
						<td>{record_media_exposure_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เจตคติทางบวกต่อการใช้สารเสพติด :</b></td>
						<td>{record_attitude_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การรับรู้แหล่งซื้อสารเสพติด :</b></td>
						<td>{record_source_purchase_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พลังครอบครัว :</b></td>
						<td>{record_family_power_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พลังสถานศึกษา :</b></td>
						<td>{record_school_power_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พลังเพื่อนและกิจกรรม :</b></td>
						<td>{record_friend_power_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>พลังชุมชน :</b></td>
						<td>{record_community_power_score}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>กลุ่ม :</b></td>
						<td>{record_group_type_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ปี :</b></td>
						<td>{record_data_year}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>วันที่สร้าง :</b></td>
						<td>{record_create_datetime}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>Section :</b></td>
						<td>{record_section}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>