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

    function getColor($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.colores WHERE comercio=" . $comercio . " AND id=" . $id . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $marca = null;
        if ($result->rowCount() > 0) {
            $marca =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $marca;
    }

    function editarColor($id, $color, $comercio)
    {
        $sql = "UPDATE crystal.colores SET 
        color='" . $color . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarColor($id, $comercio)
    {
        $sql = "DELETE FROM crystal.colores WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return true;
    }

    function createColor($color, $comercio)
    {
        $sql = "INSERT INTO crystal.colores (color, comercio) 
        VALUES ('" . $color . "', " . $comercio . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
