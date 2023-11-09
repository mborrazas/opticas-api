<?php

class UserModel
{

    function createUser($ci, $password, $idComercio, $email, $nombre, $tipo, $sucursal, $genero, $fechaNacimiento, $movil, $telefonoHabitacion, $hobbie, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "INSERT INTO crystal.usuarios (ci, password,  idComercio, email, nombre, tipo, sucursal, genero, fechaNacimiento, movil, telefonoHabitacion, hobbie, direccion, ciudad, estado, urbanizacion, codigoPostal) 
        VALUES ('" . $ci . "', '" . $password . "', " . $idComercio . ", '" . $email . "', '" . $nombre . "', '" . $tipo . "', '" . $sucursal . "', '" . $genero . "', '" . $fechaNacimiento . "', '" . $movil . "', '" . $telefonoHabitacion . "', '" . $hobbie . "', '" . $direccion . "', '" . $ciudad . "', '" . $estado . "', '" . $urbanizacion . "', '" . $codigoPostal . "');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarUsuario($id, $comercio)
    {
        $db = new db();
        $db = $db->connectionDB();
        $sql = "DELETE FROM crystal.usuarios where id=" . $id . " AND idComercio=" . $comercio . " ";
        $result = $db->query($sql);
        return $result;
    }

    function editarUsuario($id, $ci, $password, $idComercio, $email, $nombre, $tipo, $sucursal, $genero, $fechaNacimiento, $movil, $telefonoHabitacion, $hobbie, $direccion, $ciudad, $estado, $urbanizacion, $codigoPostal)
    {
        $sql = "UPDATE crystal.usuarios SET 
        ci='" . $ci . "',  
        password='" . $password . "',    
        idComercio=" . $idComercio . ",    
        email='" . $email . "',
        nombre='" . $nombre . "',
        tipo='" . $tipo . "',    
        sucursal=" . $sucursal . ",
        genero='" . $genero . "',    
        fechaNacimiento='" . $fechaNacimiento . "',    
        movil='" . $movil . "',    
        telefonoHabitacion='" . $telefonoHabitacion . "',    
        hobbie='" . $hobbie . "',    
        direccion='" . $direccion . "',        
        ciudad=" . $ciudad . ",
        estado=" . $estado . ",
        urbanizacion='" . $urbanizacion . "',
        codigoPostal=" . $codigoPostal . "
        WHERE id=" . $id . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editPassword($ci, $password){
        $sql = "UPDATE crystal.usuarios SET 
        password='" . $password . "'
        WHERE ci=" . $ci . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }


    function getUser($id, $comercio)
    {
        $db = new db();
        $db = $db->connectionDB();
        $sql = "SELECT * FROM crystal.usuarios where id=" . $id . " AND idComercio=" . $comercio . " ";

        $result = $db->query($sql);
        $auth = null;
        if ($result->rowCount() > 0) {
            $auth =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $auth;
    }

    function getUsers($comercio)
    {
        $db = new db();
        $db = $db->connectionDB();
        $sql = "SELECT * FROM crystal.usuarios where idComercio=" . $comercio . " ";

        $result = $db->query($sql);
        $auth = null;
        if ($result->rowCount() > 0) {
            $auth =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $auth;
    }
}
