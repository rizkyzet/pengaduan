<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- CSS -->
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/sbadmin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link href="<?= base_url('vendor/sbadmin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <div class="bg"></div>
    <div class="bg2"></div>

    <div class="container ">

        <div class="row content ">
            <div class="col-md-5 col-info justify-content-center ">
                <img class="unbaja  mb-2" src="<?= base_url('assets/img/logo_unbaja.png') ?>" alt="">
                <h2>SISTEM INFORMASI PENGADUAN MAHASISWA ONLINE UNBAJA</h2>

            </div>
            <div class="col-md-5 col-login ">
                <div class="card o-hidden border-5 border-info shadow-lg  login">
                    <div class="card-body p-0 mt-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Masuk</h1>
                                    </div>
                                    <?= $this->session->flashdata("pesan"); ?>
                                    <form class="user" action="<?= base_url("auth") ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="npm" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan NPM / NIK">
                                            <?= form_error("npm", "<div class='text-danger text-small'>", "</div>") ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="kata_sandi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi">
                                            <?= form_error("kata_sandi", "<div class='text-danger text-small'>", "</div>") ?>
                                        </div>


                                        <button type="submit" class="btn btn-info btn-user btn-block">
                                            Masuk
                                        </button>


                                    </form>
                                    <hr>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/sbadmin/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('vendor/sbadmin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/sbadmin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('vendor/sbadmin/') ?>js/sb-admin-2.min.js"></script>
</body>

</html>