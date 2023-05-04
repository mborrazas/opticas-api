<?php

class CategoriasModel
{

    function getCategorias($comercio)
    {
        $sql = "SELECT * FROM crystal.categorias WHERE idComercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $categorias = null;
        if ($result->rowCount() > 0) {
            $categorias =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $categorias;
    }
}
