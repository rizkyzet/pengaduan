 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->

     <?= $this->session->flashdata('pesan') ?>

     <div class="row justify-content-center">
         <!-- Area Chart -->
         <div class="col-xl-8 col-lg-7">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 text-center  ">
                     <h6 class="m-0 font-weight-bold text-info"><?= ucwords($pengaduan['judul_pengaduan']) ?></h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <form action="<?= base_url('mahasiswa/pengaduan/isi/' . $pengaduan['kd_pengaduan']) ?>" method="post">

                         <table class="table table-sm table-hover table-bordered table-striped mt-2 ">
                             <thead>
                                 <tr class="bg-info text-white">
                                     <th style="width:50px; vertical-align:middle;">No</th>
                                     <th class="text-center" style="vertical-align: middle;">Pertanyaan</th>
                                     <th style="width:50px; vertical-align:middle;" class="text-center">Sangat Baik</th>
                                     <th style="width:100px;vertical-align: middle;" class="text-center">Baik</th>
                                     <th style="width:50px;vertical-align: middle;" class="text-center">Cukup</th>
                                     <th style="width:100px;vertical-align: middle;" class="text-center">Kurang</th>
                                     <th style="width:50px;vertical-align: middle;" class="text-center">Sangat Kurang</th>

                                 </tr>
                             </thead>
                             <tbody>
                                 <input type="hidden" value="<?= $kd_pengaduan ?>" name="kd_pengaduan">
                                 <?php $no = 1;
                                    $soal = 0;
                                    $validation = 0;
                                    $validation2 = 0;
                                    foreach ($pertanyaan as $tanya) : ?>
                                     <input type="hidden" name="kd_pertanyaan[]" value="<?= $tanya['kd_pertanyaan'] ?>">
                                     <tr>
                                         <td><?= $no++ ?></td>
                                         <td><?= $tanya['isi'] ?> <?= form_error('hasil[' . $validation . ']', '<div class="text-danger text-small">', '</div>') ?></td>
                                         <td class="text-center">
                                             <div class="form-check">
                                                 <input <?= set_value('hasil[' . $validation2 . ']') == 'sb' ? 'checked' : '' ?> type="radio" class="form-check-input" name="hasil[<?= $soal ?>]" value="sb">
                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <div class="form-check">
                                                 <input <?= set_value('hasil[' . $validation2 . ']') == 'b' ? 'checked' : '' ?> type="radio" class="form-check-input" name="hasil[<?= $soal ?>]" value="b">

                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <div class="form-check">
                                                 <input <?= set_value('hasil[' . $validation2 . ']') == 'c' ? 'checked' : '' ?> type="radio" class="form-check-input" name="hasil[<?= $soal ?>]" value="c">

                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <div class="form-check">
                                                 <input <?= set_value('hasil[' . $validation2 . ']') == 'k' ? 'checked' : '' ?> type="radio" class="form-check-input" name="hasil[<?= $soal ?>]" value="k">

                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <div class="form-check">
                                                 <input <?= set_value('hasil[' . $validation2 . ']') == 'sk' ? 'checked' : '' ?> type="radio" class="form-check-input" name="hasil[<?= $soal ?>]" value="sk">

                                             </div>
                                         </td>
                                     </tr>
                                     <?php $soal++;
                                        $validation++;
                                        $validation2++; ?>
                                 <?php endforeach; ?>


                             </tbody>
                         </table>
                         <span class="text-small ml-1 font-weight-bold " styl>Saran</span>
                         <textarea name="saran" cols="30" rows="5" class="form-control mb-3"><?= set_value('saran') ?></textarea>

                         <div class="text-center">

                             <button type="submit" class="btn btn-info ">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>





 </div>
 <!-- /.container-fluid -->