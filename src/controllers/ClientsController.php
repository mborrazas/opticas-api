<?php

require_once './src/models/ClientsModel.php';;

class ClientsController
{

    function getClients($comercio)
    {
        $model = new ClientsModel();
        $result = $model->getClients($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getClient($id,$comercio)
    {
        $model = new ClientsModel();
        $result = $model->getClient($id, $comercio);
        if ($result) {
            return json_encode($result[0]);
        } else {
            return json_encode([]);
        }
    }


    function eliminarCliente($id, $comercio){
        $model = new ClientsModel();
        $result = $model->eliminarCliente($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createClient($body,$comercio)
    {
        $model = new ClientsModel();
        $result = $model->createClient(
            $comercio, 
            $body['tipo'],
            $body['nombre'], 
            $body['ci'], 
            $body['genero'],
            $body['fNacimiento'], 
            $body['edad'],
            $body['ocupacion'],
            $body['email'],
            $body['telefono1'],
            $body['telefono2'], 
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

    function editarCliente($body, $comercio, $id){
        $model = new ClientsModel();
        $result = $model->editarCliente(
            $comercio, 
            $id, 
            $body['tipo'],
            $body['nombre'], 
            $body['ci'], 
            $body['genero'],
            $body['fNacimiento'], 
            $body['edad'],
            $body['ocupacion'],
            $body['email'],
            $body['telefono1'],
            $body['telefono2'], 
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
