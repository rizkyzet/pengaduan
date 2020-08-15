 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pengaduan</h1>
     <?= $this->session->flashdata('pesan') ?>





     <table class="table table-sm table-hover table-bordered table-striped mt-2 datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;" class="text-center">No</th>
                 <th scope="col" class="text-center">Tanggal dibuat</th>
                 <th scope="col" class="text-center">Judul Pengaduan</th>
                 <th scope="col" class="text-center">Responden</th>



             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pengaduan as $index => $png) : ?>
                 <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td><?= $png['tgl_dibuat'] ?></td>
                     <td><?= $png['judul_pengaduan'] ?></td>
                     <td class="text-center"><?= $sudah_isi[$index]; ?>/<strong> <?= $jumlah_mahasiswa ?> </strong> <a data-toggle="tooltip" title="Lihat" data-placement="bottom" style="border-radius:50px;" class="btn btn-sm btn-primary ml-2" href="<?= base_url('kabag/pengaduan/cek_responden/' . $png['kd_pengaduan']) ?>"><i class="fas fa-eye"></i></a></td>


                 </tr>
             <?php endforeach; ?>


         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->