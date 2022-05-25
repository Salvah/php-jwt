<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . "/key.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$login = $_POST['login'];
$pwd = $_POST['pwd'];
try {
    if ($login !== "thyago" || $pwd !== "123")
        throw new Exception("Dados inválidos!");
    $usuario = [
        'id' => 1,
        'name' => 'Thyago Salvá'
    ];
    $jwt = JWT::encode($usuario, $key, 'HS256');
    print json_encode(['token' => "Bearer ${jwt}", 'usuario' => ['name' => $usuario['name']]]);
} catch(Exception $e){
    die(json_encode(['error' => $e->getMessage()]));
}
?>