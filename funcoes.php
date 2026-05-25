<?php

/**
 * Busca contatos no banco de dados
 */
function obterContatos(PDO $pdo): array {

    $stmt = $pdo->query('SELECT * FROM contatos ORDER BY nome');

    return $stmt->fetchAll();
}

/**
 * Exibe tabela HTML
 */
function exibirTabelaContatos(array $contatos): void {

    if (empty($contatos)) {
        echo "<p>Nenhum contato encontrado.</p>";
        return;
    }

    echo "<table border='1' cellpadding='10'>";

    echo "
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
    ";

    echo "<tbody>";

    foreach ($contatos as $contato) {

        $id = htmlspecialchars($contato['id']);
        $nome = htmlspecialchars($contato['nome']);
        $email = htmlspecialchars($contato['email']);
        $telefone = htmlspecialchars($contato['telefone']);

        echo "
            <tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$telefone</td>

                <td>
                    <a href='editar_contato.php?id=$id'>
                        Editar
                    </a>
                </td>

                <td>
                    <a href='excluir_contato.php?id=$id'>
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