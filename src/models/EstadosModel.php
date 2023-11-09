<?php

class EstadosModel
{

    function getEstados()
    {
        $sql = "SELECT * FROM crystal.estado";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $estados = null;
        if ($result->rowCount() > 0) {
            $estados =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $estados;
    }
}
