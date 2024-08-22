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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Service_information</b></h3>
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
		<h3 class="card-title">ตารางรายการ <b>service_information_users</b></h3></h3>
	</div>
	
	<div class="card-body">	<div class="table-responsive">
		<table class="table  table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th width="20px;">#</th>
					<th>Id</th>
					<th>User_id</th>
					<th>Service_information_id</th>
				</tr>
			</thead>
			<tbody>
				<tr parser-repeat="[detail_list]" id="row_{record_number}">
					<td style="text-align:center;">[{record_number}]</td>
					<td>{detail_id}</td>
					<td>{detailUserIdFirstname} {detailUserIdLastname}</td>
					<td>{detail_service_information_id}</td>
				</tr>
			</tbody>
		</table>
	</div>


</div>
<br/>
</div>