<?php


require_once './src/controllers/DoctorsController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/api/doctores', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new DoctorsController();
        $response->getBody()->write($controller->getDoctors($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/doctor/{id}', function (Request $request, Response $response,  $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new DoctorsController();
        $response->getBody()->write($controller->getDoctor($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->post('/api/createDoctor', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
         $controller = new DoctorsController();
        $response->getBody()->write($controller->createDoctor(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/editarDoctor/{id}', function (Request $request, Response $response, $args) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new DoctorsController();
        $response->getBody()->write($controller->editarDoctor(json_decode(file_get_contents('php://input'), true), $decoded['comercio'], $args['id']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/eliminarDoctor/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new DoctorsController();
        $response->getBody()->write($controller->eliminarDoctor($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

