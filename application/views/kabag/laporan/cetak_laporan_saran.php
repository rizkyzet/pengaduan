<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Saran <?= date('Y-m-d') ?></title>
    <style>
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
    <table>
        <tr>
            <th>Judul :</th>
            <td><?= $pengaduan['judul_pengaduan'] ?></td>

        </tr>

    </table>


    <table class="saran" border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Saran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($saran as $index => $srn) : ?>
                <?php if (!empty($srn['saran'])) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $srn['saran'] ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>