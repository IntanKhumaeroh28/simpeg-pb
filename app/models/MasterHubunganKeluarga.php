<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_hubungan_keluarga".
 *
 * @property int $id_hubungan_keluarga
 * @property string|null $hubungan_keluarga
 *
 * @property RiwayatKeluarga[] $riwayatKeluargas
 */
class MasterHubunganKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_hubungan_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hubungan_keluarga'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hubungan_keluarga' => 'Id Hubungan Keluarga',
            'hubungan_keluarga' => 'Hubungan Keluarga',
        ];
    }

    /**
     * Gets query for [[RiwayatKeluargas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatKeluargas()
    {
        return $this->hasMany(RiwayatKeluarga::class, ['id_hubungan_keluarga' => 'id_hubungan_keluarga']);
    }
}
