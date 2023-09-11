<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RiwayatPendidikan;

/**
 * RiwayatPendidikanSearch represents the model behind the search form of `app\models\RiwayatPendidikan`.
 */
class RiwayatPendidikanSearch extends RiwayatPendidikan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_riwayat_pendidikan', 'tahun_tamat', 'id_pendidikan_formal'], 'integer'],
            [['dokumen', 'id_pegawai'], 'safe'],
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
        $query = RiwayatPendidikan::find();

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
            'id_riwayat_pendidikan' => $this->id_riwayat_pendidikan,
            'tahun_tamat' => $this->tahun_tamat,
            'id_pendidikan_formal' => $this->id_pendidikan_formal,
        ]);

        $query->andFilterWhere(['like', 'dokumen', $this->dokumen])
            ->andFilterWhere(['like', 'id_pegawai', $this->id_pegawai]);

        return $dataProvider;
    }
}
