 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <form action="<?= base_url('admin/pengaduan/tambah_pengaduan') ?> " method='post'>

         <div class="row justify-content-center">
             <div class="col-6 bg-info text-white text-center">PENGADUAN</div>
         </div>
         <div class="row justify-content-center">
             <input type="hidden" name="kode" value=<?= $kode  ?>>
             <div class="col-6 shadow ">
                 <?php if (validation_errors('judul')) : ?>
                     <div class="alert alert-danger mt-3" role="alert">
                         Judul Belum diisi
                     </div>
                 <?php endif; ?>
                 <div class="form-group mt-3">
                     <label for="">Judul Pengaduan</label>
                     <input type="text" name="judul" id="" class="form-control">
                 </div>

             </div>
         </div>


         <hr>
         <div class="row justify-content-center">
             <div class="col-6 bg-info text-white text-center">Pertanyaan</div>
         </div>
         <!-- pertanyaan -->
         <input type="hidden" name="jumlah_pertanyaan" value="<?= form_error('pertanyaan[]') == false ? 1 : set_value('jumlah_pertanyaan'); ?>">

         <?php if (form_error('pertanyaan[]') == false) { ?>
             <div class="pertanyaan">
                 <div class="row justify-content-center" id="row_1">
                     <div class="col-6 shadow  ">
                         <div class="form-group d-flex flex-row mt-3">
                             <input type="text" id="1" name="pertanyaan[]" class="form-control" placeholder="Isi Pertanyaan">
                             <button data-toggle="tooltip" title="Hapus" data-placement="bottom" id="1" type="button" class="btn btn-sm btn-danger btn_hapus" disabled>
                                 <i class="fas fa-times"></i>
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
         <?php } elseif (form_error('pertanyaan[]') == true) { ?>
             <div class="row justify-content-center">
                 <div class="col-6">
                     <?php if (validation_errors('pertanyaan[]')) : ?>
                         <div class="alert alert-danger mt-3" role="alert">
                             Pertanyaan Harus diisi!
                         </div>
                     <?php endif; ?>
                 </div>
             </div>

             <div class="pertanyaan">
                 <?php $array_name = 0;
                    for ($i = 1; $i <= $jumlah_pertanyaan; $i++) { ?>
                     <div class="row justify-content-center" id="row_<?= $i ?>">
                         <div class="col-6 shadow  ">

                             <div class="form-group d-flex flex-row mt-3">
                                 <input type="text" id="<?= $i ?>" name="pertanyaan[]" class="form-control" placeholder="Isi Pertanyaan" value="<?= set_value('pertanyaan[' . $array_name++ . ']') ?>">
                                 <button data-toggle="tooltip" title="Hapus" data-placement="bottom" id="<?= $i ?>" type="button" class="btn btn-sm btn-danger btn_hapus">
                                     <i class="fas fa-times"></i>
                                 </button>
                             </div>

                         </div>
                     </div>

                 <?php } ?>
             </div>
         <?php } ?>
         <!-- button tambah -->
         <div class="row justify-content-center">
             <div class="col-6 shadow mb-3 text-center">
                 <button data-toggle="tooltip" title="Tambah" data-placement="bottom" type="button" id="btn_tambah" class="btn btn-sm btn-info btn-circle btn_tambah ">
                     <i class="fas fa-plus"></i>
                 </button>
             </div>
         </div>
         <!-- button hapus -->
         <div class="row justify-content-center">
             <div class="col-6 bg-info text-center">
                 <button style="width: 100px " class="btn btn-sm btn-outline-light my-2 " type="submit">Buat</button>
             </div>
         </div>


     </form>



 </div>
 <!-- /.container-fluid -->