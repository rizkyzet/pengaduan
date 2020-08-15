<div class="text-white bg-info text-center">
    <h5 class="py-2 px-2">
        <strong>
            <?= $pertanyaan['isi'] ?>
        </strong>
    </h5>
</div>
<div class="chart-container" style="width: 510px;height: 300px">
    <canvas id="myChart" class="mt-3"></canvas>

</div>
<div style="overflow: auto;">
    <h5>Hasil Pengaduan</h5>
    <table class=" table table-sm  mt-2 ">
        <thead>
            <tr class="bg-info text-white">

                <th>Sangat Baik</th>
                <th>Baik</th>
                <th>Cukup</th>
                <th>Kurang</th>
                <th>Sangat Kurang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $sb ?></td>
                <td><?= $b ?></td>
                <td><?= $c ?></td>
                <td><?= $k ?></td>
                <td><?= $sk ?></td>
            </tr>
        </tbody>
    </table>
    <h5>Nama Responden</h5>
    <table class="table table-sm mt-1">
        <tr class="bg-info text-white">
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
        </tr>
        <?php $no = 1;
        foreach ($nama_responden as $responden) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $responden['npm'] ?></td>
                <td><?= $responden['nama'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang'],
            datasets: [{
                label: '10 of Votes',
                data: ['<?= $psb ?>', '<?= $pb ?>', '<?= $pc ?>', '<?= $pk ?>', '<?= $psk ?>'],
                backgroundColor: [
                    'rgb(63, 191, 127)',
                    'rgb(63, 63, 191)',
                    'rgb(51, 204, 255)',
                    'rgb(255, 204, 0)',
                    'rgb(191, 63, 63)'
                ],
                borderColor: [
                    'rgb(255,255,255)',
                    'rgb(255,255,255)',
                    'rgb(255,255,255)',
                    'rgb(255,255,255)',
                    'rgb(255,255,255)'
                ],
                borderWidth: 2
            }]
        },

        // Configuration options go here
        options: {
            responsive: true,

            layout: {
                padding: {
                    left: 0,
                    right: 20,
                    top: 10,
                    bottom: 0
                }
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                    }
                }
            },
            legend: {
                position: 'bottom'
            },
            plugins: {
                datalabels: {
                    color: '#fff',
                    anchor: 'end',
                    align: 'start',
                    offset: -10,
                    borderWidth: 2,
                    borderColor: '#fff',
                    borderRadius: 25,
                    backgroundColor: (context) => {
                        return context.dataset.backgroundColor;
                    },
                    font: {
                        weight: 'bold',
                        size: '10'
                    },
                    formatter: (value) => {
                        return value + ' %';
                    }
                }
            }
        }
    })
</script>