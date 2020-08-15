<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar bg-gradient-info sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center mb-4" href="<?= base_url('kabag/akun') ?>">
            <div class="sidebar-brand-icon mt-3">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3" style="font-size: 12px">Kabag. Kemahasiswaan</div>
        </a>






        <!-- Heading -->
        <div class="sidebar-heading">
            Akun
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/akun') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Info</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/akun/ubah_password') ?>">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Kata Sandi</span></a>
        </li>



        <div class="sidebar-heading">
            Kuesioner
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/pengaduan') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Pengaduan</span></a>
        </li>





        <div class="sidebar-heading">
            Laporan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/laporan/grafik') ?>">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Grafik</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/laporan/pengaduan') ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan Pengaduan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kabag/laporan/saran') ?>">
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