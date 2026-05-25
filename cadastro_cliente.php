<?php

require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    // Validação simples CPF
    if (strlen($cpf) !== 14) {

        $erro = 'CPF inválido. Use 000.000.000-00';

    } elseif (!$nome || !$email) {

        $erro = 'Nome e e-mail são obrigatórios.';

    } else {

        $stmt = $pdo->prepare(
            'INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        ]);

        header('Location: clientes.php');
        exit;
    }
}
?>

<h1>Cadastro de Cliente</h1>

<?php if ($erro): ?>
    <p style="color:red;">
        <?php echo $erro; ?>
    </p>
<?php endif; ?>

<form method="POST">

    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome">
    </div>

    <br>

    <div>
        <label>CPF:</label><br>
        <input
            type="text"
            name="cpf"
            placeholder="000.000.000-00"
        >
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

    <div>
        <label>Endereço:</label><br>
        <input type="text" name="endereco">
    </div>

    <br>

    <button type="submit">
        Cadastrar
    </button>

</form>