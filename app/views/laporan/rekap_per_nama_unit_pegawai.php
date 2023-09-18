<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Rekap per nama unit dan pegawai', 'url' => ['rekap_per_nama_unit_pegawai']];

?>
<h2><?= $judul ?></h2>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Unit</th>
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
                <td><?= $value['nama_unit'] ?></td>
                <td><?= $value['pegawai'] ?></td>
                <td>
                    <?= Html::a('View', ['laporan/viewnamaunit', 'kode_unit' => $value['kode_unit']], ['class' => 'btn btn-info btn-sm']) ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>