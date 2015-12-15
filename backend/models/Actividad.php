<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $activo
 * @property integer $id_proyecto
 *
 * @property Proyectos $idProyecto
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyecto'], 'integer'],
            [['activo'], 'boolean'],
            [['nombre'], 'string', 'max' => 200],
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
            'id_proyecto' => 'Id Proyecto',
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
        parent::beforeSave($insert);

        if($insert)
        {
            $this->activo = 1;
        }

        return true;
    }
}
