<?php
session_start();
include_once('config.php');

// Verifica conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Processa o formulário de login
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos!";
    } else {
        // Consulta o usuário no banco de dados
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            
            if (password_verify($senha, $usuario['senha'])) {
                // Autenticação bem-sucedida
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'email' => $usuario['email'],
                    'tipo' => $usuario['tipo'],
                    'nome' => $usuario['nome']
                ];
                
                // Redirecionamento por tipo de usuário
                switch ($usuario['tipo']) {
                    case 'admin':
                        header('Location: admin.php');
                        exit;
                    case 'profissional':
                        header('Location: profissional.php');
                        exit;
                    default:
                        header('Location: agendamento barbearia.php');
                        exit;
                }
            } else {
                $erro = "Credenciais inválidas!";
            }
        } else {
            $erro = "Usuário não encontrado!";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barber Club</title>
    <link rel="stylesheet" href="home barbearia.css">
    <link rel="stylesheet" href="login barbearia.css">
    <style>
        .erro {
            color: red;
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo barbearia 2.png" alt="Logo da Barbearia" class="logo">
        <h1 class="title">Junta-se a Barber Club!</h1>
        <nav>
            <ul>
                <li><a href="agendamento barbearia.php">Agendamento</a></li>
                <li><a href="sobre barbearia.php">Sobre Nós</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>🡻 Entrar 🡻</h2>
        
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        
        <form class="login-form" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="Entrar">
        </form>
    </main>
    <footer>
        <br>
        <p>Seja parte da nossa família! Cadastre-se e descubra os serviços exclusivos do Barber Club.</p>
        <br>
    </footer>
</body>
</html>



