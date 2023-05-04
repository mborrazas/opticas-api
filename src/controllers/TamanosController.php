<?php

require_once './src/models/TamanosModel.php';

class TamanosController
{

    function getTamanos($comercio)
    {
        $model = new TamanosModel();
        $result = $model->getTamanos($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createTamanos($body, $comercio)
    {
        $model = new TamanosModel();
        $result = $model->createTamano(
            $body['tamano'], 
            $comercio
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarTamanos($id, $comercio){
        $model = new TamanosModel();
        $result = $model->eliminarTamanos($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getTamano($id, $comercio)
    {
        $model = new TamanosModel();
        $result = $model->getTamano($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarTamano($body, $id, $comercio)
    {
        $model = new TamanosModel();
        $result = $model->editarTamano(
            $id,
            $comercio,
            $body['tamano']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

}
