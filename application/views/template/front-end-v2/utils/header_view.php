<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</title>
	<link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
	<!-- Favicon -->
	<link rel="shortcut icon" href="logooncb-onweb_png.png" type="image/x-icon">
	<!-- Custom Fonts Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/custom_fonts/fonts.css">
	<!-- Bootstrap Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/fontawesome/css/all.min.css">
	<!-- Elegant Icons Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/elegant/css/style.css">
	<!-- Owl Carousel Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/vendor/owl_carousel/css/owl.theme.default.css">
	<!-- Custom Style Css -->
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/css/style.css">
	<link rel="stylesheet" href="{base_url}assets/themes/front-end/css/responsive.css">

	<!-- Require -->
	<link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
	<link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

	{another_css}
	<!-- {another_css} -->

	<style>
		.container-r {
			position: relative;
			cursor: pointer;
			font-size: 22px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.container-r input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		.checkmark {
			position: absolute;
			top: -8px;
			left: 0;
			height: 25px;
			width: 25px;
			background-color: #eee;
			border: 1px solid;
			border-radius: 50%;
		}

		.container-r:hover input~.checkmark {
			background-color: #ccc;
		}

		.container-r input:checked~.checkmark {
			background-color: #2196F3;
			border: 1px solid #2196F3;
		}

		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		.container-r input:checked~.checkmark:after {
			display: block;
		}

		.container-r .checkmark:after {
			top: 8px;
			left: 8px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}

		.container-r-span {
			position: absolute;
			top: -10px;
			left: 35px;
			font-size: 1rem;
			color: #000;
		}

		.container_qt_choice {
			/* height: 120px; */
			display: flex;
			align-content: flex-start;
		}

		@media only screen and (max-width: 600px) {
			.container_qt_choice {
				/* height: 150px; */
			}
		}


		/* checkbox */
		.container-cb-span {
			position: absolute;
			top: 0px;
			left: 35px;
			font-size: 1rem;
			color: #000;
		}

		.container-cb {
			display: block;
			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 22px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.container-cb input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
			height: 0;
			width: 0;
		}

		.checkmark-cb {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
			background-color: #eee;
			border: 1px solid;
			border-radius: 5px;
		}

		.container-cb:hover input~.checkmark-cb {
			background-color: #ccc;
		}

		.container-cb input:checked~.checkmark-cb {
			background-color: #2196F3;
		}

		.checkmark-cb:after {
			content: "";
			position: absolute;
			display: none;
		}

		.container-cb input:checked~.checkmark-cb:after {
			display: block;
		}

		.container-cb .checkmark-cb:after {
			left: 9px;
			top: 3px;
			width: 7px;
			height: 15px;
			border: solid white;
			border-width: 0 3px 3px 0;
			-webkit-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			transform: rotate(45deg);
		}

		/* util */
		.w-full {
			width: 100%;
		}

		.h-40 {
			height: 40px;
		}

		body {
			font-family: 'Kanit' !important;
		}
	</style>
	<!-- Bootstrap core JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/jquery/jquery.min.js"></script>
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- jQuery and Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		var baseURL = '{base_url}';
		var siteURL = '{site_url}';
		var csrf_token_name = '{csrf_token_name}';
		var csrf_cookie_name = '{csrf_cookie_name}';
	</script>

</head>
