<?php

require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

// Busca contato
$stmt = $pdo->prepare(
    'SELECT * FROM contatos WHERE id = ?'
);

$stmt->execute([$id]);

$contato = $stmt->fetch();

if (!$contato) {
    die('Contato não encontrado.');
}

// Confirma exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM contatos WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
?>

<h1>Excluir Contato</h1>

<p>
    Tem certeza que deseja excluir este contato?
</p>

<ul>
    <li>
        <strong>Nome:</strong>
        <?php echo htmlspecialchars($contato['nome']); ?>
    </li>

    <li>
        <strong>E-mail:</strong>
        <?php echo htmlspecialchars($contato['email']); ?>
    </li>

    <li>
        <strong>Telefone:</strong>
        <?php echo htmlspecialchars($contato['telefone']); ?>
    </li>
</ul>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

</form>

<br>

<a href="index.php">
    Cancelar
</a>