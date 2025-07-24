<?php
// Conexão com o banco de dados (substitua com seus dados)
include_once ('config.php');



// Verificando a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); 

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    
    // Coletar e validar dados
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar senha
    
    // Verificar se senhas coincidem
    if ($_POST['senha'] !== $_POST['confirmar_senha']) {
        die("As senhas não coincidem!");
    }
    
    // Inserir no banco
    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, cpf, telefone, senha) 
            VALUES ('$nome', '$email', '$data_nascimento', '$cpf', '$telefone', '$senha')";
    
    if ($conexao->query($sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $conexao->error;
    }
    
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Meu Site</title>
    <link rel="stylesheet" href="estilo3.css">
</head>

<body>
    <header>
    <div class="cabecalho">
        <div class="h1">
            <h1> ALMOFADINHA</h1>
        </div>
        <div class="menu">
            <a href="inicial.php"> Home</a>
            <a href="index2.php"> Login</a>
            <a href="index3.php"> Cadastro </a>
            <a href="admin.php"> Admin</a>
        </div>
    </div>
    </header>
<main class="login-container">
    <div id="inicial">
        <div id="aaa">
        <form class="login-form" action="index3.php" method="post" novalidate>
            <h2>Criar Conta</h2>

            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
                
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="usuario@exemplo.com" required>
                
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
                
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>

                <label for="telefone">Número de telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="••••••••" required>
                
                <label for="confirmar_senha">Confirmar Senha</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn">Criar Conta</button>

            <div class="login-link">
                <span> | </span>
                <a href="inicial.php">Já possui conta? Login</a>
            </div>
        </form>
        </div>
    </div>
</main>

<footer class="rodape">
    <div>© 2025 Meu Site. Todos os direitos reservados.</div>
</footer>

</body>

</html>