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

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (empty($nome) || empty($email)) {

        $erro = 'Nome e e-mail são obrigatórios.';

    } else {

        $stmt = $pdo->prepare(
            'UPDATE contatos
             SET nome = ?, email = ?, telefone = ?
             WHERE id = ?'
        );

        $stmt->execute([
            $nome,
            $email,
            $telefone,
            $id
        ]);

        header('Location: index.php');
        exit;
    }
}
?>

<h1>Editar Contato</h1>

<?php if ($erro): ?>
    <p style="color:red;">
        <?php echo $erro; ?>
    </p>
<?php endif; ?>

<form method="POST">

    <div>
        <label>Nome:</label><br>
        <input
            type="text"
            name="nome"
            value="<?php echo htmlspecialchars($contato['nome']); ?>"
        >
    </div>

    <br>

    <div>
        <label>E-mail:</label><br>
        <input
            type="email"
            name="email"
            value="<?php echo htmlspecialchars($contato['email']); ?>"
        >
    </div>

    <br>

    <div>
        <label>Telefone:</label><br>
        <input
            type="text"
            name="telefone"
            value="<?php echo htmlspecialchars($contato['telefone']); ?>"
        >
    </div>

    <br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>