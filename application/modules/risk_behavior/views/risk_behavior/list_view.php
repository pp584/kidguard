<!-- [ View File name : list_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-list-alt"></i> ตารางแสดงรายการ ข้อมูล<b>risk_behavior</b></h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-12 mb-3">
				<div class="text-right">
					<a href="{page_url}/add" class="btn btn-success btn-lg" data-toggle="tooltip" title="เพิ่มข้อมูลใหม่">
						<i class="fa fa-plus-square"></i></span> เพิ่มรายการใหม่
					</a>
		</div>
		</div>
			<div class="col-sm-12 col-md-9">
				<form class="form-inline well well-sm" name="formSearch" method="post" action="{page_url}/search">
					{csrf_protection_field}
					<a href="{page_url}" class="btn btn-info">ทั้งหมด</a>
					<div class="form-group">
						<select  class="form-control" name="search_field" class="span2">
					<option value="risk_behavior_id">id</option>
						</select>
 					</div>
					<div class="form-group">
						<input type="text" class="form-control col" id="txtSearch" name="txtSearch" value="{txt_search}">
					</div>
					<input type="hidden" value="{order_by}" name="order_by"/>
					<button type="submit" name="submit" class="btn btn-info">
						<span class="glyphicon glyphicon-search"></span> ค้นหา
					</button>
				</form>
			</div>
			<div class="col-sm-12 col-md-3">
				<div class="pull-right text-right">
					<div class="form-group">
						<select  class="form-control" id="set_order_by" class="span2" value="{order_by}">
					<option value="">- จัดเรียงตาม -</option>
					<option value="risk_behavior_id|asc">id น้อย - มาก</option><option value="risk_behavior_id|desc">id มาก - น้อย</option>
						</select>
 					</div>
				</div>
			</div>
		</div>
		<div class="row dataTables_wrapper">
			<div class="col-sm-12 col-md-5">
				<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
					แสดงรายการที่ <span class="badge badge-default">{start_row}</span> ถึง <b>{end_row}</b> จากทั้งหมด <span class="badge badge-info"> {search_row}</span> รายการ
				</div>
			</div>
			<div class="col-sm-12 col-md-7">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
					{pagination_link}
				</div>
			</div>
		</div>

		<div class="table-responsive">

			<table class="table table-bordered table-striped table-hover">
				<thead class="info">
					<tr bgcolor="#dddddd">
						<th width="20px;">#</th>
						<th>id</th>
						<th>basic_information_id</th>
						<th>ฉันเป็นคนมีสาระ</th>
						<th>ฉันไม่คิดก่อนพูด</th>
						<th>ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม</th>
						<th>ฉันรู้สึกมีความสุขในชีวิต</th>
						<th>เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง</th>
						<th>ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย</th>
						<th>ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง</th>
						<th>ฉันรู้สึกวิตกกังวลจนปวดศีรษะ</th>
						<th>ฉันรู้สึกกังวลในการทำบางสิ่ง</th>
						<th>ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง</th>
						<th>ฉันทำอะไรโดยไม่คิด</th>
						<th>ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง</th>
						<th>ฉันมีความภาคภูมิใจในตนเอง</th>
						<th>ฉันเป็นคนขี้กลัว  เวลาจะทำอะไรมักจะวิตกกังวล</th>
						<th>ฉันเป็นคนหุนหันพลันแล่น</th>
						<th>ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ</th>
						<th>ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ</th>
						<th>ฉันใช้อารมณ์มากกว่าเหตุผล</th>
						<th>ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น</th>
						<th>ฉันมีความพอใจในชีวิตของตนเอง</th>
						<th>ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง</th>
						<th>ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ</th>
						<th>ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง</th>
						<th class="text-center" style="width:200px">จัดการข้อมูล</th>
					</tr>
				</thead>
				<tbody>
					<tr parser-repeat="[data_list]" id="row_{record_number}">
						<td style="text-align:center;">[{record_number}]</td>
						<td>{risk_behavior_id}</td>
						<td>{basic_information_id}</td>
						<td>{preview_question1}</td>
						<td>{preview_question2}</td>
						<td>{preview_question3}</td>
						<td>{preview_question4}</td>
						<td>{preview_question5}</td>
						<td>{preview_question6}</td>
						<td>{preview_question7}</td>
						<td>{preview_question8}</td>
						<td>{preview_question9}</td>
						<td>{preview_question10}</td>
						<td>{preview_question11}</td>
						<td>{preview_question12}</td>
						<td>{preview_question13}</td>
						<td>{preview_question14}</td>
						<td>{preview_question15}</td>
						<td>{preview_question16}</td>
						<td>{preview_question17}</td>
						<td>{preview_question18}</td>
						<td>{preview_question19}</td>
						<td>{preview_question20}</td>
						<td>{preview_question21}</td>
						<td>{preview_question22}</td>
						<td>{preview_question23}</td>
						<td>
							<div class="btn-group pull-right">
								<a href="{page_url}/preview/{url_encrypt_id}" target="_blank" 
									class="my-tooltip btn btn-info btn-sm"
									data-toggle="tooltip" title="แสดงข้อมูลรายละเอียด">
									<i class="fa fa-list"></i> รายละเอียด
								</a>
								<a href="{page_url}/edit/{url_encrypt_id}" target="_blank" 
									class="my-tooltip btn btn-warning btn-sm"
									data-toggle="tooltip" title="แก้ไขข้อมูล">
									<i class="fa fa-edit"></i> แก้ไข
								</a>
								<a href="javascript:void(0);" class="btn-delete-row my-tooltip btn btn-danger btn-sm"
									data-toggle="tooltip" title="ลบรายการนี้"
									 data-risk_behavior_id = "{encrypt_risk_behavior_id}" data-row-number="{record_number}">
									<i class="fa fa-trash"></i> ลบ
								</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="row dataTables_wrapper">
			<div class="col-sm-12 col-md-5">
				<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
					แสดงรายการที่ <b>{start_row}</b> ถึง <b>{end_row}</b> จากทั้งหมด <span class="badge badge-info"> {search_row}</span> รายการ
				</div>
			</div>
			<div class="col-sm-12 col-md-7">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
					{pagination_link}
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="confirmDelModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="confirmDelModalLabel">ยืนยันการลบข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<h4 class="text-center">***  ท่านต้องการลบข้อมูลแถวที่ <span id="xrow"></span> ???  ***</h4>
				<div id="div_del_detail"></div>
				<form id="formDelete">
					<div class="form-group">
						<div class="col-sm-8">
<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="delete_remark">
					</div>
				</div>
					<input type="hidden" name="encrypt_risk_behavior_id" />

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				<button type="button" class="btn btn-danger" id="btn_confirm_delete" ><i class="fas fa-trash-alt"></i> Delete</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreviewLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modalPreviewLabel">แสดงข้อมูล</h4>
			</div>
			<div class="modal-body">
				<div id="divPreview"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button> 
			</div>
		</div>
	</div>
</div>
<script>
	var param_search_field = '{search_field}';
	var param_current_page = '{current_page_offset}';
	var param_current_path = '{current_path_uri}';
</script>
