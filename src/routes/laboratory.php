<?php


require_once './src/controllers/LaboratoryController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/laboratorios', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new LaboratoryController();
        $response->getBody()->write($controller->getLaboratories($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/laboratory/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new LaboratoryController();
        $response->getBody()->write($controller->getLaboratory($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/eliminarLaboratory/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new LaboratoryController();
        $response->getBody()->write($controller->eliminarLaboratory($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->post('/api/createLaboratory', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new LaboratoryController();
        $response->getBody()->write($controller->createLaboratory(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/editarLaboratory/{id}', function (Request $request, Response $response, $args) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new LaboratoryController();
        $response->getBody()->write($controller->editarLaboratory(json_decode(file_get_contents('php://input'), true), $decoded['comercio'], $args['id']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});