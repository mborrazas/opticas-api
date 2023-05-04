<?php

require_once './src/models/CategoriasModel.php';;

class CategoriasController
{

    function getCategorias($comercio)
    {
        $model = new CategoriasModel();
        $result = $model->getCategorias($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
