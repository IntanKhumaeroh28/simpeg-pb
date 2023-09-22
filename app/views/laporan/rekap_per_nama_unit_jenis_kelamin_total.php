<?php
$this->params['breadcrumbs'][] = ['label' => 'Rekap per nama unit, kode jenis kelamin dan total'];

$this->title = 'Rekap Per nama unit, jenis kelamin dan total';

use yii\helpers\Html;
?>
<h2><?= $judul ?></h2>



<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Unit</th>
            <th scope="col">Kode Jenis Kelamin</th>
            <th scope="col">Total</th>
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
                <td><?= $value['kode_jenis_kelamin'] ?></td>
                <td><?= $value['total'] ?></td>
                <td>
                    <?php
                    if ($value['total'] > 0) {
                        echo Html::a('View', ['laporan/view_per_total', 'kode_unit' => $value['kode_unit'], 'kode_jenis_kelamin' => $value['kode_jenis_kelamin']], ['class' => 'btn btn-info btn-sm']);
                    }
                    ?>

                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>