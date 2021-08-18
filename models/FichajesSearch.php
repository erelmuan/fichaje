<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fichajes;

/**
 * FichajesSearch represents the model behind the search form about `app\models\Fichajes`.
 */
class FichajesSearch extends Fichajes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'licencia'], 'integer'],
            [['fecha_ingreso', 'fi', 'hora_ingreso', 'fecha_salida', 'fs', 'hora_salida', 'persona', 'cant_horas', 'observaciones'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Fichajes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fi' => $this->fi,
            'fs' => $this->fs,
            'licencia' => $this->licencia,
        ]);

        $query->andFilterWhere(['like', 'fecha_ingreso', $this->fecha_ingreso])
            ->andFilterWhere(['like', 'hora_ingreso', $this->hora_ingreso])
            ->andFilterWhere(['like', 'fecha_salida', $this->fecha_salida])
            ->andFilterWhere(['like', 'hora_salida', $this->hora_salida])
            ->andFilterWhere(['like', 'persona', $this->persona])
            ->andFilterWhere(['like', 'cant_horas', $this->cant_horas])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
