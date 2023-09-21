<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "biodata_pegawai".
 *
 * @property string $id_pegawai
 * @property string $nik
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $tempat_lahir
 * @property string $alamat
 * @property string|null $no_telp
 * @property string $email
 * @property string|null $foto
 * @property int $jumlah_pasangan
 * @property int $jumlah_anak
 * @property int $tahun_masuk
 * @property string $kode_jenis_kelamin
 * @property string $kode_jenis_pegawai
 * @property string $kode_unit
 * @property int $id_agama
 * @property int $id_status_perkawinan
 * @property string|null $username
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property MasterAgama $agama
 * @property MasterJenisKelamin $kodeJenisKelamin
 * @property JenisPegawai $kodeJenisPegawai
 * @property UnitKerja $kodeUnit
 * @property RiwayatKeluarga[] $riwayatKeluargas
 * @property RiwayatPendidikan[] $riwayatPendidikans
 * @property MasterStatusPerkawinan $statusPerkawinan
 */
class BiodataPegawai extends \yii\db\ActiveRecord
{
    // tambahkan variabel baru untuk menyimpan file foto
    public $image_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'nik', 'nama', 'tgl_lahir', 'tempat_lahir', 'alamat', 'email', 'tahun_masuk', 'kode_jenis_kelamin', 'kode_jenis_pegawai', 'kode_unit', 'id_agama', 'id_status_perkawinan'], 'required'],
            [['tgl_lahir', 'created_at', 'updated_at'], 'safe'],
            [['jumlah_pasangan', 'jumlah_anak', 'tahun_masuk', 'id_agama', 'id_status_perkawinan'], 'integer'],
            [['id_pegawai', 'tempat_lahir', 'email', 'kode_jenis_kelamin', 'kode_jenis_pegawai', 'kode_unit'], 'string', 'max' => 50],
            [['nik'], 'string', 'max' => 25],
            [['nama', 'foto', 'username', 'created_by', 'updated_by'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 255],
            [['no_telp'], 'string', 'max' => 20],
            [['id_pegawai'], 'unique'],
            [['kode_jenis_kelamin'], 'exist', 'skipOnError' => true, 'targetClass' => MasterJenisKelamin::class, 'targetAttribute' => ['kode_jenis_kelamin' => 'kode_jenis_kelamin']],
            [['kode_jenis_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => JenisPegawai::class, 'targetAttribute' => ['kode_jenis_pegawai' => 'kode_jenis_pegawai']],
            [['kode_unit'], 'exist', 'skipOnError' => true, 'targetClass' => UnitKerja::class, 'targetAttribute' => ['kode_unit' => 'kode_unit']],
            [['id_agama'], 'exist', 'skipOnError' => true, 'targetClass' => MasterAgama::class, 'targetAttribute' => ['id_agama' => 'id_agama']],
            [['id_status_perkawinan'], 'exist', 'skipOnError' => true, 'targetClass' => MasterStatusPerkawinan::class, 'targetAttribute' => ['id_status_perkawinan' => 'id_status_perkawinan']],
            [
                ['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 1.2
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
            'id_pegawai' => 'Id Pegawai',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tgl_lahir' => 'Tgl Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'email' => 'Email',
            'foto' => 'Foto',
            'jumlah_pasangan' => 'Jumlah Pasangan',
            'jumlah_anak' => 'Jumlah Anak',
            'tahun_masuk' => 'Tahun Masuk',
            'kode_jenis_kelamin' => 'Jenis Kelamin',
            'kode_jenis_pegawai' => 'Jenis Pegawai',
            'kode_unit' => 'Unit Kerja',
            'id_agama' => 'Agama',
            'id_status_perkawinan' => 'Status Perkawinan',
            'username' => 'Username',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        $parent = parent::beforeSave($insert);

        // ambil data uploadnya
        $file = UploadedFile::getInstance($this, 'image_file');

        // cek apakah upload upload file apa ngga
        if (!empty($file)) {
            // bikin url untuk menyimpan gambar
            $uploadPath = Yii::getAlias('@webroot/files/img/');

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
                $this->foto = $newName;
            }
            // echo '<pre>';
            // print_r($this->attributes);
            // echo '</pre>';
            // die;
        }

        // untuk mengubah format tanggal
        $this->tgl_lahir = date('Y-m-d', strtotime($this->tgl_lahir));

        return $parent;
    }

    /**
     * Gets query for [[Agama]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgama()
    {
        return $this->hasOne(MasterAgama::class, ['id_agama' => 'id_agama']);
    }

    /**
     * Gets query for [[KodeJenisKelamin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJenisKelamin()
    {
        return $this->hasOne(MasterJenisKelamin::class, ['kode_jenis_kelamin' => 'kode_jenis_kelamin']);
    }

    /**
     * Gets query for [[KodeJenisPegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJenisPegawai()
    {
        return $this->hasOne(JenisPegawai::class, ['kode_jenis_pegawai' => 'kode_jenis_pegawai']);
    }

    /**
     * Gets query for [[KodeUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeUnit()
    {
        return $this->hasOne(UnitKerja::class, ['kode_unit' => 'kode_unit']);
    }

    /**
     * Gets query for [[RiwayatKeluargas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatKeluargas()
    {
        return $this->hasMany(RiwayatKeluarga::class, ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * Gets query for [[RiwayatPendidikans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPendidikans()
    {
        return $this->hasMany(RiwayatPendidikan::class, ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * Gets query for [[StatusPerkawinan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPerkawinan()
    {
        return $this->hasOne(MasterStatusPerkawinan::class, ['id_status_perkawinan' => 'id_status_perkawinan']);
    }
}
