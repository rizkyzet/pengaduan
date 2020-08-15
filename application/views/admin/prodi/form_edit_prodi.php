 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> Ubah Prodi</h1>

     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('pesan'); ?>
         </div>
     </div>

     <form action="<?= base_url('admin/prodi/edit_prodi/' . $id_prodi);  ?>" method="post">
         <div class="row">
             <div class="col-lg-4 ">
                 <div class="form-group">
                     <label for="fakultas">Fakultas</label>
                     <select class="form-control" name="fakultas" id="fakultas">
                         <?php foreach ($fakultas as $fak) : ?>
                             <option <?= $prodi['id_fakultas'] == $fak['id_fakultas'] ? 'selected' : '' ?> value="<?= $fak['id_fakultas'] ?>"><?= $fak['nama_fakultas'] ?></option>
                         <?php endforeach; ?>
                     </select>
                     <?= form_error('fakultas', '<div class="text-small text-danger">', '</div>') ?>
                 </div>
                 <div class="form-group">
                     <label for="prodi">Prodi</label>
                     <input value="<?= $prodi['nama_prodi'] ?>" type="text" class="form-control" name="prodi" id="prodi">
                     <?= form_error('prodi', '<div class="text-small text-danger">', '</div>') ?>

                 </div>
                 <button type="submit" class="btn btn-info">Ubah Prodi</button>
             </div>


         </div>


     </form>
 </div>