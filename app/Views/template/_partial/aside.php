<?php $uri = service('uri'); ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href="<?= base_url('dashboard') ?>">
			<img src="<?= base_url() ?>/template2/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
			<span class="ms-1 font-weight-bold text-white" translate="no">Layanan App</span>
		</a>
	</div>
	<hr class="horizontal light mt-0 mb-2">
	<hr class="horizontal light mt-0 mb-2">
	<div class="collapse navbar-collapse  w-auto h-auto max-height-vh-100" id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>" href="/dashboard">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-tachometer-alt"></i>
					</div>
					<span class="nav-link-text ms-1">Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'app' ? 'active' : '' ?>" href="/app">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-th"></i>
					</div>
					<span class="nav-link-text ms-1">App</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'developer' ? 'active' : '' ?>" href="/developer">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-laptop-code"></i>
					</div>
					<span class="nav-link-text ms-1">Developer</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'developing' ? 'active' : '' ?>" href="/developing">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fab fa-connectdevelop"></i>
					</div>
					<span class="nav-link-text ms-1">Developing</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'category' ? 'active' : '' ?>" href="/category">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-layer-group"></i>
					</div>
					<span class="nav-link-text ms-1">Category</span>
				</a>
			</li>
			<?php if (in_groups('admin')) : ?>
				<li class="nav-item">
					<a class="nav-link text-white <?= $uri->getSegment(1) == 'admin' ? 'active' : '' ?>" href="/admin">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="nav-icon fas fa-users"></i>
						</div>
						<span class="nav-link-text ms-1">User List</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?= $uri->getSegment(1) == 'level_user' ? 'active' : '' ?>" href="/level_user">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="nav-icon fas fa-users-cog"></i>
						</div>
						<span class="nav-link-text ms-1">Level User</span>
					</a>
				</li>
			<?php endif ?>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>" href="/user">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-id-card"></i>
					</div>
					<span class="nav-link-text ms-1">Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?= $uri->getSegment(1) == 'logout' ? 'active' : '' ?>" href="<?= base_url('/logout') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="nav-icon fas fa-sign-out-alt"></i>
					</div>
					<span class="nav-link-text ms-1">Logout</span>
				</a>
			</li>
		</ul>
	</div>
</aside>