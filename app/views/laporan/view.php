<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Rekap per kode jenis kelamin dan pegawai', 'url' => ['rekap-per-jenis-kelamin-pegawai']];
$this->params['breadcrumbs'][] = ['label' => 'View
'];

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
                <td><?= $value['nama'] ?></td>

            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>