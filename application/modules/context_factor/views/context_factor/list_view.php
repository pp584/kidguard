<!-- [ View File name : list_view.php ] -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title"><i class="fa fa-list-alt"></i> ตารางแสดงรายการ ข้อมูล<b>context_factor</b></h3>
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
					<option value="context_factor_id">id</option>
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
					<option value="context_factor_id|asc">id น้อย - มาก</option><option value="context_factor_id|desc">id มาก - น้อย</option>
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
						<th>ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด</th>
						<th>ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา</th>
						<th>ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน</th>
						<th>ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด</th>
						<th>5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน</th>
						<th>ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ</th>
						<th>การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน</th>
						<th>ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด</th>
						<th>ฉันถูกทำร้ายร่างกายจากคนในครอบครัว</th>
						<th>ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ</th>
						<th>ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ</th>
						<th>ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย</th>
						<th>ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย</th>
						<th>ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว</th>
						<th>ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน</th>
						<th>ฉันถูกห้ามไม่ให้คบเพื่อนบางคน</th>
						<th>ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน</th>
						<th>ฉันถูกห้ามไม่ให้ออกนอกบ้าน</th>
						<th>ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ</th>
						<th>คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น</th>
						<th>คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน</th>
						<th>ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ</th>
						<th>ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน</th>
						<th>เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา</th>
						<th>17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้</th>
						<th>คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน</th>
						<th>ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ</th>
						<th>ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น</th>
						<th>ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน</th>
						<th>ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์</th>
						<th>ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์</th>
						<th>ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น</th>
						<th>ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์</th>
						<th>ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น</th>
						<th>ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์</th>
						<th>ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น</th>
						<th>ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์</th>
						<th>คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด</th>
						<th>เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด</th>
						<th>คนในชุมชนชักชวนให้ฉันใช้สารเสพติด</th>
						<th>ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด</th>
						<th>ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด</th>
						<th>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด</th>
						<th>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด</th>
						<th>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว</th>
						<th>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ</th>
						<th>ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ</th>
						<th class="text-center" style="width:200px">จัดการข้อมูล</th>
					</tr>
				</thead>
				<tbody>
					<tr parser-repeat="[data_list]" id="row_{record_number}">
						<td style="text-align:center;">[{record_number}]</td>
						<td>{context_factor_id}</td>
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
									 data-context_factor_id = "{encrypt_context_factor_id}" data-row-number="{record_number}">
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
					<input type="hidden" name="encrypt_context_factor_id" />

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
