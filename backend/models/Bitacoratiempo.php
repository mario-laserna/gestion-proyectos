<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora_tiempos".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $hora_inicio
 * @property string $hora_final
 * @property string $interrupcion
 * @property double $total
 * @property string $actividad_noplaneada
 * @property integer $id_actividad
 * @property integer $id_proyecto
 * @property string $artefacto
 * @property integer $id_usuario
 *
 * @property Proyectos $idProyecto
 */
class Bitacoratiempo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora_tiempos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora_inicio', 'hora_final', 'interrupcion'], 'safe'],
            [['fecha'], 'date', 'format'=>'dd-MM-yyyy'],
            [['hora_inicio', 'hora_final'], 'date', 'format'=>'hh:mm a'],
            [['interrupcion'], 'match', 'pattern'=>'/[0-9][0-9]:[0-9][0-9]/', 'message'=>'Indique un formato hh:ss'],
            [['id_actividad', 'id_proyecto', 'id_usuario'], 'integer'],
            [['actividad_noplaneada', 'artefacto'], 'string', 'max' => 250],
            [['fecha', 'hora_inicio', 'hora_final', 'interrupcion', 'artefacto'], 'required', 'message'=>'Campo requerido']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'hora_inicio' => 'Hora Inicio',
            'hora_final' => 'Hora Final',
            'interrupcion' => 'Interrupcion',
            'total' => 'Total',
            'actividad_noplaneada' => 'Actividad Noplaneada',
            'id_actividad' => 'Id Actividad',
            'id_proyecto' => 'Id Proyecto',
            'artefacto' => 'Artefacto',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProyecto()
    {
        return $this->hasOne(Proyecto::className(), ['id' => 'id_proyecto']);
    }

    public function beforeSave($insert)
    {
        $fechaHoraInicio = date_create_from_format('h:i a', $this->hora_inicio);
        $fechaHoraFinal = date_create_from_format('h:i a', $this->hora_final);
        $fechaHoraInt = date_create_from_format('H:i', $this->interrupcion);
        $interval = date_diff($fechaHoraFinal, $fechaHoraInicio);
        $this->total = (($interval->h * 60 + $interval->i) - ($fechaHoraInt->format('i'))) / 60.0;
        $this->fecha = date_format(date_create_from_format('d-m-Y', $this->fecha), 'Y-m-d');
        $this->hora_inicio = date_format($fechaHoraInicio, 'Y-m-d H:i:s');
        $this->hora_final = date_format($fechaHoraFinal, 'Y-m-d H:i:s');
        $this->interrupcion = date_format($fechaHoraInt, 'Y-m-d H:i:s');
        $this->id_usuario = Yii::$app->user->id;

        return true;
    }
}
