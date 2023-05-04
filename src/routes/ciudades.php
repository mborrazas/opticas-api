<?php


require_once './src/controllers/CiudadesController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 


$app->get('/api/ciudades', function (Request $request, Response $response) {
    try {
        $controller = new CiudadesController();
        $response->getBody()->write($controller->getCiudades());
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
