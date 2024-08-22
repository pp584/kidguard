<!-- [ View File name : add_view.php ] -->
<!-- <div class="card mt-3">
	<div class="card-header bg-primarys text-dark">
		<h3 class="card-title"><i class="fa fa-user"></i> <strong>แชร์ผลลัพธ์ของท่าน</strong></h3>
	</div>
	<div class="card-body">

		<div id="chart"></div>
	</div>
</div> -->
<style>
	.label-graph {
		width: 25px;
		height: 25px;
		border-radius: 50%;
	}

	.apexcharts-tooltip-dark {
		color: #000;
		/* Light text color for better contrast */
	}

	.container-content {
		/* background: linear-gradient(360deg, rgb(163, 220, 255) 0%, rgb(207, 237, 255) 70%, rgb(252, 252, 252) 100%); */
		background: linear-gradient(360deg, rgb(0 100 162) 0%, rgb(221 242 255) 70%, rgb(252, 252, 252) 100%);
	}

	.container-main {
		background: linear-gradient(360deg, #081e3e 0%, rgb(20 166 255) 70%, rgb(218, 240, 254) 100%);
		/* background: linear-gradient(360deg, rgb(142, 210, 252) 0%, rgb(163, 220, 255) 70%, rgb(218, 240, 254) 100%); */
	}

	.d-none {
		display: none;
	}

	.flex {
		display: flex;
	}

	.flex-start {
		align-items: flex-start;
	}

	.flex-column {
		flex-direction: column;
	}

	.align-center {
		align-items: center;
	}

	.justify-between {
		justify-content: space-between;
	}

	.justify-center {
		justify-content: center;
	}

	.justify-start {
		justify-content: start;
	}

	.justify-end {
		justify-content: end;
	}

	.text-left {
		text-align: left;
	}

	.text-right {
		text-align: right;
	}

	.text-center {
		text-align: center;
	}

	.f-bold {
		font-weight: bold;
	}

	.text-center {
		text-align: center;
	}

	.recommence-content {
		background-color: #66BEE9;
		border-radius: 10px;
		padding: 10px 10px;

		p.recommence-head {
			color: white;
			font-size: 1.4rem;
			text-shadow: 2px 2px 0.5px rgba(0, 0, 0, 0.6);
		}

		p.recommence-body {
			color: white;
			font-size: 1rem
		}
	}

	.recommence-content-2 {
		background-color: #E951C2;
		border-radius: 10px;
		padding: 10px 10px;
		color: #fff;

		p.recommence-head {
			color: white;
			font-size: 1.4rem;
			text-shadow: 2px 2px 0.5px rgba(0, 0, 0, 0.6);
		}

		p.recommence-body {
			color: white;
			font-size: 1rem
		}
	}

	.recommence-icon-2 {
		background-color: #28bad8;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.answer-icon-1 {
		background-color: #FFD65F;
		min-width: 60px !important;
		height: 90px;
		border-radius: 5px;
		display: flex;
		justify-content: center;
		align-items: flex-start;
		color: #fff;
		width: 100%;
		cursor: pointer;
	}

	.answer-icon-2 {
		background-color: #FDA0B4;
		min-width: 80px !important;
		height: 90px;
		border-radius: 5px;
		display: flex;
		justify-content: center;
		align-items: flex-start;
		color: #fff;
		width: 100%;
		cursor: pointer;
	}

	.answer-icon-3 {
		background-color: #81EEEB;
		min-width: 60px !important;
		height: 90px;
		border-radius: 5px;
		display: flex;
		justify-content: center;
		align-items: flex-start;
		color: #fff;
		width: 100%;
		cursor: pointer;
	}

	.answer-icon-4 {
		background-color: #DF5F69;
		min-width: 60px !important;
		height: 90px;
		border-radius: 5px;
		display: flex;
		justify-content: center;
		align-items: flex-start;
		color: #fff;
		width: 100%;
		cursor: pointer;
	}

	.answer-percent {
		position: absolute;
		color: #17336B;
		font-size: 20px;
		font-weight: 600;
		top: -55px;

	}

	.p-absolute {
		position: absolute;
	}

	.p-relative {
		position: relative;
	}

	.p-fixed {
		position: fixed;
	}

	.bottom-0 {
		bottom: 0;
	}

	.bottom-5 {
		bottom: 5px;
	}

	.bottom-10 {
		bottom: 10px;
	}

	.bottom-15 {
		bottom: 15px;
	}

	.bottom-20 {
		bottom: 20px;
	}

	.left-0 {
		left: 0;
	}

	.right-0 {
		right: 0;
	}

	.right-15 {
		right: 15px;
	}

	.top-0 {
		top: 0;
	}

	.top-6 {
		top: 6px;
	}

	.w-full {
		width: 100%;
	}

	.wp-50 {
		width: 50%;
	}

	.h-full {
		height: 100%;
	}


	.z-1 {
		z-index: 1;
	}

	.z-2 {
		z-index: 2;
	}

	.z-3 {
		z-index: 3;
	}


	.shadow {
		box-shadow: rgba(0, 0, 0, 0.5) 0px 3px 4px 0px;
	}

	.shadow-1 {
		box-shadow: rgb(70 70 70 / 25%) 0px 13px 10px 0px;
	}

	.shadow-2 {
		box-shadow: rgba(0, 0, 0, 0.5) 0px 1px 5px 0px;
	}

	.shadow-3 {
		box-shadow: rgba(70, 70, 70, 0.25) 0px 5px 14px 0px;
	}

	.shadow-3d {
		box-shadow: rgba(70, 70, 70, 0.53) -1px 6px 3px 2px;
	}

	.shadow-4 {
		box-shadow: rgb(70 70 70 / 41%) 0px 3px 10px -3px;
	}

	.text-shadow {
		text-shadow: 2px 2px 0.5px rgba(0, 0, 0, 0.6);
	}

	.text-shadow-1 {
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
	}

	.space-white-box {
		font-size: 1.1rem;
		background: white;
		width: 100px;
		height: 20px;
		border-radius: 5px;
		box-shadow: rgba(70, 70, 70, 0.25) 0px 5px 14px 0px;
	}

	.recommence-body {
		color: #fff !important;
	}

	.recommence-head {
		color: #fff !important;
	}

	#name-graph {
		background: white;
		border-radius: 5px;
		text-align: center;
		padding-top: 10px;
	}

	.custom-tooltip-2 {
		position: absolute;
		background: #fff;
		border: 1px solid #ccc;
		color: #000;
		border-radius: 5px;
		pointer-events: none;
		white-space: nowrap;
		z-index: 1000;
		transform: translate(-50%, -100%);
	}

	.flex {
		display: flex;
		align-items: center;
		align-items: flex-start;
	}

	.share-icon {
		position: absolute;
		top: 0;
		right: 0;
		background: #E951C2;
		color: #fff;
		border-radius: 50%;
		padding: 10px 9px 10px 10px;
	}

	.share-icon:hover {
		cursor: pointer;
	}

	.share-list {
		position: absolute;
		top: 45px;
		right: 5px;
		background: #fff;
		border-radius: 5px;
		padding: 10px 9px 10px 10px;
		box-shadow: rgba(0, 0, 0, 0.5) 0px 0px 4px 0px;
	}
</style>
<?php
$url = "https://example.com"; // Set your dynamic URL here
// Get the protocol (http or https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the host (e.g., www.example.com)
$host = $_SERVER['HTTP_HOST'];

// Get the current request URI (e.g., /path/to/page.php?query=param)
$requestUri = $_SERVER['REQUEST_URI'];

// Combine them to form the full URL
if ($protocol != 'https') {
	$currentUrl = 'https' . '://' . $host . '.com' . $requestUri;
} else {
	$currentUrl = $protocol . '://' . $host . $requestUri;
}

// echo $url;
// echo '<br>';
// echo $currentUrl;
?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<div class="container-main p-2 mt-2" style="position:relative;padding-bottom: 30px !important; overflow-y:auto">
	<div class="share-icon" id="share-event">
		<i class="fas fa-share-square" style="font-size:20px"></i>
	</div>
	<div class="share-list" id="share-list" style="display:none">
		<!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> -->
		<!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="https://www.localhost.com/siamit-ctrlplus_oncb-backend-codeiniter/evaluation_form/evaluationExplanation/question_graph?web_id=669f6b09bf78e49542122ff19448042c39ab46ba6943cs"></div> -->
		<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo htmlspecialchars($currentUrl); ?>">
			<a class="a2a_button_facebook"></a>
			<a class="a2a_button_line"></a>
			<a class="a2a_button_pinterest"></a>
			<a class="a2a_button_x"></a>
			<a class="a2a_button_linkedin"></a>
			<a class="a2a_button_whatsapp"></a>
			<!-- Add more buttons as needed -->
		</div>
	</div>
	<div id="name-graph"></div>
	<div class="container-content w-full h-full flex flex-column justify-between" style="max-height: 700px;">
		<div>
			<div class="ml-10 mr-10 mt-20 ml-2 mr-2">
				<div class="ml-0 mt-3">
					<div class="text-center flex justify-between recommence-content-2 shadow-3">
						<div class="flex">
							<div class="ml-10 flex flex-column justify-center">
								<div class="grapher" style="    background: #fff;
		border-radius: 5px;">
									<div id="chart"></div>
								</div>
								<input type="hidden" id="fetchGraph" data-type="web" value="<?php echo $_GET['web_id']; ?>">
							</div>
							<div class="ml-3 flex flex-column justify-start" id="title-graph"></div>
						</div>
						<div id="table-graph"></div>
					</div>
				</div>
			</div>
			<div style="height:70px" class="mb-0 ml-2 mr-2 pt-4">
				<h4 class="m-0 space-white-box" style="width:40%">
				</h4>
			</div>
			<div class="d-flex flex-start align-center ml-2 mr-2 mt-3">
				<div class="d-flex flex-column align-center mt-10">
					<div class="recommence-icon-2 shadow-3">
						<img src="../../assets/images/icon-rec2.png" style="object-fit: cover;" alt="">
					</div>
					<div class="text-center">
						<p class="text-blue-deep m-0" style="font-size:1.5rem;font-weight:600">POWER</p>
						<p class="text-blue-deep m-0" id="power-graph" style="font-size:1.5rem;font-weight:600">65%</p>
					</div>
				</div>
				<div class="ml-3 mt-2">
					<div class="text-center recommence-content shadow-3">
						<p class="text-dark recommence-head m-0">คำแนะนำ</p>
						<p class="text-dark recommence-body m-0">เสริมสร้างความรู้ความเข้าใจเกี่ยว
							กับภัยสารเสพติดให้เพิ่มมากขึ้น
							และหลีกเลี่ยงการนำตนเองเข้ายุ่ง
							เกี่ยวข้องสารเสพติดรวมทั้งถ้ามี
							ปัญหาอะไร อย่างไรต้องปรึกษาครู
							ผู้ปกครองเพื่อแก้ปัญหาร่วมกัน</p>
					</div>
				</div>
			</div>
		</div>

		<div style="width:100%">
			<div class="d-flex flex-start justify-content-center ml-2 mr-2 mt-3 mb-3">
				<div class="d-flex justify-between w-full align-center mt-10" style="row-gap: 10px;
	column-gap: 10px;max-width:500px">
					<div class="answer-icon-1 pt-3 shadow-3d p-relative" id="immune_click">
						<img src="../../assets/images/answer-2.png" style="object-fit: cover;" alt="">
						<p class="p-absolute bottom-0 text-shadow-1" style="font-size:0.6rem">ภูมิคุ้มกัน</p>
					</div>
					<div class="answer-icon-2 pt-3 shadow-3d p-relative" id="positive_click">
						<img src="../../assets/images/answer-6.png" style="object-fit: cover;" alt="">
						<p class="p-absolute bottom-0 text-shadow-1" style="font-size:0.6rem">ปัจจัยบวก</p>
					</div>
					<div class="answer-icon-3 pt-3 shadow-3d p-relative" id="negative_click">
						<img src="../../assets/images/answer-5.png" style="object-fit: cover;" alt="">
						<p class="p-absolute bottom-0 text-shadow-1" style="font-size:0.6rem">ปัจจัยลบ</p>
					</div>
					<div class="answer-icon-4 pt-3 shadow-3d p-relative" id="risky_click">
						<img src="../../assets/images/answer-4.png" style="object-fit: cover;" alt="">
						<p class="p-absolute bottom-0 text-shadow-1" style="font-size:0.6rem">พฤติกรรมเสี่ยง</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
