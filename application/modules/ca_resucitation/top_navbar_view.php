<div class="sticky-top navbar-elixir">
    <div class="container">
        <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="{base_url}">
                <img style="width: 150px;" src="{base_url}assets/themes/front-end/assets/images/logo.png"
                    alt="logo" /></a>
            <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
            <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                    <li class="nav-item dropdown"><a class="nav-link" href="{site_url}" role="button">หน้าหลัก</a> </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator"
                            href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">เกี่ยวกับเรา</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{base_url}/About_Us">เกี่ยวกับเรา</a></li>
                            <li><a class="dropdown-item" href="{base_url}/services">การบริการ</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator"
                            href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">ข่าวสาร</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{site_url}/news_info">ข่าวสาร</a></li>
                            <li><a class="dropdown-item" href="{site_url}/news_activity">กิจกรรม</a></li>
                            <li><a class="dropdown-item" href="{site_url}/news_public">ประชาสัมพันธ์</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator"
                            href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">มาตรวัดความเป็นอิสระ</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{site_url}/basic_info">ข้อมูลพื้นฐาน</a></li>
                            <li><a class="dropdown-item" href="{site_url}/research_info">ข้อมูลงานวิจัย</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="{site_url}/faqs" role="button">FAQ</a> </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="{site_url}/contact"
                            role="button">ติดต่อเรา</a> </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="{site_url}/Open_Data"
                            role="button">ข้อมูลเปิดภาครัฐ</a> </li>

                </ul>

                <?php if ($this->session->userdata("user_id") == "" || empty($this->session->userdata("user_id"))) { ?>
                    <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0"
                        href="{site_url}member/login">Sign In
                    </a>
                <?php } else { ?>
                    <?php if ($this->session->userdata("user_level") == 9) { ?>
                        <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0"
                            href="{site_url}website/slides"><?php echo $this->session->userdata("user_firstname"); ?><?php echo $this->session->userdata("user_lastname"); ?>
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0"
                            href="{site_url}DashboardOverview"><?php echo $this->session->userdata("user_firstname"); ?><?php echo $this->session->userdata("user_lastname"); ?>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </nav>
    </div>
</div>