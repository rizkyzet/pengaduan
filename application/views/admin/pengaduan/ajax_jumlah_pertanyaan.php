<?php for ($i = 1; $i <= $jumlah; $i++) { ?>
    <div class="row justify-content-center">

        <div class="col-6 shadow ">
            <div class="form-group mt-3">
                <label for="">Pertanyaan <?= $i ?></label>
                <input type="text" name="<?= $i ?>" id="<?= $i ?>" class="form-control <?= $i ?>" required>
            </div>


        </div>



    </div>
<?php } ?>