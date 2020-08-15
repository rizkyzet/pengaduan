 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pengaduan</h1>
     <?= $this->session->flashdata('pesan') ?>





     <table class="table table-sm table-hover table-bordered table-striped mt-2">
         <thead>
             <tr class="bg-info text-white">
                 <th class="text-center" scope="col" style=" width:50px;">No</th>
                 <th scope="col" class="text-center">Tanggal dibuat</th>
                 <th scope="col" class="text-center">Judul Pengduan</th>
                 <th style="width:60px;" scope="col" class="text-center">Aksi</th>


             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pengaduan as $index => $kue) : ?>
                 <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td><?= $kue['tgl_dibuat'] ?></td>
                     <td><?= $kue['judul_pengaduan'] ?></td>
                     <td>
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <?php if ($cek[$index]) { ?>

                                     <a style="border-radius:40px;" data-toggle="tooltip" title="Jawab" data-placement="bottom" href="<?= base_url('mahasiswa/pengaduan/isi/' . $kue['kd_pengaduan']) ?>" class=" <?= $cek[$index] ?> btn btn-success"><i class="fas fa-check"></i></a>
                                 <?php  } else { ?>
                                     <a style="border-radius:40px;" data-toggle="tooltip" title="Jawab" data-placement="bottom" href="<?= base_url('mahasiswa/pengaduan/isi/' . $kue['kd_pengaduan']) ?>" class=" <?= $cek[$index] ?> btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                 <?php } ?>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; ?>


         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->