<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Saran <?= date('Y-m-d') ?></title>
    <style>
        .container {
            width: 100%;

        }



        .logo {
            height: 80px;
            width: 80px;
            margin-bottom: -15px;

        }

        .header {
            display: flex;
        }

        h2 {
            font-family: "Times New Roman", Times, serif;

        }

        .text-kecil {
            font-size: 11px;
        }

        .hasil {
            text-align: center;
        }

        .saran {
            margin-top: 10px;

        }
    </style>
</head>

<body>


    <h2>
        Laporan Saran
    </h2>

    <hr>

    <div class="container">
        <table>
            <tr>
                <th align="left">Judul Pengaduan :</th>
                <td><?= $pengaduan['judul_pengaduan'] ?></td>

            </tr>
            <tr>
                <th align="left">Tanggal Cetak :</th>
                <td><?= date('Y-m-d') ?></td>
            </tr>

        </table>


        <table class="saran" border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th style="width: 200%;">Saran</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($saran as $index => $srn) : ?>
                    <?php if (!empty($srn['saran'])) : ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td><?= $srn['saran'] ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>