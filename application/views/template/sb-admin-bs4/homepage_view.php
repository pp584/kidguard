<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด {page_title}</title>

	<!-- Bootstrap core CSS-->
	<link href="{base_url}assets/themes/sb-admin-bs4/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="{base_url}assets/bootstrap_extras/sweetalert/dist/sweetalert.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="{base_url}assets/themes/sb-admin-bs4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="{base_url}assets/themes/sb-admin-bs4/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{base_url}assets/themes/sb-admin-bs4/css/sb-admin.css" rel="stylesheet">

	<!-- Require -->
	<link href="{base_url}assets/bootstrap_extras/select2/select2.css" rel="stylesheet">
	<link href="{base_url}assets/css/jquery-ui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

	{another_css}

	<style>
		body {
			font-family: 'Kanit', sans-serif;
			background: #ffffff;
			color: #34495e;
		}

		/* dashboard card */
		.order-card {
			color: #fff;
		}

		.bg-c-blue {
			background: linear-gradient(45deg, #4099ff, #73b4ff);
		}

		.bg-c-green {
			background: linear-gradient(45deg, #2ed8b6, #59e0c5);
		}

		.bg-c-yellow {
			background: linear-gradient(45deg, #FFB64D, #ffcb80);
		}

		.bg-c-pink {
			background: linear-gradient(45deg, #FF5370, #ff869a);
		}


		.card {
			border-radius: 5px;
			-webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
			box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
			border: none;
			margin-bottom: 30px;
			-webkit-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		.card .card-block {
			padding: 25px;
		}

		.order-card i {
			font-size: 26px;
		}

		.f-left {
			float: left;
		}

		.f-right {
			float: right;
		}

		/* end dashboard card */
		/* select2 dropdownlist*/
		/* กรอบการค้นหา */
		legend.group-border {
			width: inherit;
			padding: 0 10px;
			border-bottom: none;
			font-size: 1.2rem;
		}

		/* label ของเว็บ */
		label {
			display: inline-block;
			margin-bottom: 0.5rem;
			font-size: 0.9rem;
		}

		.table td,
		.table th {
			font-size: 0.85rem;
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.select2 {
			width: 100% !important;
		}

		.card-title {
			margin: 0rem;
			color: #fff;
			font-size: 1.2rem;
		}

		.select2 {
			display: block !important;
			width: 100% !important;
			height: calc(1.5em + 0.75rem + 2px) !important;
			padding: 0.375rem 0.75rem !important;
			font-size: 1rem !important;
			font-weight: 400 !important;
			line-height: 1.5 !important;
			color: #495057 !important;
			background-color: #fff !important;
			background-clip: padding-box !important;
			border: 1px solid #ced4da !important;
			border-radius: 0.25rem !important;
			transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
		}

		.select2 span {
			border: none !important;
			margin: 0 !important;
			padding: 0 !important;
		}

		/* สีข้อความ popup */
		.modal-title {
			margin-bottom: 0;
			line-height: 1.5;
			color: #ffff;
		}

		.btn-warning {
			color: #fff;
			background-color: #ffc107;
			border-color: #ffc107;
		}

		.select2-container {
			width: 100% !important;
		}

		.select2.select2-container {
			width: 100% !important;
		}

		.sidebar .nav-item .nav-link span {
			font-size: 0.9rem;
			display: inline;
		}

		.navbar-dark .navbar-nav .nav-link {
			font-size: 0.9rem;
			color: rgba(255, 255, 255, .5);
		}

		::placeholder {
			color: #efefef;
			opacity: 1;
			/* Firefox */
		}

		:-ms-input-placeholder {
			/* Internet Explorer 10-11 */
			color: #efefef;
		}

		::-ms-input-placeholder {
			/* Microsoft Edge */
			color: #efefef;
		}



		.select2-container {
			width: 100% !important;
			padding: 0;
		}

		legend.group-border {
			width: inherit;
			/* Or auto */
			padding: 0 10px;
			/* To give a bit of padding on the left and right */
			border-bottom: none;
		}

		.account-settings .user-profile {
			margin: 0 0 1rem 0;
			padding-bottom: 1rem;
			text-align: center;
		}

		.account-settings .user-profile .user-avatar {
			margin: 0 0 1rem 0;
		}

		.account-settings .user-profile .user-avatar img {
			width: 90px;
			height: 90px;
			-webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;
		}

		.account-settings .user-profile h5.user-name {
			margin: 0 0 0.5rem 0;
		}

		.account-settings .user-profile h6.user-email {
			margin: 0;
			font-size: 0.8rem;
			font-weight: 400;
			color: #9fa8b9;
		}

		.account-settings .about {
			margin: 2rem 0 0 0;
			text-align: center;
		}

		.account-settings .about h5 {
			margin: 0 0 15px 0;
			color: #007ae1;
		}

		/* .account-settings .about p {
			font-size: 0.825rem;
		} */

		.form-control {
			border: 1px solid #cfd1d8;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
			font-size: .825rem;
			background: #ffffff;
			color: #2e323c;
		}

		.card {
			background: #ffffff;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			border: 0;
			margin-bottom: 1rem;
		}

		div[data-notify="container"] {
			z-index: 3000 !important;
		}

		#exampleAccordion {
			overflow-y: auto;
			overflow-x: hidden;
		}

		.content-wrapper {
			overflow-x: auto;
		}



		div.alert span[data-notify="message"] p {
			margin-bottom: 0px !important;
		}

		.upload-box .btn-file {
			background-color: #22b5c0;
		}

		.upload-box .hold {
			float: left;
			width: 100%;
			position: relative;
			border: 1px solid #ccc;
			border-radius: 3px;
			padding: 4px;
		}

		.upload-box .hold span {
			font: 400 14px/36px 'Roboto', sans-serif;
			color: #666;
			text-decoration: none;
		}

		.upload-box .btn-file {
			position: relative;
			overflow: hidden;
			float: left;
			padding: 2px 10px;
			font: 900 14px/14px 'Roboto', sans-serif;
			color: #fff !important;
			margin: 0 10px 0 0;
			text-transform: uppercase;
			border-radius: 3px;
			cursor: pointer;
		}

		.upload-box .btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			opacity: 0;
			outline: none;
			background: #fd0707;
			cursor: inherit;
			display: block;
		}

		.div_file_preview {
			background-color: #fefcfc;
			border: 1px dashed #ccc;
		}

		.navbar-nav .nav-item .nav-link .badge {
			margin-left: -0.3rem;
		}

		.select2-container .select2-choice {
			height: 38px;
			line-height: 36px;
		}

		.select2-container .select2-choice .select2-arrow b {
			background-position: 0 5px;
		}

		/* ปรับสีเทมเพลต */
		nav.navbar {
			background-color: #337ba4 !important;
		}

		@media (min-width: 768px) {
			.sidebar {
				width: 275px !important;
			}

			.sidebar .nav-item .nav-link {
				display: block;
				width: 100%;
				text-align: left;
				padding: 1rem;
				width: 275px;
			}

		}

		.sidebar {
			width: 275px;
			/* !important; */
			background-color: #223344;
		}

		.dropdown-header {
			display: block;
			padding: 0.5rem 1.5rem;
			margin-bottom: 0;
			font-size: 0.9rem;
			color: #6c757d;
			white-space: pre-wrap;
		}

		.dropdown-item {
			font-size: 0.9rem;
			display: block;
			width: 100%;
			padding: 0.25rem 1.9rem;
			clear: both;
			font-weight: 400;
			color: #212529;
			text-align: inherit;
			/* white-space: pre-wrap; */
			background-color: transparent;
			border: 0;
		}

		.dropdown-header {
			background-color: transparent;
			font-weight: 400;
			width: 100%;
			display: block;
			padding: 0.5rem 1rem;
			margin-bottom: 0;
			border: 0;
			clear: both;
			font-size: 0.9rem;
			color: #000;
			white-space: pre-wrap;
		}


		.sidebar-dark hr.sidebar-divider {
			border-top: 1px solid rgba(0, 0, 0, 1.15);
		}

		.sidebar hr.sidebar-divider {
			margin: 0 1rem 1rem;
		}


		.topbar .top-navbar .navbar-header {
			background: rgba(0, 0, 0, .05);
			padding-left: 10px;
			min-width: 70px;
		}

		.topbar .top-navbar .navbar-header {
			background: rgba(0, 0, 0, .05);
			padding-left: 10px;
			min-width: 70px;
		}

		.align-items-center {
			align-items: center !important;
		}

		.header-logo-img {
			width: 40px;
		}

		.header-logo-link .header-logo-description .description-header {
			font-size: 0.8rem;
			margin: 0;
			padding: 0;
		}

		.header-logo-link .header-logo-description .description-body {
			font-size: 0.7rem;
			margin: 0;
			padding: 0;
		}


		/* TAB  */
		/* Tr Job Post */

		.job-item {
			background-color: #fff;
		}

		.job-tab .nav-tabs {
			margin-bottom: 60px;
			border-bottom: 0;
		}

		.job-tab .nav-tabs>li {
			float: none;
			display: inline;
		}

		.job-tab .nav-tabs li {
			margin-right: 15px;
		}

		.job-tab .nav-tabs li:last-child {
			margin-right: 0;
		}

		.job-tab .nav-tabs {
			position: relative;
			z-index: 1;
			display: inline-block;
		}

		.job-tab .nav-tabs:after {
			position: absolute;
			content: "";
			top: 50%;
			left: 0;
			width: 100%;
			height: 1px;
			background-color: #fff;
			z-index: -1;
		}



		.job-tab .nav-tabs>li a {
			display: inline-block;
			background-color: #fff;
			border: none;
			border-radius: 30px;
			font-size: 14px;
			color: #000;
			padding: 5px 30px;
		}

		.job-tab .nav-tabs>li>a.active,
		.job-tab .nav-tabs>li a.active>:focus,
		.job-tab .nav-tabs>li>a.active:hover,
		.job-tab .nav-tabs>li>a:hover {
			border: none;
			background-color: #008def;
			color: #fff;
		}

		.job-item {
			border-radius: 3px;
			position: relative;
			margin-bottom: 30px;
			z-index: 1;
		}

		.job-item .btn.btn-primary {
			text-transform: capitalize;
		}

		.job-item .job-info {
			font-size: 14px;
			color: #000;
			overflow: hidden;
			padding: 40px 25px 20px;
		}

		.job-info .company-logo {
			margin-bottom: 30px;
		}

		.job-info .tr-title {
			margin-bottom: 15px;
		}

		.job-info .tr-title span {
			font-size: 14px;
			display: block;
		}

		.job-info .tr-title a {
			color: #000;
		}

		.job-info .tr-title a:hover {
			color: #008def;
		}

		.job-info ul {
			margin-bottom: 30px;
		}

		.job-meta li,
		.job-meta li a {
			color: #646464;
		}

		.job-meta li a:hover {
			color: #008def;
		}

		.job-meta li {
			font-size: 12px;
			margin-bottom: 10px;
		}

		.job-meta li span i {
			color: #000;
		}

		.job-meta li i {
			margin-right: 15px;
		}

		.job-item .time {
			position: relative;
		}

		.job-item .time:after {
			position: absolute;
			content: "";
			bottom: 35px;
			left: -50px;
			width: 150%;
			height: 1px;
			background-color: #f5f4f5;
			z-index: -1;
		}

		.job-item:hover .time,
		.job-item:hover .time:after {
			opacity: 0;
		}

		.job-item .time span {
			font-size: 12px;
			color: #bebebe;
			line-height: 25px;
		}

		.job-item .btn.btn-primary,
		.role .btn.btn-primary,
		.job-item .time a span {
			padding: 5px 10px;
			border-radius: 4px;
			line-height: 10px;
			font-size: 12px;
		}

		.job-item .time a span {
			color: #fff;
			background-color: #f1592a;
			border-color: #f1592a;
		}

		.job-item .time a span.part-time {
			background-color: #00aeef;
			border-color: #00aeef;
		}

		.job-item .time a span.freelance {
			background-color: #92278f;
			border-color: #92278f;
		}

		.job-item .item-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			border-radius: 5px;
			background-color: #008def;
			color: #fff;
			opacity: 0;
			-webkit-transition: all 800ms;
			-moz-transition: all 800ms;
			-ms-transition: all 800ms;
			-o-transition: all 800ms;
			transition: all 800ms;
		}

		.job-item:hover .item-overlay {
			opacity: 1;
		}

		.item-overlay .job-info {
			padding: 45px 25px 40px;
			overflow: hidden;
		}

		.item-overlay .btn.btn-primary {
			background-color: #007bd4;
			border-color: #007bd4;
			margin-bottom: 10px;
		}

		.item-overlay .job-info,
		.item-overlay .job-info ul li,
		.item-overlay .job-info ul li i,
		.item-overlay .job-info .tr-title a {
			color: #fff;
		}

		.job-social {
			margin-top: 35px;
		}

		.job-social li {
			float: left;
		}

		.job-social li+li {
			margin-left: 15px;
		}

		.job-social li a i {
			margin-right: 0;
			font-size: 14px;
		}

		.job-social li a {
			width: 35px;
			height: 35px;
			text-align: center;
			display: block;
			background-color: #007bd4;
			line-height: 35px;
			border-radius: 100%;
			border: 1px solid #007bd4;
			position: relative;
			overflow: hidden;
			z-index: 1;
		}

		.job-social li:last-child a {
			background-color: #fff;
		}

		.job-social li:last-child a i {
			color: #008def;
		}

		.job-social li a:before {
			position: absolute;
			content: "";
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
			border-radius: 100%;
			background-color: #008def;
			-webkit-transform: scale(0);
			-moz-transform: scale(0);
			-ms-transform: scale(0);
			transform: scale(0);
		}

		.job-social li a:hover:before {
			-webkit-transform: scale(1);
			-moz-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1);
			padding: 5px;
		}

		.job-social li a:hover {
			border-color: #fff;
		}

		.job-social li a:hover i {
			color: #fff;
		}

		.tr-list {
			margin: 0;
			padding: 0;
			list-style: none;
		}
	</style>


	<script>
		var baseURL = '{base_url}/';
		var siteURL = '{site_url}/';
		var csrf_token_name = '{csrf_token_name}';
		var csrf_cookie_name = '{csrf_cookie_name}';
	</script>
</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-info static-top">

		<!-- <a class="navbar-brand mr-1" href="{site_url}">สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</a> -->
		<div class="navbar-header partailview-for-connfig-nav-header">
			<a class="navbar-brand sidebar-brand d-flex align-items-center justify-content-center header-logo-link" href="{site_url}" style="color:#fff;">
				<div class="sidebar-brand-icon">
					<img class="header-logo-img" src="{base_url}assets/images/ctrlniems_logo.png">
				</div>
				<span class="sidebar-brand-text header-logo-description hidden-md">
					<p class="description-header">สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด</p>
					<p class="description-body">Office of the Narrcotics Control Board</p>
				</span>
			</a>
		</div>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar -->
		{top_navbar}

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		{left_sidebar}

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- Breadcrumbs-->
				{breadcrumb_list}

				<!-- Page Content -->
				{page_content}

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<!-- <footer class="sticky-footer">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright © Your Website 2018</span>
					</div>
				</div>
			</footer> -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">คลิกปุ่ม "Logout" เพื่อสิ้นสุดการทำงาน.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="{site_url}/member/logout">Logout</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Change Password Modal-->
	<div class="modal fade" id="modal_change_pass" tabindex="-1" role="dialog" aria-labelledby="modal_change_pass_Label" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="modal_change_pass_Label">เปลี่ยนรหัสผ่าน</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

				</div> <!-- /.modal-header -->

				<div class="modal-body">
					<form role="form" id="formChangePass">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control" id="resetPassword1" name="resetPassword1" placeholder="รหัสผ่านใหม่" type="password">
								<label for="resetPassword1" class="input-group-addon glyphicon glyphicon-lock new"></label>
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<div class="input-group">
								<input class="form-control" id="resetPassword2" name="resetPassword2" placeholder="ยืนยันรหัสผ่านใหม่อีกครั้ง" type="password">
								<label for="resetPassword2" class="input-group-addon glyphicon glyphicon-lock new"></label>
							</div> <!-- /.input-group -->
						</div> <!-- /.form-group -->

						<div class="form-group">
							<div class="input-group">
								<input class="form-control" id="uPasswordOld" name="uPasswordOld" placeholder="รหัสผ่านเดิม" type="password">
								<label for="uPasswordOld" class="input-group-addon glyphicon glyphicon-lock"></label>
							</div> <!-- /.input-group -->
						</div> <!-- /.form-group -->

					</form>

				</div> <!-- /.modal-body -->

				<div class="modal-footer">
					<button id="btn_change_pass" class="form-control btn btn-primary">Ok</button>

					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="100" style="width: 0%;">
							<span class="sr-only">progress</span>
						</div>
					</div>
				</div> <!-- /.modal-footer -->

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/jquery/jquery.min.js"></script>
	<script src="{base_url}assets/themes/jquery.table2excel.js"></script>
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Page level plugin JavaScript-->
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/datatables/jquery.dataTables.js"></script>
	<script src="{base_url}assets/themes/sb-admin-bs4/vendor/datatables/dataTables.bootstrap4.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="{base_url}assets/themes/sb-admin-bs4/js/sb-admin.min.js"></script>

	<!-- Require -->
	<script src="{base_url}assets/js/jquery-ui.min.js"></script>
	<script src="{base_url}assets/bootstrap_extras/sweetalert/dist/sweetalert.min.js"></script>
	<script src="{base_url}assets/bootstrap_extras/bootstrap-notify.min.js"></script>
	<script src="{base_url}assets/bootstrap_extras/select2/select2.min.js"></script>
	<script src="{base_url}assets/js/jquery.cookie.min.js"></script>
	<script src="{base_url}assets/js/ci_utilities.js?ver=1541805506"></script>

	{another_js}
</body>

</html>
