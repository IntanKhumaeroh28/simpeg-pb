<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_pegawai".
 *
 * @property string $kode_jenis_pegawai
 * @property string $nama_jenis_pegawai
 *
 * @property BiodataPegawai[] $biodataPegawais
 */
class JenisPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_jenis_pegawai', 'nama_jenis_pegawai'], 'required'],
            [['kode_jenis_pegawai'], 'string', 'max' => 50],
            [['nama_jenis_pegawai'], 'string', 'max' => 30],
            [['kode_jenis_pegawai'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_jenis_pegawai' => 'Kode Jenis Pegawai',
            'nama_jenis_pegawai' => 'Nama Jenis Pegawai',
        ];
    }

    /**
     * Gets query for [[BiodataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodataPegawais()
    {
        return $this->hasMany(BiodataPegawai::class, ['kode_jenis_pegawai' => 'kode_jenis_pegawai']);
    }
}
