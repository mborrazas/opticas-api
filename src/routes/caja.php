<?php


require_once './src/controllers/CajaController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




$app->get('/api/cajaAbierta', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->cajaAbierta($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/abrirCaja', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->abrirCaja($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->post('/api/cierreDiario', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->cierreDiario(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->post('/api/cierreParcial', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->cierreParcial(json_decode(file_get_contents('php://input'), true), $decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});


$app->get('/api/caja/cierreDiario', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->getCierreDiario($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});

$app->get('/api/caja/cierreParcial', function (Request $request, Response $response) {
    try {
        $decoded = $request->getAttribute("jwt");
        $controller = new CajaController();
        $response->getBody()->write($controller->getCierreParcial($decoded['comercio']));
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
