.<div class="card">
	<div class="card-body">
		<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
			<div class="row p-0">
				<div class="col-md-12">
					<h4>แบบสอบถาม สำหรับกลุ่มเด็กช่วงอายุ 13-15 ปี</h4>
				</div>
				<div class="col-md-12">
					<span> แบบสอบถามฉบับนี้เป็นส่วนหนึ่งของโครงการวิจัยและพัฒนาแอพพลิเคชั่นติดตามสภาพการณ์ปัจจัยภูมิคุ้มกัน ปัจจัยบริบทและพฤติกรรมเสี่ยงต่อการใช้สารเสพติดในกลุ่มเด็กช่วงอายุ 13-15 ปีโดยแบบสอบถามแบ่งเป็น 4 ตอน </span>
					<table class="table" style="margin-top: 20px;">
						<tr>
							<th>ตอนที่ 1 </th>
							<td>ข้อมูลพื้นฐาน</td>
						</tr>
						<tr>
							<th>ตอนที่ 2</th>
							<td>ปัจจัยภูมิคุ้มกัน (การบริหารจัดการตนเอง, ทุนทางจิตวิทยา, การเห็นคุณค่าในตนเองและพลังตัวตน)</td>
						</tr>
						<tr>
							<th> ตอนที่ 3 </th>
							<td>ปัจจัยบริบท (การคล้อยตาม, ครอบครัว, การเป็นแบบอย่าง, การเปิดรับสื่อ, พลังด้านต่างๆ และเจตคติและการรับรู้แหล่ง)</td>
						</tr>
						<tr>
							<th>ตอนที่ 3 </th>
							<td>ปัจจัยบริบท (การคล้อยตาม, ครอบครัว, การเป็นแบบอย่าง, การเปิดรับสื่อ, พลังด้านต่าง ๆ<br />
								และเจตคติและการรับรู้แหล่ง)</td>
						</tr>
						<tr>
							<th>ตอนที่ 4</th>
							<td>พฤติกรรมเสี่ยง</td>
						</tr>
					</table>
					<hr>

					<span style="font-size: small;">
						สารเสพติด หมายถึง ยาหรือสารเคมี ซึ่งเมื่อเสพหรือฉีดเข้าสู่ร่างกายติดต่อกันช่วงระยะเวลาหนึ่งก็จะติดก่อให้เกิดพิษเรื้อรัง ทำให้ร่างกายและจิตใจเสื่อมโทรม เช่น ยาบ้า ยาอี ยาเค ฝิ่น เฮโรอีน กัญชา ทินเนอร์ กาว ยาไอซ์ สุรา บุหรี่ เป็นต้น
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div align="center" style="margin-top: 20px;">
						<input type="hidden" id="add_encrypt_id" />
						<button type="button" id="btnConfirmEvaluate" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
							&nbsp;&nbsp;ทำแบบสอบถาม &nbsp;&nbsp;
						</button>
					</div>
				</div>
			</div>
		</form>
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h4 class="modal-title text-white" id="addModalLabel">ยืนยันเริ่มทำแบบสอบถาม</h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p class="alert alert-warning">
							แบบสอบถามฉบับนี้ มีการเก็บข้อมูลส่วนตัวของผู้ตอบแบบสอบถาม
							เพื่อวัตถุประสงค์ในการวิเคราะห์ข้อมูลเชิงสถิติโดยไม่มีการเปิดเผย
							ตัวตนของผู้ตอบแบบสอบถาม
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
						<button type="button" class="btn btn-primary" id="btnSaveToForm">ดำเนินการต่อ</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>