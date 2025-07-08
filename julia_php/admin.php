<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Meu Site</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="cabecalho">
    <div class="h1">
      <h1> LivPap</h1>
    </div>
    <div class="menu">
      <a href="home.php"> Home</a>
      <a href="login.php"> Login</a>
      <a href="cadastro.php"> Cadastro </a>
      <a href="admin.php"> Admin</a>
    </div>
  </div>

  <main class="login-container">
    <form class="login-form" action="#" method="post" novalidate>
      <h2>Entrar na conta de Administrador</h2>

      <div class="form-group">
        <label for="email">Usuário</label>
        <input type="email" id="email" name="email" placeholder="usuario@exemplo.com" required>
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn">Entrar</button>

      <div class="form-footer">
        <a href="#">Esqueceu a senha?</a>
        <span> | </span>
        <a href="#">Criar conta</a>
      </div>
    </form>
  </main>

  <footer class="rodape">
    <div>© 2025 Meu Site. Todos os direitos reservados.</div>
  </footer>

</body>

</html>