<?php


require_once './src/controllers/ComprasController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/api/compras', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->getCompras($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/compra/{id}', function (Request $request, Response $response, $args) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController(); 
        $response->getBody()->write($controller->getCompra(
            $args['id'],
            $decoded['comercio']
        ));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/pendientesDePago', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->pendientesDePago($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/pagadas', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->pagadas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createCompra', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->createCompra(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->post('/api/createArticulosCompra', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->createCompraArticulos(json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/createComprasPagos', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new ComprasController();
        $response->getBody()->write($controller->createComprasPagos(json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


