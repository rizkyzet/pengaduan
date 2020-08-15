<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar bg-gradient-info sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Akun
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/akun') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Info</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/akun/ubah_password') ?>">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Kata Sandi</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            Master
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/administrator') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span></a>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/mahasiswa') ?>">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Mahasiswa</span></a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?php echo base_url('admin/fakultas') ?>">
                <i class="fas fa-fw fa-building"></i>
                <span>Fakultas</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/prodi') ?>">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Prodi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pengaduan') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Pengaduan</span></a>
        </li>

        <div class="sidebar-heading">
            Laporan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/laporan/grafik') ?>">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Grafik</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/laporan/pengaduan') ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan Pengaduan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/laporan/saran') ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan Saran</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->