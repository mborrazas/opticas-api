<?php

require_once './src/models/UserModel.php';

class UserController
{

    function getUsers($comercio)
    {
        $model = new UserModel();
        $result = $model->getUsers($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getUser($id, $comercio)
    {
        $model = new UserModel();
        $result = $model->getUser($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarUsuario($id, $comercio)
    {
        $model = new UserModel();
        $result = $model->eliminarUsuario($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarUsuario($body, $id, $comercio)
    {
        $model = new UserModel();
        $result = $model->editarUsuario(
            $id,
            $body['ci'],
            $body['password'],
            $comercio,
            $body['email'],
            $body['nombre'],
            $body['tipo'],
            $body['sucursal'],
            $body['genero'],
            $body['fechaNacimiento'],
            $body['movil'],
            $body['telefonoHabitacion'],
            $body['hobbie'],
            $body['direccion'],
            $body['ciudad'],
            $body['estado'],
            $body['urbanizacion'],
            $body['codigoPostal'],
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createUser($body, $comercio)
    {
        $model = new UserModel();
        $result = $model->createUser(
            $body['ci'], 
            $body['password'], 
            $comercio, 
            $body['email'],
            $body['nombre'],
            $body['tipo'],
            $body['sucursal'],
            $body['genero'],
            $body['fechaNacimiento'],
            $body['movil'],
            $body['telefonoHabitacion'],
            $body['hobbie'],
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
