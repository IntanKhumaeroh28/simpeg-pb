<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Rekap per kode jenis kelamin dan pegawai', 'url' => ['rekap_per_jenis_kelamin_pegawai']];

?>
<h2><?= $judul ?></h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Jenis Kelamin</th>
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
                <td><?= $value['kode_jenis_kelamin'] ?></td>
                <td><?= $value['pegawai'] ?></td>
                <td>
                    <?= Html::a('View', ['laporan/view', 'kode_jenis_kelamin' => $value['kode_jenis_kelamin']], ['class' => 'btn btn-info btn-sm']) ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>