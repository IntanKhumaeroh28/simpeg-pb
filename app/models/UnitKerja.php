<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_kerja".
 *
 * @property string $kode_unit
 * @property string $nama_unit
 *
 * @property BiodataPegawai[] $biodataPegawais
 */
class UnitKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_kerja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_unit', 'nama_unit'], 'required'],
            [['kode_unit'], 'string', 'max' => 50],
            [['nama_unit'], 'string', 'max' => 30],
            [['kode_unit'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_unit' => 'Kode Unit',
            'nama_unit' => 'Nama Unit',
        ];
    }

    /**
     * Gets query for [[BiodataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodataPegawais()
    {
        return $this->hasMany(BiodataPegawai::class, ['kode_unit' => 'kode_unit']);
    }
}
