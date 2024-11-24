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
		/* background: linear-gradient(360deg, rgb(0 100 162) 0%, rgb(221 242 255) 70%, rgb(252, 252, 252) 100%); */
	}

	.container-main {
		background: linear-gradient(360deg, rgb(0 100 162) 0%, rgb(221 242 255) 70%, rgb(252, 252, 252) 100%);
		/* background: linear-gradient(360deg, #081e3e 0%, rgb(20 166 255) 70%, rgb(218, 240, 254) 100%); */
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

	.btn-float-container {
		/* position: fixed; */
		flex-direction: row;
		align-items: center;
		/* right: 1.5rem;
		bottom: 1.5rem; */
		width: 48px;
		height: 48px;
		/* z-index: 999; */

		.btn {
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
			border: 3px solid white;
			border-radius: 50%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			z-index: 1;
		}

		.float-content {
			position: relative;
			transition: all 0.3s;
			z-index: 0;

			.content {
				position: absolute;
				display: flex;
				gap: 2px;
				flex-direction: row;
				align-items: center;
				right: 20px;
				padding: 5px;
				padding-right: 30px;
				height: 48px;
				border-radius: 45px 0px 0px 45px;
				justify-content: center;
				background-color: #c5c5c5;

				.btn {
					height: 40px;
					width: 40px;
					display: flex;
					align-items: center;
					justify-content: center;
				}
			}

			&.hide {
				display: none;
			}
		}
	}
</style>

<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];

$currentUrl = $protocol . '://' . $host . $requestUri;
?>

<div class="container-main p-2" style="position:relative; overflow-y:auto;">
	<div id="name-graph" class="py-2 mx-2" style="border: 3px solid #e0e0e0;"></div>

	<div class="container-content flex flex-column justify-between" style="max-height: 700px;">
		<div style="width: 100%;">
			<div class="d-flex px-1 py-2 justify-content-end align-items-center" style="gap: 3px">
				<div class="btn-float-container">
					<div id="floatingMenu" class="float-content hide">
						<div class="card content py-2">
							<a href="javascript:void()" class="btn btn-secondary" onclick="copyToClipboard()">
								<i class="fas fa-link"></i>
							</a>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?= $currentUrl ?>" target="_blank" class="btn btn-primary">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="https://twitter.com/intent/tweet?url=<?= $currentUrl ?>" target="_blank" class="btn btn-info">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="https://social-plugins.line.me/lineit/share?url=<?= $currentUrl ?>" target="_blank" class="btn btn-success">
								<i class="fab fa-line fa-lg"></i>
							</a>
							<a href="javascript:void()" class="btn btn-light" onclick="shareOther()">
								<i class="fas fa-ellipsis-h"></i>
							</a>
						</div>
					</div>

					<button class="btn btn-dark w-100 h-100" onclick="toggleFloatingMenu()">
						<i class="fas fa-share-square fa-lg"></i>
					</button>
				</div>

				<div class="btn-float-container">
					<a href="{base_url}" class="btn btn-dark w-100 h-100">
						<i class="fas fa-home fa-lg"></i>
					</a>
				</div>
			</div>

			<div class="ml-10 mr-10 mt-20 ml-2 mr-2">
				<div class="ml-0">
					<div class="text-center flex justify-between recommence-content-2 shadow-3">
						<div class="flex">
							<div id="refGraphContainer" class="ml-10 flex flex-column justify-center">
								<div class="grapher" style="background: #fff;border-radius: 5px;">
									<div id="chart"></div>
								</div>
								<input type="hidden" id="fetchGraph" data-type="web" value="<?php echo isset($_GET['id']) ? $_GET['id'] : $_GET['web_id']; ?>">
							</div>
							<div class="ml-3 flex flex-column justify-start" id="title-graph"></div>
						</div>
						<div id="table-graph"></div>
					</div>
				</div>
			</div>

			<div style="height:70px" class="mb-0 ml-2 mr-2 pt-4">
				<h4 class="m-0 space-white-box" style="width:40%"></h4>
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
						<p class="text-dark recommence-body m-0">
							เสริมสร้างความรู้ความเข้าใจเกี่ยว
							กับภัยสารเสพติดให้เพิ่มมากขึ้น
							และหลีกเลี่ยงการนำตนเองเข้ายุ่ง
							เกี่ยวข้องสารเสพติดรวมทั้งถ้ามี
							ปัญหาอะไร อย่างไรต้องปรึกษาครู
							ผู้ปกครองเพื่อแก้ปัญหาร่วมกัน
						</p>
					</div>
				</div>
			</div>
		</div>

		<div style="width:100%">
			<div class="d-flex flex-start justify-content-center ml-2 mr-2 mt-3 mb-3">
				<div class="d-flex justify-between w-full align-center mt-10" style="row-gap: 10px;column-gap: 10px;max-width:500px">
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

<script>
	function toggleFloatingMenu() {
		const menu = $('#floatingMenu');
		if (menu.hasClass("hide")) {
			menu.removeClass("hide");
		} else {
			menu.addClass("hide");
		}
	}

	function copyToClipboard() {
		navigator.clipboard.writeText("<?= $currentUrl ?>")
		alert("คัดลอก URL ไปยัง Clipboard แล้ว")
	}

	function shareOther() {
		navigator.share({
			url: "<?= $currentUrl ?>"
		});
	}
</script>