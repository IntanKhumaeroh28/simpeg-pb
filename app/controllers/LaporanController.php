<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class LaporanController extends Controller
{
    function actionRekap_per_jenis_kelamin_pegawai()
    {
        $tittle = "Rekap Jenis Kelamin dan Pegawai";

        $sql    =   "SELECT master_jenis_kelamin.kode_jenis_kelamin, COUNT(biodata_pegawai.id_pegawai) AS pegawai
                     FROM biodata_pegawai
                     RIGHT JOIN master_jenis_kelamin ON master_jenis_kelamin.kode_jenis_kelamin = biodata_pegawai.kode_jenis_kelamin
                     GROUP BY kode_jenis_kelamin";

        // $sql = "SELECT jenis_kelamin, COUNT(biodata_pegawai.id_pegawai) AS pegawai
        //         FROM biodata_pegawai
        //         RIGHT JOIN master_jenis_kelamin ON master_jenis_kelamin.kode_jenis_kelamin = biodata_pegawai.kode_jenis_kelamin
        //         GROUP BY jenis_kelamin";

        $data_jeniskelamin_pegawai = Yii::$app->db->createCommand($sql)->queryAll();


        return $this->render('rekap_per_jenis_kelamin_pegawai', [
            'judul' => $tittle,
            'data' => $data_jeniskelamin_pegawai
        ]);
    }


    function actionRekap_per_nama_unit_pegawai()
    {
        $tittle = "Rekap Nama Unit dan Jumlah Pegawai";

        $sql = "SELECT unit_kerja.kode_unit, unit_kerja.nama_unit, COUNT(biodata_pegawai.id_pegawai) AS pegawai
                FROM biodata_pegawai
                RIGHT JOIN unit_kerja ON unit_kerja.kode_unit = biodata_pegawai.kode_unit
                GROUP BY unit_kerja.nama_unit";

        $data_namaunit_pegawai = Yii::$app->db->createCommand($sql)->queryAll();


        return $this->render('rekap_per_nama_unit_pegawai', [
            'judul' => $tittle,
            'data' => $data_namaunit_pegawai
        ]);
    }

    function actionRekap_per_nama_unit_jenis_kelamin_total()
    {
        $tittle = "Rekap Nama Unit, Jenis Kelamin dan Total";

        $sql = "SELECT unit_kerja.kode_unit, unit_kerja.nama_unit, master_jenis_kelamin.kode_jenis_kelamin, COUNT(biodata_pegawai.id_pegawai) AS total
                FROM biodata_pegawai
                RIGHT JOIN master_jenis_kelamin ON master_jenis_kelamin.kode_jenis_kelamin= biodata_pegawai.kode_jenis_kelamin
                RIGHT JOIN unit_kerja ON unit_kerja.kode_unit= biodata_pegawai.kode_unit
                GROUP BY master_jenis_kelamin.kode_jenis_kelamin, unit_kerja.nama_unit 
                ORDER BY unit_kerja.nama_unit ASC";

        $data_namaunit_jk_total = Yii::$app->db->createCommand($sql)->queryAll();


        return $this->render('rekap_per_nama_unit_jenis_kelamin_total', [
            'judul' => $tittle,
            'data' => $data_namaunit_jk_total
        ]);
    }

    function actionView($kode_jenis_kelamin)
    {
        $title = "View pegawai per jenis kelamin";

        $kode_jenis_kelamin = $_GET['kode_jenis_kelamin'];

        // query yg dipakai ini
        $sql = "SELECT * FROM biodata_pegawai WHERE kode_jenis_kelamin='$kode_jenis_kelamin'";
        $data_pegawai = Yii::$app->db->createCommand($sql)->queryAll();
        // akhir query


        return $this->render('view', [
            'data' => $data_pegawai,
            'judul' => $title,
        ]);
    }

    function actionViewnamaunit($kode_unit)
    {
        $judul = "View pegawai per unit kerja";

        $kode_unit = $_GET['kode_unit'];

        $sql = "SELECT nama, nama_unit
        FROM biodata_pegawai
        RIGHT JOIN  unit_kerja ON unit_kerja.kode_unit = biodata_pegawai.kode_unit
        WHERE unit_kerja.kode_unit = '$kode_unit'";
        $data_namaunit_pegawai = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('view_per_nama_unit', [
            'data' => $data_namaunit_pegawai,
            'judul' => $judul
        ]);
    }

    function actionView_per_total()
    {
        $title = "View per nama unit, jenis kelamin dan total ";

        $kode_unit = $_GET['kode_unit'];
        $kode_jenis_kelamin = $_GET['kode_jenis_kelamin'];

        // $sql = "SELECT biodata_pegawai.nama, unit_kerja.nama_unit, master_jenis_kelamin.kode_jenis_kelamin, COUNT(biodata_pegawai.id_pegawai) AS total
        //         FROM biodata_pegawai
        //         RIGHT JOIN master_jenis_kelamin ON master_jenis_kelamin.kode_jenis_kelamin= biodata_pegawai.kode_jenis_kelamin
        //         RIGHT JOIN unit_kerja ON unit_kerja.kode_unit= biodata_pegawai.kode_unit
        //         WHERE biodata_pegawai.kode_unit = '$kode_unit' AND biodata_pegawai.kode_jenis_kelamin = '$kode_jenis_kelamin'";
        $sql = "SELECT * 
                FROM biodata_pegawai
                LEFT JOIN unit_kerja ON biodata_pegawai.kode_unit = unit_kerja.kode_unit
                WHERE biodata_pegawai.kode_unit = '$kode_unit' AND biodata_pegawai.kode_jenis_kelamin = '$kode_jenis_kelamin'";

        // $sql = "SELECT biodata_pegawai.nama, unit_kerja.nama_unit, master_jenis_kelamin.kode_jenis_kelamin, COUNT(biodata_pegawai.id_pegawai) AS total
        //         FROM biodata_pegawai
        //         RIGHT JOIN unit_kerja ON unit_kerja.kode_unit = biodata_pegawai.kode_unit
        //         RIGHT JOIN master_jenis_kelamin ON master_jenis_kelamin.kode_jenis_kelamin = biodata_pegawai.kode_jenis_kelamin";

        $data_namaunit_jk_total = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('view_per_total', [
            'data' => $data_namaunit_jk_total,
            'judul' => $title
        ]);
    }
}
