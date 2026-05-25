<?php

require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = floatval($_POST['preco'] ?? 0);
    $estoque = intval($_POST['estoque'] ?? 0);

    $nomeArquivo = null;

    // Validações
    if ($preco <= 0) {

        $erro = 'Preço inválido.';

    } elseif ($estoque < 0) {

        $erro = 'Estoque inválido.';

    } else {

        // Upload da imagem
        if (!empty($_FILES['imagem']['name'])) {

            $extensao = pathinfo(
                $_FILES['imagem']['name'],
                PATHINFO_EXTENSION
            );

            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($extensao), $permitidos)) {

                $erro = 'Tipo de imagem não permitido.';

            } else {

                // Verifica MIME TYPE
                $mime = mime_content_type(
                    $_FILES['imagem']['tmp_name']
                );

                $mimesPermitidos = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!in_array($mime, $mimesPermitidos)) {

                    $erro = 'Arquivo inválido.';

                } else {

                    $nomeArquivo =
                        uniqid('prod_') . '.' . $extensao;

                    move_uploaded_file(
                        $_FILES['imagem']['tmp_name'],
                        'uploads/' . $nomeArquivo
                    );
                }
            }
        }

        // Salva no banco
        if (!$erro) {

            $stmt = $pdo->prepare(
                'INSERT INTO produtos
                (nome, descricao, preco, estoque, imagem)
                VALUES (?, ?, ?, ?, ?)'
            );

            $stmt->execute([
                $nome,
                $descricao,
                $preco,
                $estoque,
                $nomeArquivo
            ]);

            header('Location: produtos.php');
            exit;
        }
    }
}
?>

<h1>Cadastro de Produto</h1>

<?php if ($erro): ?>

    <p style="color:red;">
        <?php echo $erro; ?>
    </p>

<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome" required>
    </div>

    <br>

    <div>
        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea>
    </div>

    <br>

    <div>
        <label>Preço:</label><br>
        <input
            type="number"
            name="preco"
            step="0.01"
            min="0"
            required
        >
    </div>

    <br>

    <div>
        <label>Estoque:</label><br>
        <input
            type="number"
            name="estoque"
            min="0"
            required
        >
    </div>

    <br>

    <div>
        <label>Imagem:</label><br>
        <input type="file" name="imagem">
    </div>

    <br>

    <button type="submit">
        Cadastrar Produto
    </button>

</form>