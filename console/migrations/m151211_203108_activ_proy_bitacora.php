<?php

use yii\db\Schema;
use yii\db\Migration;

class m151211_203108_activ_proy_bitacora extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%proyectos}}', [
            'id'        => $this->primaryKey(),
            'nombre'    => $this->string(200)->unique(),
            'activo'    => $this->boolean()
        ], $tableOptions);

        $this->createTable('{{%actividades}}', [
            'id'            => $this->primaryKey(),
            'nombre'        => $this->string(200)->unique(),
            'activo'        => $this->boolean(),
            'id_proyecto'   => $this->integer()
        ], $tableOptions);

        $this->createTable('{{%bitacora_tiempos}}', [
            'id'            => $this->primaryKey(),
            'fecha'         => $this->date(),
            'hora_inicio'   => $this->time(),
            'hora_final'    => $this->time(),
            'interrupcion'  => $this->time(),
            'total'         => $this->float(),
            'actividad_noplaneada'  => $this->string(250),
            'id_actividad'  => $this->integer(),
            'id_proyecto'   => $this->integer(),
            'artefacto'     => $this->string(250),
            'id_usuario'    => $this->integer()
        ], $tableOptions);

        $this->addForeignKey('FK_act_proy', 'actividades', 'id_proyecto', 'proyectos', 'id');
        $this->addForeignKey('FK_bitt_proy', 'bitacora_tiempos', 'id_proyecto', 'proyectos', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_act_proy', 'actividades');
        $this->dropForeignKey('FK_bitt_proy', 'bitacora_tiempos');
        $this->dropTable('{{%proyectos}}');
        $this->dropTable('{{%actividades}}');
        $this->dropTable('{{%bitacora_tiempos}}');
    }
}
