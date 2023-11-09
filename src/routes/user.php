<?php


require_once './src/controllers/UserController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 

$app->get('/api/users', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->getUsers($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/user/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->getUser($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/user/delete/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->eliminarUsuario($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/users/editar/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->editarUsuario(json_decode(file_get_contents('php://input'), true), $args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/changePassword', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->cambiarContrasena(json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createUser', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new UserController();
        $response->getBody()->write($controller->createUser(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

