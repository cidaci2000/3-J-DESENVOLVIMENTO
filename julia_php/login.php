<?php
//session_start();
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe e sanitiza os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"]; // Não sanitizar senha para não alterar hash

    // Validação básica
    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        // Consulta preparada para buscar usuário pelo email
        $stmt = $conexao->prepare("SELECT id, email, senha, tipo FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $usuario = $result->fetch_assoc();
                
                // Verifica a senha usando password_verify
                if (password_verify($senha, $usuario['senha'])) {
                    // Autenticação bem-sucedida
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_email'] = $usuario['email'];
                    $_SESSION['usuario_tipo'] = $usuario['tipo'];

                    // Redirecionamento baseado no tipo de usuário
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
  <title>Login - LivPap</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="cabecalho">
    <div class="h1">
      <h1>LivPap</h1>
    </div>
    <div class="menu">
      <a href="home.php">Home</a>
      <a href="login.php">Login</a>
      <a href="cadastro.php">Cadastro</a>
      <a href="admin.php">Admin</a>
    </div>
  </div>

  <main class="login-container">
    <?php if (isset($erro)): ?>
      <div class="mensagem-erro"><?= $erro ?></div>
    <?php endif; ?>
    
    <form class="login-form" action="login.php" method="post" novalidate aria-label="Formulário de login">
      <h2 class="form-title">Entrar na Conta</h2>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="usuario@exemplo.com" 
          required
          aria-required="true"
          autocomplete="email"
          value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
        >
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input 
          type="password" 
          id="senha" 
          name="senha" 
          placeholder="••••••••" 
          required
          aria-required="true"
          autocomplete="current-password"
          minlength="8"
        >
      </div>

      <button type="submit" class="btn btn-primary">Entrar</button>

      <div class="form-footer" role="contentinfo">
        <a href="recuperar_senha.php" class="footer-link">Esqueceu a senha?</a>
        <span aria-hidden="true"> | </span>
        <a href="cadastro.php" class="footer-link">Criar conta</a>
      </div>
    </form>
  </main>

  <footer class="rodape">
    <div>© 2025 LivPap. Todos os direitos reservados.</div>
  </footer>
</body>
</html>