<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
	<div class="container-fluid py-1 px-3 d-flex">
		<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
			<ul class="navbar-nav ms-auto justify-content-end">
				<li class="nav-item d-flex align-items-center dropdown">
					<a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton" data-bs-toggle="dropdown">
						<i class="fa fa-user me-sm-1"></i>
						<span class="d-sm-inline d-none"><?= user()->username; ?></span>
					</a>
					<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
						<li class="mb-2">
							<a class="dropdown-item border-radius-md" href="<?= base_url('user/') ?>">
								<div class="d-flex py-1">
									<div class="my-auto">
										<img src="<?= base_url(); ?>/img/<?= user()->foto; ?>" class="avatar avatar-sm  me-3 ">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="text-sm font-weight-normal mb-1">
											<span class="font-weight-bold"><?= user()->username; ?></span>
										</h6>
									</div>
								</div>
							</a>
						</li>
						<li class="d-flex justify-content-end">
							<a href="<?= base_url('/logout') ?>" class="w-100 btn btn-danger"><i class="material-icons opacity-10">logout</i> Logout</a>
						</li>
					</ul>
				</li>
				<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
					<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>