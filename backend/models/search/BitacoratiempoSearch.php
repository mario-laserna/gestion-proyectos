<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacoratiempo;

/**
 * BitacoraTiempoSearch represents the model behind the search form about `app\models\BitacoraTiempo`.
 */
class BitacoratiempoSearch extends Bitacoratiempo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_actividad', 'id_proyecto', 'id_usuario'], 'integer'],
            [['fecha', 'hora_inicio', 'hora_final', 'interrupcion', 'actividad_noplaneada', 'artefacto'], 'safe'],
            [['total'], 'number'],
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
        $query = Bitacoratiempo::find();

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
            'fecha' => $this->fecha,
            'hora_inicio' => $this->hora_inicio,
            'hora_final' => $this->hora_final,
            'interrupcion' => $this->interrupcion,
            'total' => $this->total,
            'id_actividad' => $this->id_actividad,
            'id_proyecto' => $this->id_proyecto,
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'actividad_noplaneada', $this->actividad_noplaneada])
            ->andFilterWhere(['like', 'artefacto', $this->artefacto]);

        return $dataProvider;
    }
}
