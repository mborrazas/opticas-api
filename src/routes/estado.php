<?php


require_once './src/controllers/EstadosController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/estados', function (Request $request, Response $response) {
    try {
        $controller = new EstadosController();
        $response->getBody()->write($controller->getEstados());
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
