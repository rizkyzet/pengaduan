 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Grafik Pengaduan Online</h1>
     <?= $this->session->flashdata('pesan') ?>
     <div class="row">
         <div class="col-4">
             <div class="form-group">
                 <label for="Pengduan">Pengaduan</label>
                 <select name="pengaduan" id="pengaduan_kabag" class="form-control pengaduan">

                     <?php foreach ($pengaduan as $kue) : ?>
                         <option value="<?= $kue['kd_pengaduan'] ?>"><?= $kue['judul_pengaduan'] ?></option>
                     <?php endforeach; ?>
                 </select>
             </div>
         </div>
     </div>

     <table class="table_pertanyaan table table-sm table-hover table-bordered table-striped  ">
         <thead>
             <tr class="bg-info text-white">
                 <th scope="col" class="text-center">No</th>
                 <th scope="col" class="text-center">Pertanyaan</th>
                 <th scope="col" class="text-center">Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php $no = 1;
                foreach ($pertanyaan as $tanya) : ?>
                 <tr>
                     <td style="width:50px;" class="text-center"><?= $no++ ?></td>
                     <td><?= $tanya['isi'] ?></td>
                     <td style="width:50px;"><button id="grafik_kabag" data-kd_pertanyaan="<?= $tanya['kd_pertanyaan'] ?>" data-kd_pengaduan="<?= $kd_pengaduan ?>" class="btn btn-info grafik"><i class="fas fa-chart-pie"></i></button></td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>





 </div>
 <!-- /.container-fluid -->

 <!-- Modal -->

 <div class="modal fade" id="modalGrafik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog " role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul">
                     Grafik Laporan
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body" id="tampil_grafik">



             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>

             </div>
         </div>
     </div>
 </div>