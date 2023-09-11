<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan".
 *
 * @property int $id_riwayat_pendidikan
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
            [['tahun_tamat', 'dokumen', 'id_pegawai', 'id_pendidikan_formal'], 'required'],
            [['tahun_tamat', 'id_pendidikan_formal'], 'integer'],
            [['dokumen'], 'string', 'max' => 100],
            [['id_pegawai'], 'string', 'max' => 50],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => BiodataPegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_pendidikan_formal'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPendidikanFormal::class, 'targetAttribute' => ['id_pendidikan_formal' => 'id_pendidikan_formal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat_pendidikan' => 'Id Riwayat Pendidikan',
            'tahun_tamat' => 'Tahun Tamat',
            'dokumen' => 'Dokumen',
            'id_pegawai' => 'Id Pegawai',
            'id_pendidikan_formal' => 'Id Pendidikan Formal',
        ];
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
