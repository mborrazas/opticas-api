<?php

require_once './src/models/AuthModel.php';
use Firebase\JWT\JWT;

class AuthController
{
    

    function getAuth($body)
    {
        $model = new AuthModel();
        $result = $model->auth($body['ci'], $body['password']);
        if ($result) {

            $payload = [
                "name" => $result[0]->nombre,
                "email" => $result[0]->email,
                "tipo" => $result[0]->tipo,
                "comercio" => $result[0]->idComercio,
            ];
            $token = JWT::encode($payload, 'JWT-secret-key', 'HS256');
            return json_encode(
                [
                    "token"=> $token,
                    "user" => [
                        "name" => $result[0]->nombre,
                        "email" => $result[0]->email,
                        "tipo" => $result[0]->tipo,
                        "comercio" => $result[0]->idComercio,
                    ]
                ]
            );
        } else {
            return json_encode([]);
        }
    }
}
