<?php

/**
 * Busca produtos
 */
function obterProdutos(PDO $pdo): array {

    $stmt = $pdo->query(
        'SELECT * FROM produtos ORDER BY nome'
    );

    return $stmt->fetchAll();
}

/**
 * Exibe tabela de produtos
 */
function exibirTabelaProdutos(array $produtos): void {

    if (empty($produtos)) {

        echo "<p>Nenhum produto encontrado.</p>";
        return;
    }

    echo "<table border='1' cellpadding='10'>";

    echo "
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Estoque</th>
            </tr>
        </thead>
    ";

    echo "<tbody>";

    foreach ($produtos as $produto) {

        $id = htmlspecialchars($produto['id']);
        $nome = htmlspecialchars($produto['nome']);
        $descricao = htmlspecialchars($produto['descricao']);
        $preco = number_format($produto['preco'], 2, ',', '.');
        $estoque = htmlspecialchars($produto['estoque']);

        $imagem = $produto['imagem']
            ? "uploads/" . htmlspecialchars($produto['imagem'])
            : '';

        echo "<tr>";

        echo "<td>$id</td>";

        echo "<td>";

        if ($imagem) {

            echo "
                <img
                    src='$imagem'
                    width='80'
                    height='80'
                    style='object-fit:cover; border-radius:8px;'
                >
            ";

        } else {

            echo "Sem imagem";
        }

        echo "</td>";

        echo "<td>$nome</td>";
        echo "<td>$descricao</td>";
        echo "<td>R$ $preco</td>";
        echo "<td>$estoque</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>