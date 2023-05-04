<?php

require_once './src/models/ProveedoresModel.php';

class ProveedoresController
{

    function getProveedores($comercio)
    {
        $model = new ProveedoresModel();
        $result = $model->getProveedores($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getProveedor($id, $comercio)
    {
        $model = new ProveedoresModel();
        $result = $model->getProveedor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function createProveedor($body, $comercio)
    {
        $model = new ProveedoresModel();
        $result = $model->createProveedor(
            $body['img'],  
            $comercio, 
            $body['codigo'],
            $body['nombre'], 
            $body['rif'], 
            $body['email'], 
            $body['telefono'], 
            $body['telefono2'], 
            $body['fax'], 
            $body['direccion'], 
            $body['idCiudad'], 
            $body['idEstado'],
            $body['urbanizacion'], 
            $body['codigoPostal'], 
            $body['responsable'],
            $body['movilResponsable'],
            $body['emailResponsable'],
        );

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarProveedor($id, $comercio)
    {
        $model = new ProveedoresModel();
        $result = $model->eliminarProveedor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarProveedor($body, $comercio, $id)
    {
        $model = new ProveedoresModel();
        $result = $model->editarProveedor(
            $id,
            $body['img'],  
            $comercio, 
            $body['codigo'],
            $body['nombre'], 
            $body['rif'], 
            $body['email'], 
            $body['telefono'], 
            $body['telefono2'], 
            $body['fax'], 
            $body['direccion'], 
            $body['idCiudad'], 
            $body['idEstado'],
            $body['urbanizacion'], 
            $body['codigoPostal'], 
            $body['responsable'],
            $body['movilResponsable'],
            $body['emailResponsable'],
        );

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
