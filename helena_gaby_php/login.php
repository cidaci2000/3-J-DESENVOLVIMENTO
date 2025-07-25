<?php
session_start();
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"];

    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        $stmt = $conexao->prepare("SELECT id, email, senha, tipo_usuario FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);  // Corrigido de "ss" para "s" (apenas 1 parâmetro)

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $usuario = $result->fetch_assoc();
                
                if (password_verify($senha, $usuario['senha'])) {
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_email'] = $usuario['email'];
                    $_SESSION['usuario_tipo'] = $usuario['tipo'];

                    if ($usuario['tipo'] == 1) {
                        header("Location: admin.php");
                    } elseif ($usuario['tipo'] == 2) {
                        header("Location: profissional.php");
                    } else {
                        header("Location: carrinho.php");
                    }
                    exit();
                } else {
                    $erro = "Credenciais inválidas.";
                }
            } else {
                $erro = "Credenciais inválidas.";
            }
        } else {
            $erro = "Erro ao autenticar: " . $conexao->error;
        }
        $stmt->close();
    }
}
?>

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
            padding: 80px 0; /* Alterado para padding top e bottom */
        }

        .login-section {
            background-color: #626060;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative; /* Adicionado para posicionar o link voltar */
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

        /* Mensagens de erro */
        .erro {
            color: #ff6b6b;
            background: #fff0f0;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
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
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Link para recuperar a senha */
        .forgot-password,
        .nao-tem-conta {
            font-size: 14px; /* Tamanho aumentado */
            margin: 10px 0;
            display: block;
            color: #3498db;
            text-align: center; /* Centralizado */
            text-decoration: none;
        }

        .forgot-password:hover,
        .nao-tem-conta:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        /* Link para voltar ao início */
        #voltar {
            display: block;
            margin-top: 20px;
            font-size: 16px;
            background-color: #ffffff;
            color: #000;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
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
            width: 100%;
            
            margin-top: auto;
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
        <a href="carrinho.php">Carrinho</a> <!-- Corrigido: carinho.php → carrinho.php -->
    </div>
</header>

<!-- Seção de login -->
<section id="login">
    <div class="login-section">
        <h2>Login</h2>
        <p>Entre com sua conta para acessar os recursos exclusivos.</p>
        
        <!-- Exibição de erros -->
        <?php if(isset($erro)): ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php endif; ?>

        <!-- Formulário de login -->
        <form method="POST" action=""> <!-- Corrigido: method e action -->
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required> <!-- Corrigido: type="password" -->

            <input type="submit" value="Entrar">

            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
            <a href="cadastro.php" class="nao-tem-conta">Ainda não tenho cadastro</a>
        </form>

        <a href="home.php" id="voltar">Voltar ao início</a>
    </div>
</section>

<!-- Footer -->
<footer>
    © 2025 Potulski Joias - Todos os direitos reservados.
</footer>

</body>
</html>

