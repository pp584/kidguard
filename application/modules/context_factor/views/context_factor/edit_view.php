<!--  [ View File name : edit_view.php ] -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title"><i class="fa fa-edit"></i> แก้ไขข้อมูล <strong>context_factor</strong></h3>
		</div>
		<div class="card-body">
			<form class='form-horizontal' id='formEdit' accept-charset='utf-8'>
				{csrf_protection_field}
				<input type="hidden" name="submit_case" value="edit" />
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='context_factor_id'>id  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="context_factor_id" name="context_factor_id" value="{record_context_factor_id}" readonly="readonly" />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='basic_information_id'>basic_information_id  :</label>
					<div class='col-sm-10'>

						<input type="text" class="form-control " id="basic_information_id" name="basic_information_id" value="{record_basic_information_id}"  />
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question1'>ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question11"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question1}" />
<label class="form-check-label" for="question11">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question12"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question1}" />
<label class="form-check-label" for="question12">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question13"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question1}" />
<label class="form-check-label" for="question13">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question1" id="question14"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question1}" />
<label class="form-check-label" for="question14">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question2'>ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question21"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question2}" />
<label class="form-check-label" for="question21">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question22"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question2}" />
<label class="form-check-label" for="question22">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question23"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question2}" />
<label class="form-check-label" for="question23">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question2" id="question24"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question2}" />
<label class="form-check-label" for="question24">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question3'>ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question31"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question3}" />
<label class="form-check-label" for="question31">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question32"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question3}" />
<label class="form-check-label" for="question32">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question33"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question3}" />
<label class="form-check-label" for="question33">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question3" id="question34"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question3}" />
<label class="form-check-label" for="question34">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question4'>ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question41"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question4}" />
<label class="form-check-label" for="question41">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question42"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question4}" />
<label class="form-check-label" for="question42">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question43"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question4}" />
<label class="form-check-label" for="question43">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question4" id="question44"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question4}" />
<label class="form-check-label" for="question44">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question5'>5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question51"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question5}" />
<label class="form-check-label" for="question51">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question52"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question5}" />
<label class="form-check-label" for="question52">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question53"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question5}" />
<label class="form-check-label" for="question53">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question5" id="question54"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question5}" />
<label class="form-check-label" for="question54">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question6'>ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question61"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question6}" />
<label class="form-check-label" for="question61">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question62"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question6}" />
<label class="form-check-label" for="question62">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question63"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question6}" />
<label class="form-check-label" for="question63">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question6" id="question64"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question6}" />
<label class="form-check-label" for="question64">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question7'>การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question71"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question7}" />
<label class="form-check-label" for="question71">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question72"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question7}" />
<label class="form-check-label" for="question72">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question73"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question7}" />
<label class="form-check-label" for="question73">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question7" id="question74"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question7}" />
<label class="form-check-label" for="question74">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question8'>ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question81"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question8}" />
<label class="form-check-label" for="question81">ไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question82"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question8}" />
<label class="form-check-label" for="question82">ค่อนข้างไม่จริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question83"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question8}" />
<label class="form-check-label" for="question83">ค่อนข้างจริง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question8" id="question84"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question8}" />
<label class="form-check-label" for="question84">จริง</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question9'>ฉันถูกทำร้ายร่างกายจากคนในครอบครัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question91"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question9}" />
<label class="form-check-label" for="question91">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question92"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question9}" />
<label class="form-check-label" for="question92">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question93"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question9}" />
<label class="form-check-label" for="question93">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question9" id="question94"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question9}" />
<label class="form-check-label" for="question94">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question10'>ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question101"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question10}" />
<label class="form-check-label" for="question101">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question102"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question10}" />
<label class="form-check-label" for="question102">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question103"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question10}" />
<label class="form-check-label" for="question103">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question10" id="question104"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question10}" />
<label class="form-check-label" for="question104">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question11'>ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question111"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question11}" />
<label class="form-check-label" for="question111">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question112"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question11}" />
<label class="form-check-label" for="question112">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question113"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question11}" />
<label class="form-check-label" for="question113">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question11" id="question114"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question11}" />
<label class="form-check-label" for="question114">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question12'>ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question121"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question12}" />
<label class="form-check-label" for="question121">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question122"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question12}" />
<label class="form-check-label" for="question122">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question123"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question12}" />
<label class="form-check-label" for="question123">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question12" id="question124"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question12}" />
<label class="form-check-label" for="question124">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question13'>ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question131"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question13}" />
<label class="form-check-label" for="question131">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question132"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question13}" />
<label class="form-check-label" for="question132">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question133"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question13}" />
<label class="form-check-label" for="question133">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question13" id="question134"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question13}" />
<label class="form-check-label" for="question134">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question14'>ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question141"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question14}" />
<label class="form-check-label" for="question141">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question142"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question14}" />
<label class="form-check-label" for="question142">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question143"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question14}" />
<label class="form-check-label" for="question143">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question14" id="question144"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question14}" />
<label class="form-check-label" for="question144">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question15'>ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question151"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question15}" />
<label class="form-check-label" for="question151">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question152"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question15}" />
<label class="form-check-label" for="question152">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question153"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question15}" />
<label class="form-check-label" for="question153">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question15" id="question154"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question15}" />
<label class="form-check-label" for="question154">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question16'>ฉันถูกห้ามไม่ให้คบเพื่อนบางคน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question161"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question16}" />
<label class="form-check-label" for="question161">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question162"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question16}" />
<label class="form-check-label" for="question162">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question163"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question16}" />
<label class="form-check-label" for="question163">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question16" id="question164"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question16}" />
<label class="form-check-label" for="question164">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question17'>ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question171"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question17}" />
<label class="form-check-label" for="question171">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question172"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question17}" />
<label class="form-check-label" for="question172">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question173"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question17}" />
<label class="form-check-label" for="question173">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question17" id="question174"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question17}" />
<label class="form-check-label" for="question174">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question18'>ฉันถูกห้ามไม่ให้ออกนอกบ้าน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question181"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question18}" />
<label class="form-check-label" for="question181">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question182"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question18}" />
<label class="form-check-label" for="question182">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question183"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question18}" />
<label class="form-check-label" for="question183">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question18" id="question184"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question18}" />
<label class="form-check-label" for="question184">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question19'>ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question191"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question19}" />
<label class="form-check-label" for="question191">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question192"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question19}" />
<label class="form-check-label" for="question192">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question193"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question19}" />
<label class="form-check-label" for="question193">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question19" id="question194"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question19}" />
<label class="form-check-label" for="question194">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question20'>คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question201"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question20}" />
<label class="form-check-label" for="question201">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question202"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question20}" />
<label class="form-check-label" for="question202">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question203"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question20}" />
<label class="form-check-label" for="question203">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question20" id="question204"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question20}" />
<label class="form-check-label" for="question204">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question21'>คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question211"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question21}" />
<label class="form-check-label" for="question211">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question212"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question21}" />
<label class="form-check-label" for="question212">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question213"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question21}" />
<label class="form-check-label" for="question213">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question21" id="question214"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question21}" />
<label class="form-check-label" for="question214">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question22'>ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question221"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question22}" />
<label class="form-check-label" for="question221">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question222"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question22}" />
<label class="form-check-label" for="question222">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question223"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question22}" />
<label class="form-check-label" for="question223">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question22" id="question224"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question22}" />
<label class="form-check-label" for="question224">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question23'>ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question231"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question23}" />
<label class="form-check-label" for="question231">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question232"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question23}" />
<label class="form-check-label" for="question232">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question233"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question23}" />
<label class="form-check-label" for="question233">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question23" id="question234"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question23}" />
<label class="form-check-label" for="question234">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question24'>เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question241"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question24}" />
<label class="form-check-label" for="question241">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question242"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question24}" />
<label class="form-check-label" for="question242">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question243"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question24}" />
<label class="form-check-label" for="question243">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question24" id="question244"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question24}" />
<label class="form-check-label" for="question244">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question25'>17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question251"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question25}" />
<label class="form-check-label" for="question251">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question252"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question25}" />
<label class="form-check-label" for="question252">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question253"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question25}" />
<label class="form-check-label" for="question253">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question25" id="question254"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question25}" />
<label class="form-check-label" for="question254">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question26'>คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question261"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question26}" />
<label class="form-check-label" for="question261">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question262"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question26}" />
<label class="form-check-label" for="question262">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question263"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question26}" />
<label class="form-check-label" for="question263">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question26" id="question264"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question26}" />
<label class="form-check-label" for="question264">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question27'>ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question271"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question27}" />
<label class="form-check-label" for="question271">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question272"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question27}" />
<label class="form-check-label" for="question272">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question273"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question27}" />
<label class="form-check-label" for="question273">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question27" id="question274"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question27}" />
<label class="form-check-label" for="question274">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question28'>ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question281"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question28}" />
<label class="form-check-label" for="question281">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question282"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question28}" />
<label class="form-check-label" for="question282">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question283"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question28}" />
<label class="form-check-label" for="question283">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question28" id="question284"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question28}" />
<label class="form-check-label" for="question284">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question29'>ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question291"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question29}" />
<label class="form-check-label" for="question291">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question292"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question29}" />
<label class="form-check-label" for="question292">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question293"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question29}" />
<label class="form-check-label" for="question293">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question29" id="question294"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question29}" />
<label class="form-check-label" for="question294">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question30'>ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question301"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question30}" />
<label class="form-check-label" for="question301">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question302"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question30}" />
<label class="form-check-label" for="question302">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question303"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question30}" />
<label class="form-check-label" for="question303">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question30" id="question304"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question30}" />
<label class="form-check-label" for="question304">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question31'>ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question311"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question31}" />
<label class="form-check-label" for="question311">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question312"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question31}" />
<label class="form-check-label" for="question312">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question313"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question31}" />
<label class="form-check-label" for="question313">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question31" id="question314"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question31}" />
<label class="form-check-label" for="question314">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question32'>ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question321"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question32}" />
<label class="form-check-label" for="question321">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question322"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question32}" />
<label class="form-check-label" for="question322">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question323"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question32}" />
<label class="form-check-label" for="question323">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question32" id="question324"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question32}" />
<label class="form-check-label" for="question324">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question33'>ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question331"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question33}" />
<label class="form-check-label" for="question331">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question332"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question33}" />
<label class="form-check-label" for="question332">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question333"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question33}" />
<label class="form-check-label" for="question333">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question33" id="question334"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question33}" />
<label class="form-check-label" for="question334">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question34'>ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question341"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question34}" />
<label class="form-check-label" for="question341">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question342"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question34}" />
<label class="form-check-label" for="question342">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question343"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question34}" />
<label class="form-check-label" for="question343">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question34" id="question344"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question34}" />
<label class="form-check-label" for="question344">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question35'>ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question351"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question35}" />
<label class="form-check-label" for="question351">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question352"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question35}" />
<label class="form-check-label" for="question352">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question353"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question35}" />
<label class="form-check-label" for="question353">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question35" id="question354"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question35}" />
<label class="form-check-label" for="question354">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question36'>ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question361"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question36}" />
<label class="form-check-label" for="question361">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question362"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question36}" />
<label class="form-check-label" for="question362">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question363"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question36}" />
<label class="form-check-label" for="question363">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question36" id="question364"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question36}" />
<label class="form-check-label" for="question364">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question37'>ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question371"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question37}" />
<label class="form-check-label" for="question371">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question372"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question37}" />
<label class="form-check-label" for="question372">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question373"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question37}" />
<label class="form-check-label" for="question373">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question37" id="question374"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question37}" />
<label class="form-check-label" for="question374">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question38'>คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question381"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question38}" />
<label class="form-check-label" for="question381">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question382"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question38}" />
<label class="form-check-label" for="question382">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question383"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question38}" />
<label class="form-check-label" for="question383">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question38" id="question384"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question38}" />
<label class="form-check-label" for="question384">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question39'>เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question391"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question39}" />
<label class="form-check-label" for="question391">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question392"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question39}" />
<label class="form-check-label" for="question392">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question393"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question39}" />
<label class="form-check-label" for="question393">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question39" id="question394"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question39}" />
<label class="form-check-label" for="question394">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question40'>คนในชุมชนชักชวนให้ฉันใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question401"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question40}" />
<label class="form-check-label" for="question401">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question402"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question40}" />
<label class="form-check-label" for="question402">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question403"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question40}" />
<label class="form-check-label" for="question403">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question40" id="question404"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question40}" />
<label class="form-check-label" for="question404">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question41'>ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question411"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question41}" />
<label class="form-check-label" for="question411">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question412"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question41}" />
<label class="form-check-label" for="question412">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question413"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question41}" />
<label class="form-check-label" for="question413">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question41" id="question414"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question41}" />
<label class="form-check-label" for="question414">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question42'>ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question421"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question42}" />
<label class="form-check-label" for="question421">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question422"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question42}" />
<label class="form-check-label" for="question422">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question423"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question42}" />
<label class="form-check-label" for="question423">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question42" id="question424"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question42}" />
<label class="form-check-label" for="question424">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question43'>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question431"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question43}" />
<label class="form-check-label" for="question431">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question432"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question43}" />
<label class="form-check-label" for="question432">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question433"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question43}" />
<label class="form-check-label" for="question433">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question43" id="question434"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question43}" />
<label class="form-check-label" for="question434">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question44'>ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question441"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question44}" />
<label class="form-check-label" for="question441">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question442"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question44}" />
<label class="form-check-label" for="question442">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question443"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question44}" />
<label class="form-check-label" for="question443">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question44" id="question444"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question44}" />
<label class="form-check-label" for="question444">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question45'>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question451"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question45}" />
<label class="form-check-label" for="question451">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question452"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question45}" />
<label class="form-check-label" for="question452">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question453"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question45}" />
<label class="form-check-label" for="question453">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question45" id="question454"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question45}" />
<label class="form-check-label" for="question454">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question46'>ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question461"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question46}" />
<label class="form-check-label" for="question461">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question462"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question46}" />
<label class="form-check-label" for="question462">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question463"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question46}" />
<label class="form-check-label" for="question463">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question46" id="question464"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question46}" />
<label class="form-check-label" for="question464">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='question47'>ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ  :</label>
					<div class='col-sm-10'>

						<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question471"
									value="1" class="form-check-input"
									autocomplete="off" data-record-value="{record_question47}" />
<label class="form-check-label" for="question471">ไม่เคย</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question472"
									value="2" class="form-check-input"
									autocomplete="off" data-record-value="{record_question47}" />
<label class="form-check-label" for="question472">นานๆครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question473"
									value="3" class="form-check-input"
									autocomplete="off" data-record-value="{record_question47}" />
<label class="form-check-label" for="question473">บ่อยครั้ง</label>
</div>
<div class="form-check form-check-inline">
<input  type="radio"
									name="question47" id="question474"
									value="4" class="form-check-input"
									autocomplete="off" data-record-value="{record_question47}" />
<label class="form-check-label" for="question474">เป็นประจำ</label>
</div>

					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-2 col-sm-10'>
						<button  type="button" class='btn btn-primary btn-lg'  data-toggle='modal' data-target='#editModal' >&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;</button>

						</div>
				</div>

				<input type="hidden" name="encrypt_context_factor_id" value="{encrypt_context_factor_id}" />


			</form>
		</div> <!--card-body-->
	</div> <!--card-->

<!-- Modal -->
<div class='modal fade' id='editModal' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
			<div class='modal-header bg-warning'>
				<h4 class='modal-title' id='editModalLabel'>บันทึกข้อมูล</h4>
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
			</div>
			<div class='modal-body'>
				<h4>ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?</h4>
				<form class="form-horizontal" onsubmit="return false;" >
					<div class="form-group">
						<div class="col-sm-8">
							<label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
						</div>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="edit_remark">
						</div>
					</div>
				</form>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-lg btn-default' data-dismiss='modal'><i class="fas fa-window-close"></i> ปิด</button>
				<button type='button' class='btn btn-lg btn-primary' id='btnSaveEdit'>&nbsp;<i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>
