<?php

require_once './src/models/CiudadesModel.php';;

class CiudadesController
{

    function getCiudades()
    {
        $model = new CiudadesModel();
        $result = $model->getCiudades();
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
