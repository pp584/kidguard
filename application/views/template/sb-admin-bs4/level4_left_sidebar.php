<?php $segment1MenuList = ['dashboard'] ?>
<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
	<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
		<i class="fas fa-w fa-chart-pie"></i>
		Dashboard
	</a>
	<div class="dropdown-menu <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "DashboardOverview") echo 'active'; ?>" href="{site_url}dashboard/DashboardOverview">
			<i class="fas fa-chart-bar"></i>
			ระดับภาคทั่วประเทศ
		</a>
	</div>
</li>