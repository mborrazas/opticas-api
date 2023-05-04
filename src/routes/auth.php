<?php


require_once './src/controllers/AuthController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
 



$app->post('/auth', function (Request $request, Response $response) {
    try {
        $controller = new AuthController();
        
        $response->getBody()->write($controller->getAuth());
        
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
