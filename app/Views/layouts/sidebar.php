
<header class="header bg-white" id="header">
	<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
	<div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
</header>
<div class="l-navbar" id="nav-bar">
	<nav class="nav">
		<div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">RYSTORE</span> </a>
			<div class="nav_list">
				<a href="<?= site_url('/dashboard') ?>" class="nav_link active">
					<i class='bx bx-grid-alt nav_icon'></i>
					<span class="nav_name">Dashboard</span>
				</a>
				<a href="/dashboard/customers" class="nav_link">
					<i class='bx bx-user nav_icon'></i>
					<span class="nav_name">Customers</span>
			</div>
		</div>
		<a href="<?= site_url('/auth/logout') ?>" class="nav_link">
			<i class='bx bx-log-out nav_icon'></i>
			<span class="nav_name">SignOut</span>
		</a>
	</nav>
</div>