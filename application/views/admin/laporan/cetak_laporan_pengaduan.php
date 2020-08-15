<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan <?= date('Y-m-d') ?></title>
    <style>
        .logo {
            height: 80px;
            width: 80px;
            margin-bottom: -15px;

        }

        .header {
            display: flex;
        }

        h1 {
            font-family: "Times New Roman", Times, serif;
        }

        .text-kecil {
            font-size: 11px;
        }

        .hasil {
            text-align: center;
        }

        .saran {
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div>
        <h2><span>Laporan Pegaduan</span></h2>
    </div>
    <hr>
    <table style="margin-bottom: 20px;">
        <tr>
            <th>Judul Pengaduan :</th>
            <td><?= $pengaduan['judul_pengaduan'] ?></td>

        </tr>
        <tr>
            <th align="left">Tanggal Cetak :</th>
            <td><?= date('Y-m-d') ?></td>
        </tr>
        <tr>
            <th>Total Responden :</th>
            <td><?= $responden ?></td>
        </tr>
    </table>

    <table class="pengaduan" border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th style="width: 70%;" rowspan="2">Pertanyaan</th>
                <th colspan="5">Hasil</th>
            </tr>
            <tr>
                <th class="text-kecil">Sangat Baik</th>
                <th class="text-kecil">Baik</th>
                <th class="text-kecil">Cukup</th>
                <th class="text-kecil">Kurang</th>
                <th class="text-kecil">Sangat Kurang</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pertanyaan as $index => $tanya) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $tanya['isi'] ?></td>
                    <td class="hasil"><?= $hasil[$index]['sb'] ?></td>
                    <td class="hasil"><?= $hasil[$index]['b'] ?></td>
                    <td class="hasil"><?= $hasil[$index]['c'] ?></td>
                    <td class="hasil"><?= $hasil[$index]['k'] ?></td>
                    <td class="hasil"><?= $hasil[$index]['sk'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="2" style="text-align: center;">Total</th>

                <th class="hasil"><?= $total['total_sb'] ?></th>
                <th class="hasil"><?= $total['total_b'] ?></th>
                <th class="hasil"><?= $total['total_c'] ?></th>
                <th class="hasil"><?= $total['total_k'] ?></th>
                <th class="hasil"><?= $total['total_sk'] ?></th>

            </tr>
        </tbody>
    </table>


</body>

</html>