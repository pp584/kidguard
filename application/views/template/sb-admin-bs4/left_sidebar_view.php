<style>
	.nav-item .nav-link.active {
		color: #ffffff !important
	}
</style>

<ul class="sidebar navbar-nav">

	{admin_left_menu}
	{other_permission_menu}
	{user_left_menu}

	<h6 class="dropdown-header" style="color: white;">--ส่วนสนับสนุนการใช้งาน--</h6>

	<?php if ($this->session->userdata("user_id") && ($this->session->userdata("user_level"))) : ?>
		<?php $segment1MenuList = ['ca_symptoms'] ?>
		<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
			<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
				<i class="fa fa-file"></i>
				<span class="nav-link-text">คู่มือการใช้งาน</span>
			</a>

			<?php if ($this->session->userdata("user_level") == 9) : ?>
				<div class="dropdown-menu <?php if ($this->uri->segment(1) == "ca_symptomsm") echo 'show'; ?>" aria-labelledby="pagesDropdown">
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "ca_symptomsm") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/pdf/คู่มือการใช้งานของระดับสิทธิ์ผู้ดูแลระบบ.pdf"> <i class="fa fa-file"></i> PDF File</a>
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_cardiac_arrest_slide") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/vdo/VDO คู่มือการใช้งานของผู้ดูแลระบบ.mp4"> <i class="fa fa-file"></i> VDO Clip</a>
				</div>
			<?php elseif ($this->session->userdata("user_level") == 3) : ?>
				<div class="dropdown-menu <?php if ($this->uri->segment(1) == "ca_symptomsm") echo 'show'; ?>" aria-labelledby="pagesDropdown">
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "ca_symptomsm") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/pdf/คู่มือการใช้งานของระดับสิทธิ์ผู้บริหารปปส.pdf"> <i class="fa fa-file"></i> PDF File</a>
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_cardiac_arrest_slide") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/vdo/VDO คู่มือการใช้งานของผู้บริหารปปส.mp4"> <i class="fa fa-file"></i> VDO Clip</a>
				</div>
			<?php elseif ($this->session->userdata("user_level") == 4) : ?>
				<div class="dropdown-menu <?php if ($this->uri->segment(1) == "ca_symptomsm") echo 'show'; ?>" aria-labelledby="pagesDropdown">
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "ca_symptomsm") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/pdf/คู่มือการใช้งานของระดับสิทธิ์ผู้บริหารสถาบัน.pdf"> <i class="fa fa-file"></i> PDF File</a>
					<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_cardiac_arrest_slide") echo 'active'; ?>" target="_blank" href="{site_url}/assets/uploads/vdo/VDOคู่มือการใช้งานของผู้บริหารสถาบัน.mp4"> <i class="fa fa-file"></i> VDO Clip</a>
				</div>
			<?php endif ?>
		</li>
	<?php endif ?>

	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		<a class="nav-link" href="{site_url}asked_questions">
			<i class="fa fa-file" aria-hidden="true"></i>
			<span class="nav-link-text">FAQ</span>
		</a>
	</li>
</ul>
