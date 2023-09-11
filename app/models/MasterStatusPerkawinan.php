<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_status_perkawinan".
 *
 * @property int $id_status_perkawinan
 * @property string $status_perkawinan
 *
 * @property BiodataPegawai[] $biodataPegawais
 */
class MasterStatusPerkawinan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_status_perkawinan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_perkawinan'], 'required'],
            [['status_perkawinan'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_status_perkawinan' => 'Id Status Perkawinan',
            'status_perkawinan' => 'Status Perkawinan',
        ];
    }

    /**
     * Gets query for [[BiodataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodataPegawais()
    {
        return $this->hasMany(BiodataPegawai::class, ['id_status_perkawinan' => 'id_status_perkawinan']);
    }
}
