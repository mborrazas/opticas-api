<?php

require_once './src/models/VentasModel.php';

class VentasController
{

    function getVentas($comercio)
    {
        $model = new VentasModel();
        $result = $model->getVentas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getVenta($id, $comercio)
    {
        $model = new VentasModel();
        $result = $model->getVenta($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getOrdenesDeTrabajo($comercio){
        $model = new VentasModel();
        $result = $model->getOrdenesDeTrabajo($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
    

    function getVentasDirectas($comercio){
        $model = new VentasModel();
        $result = $model->getVentasDirectas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    
}
