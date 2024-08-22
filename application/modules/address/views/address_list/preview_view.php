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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Address_list</b></h3>
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
						<td class="text-right fit"><b>Id :</b></td>
						<td>{record_id}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง นักเรียน Ref Student Id Firstname :</b></td>
					<td>{refStudentIdFirstname}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง นักเรียน Ref Student Id Lastname :</b></td>
					<td>{refStudentIdLastname}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ชื่อภาค Ref Geo Id GEO NAME :</b></td>
					<td>{refGeoIdGEONAME}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>ไอดีจังหวัด :</b></td>
						<td>{preview_ref_province_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ไอดีอำเภอ :</b></td>
						<td>{preview_ref_amphur_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ไอดีตำบล :</b></td>
						<td>{preview_ref_district_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>รหัสไปรษณีย์ :</b></td>
						<td>{record_zip_code}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เลขที่,หมู่ที่,หมู่บ้าน,อาคาร,ถนน,ซอย,อื่นๆ :</b></td>
						<td>{record_address}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คำอธิบายเพิ่มเติม :</b></td>
						<td>{record_remark}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>