<?php

namespace app\models;

use Yii;

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
