<?php
session_start();
include_once('config.php');

$erro = '';

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
                    $_SESSION['usuario_tipo'] = $usuario['tipo']; // Corrigido para tipo

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
    <title>SpeedCar Locadora - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* Cabeçalho */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo img {
            height: 50px;
        }
        
        .search-bar {
            display: flex;
            flex-grow: 0.4;
        }
        
        .search-bar input {
            padding: 10px 15px;
            border: none;
            border-radius: 4px 0 0 4px;
            width: 100%;
            font-size: 16px;
        }
        
        .search-bar button {
            background: #ffcc00;
            border: none;
            padding: 10px 15px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        
        .nav-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn-nav {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .btn-nav:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Container principal */
        .login-container {
            display: flex;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            gap: 40px;
        }
        
        /* Caixa de login */
        .login-box {
            flex: 1;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            font-size: 28px;
            color: #1a2a6c;
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: #666;
        }
        
        /* Mensagens de erro */
        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        /* Grupo de entrada */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }
        
        .input-group input:focus {
            border-color: #1a2a6c;
            outline: none;
            box-shadow: 0 0 0 2px rgba(26, 42, 108, 0.2);
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 40px;
            color: #777;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 40px;
            background: none;
            border: none;
            color: #777;
            cursor: pointer;
        }
        
        /* Opções de login */
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input {
            width: auto;
        }
        
        .forgot-password {
            color: #1a2a6c;
            text-decoration: none;
            font-weight: 500;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        /* Botão de login */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: #1a2a6c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 20px;
        }
        
        .btn-login:hover {
            background: #0d1a4d;
        }
        
        /* Divisor */
        .login-divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
        }
        
        .login-divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            z-index: 1;
            color: #777;
        }
        
        .login-divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ddd;
            z-index: 0;
        }
        
        /* Login social */
        .social-login {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 25px;
        }
        
        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: white;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-social:hover {
            background: #f9f9f9;
        }
        
        .btn-social.google {
            color: #db4437;
        }
        
        .btn-social.facebook {
            color: #4267B2;
        }
        
        .btn-social img {
            width: 20px;
            height: 20px;
        }
        
        /* Link de registro */
        .register-link {
            text-align: center;
            color: #666;
        }
        
        .register-link a {
            color: #1a2a6c;
            text-decoration: none;
            font-weight: 500;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        /* Seção de benefícios */
        .login-benefits {
            flex: 1;
            background: #1a2a6c;
            color: white;
            border-radius: 10px;
            padding: 40px;
            max-width: 500px;
        }
        
        .login-benefits h3 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .login-benefits ul {
            list-style: none;
            margin-bottom: 30px;
        }
        
        .login-benefits li {
            padding: 10px 0;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .login-benefits i {
            color: #ffcc00;
            margin-top: 5px;
        }
        
        .benefits-image {
            text-align: center;
            margin-top: 30px;
        }
        
        .benefits-image img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Rodapé */
        .footer {
            background: #1a2a6c;
            color: white;
            padding: 20px 5%;
            text-align: center;
            margin-top: 40px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-links {
            margin-top: 15px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #ffcc00;
        }
        
        /* Responsividade */
        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
            }
            
            .login-box, .login-benefits {
                max-width: 100%;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
            }
            
            .search-bar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header class="header">
        <div class="logo">
            <img src="https://via.placeholder.com/150x50?text=SpeedCar+Logo" alt="SpeedCar Locadora">
        </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar veículos...">
            <button><i class="fas fa-search"></i></button>
        </div>
        
        <nav class="nav-buttons">
            <a href="home.php" class="btn-nav">Home</a>
            <a href="produtos.php" class="btn-nav">Produtos</a>
            <a href="cadastro.php" class="btn-nav">Cadastro</a>
            <a href="contato.php" class="btn-nav">Contato</a>
            <a href="sobre.php" class="btn-nav">Quem Somos</a>
        </nav>
    </header>

    <!-- Conteúdo Principal - Área de Login -->
    <main class="login-container">
        <section class="login-box">
            <div class="login-header">
                <h2>Acesse sua conta</h2>
                <p>Informe seus dados para entrar no sistema</p>
                
                <?php if(!empty($erro)): ?>
                    <div class="error-message">
                        <?php echo $erro; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <form id="formLogin" method="POST" action="">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                    <i class="fas fa-envelope"></i>
                </div>
                
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                    <i class="fas fa-lock"></i>
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <div class="login-options">
                    <label class="remember-me">
                        <input type="checkbox" name="lembrar">
                        <span>Lembrar de mim</span>
                    </label>
                    <a href="recuperar-senha.php" class="forgot-password">Esqueceu a senha?</a>
                </div>
                
                <button type="submit" class="btn-login">Entrar</button>
                
                <div class="login-divider">
                    <span>ou</span>
                </div>
                
                <div class="social-login">
                    <button type="button" class="btn-social google">
                        <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Google">
                        Entrar com Google
                    </button>
                    <button type="button" class="btn-social facebook">
                        <img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook">
                        Entrar com Facebook
                    </button>
                </div>
                
                <div class="register-link">
                    Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
                </div>
            </form>
        </section>
        
        <section class="login-benefits">
            <h3>Vantagens de ser cliente</h3>
            <ul>
                <li><i class="fas fa-check-circle"></i> Acesso rápido ao histórico de aluguéis</li>
                <li><i class="fas fa-check-circle"></i> Favoritos e preferências salvas</li>
                <li><i class="fas fa-check-circle"></i> Ofertas exclusivas para clientes cadastrados</li>
                <li><i class="fas fa-check-circle"></i> Processo de aluguel mais rápido</li>
                <li><i class="fas fa-check-circle"></i> Atendimento prioritário</li>
            </ul>
            
            <div class="benefits-image">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Vantagens de login">
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 SpeedCar Locadora. Todos os direitos reservados.</p>
            <div class="footer-links">
                <a href="#">Termos de Uso</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">FAQ</a>
            </div>
        </div>
    </footer>

    <script>
        // Toggle para mostrar/ocultar senha
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('senha');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Alternar ícone
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
        
        // Validação básica do formulário
        document.getElementById('formLogin').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            
            if (!email || !senha) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos.');
            }
        });
    </script>
</body>
</html>
</html>