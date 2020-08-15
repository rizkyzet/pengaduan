<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Kata Sandi</h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('mahasiswa/akun/ubah_password');  ?>" method="post">
                <div class="form-group">
                    <label for="password_sekarang">Kata Sandi sekarang</label>
                    <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
                    <?= form_error('password_sekarang', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password_baru">Kata Sandi Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru">
                    <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                    <?= form_error('konfirmasi_password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Ubah Kata Sandi</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->