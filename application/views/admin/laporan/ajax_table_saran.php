<thead>
    <tr class="bg-info text-white">
        <th scope="col" class="text-center">No</th>
        <th scope="col" class="text-center">Saran</th>

    </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach ($saran as $srn) : ?>
        <?php if (!empty($srn['saran'])) : ?>
            <tr>
                <td style="width:50px;"><?= $no++ ?></td>
                <td><?= $srn['saran'] ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</tbody>