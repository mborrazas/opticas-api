<?php

class MarcasModel
{

    function getMarcas($comercio)
    {
        $sql = "SELECT * FROM crystal.marcas WHERE comercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $marcas = null;
        if ($result->rowCount() > 0) {
            $marcas =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $marcas;
    }

    function getMarca($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.marcas WHERE comercio=" . $comercio . " AND id=" . $id . " ";
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

    function editarMarca($id, $marca, $comercio)
    {
        $sql = "UPDATE crystal.marcas SET 
        nombre='" . $marca . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarMarca($id, $comercio)
    {
        $sql = "DELETE FROM crystal.marcas WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function createMarca($nombre, $comercio)
    {
        $sql = "INSERT INTO crystal.marcas (nombre, comercio) 
        VALUES ('" . $nombre . "', " . $comercio . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
