 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Ubah Data Admin</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <form action="<?= base_url('admin/administrator/edit_admin/' . $admin['id']);  ?>" method="post">
                 <div class="form-group">
                     <label for="nik">NIK</label>
                     <input disabled type="text" class="form-control" id="nik" name="nik" value="<?= $admin['nik'] ?>">
                     <?= form_error('nik', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <div class="form-group">
                     <label for="nama">Nama</label>
                     <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama'] ?>">
                     <?= form_error('nama', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="psw">Kata Sandi</label>
                     <input type="text" class="form-control" id="psw" name="psw">
                     <div class="text-muted text-small font-weight-lighter">*isi bila ingin diganti</div>
                     <?= form_error('psw', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="jk">Jenis Kelamin</label>
                     <select class="form-control" id="jk" name="jk">
                         <option value="">Pilih</option>
                         <option <?= $admin['jk'] == 'laki-laki' ? 'selected' : '' ?> value="laki-laki">Laki-laki</option>
                         <option <?= $admin['jk'] == 'perempuan' ? 'selected' : '' ?> value="perempuan">Perempuan</option>
                     </select>
                     <?= form_error('jk', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $admin['alamat'] ?></textarea>
                     <?= form_error('alamat', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="no_tlp">No Telepon</label>
                     <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $admin['no_tlp'] ?>">
                     <?= form_error('no_tlp', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <button class="btn btn-info" type="submit">Ubah Data Admin</button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->