<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_keluarga".
 *
 * @property int $id_riwayat_keluarga
 * @property string $nama
 * @property string $hub_keluarga
 * @property string $nik
 * @property string $tgl_lahir
 * @property string $id_pegawai
 * @property int $id_hubungan_keluarga
 *
 * @property MasterHubunganKeluarga $masterHubunganKeluarga
 * @property BiodataPegawai $pegawai
 */
class RiwayatKeluarga extends \yii\db\ActiveRecord
{
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
            [['nama', 'hub_keluarga', 'nik', 'tgl_lahir', 'id_pegawai', 'id_hubungan_keluarga'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['id_hubungan_keluarga'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            //[['hub_keluarga', 'nik'], 'string', 'max' => 25],
            //[['id_pegawai'], 'string', 'max' => 50],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => BiodataPegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
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
            'tgl_lahir' => 'Tgl Lahir',
            // 'id_pegawai' => 'Id Pegawai',
            'id_hubungan_keluarga' => 'Id Hubungan Keluarga',
        ];
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
