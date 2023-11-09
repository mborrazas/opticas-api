<?php

class ModelosModel
{

    function getModelos($comercio)
    {
        $sql = "SELECT * FROM crystal.modelo WHERE comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $modelo = null;
        if ($result->rowCount() > 0) {
            $modelo =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $modelo;
    }

    function getModelo($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.modelo WHERE comercio=" . $comercio . " AND id=" . $id . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $modelo = null;
        if ($result->rowCount() > 0) {
            $modelo =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $modelo;
    }

    function editarModelo($id, $modelo, $comercio)
    {
        $sql = "UPDATE crystal.modelo SET 
        nombre='" . $modelo . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarModelo($id, $comercio)
    {
        $sql = "DELETE FROM crystal.modelo WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function createModelo($nombre, $comercio)
    {
        $sql = "INSERT INTO crystal.modelo (nombre, comercio) 
        VALUES ('" . $nombre . "', " . $comercio . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
