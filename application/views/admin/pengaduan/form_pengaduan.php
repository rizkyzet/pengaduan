 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pengaduan</h1>
     <?= $this->session->flashdata('pesan') ?>
     <a href="<?= base_url('admin/pengaduan/tambah_pengaduan/') ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Tambah Pengaduan </a>




     <table class="table table-sm table-hover table-bordered table-striped mt-2 datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" style="width:50px;" class="text-center">No</th>
                 <th scope="col" class="text-center">Tanggal dibuat</th>
                 <th scope="col" class="text-center">Judul Pengaduan</th>
                 <th scope="col" class="text-center">Responden</th>
                 <th style="width:60px;" scope="col" class="text-center">Aksi</th>


             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pengaduan as $index => $png) : ?>
                 <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td><?= $png['tgl_dibuat'] ?></td>
                     <td><?= $png['judul_pengaduan'] ?></td>
                     <td class="text-center"><?= $sudah_isi[$index]; ?>/<strong> <?= $jumlah_mahasiswa ?> </strong> <a data-toggle="tooltip" title="Lihat" data-placement="bottom" style="border-radius:50px;" class="btn btn-sm btn-primary ml-2" href="<?= base_url('admin/pengaduan/cek_responden/' . $png['kd_pengaduan']) ?>"><i class="fas fa-eye"></i></a></td>



                     <td>
                         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                 <a data-toggle="tooltip" title="Data Pertanyaan" data-placement="bottom" href="<?= base_url('admin/pertanyaan/data/' . $png['kd_pengaduan']) ?>" class="btn btn-warning"><i class="fas fa-sticky-note"></i></a>
                                 <a data-toggle="tooltip" title="Ubah" data-placement="bottom" href="<?= base_url('admin/pengaduan/edit_pengaduan/' . $png['kd_pengaduan']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                 <a data-toggle="tooltip" title="Hapus" data-placement="bottom" href="<?= base_url('admin/pengaduan/hapus_pengaduan/' . $png['kd_pengaduan']) ?>" class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; ?>


         </tbody>
     </table>

 </div>
 <!-- /.container-fluid -->