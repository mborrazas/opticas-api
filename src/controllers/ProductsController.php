<?php

require_once './src/models/ProductsModel.php';;

class ProductsController
{

    function getProducts($comercio)
    {
        $model = new ProductsModel();
        $result = $model->getProducts($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getProduct($id, $comercio)
    {
        $model = new ProductsModel();
        $product = $model->getProduct($id, $comercio);
        $stock = $model->getStockProduct($id);
        if ($product) {
            return json_encode(["product" => $product, "stock" => $stock]);
        } else {
            return json_encode([]);
        }
    }

    function eliminarProduct($id, $comercio)
    {
        $model = new ProductsModel();
        $result = $model->eliminarProduct($id, $comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function editarProducto($body, $comercio, $id)
    {
        $model = new ProductsModel();
        $result = $model->editarProducto(
            $body['descripcion'], 
            $body['codigo'], 
            $comercio, 
            $body['proveedor'], 
            $body['categoria'], 
            $body['modelo'], 
            $body['color'], 
            $body['tamano'], 
            $body['stockTotal'], 
            $body['precioMoneda1'], 
            $body['marca'],
            $id
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    

    function createProduct($body, $comercio)
    {
        $model = new ProductsModel();
        $result = $model->createProduct(
            $body['descripcion'], 
            $body['codigo'], 
            $comercio, 
            $body['proveedor'], 
            $body['categoria'], 
            $body['modelo'], 
            $body['color'], 
            $body['tamano'], 
            $body['stockTotal'], 
            $body['precioMoneda1'], 
            $body['marca']
        );
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function createStockProduct($body){
        $model = new ProductsModel();
        $model->deleteStock($body['idArticulo']);
        foreach($body['stocks'] as $item){
            $result = $model->stockItems(
                $item['sucursalId'], 
                $body['idArticulo'], 
                $item['stock']
            );
        }
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
        
    }

    
}
