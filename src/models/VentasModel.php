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

    function marcarFacturado($comercio){
        $sql = "UPDATE crystal.ventas_pagos JOIN crystal.ventas ON crystal.ventas.id = crystal.ventas_pagos.idVenta SET facturado = 'Facturado' WHERE crystal.ventas.comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
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
            $ventas =  $result->fetchAll(PDO::FETCH_OBJ)[0];
        }
        $result = null;
        $db = null;
        return $ventas;
    }

    function getArticulos($id)
    {
        $sql = "SELECT crystal.articulos.*, crystal.ventas_producto.* FROM crystal.ventas_producto  INNER JOIN crystal.articulos ON crystal.ventas_producto.idProducto = crystal.articulos.id WHERE crystal.ventas_producto.idVenta=" . $id;
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

    function getPagos($id){
        $sql = "SELECT * FROM crystal.ventas_pagos WHERE idVenta=" . $id;
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

    function createProducts(
        $venta,
        $id,
        $titulo,
        $cantidad,
        $precio,
        $imp,
        $descuento,
        $total
    ) {
        $sql = "INSERT INTO crystal.ventas_producto (idVenta, idProducto, descripcion, cantidad, precio, imp, descuento, total) 
        VALUES (" . $venta . ", 
        " . $id . ", 
        '" . $titulo . "', 
        " . $cantidad . ", 
        " . $precio . ", 
        " . $imp . ", 
        " . $descuento . ", 
        " . $total . " 
        );";
        $db = new db();
        $db = $db->connectionDB();

        $db->query($sql);

        return $db->lastInsertId();
    }



    function editarVenta(
        $id,
        $tipo,
        $fecha,
        $moneda,
        $idCliente,
        $ci,
        $telefono,
        $email,
        $subtotal,
        $descuento,
        $iva,
        $total,
        $estado,
        $direccion
    ) {
        $sql = "UPDATE crystal.ventas SET 
        tipo = '" . $tipo . "',
        fecha = '" . $fecha . "', 
        moneda = '" . $moneda . "', 
        idCliente = " . $idCliente . ", 
        ci = '" . $ci . "', 
        telefono = '" . $telefono . "', 
        email = '" . $email . "', 
        subtotal = " . $subtotal . ", 
        descuento = '" . $descuento . "',
        iva = '" . $iva . "',
        total = '" . $total . "',
        estado = '" . $estado . "',
        direccion = '" . $direccion . "' 
        WHERE id = " . $id;
        $db = new db();
        $db = $db->connectionDB();

        $db->query($sql);

        return $db->lastInsertId();
    }



    function createVenta(
        $comercio,
        $tipo,
        $fecha,
        $moneda,
        $idCliente,
        $ci,
        $telefono,
        $email,
        $subtotal,
        $descuento,
        $iva,
        $total,
        $estado,
        $direccion
    ) {
        $sql = "INSERT INTO crystal.ventas (comercio, tipo, fecha, moneda, idCliente, ci, telefono, email, subtotal, descuento, iva, total, estado, direccion) 
        VALUES (" . $comercio . ", 
        '" . $tipo . "', 
        '" . $fecha . "', 
        '" . $moneda . "', 
        " . $idCliente . ", 
        '" . $ci . "', 
        '" . $telefono . "', 
        '" . $email . "', 
        " . $subtotal . ", 
        '" . $descuento . "',
        '" . $iva . "',
        '" . $total . "',
        '" . $estado . "',
        '" . $direccion . "'
        );";
        $db = new db();
        $db = $db->connectionDB();

        $db->query($sql);

        return $db->lastInsertId();
    }

    function eliminarProducto($id)
    {
        $sql = "DELETE FROM crystal.ventas_producto WHERE idVenta=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }

    function eliminarVenta($id, $comercio)
    {
        $sql = "DELETE FROM crystal.ventas WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);

        $sql = "DELETE FROM crystal.ventas_producto WHERE idVenta=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $this->deletePagos($id);
        return $result;
    }


    function getPendienteFacturar($comercio, $moneda, $tipo){
        $sql = "SELECT crystal.ventas_pagos.total FROM crystal.ventas JOIN crystal.ventas_pagos ON crystal.ventas.id = crystal.ventas_pagos.idVenta  where crystal.ventas.moneda = '" . $moneda . "' and crystal.ventas_pagos.facturado IS NULL and crystal.ventas_pagos.tipoPago = '" . $tipo . "' and crystal.ventas.comercio=" . $comercio . " ";
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

    function deletePagos($idVenta){
        $sql = "DELETE FROM crystal.ventas_pagos WHERE idVenta=" . $idVenta;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
    }

    function createPago($idVenta, $fecha, $total, $tipoPago){

        
        $sql = "INSERT INTO crystal.ventas_pagos (idVenta, fecha, total, tipoPago) 
        VALUES (".$idVenta.", '".$fecha."', ".$total.", '".$tipoPago."');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql); 
        return $db->lastInsertId();
    }
}
