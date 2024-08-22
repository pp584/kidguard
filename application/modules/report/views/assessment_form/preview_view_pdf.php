<!-- [ View File name : preview_view.php ] -->

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

			<table class="table table-bordered table-hover">
				<thead class="well">
					<tr>
						<th class="text-right fit">หัวข้อ</th>
						<th>ข้อมูล</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td class="text-right fit"><b>id :</b></td>
						<td>{record_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>assessment_code :</b></td>
						<td>{record_assessment_code}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>create_date :</b></td>
						<td>{record_create_date}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>Draf :</b></td>
						<td>{record_draf}</td>
					</tr>

				</tbody>
			</table>
