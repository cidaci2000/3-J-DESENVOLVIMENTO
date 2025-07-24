<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Potulski Joias</title>
    
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header id="inicio">
            <div class="header-content">
                <h1>Potulski Joias</h1>
                <div id="menu">
                    <a class="link" href="home.php" id="atual">Início</a>
                    <a href="produtos.php">Produtos</a>
                    <a href="marcas.php">Marcas</a>
                    <a href="login.php">Login</a>
                    <a href="carinho.php">Carrinho</a>
                </div>
            </div>
        </header>

        <!-- Banner -->
        <section class="banner">
            <div class="carrossel-container">
        <h2>Filamentos de PLA</h2>
        
        <div class="carrossel">
            <button class="carrossel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
            
            <div class="carrossel-inner">
                <!-- Card 1 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-de-ouro.jpg" alt="Imagem 1">
                    <h3>PLA 1</h3>
                    <p>Azul</p>
                </div>
                
                <!-- Card 2 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-coracao.jpg" alt="Imagem 2">
                    <h3>PLA 2</h3>
                    <p>Vários</p>
                </div>
                
                <!-- Card 3 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-diamante.jpg" alt="Imagem 3">
                    <h3>PLA 3</h3>
                    <p>Cinza</p>
                </div>
                
                <!-- Card 4 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-pedra-rosa.jpg" alt="Imagem 4">
                    <h3>PLA 4</h3>
                    <p>Verde</p>
                </div>
                
                <!-- Card 5 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-vintage.jpg" alt="Imagem 5">
                    <h3>PLA 5</h3>
                    <p>Rosa.</p>
                </div>
                
                <!-- Card 6 -->
                <div class="carrossel-card">
                    <img src="imagens/anel-ourorose.jpg" alt="Imagem 6">
                    <h3>PLA 6</h3>
                    <p>Azul </p>
                </div>
            </div>
            
            <button class="carrossel-btn next" onclick="moveSlide(1)">&#10095;</button>
        </div>
        
        <div class="carrossel-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
        </div>
    </div>
   

    <script src="script.js"></script>
        </section>

        <!-- Filtros de pesquisa -->
        <aside class="filters">
            <h3>Filtros de Pesquisa</h3>
            <form id="filtro-form">
                <label for="tipo">Tipo de Joia:</label>
                <select id="tipo">
                    <option value="">Selecione</option>
                    <option value="anel">Anel</option>
                    <option value="brinco">Brinco</option>
                    <option value="pulseira">Pulseira</option>
                    <option value="colar">Colar</option>
                </select>
            </form>
        </aside>

        <!-- Seção de produtos -->
        <section id="produtos">
            <h2>Anéis</h2>
            <div class="produto-grade">
                <div class="produto">
                    <img src="https://images.unsplash.com/photo-1602173574767-37ac01994b2a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Anel Envelhecido de Prata">
                    <div class="produto-content">
                        <h3>Anel de Ouro</h3>
                        <p>R$ 1.500,00</p>
                        <a href="produtos.php" class="button">Ver Mais</a>
                    </div>
                </div>
                <div class="produto">
                    <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Anel com Safira Rosa">
                    <div class="produto-content">
                        <h3>Anel com Safira Rosa</h3>
                        <p>R$ 200,00</p>
                        <a href="produtos.php" class="button">Ver Mais</a>
                    </div>
                </div>
                <div class="produto">
                    <img src="imagens/anel-de-prata-ametista.jpg" alt="Anel com Ametista">
                    <div class="produto-content">
                        <h3>Anel Prata com Ametista</h3>
                        <p>R$ 5.000,00</p>
                        <a href="produtos.php" class="button">Ver Mais</a>
                    </div>
                </div>
            </div>
            
            <h2>Outras Joias</h2>
            <div class="produto-grade">
                <div class="produto">
                    <img src="https://images.unsplash.com/photo-1617117811969-97f441511dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Pulseira de Ouro">
                    <div class="produto-content">
                        <h3>Pulseira de Ouro</h3>
                        <p>R$ 800,00</p>
                        <a href="produtos.php" class="button">Ver Mais</a>
                    </div>
                </div>
                <div class="produto">
                    <img src="https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Brincos com safira rosa">
                    <div class="produto-content">
                        <h3>Brincos com Safira Rosa</h3>
                        <p>R$ 6.300,00</p>
                        <a href="produtos.php" class="button">Ver Mais</a>
                    </div>
                </div>
                <div class="produto">
                    <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Anel Solitário de Diamante">
                    <div class="produto-content">
                        <h3>Anel Solitário de Diamante</h3>
                        <p>R$ 11.900,00</p>
                        <a href="#" class="button">Ver Mais</a>
                    </div>
                </div>
            </div>
        </section>
    

        <!-- Botão Voltar -->
        <div class="voltar">
            <a href="#inicio" class="button">Voltar ao Início</a>
        </div>
    </div>
      <!--
        <section id="fidelidade">
            <div class="programa-fidelidade">
                <h2>Programa de Fidelidade Potulski Joias</h2>
                <p>Acumule pontos a cada compra e troque por descontos exclusivos em nossas joias!</p>

                <div id="status-fidelidade">
                    <p><strong>Você possui <span id="pontos">150</span> pontos.</strong></p>
                    <p>Com seus pontos, você pode obter os seguintes descontos:</p>
                    <ul>
                        <li>500 pontos: 10% de desconto em qualquer compra.</li>
                        <li>1000 pontos: 20% de desconto em qualquer compra.</li>
                        <li>1500 pontos: 30% de desconto em qualquer compra.</li>
                    </ul>
                    <button class="button" id="verificar-desconto">Verificar Desconto</button>
                </div>

                <div id="form-desconto">
                    <h3>Tem um Código de Desconto?</h3>
                    <label for="codigo-desconto">Digite o código de desconto:</label>
                    <input type="text" id="codigo-desconto" placeholder="Código de Desconto">
                    <button class="button" onclick="aplicarDesconto()">Aplicar Desconto</button>
                </div>
            </div>
        </section>
 -->
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Potulski Joias. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Função para o programa de fidelidade
        document.getElementById('verificar-desconto').addEventListener('click', function() {
            const pontos = parseInt(document.getElementById('pontos').textContent);
            let desconto = 0;
            
            if (pontos >= 1500) desconto = 30;
            else if (pontos >= 1000) desconto = 20;
            else if (pontos >= 500) desconto = 10;
            
            if (desconto > 0) {
                alert(`Parabéns! Você tem direito a ${desconto}% de desconto em sua próxima compra.`);
            } else {
                alert(`Continue acumulando pontos! Você precisa de 500 pontos para obter seu primeiro desconto.`);
            }
        });
        
        function aplicarDesconto() {
            const codigo = document.getElementById('codigo-desconto').value;
            if (codigo) {
                alert(`Código "${codigo}" aplicado com sucesso! Desconto de 15% concedido.`);
            } else {
                alert('Por favor, insira um código de desconto válido.');
            }
        }
    </script>
</body>
</html>