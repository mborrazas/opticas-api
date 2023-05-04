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
            $body['montoTotal'],
            $body['subtotal'],
            $body['descuento'],
            $body['iva'],
            $body['total'],
            $body['pendienteDePago'],
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
        $result = $model->createCompraArticulos(
            $body['idCompra'],
            $body['cantidad'],
            $body['precio'],
            $body['impuesto'],
            $body['descuento'],
            $body['total'],
            $body['idArticulo']
        );
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
