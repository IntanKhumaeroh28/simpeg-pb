<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_pendidikan_formal".
 *
 * @property int $id_pendidikan_formal
 * @property string $nama_pendidikan
 *
 * @property RiwayatPendidikan[] $riwayatPendidikans
 */
class MasterPendidikanFormal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_pendidikan_formal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pendidikan'], 'required'],
            [['nama_pendidikan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id_pendidikan_formal' => 'Nama Pendidikan',
            'nama_pendidikan' => 'Nama Pendidikan',
        ];
    }

    /**
     * Gets query for [[RiwayatPendidikans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPendidikans()
    {
        return $this->hasMany(RiwayatPendidikan::class, ['id_pendidikan_formal' => 'id_pendidikan_formal']);
    }
}
