<?php

require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

$stmt = $pdo->prepare(
    'SELECT * FROM clientes WHERE id = ?'
);

$stmt->execute([$id]);

$cliente = $stmt->fetch();

if (!$cliente) {
    die('Cliente não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM clientes WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: clientes.php');
    exit;
}
?>

<h1>Excluir Cliente</h1>

<p>
    Deseja realmente excluir:
    <strong>
        <?php echo htmlspecialchars($cliente['nome']); ?>
    </strong>?
</p>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

</form>

<br>

<a href="clientes.php">
    Cancelar
</a>