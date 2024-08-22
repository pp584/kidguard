<li class="nav-item dropdown <?php if ($this->uri->segment(1) == "dashboard") echo 'show'; ?>">
	<a class="nav-link <?php if ($this->uri->segment(1) == "dashboard") echo 'active'; ?>" href="{site_url}dashboard/DashboardHistorical">
		<i class="fa fa-tachometer" aria-hidden="true"></i>
		<span class="nav-link-text"> ปปส-ระดับประเทศย้อนหลัง 3 ปี</span>
	</a>
</li>

<li class="nav-item dropdown <?php if ($this->uri->segment(1) == "dashboard") echo 'show'; ?>">
	<a class="nav-link <?php if ($this->uri->segment(1) == "dashboard") echo 'active'; ?>" href="{site_url}dashboard/DashboardOverview">
		<i class="fa fa-tachometer" aria-hidden="true"></i>
		<span class="nav-link-text"> ปปส-ระดับภาคทั่วประเทศ </span>
	</a>
</li>

<li class="nav-item dropdown <?php if ($this->uri->segment(1) == "ca_symptoms") echo 'show'; ?>">
	<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fas fa-fw fa-tasks"></i>
		<span>การจัดการข้อมูลการประเมิน</span>
	</a>
	<div class="dropdown-menu <?php if ($this->uri->segment(1) == "surway") {
									echo 'show';
								} ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "surway") {
									echo 'active';
								} ?>" href="{site_url}/surway/basic_information/import_excel_form"> <i class="fas fa-fw fa-upload "></i>นำเข้าไฟล์ข้อมูล (Import)</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "surway") {
									echo 'active';
								} ?>" href="{site_url}/surway/basic_information"> <i class="fas fa-fw fa-check "></i>ตรวจสอบความถูกต้อง</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "surway") {
									echo 'active';
								} ?>" href="#"> <i class="fas fa-fw fa-download "></i>ออกรายงาน</a>

	</div>
</li>
