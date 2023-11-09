<?php

require_once './src/models/MarcasModel.php';

class MarcasController
{

    function getMarcas($comercio)
    {
        $model = new MarcasModel();
        $result = $model->getMarcas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function getMarca($id, $comercio)
    {
        $model = new MarcasModel();
        $result = $model->getMarca($id, $comercio);
        if ($result) {
            return json_encode($result[0]);
        } else {
            return json_encode([]);
        }
    }

    function eliminarMarca($id, $comercio)
    {
        $model = new MarcasModel();
        $result = $model->eliminarMarca($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

     function editarMarca($body, $id, $comercio)
    {
        $model = new MarcasModel();
        $result = $model->editarMarca($id, $body['nombre'], $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createMarca($body, $comercio)
    {
        $model = new MarcasModel();
        $result = $model->createMarca($body['nombre'], $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

}
