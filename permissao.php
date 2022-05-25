<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . "/key.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

try {
    if (!isset($_SERVER['HTTP_AUTHENTICATION']))
        throw new Exception("Você não está autenticado!");

    $jwt = $_SERVER['HTTP_AUTHENTICATION'];

    $parts = explode(" ", $jwt);
    if (count($parts) !== 2 || $parts[0] !== "Bearer") throw new Exception("Token mal formatado!");

    $decoded = JWT::decode($parts[1], new Key($key, 'HS256'));
    $usuario = (array) $decoded;
    print json_encode($usuario);
}catch(Exception $e){
    print json_encode($e->getMessage());
    die();
}

?>