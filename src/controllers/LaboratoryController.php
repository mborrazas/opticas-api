<?php

require_once './src/models/LaboratoryModel.php';;

class LaboratoryController
{

    function getLaboratories($comercio)
    {
        $model = new LaboratoryModel();
        $result = $model->getLaboratories($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getLaboratory($id, $comercio)
    {
        $model = new LaboratoryModel();
        $result = $model->getLaboratory($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarLaboratory($id, $comercio)
    {
        $model = new LaboratoryModel();
        $result = $model->eliminarLaboratory($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function editarLaboratory($body, $comercio, $id)
    {
        $model = new LaboratoryModel();
        $result = $model->editarLaboratory(
            $id,
            $body['codigo'], 
            $body['nombre'], 
            $comercio, 
            $body['email'],
            $body['telefono1'], 
            $body['telefono2'], 
            $body['telefono3'], 
            $body['fax'], 
            $body['direccion'], 
            $body['idCiudad'], 
            $body['idEstado'], 
            $body['urbanizacion'], 
            $body['codigoPostal'],
            $body['responsable'], 
            $body['movil'], 
            $body['emailResponsable']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    

    function createLaboratory($body, $comercio)
    {
        $model = new LaboratoryModel();
        $result = $model->createLaboratory(
            $body['codigo'], 
            $body['nombre'], 
            $comercio, 
            $body['email'],
            $body['telefono1'], 
            $body['telefono2'], 
            $body['telefono3'], 
            $body['fax'], 
            $body['direccion'], 
            $body['idCiudad'], 
            $body['idEstado'], 
            $body['urbanizacion'], 
            $body['codigoPostal'],
            $body['responsable'], 
            $body['movil'], 
            $body['emailResponsable']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    
}
