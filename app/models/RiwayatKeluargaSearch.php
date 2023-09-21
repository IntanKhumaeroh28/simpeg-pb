<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RiwayatKeluarga;

/**
 * RiwayatKeluargaSearch represents the model behind the search form of `app\models\RiwayatKeluarga`.
 */
class RiwayatKeluargaSearch extends RiwayatKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_riwayat_keluarga', 'id_hubungan_keluarga'], 'integer'],
            [['nama', 'nik', 'file_kk', 'file_akte', 'tgl_lahir', 'id_pegawai'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RiwayatKeluarga::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_riwayat_keluarga' => $this->id_riwayat_keluarga,
            'tgl_lahir' => $this->tgl_lahir,
            'id_hubungan_keluarga' => $this->id_hubungan_keluarga,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'file_kk', $this->nik])
            ->andFilterWhere(['like', 'file_akte', $this->nik])
            ->andFilterWhere(['like', 'id_pegawai', $this->id_pegawai]);

        return $dataProvider;
    }
}
