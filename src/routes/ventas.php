<?php


require_once './src/controllers/VentasController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 



$app->get('/api/ventas', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVentas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/venta/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVenta($args['id'],$decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/ventasDirectas', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVentasDirectas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/ordenesDeTrabajo', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getOrdenesDeTrabajo($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
