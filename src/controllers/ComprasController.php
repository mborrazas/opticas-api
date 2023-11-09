<?php

require_once './src/models/ComprasModel.php';

class ComprasController
{

    function getCompras($comercio)
    {       
        $model = new ComprasModel();
        $result = $model->getCompras($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getCompra($id,$comercio)
    {       
        $model = new ComprasModel();
        $result = $model->getCompra($id,$comercio);
        $articulos = $model->getArticulos($id);
        $pagos = $model->getPagos($id);
        if ($result) {
            return json_encode(["compra" => $result, "articulos" => $articulos, "pagos" => $pagos]);
        } else {
            return json_encode([]);
        } 
    }

    function createPago($body, $comercio){
        $model = new ComprasModel();
        $model->deletePagos($body['idCompra']);
        foreach($body['pagos'] as $pago){
            $result = $model->createPago($body['idCompra'],$pago['fecha'], $pago['monto'], $pago['tipoPago']);
        }
        if ($result) {
            return json_encode(["result" => $result]);
        } else {
            return json_encode([]);
        }
    }


    function eliminarCompra($id, $comercio)
    {
        $model = new ComprasModel();
        $result = $model->eliminarCompra($id, $comercio);

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function pendientesDePago($comercio)
    {       
        $model = new ComprasModel();
        $result = $model->pendientesDePago($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function pagadas($comercio)
    {       
        $model = new ComprasModel();
        $result = $model->pagadas($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function createCompra($body, $comercio)
    {
        $model = new ComprasModel();
        $result = $model->createCompra(
            $body['fecha'], 
            $body['numeroDeFactura'],
            $body['proveedor'],
            $body['estado'],
            $body['moneda'],
            $body['subtotal'],
            $body['descuento'],
            $body['iva'],
            $body['total'],
            $body['pendienteDePago'],
            $body['pagada'],
            $comercio
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarCompra($body, $comercio)
    {
        $model = new ComprasModel();
        $result = $model->editarCompra(
            $body['id'],
            $body['fecha'], 
            $body['numeroDeFactura'],
            $body['proveedor'],
            $body['estado'],
            $body['moneda'],
            $body['subtotal'],
            $body['descuento'],
            $body['iva'],
            $body['total'],
            $body['pendienteDePago'],
            $body['pagada'],
            $comercio
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createCompraArticulos($body){
        $model = new ComprasModel();
        $model->eliminarArticulos($body['compra']);
        $articulos  = $body['articles'];
        foreach ($articulos as $articulo) {
            $result = $model->createCompraArticulos(
                $body['compra'],
                $articulo['cantidad'],
                $articulo['precioMoneda1'],
                $articulo['iva'],
                $articulo['discount'],
                $articulo['total'],
                $articulo['id']
            );
        }

        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }

    }

    function createComprasPagos($body){
        $model = new ComprasModel();
        $result = $model->createComprasPagos( 
            $body['idCompra'],
            $body['fecha'],
            $body['total'],
            $body['tipoPago'] 
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    
    
}
