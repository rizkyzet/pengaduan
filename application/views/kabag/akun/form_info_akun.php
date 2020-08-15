 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800 ">Info Akun</h1>
     <?= $this->session->flashdata('pesan') ?>
     <?= $this->session->flashdata('pesan_upload'); ?>
     <div class="row ">
         <div class="col-sm-2  ">
             <img style="width: 240px; height:220px;" src="<?= base_url('assets/img/foto_profil/' . $user['gambar']) ?>" alt="" class="img-thumbnail  ">
             <div class="text-center">
                 <a href="<?= base_url('kabag/akun/edit_akun') ?>" class="btn btn-info mt-2 ">Ubah Akun</a>
             </div>
         </div>
         <div class="col-4 ">
             <table class="table table-bordered table-sm mt-2">
                 <tr>
                     <th style="width: 150px;"><?= $user['role_id'] == 1 ? 'NPM' : 'NIK' ?></th>
                     <td><?= $user['role_id'] == 1 ? $user['npm'] : $user['nik'] ?> </td>
                 </tr>
                 <tr>
                     <th style="width: 150px;">Nama</th>
                     <td><?= $user['nama'] ?></td>
                 </tr>
                 <tr>
                     <th style="width: 150px;">Jenis Kelamin</th>
                     <td><?= $user['jk'] ?></td>
                 </tr>
                 <tr>
                     <th style="width: 150px;">Alamat</th>
                     <td><?= $user['alamat'] ?></td>
                 </tr>
                 <tr>
                     <th style="width: 150px;">No Telepon</th>
                     <td><?= $user['no_tlp'] ?></td>
                 </tr>
                 <tr>
                     <th style="width: 150px;">Status</th>
                     <td><?= $user_role['nama_role'] ?></td>
                 </tr>
             </table>

         </div>
     </div>

 </div>
 <!-- /.container-fluid -->