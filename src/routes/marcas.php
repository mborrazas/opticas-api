<?php


require_once './src/controllers/MarcasController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/marcas', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new MarcasController();
        $response->getBody()->write($controller->getMarcas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/eliminarMarca/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new MarcasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->eliminarMarca($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/marca/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new ModelosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getMarca($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/editarMarca/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new MarcasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->editarMarca(json_decode(file_get_contents('php://input'), true), $args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/createMarca', function (Request $request, Response $response, $args) {
    try {
        $controller = new MarcasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->createMarca(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});