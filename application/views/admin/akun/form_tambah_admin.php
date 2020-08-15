 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Tambah Data Admin</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <form action="<?= base_url('admin/akun/tambah_admin');  ?>" method="post">


                 <div class="form-group">
                     <label for="nama">Nama</label>
                     <input type="text" class="form-control" id="nama" name="nama">
                     <?= form_error('nama', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="psw">Kata Sandi</label>
                     <input type="text" class="form-control" id="psw" name="psw">
                     <?= form_error('psw', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="jk">Jenis Kelamin</label>
                     <select class="form-control" id="jk" name="jk">
                         <option value="">Pilih</option>
                         <option value="laki-laki">Laki-laki</option>
                         <option value="perempuan">Perempuan</option>
                     </select>
                     <?= form_error('jk', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                     <?= form_error('alamat', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="no_tlp">No Telepon</label>
                     <input type="text" class="form-control" id="no_tlp" name="no_tlp">
                     <?= form_error('no_tlp', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <button class="btn btn-info" type="submit">Tambah Data Admin</button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->