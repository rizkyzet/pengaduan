<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-4 mt-5">

            <div class="card o-hidden border-5 border-info shadow-lg my-5">
                <div class="card-body p-0">
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