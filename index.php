<?php

require(__DIR__ . '/vendor/autoload.php');
require './src/config/db.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app = AppFactory::create();

$middleware = $app->addErrorMiddleware(true, true, true);


$app->add(new Tuupola\Middleware\JwtAuthentication([
    "secret" => "JWT-secret-key",
    "rules" => [
        new Tuupola\Middleware\JwtAuthentication\RequestPathRule([
            "path" => "/api",
            "ignore" => ["/auth"]
        ]),
    ],
    "attribute" => "jwt",
    "error" => function ($response, $arguments) {
        $data["status"] = "0";
        $data["message"] = $arguments["message"];
        $data["data"] = "";
        return $response
            ->withHeader("Content-Type", "application/json")
            ->getBody()
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));


$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello, world!");
    return $response;
});


require_once './src/routes/auth.php';
require_once './src/routes/clients.php';
require_once './src/routes/products.php';
require_once './src/routes/proveedores.php';
require_once './src/routes/laboratory.php';
require_once './src/routes/doctors.php';
require_once './src/routes/ciudades.php';
require_once './src/routes/categorias.php';
require_once './src/routes/sucursal.php';
require_once './src/routes/tamanos.php';
require_once './src/routes/colores.php';
require_once './src/routes/marcas.php';
require_once './src/routes/modelos.php';
require_once './src/routes/ventas.php';
require_once './src/routes/compras.php';
require_once './src/routes/caja.php';
require_once './src/routes/user.php';

$app->run();
