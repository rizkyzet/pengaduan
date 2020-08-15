 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Tambah Data Pertanyaan</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <div class="row">
         <div class="col-lg-6">
             <form action="<?= base_url('admin/pertanyaan/tambah_pertanyaan/' . $kd_pengaduan);  ?>" method="post">
                 <div class="form-group">
                     <label for="pertanyaan">Pertanyaan</label>
                     <input value="" type="text" class="form-control" id="isi" name="isi">
                     <?= form_error('isi', "<div class='text-danger text-small'> ", "</div>"); ?>
                 </div>

                 <button class="btn btn-info" type="submit">Tambah</button>

             </form>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->