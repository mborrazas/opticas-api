<?php

class ComprasModel
{

    function getCompras($comercio)
    {
        $sql = "SELECT * FROM crystal.compras WHERE comercio=" . $comercio . " ";
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
    function getCompra($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.compras WHERE id=" . $id . " AND comercio=" . $comercio . " ";
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
    function pendientesDePago($comercio)
    {
        $sql = "SELECT * FROM crystal.compras where pagada != 1 and comercio=" . $comercio . " ";
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

    function pagadas($comercio)
    {
        $sql = "SELECT * FROM crystal.compras where pagada = 1 and comercio=" . $comercio . " ";
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

    function createCompra($fecha, $numeroDeFactura, $proveedor, $estado, $moneda, $montoTotal, $subtotal, $descuento, $iva, $total, $pendienteDePago, $comercio)
    {
        $sql = "INSERT INTO crystal.compras (fecha, numeroDeFactura, proveedor, estado, moneda, montoTotal, subtotal, descuento, iva, total, pendienteDePago, comercio) 
        VALUES (".$fecha.", ".$numeroDeFactura.", ".$proveedor.", '".$estado."', '".$moneda."', ".$montoTotal.", ".$subtotal.", ".$descuento.", ".$iva.", ".$total.", ".$pendienteDePago.", ".$comercio.");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function createCompraArticulos($idCompra, $cantidad, $precio, $impuesto, $descuento, $total, $idArticulo){
        $sql = "INSERT INTO crystal.compras_articulos (idCompra, cantidad, precio, impuesto, descuento, total, idArticulo) 
        VALUES (".$idCompra.", ".$cantidad.", ".$precio.", ".$impuesto.", ".$descuento.", ".$total.", ".$idArticulo.");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function createComprasPagos($idCompra, $fecha, $total, $tipoPago){
        $sql = "INSERT INTO crystal.compras_pagos (idCompra, fecha, total, tipoPago) 
        VALUES (".$idCompra.", '".$fecha."', ".$total.", '".$tipoPago."');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    
}
