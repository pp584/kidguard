<div class="container">
	<div class="row">
		<div class="col-sm-2 col-md-2 col-xl-3">
			<a class="navbar-brand" href="{site_url}"><img src="{base_url}assets/images/logo.png" alt="Logo" /></a>
		</div>
		<div class="col-sm-8 col-md-8 col-xl-7 d-flex ms-header-bg">
			<nav class="navbar navbar-expand-lg">
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#hamburgernavmenucontent" aria-controls="hamburgernavmenucontent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="menu_toggle">
						<span class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="hamburger-cross">
							<span></span>
							<span></span>
						</span>
					</span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="hamburgernavmenucontent">
					<ul class="navbar-nav align-items-lg-center">
						<li class="nav-item"><a href="{site_url}">หน้าหลัก</a></li>
						<li class="nav-item"><a href="{site_url}about">เกี่ยวกับเรา</a></li>

						<li class="dropdown nav-item">
							<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ข่าวสาร</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{site_url}announcement">ข่าวสาร</a>
								<a class="dropdown-item" href="{site_url}postnews">ประชาสัมพันธ์</a>
								<a class="dropdown-item" href="{site_url}activities">กิจกรรม</a>
							</div>
						</li>

						<li class="dropdown nav-item">
							<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ป้องกันสารเสพติด</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{site_url}news_basic_info">ข้อมูลพื้นฐาน</a>
								<a class="dropdown-item" href="{site_url}news_research_info">ข้อมูลงานวิจัย</a>
							</div>
						</li>

						<li class="nav-item"><a href="{site_url}asked_questions">FAQ</a></li>
						<li class="nav-item"><a href="{site_url}contactus">ติดต่อเรา</a></li>

						<li class="dropdown nav-item">
							<a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">แบบประเมิน</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{site_url}evaluation_form/evaluationExplanation">แบบประเมิน</a>
								<!-- <a class="dropdown-item" href="{site_url}assessment/assessment_create">แบบประเมิน</a> -->
								<a class="dropdown-item" target="_blank" href="{site_url}/assets/uploads/pdf/คู่มือการใช้งานนักเรียน.pdf">PDF คู่มือนักเรียน</a>
								<a class="dropdown-item" target="_blank" href="{site_url}/assets/uploads/vdo/VDO คู่มือการใช้งานของนักเรียน.mp4">VDO คู่มือนักเรียน</a>
							</div>
						</li>
						<!--<li class="nav-item"><a href="{site_url}assessment/assessment_create">แบบประเมิน</a></li>-->
						<li class="dropdown nav-item">
							<!-- <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">สืบค้นข้อมูล</a> -->
						</li>
					</ul>
				</div>
			</nav>

		</div>
		<div class="col-sm-2 col-md-2 col-xl-2 ">
			<?php
			$level_user =  $this->session->userdata("user_level");
			$user_firstname = $this->session->userdata('user_firstname');
			$user_lastname  = $this->session->userdata('user_lastname');

			$redirect_url = '';
			if ($level_user == 1) {
				$redirect_url = base_url() . 'dashboard/DashboardHistorical';
			} else if ($level_user == 2) {
				$redirect_url = base_url() . 'dashboard/DashboardHistorical';
			} else if ($level_user == 3) {
				$redirect_url = base_url() . 'dashboard/DashboardHistorical';
			} else if ($level_user == 4) {
				$redirect_url = base_url() . 'dashboard/DashboardOverview';
			} else if ($level_user == 9) {
				$redirect_url = base_url() . 'website/slides';
			}

			if ($this->session->userdata('login_validated') == false) {

			?>
				<a href="{site_url}member/login">
					<button class="btnlogin bg-info" value="Sign in"> <i class="fa fa-lock"></i> Login</button>
				</a>
			<?php
			} else {
			?>
				<a href="<?= $redirect_url ?>">
					<span>
						<button class="btnlogin bg-info" value="Sign in"> <i class="fa fa-user"></i> <?php echo $user_firstname  . ' ' . $user_lastname  ?></button>
					</span>
				</a>
			<?php  }
			?>
		</div>
	</div>
</div>