 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Prodi</h1>
     <?= $this->session->flashdata('pesan') ?>
     <a href="<?= base_url('admin/prodi/tambah_prodi/') ?>" class="btn btn-info mb-3"> <i class='fas fa-plus-circle'></i> Tambah Prodi</a>

     <table class="table table-sm table-hover table-bordered table-striped mt-2 datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;" class="text-center">No</th>
                 <th scope="col" class="text-center">Nama Fakultas</th>
                 <th scope="col" class="text-center">Nama Prodi</th>
                 <th scope="col" class="text-center">Aksi</th>
             </tr>
         </thead>
         <tbody>

             <?php $no = 1;
                foreach ($prodi as $p) :  ?>

                 <tr>
                     <td class="text-center"> <?= $no++ ?></td>
                     <td> <?= $p['nama_fakultas'] ?></td>
                     <td> <?= $p['nama_prodi'] ?></td>

                     <td style="width:50px;">
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Ubah" data-placement="bottom" href="<?= base_url('admin/prodi/edit_prodi/' . $p['id_prodi']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                 <a data-toggle="tooltip" title="Hapus" data-placement="bottom" href="<?= base_url('admin/prodi/hapus_prodi/' . $p['id_prodi']) ?>" class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach ?>
         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->