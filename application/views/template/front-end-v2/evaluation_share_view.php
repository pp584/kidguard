<html>
<?php
@include('utils/header_view.php');

?>
<style>
	.apexcharts-tooltip {
		/* top: -80px !important; */
	}

	body {
		font-family: 'Kanit' !important;
		background: linear-gradient(360deg, #081e3e 0%, rgb(20 166 255) 70%, rgb(218, 240, 254) 100%);
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.container.section {
		border: 5px solid white;
		border-radius: 10px;
		padding: 5px;
	}
</style>

<body>
	<div id="homepage-three" class="overflow-hidden" style="width: 100%;">
		<section class="container section">
			{page_content}
		</section>
		<input type="hidden" id="complete_qt_basic" value="{complete_qt_basic}">
		<input type="hidden" id="complete_qt_immune" value="{complete_qt_immune}">
		<input type="hidden" id="complete_qt_contextual" value="{complete_qt_contextual}">
		<input type="hidden" id="complete_qt_risky" value="{complete_qt_risky}">
	</div>
</body>

<!-- General Js -->
<script src="{base_url}assets/themes/front-end/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="{base_url}assets/themes/front-end/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Font Awesome Js -->
<script src="{base_url}assets/themes/front-end/vendor/fontawesome/js/all.min.js"></script>
<!-- Elegant Icons Css -->
<script src="{base_url}assets/themes/front-end/vendor/elegant/js/lte-ie7.js"></script>
<!-- Owl Carousel Js -->
<script src="{base_url}assets/themes/front-end/vendor/owl_carousel/js/owl.carousel.min.js"></script>
<!-- Themes's Custom Js -->
<script src="{base_url}assets/themes/front-end/js/theme.js"></script>

<!-- Require -->
<script src="{base_url}assets/js/jquery-ui.min.js"></script>
<script src="{base_url}assets/bootstrap_extras/sweetalert/dist/sweetalert.min.js"></script>
<script src="{base_url}assets/bootstrap_extras/bootstrap-notify.min.js"></script>
<script src="{base_url}assets/bootstrap_extras/select2/select2.min.js"></script>
<script src="{base_url}assets/js/jquery.cookie.min.js"></script>
<script src="{base_url}assets/js/ci_utilities.js?ver=1541805506"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

{another_js}
<!-- {js_util_url} -->

</html>