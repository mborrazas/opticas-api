<?php

class ProveedoresModel
{

    function getProveedores($comercio)
    {
        $sql = "SELECT * FROM crystal.proveedores WHERE comercio=".$comercio." ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $proveedores = null;
        if ($result->rowCount() > 0) {
            $proveedores =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $proveedores;
    }

    function getProveedor($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.proveedores WHERE id=".$id." AND comercio=".$comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $proveedores = null;
        if ($result->rowCount() > 0) {
            $proveedores =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $proveedores;
    }

    function createProveedor($img, $comercio, $codigo, $nomrbe, $rif, $email, $telefono, $telefono2, $fax, $direccion, $idCiudad, $idEstado, $ubranizacion, $codigoPostal, $responsable, $movilResponsable, $emailResponsable)
    {
        $sql = "INSERT INTO crystal.proveedores (img, comercio, codigo, nombre, RIF, email, telefono, telefono2, fax, direccion, idCiudad, idEstado, urbanizacion, codigoPostal, responsable, movilResponsable, emailResponsable) 
        VALUES ('".$img."', '".$comercio."', '".$codigo."', '".$nomrbe."', '".$rif."', '".$email."', '".$telefono."', '".$telefono2."', '".$fax."', '".$direccion."', '".$idCiudad."', '".$idEstado."', '".$ubranizacion."', '".$codigoPostal."', '".$responsable."', '".$movilResponsable."', '".$emailResponsable."');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarProveedor($id, $img, $comercio, $codigo, $nomrbe, $rif, $email, $telefono, $telefono2, $fax, $direccion, $idCiudad, $idEstado, $ubranizacion, $codigoPostal, $responsable, $movilResponsable, $emailResponsable)
    {
        $sql = "UPDATE crystal.proveedores SET 
        img='" . $img . "',
        codigo='" . $codigo . "',
        nombre='" . $nomrbe . "',
        rif='" . $rif . "',
        email='" . $email . "',
        telefono='" . $telefono . "',
        telefono2='" . $telefono2 . "',
        fax='" . $fax . "',
        direccion='" . $direccion . "',
        idCiudad='" . $idCiudad . "',
        idEstado='" . $idEstado . "',
        urbanizacion='" . $ubranizacion . "',
        codigoPostal='" . $codigoPostal . "',
        responsable='" . $responsable . "',
        movilResponsable='" . $movilResponsable . "',
        emailResponsable='" . $emailResponsable . "'
        WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarProveedor($id, $comercio)
    {
        $sql = "DELETE FROM crystal.proveedores WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    
}
