 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Laporan Saran</h1>
     <?= $this->session->flashdata('pesan') ?>
     <div class="row mb-3 mt-3">
         <div class="col-5">
             <form class="form-inline" method="POST" action="<?= base_url('admin/laporan/cetak_lap_saran') ?>">
                 <div class="input-group mb-2 mr-sm-2">
                     <div class="input-group-prepend">
                         <div class="input-group-text">Judul</div>
                     </div>
                     <select name="kd_pengaduan" id="pengaduan_saran" class="form-control pengaduan">

                         <?php foreach ($pengaduan as $png) : ?>
                             <option value="<?= $png['kd_pengaduan'] ?>"><?= $png['judul_pengaduan'] ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <button type="submit" class="btn btn-info mb-2">Cetak</button>
             </form>
         </div>
     </div>

     <table id="saran" class="table_pertanyaan table table-sm table-hover table-bordered table-striped datatables">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" class="text-center">No</th>
                 <th scope="col" class="text-center">Saran</th>

             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($saran as $srn) : ?>
                 <?php if (!empty($srn['saran'])) : ?>
                     <tr>
                         <td style="width:50px;" class="text-center"><?= $no++ ?></td>
                         <td><?= $srn['saran'] ?></td>
                     </tr>
                 <?php endif; ?>
             <?php endforeach; ?>
         </tbody>
     </table>





 </div>
 <!-- /.container-fluid -->