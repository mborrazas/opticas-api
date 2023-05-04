<?php


require_once './src/controllers/ProveedoresController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/proveedores', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ProveedoresController();
        $response->getBody()->write($controller->getProveedores($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/proveedor/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ProveedoresController();
        $response->getBody()->write($controller->getProveedor($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/eliminarProveedor/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ProveedoresController();
        $response->getBody()->write($controller->eliminarProveedor($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createProveedor', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ProveedoresController();
        $response->getBody()->write($controller->createProveedor(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/editarProveedor/{id}', function (Request $request, Response $response, $args) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ProveedoresController();
        $response->getBody()->write($controller->editarProveedor(json_decode(file_get_contents('php://input'), true), $decoded['comercio'], $args['id']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});