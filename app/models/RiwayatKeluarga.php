<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "riwayat_keluarga".
 *
 * @property int $id_riwayat_keluarga
 * @property string $nama
 * @property string $hub_keluarga
 * @property string $nik
 * @property string $file_kk
 * @property string $file_akte
 * @property string $tgl_lahir
 * @property string $id_pegawai
 * @property int $id_hubungan_keluarga
 *
 * @property MasterHubunganKeluarga $masterHubunganKeluarga
 * @property BiodataPegawai $pegawai
 */
class RiwayatKeluarga extends \yii\db\ActiveRecord
{
    public $dokumen_file_kk;
    public $dokumen_file_akte;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nik', 'tgl_lahir', 'id_pegawai', 'id_hubungan_keluarga'], 'required'],
            [['tgl_lahir', 'file_kk', 'file_akte', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'safe'],
            [['id_hubungan_keluarga'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            // [['hub_keluarga', 'nik'], 'string', 'max' => 25],
            // [['id_pegawai'], 'string', 'max' => 50],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => BiodataPegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [
                ['dokumen_file_kk', 'dokumen_file_akte'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 1024 * 1024 * 1.2
                // 1,2 mb
                , 'message' => 'Ukuran berkas maksimum adalah 1.2 MB.'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat_keluarga' => 'Id Riwayat Keluarga',
            'nama' => 'Nama',
            // 'hub_keluarga' => 'Hub Keluarga',
            'nik' => 'Nik',
            'file_kk' => 'File KK',
            'file_akte' => 'File Akte',
            'tgl_lahir' => 'Tgl Lahir',
            // 'id_pegawai' => 'Id Pegawai',
            'id_hubungan_keluarga' => 'Id Hubungan Keluarga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        $parent = parent::beforeSave($insert);

        // upload file kk
        // ambil data uploadnya
        $file = UploadedFile::getInstance($this, 'dokumen_file_kk');

        // cek apakah upload file ada apa ngga
        if (!empty($file)) {
            // bikin url untuk menyimpan gambar
            $uploadPath = Yii::getAlias('@webroot/files/dokumen/');

            // bikin nama acak
            $newName = uniqid() . '_' . $file->baseName . '.' . $file->extension;

            // bikin url lengkap di tambah dengan nama filenya
            $filePath = $uploadPath . $newName;

            // var_dump(is_dir($uploadPath));
            // echo '<pre>';
            // var_dump($file);
            // die;

            // kemudian simpan gambarnya di folder yang udah ditentuin
            if ($file->saveAs($filePath)) {
                // simpan informasi berkas ke dalam model jika diperlukan
                $this->file_kk = $newName;
            }
            // echo '<pre>';
            // print_r($this->attributes);
            // echo '</pre>';
            // die;
        }

        // upload file akte
        // ambil data uploadnya
        $file = UploadedFile::getInstance($this, 'dokumen_file_akte');

        // cek apakah upload upload file apa ngga
        if (!empty($file)) {
            // bikin url untuk menyimpan gambar
            $uploadPath = Yii::getAlias('@webroot/files/dokumen/');

            // bikin nama acak
            $newName = uniqid() . '_' . $file->baseName . '.' . $file->extension;

            // bikin url lengkap di tambah dengan nama filenya
            $filePath = $uploadPath . $newName;

            // var_dump(is_dir($uploadPath));
            // echo '<pre>';
            // var_dump($file);
            // die;

            // kemudian simpan gambarnya di folder yang udah ditentuin
            if ($file->saveAs($filePath)) {
                // simpan informasi berkas ke dalam model jika diperlukan
                $this->file_akte = $newName;
            }
            // echo '<pre>';
            // print_r($this->attributes);
            // echo '</pre>';
            // die;
        }

        // untuk mengubah format tanggal
        $this->tgl_lahir = date('Y-m-d', strtotime($this->tgl_lahir));

        // simpan tatus created by atau updated by
        if ($insert) {
            $this->created_by = Yii::$app->user->identity->username;
        } else {
            $this->updated_by = Yii::$app->user->identity->username;
        }

        if (User::hasRole('pegawai')) {
            $this->id_pegawai = Yii::$app->user->identity->username;
        }

        return $parent;
    }

    /**
     * Gets query for [[MasterHubunganKeluarga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterHubunganKeluarga()
    {
        return $this->hasOne(MasterHubunganKeluarga::class, ['id_hubungan_keluarga' => 'id_hubungan_keluarga']);
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(BiodataPegawai::class, ['id_pegawai' => 'id_pegawai']);
    }
}
