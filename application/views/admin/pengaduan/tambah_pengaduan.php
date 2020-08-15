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
                 <div class="form-group mt-3">
                     <label for="">Judul Pengaduan</label>
                     <input type="text" name="judul" id="" class="form-control">
                 </div>
                 <?= form_error('judul', '<div class="text-small text-danger mb-2">', '</div>') ?>
             </div>
         </div>


         <hr>
         <div class="row justify-content-center">
             <div class="col-6 bg-info text-white text-center">Pertanyaan</div>
         </div>
         <!-- pertanyaan -->
         <div class="pertanyaan">
             <div class="row justify-content-center">
                 <div class="col-6 shadow  ">
                     <div class="form-group d-flex flex-row mt-3">
                         <input type="text" id="1" name="pertanyaan[]" id="btn_hapus" class="form-control" placeholder="Isi Pertanyaan" required>
                         <button data-toggle="tooltip" title="Hapus" data-placement="bottom" id="btn_hapus" type="button" class="btn btn-sm btn-danger btn_hapus" disabled>
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
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