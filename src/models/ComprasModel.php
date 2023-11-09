<?php

 class ComprasModel
{

    function getCompras($comercio)
    {
        $sql = "SELECT * FROM crystal.compras WHERE comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $compra = null;
        if ($result->rowCount() > 0) {
            $compra =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $compra;
    }
    function getCompra($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.compras WHERE id=" . $id . " AND comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $compra = null;
        if ($result->rowCount() > 0) {
            $compra =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $compra;
    }

    function eliminarArticulos($id)
    {
        $sql = "DELETE FROM crystal.compras_articulos WHERE idCompra=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }


    function eliminarCompra($id, $comercio)
    {
        $sql = "DELETE FROM crystal.compras WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);

        $sql = "DELETE FROM crystal.compras_articulos WHERE idCompra=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);

        $sql = "DELETE FROM crystal.compras_pagos WHERE idCompra=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function getPagos($id)
    {


        $sql = "SELECT * FROM crystal.compras_pagos WHERE idCompra=" . $id;
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
    function getArticulos($id)
    {
        $sql = "SELECT crystal.articulos.*, crystal.compras_articulos.* FROM crystal.compras_articulos  JOIN crystal.articulos ON crystal.compras_articulos.idArticulo = crystal.articulos.id WHERE crystal.compras_articulos.idCompra=" . $id;
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


    function pendientesDePago($comercio)
    {
        $sql = "SELECT * FROM crystal.compras where pagada != 1 and comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $compra = null;
        if ($result->rowCount() > 0) {
            $compra =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $compra;
    }

    function getPendienteFacturar($comercio, $moneda, $tipo)
    {
        $sql = "SELECT crystal.compras.total FROM crystal.compras JOIN crystal.compras_pagos ON crystal.compras.id = crystal.compras_pagos.idCompra  where crystal.compras.moneda = '" . $moneda . "' and crystal.compras_pagos.facturado IS NULL and crystal.compras_pagos.tipoPago = '" . $tipo . "' and crystal.compras.comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $compra = null;
        if ($result->rowCount() > 0) {
            $compra =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $compra;
    }


    function pagadas($comercio)
    {
        $sql = "SELECT * FROM crystal.compras where pagada = 1 and comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $compra = null;
        if ($result->rowCount() > 0) {
            $compra =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $compra;
    }

    function createCompra($fecha, $numeroDeFactura, $proveedor, $estado, $moneda, $subtotal, $descuento, $iva, $total, $pendienteDePago, $pagada, $comercio)
    {
        $sql = "INSERT INTO crystal.compras (fecha, numeroDeFactura, proveedor, estado, moneda, subtotal, descuento, iva, total, pendienteDePago, comercio, pagada) 
        VALUES ('" . $fecha . "', " . $numeroDeFactura . ", " . $proveedor . ", '" . $estado . "', '" . $moneda . "', " . $subtotal . ", " . $descuento . ", " . $iva . ", " . $total . ", " . $pendienteDePago . ", " . $comercio . " , " . $pagada . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return $db->lastInsertId();
    }


    function marcarFacturado($comercio){
        $sql = "UPDATE crystal.compras_pagos JOIN crystal.compras ON crystal.compras.id = crystal.compras_pagos.idCompra SET facturado = 'Facturado' WHERE crystal.compras.comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarCompra($id, $fecha, $numeroDeFactura, $proveedor, $estado, $moneda, $subtotal, $descuento, $iva, $total, $pendienteDePago, $pagada, $comercio)
    {
        $sql = "UPDATE crystal.compras SET 
        fecha = '" . $fecha . "',
        numeroDeFactura =  " . $numeroDeFactura . ",
        proveedor = " . $proveedor . ",
        estado = '" . $estado . "',
        moneda = '" . $moneda . "',
        subtotal = " . $subtotal . ",
        descuento = " . $descuento . ",
        iva = " . $iva . ",
        total = " . $total . ",
        pendienteDePago = " . $pendienteDePago . ",
        pagada = " . $pagada . " 
        WHERE id = " . $id;
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }


    function deletePagos($idCompra)
    {
        $sql = "DELETE FROM crystal.compras_pagos WHERE idCompra=" . $idCompra;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
    }

    function createPago($idCompra, $fecha, $total, $tipoPago)
    {


        $sql = "INSERT INTO crystal.compras_pagos (idCompra, fecha, total, tipoPago) 
        VALUES (" . $idCompra . ", '" . $fecha . "', " . $total . ", '" . $tipoPago . "');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return $db->lastInsertId();
    }

    function createCompraArticulos($idCompra, $cantidad, $precio, $impuesto, $descuento, $total, $idArticulo)
    {
        $sql = "INSERT INTO crystal.compras_articulos (idCompra, cantidad, precio, impuesto, descuento, total, idArticulo) 
        VALUES (" . $idCompra . ", " . $cantidad . ", " . $precio . ", " . $impuesto . ", " . $descuento . ", " . $total . ", " . $idArticulo . ");";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function createComprasPagos($idCompra, $fecha, $total, $tipoPago)
    {
        $sql = "INSERT INTO crystal.compras_pagos (idCompra, fecha, total, tipoPago) 
        VALUES (" . $idCompra . ", '" . $fecha . "', " . $total . ", '" . $tipoPago . "');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }
}
