<?php

class DoctorsModel
{

    function getDoctors($comercio)
    {
        $sql = "SELECT * FROM crystal.doctor WHERE comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $doctors = null;
        if ($result->rowCount() > 0) {
            $doctors =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $doctors;
    }

    function getDoctor($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.doctor WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $doctors = null;
        if ($result->rowCount() > 0) {
            $doctors =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $doctors;
    }

    function createDoctor($codigo, $imagen, $nombre, $ci, $genero, $fechaNacimiento, $email, $movil, $telefonoHabitacion, $telefonoOficina, $direccion, $idCiudad, $idEstado, $urbanizacion, $codigoPostal, $comercio)
    {
        $sql = "INSERT INTO crystal.doctor (codigo, imagen, nombre, ci, genero, fechaNacimiento, email, movil, telefonoHabitacion, telefonoOficina, direccion, idCiudad, idEstado, urbanizacion, codigoPostal, comercio) 
        VALUES (" . $codigo . ", '" . $imagen . "', '" . $nombre . "', '" . $ci . "', '" . $genero . "', '" . $fechaNacimiento . "', '" . $email . "', '" . $movil . "', '" . $telefonoHabitacion . "', '" . $telefonoOficina . "', '" . $direccion . "', '" . $idCiudad . "', '" . $idEstado . "', '" . $urbanizacion . "', '" . $codigoPostal . "', " . $comercio . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarDoctor($codigo, $imagen, $nombre, $ci, $genero, $fechaNacimiento, $email, $movil, $telefonoHabitacion, $telefonoOficina, $direccion, $idCiudad, $idEstado, $urbanizacion, $codigoPostal, $comercio, $id)
    {
        $sql = "UPDATE crystal.doctor SET 
        codigo='" . $codigo . "',
        imagen='" . $imagen . "',
        nombre='" . $nombre . "',
        ci='" . $ci . "',
        genero='" . $genero . "',
        fechaNacimiento='" . $fechaNacimiento . "',
        email='" . $email . "',
        movil='" . $movil . "',
        telefonoHabitacion='" . $telefonoHabitacion . "',
        telefonoOficina='" . $telefonoOficina . "',
        direccion='" . $direccion . "',
        idCiudad='" . ($idCiudad == '' ? 0 : $idCiudad)  . "',
        idEstado='" . ($idEstado == '' ?  0 : $idEstado)  . "',
        movil='" . $movil . "',
        urbanizacion='" . $urbanizacion . "',
        codigoPostal='" . $codigoPostal . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarDoctor($id, $comercio)
    {
        $sql = "DELETE FROM crystal.doctor WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }
}
