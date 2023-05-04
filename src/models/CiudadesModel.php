<?php

class CiudadesModel
{

    function getCiudades()
    {
        $sql = "SELECT * FROM crystal.ciudad";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $ciudades = null;
        if ($result->rowCount() > 0) {
            $ciudades =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $ciudades;
    }
}
