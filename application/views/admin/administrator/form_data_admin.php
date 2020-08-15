 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Admin</h1>
     <?= $this->session->flashdata('pesan') ?>
     <a href="<?= base_url('admin/administrator/tambah_admin') ?>" class="btn btn-info mb-3"> <i class='fas fa-plus-circle'></i> Tambah Admin</a>

     <table class="table table-sm table-hover table-bordered table-striped mt-2 datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;">No</th>
                 <th scope="col" class="text-center">NIK</th>
                 <th scope="col" class="text-center">Nama</th>
                 <th scope="col" class="text-center">Jenis Kelamin</th>
                 <th scope="col" class="text-center">Alamat</th>
                 <th scope="col" class="text-center">No Telepon</th>
                 <th scope="col" class="text-center">Aksi</th>
             </tr>
         </thead>
         <tbody>

             <?php $no = 1;
                foreach ($admin as $adm) :  ?>

                 <tr>
                     <td class="text-center"> <?= $no++ ?></td>
                     <td> <?= $adm['nik'] ?></td>
                     <td> <?= $adm['nama'] ?></td>
                     <td> <?= $adm['jk'] ?></td>
                     <td> <?= $adm['alamat'] ?></td>
                     <td> <?= $adm['no_tlp'] ?></td>


                     <td style="width:50px;">
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Ubah" data-placement="bottom" href="<?= base_url('admin/administrator/edit_admin/' . $adm['id']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                 <a data-toggle="tooltip" title="Hapus" data-placement="bottom" href="<?= base_url('admin/administrator/hapus_admin/' . $adm['id']) ?>" class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach ?>
         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->