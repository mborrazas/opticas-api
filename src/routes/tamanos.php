<?php


require_once './src/controllers/TamanosController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




$app->get('/api/tamanos', function (Request $request, Response $response) {
    try {
        $controller = new TamanosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getTamanos($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/tamano/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new TamanosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getTamano($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/editarTamano/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new TamanosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->editarTamano(json_decode(file_get_contents('php://input'), true), $args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/createTamano', function (Request $request, Response $response, $args) {
    try {
        $controller = new TamanosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->createTamanos(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/eliminarTamanos/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new TamanosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->eliminarTamanos($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
