<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterPendidikanFormal;

/**
 * MasterPendidikanFormalSearch represents the model behind the search form of `app\models\MasterPendidikanFormal`.
 */
class MasterPendidikanFormalSearch extends MasterPendidikanFormal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendidikan_formal'], 'integer'],
            [['nama_pendidikan'], 'safe'],
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
        $query = MasterPendidikanFormal::find();

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
            'id_pendidikan_formal' => $this->id_pendidikan_formal,
        ]);

        $query->andFilterWhere(['like', 'nama_pendidikan', $this->nama_pendidikan]);

        return $dataProvider;
    }
}
