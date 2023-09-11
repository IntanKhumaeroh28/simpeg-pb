<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_jenis_kelamin".
 *
 * @property string $kode_jenis_kelamin
 * @property string $jenis_kelamin
 *
 * @property BiodataPegawai[] $biodataPegawais
 */
class MasterJenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_jenis_kelamin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_jenis_kelamin', 'jenis_kelamin'], 'required'],
            [['kode_jenis_kelamin'], 'string', 'max' => 1],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['kode_jenis_kelamin'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_jenis_kelamin' => 'Kode Jenis Kelamin',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * Gets query for [[BiodataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodataPegawais()
    {
        return $this->hasMany(BiodataPegawai::class, ['kode_jenis_kelamin' => 'kode_jenis_kelamin']);
    }
}
