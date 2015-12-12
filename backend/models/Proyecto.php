<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Proyecto extends ActiveRecord
{

    public static function tableName()
    {
        return 'proyectos';
    }
}