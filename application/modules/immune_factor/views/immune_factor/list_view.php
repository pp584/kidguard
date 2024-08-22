<!-- [ View File name : list_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-list-alt"></i> ตารางแสดงรายการ ข้อมูล<b>immune_factor</b></h3>
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
					<option value="immune_factor_id">id</option>
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
					<option value="immune_factor_id|asc">id น้อย - มาก</option><option value="immune_factor_id|desc">id มาก - น้อย</option>
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
						<th>ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง</th>
						<th>ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก</th>
						<th>ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ</th>
						<th>ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย</th>
						<th>ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร</th>
						<th>ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ</th>
						<th>เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง</th>
						<th>ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้</th>
						<th>ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้</th>
						<th>ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์)</th>
						<th>ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้</th>
						<th>ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้</th>
						<th>ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป</th>
						<th>ฉันถูกเบี่ยงเบนความสนใจได้ง่าย  ในขณะทำกิจกรรม</th>
						<th>ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ</th>
						<th>ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน</th>
						<th>ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน</th>
						<th>ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ</th>
						<th>ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ</th>
						<th>ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน</th>
						<th>ฉันจัดลำดับความสำคัญของงานที่จะทำได้</th>
						<th>การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน</th>
						<th>ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน</th>
						<th>ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์</th>
						<th>ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน</th>
						<th>ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง</th>
						<th>ฉันติดตามผลการปรับปรุงงานของตนเอง</th>
						<th>ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้</th>
						<th>ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้</th>
						<th>ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย</th>
						<th>ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้</th>
						<th>ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป</th>
						<th>ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว</th>
						<th>ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด</th>
						<th>เวลาประสบปัญหาเล็ก ๆ น้อย ๆ  ฉันแสดงออกทางอารมณ์มากเกินไป</th>
						<th>ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้</th>
						<th>ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ</th>
						<th>ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา</th>
						<th>ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว</th>
						<th>ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์</th>
						<th>ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ</th>
						<th>ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน</th>
						<th>ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้</th>
						<th>ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ</th>
						<th>ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค</th>
						<th>ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน</th>
						<th>ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ</th>
						<th>เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที</th>
						<th class="text-center" style="width:200px">จัดการข้อมูล</th>
					</tr>
				</thead>
				<tbody>
					<tr parser-repeat="[data_list]" id="row_{record_number}">
						<td style="text-align:center;">[{record_number}]</td>
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
						<td>{preview_question24}</td>
						<td>{preview_question25}</td>
						<td>{preview_question26}</td>
						<td>{preview_question27}</td>
						<td>{preview_question28}</td>
						<td>{preview_question29}</td>
						<td>{preview_question30}</td>
						<td>{preview_question31}</td>
						<td>{preview_question32}</td>
						<td>{preview_question33}</td>
						<td>{preview_question34}</td>
						<td>{preview_question35}</td>
						<td>{preview_question36}</td>
						<td>{preview_question37}</td>
						<td>{preview_question38}</td>
						<td>{preview_question39}</td>
						<td>{preview_question40}</td>
						<td>{preview_question41}</td>
						<td>{preview_question42}</td>
						<td>{preview_question43}</td>
						<td>{preview_question44}</td>
						<td>{preview_question45}</td>
						<td>{preview_question46}</td>
						<td>{preview_question47}</td>
						<td>{preview_question48}</td>
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
									 data-immune_factor_id = "{encrypt_immune_factor_id}" data-row-number="{record_number}">
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
					<input type="hidden" name="encrypt_immune_factor_id" />

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
