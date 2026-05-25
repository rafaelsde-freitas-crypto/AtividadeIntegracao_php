<?php

require_once 'cabecalho.php';
require_once 'config.php';
require_once 'funcoes.php';
require_once 'funcoes_clientes.php';
require_once 'funcoes_produtos.php';

$contatos = obterContatos($pdo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>

    <h1>Lista de Contatos</h1>

<a href="cadastro_contato.php">
    Novo Contato
</a>

<br><br>

    <?php exibirTabelaContatos($contatos); ?>

</body>
</html>