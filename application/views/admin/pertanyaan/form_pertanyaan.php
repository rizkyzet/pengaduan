 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pertanyaan</h1>
     <?= $this->session->flashdata('pesan') ?>
     <a href="<?= base_url('admin/pertanyaan/tambah_pertanyaan/' . $pertanyaan[0]['kd_pengaduan']) ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah Pertanyaan</a>



     <table class="table table-sm table-hover table-bordered table-striped mt-2 ">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;">No</th>
                 <th scope="col" class="text-center">Isi</th>
                 <th style="width:60px;" scope="col" class="text-center">Aksi</th>


             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pertanyaan as $tanya) : ?>
                 <tr>
                     <td><?= $no++ ?></td>
                     <td> <?= $tanya['isi'] ?></td>
                     <td>
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Ubah" data-placement="bottom" href="<?= base_url('admin/pertanyaan/edit_pertanyaan/' . $tanya['kd_pertanyaan']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                 <a data-toggle="tooltip" title="Hapus" data-placement="bottom" href="<?= base_url('admin/pertanyaan/hapus_pertanyaan/' . $tanya['kd_pertanyaan'] . '/' . $tanya['kd_pengaduan']) ?>" class=" btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                             </div>
                         </div>
                     </td>
                 </tr>

             <?php endforeach;  ?>

         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->