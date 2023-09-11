<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterHubunganKeluarga;

/**
 * MasterHubunganKeluargaSearch represents the model behind the search form of `app\models\MasterHubunganKeluarga`.
 */
class MasterHubunganKeluargaSearch extends MasterHubunganKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hubungan_keluarga'], 'integer'],
            [['hubungan_keluarga'], 'safe'],
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
        $query = MasterHubunganKeluarga::find();

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
            'id_hubungan_keluarga' => $this->id_hubungan_keluarga,
        ]);

        $query->andFilterWhere(['like', 'hubungan_keluarga', $this->hubungan_keluarga]);

        return $dataProvider;
    }
}
