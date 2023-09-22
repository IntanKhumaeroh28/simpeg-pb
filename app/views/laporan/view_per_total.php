<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Rekap per nama unit dan kode jenis kelamin dan total', 'url' => ['rekap_per_nama_unit_jenis_kelamin_total']];
$this->params['breadcrumbs'][] = ['label' => 'View'];
?>
<h2><?= $judul ?></h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Unit</th>
            <th scope="col">Kode Jenis Kelamin</th>
            <!-- <th scope="col">Total</th> -->
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;
        $no = 1;
        foreach ($data as $value) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['kode_jenis_kelamin'] ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>