<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedCar Locadora - Aluguel de Veículos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min,css">
</head>
<body>
    <!-- Cabeçalho -->
    <header class="header">
        <div class="logo">
            <img src="logotipo.png" alt="Locadora">
        </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar veículos...">
            <button><i class="fas fa-search"></i></button>
        </div>
        
        <nav class="nav-buttons">
            <a href="produtos.php" class="btn-nav">Produtos</a>
            <a href="login.php" class="btn-nav">Login</a>
            <a href="cadastro.php" class="btn-nav">Cadastro</a>
            <a href="contato.php" class="btn-nav">Contato</a>
            <a href="sobre.php" class="btn-nav">Quem Somos</a>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <section class="intro">
            <h1>Alugue o carro dos seus sonhos</h1>
            <p>Na Borcelle Locadora, oferecemos a melhor frota de veículos com preços competitivos e atendimento personalizado. Sua jornada começa aqui!</p>
            <a href="produtos.php" class="btn-alugar">Alugar Agora</a>
        </section>
        
        <section class="carousel">
            <div class="carousel-container">
                <div class="carousel-slide">
                    <img src="images/carro1.webp" alt="Carro 1">
                    <img src="images/carro2.webp" alt="Carro 2">
                    <img src="images/carro3.webp" alt="Carro 3">
                </div>
            </div>
            <button class="carousel-btn prev"><i class="fas fa-chevron-left"></i></button>
            <button class="carousel-btn next"><i class="fas fa-chevron-right"></i></button>
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

    <script src="script.js"></script>
</body>
</html>