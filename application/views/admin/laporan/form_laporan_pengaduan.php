 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Laporan Pengaduan</h1>
     <?= $this->session->flashdata('pesan') ?>





     <table class="table table-sm table-hover table-bordered table-striped ">
         <thead>
             <tr class="bg-info text-white">
                 <th class="text-center" scope="col" style="width:50px;">No</th>
                 <th scope="col" class="text-center">Pengaduan</th>
                 <th style="width:60px;" scope="col" class="text-center">Aksi</th>


             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pengaduan as $index => $png) : ?>
                 <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td><?= $png['judul_pengaduan'] ?></td>



                     <td>
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Cetak Laporan" data-placement="bottom" href="<?= base_url('admin/laporan/cetak_lap_pengaduan/' . $png['kd_pengaduan']) ?>" class="btn btn-info"><i class="fas fa-print"></i></a>

                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; ?>


         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->