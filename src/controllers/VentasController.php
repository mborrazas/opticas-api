<?php

require_once './src/models/VentasModel.php';

class VentasController
{

    function getVentas($comercio)
    {
        $model = new VentasModel();
        $result = $model->getVentas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getVenta($id, $comercio)
    {
        $model = new VentasModel();
        $result = $model->getVenta($id, $comercio);
        $articulos = $model->getArticulos($id);
        $pagos = $model->getPagos($id);
        if ($result) {
            return json_encode(["venta" => $result, "articulos" => $articulos, "pagos" => $pagos]);
        } else {
            return json_encode([]);
        }
    }

    function getOrdenesDeTrabajo($comercio)
    {
        $model = new VentasModel();
        $result = $model->getOrdenesDeTrabajo($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function eliminarVenta($id, $comercio)
    {
        $model = new VentasModel();
        $result = $model->eliminarVenta($id, $comercio);

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createVenta($comercio, $body)
    {
        $model = new VentasModel();
        $result = $model->createVenta(
            $comercio,
            $body['tipo'],
            $body['fecha'],
            $body['moneda'],
            $body['idCliente'],
            $body['ci'],
            $body['telefono'],
            $body['email'],
            $body['subtotal'],
            $body['descuento'],
            $body['iva'],
            $body['total'],
            $body['estado'],
            $body['direccion']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createProducts($comercio, $body)
    {
        $model = new VentasModel();
        $articulos  = $body['articulos'];
        foreach ($articulos as $articulo) {
            $result = $model->createProducts(
                $body['venta'],
                $articulo['id'],
                $articulo['titulo'],
                $articulo['cantidad'],
                $articulo['precioMoneda1'],
                $articulo['iva'],
                $articulo['discount'],
                $articulo['total']
            );
        }

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function editarProductosVenta($venta, $body)
    {
        $model = new VentasModel();
        $articulos  = $body['articulos'];
        $model->eliminarProducto($venta);
        foreach ($articulos as $articulo) {
            $result = $model->createProducts(
                $venta,
                $articulo['id'],
                $articulo['titulo'],
                $articulo['cantidad'],
                $articulo['precioMoneda1'],
                $articulo['imp'],
                $articulo['descuento'],
                $articulo['total']
            );
        }

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function editarVenta($venta, $body)
    {
        $model = new VentasModel();
        $result = $model->editarVenta(
            $venta,
            $body['tipo'],
            $body['fecha'],
            $body['moneda'],
            $body['idCliente'],
            $body['ci'],
            $body['telefono'],
            $body['email'],
            $body['subtotal'],
            $body['descuento'],
            $body['iva'],
            $body['total'],
            $body['estado'],
            $body['direccion']
        );

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }



    function getVentasDirectas($comercio)
    {
        $model = new VentasModel();
        $result = $model->getVentasDirectas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createPago($body, $comercio){
        $model = new VentasModel();
        $model->deletePagos($body['idVenta']);
        foreach($body['pagos'] as $pago){
            if($pago['monto']){
                $result = $model->createPago($body['idVenta'],$pago['fecha'], $pago['monto'], $pago['tipoPago']);
            }else{
                $result = $model->createPago($body['idVenta'],$pago['fecha'], $pago['total'], $pago['tipoPago']);
            }

        }
        if ($result) {
            return json_encode(["result" => $result]);
        } else {
            return json_encode([]);
        }
    }
}
