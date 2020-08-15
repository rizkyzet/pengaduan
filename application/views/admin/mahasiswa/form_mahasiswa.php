 <!-- Begin Page Content -->
 <div class="container-fluid ">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"> <?= $judul; ?> </h1>

     <a href="<?= base_url('admin/mahasiswa/tambah_mahasiswa') ?>" class="btn btn-info mb-2">
         <i class="fas fa-plus-circle"></i> Tambah Data Mahasiswa</a>



     <?= $this->session->flashdata('pesan') ?>

     <table class="table table-hover table-bordered table-striped datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope=" col" class="text-center" style="vertical-align:middle;">No</th>
                 <th scope="col" class="text-center" style="vertical-align:middle;">NPM</th>
                 <th scope="col" class="text-center">Nama Mahasiswa</th>
                 <th scope="col" style="vertical-align:middle;" class="text-center">Jenis Kelamin</th>
                 <th scope="col" style="vertical-align:middle;" class=" text-center">Alamat</th>
                 <th scope="col" style="vertical-align:middle;" class=" text-center">No Telpon</th>
                 <th scope="col" style="vertical-align:middle;" class=" text-center">Nama Fakultas</th>
                 <th scope="col" style="vertical-align:middle;" class=" text-center">Nama Prodi</th>
                 <th scope="col" style="vertical-align:middle;" class="text-center">Aksi</th>

             </tr>
         </thead>
         <tbody>


             <?php $i = 1; ?>

             <?php foreach ($mahasiswa as $mhs) : ?>
                 <tr>
                     <td class="text-center"> <?= $i; ?></td>
                     <td> <?= $mhs['npm']; ?></td>
                     <td> <?= $mhs['nama']; ?></td>

                     <td> <?= $mhs['jk']; ?></td>
                     <td> <?= $mhs['alamat']; ?></td>
                     <td> <?= $mhs['no_tlp']; ?></td>
                     <td> <?= $mhs['nama_fakultas']; ?></td>
                     <td> <?= $mhs['nama_prodi']; ?></td>
                     <td>
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Edit Data Mahasiswa" data-placement="bottom" href="<?= base_url('admin/mahasiswa/edit_mahasiswa/' . $mhs['npm']) ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                 <a data-toggle="tooltip" title="Hapus" data-placement="bottom" href="<?= base_url('admin/mahasiswa/hapus_mahasiswa/' . $mhs['npm']) ?>" class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                             </div>
                         </div>
                     </td>
                 </tr>
                 <?php $i++; ?>
             <?php endforeach; ?>


         </tbody>
     </table>


 </div>

 <!-- /.container-fluid -->