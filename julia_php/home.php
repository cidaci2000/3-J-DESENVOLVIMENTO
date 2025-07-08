<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LivPap - Sua Livraria Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4a6572;
            --secondary: #f9aa33;
            --accent: #344955;
            --light: #f5f7fa;
            --dark: #232f34;
            --text: #333333;
            --gray: #e0e0e0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text);
            line-height: 1.6;
        }
        
        /* Cabeçalho */
        .cabecalho {
            background: linear-gradient(135deg, var(--accent) 0%, var(--dark) 100%);
            color: white;
            padding: 1rem 5%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .cabecalho-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo i {
            font-size: 2.2rem;
            color: var(--secondary);
        }
        
        .logo h1 {
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .menu {
            display: flex;
            gap: 1.8rem;
        }
        
        .menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .menu a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .menu a i {
            font-size: 1.1rem;
        }
        
        /* Banner Hero */
        .hero {
            background: linear-gradient(rgba(35, 47, 52, 0.85), rgba(35, 47, 52, 0.9)), url('https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 5rem 2rem;
            margin-bottom: 3rem;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        .search-container input {
            width: 100%;
            padding: 1rem 1.5rem;
            padding-left: 3.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .search-container i {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        /* Conteúdo Principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--secondary);
        }
        
        .section-title h3 {
            font-size: 1.8rem;
            color: var(--dark);
        }
        
        .view-all {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .view-all:hover {
            color: var(--accent);
            transform: translateX(5px);
        }
        
        .view-all i {
            margin-left: 5px;
        }
        
        /* Grid de Produtos */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .produto {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        
        .produto:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .produto-img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
            border-bottom: 1px solid var(--gray);
        }
        
        .produto-info {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .produto h2 {
            font-size: 1.4rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .produto-category {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.8rem;
        }
        
        .produto-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--accent);
            margin-top: auto;
            padding-top: 1rem;
        }
        
        .produto-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 1.2rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: var(--secondary);
            color: var(--dark);
        }
        
        .btn-primary:hover {
            background: #e89b1f;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: var(--light);
            color: var(--primary);
            border: 1px solid var(--gray);
        }
        
        .btn-secondary:hover {
            background: #e8e8e8;
        }
        
        .sale-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary);
            color: var(--dark);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }
        
        /* Rodapé */
        .rodape {
            background: var(--dark);
            color: white;
            padding: 4rem 0 0;
            margin-top: 3rem;
        }
        
        .rodape-conteudo {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 3rem;
        }
        
        .rodape-coluna h4 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .rodape-coluna h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }
        
        .rodape-coluna p {
            margin-bottom: 1.2rem;
            opacity: 0.8;
        }
        
        .rodape-coluna ul {
            list-style: none;
        }
        
        .rodape-coluna ul li {
            margin-bottom: 0.8rem;
        }
        
        .rodape-coluna a {
            color: white;
            text-decoration: none;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .rodape-coluna a:hover {
            opacity: 1;
            color: var(--secondary);
            padding-left: 5px;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }
        
        .rodape-copy {
            text-align: center;
            padding: 1.5rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
        }
        
        /* Responsividade */
        @media (max-width: 992px) {
            .hero h2 {
                font-size: 2.3rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            .cabecalho-container {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .menu {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero {
                padding: 3rem 1.5rem;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .menu a span {
                display: none;
            }
            
            .menu a i {
                font-size: 1.3rem;
            }
            
            .hero h2 {
                font-size: 1.7rem;
            }
            
            .section-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .view-all {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header class="cabecalho">
        <div class="cabecalho-container">
            <div class="logo">
                <i class="fas fa-book-open"></i>
                <h1>LivPap</h1>
            </div>
            <nav class="menu">
                <a href="#"><i class="fas fa-home"></i> <span>Home</span></a>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> <span>Login</span></a>
                <a href="cadastro.php"><i class="fas fa-user-plus"></i> <span>Cadastro</span></a>
                <a href="admin.php"><i class="fas fa-user-cog"></i> <span>Admin</span></a>
            </nav>
        </div>
    </header>

    <!-- Banner Hero -->
    <section class="hero">
        <div class="hero-content">
            <h2>Descubra um mundo de histórias</h2>
            <p>Encontre os melhores livros, best-sellers e clássicos em nossa livraria online com entrega rápida para todo o país.</p>
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Busque por título, autor ou categoria...">
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main class="container">
        <div class="section-title">
            <h3>Livros em Destaque</h3>
            <a href="#" class="view-all">Ver todos <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="grid-container">
            <div class="produto">
                <span class="sale-badge">-20%</span>
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro1" class="produto-img">
                <div class="produto-info">
                    <h2>O Homem de Giz</h2>
                    <div class="produto-category">Suspense • Mistério</div>
                    <div class="produto-price">R$ 49,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <img src="https://images.unsplash.com/photo-1629992101753-56d196c8aabb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro2" class="produto-img">
                <div class="produto-info">
                    <h2>A Biblioteca da Meia-Noite</h2>
                    <div class="produto-category">Ficção • Fantasia</div>
                    <div class="produto-price">R$ 59,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <span class="sale-badge">LANÇAMENTO</span>
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro3" class="produto-img">
                <div class="produto-info">
                    <h2>1984</h2>
                    <div class="produto-category">Ficção Distópica • Clássico</div>
                    <div class="produto-price">R$ 39,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro4" class="produto-img">
                <div class="produto-info">
                    <h2>O Pequeno Príncipe</h2>
                    <div class="produto-category">Infantil • Filosofia</div>
                    <div class="produto-price">R$ 34,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <img src="https://images.unsplash.com/photo-1531346878377-a5be20888e57?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro5" class="produto-img">
                <div class="produto-info">
                    <h2>O Senhor dos Anéis</h2>
                    <div class="produto-category">Fantasia • Aventura</div>
                    <div class="produto-price">R$ 89,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <span class="sale-badge">BESTSELLER</span>
                <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro6" class="produto-img">
                <div class="produto-info">
                    <h2>Orgulho e Preconceito</h2>
                    <div class="produto-category">Romance • Clássico</div>
                    <div class="produto-price">R$ 45,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <img src="https://images.unsplash.com/photo-1588666309990-d68f08e3d4a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro7" class="produto-img">
                <div class="produto-info">
                    <h2>Harry Potter e a Pedra Filosofal</h2>
                    <div class="produto-category">Fantasia • Infanto-juvenil</div>
                    <div class="produto-price">R$ 49,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="produto">
                <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="livro8" class="produto-img">
                <div class="produto-info">
                    <h2>Crime e Castigo</h2>
                    <div class="produto-category">Literatura • Clássico</div>
                    <div class="produto-price">R$ 47,90</div>
                    <div class="produto-actions">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="rodape">
        <div class="rodape-conteudo">
            <div class="rodape-coluna">
                <h4>Sobre a Livpap</h4>
                <p>Somos uma livraria apaixonada por literatura, oferecendo os melhores títulos desde 2010. Nossa missão é conectar leitores com histórias que transformam vidas.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            
            <div class="rodape-coluna">
                <h4>Links Úteis</h4>
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Livros mais vendidos</a></li>
                    <li><a href="#">Lançamentos</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Autores em destaque</a></li>
                </ul>
            </div>
            
            <div class="rodape-coluna">
                <h4>Categorias</h4>
                <ul>
                    <li><a href="#">Literatura Brasileira</a></li>
                    <li><a href="#">Ficção Científica</a></li>
                    <li><a href="#">Romance</a></li>
                    <li><a href="#">Fantasia</a></li>
                    <li><a href="#">Autoajuda</a></li>
                </ul>
            </div>
            
            <div class="rodape-coluna">
                <h4>Contato</h4>
                <p><i class="fas fa-map-marker-alt"></i> Av. Brasil, 1000 - Cascavel, Pr</p>
                <p><i class="fas fa-phone"></i> (45) 4002-8922</p>
                <p><i class="fas fa-envelope"></i> contato@julia.com.br</p>
                <p><i class="fas fa-clock"></i> Seg-Sex: 9h-18h | Sáb: 10h-16h</p>
            </div>
        </div>
        
        <div class="rodape-copy">
            &copy; 2025 LivPap Livraria. Todos os direitos reservados.
        </div>
    </footer>
</body>
</html>