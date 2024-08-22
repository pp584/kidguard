<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Immune_factor</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question1">ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question11"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question11">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question12"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question12">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question13"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question13">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question14"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question14">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question2">ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question21"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question21">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question22"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question22">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question23"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question23">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question24"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question24">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question3">ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question31"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question31">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question32"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question32">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question33"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question33">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question34"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question34">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question4">ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question41"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question41">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question42"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question42">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question43"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question43">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question44"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question44">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question5">ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question51"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question51">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question52"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question52">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question53"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question53">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question54"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question54">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question6">ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question61"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question61">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question62"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question62">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question63"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question63">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question64"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question64">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question7">เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question71"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question71">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question72"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question72">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question73"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question73">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question74"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question74">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question8">ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question81"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question81">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question82"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question82">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question83"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question83">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question84"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question84">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question9">ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question91"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question91">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question92"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question92">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question93"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question93">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question94"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question94">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question10">ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์)  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question101"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question101">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question102"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question102">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question103"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question103">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question104"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question104">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question11">ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question111"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question111">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question112"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question112">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question113"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question113">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question114"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question114">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question12">ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question121"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question121">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question122"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question122">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question123"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question123">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question124"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question124">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question13">ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question131"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question131">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question132"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question132">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question133"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question133">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question134"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question134">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question14">ฉันถูกเบี่ยงเบนความสนใจได้ง่าย  ในขณะทำกิจกรรม  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question141"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question141">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question142"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question142">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question143"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question143">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question144"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question144">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question15">ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question151"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question151">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question152"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question152">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question153"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question153">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question154"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question154">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question16">ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question161"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question161">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question162"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question162">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question163"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question163">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question164"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question164">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question17">ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question171"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question171">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question172"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question172">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question173"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question173">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question174"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question174">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question18">ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question181"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question181">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question182"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question182">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question183"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question183">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question184"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question184">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question19">ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question191"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question191">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question192"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question192">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question193"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question193">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question194"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question194">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question20">ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question201"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question201">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question202"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question202">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question203"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question203">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question204"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question204">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question21">ฉันจัดลำดับความสำคัญของงานที่จะทำได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question211"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question211">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question212"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question212">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question213"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question213">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question214"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question214">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question22">การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question221"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question221">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question222"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question222">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question223"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question223">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question224"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question224">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question23">ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question231"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question231">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question232"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question232">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question233"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question233">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question234"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question234">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question24">ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question241"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question241">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question242"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question242">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question243"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question243">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question244"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question244">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question25">ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question251"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question251">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question252"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question252">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question253"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question253">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question254"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question254">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question26">ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question261"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question261">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question262"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question262">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question263"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question263">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question264"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question264">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question27">ฉันติดตามผลการปรับปรุงงานของตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question271"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question271">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question272"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question272">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question273"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question273">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question274"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question274">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question28">ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question281"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question281">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question282"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question282">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question283"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question283">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question284"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question284">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question29">ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question291"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question291">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question292"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question292">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question293"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question293">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question294"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question294">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question30">ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question301"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question301">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question302"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question302">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question303"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question303">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question304"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question304">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question31">ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question311"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question311">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question312"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question312">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question313"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question313">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question314"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question314">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question32">ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question321"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question321">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question322"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question322">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question323"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question323">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question324"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question324">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question33">ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question331"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question331">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question332"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question332">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question333"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question333">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question334"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question334">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question34">ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question341"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question341">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question342"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question342">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question343"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question343">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question344"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question344">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question35">เวลาประสบปัญหาเล็ก ๆ น้อย ๆ  ฉันแสดงออกทางอารมณ์มากเกินไป  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question351"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question351">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question352"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question352">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question353"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question353">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question354"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question354">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question36">ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question361"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question361">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question362"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question362">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question363"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question363">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question364"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question364">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question37">ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question371"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question371">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question372"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question372">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question373"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question373">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question374"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question374">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question38">ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question381"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question381">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question382"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question382">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question383"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question383">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question384"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question384">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question39">ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question391"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question391">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question392"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question392">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question393"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question393">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question394"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question394">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question40">ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question401"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question401">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question402"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question402">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question403"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question403">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question404"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question404">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question41">ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question411"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question411">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question412"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question412">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question413"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question413">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question414"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question414">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question42">ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question421"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question421">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question422"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question422">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question423"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question423">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question424"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question424">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question43">ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question431"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question431">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question432"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question432">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question433"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question433">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question434"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question434">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question44">ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question441"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question441">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question442"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question442">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question443"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question443">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question444"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question444">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question45">ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question451"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question451">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question452"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question452">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question453"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question453">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question454"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question454">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question46">ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question461"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question461">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question462"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question462">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question463"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question463">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question464"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question464">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question47">ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question471"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question471">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question472"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question472">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question473"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question473">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question474"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question474">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question48">เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question48" id="question481"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question481">ไม่เลย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question48" id="question482"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question482">บางครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question48" id="question483"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question483">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question48" id="question484"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question484">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" id="add_encrypt_id" />
						<button type="button" id="btnConfirmSave"
							class="btn btn-primary btn-lg" data-toggle="modal"
							data-target="#addModal" >
							&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
						</button>
					</div>
				</div>

			</form>
		</div> <!--panel-body-->
	</div> <!--panel-->
</div> <!--contrainer-->

<!-- Modal Confirm Save -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title" id="addModalLabel">บันทึกข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p class="alert alert-warning">ยืนยันการบันทึกข้อมูล ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> ปิด</button>
				<button type="button" class="btn btn-primary" id="btnSave"><i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>
