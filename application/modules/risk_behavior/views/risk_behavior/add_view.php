<!-- [ View File name : add_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-plus-square"></i> เพิ่มข้อมูล <strong>Risk_behavior</strong></h3>
		</div>
		<div class="card-body">
			<form class="form-horizontal" id="formAdd" accept-charset="utf-8">
				{csrf_protection_field}
				<div class="form-group">
					<label class="col-sm-2 control-label" for="basic_information_id">basic_information_id  :</label>
					<div class="col-sm-10">

						<input type="text" class="form-control " id="basic_information_id" name="basic_information_id" value=""  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question1">ฉันเป็นคนมีสาระ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question11"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question11">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question12"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question12">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question13"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question13">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question14"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question14">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question2">ฉันไม่คิดก่อนพูด  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question21"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question21">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question22"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question22">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question23"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question23">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question24"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question24">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question3">ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question31"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question31">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question32"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question32">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question33"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question33">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question34"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question34">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question4">ฉันรู้สึกมีความสุขในชีวิต  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question41"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question41">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question42"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question42">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question43"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question43">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question44"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question44">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question5">เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question51"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question51">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question52"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question52">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question53"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question53">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question54"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question54">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question6">ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question61"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question61">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question62"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question62">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question63"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question63">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question64"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question64">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question7">ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question71"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question71">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question72"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question72">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question73"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question73">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question74"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question74">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question8">ฉันรู้สึกวิตกกังวลจนปวดศีรษะ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question81"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question81">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question82"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question82">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question83"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question83">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question84"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question84">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question9">ฉันรู้สึกกังวลในการทำบางสิ่ง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question91"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question91">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question92"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question92">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question93"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question93">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question94"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question94">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question10">ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question101"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question101">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question102"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question102">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question103"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question103">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question104"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question104">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question11">ฉันทำอะไรโดยไม่คิด  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question111"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question111">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question112"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question112">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question113"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question113">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question114"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question114">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question12">ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question121"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question121">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question122"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question122">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question123"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question123">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question124"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question124">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question13">ฉันมีความภาคภูมิใจในตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question131"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question131">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question132"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question132">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question133"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question133">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question134"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question134">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question14">ฉันเป็นคนขี้กลัว  เวลาจะทำอะไรมักจะวิตกกังวล  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question141"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question141">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question142"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question142">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question143"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question143">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question144"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question144">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question15">ฉันเป็นคนหุนหันพลันแล่น  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question151"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question151">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question152"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question152">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question153"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question153">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question154"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question154">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question16">ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question161"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question161">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question162"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question162">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question163"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question163">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question164"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question164">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question17">ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question171"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question171">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question172"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question172">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question173"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question173">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question174"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question174">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question18">ฉันใช้อารมณ์มากกว่าเหตุผล  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question181"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question181">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question182"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question182">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question183"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question183">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question184"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question184">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question19">ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question191"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question191">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question192"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question192">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question193"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question193">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question194"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question194">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question20">ฉันมีความพอใจในชีวิตของตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question201"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question201">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question202"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question202">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question203"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question203">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question204"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question204">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question21">ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question211"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question211">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question212"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question212">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question213"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question213">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question214"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question214">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question22">ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question221"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question221">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question222"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question222">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question223"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question223">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question224"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question224">จริง</label>
</div>

					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="question23">ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง  :</label>
					<div class="col-sm-10">

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question231"
									value="1" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question231">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question232"
									value="2" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question232">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question233"
									value="3" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question233">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question234"
									value="4" class="form-check-input"
									autocomplete="off"  />
<label class="form-check-label" for="question234">จริง</label>
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
