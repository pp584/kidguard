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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Treatment_information</b></h3>
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
						<td class="text-right fit"><b>การบันทึกเวลา ROSC (การกลับมามีสัญญาณชีพ) ครั้งแรกเมื่อทีมปฏิบัติการแพทย์ฉุกเฉินไปถึง :</b></td>
						<td>{preview_rosc_time_save}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การทำ CPR ของทีมปฏิบัติการแพทย์ฉุกเฉิน :</b></td>
						<td>{preview_cpr}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่เริ่ม CPR ณ จุดเกิดเหตุ :</b></td>
						<td>{record_time_cpr_start}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เวลาที่สิ้นสุดการ CPR ณ จุดเกิดเหตุ :</b></td>
						<td>{record_time_cpr_end}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การมี ROSC (การกลับมามีสัญญาณชีพ) :</b></td>
						<td>{preview_rosc_time_alert}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>มี :</b></td>
						<td>{preview_rta_have}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่ :</b></td>
						<td>{preview_cpr_rosc_nomal}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การใช้ Defibrillator :</b></td>
						<td>{preview_use_defibrillator}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การประเมิน EKG หลังทำ CPR :</b></td>
						<td>{preview_ekg}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>จำนวนครั้งการกระตุกหัวใจที่ได้รับ :</b></td>
						<td>{record_defibrillations_number}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การเปิดทางเดินหายใจ :</b></td>
						<td>{preview_airway_opening}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ) :</b></td>
						<td>{preview_airway_management}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>Non-definite airway :</b></td>
						<td>{preview_non_definite_airway}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>Definite airway :</b></td>
						<td>{preview_definite_airway}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การ Stop bleeding (การห้ามเลือด) :</b></td>
						<td>{preview_stop_bleeding}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การให้สารน้ำทางหลอดเลือดดำ :</b></td>
						<td>{preview_intravenous_fluid}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ให้ :</b></td>
						<td>{preview_intravenous_fluid_yes}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ :</b></td>
						<td>{record_intravenous_fluid_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การให้ยา :</b></td>
						<td>{preview_drug}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ให้ :</b></td>
						<td>{preview_drag_yes}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>อื่นๆ ระบุ :</b></td>
						<td>{record_drug_remark}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ :</b></td>
						<td>{preview_hkw_local}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) อย่างต่อเนื่องจนถึงโรงพยาบาล :</b></td>
						<td>{preview_hkw_hospital}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เครื่อง Auto CPR :</b></td>
						<td>{preview_auto_cpr}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>มีเครื่อง Auto CPR :</b></td>
						<td>{preview_auto_cpr_yes}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>สาเหตุการหยุด Resuscitation :</b></td>
						<td>{preview_course_resuscitation}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผลลัพธ์การ CPR :</b></td>
						<td>{preview_cpr_output}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>