<?php

use yii\helpers\Html;


$this->title = 'Rekap Per kode jenis kelamin dan pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Rekap per kode jenis kelamin dan pegawai'];

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
        $total = 0;
        $no = 1;
        foreach ($data as $value) :
            $total += $value['pegawai'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['kode_jenis_kelamin'] ?></td>
                <td><?= $value['pegawai'] ?></td>
                <td>
                    <?php
                    if ($value['pegawai'] > 0) {
                        echo Html::a('View', ['laporan/view', 'kode_jenis_kelamin' => $value['kode_jenis_kelamin']], ['class' => 'btn btn-info btn-sm']);
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
            <td><?= $total ?></td>
        </tr>
    </tbody>
</table>