<?php
include_once('config.php');

// Verifica conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    // Validações
    if (empty($nome) || empty($email) || empty($senha) || empty($confirmarSenha)) {
        $erro = "Todos os campos são obrigatórios!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Formato de e-mail inválido!";
    } elseif ($senha !== $confirmarSenha) {
        $erro = "As senhas não coincidem!";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter no mínimo 6 caracteres!";
    } else {
        // Verifica se o e-mail já existe
        $verifica_email = $conexao->prepare("SELECT email FROM usuarios WHERE email = ?");
        $verifica_email->bind_param("s", $email);
        $verifica_email->execute();
        $verifica_email->store_result();
        
        if ($verifica_email->num_rows > 0) {
            $erro = "Este e-mail já está cadastrado!";
        } else {
            // Criptografa a senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            
            // Insere no banco de dados
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $senhaHash);
            
            if ($stmt->execute()) {
                $sucesso = "Cadastro realizado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar: " . $stmt->error;
            }
            $stmt->close();
        }
        $verifica_email->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="cadastro2.css">
  <style>
    .erro {
        color: red;
        text-align: center;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid red;
        border-radius: 5px;
    }
    .sucesso {
        color: green;
        text-align: center;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid green;
        border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Cadastro</h2>
    
    <?php if (!empty($erro)): ?>
        <div class="erro"><?= $erro ?></div>
    <?php endif; ?>
    
    <?php if (!empty($sucesso)): ?>
        <div class="sucesso"><?= $sucesso ?></div>
    <?php endif; ?>
    
    <form action="#" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required minlength="6">

      <label for="confirmarSenha">Confirmar Senha:</label>
      <input type="password" id="confirmarSenha" name="confirmarSenha" required minlength="6">

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
