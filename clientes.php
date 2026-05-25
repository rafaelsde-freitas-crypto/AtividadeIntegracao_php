<?php

require_once 'config.php';
require_once 'cabecalho.php';
require_once 'funcoes_clientes.php';

$clientes = obterClientes($pdo);

?>

<h1>Lista de Clientes</h1>

<a href="cadastro_cliente.php">
    Novo Cliente
</a>

<br><br>

<?php exibirTabelaClientes($clientes); ?>