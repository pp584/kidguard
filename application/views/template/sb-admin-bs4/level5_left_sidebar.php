
<h6 class="dropdown-header" style="color: white;">--Dashboard--</h6>

<li class="nav-item dropdown <?php if ($this->uri->segment(1) == "dashboard") {echo 'show';} ?>">
        <a class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {echo 'active';} ?>" href="{site_url}dashboard/DashboardOverview">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span class="nav-link-text"> สถานศึกษา-ภาค ย้อนหลัง 3 ปี  </span>
        </a>
</li>

