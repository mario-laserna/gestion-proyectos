<?php
namespace backend\models;


use Yii;

class Grafica
{
    public function getDb()
    {
        return Yii::$app->db;
    }

    public function obtenDatos($numDias, $fechaInicio, $idUsuario)
    {
        $fechas = array();

        for($i = 0; $i < $numDias; $i++)
            $fechas[$i] = date('Y-m-d', strtotime(($numDias - 1 - $i) . " dys ago", strtotime($fechaInicio)));

        $cadenaSelect = "select nombre";
        $cadenaSql = " from (select id, nombre from proyectos where activo = 1) p";

        for($i = 0; $i < count($fechas); $i++)
        {
            $cadenaSelect .= ", coalesce(f" . $i . ", 0) f" . $i;
            $cadenaSql = " left outer join ".
                "(select id, sum(total) f" . $i . " " .
                "from bitacora_tiempos " .
                "where fecha = '" . $fechas[$i] . "' and id_usuario = " . $idUsuario . " " .
                "group by id_proyecto) T" . $i . " " .
                "on p.id = T" . $i . ".id_proyecto ";
        }

        $cadenaSql = $cadenaSelect . $cadenaSql . " order by p.id";
        $rows = $this->getDb()->createCommand($cadenaSql)->queryAll();
        $series = array();
        foreach($rows as $row)
        {
            $serie = array();
            $serie['name'] = $row['nombre'];
            $suma = 0;
            for($i = 0; $i < $numDias; $i++)
            {
                $serie['data'][] = floatval($row["f".$i]);
                $suma += $row["f" . $i];
            }

            if($suma > 0)
                array_push($series, $serie);
        }

        return $series;
    }
}