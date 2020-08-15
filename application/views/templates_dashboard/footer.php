</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Anda Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" Jika Anda Siap Mengakhiri Sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-info" href="<?= base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('vendor/sbadmin/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('vendor/sbadmin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datatables -->
<script src="<?= base_url() ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

<!-- chartjs -->
<script type="text/javascript" src="<?= base_url('assets/chartjs/') ?>Chart.js"></script>
<script type="text/javascript" src="<?= base_url('assets/chartjs/') ?>chartjs-plugin-datalabels.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/sbadmin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>



<!-- Custom scripts for all pages-->
<script src="<?= base_url('vendor/sbadmin/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/js/') ?>scripts.js"></script>





</body>

</html>