<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampaio Cosméticos - Home</title>
    <link rel="shortcut icon" type="image" href="./libs/img/l2sc.png">
    <link rel="stylesheet" href="./libs/css/header.css">
    <link rel="stylesheet" href="./libs/css/carrossel.css">
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
        </div>
    </header>
    <br><br>
  <!-- CARROSSEL -->
    <div class="content">
        <div class="slides">
            <input type="radio" name="radio" id="slide1" checked>
            <input type="radio" name="radio" id="slide2">
            <input type="radio" name="radio" id="slide3">
            <input type="radio" name="radio" id="slide4">
            <input type="radio" name="radio" id="slide5">
    
            <div class="slide s1">
                <img src="./libs/img/img1.jpg" alt="slide1">
            </div>
            <div class="slide">
                <img src="./libs/img/img2.jpg" alt="slide2">
            </div>
            <div class="slide">
                <img src="./libs/img/img3.png" alt="slide3">
            </div>
            <div class="slide">
                <img src="./libs/img/img4.jpg" alt="slide4">
            </div>
        </div>
        <div class="navigation">
            <label class="bar" for="slide1"></label>
            <label class="bar" for="slide2"></label>
            <label class="bar" for="slide3"></label>
            <label class="bar" for="slide4"></label>
        </div>
    </div>
<br>
<hr>
<hr>
<div class="frete">
    🚚 Frete Grátis em todo o Brasil | 🛍️ Promoções a partir de R$200 | 🎉 Cupons exclusivos para clientes antigos!
</div>

<section class="lancamentos">
    <h2>Em Breve</h2>
    <div class="cards">
        <div class="card">
            <img src="./libs/img/produto1.webp" alt="Skin Care">
            <div class="card-content">
                <h3>Skin Care</h3>
                <p>Kit skin care clareador antimanchas facial e corporal.</p>
            </div>
        </div>
        <div class="card">
            <img src="./libs/img/produto2.webp" alt="Maquiagem">
            <div class="card-content">
                <h3>Maquiagem</h3>
                <p>Kit Maquiagem Melu by Ruby Rose com Base Pó Iluminador Máscara para Cílios.</p>
            </div>
        </div>
        <div class="card">
            <img src="./libs/img/produto3.webp" alt="Perfumes">
            <div class="card-content">
                <h3>Perfumes</h3>
                <p>Deo Parfum Ilía Secreto 50 Ml.</p>
            </div>
        </div>
    </div>
</section>

<section class="depoimentos">
    <h2>O que nossos clientes dizem</h2>
    <div class="depoimentos-list">
        <div class="depoimento">
            <p>"Adorei os produtos! A qualidade é incrível e o atendimento foi excelente!"</p>
            <p><strong>Maria Silva</strong></p>
        </div>
        <div class="depoimento">
            <p>"Frete rápido e produtos de ótima qualidade. Com certeza voltarei a comprar!"</p>
            <p><strong>João Pereira</strong></p>
        </div>
        <div class="depoimento">
            <p>"Os cupons de desconto são uma ótima vantagem. Recomendo a todos!"</p>
            <p><strong>Ana Costa</strong></p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2025 Sampaio Cosméticos - Todos os direitos reservados.</p>
    <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.twitter.com" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </div>
</footer>

<script>
    let currentSlide = 1;
    const totalSlides = 5;

    function changeSlide() {
        document.getElementById('slide' + currentSlide).checked = false;
        currentSlide = (currentSlide % totalSlides) + 1;
        document.getElementById('slide' + currentSlide).checked = true;
    }
    setInterval(changeSlide, 5000);
</script>
</body>
</html>