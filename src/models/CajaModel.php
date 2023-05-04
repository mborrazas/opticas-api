<?php

class CajaModel
{

    function cajaAbierta($comercio)
    {
        $sql = "SELECT * FROM crystal.caja_cierre WHERE tipo='apertura' AND comercio=" . $comercio;
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

    function abrirCaja($comercio)
    {
        $sql = "INSERT INTO crystal.caja_cierre (tipo, entradaMoneda1, entradamoneda2, salidaMoneda1, salidaMoneda2, diferencias, totalADepositar, dateApertura, comercio) 
        VALUES ('apertura', 0,0,0,0,0,0, '".date("Y-m-d H:i:s")."', ".$comercio.")";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }
}
