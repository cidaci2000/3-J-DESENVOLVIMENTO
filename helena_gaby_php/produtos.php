<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Potulski Joias</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Potulski Joias</h1>
    </header>

    <div id="menu">
        <a href="home.php">Início</a>
        <a href="produtos.php">Produtos</a>
        <a href="marcas.php">Marcas</a>
        <a href="login.php">Login</a>
        <a href="carinho.php">Carrinho</a>
    </div>

    <section class="banner">
        <h1>Bem-vindo à nossa loja!</h1>
        <p>Confira os produtos exclusivos da nossa coleção.</p>
    </section>

    <section id="produtos">
        <h2>Produtos em Destaque</h2>

        <div class="produto-grade">
            <!-- Produto 1 -->
            <div class="produto">
                <img src="imagens/anel-coracao.jpg.png" alt="Anel de Ouro rose">
                <h3>Anel de Ouro</h3>
                <p>R$ 1500,00</p>
                <br>
            </div>

            <!-- Produto 2 -->
            <div class="produto">
                <img src="imagens/brinco-borboleta.jpg.png" alt="Brinco ouro amarelo">
                <h3>Anel de Prata</h3>
                <p>R$ 200,00</p>
               
            </div>

            <!-- Produto 3 -->
            <div class="produto">
                <img src="imagens/colar-de-flor2.jpg.png" alt="Colar de ouro rose">
                <h3>Anel de Ouro Amarelo</h3>
                <p>R$ 5000,00</p>
                
            </div>
        </div>

        <div class="produto-grade">
            <!-- Produto 4 -->
            <div class="produto">
                <img src="imagens/pulseira-brilhante.jpg.png" alt="Pulseira de Ouro Branco">
                <h3>Anel de Ouro Branco</h3>
                <p>R$ 3200,00</p>
               
            </div>

            <!-- Produto 5 -->
            <div class="produto">
                <img src="imagens/anel-vintage.jpg.png" alt="Anel com Ametista">
                <h3>Anel de Prata com Ametista</h3>
                <p>R$ 800,00</p>
            
            </div>

            <!-- Produto 6 -->
            <div class="produto">
                <img src="imagens/colar-de-flor.jpg.png" alt="Colar de Flor">
                <h3>Anel Solitário</h3> 
                <p>R$ 11900,00</p>
               
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Potulski Joias. Todos os direitos reservados.</p>
    </footer>

    <script>
        function adicionarAoCarrinho(nome, preco) {
            let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
            carrinho.push({ nome, preco });
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
            window.location.href = "carinho.php"; // Redireciona para o carrinho
        }
    </script>

</body>
</html>
