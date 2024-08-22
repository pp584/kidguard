<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
	<div class="input-group">
	</div>
</form>

<!-- Navbar -->
<style>
	@media only screen and (max-width: 768px) {
		.welcome-text {
			display: none;
		}
	}
</style>

<ul class="navbar-nav ml-auto ml-md-0">
	<li class="nav-item dropdown no-arrow">
		<a class="nav-link {login_inactive_class}" title="ล็อกอินเข้าใช้งาน" href="{site_url}/member/login">
			<span class="welcome-text">ล็อกอินเข้าใช้งาน</span>
			<i class="fas fa-user-circle fa-fw"></i>
		</a>
		<a class="nav-link dropdown-toggle {login_active_class}" href="#" title="ข้อมูลสมาชิก" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="welcome-text">ยินดีต้อนรับ {user_firstname} {user_lastname} - {user_level_name}</span>
			<i class="fas fa-user-circle fa-fw"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-right {login_active_class}" aria-labelledby="userDropdown">
			<a class="dropdown-item">{user_prefix_name} {user_firstname} {user_lastname}</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="{site_url}/member/profile">ข้อมูลส่วนตัว</a>
			<a class="dropdown-item" href="{site_url}">เยี่ยมชมเว็บไซต์</a>
			<div class="dropdown-divider"></div>
			<!-- {admin_top_menu} -->
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
		</div>
	</li>
</ul>