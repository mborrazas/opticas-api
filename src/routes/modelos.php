<?php


require_once './src/controllers/ModelosController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/modelos', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ModelosController();
        $response->getBody()->write($controller->getModelos($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/eliminarModelo/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new ModelosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->eliminarModelo($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/modelo/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new ModelosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getModelo($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/editarModelo/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new ModelosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->editarModelo(json_decode(file_get_contents('php://input'), true), $args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/createModelo', function (Request $request, Response $response, $args) {
    try {
        $controller = new ModelosController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->createModelo(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});