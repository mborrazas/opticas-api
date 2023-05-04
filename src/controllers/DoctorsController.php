<?php

require_once './src/models/DoctorsModel.php';;

class DoctorsController
{

    function getDoctors($comercio)
    {
        $model = new DoctorsModel();
        $result = $model->getDoctors($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getDoctor($id, $comercio)
    {
        $model = new DoctorsModel();
        $result = $model->getDoctor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createDoctor($body, $comercio)
    {
        $model = new DoctorsModel();
        $result = $model->createDoctor(
            $body['codigo'],
            $body['imagen'],
            $body['nombre'],
            $body['ci'],
            $body['genero'],
            $body['fechaNacimiento'],
            $body['email'],
            $body['movil'],
            $body['telefonoHabitacion'],
            $body['telefonoOficina'],
            $body['direccion'],
            $body['idCiudad'],
            $body['idEstado'],
            $body['urbanizacion'],
            $body['codigoPostal'],
            $comercio
        );

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function editarDoctor($body, $comercio, $id)
    {
        $model = new DoctorsModel();
        $result = $model->editarDoctor(
            $body['codigo'],
            $body['imagen'],
            $body['nombre'],
            $body['ci'],
            $body['genero'],
            $body['fechaNacimiento'],
            $body['email'],
            $body['movil'],
            $body['telefonoHabitacion'],
            $body['telefonoOficina'],
            $body['direccion'],
            $body['idCiudad'],
            $body['idEstado'],
            $body['urbanizacion'],
            $body['codigoPostal'],
            $comercio,
            $id
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function eliminarDoctor($id, $comercio)
    {
        $model = new DoctorsModel();
        $result = $model->eliminarDoctor($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
