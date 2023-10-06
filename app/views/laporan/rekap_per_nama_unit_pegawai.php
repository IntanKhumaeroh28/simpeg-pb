<?php

use yii\helpers\Html;

$this->title = 'Rekap Per nama unit dan pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Rekap per nama unit dan pegawai'];

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
        $total = 0;
        $no = 1;
        foreach ($data as $value) :
            $total += $value['pegawai'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_unit'] ?></td>
                <td><?= $value['pegawai'] ?></td>
                <td>
                    <?php
                    if ($value['pegawai'] > 0) {
                        echo Html::a('View', ['laporan/viewnamaunit', 'kode_unit' => $value['kode_unit']], ['class' => 'btn btn-info btn-sm']);
                    }
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        <tr>
            <td></td>
            <td><b>Total:</b></td>
            <td style="font-size: 70px"><?= $total ?></td>
        </tr>
    </tbody>
</table>