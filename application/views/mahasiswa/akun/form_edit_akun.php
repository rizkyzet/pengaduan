 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Ubah Data Akun</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>

         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <?= form_open_multipart(base_url('mahasiswa/akun/edit_akun')) ?>
             <div class="form-group">
                 <label for="nama">Nama</label>
                 <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                 <?= form_error('nama', "<div class='text-danger text-small'> ", "</div>"); ?>
             </div>
             <div class="form-group">
                 <label for="jk">Jenis Kelamin</label>
                 <select class="form-control" id="jk" name="jk">
                     <option selected>Jenis Kelamin</option>
                     <option <?= $user['jk'] == 'laki-laki' ? 'selected' : '' ?> value="laki-laki">Laki-laki</option>
                     <option <?= $user['jk'] == 'perempuan' ? 'selected' : '' ?> value="perempuan">Perempuan</option>
                 </select>
                 <?= form_error('jk', "<div class='text-danger text-small'> ", "</div>"); ?>
             </div>
             <div class="form-group">
                 <label for="alamat">Alamat</label>
                 <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $user['alamat'] ?></textarea>
                 <?= form_error('alamat', "<div class='text-danger text-small'> ", "</div>"); ?>
             </div>
             <div class="form-group">
                 <label for="no_tlp">No Telepon</label>
                 <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp'] ?>">
                 <?= form_error('no_tlp', "<div class='text-danger text-small'> ", "</div>"); ?>
             </div>

             <div class="form-group">
                 <label for="">Gambar</label>
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="row">
                             <div class="col-sm-6">
                                 <img class="img-preview img-thumbnail" src="<?= base_url('assets/img/foto_profil/' . $user['gambar']) ?>">
                             </div>
                             <div class="col-sm-6">
                                 <div class="custom-file">
                                     <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                     <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <button class="btn btn-info" type="submit">Ubah Data Akun</button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->