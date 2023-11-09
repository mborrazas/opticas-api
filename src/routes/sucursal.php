<?php


require_once './src/controllers/SucursalController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 



$app->get('/api/sucursales', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new SucursalController();
        $response->getBody()->write($controller->getSucursales($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/sucursal/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new SucursalController();
        $response->getBody()->write($controller->getSucursal($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/sucursal/eliminar/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new SucursalController();
        $response->getBody()->write($controller->eliminarSecursal($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createSucursal', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new SucursalController();
        $response->getBody()->write($controller->createSucursal(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/sucursal/editar/{id}', function (Request $request, Response $response, $args) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new SucursalController();
        $response->getBody()->write($controller->editarSucursal(json_decode(file_get_contents('php://input'), true), $args['id'], $decoded['comercio']));
        return $response;

    } catch (PDOException $e) { 
        return $response->getBody()->write('{"error": {"text"' . $e->getMessage() . '}');
    }
});
