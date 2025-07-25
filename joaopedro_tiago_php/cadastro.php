<?php
session_start();
include_once('config.php');

$erro = '';
$sucesso = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $dataNascimento = $_POST['dataNascimento'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmarSenha'] ?? '';
    $endereco = $_POST['endereco'] ?? '';

    // Validações
    if (empty($nome) || empty($email) || empty($cpf) || empty($dataNascimento) || 
        empty($telefone) || empty($senha) || empty($confirmarSenha) || empty($endereco)) {
        $erro = "Todos os campos obrigatórios devem ser preenchidos!";
    } elseif ($senha !== $confirmarSenha) {
        $erro = "As senhas não coincidem!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Formato de e-mail inválido!";
    } else {
        // Verificar se e-mail já existe
        $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute(); // CORREÇÃO: Removido o array de parâmetros
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $erro = "Este e-mail já está cadastrado!";
        } else {
            // Criptografar senha
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            
            // Inserir no banco
            try {
                $sql = "INSERT INTO usuarios (nome, email, cpf, data_nascimento, telefone, celular, senha, endereco) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $conexao->prepare($sql);
                // CORREÇÃO: Vinculação correta dos parâmetros
                $stmt->bind_param(
                    "ssssssss", 
                    $nome, 
                    $email, 
                    $cpf, 
                    $dataNascimento, 
                    $telefone, 
                    $celular, 
                    $senha_hash, 
                    $endereco
                );
                
                $stmt->execute(); // CORREÇÃO: Chamado sem parâmetros
                
                $sucesso = "Cadastro realizado com sucesso!";
                
                // Limpar campos após sucesso
                $_POST = array();
                
            } catch (Exception $e) {
                $erro = "Erro ao cadastrar: " . $e->getMessage();
            }
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
    <title>SpeedCar Locadora - Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .mensagem {
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .erro {
            background-color: #ffdddd;
            color: #ff0000;
            border: 1px solid #ff0000;
        }
        .sucesso {
            background-color: #ddffdd;
            color: #008000;
            border: 1px solid #008000;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho (mesmo da página inicial) -->
    <header class="header">
        <div class="logo">
            <img src="logotipo.png" alt="Borcelle Locadora">
        </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar veículos...">
            <button><i class="fas fa-search"></i></button>
        </div>
        
        <nav class="nav-buttons">
            <a href="index.php" class="btn-nav">Home</a>
            <a href="produtos.php" class="btn-nav">Produtos</a>
            <a href="login.php" class="btn-nav">Login</a>
            <a href="contato.php" class="btn-nav">Contato</a>
            <a href="sobre.php" class="btn-nav">Quem Somos</a>
        </nav>
    </header>

    <!-- Conteúdo Principal - Formulário de Cadastro -->
    <main class="cadastro-container">
        <section class="cadastro-form">
            <div class="form-header">
                <h2>Crie sua conta</h2>
                <p>Preencha os dados abaixo para se cadastrar</p>
                
                <?php if($erro): ?>
                    <div class="mensagem erro"><?= $erro ?></div>
                <?php endif; ?>
                
                <?php if($sucesso): ?>
                    <div class="mensagem sucesso"><?= $sucesso ?></div>
                <?php endif; ?>
            </div>
            
            <form id="formCadastro" method="POST" action="cadastro.php">
                <div class="form-row">
                    <div class="input-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="nome" value="<?= $_POST['nome'] ?? '' ?>" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" value="<?= $_POST['cpf'] ?? '' ?>" required>
                        <i class="fas fa-id-card"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $_POST['dataNascimento'] ?? '' ?>" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" value="<?= $_POST['telefone'] ?? '' ?>" required>
                        <i class="fas fa-phone"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="celular">Celular</label>
                        <input type="tel" id="celular" name="celular" value="<?= $_POST['celular'] ?? '' ?>">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="confirmarSenha">Confirmar Senha</label>
                        <input type="password" id="confirmarSenha" name="confirmarSenha" required>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group full-width">
                        <label for="endereco">Endereço completo</label>
                        <input type="text" id="endereco" name="endereco" value="<?= $_POST['endereco'] ?? '' ?>" required>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-cadastrar">Cadastrar</button>
                    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
                </div>
            </form>
        </section>
        
        <section class="cadastro-beneficios">
            <h3>Benefícios de se cadastrar</h3>
            <ul>
                <li><i class="fas fa-check-circle"></i> Aluguel mais rápido e fácil</li>
                <li><i class="fas fa-check-circle"></i> Histórico de reservas</li>
                <li><i class="fas fa-check-circle"></i> Descontos exclusivos</li>
                <li><i class="fas fa-check-circle"></i> Atendimento prioritário</li>
                <li><i class="fas fa-check-circle"></i> Acumule pontos</li>
            </ul>
            
            <div class="cadastro-image">
                <img src="images/cadastro-car.png" alt="Vantagens de cadastro">
            </div>
        </section>
    </main>

    <!-- Rodapé (mesmo da página inicial) -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2023 SpeedCar Locadora. Todos os direitos reservados.</p>
            <div class="footer-links">
                <a href="#">Termos de Uso</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">FAQ</a>
            </div>
        </div>
    </footer>

    <!-- Adicione jQuery e jQuery Mask Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            // Aplicar máscaras
            $('#cpf').mask('000.000.000-00');
            $('#telefone').mask('(00) 0000-0000');
            $('#celular').mask('(00) 00000-0000');
            
            // Validar CPF
            $('#formCadastro').submit(function(e) {
                const cpf = $('#cpf').val().replace(/\D/g, '');
                if(cpf.length !== 11) {
                    alert('CPF inválido!');
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>