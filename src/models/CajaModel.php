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
        $sql = "INSERT INTO crystal.caja_cierre (
            tipo, 
            efectivosBS, 
            efectivosUSD,
            gastosBS, 
            gastosUSD, 
            diferenciasBS, 
            diferenciasUSD, 
            tcBS, 
            tcUSD, 
            reintegroBS, 
            reintegroUSD, 
            tdBS,
            tdUSD,
            notaCreditoBS,
            notaCreditoUSD,
            creditoBS,
            creditoUSD,
            totalADepositarBS,
            totalADepositarUSD,
            lote1,
            lote2,
            lote3,
            fecha,
            comercio) 
        VALUES ('apertura', 0,0,0, 0, 0, 0, 0, 0, 0, 0, 0,0,0,0,0,0,0,0,0,0,0,'" . date("Y-m-d H:i:s") . "', " . $comercio . ")";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }



    function cierreDiario(
        $efectivosBS,
        $efectivosUSD,
        $gastosBS,
        $gastosUSD,
        $diferenciasBS,
        $diferenciasUSD,
        $tcBS,
        $tcUSD,
        $reintegroBS,
        $reintegroUSD,
        $tdBS,
        $tdUSD,
        $notaCreditoBS,
        $notaCreditoUSD,
        $creditoBS,
        $creditoUSD,
        $totalADepositarBS,
        $totalADepositarUSD,
        $lote1,
        $lote2,
        $lote3,
        $comercio
    ) {
        $sql = "UPDATE crystal.caja_cierre SET
            tipo = 'cierre',
            efectivosBS = " . $efectivosBS . ",
            efectivosUSD = " . $efectivosUSD . ",
            gastosBS = " . $gastosBS . ",
            gastosUSD = " . $gastosUSD . ",
            diferenciasBS = " . $diferenciasBS . ",
            diferenciasUSD = " . $diferenciasUSD . ",
            tcBS = " . $tcBS . ",
            tcUSD = " . $tcUSD . ",
            reintegroBS = " . $reintegroBS . ",
            reintegroUSD = " . $reintegroUSD . ",
            tdBS = " . $tdBS . ",
            tdUSD = " . $tdUSD . ",
            notaCreditoBS = " . $notaCreditoBS . ",
            notaCreditoUSD = " . $notaCreditoUSD . ",
            creditoBS = " . $creditoBS . ",
            creditoUSD = " . $creditoUSD . ",
            totalADepositarBS = " . $totalADepositarBS . ",
            totalADepositarUSD = " . $totalADepositarUSD . ",
            lote1 =" . $lote1 . ",
            lote2 = " . $lote2 . ",
            lote3 = " . $lote3 . ",
            fecha = '" . date("Y-m-d H:i:s") . "'
            WHERE comercio = ".$comercio." AND tipo = 'apertura'";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }


    function getCierresParciales($comercio){
        $sql = "SELECT * FROM crystal.caja_cierre_parcial WHERE facturado IS NULL AND comercio=" . $comercio;
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

    function cierreParcial(
        $efectivosBS,
        $efectivosUSD,
        $gastosBS,
        $gastosUSD,
        $diferenciasBS,
        $diferenciasUSD,
        $tcBS,
        $tcUSD,
        $reintegroBS,
        $reintegroUSD,
        $tdBS,
        $tdUSD,
        $notaCreditoBS,
        $notaCreditoUSD,
        $creditoBS,
        $creditoUSD,
        $comercio
    ) {
        $sql = "INSERT INTO crystal.caja_cierre_parcial (
            efectivosBS, 
            efectivosUSD,
            gastosBS, 
            gastosUSD, 
            diferenciasBS, 
            diferenciasUSD, 
            tcBS, 
            tcUSD, 
            reintegroBS, 
            reintegroUSD, 
            tdBS,
            tdUSD,
            notaCreditoBS,
            notaCreditoUSD,
            creditoBS,
            creditoUSD,
            fecha,
            comercio) 
        VALUES (  
        " . $efectivosBS . ",
        " . $efectivosUSD . ",
        " . $gastosBS . ",
        " . $gastosUSD . ",
        " . $diferenciasBS . ",
        " . $diferenciasUSD . ", 
        " . $tcBS . ",
        " . $tcUSD . ",
        " . $reintegroBS . ",
        " . $reintegroUSD . ",
        " . $tdBS . ",
        " . $tdUSD . ",
        " . $notaCreditoBS . ",
        " . $notaCreditoUSD . ",
        " . $creditoBS . ",
        " . $creditoUSD . ",
        '" . date("Y-m-d H:i:s") . "', 
        " . $comercio . ")";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }
}
