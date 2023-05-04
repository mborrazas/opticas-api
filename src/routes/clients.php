<?php


require_once './src/controllers/ClientsController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




$app->get('/api/clientes', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");

        $controller = new ClientsController();
        $response->getBody()->write($controller->getClients($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/cliente/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");

        $controller = new ClientsController();
        $response->getBody()->write($controller->getClient($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/clienteEliminar/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");

        $controller = new ClientsController();
        $response->getBody()->write($controller->eliminarCliente($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->post('/api/createClient', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ClientsController();
        $response->getBody()->write($controller->createClient(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/editarCliente/{id}', function (Request $request, Response $response, $args) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ClientsController();
        $response->getBody()->write($controller->editarCliente(json_decode(file_get_contents('php://input'), true), $decoded['comercio'], $args['id']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
