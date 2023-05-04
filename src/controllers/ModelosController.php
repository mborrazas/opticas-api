<?php

require_once './src/models/ModelosModel.php';

class ModelosController
{

    function getModelos($comercio)
    {
        $model = new ModelosModel();
        $result = $model->getModelos($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getModelo($id, $comercio)
    {
        $model = new ModelosModel();
        $result = $model->getModelo($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarModelo($id, $comercio)
    {
        $model = new ModelosModel();
        $result = $model->eliminarModelo($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

     function editarModelo($body, $id, $comercio)
    {
        $model = new ModelosModel();
        $result = $model->editarModelo($id, $body['nombre'], $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createModelo($body, $comercio)
    {
        $model = new ModelosModel();
        $result = $model->createModelo($body['nombre'], $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    
}
