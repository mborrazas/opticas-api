<?php

class ProductsModel
{

    function getProducts($comercio)
    {
        $sql = "SELECT * FROM crystal.articulos WHERE comercio=" . $comercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $productos = null;
        if ($result->rowCount() > 0) {
            $productos =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $productos;
    }

    function getProduct($id, $comercio)
    {
        $sql = "SELECT * FROM crystal.articulos WHERE comercio=" . $comercio . " AND id=" . $id;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        $productos = null;
        if ($result->rowCount() > 0) {
            $productos =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $productos;
    }

    function createProduct($descripcion, $codigo, $idComercio, $proveedor, $categoria, $modelo, $color, $tamano, $stockTotal, $precioMoneda1, $marca)
    {
        $sql = "INSERT INTO crystal.articulos (titulo, codigo, comercio, idProveedor, idCategoria, modelo, color, tamano, stocktotal, imagen, precioMoneda1, marca) 
        VALUES ('" . $descripcion . "', '" . $codigo . "', '" . $idComercio . "', '" . $proveedor . "', '" . $categoria . "', '" . $modelo . "', '" . $color . "', '" . $tamano . "', '" . $stockTotal . "', '', '" . $precioMoneda1 . "', '" . $marca . "');";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return $db->lastInsertId();
    }


    function stockItems($idSucursal, $idArticulo, $stock)
    {
        $sql = "INSERT INTO crystal.stock_items (idSucursal, idArticulo, stock) 
        VALUES (".$idSucursal.", ".$idArticulo.", ".$stock.")";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function editarProducto($descripcion, $codigo, $idComercio, $proveedor, $categoria, $modelo, $color, $tamano, $stockTotal, $precioMoneda1, $marca, $id)
    {
        $sql = "UPDATE crystal.articulos SET 
        descripcion='" . $descripcion . "',
        codigo='" . $codigo . "',
        idProveedor='" . $proveedor . "',
        idCategoria='" . $categoria . "',
        modelo='" . $modelo . "',
        color='" . $color . "',
        tamano='" . $tamano . "',
        stockTotal='" . $stockTotal . "',
        precioMoneda1='" . $precioMoneda1 . "',
        marca='" . $marca . "'
        WHERE id=" . $id . " AND comercio=" . $idComercio . " ";
        $db = new db();
        $db = $db->connectionDB();
        $db->query($sql);
        return true;
    }

    function eliminarProduct($id, $comercio)
    {
        $sql = "DELETE FROM crystal.articulos WHERE id=" . $id . " AND comercio=" . $comercio;
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
        return $result;
    }
    

}
