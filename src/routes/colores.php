<?php


require_once './src/controllers/ColoresController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 

$app->get('/api/colores', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ColoresController();
        $response->getBody()->write($controller->getColores($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/colores/delete/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ColoresController();
        $response->getBody()->write($controller->eliminarColor($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createColor', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ColoresController();
        $response->getBody()->write($controller->createColor(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});