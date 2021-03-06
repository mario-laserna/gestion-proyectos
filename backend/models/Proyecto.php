<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $activo
 *
 * @property Actividades[] $actividades
 * @property BitacoraTiempos[] $bitacoraTiempos
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activo'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['nombre'], 'unique'],
            [['nombre'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividades()
    {
        return $this->hasMany(Actividad::className(), ['id_proyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoraTiempos()
    {
        return $this->hasMany(Bitacoratiempo::className(), ['id_proyecto' => 'id']);
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);

        if($insert)
        {
            $this->activo = 1;
        }

        return true;
    }
}
