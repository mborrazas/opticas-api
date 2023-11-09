<?php


require_once './src/controllers/VentasController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




$app->get('/api/ventas', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVentas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/venta/{id}', function (Request $request, Response $response, $args) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVenta($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/eliminarVenta/{id}', function (Request $request, Response $response, $args) {
    try {

        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->eliminarVenta($args['id'], $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->post('/api/editarVenta/{id}', function (Request $request, Response $response, $args) {
    try {

        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->editarVenta($args['id'], json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/editarProductosVenta/{id}', function (Request $request, Response $response, $args) {
    try {

        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->editarProductosVenta($args['id'], json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});



$app->get('/api/ventasDirectas', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getVentasDirectas($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/createVenta', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->createVenta($decoded['comercio'], json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/createProducts', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->createProducts($decoded['comercio'], json_decode(file_get_contents('php://input'), true)));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/venta/createPago', function (Request $request, Response $response) use ($app) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new VentasController();
        $response->getBody()->write($controller->createPago(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/ordenesDeTrabajo', function (Request $request, Response $response) {
    try {
        $controller = new VentasController();
        $decoded = $request->getAttribute("jwt");
        $response->getBody()->write($controller->getOrdenesDeTrabajo($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
