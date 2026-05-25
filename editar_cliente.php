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

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (strlen($cpf) !== 14) {

        $erro = 'CPF inválido.';

    } else {

        $stmt = $pdo->prepare(
            'UPDATE clientes
             SET nome = ?, cpf = ?, email = ?,
                 telefone = ?, endereco = ?
             WHERE id = ?'
        );

        $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco,
            $id
        ]);

        header('Location: clientes.php');
        exit;
    }
}
?>

<h1>Editar Cliente</h1>

<form method="POST">

    <input type="text" name="nome"
        value="<?php echo htmlspecialchars($cliente['nome']); ?>">

    <br><br>

    <input type="text" name="cpf"
        value="<?php echo htmlspecialchars($cliente['cpf']); ?>">

    <br><br>

    <input type="email" name="email"
        value="<?php echo htmlspecialchars($cliente['email']); ?>">

    <br><br>

    <input type="text" name="telefone"
        value="<?php echo htmlspecialchars($cliente['telefone']); ?>">

    <br><br>

    <input type="text" name="endereco"
        value="<?php echo htmlspecialchars($cliente['endereco']); ?>">

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>