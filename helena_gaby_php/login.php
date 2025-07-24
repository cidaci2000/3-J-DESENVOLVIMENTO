<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Potulski Joias</title>
    <link rel="stylesheet" href="login.css">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #menu {
            margin-top: 10px;
        }

        #menu a {
            color: #eee;
            margin: 0 15px;
            text-decoration: none;
            font-weight: 500;
        }

        #menu a:hover,
        #menu #atual {
            color: #ffcc00;
            font-weight: bold;
        }

        /* Seção de Login */
        #login {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
        }

        .login-section {
            background-color: #626060;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
        }

        .login-section p {
            font-size: 14px;
            color: #ddd;
            margin-bottom: 20px;
        }

        /* Formulário */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            color: #fff;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Link para recuperar a senha */
        .forgot-password,
        .nao-tem-conta {
            font-size: 12px;
            margin-bottom: 10px;
            display: block;
            color: #3498db;
            text-align: right;
            text-decoration: none;
        }

        .forgot-password:hover,
        .nao-tem-conta:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        /* Link para voltar ao início */
        #voltar {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
            background-color: #ffffff;
            color: #000;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        #voltar:hover {
            background-color: #f4f4f4;
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

    </style>
</head>
<body>

<!-- Header com nome da loja -->
<header>
    <h1>Potulski Joias</h1>
    <!-- Menu de navegação -->
    <div id="menu">
        <a href="home.php">Início</a>
        <a href="produtos.php">Produtos</a>
        <a href="marcas.php">Marcas</a>
        <a href="login.php" id="atual">Login</a>
        <a href="carinho.php">Carrinho</a>
    </div>
</header>

<!-- Seção de login -->
<section id="login">
    <div class="login-section">
        <h2>Login</h2>
        <p>Entre com sua conta para acessar os recursos exclusivos.</p>

        <!-- Formulário de login -->
        <form action="#" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

            <input type="submit" value="Entrar">

            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
            <a href="cadastro.php" class="nao-tem-conta">Ainda não tenho cadastro</a>
        </form>

        <a href="home.php" id="voltar">Voltar ao início</a>
    </div>
</section>

<!-- Footer opcional -->
<footer>
    © 2025 Potulski Joias - Todos os direitos reservados.
</footer>

</body>
</html>

