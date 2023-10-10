<?php

namespace app\models;

use Yii;

use yii\web\UploadedFile;




/**
 * This is the model class for table "riwayat_pendidikan".
 *
 * @property int $id_riwayat_pendidikan
 * @property string $asal_sekolah
 * @property string $prodi
 * @property string $gelar
 * @property int $tahun_tamat
 * @property string $dokumen
 * @property string $id_pegawai
 * @property int $id_pendidikan_formal
 *
 * @property BiodataPegawai $pegawai
 * @property MasterPendidikanFormal $pendidikanFormal
 */
class RiwayatPendidikan extends \yii\db\ActiveRecord
{
    public $ijazah_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_tamat', 'id_pegawai', 'id_pendidikan_formal'], 'required'],
            [['tahun_tamat', 'asal_sekolah', 'prodi', 'gelar', 'id_pendidikan_formal', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'safe'],
            [['dokumen'], 'string', 'max' => 100],
            [['id_pegawai'], 'string', 'max' => 50],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => BiodataPegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_pendidikan_formal'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPendidikanFormal::class, 'targetAttribute' => ['id_pendidikan_formal' => 'id_pendidikan_formal']],
            [
                ['ijazah_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 1024 * 1024 * 1.2
                /** 1,2 mb */
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
            'id_riwayat_pendidikan' => 'Id Riwayat Pendidikan',
            'asal_sekolah' => 'Asal Sekolah',
            'prodi' => 'Prodi',
            'gelar' => 'Gelar',
            'tahun_tamat' => 'Tahun Tamat',
            'dokumen' => 'Dokumen',
            'id_pegawai' => 'Nama',
            'id_pendidikan_formal' => 'Nama Pendidikan Formal',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        $parent = parent::beforeSave($insert);
        //ambil data upload
        $file = UploadedFile::getInstance($this, 'ijazah_file');

        // cek apakah upload file 
        if (!empty($file)) {
            // bikin url untuk menyimpan gambar
            $uploadPath = Yii::getAlias('@webroot/files/dokumen/');
            // bikin nama acak
            $newname = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            // bikin url lengkap ditambah nama filenya
            $filePath = $uploadPath . $newname;

            // kemudian simpan gambarnya di folder yang ditentukan
            if ($file->saveAs($filePath)) {
                // simpan informasi berkas didalam model jika diperlukan
                $this->dokumen = $newname;
            }
        }

        // simpan status created by atau updated by
        if ($insert) {
            $this->created_by = Yii::$app->user->identity->username;
        } else {
            $this->updated_by = Yii::$app->user->identity->username;
        }

        if (User::hasRole('pegawai', false)) {
            $this->id_pegawai = Yii::$app->user->identity->username;
        }

        return $parent;
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getbiodataPegawai()
    {
        return $this->hasOne(BiodataPegawai::class, ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * Gets query for [[PendidikanFormal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikanFormal()
    {
        return $this->hasOne(MasterPendidikanFormal::class, ['id_pendidikan_formal' => 'id_pendidikan_formal']);
    }
}
