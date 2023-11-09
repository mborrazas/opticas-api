<?php

require_once './src/models/SucursalModel.php';

class SucursalController
{

    function getSucursales($comercio)
    {
        $model = new SucursalModel();
        $result = $model->getSucursales($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getSucursal($id, $comercio)
    {
        $model = new SucursalModel();
        $result = $model->getSucursal($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarSucursal($body, $id, $comercio)
    {
        $model = new SucursalModel(); 
             $result = $model->editarSucursal(
                $id,
                $comercio,
                $body['numero'],
                $body['tipo'],
                $body['telefono1'],
                $body['telefono2'],
                $body['email'],
                $body['fax'],
                $body['movil'],
                $body['direccion'],
                $body['ciudad'],
                $body['estado'],
                $body['urbanizacion'],
                $body['codigoPostal']
            );
            if ($result) {
                return json_encode($result);
            } else {
                return json_encode([]);
            }
        
    }

    function eliminarSecursal($id, $comercio)
    {
        $model = new SucursalModel();
        $result = $model->eliminarSucursal($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function createSucursal($body, $comercio)
    {
        $model = new SucursalModel();
        $result = $model->createSucursal(
            $comercio,
            $body['numero'],
            $body['tipo'],
            $body['telefono1'],
            $body['telefono2'],
            $body['email'],
            $body['fax'],
            $body['movil'],
            $body['direccion'],
            $body['ciudad'],
            $body['estado'],
            $body['urbanizacion'],
            $body['codigoPostal']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
