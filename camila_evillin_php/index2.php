

<?php
session_start(); // Descomentado para gerenciar sessões
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"];

    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        $stmt = $conexao->prepare("SELECT id, email, senha, tipo FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);

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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almofadinhas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div id="cabecalho">
    <img src="morango.png" alt="Morango"> Almofadinhas
</div>

<div id="sss">
    <a href="inicial.php">HOME</a>
    <a href="index3.php">LOGIN</a>
    <a href="#">CARRINHO</a>
    <a href="sobrenos.php">SOBRE</a>
</div>

<div id="inicial">
    <div id="aaa">
        <h2>Login</h2>
        <!-- Mostrar erros se existirem -->
        <?php if(isset($erro)): ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php endif; ?>
        
        <!-- Formulário corrigido com método POST e ação vazia -->
        <form method="POST" action="">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail." maxlength="55" required>
            
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha." maxlength="55" required>
            
            <input type="submit" class="y" value="Entrar">

            <!-- Link corrigido para cadastro -->
            <a href="cadastro.php">Não tenho uma conta.</a>
        </form>
    </div>
</div>

<div id="rodape">
   Obrigado por visitar o nosso site ^^
</div>