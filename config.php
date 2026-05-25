<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');

try {

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

    $pdo = new PDO($dsn, DB_USER, DB_PASS, [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        PDO::ATTR_EMULATE_PREPARES => false,

    ]);

} catch (PDOException $e) {

    die('Erro de conexão: ' . $e->getMessage());

}

/*
Diferença entre PDO::ERRMODE_EXCEPTION e PDO::ERRMODE_SILENT

PDO::ERRMODE_EXCEPTION:
- Lança exceções quando ocorre um erro no banco.
- Facilita identificar e corrigir problemas.
- É o modo mais recomendado.

PDO::ERRMODE_SILENT:
- Não mostra erros automaticamente.
- O programador precisa verificar manualmente usando métodos como errorInfo().
- Pode dificultar a identificação de erros.
*/
?>