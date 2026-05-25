<?php

/**
 * Busca clientes
 */
function obterClientes(PDO $pdo): array {

    $stmt = $pdo->query(
        'SELECT * FROM clientes ORDER BY nome'
    );

    return $stmt->fetchAll();
}

/**
 * Exibe tabela de clientes
 */
function exibirTabelaClientes(array $clientes): void {

    if (empty($clientes)) {

        echo "<p>Nenhum cliente encontrado.</p>";
        return;
    }

    echo "<table border='1' cellpadding='10'>";

    echo "
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
    ";

    echo "<tbody>";

    foreach ($clientes as $cliente) {

        $id = htmlspecialchars($cliente['id']);
        $nome = htmlspecialchars($cliente['nome']);
        $cpf = htmlspecialchars($cliente['cpf']);
        $email = htmlspecialchars($cliente['email']);
        $telefone = htmlspecialchars($cliente['telefone']);
        $endereco = htmlspecialchars($cliente['endereco']);

        echo "
            <tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$cpf</td>
                <td>$email</td>
                <td>$telefone</td>
                <td>$endereco</td>

                <td>
                    <a href='editar_cliente.php?id=$id'>
                        Editar
                    </a>
                </td>

                <td>
                    <a href='excluir_cliente.php?id=$id'>
                        Excluir
                    </a>
                </td>
            </tr>
        ";
    }

    echo "</tbody>";
    echo "</table>";
}
?>