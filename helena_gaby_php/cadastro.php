<?php
require_once 'config.php';

// Definir tipo de usuário padrão
$tipo_usuario = 'cliente';

// Processar formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar-senha'] ?? '';
    
    // Validar senha
    if ($senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem!";
    } else {
        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        
        // Inserir no banco de dados usando MySQLi
        $sql = "INSERT INTO usuarios (nome, cpf, email, endereco, cidade, estado, senha, tipo_usuario) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssssssss", $nome, $cpf, $email, $endereco, $cidade, $estado, $senha_hash, $tipo_usuario);
            
            if ($stmt->execute()) {
                $sucesso = "Cadastro realizado com sucesso!";
                // Limpar campos após cadastro bem-sucedido
                $_POST = array();
            } else {
                // Verificar erro de duplicidade
                if ($conexao->errno == 1062) {
                    $erro = "Erro: CPF ou E-mail já cadastrado!";
                } else {
                    $erro = "Erro ao cadastrar: " . $conexao->error;
                }
            }
            $stmt->close();
        } else {
            $erro = "Erro na preparação da query: " . $conexao->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Potulski Joias</title>
    <style>
        /* Reset e estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Header */
        header {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        #menu {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        #menu a {
            color: #eee;
            margin: 0 15px;
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        #menu a:hover {
            background-color: rgba(255, 204, 0, 0.2);
        }

        #menu #atual {
            color: #ffcc00;
            font-weight: bold;
            background-color: rgba(255, 204, 0, 0.1);
        }

        /* Conteúdo principal */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        /* Seção de cadastro */
        .cadastro-section {
            background-color: rgba(98, 96, 96, 0.9);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cadastro-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,204,0,0.1) 0%, rgba(255,204,0,0) 70%);
            z-index: 0;
        }

        .cadastro-section > * {
            position: relative;
            z-index: 1;
        }

        .cadastro-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #ffcc00;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }

        .cadastro-section p {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 30px;
        }

        /* Mensagens de feedback */
        .feedback {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Formulário */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #fff;
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            padding: 12px 15px;
            width: 100%;
            border: 1px solid #555;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 8px rgba(255, 204, 0, 0.5);
            outline: none;
        }

        .input-row {
            display: flex;
            gap: 15px;
        }

        .input-row .form-group {
            flex: 1;
        }

        .user-type {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            background: rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 5px;
        }

        .user-type label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="radio"] {
            width: 18px;
            height: 18px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #1a2a6c, #b21f1f);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #2a3a8c, #c22f2f);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Link para voltar ao login */
        .voltar-login {
            font-size: 16px;
            margin-top: 25px;
            display: block;
            color: #ffcc00;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
        }

        .voltar-login:hover {
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
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #voltar:hover {
            background-color: #ffcc00;
            transform: translateX(-5px);
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 15px;
            font-size: 14px;
            margin-top: auto;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .cadastro-section {
                padding: 30px 20px;
            }
            
            .input-row {
                flex-direction: column;
                gap: 0;
            }
            
            .user-type {
                flex-direction: column;
                gap: 10px;
            }
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
        <a href="login.php">Login</a>
        <a href="cadastro.php" id="atual">Cadastro</a>
        <a href="carinho.php">Carrinho</a>
    </div>
</header>

<!-- Conteúdo principal -->
<main>
    <!-- Seção de cadastro -->
    <div class="cadastro-section">
        <h2>Crie sua conta</h2>
        <p>Preencha os campos abaixo para se cadastrar em nossa loja.</p>

        <!-- Mensagens de feedback -->
        <?php if(isset($sucesso)): ?>
            <div class="feedback sucesso"><?php echo $sucesso; ?></div>
        <?php endif; ?>
        
        <?php if(isset($erro)): ?>
            <div class="feedback erro"><?php echo $erro; ?></div>
        <?php endif; ?>

        <!-- Formulário de cadastro -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required
                       value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>">
            </div>
            
            <div class="input-row">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required
                           value="<?php echo htmlspecialchars($_POST['cpf'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Rua, número, complemento" required
                       value="<?php echo htmlspecialchars($_POST['endereco'] ?? ''); ?>">
            </div>
            
            <div class="input-row">
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Sua cidade" required
                           value="<?php echo htmlspecialchars($_POST['cidade'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecione</option>
                        <option value="AC" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'AC') ? 'selected' : ''; ?>>Acre</option>
                        <option value="AL" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'AL') ? 'selected' : ''; ?>>Alagoas</option>
                        <option value="AP" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'AP') ? 'selected' : ''; ?>>Amapá</option>
                        <option value="AM" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'AM') ? 'selected' : ''; ?>>Amazonas</option>
                        <option value="BA" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'BA') ? 'selected' : ''; ?>>Bahia</option>
                        <option value="CE" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'CE') ? 'selected' : ''; ?>>Ceará</option>
                        <option value="DF" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'DF') ? 'selected' : ''; ?>>Distrito Federal</option>
                        <option value="ES" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'ES') ? 'selected' : ''; ?>>Espírito Santo</option>
                        <option value="GO" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'GO') ? 'selected' : ''; ?>>Goiás</option>
                        <option value="MA" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'MA') ? 'selected' : ''; ?>>Maranhão</option>
                        <option value="MT" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'MT') ? 'selected' : ''; ?>>Mato Grosso</option>
                        <option value="MS" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'MS') ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'MG') ? 'selected' : ''; ?>>Minas Gerais</option>
                        <option value="PA" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'PA') ? 'selected' : ''; ?>>Pará</option>
                        <option value="PB" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'PB') ? 'selected' : ''; ?>>Paraíba</option>
                        <option value="PR" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'PR') ? 'selected' : ''; ?>>Paraná</option>
                        <option value="PE" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'PE') ? 'selected' : ''; ?>>Pernambuco</option>
                        <option value="PI" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'PI') ? 'selected' : ''; ?>>Piauí</option>
                        <option value="RJ" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                        <option value="RN" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'RN') ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'RS') ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'RO') ? 'selected' : ''; ?>>Rondônia</option>
                        <option value="RR" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'RR') ? 'selected' : ''; ?>>Roraima</option>
                        <option value="SC" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'SC') ? 'selected' : ''; ?>>Santa Catarina</option>
                        <option value="SP" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'SP') ? 'selected' : ''; ?>>São Paulo</option>
                        <option value="SE" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'SE') ? 'selected' : ''; ?>>Sergipe</option>
                        <option value="TO" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'TO') ? 'selected' : ''; ?>>Tocantins</option>
                    </select>
                </div>
            </div>
            
                        
            <div class="input-row">
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmar-senha">Confirmar Senha:</label>
                    <input type="password" id="confirmar-senha" name="confirmar-senha" placeholder="Repita a senha" required>
                </div>
            </div>
            
            <input type="submit" value="Cadastrar">
            
            <a href="login.php" class="voltar-login">Já tem uma conta? Faça login</a>
        </form>

        <a href="home.php" id="voltar">Voltar ao início</a>
    </div>
</main>

<!-- Footer -->
<footer>
    © 2025 Potulski Joias - Todos os direitos reservados.
</footer>

</body>
</html>