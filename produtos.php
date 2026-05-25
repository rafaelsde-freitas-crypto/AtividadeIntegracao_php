<?php

require_once 'config.php';
require_once 'cabecalho.php';
require_once 'funcoes_produtos.php';

$produtos = obterProdutos($pdo);

?>

<h1>Lista de Produtos</h1>

<a href="cadastro_produto.php">
    Novo Produto
</a>

<br><br>

<?php exibirTabelaProdutos($produtos); ?>