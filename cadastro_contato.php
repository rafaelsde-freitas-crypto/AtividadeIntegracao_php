<?php

require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    // Validação básica
    if (empty($nome) || empty($email)) {

        $erro = 'Nome e e-mail são obrigatórios!';

    } else {

        // Prepared Statement
        $stmt = $pdo->prepare(
            'INSERT INTO contatos (nome, email, telefone)
             VALUES (?, ?, ?)'
        );

        $stmt->execute([$nome, $email, $telefone]);

        header('Location: index.php');
        exit;
    }
}
?>

<h1>Cadastro de Contato</h1>

<?php if ($erro): ?>
    <p style="color:red;">
        <?php echo $erro; ?>
    </p>
<?php endif; ?>

<form action="" method="POST">

    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome">
    </div>

    <br>

    <div>
        <label>E-mail:</label><br>
        <input type="email" name="email">
    </div>

    <br>

    <div>
        <label>Telefone:</label><br>
        <input type="text" name="telefone">
    </div>

    <br>

    <button type="submit">
        Cadastrar
    </button>

</form>