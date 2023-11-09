<?php

require_once './src/models/EstadosModel.php';;

class EstadosController
{

    function getEstados()
    {
        $model = new EstadosModel();
        $result = $model->getEstados();
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
