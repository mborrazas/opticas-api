<?php

class LaboratoryModel
{

    function getLaboratories($comercio)
    {
        $sql = "SELECT * FROM crystal.laboratorio WHERE comercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $laboratories = null;
        if ($result->rowCount() > 0) {
            $laboratories =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $laboratories;
    }

    function getLaboratory($id,$comercio)
    {
        $sql = "SELECT * FROM crystal.laboratorio WHERE comercio=".$comercio." AND id=".$id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $laboratories = null;
        if ($result->rowCount() > 0) {
            $laboratories =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $laboratories;
    }

    function createLaboratory($codigo, $nombre, $comercio, $email, $telefono1, $telefono2, $telefono3, $fax, $direccion, $idCiudad, $idEstado, $urbanizacion, $codigoPostal, $responsable, $movil, $emailResponsable)
    {
        $sql = "INSERT INTO crystal.laboratorio (codigo, nombre, comercio, email, telefono1, telefono2, telefono3, fax, direccion, idCiudad, idEstado, urbanizacion, codigoPostal, responsable, movilResponsable, emailResponsable) 
        VALUES ('".$codigo."', '".$nombre."', '".$comercio."', '".$email."', '".$telefono1."', '".$telefono2."', '".$telefono3."', '".$fax."', '".$direccion."', '".$idCiudad."', '".$idEstado."', '".$urbanizacion."', '".$codigoPostal."', '".$responsable."', '".$movil."', '".$emailResponsable."');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarLaboratory($id, $codigo, $nombre, $comercio, $email, $telefono1, $telefono2, $telefono3, $fax, $direccion, $idCiudad, $idEstado, $urbanizacion, $codigoPostal, $responsable, $movil, $emailResponsable)
    {
        $sql = "UPDATE crystal.laboratorio SET 
        codigo='" . $codigo . "',
        nombre='" . $nombre . "',
        email='" . $email . "',
        telefono1='" . $telefono1 . "',
        telefono2='" . $telefono2 . "',
        telefono3='" . $telefono3 . "',
        fax='" . $fax . "',
        direccion='" . $direccion . "',
        idCiudad='" . ($idCiudad == '' ?  0 : $idCiudad) . "',
        idEstado='" . ($idEstado == '' ? 0 : $idEstado). "',
        urbanizacion='" . $urbanizacion . "',
        codigoPostal='" . $codigoPostal . "',
        responsable='" . $responsable . "',
        movilResponsable='" . $movil . "',
        emailResponsable='" . $emailResponsable . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarLaboratory($id, $comercio)
    {
        $sql = "DELETE FROM crystal.laboratorio WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }
}
