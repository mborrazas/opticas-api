<?php

class TamanosModel
{

    function getTamanos($comercio)
    {
        $sql = "SELECT * FROM crystal.tamanos WHERE comercio=".$comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $tamanos = null;
        if ($result->rowCount() > 0) {
            $tamanos =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $tamanos;
    }


    function eliminarTamanos($id, $comercio)
    {
        $sql = "DELETE FROM crystal.tamanos WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }


    function getTamano($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.tamanos WHERE id=".$id." AND comercio=".$comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $tamanos = null;
        if ($result->rowCount() > 0) {
            $tamanos =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $tamanos;
    }

    function editarTamano($id, $comercio, $tamano)
    {
        $sql = "UPDATE crystal.tamanos SET 
        tamano='" . $tamano . "'
        WHERE id=" . $id . " AND comercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function createTamano($tamano, $comercio)
    {
        $sql = "INSERT INTO crystal.tamanos (tamano, comercio) 
        VALUES ('" . $tamano . "', " . $comercio . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
   
    
}
