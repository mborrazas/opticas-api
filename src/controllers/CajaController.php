<?php

require_once './src/models/CajaModel.php';

class CajaController
{

    function cajaAbierta($comercio)
    {
        $model = new CajaModel();
        $result = $model->cajaAbierta($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function abrirCaja($comercio)
    {
        $model = new CajaModel();
        $result = $model->abrirCaja($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
