<?php

class VentasModel
{

    function getVentas($comercio)
    {
        $sql = "SELECT * FROM crystal.ventas WHERE comercio=" . $comercio . "  ORDER BY id DESC";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $ventas = null;
        if ($result->rowCount() > 0) {
            $ventas =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $ventas;
    }

    function getOrdenesDeTrabajo($comercio)
    {
        $sql = "SELECT * FROM crystal.ventas where tipo = 'orden' AND comercio=" . $comercio . "  ORDER BY id DESC";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $ventas = null;
        if ($result->rowCount() > 0) {
            $ventas =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $ventas;
    }

    function getVentasDirectas($comercio)
    {
        $sql = "SELECT * FROM crystal.ventas where tipo = 'venta' AND comercio=" . $comercio . "  ORDER BY id DESC";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $ventas = null;
        if ($result->rowCount() > 0) {
            $ventas =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $ventas;
    }

    function getVenta($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.ventas WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $ventas = null;
        if ($result->rowCount() > 0) {
            $ventas =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $ventas;
    }
}
