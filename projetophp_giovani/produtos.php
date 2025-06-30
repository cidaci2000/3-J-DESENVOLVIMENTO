<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampaio Cosméticos - Home</title>
    <link rel="shortcut icon" type="image" href="./libs/img/l2sc.png">
    <link rel="stylesheet" href="./libs/css/header.css">
    <link rel="stylesheet" href="./libs/css/style.css">
    <style>

        .limpar-filtro {
            background-color: transparent;
            border: none;
            color: #888;
            font-size: 14px;
            text-decoration: underline;
            cursor: pointer;
            margin-top: 10px;
        }

        .limpar-filtro:hover {
            color: #333;
        }

    </style>
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="./libs/img/logo2.jpg" alt="Logo Sampaio Cosméticos" class="logo-img">
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="produtos.php">Produtos</a>
            <a href="contato.php">Contato</a>
        </nav>
        <div class="dropdown">
            <a class="icone-login" href="login.php">
                <img src="./libs/img/login.jpeg" alt="Login" width="30" height="30">
            </a>
            <span class="arrow">&#9662;</span>
            <div class="dropdown-content">
                <a href="profile/cliente.php">Meu perfil </a>
                <a href="login.php">Login/Cadastro </a>
            </div>
        </div>
        <a class="icone" href="carrinho.php">
            <img src="./libs/img/carrinho.png" alt="Carrinho" width="30" height="30">
        </a>
    </header>
    
    <br><br>

    <!-- Filtro de Promoções -->
    <section class="promocoes">
        <h2 style="margin-bottom: 50px;" class="titulo-produto">Promoções Fecha mês</h2>
        <div class="secao-container">
            <!-- Filtro por Categoria -->
            <select class="secao" aria-label="Selecione uma categoria" id="categoriaFiltro" onchange="filtrarPromoções()">
                <option value="" disabled selected>Selecione uma categoria</option>
                <option value="maquiagem">Maquiagem</option>
                <option value="perfumes">Perfumes</option>
                <option value="cuidados">Cuidados com a pele</option>
                <option value="sem-promocao">Sem Promoção</option>
            </select>
            
            <!-- Barra de Pesquisa -->
            <div class="barra-pesquisa-container">
                <input type="text" class="barra-pesquisa" placeholder="Pesquisar..." id="searchInput" onkeyup="filtrarPromoções()">
            </div>
            <button onclick="limparFiltro()" class="limpar-filtro">Limpar Filtro</button>
        </div>
    </section>

    <div class="cards" id="cardsContainer">
        <!-- Produto 1 (Promoção) -->
        <div class="card-promocao" data-categoria="maquiagem">
            <a href="#">
                <img src="./libs/img/Base.jpg" alt="Base Líquida Make. B Mate Salicylic 30g">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Base Líquida Make. B Mate Salicylic 30g</h3>
                </a>
                <span class="preco-promocao">R$ 162,90</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 144,90</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 2 (Promoção) -->
        <div class="card-promocao" data-categoria="maquiagem">
            <a href="#">
                <img src="./libs/img/delineado.webp" alt="Delineador Líquido Guerlain Mad Eyes - 01 Preto">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Delineador Líquido Guerlain Mad Eyes - 01 Preto</h3>
                </a>
                <span class="preco-promocao">R$ 289,90</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 119,90</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 3 (Sem Promoção) -->
        <div class="card-promocao" data-categoria="maquiagem">
            <a href="#">
                <img src="./libs/img/base revlon.jpg" alt="Base Facial Revlon">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Base Facial Revlon</h3>
                </a>
                <p>Base de cobertura média para um acabamento perfeito.</p>
                <span>R$ 110,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 4 (Sem Promoção) -->
        <div class="card-promocao" data-categoria="sem-promocao">
            <a href="#">
                <img src="./libs/img/flor de lis.jpg" alt="Perfume Flor de Lis">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Perfume Flor de Lis</h3>
                </a>
                <p>Perfume suave e encantador.</p>
                <span>R$ 210,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 5 (Promoção) -->
        <div class="card-promocao" data-categoria="perfumes">
            <a href="#">
                <img src="./libs/img/chanel.jpg" alt="Chanel No.5 Perfume">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Chanel No.5</h3>
                </a>
                <span class="preco-promocao">R$ 1.100,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 900,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 6 (Sem Promoção) -->
        <div class="card-promocao" data-categoria="sem-promocao">
            <a href="#">
                <img src="./libs/img/mis dior clogne.jpg" alt="Miss Dior Cologne">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Miss Dior Cologne</h3>
                </a>
                <p>Fragrância sofisticada e elegante.</p>
                <span>R$ 250,00</span>
                <center><button>Veja sobre o Produto</button></center>
            </div>
        </div>

        <!-- Produto 7 (Promoção) -->
        <div class="card-promocao" data-categoria="cuidados">
            <a href="#">
                <img src="./libs/img/Óleo capilar.jpg" alt="Óleo Capilar Kérastase">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Óleo Capilar Kérastase</h3>
                </a>
                <span class="preco-promocao">R$ 450,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 350,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 8 (Promoção) -->
        <div class="card-promocao" data-categoria="cuidados">
            <a href="#">
                <img src="./libs/img/Creme nivia.jpg" alt="Creme Hidratante Nivea">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Creme Hidratante Nivea</h3>
                </a>
                <span class="preco-promocao">R$ 45,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 35,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 9 (Promoção) -->
        <div class="card-promocao" data-categoria="perfumes">
            <a href="#">
                <img src="./libs/img/La vie.jpg" alt="Perfume La Vie Est Belle">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Perfume La Vie Est Belle</h3>
                </a>
                <span class="preco-promocao">R$ 500,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 400,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 10 (Sem Promoção) -->
        <div class="card-promocao" data-categoria="cuidados">
            <a href="#">
                <img src="./libs/img/Creme anti idade.jpg" alt="Creme Anti-Idade L'Oréal">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Creme Anti-Idade L'Oréal</h3>
                </a>
                <p>Creme para rejuvenescimento da pele.</p>
                <span>R$ 120,00</span>
                <center><button>Veja sobre o Produto</button></center>
            </div>
        </div>

        <!-- Produto 11 (Promoção) -->
        <div class="card-promocao" data-categoria="maquiagem">
            <a href="#">
                <img src="./libs/img/Battom.jpg" alt="Batom Matte Maybelline">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Batom Matte Maybelline</h3>
                </a>
                <span class="preco-promocao">R$ 45,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 30,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

        <!-- Produto 12 (Promoção) -->
        <div class="card-promocao" data-categoria="perfumes">
            <a href="#">
                <img src="./libs/img/Eros Versace.jpg" alt="Perfume Versace Eros">
            </a>
            <div class="card-content">
                <a href="#">
                    <h3>Perfume Versace Eros</h3>
                </a>
                <span class="preco-promocao">R$ 600,00</span>
                <strong>por apenas</strong>
                <span class="preco">R$ 450,00</span>
                <center><button>Adicionar ao Carrinho</button></center>
            </div>
        </div>

    <script>
        // Função para filtrar os produtos
        function filtrarPromoções() {
            var categoria = document.getElementById("categoriaFiltro").value.toLowerCase();
            var searchInput = document.getElementById("searchInput").value.toLowerCase();
            var cards = document.querySelectorAll('.card-promocao');
            cards.forEach(function(card) {
                var cardCategoria = card.getAttribute("data-categoria").toLowerCase();
                var cardTitle = card.querySelector("h3").innerText.toLowerCase();
                if (
                    (categoria === "" || cardCategoria.includes(categoria)) &&
                    (cardTitle.includes(searchInput))
                ) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }

        // Função para limpar o filtro
        function limparFiltro() {
            document.getElementById("categoriaFiltro").value = "";
            document.getElementById("searchInput").value = "";
            filtrarPromoções();
        }
    </script>
</body>
</html>
