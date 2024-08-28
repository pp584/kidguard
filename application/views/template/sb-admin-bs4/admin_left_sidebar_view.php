<?php $segment1MenuList = ['website', 'ca_symptoms', 'cms_cardiac_arrest_slide', 'ca_resucitation'] ?>
<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
	<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
		<i class="fas fa-fw fa-folder"></i>
		<span>จัดการข้อมูลเว็บไซต์</span>
	</a>
	<div class="dropdown-menu <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "slides") echo 'active'; ?>" href="{site_url}website/slides">
			<i class="fas fa-images"></i>
			Slider Banner
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "news") echo 'active'; ?>" href="{site_url}website/news">
			<i class="fas fa-comment-alt"></i>
			ข่าวสาร/กิจกรรม/ประชาสัมพันธ์
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "faq") echo 'active'; ?> " href="{site_url}website/faq">
			<i class="fas fa-question"></i>
			คำถามที่พบบ่อย
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "ca_symptoms") echo 'active'; ?>" href="{site_url}ca_symptoms/ca_symptoms">
			<i class="fas fa-window-restore"></i>
			เทคนิคการช่วยเหลือ
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_cardiac_arrest_slide") echo 'active'; ?>" href="{site_url}cms_cardiac_arrest_slide/cms_cardiac_arrest_slide">
			<i class="fas fa-images"></i>
			Slide สื่อความรู้
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_ca_resuscitation") echo 'active'; ?>" href="{site_url}ca_resucitation/cms_ca_resuscitation">
			<i class="fas fa-chart-bar"></i>
			แผนภาพผลการประเมิน
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_ca_basic_info") echo 'active'; ?>" href="{site_url}website/cms_ca_basic_info">
			<i class="fas fa-window-restore"></i>
			ข้อมูลพื้นฐาน
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "research") echo 'active'; ?>" href="{site_url}website/research">
			<i class="fas fa-microscope"></i>
			ข้อมูลงานวิจัย
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "contact_us") echo 'active'; ?>" href="{site_url}website/contact_us">
			<i class="fas fa-envelope-open-text"></i>
			ข้อมูลติดต่อเรา
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_about_us") echo 'active'; ?>" href="{site_url}website/cms_about_us/edit/LzViMmFGck5GMXZHMFdkdnNWVFZWUT09">
			<i class="fas fa-address-book"></i>
			ข้อมูลเกี่ยวกับเรา
		</a>
	</div>
</li>

<?php $segment1MenuList = ['report'] ?>
<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
	<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
		<i class="fas fa-fw fa-tasks"></i>
		<span>การจัดการข้อมูลการประเมิน</span>
	</a>
	<div class="dropdown-menu <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(3) == "update_norm") echo 'active'; ?>" href="{site_url}report/assessmentV2/update_norm">
			<i class="fas fa-fw fa-chart-bar"></i>
			ปรับปรุงค่า Norm
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(3) == "sync_graph") echo 'active'; ?>" href="{site_url}report/assessmentV2/sync_graph">
			<i class="fas fa-fw fa-chart-bar"></i>
			ปรับปรุงข้อมูลกราฟ
		</a>
		<!-- <a class="dropdown-item <?php if ($this->uri->segment(3) == "import_excel") echo 'active'; ?>" href="{site_url}report/assessmentV2/import_excel">
			<i class="fas fa-fw fa-file-import"></i>
			นำเข้าข้อมูลแบบประเมิน
		</a> -->
		<a class="dropdown-item <?php if ($this->uri->segment(3) == "report_raw") echo 'active'; ?>" href="{site_url}report/assessmentV2/report_raw">
			<i class="fas fa-fw fa-file-alt"></i>
			ออกรายงาน (แบบประเมิน)
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(3) == "report_average") echo 'active'; ?>" href="{site_url}report/assessmentV2/report_average">
			<i class="fas fa-fw fa-file-alt"></i>
			ออกรายงาน (คะแนนเฉลี่ย)
		</a>
	</div>
</li>

<?php $segment1MenuList = ['Documents'] ?>
<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
	<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
		<i class="fas fa-fw fa-users"></i>
		<span>นโยบายการใช้งาน</span>
	</a>
	<div class="dropdown-menu <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "ca_symptomsn") echo 'active'; ?>" target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A1%E0%B8%B1%E0%B9%88%E0%B8%99%E0%B8%84%E0%B8%87%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%99%E0%B9%80%E0%B8%97%E0%B8%A8%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9C%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%88%E0%B8%B2%E0%B8%81%20%E0%B8%84%E0%B8%98%E0%B8%AD).pdf">
			<i class="fas fa-fw fa-users "></i>
			การใช้งานเว็บไซต์
		</a>
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "cms_cardiac_arrest_slide") echo 'active'; ?>" target="_blank" href="https://www.oncb.go.th/Documents/%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5.pdf">
			<i class="fas fa-fw fa-users "></i>
			การคุ้มครองข้อมูลส่วนบุคคล
		</a>
	</div>
</li>

<?php $segment1MenuList = ['users'] ?>
<li class="nav-item dropdown <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>">
	<a class="nav-link dropdown-toggle <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
		<i class="fas fa-fw fa-folder"></i>
		<span>จัดการผู้ใช้งาน</span>
	</a>
	<div class="dropdown-menu <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'show'; ?>" aria-labelledby="pagesDropdown">
		<a class="dropdown-item <?php if ($this->uri->segment(2) == "users") echo 'active'; ?>" href="{site_url}users/users">
			<i class="fas fa-fw fa-users"></i>
			จัดการผู้ใช้งาน
		</a>
	</div>
</li>

<?php $segment1MenuList = ['log'] ?>
<li class="nav-item">
	<a class="nav-link <?php if (in_array($this->uri->segment(1), $segment1MenuList)) echo 'active'; ?>" href="{site_url}log/Ci_log_history" role="button">
		<i class="fa fa-list"></i>
		<span>การใช้งาน</span>
	</a>
</li>