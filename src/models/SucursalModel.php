<?php

class SucursalModel
{

    function getSucursales($comercio)
    {
        $sql = "SELECT * FROM crystal.sucursal WHERE idComercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $sucursales = null;
        if ($result->rowCount() > 0) {
            $sucursales =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $sucursales;
    }

    function getSucursal($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.sucursal WHERE id=" . $id . " AND idComercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $sucursales = null;
        if ($result->rowCount() > 0) {
            $sucursales =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $sucursales;
    }

    function eliminarSucursal($id, $comercio)
    {
        $sql = "DELETE FROM crystal.sucursal WHERE id=" . $id . " AND idComercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function editarSucursal($id, $comercio, $numero, $tipo, $telefono1, $telefono2, $email, $fax, $movil, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "UPDATE crystal.sucursal SET 
        comercio=" . $comercio . ",  
        numero=" . $numero . ",    
        tipo='" . $tipo . "',    
        telefono1=" . $telefono1 . ",
        telefono2=" . $telefono2 . ",
        email='" . $email . "',    
        fax=" . $fax . ",
        movil=" . $movil . ",    
        direccion='" . $direccion . "',    
        ciudad=" . $ciudad . ",    
        estado=" . $estado . ",    
        urbanizacion='" . $urbanizacion . "',    
        codigoPostal=" . $codigoPostal . ",    
        WHERE id=" . $id . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function createSucursal($idComercio, $numero, $tipo, $telefono1, $telefono2, $email, $fax, $movil, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "INSERT INTO crystal.sucursal (idComercio, numero, tipo, telefono1, telefono2, email, fax, movil, direccion, ciudad, estado, urbanizacion, codigoPostal) 
        VALUES ('" . $idComercio . "', '" . $numero . "', '" . $tipo . "', '" . $telefono1 . "', '" . $telefono2 . "', '" . $email . "', '" . $fax . "', '" . $movil . "', '" . $direccion . "', '" . $ciudad . "', '" . $estado . "', '" . $urbanizacion . "', '" . $codigoPostal . "');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
