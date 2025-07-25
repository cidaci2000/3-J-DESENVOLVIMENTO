<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedCar Locadora - Nossos Veículos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="produtos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <a href="home.php" class="btn-nav">Home</a>
            <a href="login.php" class="btn-nav">Login</a>
            <a href="cadastro.php" class="btn-nav">Cadastro</a>
            <a href="contato.php" class="btn-nav">Contato</a>
            <a href="sobre.php" class="btn-nav">Quem Somos</a>
        </nav>
    </header>

    <!-- Conteúdo Principal - Produtos -->
    <main class="products-main">
        <section class="filters">
            <h2>Filtrar Veículos</h2>
            <div class="filter-group">
                <h3>Categoria</h3>
                <select>
                    <option value="all">Todos</option>
                    <option value="economico">Econômico</option>
                    <option value="intermediario">Intermediário</option>
                    <option value="luxo">Luxo</option>
                    <option value="suv">SUV</option>
                </select>
            </div>
            
            <div class="filter-group">
                <h3>Preço Diária</h3>
                <div class="price-range">
                    <input type="range" min="50" max="500" value="250" class="slider" id="priceRange">
                    <span id="priceValue">R$ 250</span>
                </div>
            </div>
            
            <div class="filter-group">
                <h3>Combustível</h3>
                <div class="checkbox-group">
                    <label><input type="checkbox" checked> Gasolina</label>
                    <label><input type="checkbox" checked> Álcool</label>
                    <label><input type="checkbox" checked> Flex</label>
                    <label><input type="checkbox" checked> Diesel</label>
                    <label><input type="checkbox" checked> Elétrico</label>
                </div>
            </div>
            
            <button class="btn-filter">Aplicar Filtros</button>
        </section>
        
        <section class="products-grid">
            <h2>Nossa Frota</h2>
            <div class="grid-container">
                <!-- Produto 1 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro1.webp" alt="Volkswagen Gol">
                        <span class="product-tag">Popular</span>
                    </div>
                    <div class="product-info">
                        <h3>Volkswagen Gol</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> Compacto</span>
                            <span><i class="fas fa-gas-pump"></i> Flex</span>
                            <span><i class="fas fa-users"></i> 5 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 120/dia</span>
                            <span class="week-price">R$ 700/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
                
                <!-- Produto 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro2.webp" alt="Chevrolet Onix">
                        <span class="product-tag">Economico</span>
                    </div>
                    <div class="product-info">
                        <h3>Chevrolet Onix</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> Hatch</span>
                            <span><i class="fas fa-gas-pump"></i> Flex</span>
                            <span><i class="fas fa-users"></i> 5 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 150/dia</span>
                            <span class="week-price">R$ 850/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
                
                <!-- Produto 3 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro3.webp" alt="Toyota Corolla">
                        <span class="product-tag">Intermediário</span>
                    </div>
                    <div class="product-info">
                        <h3>Toyota Corolla</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> Sedan</span>
                            <span><i class="fas fa-gas-pump"></i> Flex</span>
                            <span><i class="fas fa-users"></i> 5 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 220/dia</span>
                            <span class="week-price">R$ 1.200/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
                
                <!-- Produto 4 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro4.webp" alt="Jeep Compass">
                        <span class="product-tag">SUV</span>
                    </div>
                    <div class="product-info">
                        <h3>Jeep Compass</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> SUV</span>
                            <span><i class="fas fa-gas-pump"></i> Diesel</span>
                            <span><i class="fas fa-users"></i> 5 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 350/dia</span>
                            <span class="week-price">R$ 1.900/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
                
                <!-- Produto 5 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro2.webp" alt="BMW 320i">
                        <span class="product-tag">Luxo</span>
                    </div>
                    <div class="product-info">
                        <h3>BMW 320i</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> Sedan</span>
                            <span><i class="fas fa-gas-pump"></i> Gasolina</span>
                            <span><i class="fas fa-users"></i> 5 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 450/dia</span>
                            <span class="week-price">R$ 2.500/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
                
                <!-- Produto 6 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/carro3.webp" alt="Fiat Mobi">
                        <span class="product-tag">Econômico</span>
                    </div>
                    <div class="product-info">
                        <h3>Fiat Mobi</h3>
                        <div class="product-specs">
                            <span><i class="fas fa-car"></i> Compacto</span>
                            <span><i class="fas fa-gas-pump"></i> Flex</span>
                            <span><i class="fas fa-users"></i> 4 pessoas</span>
                        </div>
                        <div class="product-price">
                            <span class="daily-price">R$ 90/dia</span>
                            <span class="week-price">R$ 500/semana</span>
                        </div>
                        <button class="btn-rent">Alugar</button>
                    </div>
                </div>
            </div>
            
            <div class="pagination">
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <span>...</span>
                <button class="page-btn">5</button>
                <button class="next-btn">Próximo <i class="fas fa-chevron-right"></i></button>
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

    <script src="produtos.js"></script>
</body>
</html>