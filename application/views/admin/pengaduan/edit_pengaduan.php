 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Ubah Data Pengduan</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <form action="<?= base_url('admin/pengaduan/edit_pengaduan/' . $pengaduan['kd_pengaduan']);  ?>" method="post">
                 <div class="form-group">
                     <label for="npm">Judul</label>
                     <input value="<?= $pengaduan['judul_pengaduan'] ?>" type="text" class="form-control" id="judul" name="judul">
                     <?= form_error('judul', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <button class="btn btn-success" type="submit"><i class="fas fa-edit"></i> Ubah Pengduan </button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->