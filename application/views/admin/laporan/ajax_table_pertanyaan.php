<thead>
    <tr class="bg-info text-white">
        <th>No</th>
        <th>Pertanyaan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach ($pertanyaan as $tanya) : ?>
        <tr>
            <td style="width:50px;"><?= $no++ ?></td>
            <td><?= $tanya['isi'] ?></td>
            <td style="width:50px;">
                <button id="grafik" data-kd_pertanyaan="<?= $tanya['kd_pertanyaan'] ?>" class="btn btn-info grafik" data-kd_pengaduan="<?= $kd_pengaduan ?>">
                    <i class="fas fa-chart-pie"></i>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>