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

    function getColor($id, $comercio)
    {
        $model = new ColoresModel();
        $result = $model->getColor($id, $comercio);
        if ($result) {
            return json_encode($result[0]);
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



    function editarColor($body, $id, $comercio)
    {
        $model = new ColoresModel();
        $result = $model->editarColor($id, $body['color'], $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarColor($id, $comercio)
    {
        $model = new ColoresModel();
        $result = $model->eliminarColor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
