<?php $uri = service('uri'); ?>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url() ?>/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/dashboard" class="nav-link <?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard<i class="right"></i></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/app" class="nav-link <?= $uri->getSegment(1) == 'app' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Aplikasi<i class="right"></i></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/developer" class="nav-link <?= $uri->getSegment(1) == 'developer' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-laptop-code"></i>
                    <p>Developer<i class="right"></i></p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="/developing" class="nav-link <?= $uri->getSegment(1) == 'developing' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-code"></i>
                    <p>Developing<i class="right"></i></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/category" class="nav-link <?= $uri->getSegment(1) == 'category' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Category<i class="right"></i></p>
                </a>
            </li> -->
            <?php if (in_groups('admin')) : ?>
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= $uri->getSegment(1) == 'admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User List<i class="right"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/level_user" class="nav-link <?= $uri->getSegment(1) == 'level_user' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Level User<i class="right"></i></p>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="/user" class="nav-link <?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>Profile<i class="right"></i></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/logout') ?>" class="nav-link <?= $uri->getSegment(1) == 'logout' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout<i class="right"></i></p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div> -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">