 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Ubah Data Mahasiswa</h1>

     <div class="row">
         <div class="col-lg-6 mt-3">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <form action="<?= base_url('admin/mahasiswa/edit_mahasiswa/' . $kode);  ?>" method="post">
                 <div class="form-group">
                     <label for="npm">NPM</label>
                     <input value="<?= $mahasiswa['npm'] ?>" type="text" class="form-control" id="npm" name="npm">
                     <?= form_error('npm', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="psw">Kata Sandi</label>
                     <input type="text" class="form-control" id="psw" name="psw">
                     <div class="text-muted text-small font-weight-lighter">*isi bila ingin diganti</div>
                     <?= form_error('psw', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <div class="form-group">
                     <label for="nama">Nama</label>
                     <input value="<?= $mahasiswa['nama'] ?>" type="text" class="form-control" id="nama" name="nama">
                     <?= form_error('nama', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="jk">Jenis Kelamin</label>
                     <select class="form-control" id="jk" name="jk">
                         <option selected>Jenis Kelamin</option>
                         <option <?= $mahasiswa['jk'] == 'laki-laki' ? 'selected' : '' ?> value="laki-laki">Laki-laki</option>
                         <option <?= $mahasiswa['jk'] == 'perempuan' ? 'selected' : '' ?> value="perempuan">Perempuan</option>
                     </select>
                     <?= form_error('jk', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $mahasiswa['alamat'] ?></textarea>
                     <?= form_error('alamat', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="no_tlp">No Telepon</label>
                     <input value="<?= $mahasiswa['no_tlp'] ?>" type="text" class="form-control" id="no_tlp" name="no_tlp">
                     <?= form_error('no_tlp', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>
                 <div class="form-group">
                     <label for="prodi">Program Studi</label>
                     <select class="form-control" id="prodi" name="prodi">
                         <option selected>Pilih Prodi</option>
                         <?php foreach ($fakultas as $f) :
                                $prodi = $this->db->get_where('prodi', ['id_fakultas' => $f['id_fakultas']])->result_array()
                            ?>
                             <optgroup label="<?php echo $f['nama_fakultas']; ?>">
                                 <?php foreach ($prodi as $p) : ?>
                                     <option <?= $mahasiswa['id_prodi'] == $p['id_prodi'] ? 'selected' : '' ?> value="<?= $p['id_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                                 <?php endforeach; ?>
                             </optgroup>
                         <?php endforeach; ?>
                     </select>
                     <?= form_error('prodi', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <button class="btn btn-info" type="submit">Ubah Data Mahasiswa</button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->