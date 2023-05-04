<?php

class ColoresModel
{

    function getColores($comercio)
    {
        $sql = "SELECT * FROM crystal.colores WHERE comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();

        $result = $db->query($sql);
        $colores = null;
        if ($result->rowCount() > 0) {
            $colores =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $colores;
    }

     function eliminarColor($id, $comercio)
    {
        $sql = "DELETE FROM crystal.colores WHERE id=".$id." comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function createColor($color, $comercio)
    {
        $sql = "INSERT INTO crystal.colores (color, comercio) 
        VALUES ('".$color."', ".$comercio.");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
