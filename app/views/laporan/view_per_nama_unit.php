<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Rekap per nama unit dan pegawai', 'url' => ['rekap_per_nama_unit_pegawai']];
$this->params['breadcrumbs'][] = ['label' => 'View per nama unit dan pegawai'];
?>
<h2><?= $judul ?></h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Unit Kerja</th>
            <th scope="col">Pegawai</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $value) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['nama_unit'] ?></td>

            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>