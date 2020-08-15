<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar bg-gradient-info sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('mahasiswa') ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Mahasiswa</div>
        </a>

        <!-- Divider -->
        <!-- <hr class="sidebar-divider my-0"> -->


        <!-- Heading -->
        <div class="sidebar-heading">
            Akun
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mahasiswa/akun') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Info</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mahasiswa/akun/ubah_password') ?>">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Kata Sandi</span></a>
        </li>

        <!-- Heading -->

        <!-- Heading -->
        <div class="sidebar-heading">
            Pengaduan
        </div>


        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mahasiswa/pengaduan/judul') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Pengaduan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->