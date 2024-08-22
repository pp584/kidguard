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
		<h3 class="card-title"><i class="fa fa-clipboard"></i> รายละเอียด <b>Context_factor</b></h3>
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
						<td class="text-right fit"><b>id :</b></td>
						<td>{record_context_factor_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>basic_information_id :</b></td>
						<td>{record_basic_information_id}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด :</b></td>
						<td>{preview_question1}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา :</b></td>
						<td>{preview_question2}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน :</b></td>
						<td>{preview_question3}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด :</b></td>
						<td>{preview_question4}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน :</b></td>
						<td>{preview_question5}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ :</b></td>
						<td>{preview_question6}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน :</b></td>
						<td>{preview_question7}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด :</b></td>
						<td>{preview_question8}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกทำร้ายร่างกายจากคนในครอบครัว :</b></td>
						<td>{preview_question9}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ :</b></td>
						<td>{preview_question10}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ :</b></td>
						<td>{preview_question11}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย :</b></td>
						<td>{preview_question12}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย :</b></td>
						<td>{preview_question13}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว :</b></td>
						<td>{preview_question14}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน :</b></td>
						<td>{preview_question15}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกห้ามไม่ให้คบเพื่อนบางคน :</b></td>
						<td>{preview_question16}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน :</b></td>
						<td>{preview_question17}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกห้ามไม่ให้ออกนอกบ้าน :</b></td>
						<td>{preview_question18}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ :</b></td>
						<td>{preview_question19}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น :</b></td>
						<td>{preview_question20}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน :</b></td>
						<td>{preview_question21}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ :</b></td>
						<td>{preview_question22}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน :</b></td>
						<td>{preview_question23}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา :</b></td>
						<td>{preview_question24}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้ :</b></td>
						<td>{preview_question25}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน :</b></td>
						<td>{preview_question26}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ :</b></td>
						<td>{preview_question27}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น :</b></td>
						<td>{preview_question28}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน :</b></td>
						<td>{preview_question29}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์ :</b></td>
						<td>{preview_question30}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ :</b></td>
						<td>{preview_question31}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น :</b></td>
						<td>{preview_question32}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ :</b></td>
						<td>{preview_question33}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น :</b></td>
						<td>{preview_question34}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ :</b></td>
						<td>{preview_question35}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น :</b></td>
						<td>{preview_question36}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์ :</b></td>
						<td>{preview_question37}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด :</b></td>
						<td>{preview_question38}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด :</b></td>
						<td>{preview_question39}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>คนในชุมชนชักชวนให้ฉันใช้สารเสพติด :</b></td>
						<td>{preview_question40}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด :</b></td>
						<td>{preview_question41}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด :</b></td>
						<td>{preview_question42}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด :</b></td>
						<td>{preview_question43}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด :</b></td>
						<td>{preview_question44}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว :</b></td>
						<td>{preview_question45}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ :</b></td>
						<td>{preview_question46}</td>
					</tr>
					<tr>
						<td class="text-right fit"><b>ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ :</b></td>
						<td>{preview_question47}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>