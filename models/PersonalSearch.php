<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personal;

/**
 * PersonalSearch represents the model behind the search form about `app\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'legajo', 'dni', 'apellido', 'nombre', 'direccion', 'telefono', 'fecha_ingreso'], 'safe'],
            [['titulo', 'sexo', 'estado', 'servicio', 'departamento', 'hs_trabajo'], 'integer'],
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
        $query = Personal::find();

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
            'titulo' => $this->titulo,
            'sexo' => $this->sexo,
            'estado' => $this->estado,
            'servicio' => $this->servicio,
            'departamento' => $this->departamento,
            'hs_trabajo' => $this->hs_trabajo,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'legajo', $this->legajo])
            ->andFilterWhere(['like', 'dni', $this->dni])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'fecha_ingreso', $this->fecha_ingreso]);

        return $dataProvider;
    }
}
