<!-- cabecalho.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #222;
            transition: 0.3s;
        }

        /* DARK MODE */
        body.dark {
            background-color: #121212;
            color: #f1f1f1;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            background: #2c3e50;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            color: white;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links a:hover {
            opacity: 0.8;
        }

        /* BOTÃO DARK/LIGHT */
        .theme-btn {
            background: white;
            color: #2c3e50;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .theme-btn:hover {
            background: #ddd;
        }

        /* CONTEÚDO */
        .container {
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: white;
        }

        body.dark table {
            background: #1f1f1f;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        body.dark th,
        body.dark td {
            border: 1px solid #555;
        }

        th {
            background-color: #eee;
        }

        body.dark th {
            background-color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            max-width: 500px;
        }

        body.dark form {
            background: #1f1f1f;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        body.dark input,
        body.dark textarea {
            background: #2a2a2a;
            color: white;
            border: 1px solid #555;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* BOTÕES */
        button {
            background: #2c3e50;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        button:hover {
            opacity: 0.9;
        }

        /* LINKS */
        a {
            text-decoration: none;
        }

        /* IMAGENS */
        img {
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <h2>Sistema de Cadastros</h2>

        <div class="nav-links">

            <a href="index.php">
                Contatos
            </a>

            <a href="cadastro_contato.php">
                Novo Contato
            </a>

            <a href="clientes.php">
                Clientes
            </a>

            <a href="cadastro_cliente.php">
                Novo Cliente
            </a>

            <a href="produtos.php">
                Produtos
            </a>

            <a href="cadastro_produto.php">
                Novo Produto
            </a>

            <button class="theme-btn" onclick="toggleTheme()">
                🌙 Dark Mode
            </button>

        </div>

    </nav>

    <div class="container">

    <script>
        function toggleTheme() {
            document.body.classList.toggle("dark");

            // salva preferência
            if(document.body.classList.contains("dark")) {
                localStorage.setItem("tema", "dark");
            } else {
                localStorage.setItem("tema", "light");
            }
        }

        // carrega tema salvo
        window.onload = function() {
            const tema = localStorage.getItem("tema");

            if(tema === "dark") {
                document.body.classList.add("dark");
            }
        }
    </script>