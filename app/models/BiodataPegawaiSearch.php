<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BiodataPegawai;

/**
 * BiodataPegawaiSearch represents the model behind the search form of `app\models\BiodataPegawai`.
 */
class BiodataPegawaiSearch extends BiodataPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'nik', 'nama', 'tgl_lahir', 'tempat_lahir', 'alamat', 'no_telp', 'email', 'foto', 'kode_jenis_kelamin', 'kode_jenis_pegawai', 'kode_unit', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['jumlah_pasangan', 'jumlah_anak', 'tahun_masuk', 'id_agama', 'id_status_perkawinan'], 'integer'],
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
        $query = BiodataPegawai::find();

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
            'tgl_lahir' => $this->tgl_lahir,
            'jumlah_pasangan' => $this->jumlah_pasangan,
            'jumlah_anak' => $this->jumlah_anak,
            'tahun_masuk' => $this->tahun_masuk,
            'id_agama' => $this->id_agama,
            'id_status_perkawinan' => $this->id_status_perkawinan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id_pegawai', $this->id_pegawai])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'kode_jenis_kelamin', $this->kode_jenis_kelamin])
            ->andFilterWhere(['like', 'kode_jenis_pegawai', $this->kode_jenis_pegawai])
            ->andFilterWhere(['like', 'kode_unit', $this->kode_unit])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
