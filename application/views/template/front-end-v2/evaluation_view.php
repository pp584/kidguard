<html>
<?php
@include('utils/header_view.php');

?>
<style>
	* {
		font-family: 'kanit';
	}

	body {
		font-family: 'Kanit' !important;
	}
</style>

<body>
	<div id="homepage-three" class="overflow-hidden">
		<header class="position-absolute">
			{top_navbar}
		</header>
		<!-- Banner Section -->
		<section class="inner-bnr d-flex align-items-end pb-5" style="min-height: 550px;padding: unset; background: url({base_url}/assets/images/banner/2.jpg) no-repeat center; background-size: cover">
			<div class="container pb-5">
				<div class="row">
					<div class="col-12" class="text" style="text-shadow: 1px 3px 8px rgba(0, 0, 0, 1);">
						<span class="text text-white">Evaluation</span>
						<h3 class="hero-text text-white my-2">แบบประเมิน</h3>
						<h5 class="text-white"><a href="{base_url}" class="text text-white"><u>Home</u></a> - Evaluation</h5>
					</div>
				</div>
			</div>
		</section>

		<?php
		if ($evaluate) {
			$currentUri = $_SERVER['REQUEST_URI'];
			$uriSegments = explode('/', trim($currentUri, '/'));
			$lastSegment = end($uriSegments);
		?>
			<section class="container d-flex flex-wrap mt-3">
				<div class="col-lg-3 col-sm-3" style="text-align:center;">
					<a href="{site_url}evaluation_form/evaluationExplanation/question_basic">
						<?php
						if ($lastSegment == 'question_basic') {
						?>
							<img src="{base_url}assets/images/icon/form1.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_basic' && $complete_qt_basic) {
						?>
							<img src="{base_url}assets/images/icon/form1_success.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_basic' && !$complete_qt_basic) {
						?>
							<img src="{base_url}assets/images/icon/form1_danger.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<p style="text-align:center;">ข้อมูลพื้นฐาน<?php if ($lastSegment != 'question_basic' && $complete_qt_basic) { ?>
							<span class="text-success">(ครบแล้ว)</span>
						<?php } ?>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-sm-3" style="text-align:center;">
					<a href="{site_url}evaluation_form/evaluationExplanation/question_immune">
						<?php
						if ($lastSegment == 'question_immune') {
						?>
							<img src="{base_url}assets/images/icon/form2.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_immune' && $complete_qt_immune) {
						?>
							<img src="{base_url}assets/images/icon/form2_success.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_immune' && !$complete_qt_immune) {
						?>
							<img src="{base_url}assets/images/icon/form2_danger.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<p style="text-align:center;">ปัจจัยภูมิคุ้มกัน<?php if ($lastSegment != 'question_immune' && $complete_qt_immune) { ?>
							<span class="text-success">(ครบแล้ว)</span>
						<?php } ?>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-sm-3" style="text-align:center;">
					<a href="{site_url}evaluation_form/evaluationExplanation/question_contextual">
						<?php
						if ($lastSegment == 'question_contextual') {
						?>
							<img src="{base_url}assets/images/icon/form3.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_contextual' && $complete_qt_contextual) {
						?>
							<img src="{base_url}assets/images/icon/form3_success.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_contextual' && !$complete_qt_contextual) {
						?>
							<img src="{base_url}assets/images/icon/form3_danger.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<p style="text-align:center;">ปัจจัยบริบท<?php if ($lastSegment != 'question_contextual' && $complete_qt_contextual) { ?>
							<span class="text-success">(ครบแล้ว)</span>
						<?php } ?>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-sm-3" style="text-align:center;">
					<a href="{site_url}evaluation_form/evaluationExplanation/question_risky">
						<?php
						if ($lastSegment == 'question_risky') {
						?>
							<img src="{base_url}assets/images/icon/form4.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_risky' && $complete_qt_risky) {
						?>
							<img src="{base_url}assets/images/icon/form4_success.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<?php
						if ($lastSegment != 'question_risky' && !$complete_qt_risky) {
						?>
							<img src="{base_url}assets/images/icon/form4_danger.png" style="width: 150px;height: 150px;">
						<?php } ?>
						<p style="text-align:center;">พฤติกรรมเสี่ยง<?php if ($lastSegment != 'question_risky' && $complete_qt_risky) { ?>
							<span class="text-success">(ครบแล้ว)</span>
						<?php } ?>
						</p>
					</a>
				</div>
			</section>
		<?php } ?>
		<section class="container mb-3">
			{page_content}
		</section>
		<input type="hidden" id="complete_qt_basic" value="{complete_qt_basic}">
		<input type="hidden" id="complete_qt_immune" value="{complete_qt_immune}">
		<input type="hidden" id="complete_qt_contextual" value="{complete_qt_contextual}">
		<input type="hidden" id="complete_qt_risky" value="{complete_qt_risky}">
	</div>
</body>

<?php
@include('utils/footer_view.php');
?>

</html>