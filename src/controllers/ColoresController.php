<?php

require_once './src/models/ColoresModel.php';

class ColoresController
{

    function getColores($comercio)
    {       
        $model = new ColoresModel();
        $result = $model->getColores($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createColor($body, $comercio)
    {
        $model = new ColoresModel();
        $result = $model->createColor(
            $body['color'], 
            $comercio
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarColor($id, $comercio){
        $model = new ColoresModel();
        $result = $model->eliminarColor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
