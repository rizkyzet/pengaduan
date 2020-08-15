 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Lihat Responden</h1>
     <?= $this->session->flashdata('pesan') ?>





     <table class="table table-sm table-hover table-bordered table-striped mt-2 datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;">No</th>
                 <th>NPM</th>
                 <th scope="col" class="text-center">Mahasiswa</th>
                 <th scope="col" class="text-center">Fakultas</th>
                 <th scope="col" class="text-center">Prodi</th>
                 <th scope="col" class="text-center">Tanggal Jawab</th>
                 <th scope="col" class="text-center">Status</th>
             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($mahasiswa as $index => $mhs) : ?>

                 <tr>
                     <td><?= $no++ ?></td>
                     <td><?= $mhs['npm'] ?></td>
                     <td><?= $mhs['nama'] ?></td>
                     <td><?= $mhs['nama_fakultas'] ?></td>
                     <td><?= $mhs['nama_prodi'] ?></td>
                     <td><?= $status[$index]['tanggal'] ?></td>
                     <td class="text-center">
                         <?= $status[$index]['status'] == 'Sudah Mengisi' ? "<span class='badge badge-success'>" . $status[$index]['status'] . "</span>" : "<span class='badge badge-danger'>" . $status[$index]['status'] . "</span>" ?>
                     </td>
                 </tr>
             <?php endforeach; ?>


         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->