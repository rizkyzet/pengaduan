 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Ubah Fakultas</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-8 ">
             <form action="<?= base_url('admin/fakultas/edit_fakultas/' . $id);  ?>" method="post">
                 <div class="d-flex flex-row">

                     <div class="form-group">
                         <label for="nama_fakultas">Nama Fakultas</label>
                         <input value="<?= $fakultas['nama_fakultas'] ?>" type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
                         <?= form_error('nama_fakultas', "<div class='text-danger text-small'> ", "</div>"); ?>
                     </div>
                     <div>
                         <button class="btn btn-success ml-4" style="margin-top: 31px;" type="submit"><i class="fas fa-edit"></i> Ubah Fakultas </button>

                     </div>
                 </div>
         </div>


     </div>


     </form>
 </div>






 <!-- /.container-fluid -->