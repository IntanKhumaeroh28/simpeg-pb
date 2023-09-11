<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_agama".
 *
 * @property int $id_agama
 * @property string $agama
 *
 * @property BiodataPegawai[] $biodataPegawais
 */
class MasterAgama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_agama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agama'], 'required'],
            [['agama'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_agama' => 'Id Agama',
            'agama' => 'Agama',
        ];
    }

    /**
     * Gets query for [[BiodataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBiodataPegawais()
    {
        return $this->hasMany(BiodataPegawai::class, ['id_agama' => 'id_agama']);
    }
}
