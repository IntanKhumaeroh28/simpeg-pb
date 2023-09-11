<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisPegawai;

/**
 * JenisPegawaiSearch represents the model behind the search form of `app\models\JenisPegawai`.
 */
class JenisPegawaiSearch extends JenisPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_jenis_pegawai', 'nama_jenis_pegawai'], 'safe'],
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
        $query = JenisPegawai::find();

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
        $query->andFilterWhere(['like', 'kode_jenis_pegawai', $this->kode_jenis_pegawai])
            ->andFilterWhere(['like', 'nama_jenis_pegawai', $this->nama_jenis_pegawai]);

        return $dataProvider;
    }
}
