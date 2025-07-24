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
        <!-- Coloquei onsubmit="fazerLogin(event)" para capturar o login via JS -->
        <form onsubmit="fazerLogin(event)">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail." maxlength="55" required>
            
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha." maxlength="55" required>
            
            <input type="submit" class="y" value="Entrar">

            <a href="index3.php">Não tenho uma conta.</a>
        </form>
    </div>
</div>

<div id="rodape">
   Obrigado por visitar o nosso site ^^
</div>

<!-- JavaScript do login aqui embaixo -->
<script>
function fazerLogin(event) {
    event.preventDefault(); // impede o formulário de recarregar a página

    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    // Verifica se é o administrador
    if (email === 'admin@almofadinhas.com' && senha === '1234admin') {
        localStorage.setItem('usuario', 'admin');
        alert('Bem-vindo, administrador!');
        window.location.href = 'admin.php'; // página de administrador
    } else {
        localStorage.setItem('usuario', 'cliente');
        alert('Login realizado com sucesso!');
        window.location.href = 'inicial.php'; // página comum
    }
}
</script>

</body>
</html>
