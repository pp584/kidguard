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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Academic_year</b></h3>
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
					<td class="text-right fit"><b>ปีการศึกษา Thai Year Year Num :</b></td>
					<td>{thaiYearYearNum}</td>
				</tr>
					<tr>
						<td class="text-right fit"><b>เทอม :</b></td>
						<td>{record_term}</td>
					</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง ตารางห้อง Class Room Room Name :</b></td>
					<td>{classRoomRoomName}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง ตารางนักเรียน Ref Student Id Prefix Name :</b></td>
					<td>{refStudentIdPrefixName}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง ตารางนักเรียน Ref Student Id Firstname :</b></td>
					<td>{refStudentIdFirstname}</td>
				</tr>
				<tr>
					<td class="text-right fit"><b>ชื่ออ้างอิง ตารางนักเรียน Ref Student Id Lastname :</b></td>
					<td>{refStudentIdLastname}</td>
				</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>