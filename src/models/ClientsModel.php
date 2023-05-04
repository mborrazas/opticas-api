<?php

class ClientsModel
{

    function getClients($comercio)
    {
        $sql = "SELECT * FROM crystal.clientes WHERE comercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $clients = null;
        if ($result->rowCount() > 0) {
            $clients =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $clients;
    }

    function eliminarCliente($id, $comercio)
    {
        $sql = "DELETE FROM crystal.clientes WHERE comercio=".$comercio." AND id=".$id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function getClient($id,$comercio)
    {
        $sql = "SELECT * FROM crystal.clientes WHERE comercio=".$comercio." AND id=".$id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $clients = null;
        if ($result->rowCount() > 0) {
            $clients =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $clients;
    }

    function createClient($idComercio, $tipo, $nombre, $ci, $genero, $fNacimiento, $edad, $ocupacion, $email, $telefono1, $telefono2, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "INSERT INTO crystal.clientes (comercio, tipo, nombre, ci, genero, fNacimiento, edad, ocupacion, email, telefono1, telefono2, direccion, ciudad, estado, ubranizacion, codigoPostal) 
        VALUES ('".$idComercio."', '".$tipo."', '".$nombre."', '".$ci."', '".$genero."', '".$fNacimiento."', '".$edad."', '".$ocupacion."', '".$email."', '".$telefono1."', '".$telefono2."', '".$direccion."', '".$ciudad."', '".$estado."', '".$urbanizacion."', '".$codigoPostal."');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarCliente($idComercio, $id, $tipo, $nombre, $ci, $genero, $fNacimiento, $edad, $ocupacion, $email, $telefono1, $telefono2, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "UPDATE crystal.clientes SET 
        tipo='" . $tipo . "',
        nombre='" . $nombre . "',
        ci='" . $ci . "',
        ci='" . $ci . "',
        genero='" . $genero . "',
        fNacimiento='" . $fNacimiento . "',
        edad='" . $edad . "',
        ocupacion='" . $ocupacion . "',
        email='" . $email . "',
        telefono1='" . $telefono1 . "',
        telefono2='" . $telefono2 . "',
        direccion='" . $direccion . "',
        ciudad='" . $ciudad . "',
        estado='" . $estado . "',
        urbanizacion='" . $urbanizacion . "',
        codigoPostal='" . $codigoPostal . "'
        WHERE id=" . $id . " AND comercio=" . $idComercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
