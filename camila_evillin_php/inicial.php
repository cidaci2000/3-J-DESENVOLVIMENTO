<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almofadinhas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="cabecalho">
        <img src="morango.png" alt="Morango"> Almofadinhas
    </div>
    
<div id="sss">
    <a href="inicial.php">HOME</a>
    <a href="index2.php">LOGIN</a>
    <a href="carrinho.php">CARRINHO</a>
    <a href="sobrenos.php">SOBRE</a>
</div>

<div id="inicial">

    <div id="carrossell">

<div id="slider" >
    <figure>
       <img src="gatenhos2.jpg" id="imgscrr" itemid="imgg">
       <img src="fnaf.jpg" id="imgscrr">
       <img src="leao.jpg" id="imgscrr">
       <img src="ursinhos.jpg" id="imgscrr">
       <img src="leao.jpg" id="imgscrr">
   </figure>
 </div>
         
</div>
</div>
<br><br><br>
    <div class="vitrine">
        <div class="card">
            <img src="images.jpeg" alt="Tico e Teco">
            <div class="card-body">
                <h3>Tico e Teco</h3>
                <p>R$799,99</p>
                <a href="produto.php">Veja mais</a><br><br>
                <aa button onclick="adicionarAoCarrinho('Tico e Teco', 799.99)">Adicionar ao carrinho</button>
            </div>
        </div>

        <div class="card">
            <img src="capeta.jpg" alt="Urso roxo Toy Story" >
            <div class="card-body">
                <h3>Urso roxo Toy Story</h3>
                <p>R$72,00</p>
                <a href="urso_roxo_toy_story.php">Veja mais</a><br><br>
                <aa button onclick="adicionarAoCarrinho('Urso Roxo Toy Story',72.00)">Adicionar ao carrinho</button>
            </div>
        </div>

        <div class="card">
            <img src="babyyellow.jpeg" alt="Baby Yellow">
            <div class="card-body">
                <h3>Baby Yellow</h3>
                <p>R$50,00</p>
                <a href="baby_yellow.php">Veja mais</a><br><br>
                <aa button onclick="adicionarAoCarrinho('Baby Yellow', 50.00)">Adicionar ao carrinho</button>
            </div>
        </div>

 <div class="card">
            <img src="kitty.jpeg" alt="Hello Kitty">
            <div class="card-body">
                <h3>Hello Kitty</h3>
                <p>R$50,99</p>
                <a href="hello_kitty.php">Veja mais</a>
                <br><br>
                <aa button onclick="adicionarAoCarrinho('Hello Kitty', 50.99)">Adicionar ao carrinho</button>
            </div>
        </div>
 <div class="card">
            <img src="sebastiao.jpeg" alt="Baby Yellow">
            <div class="card-body">
                <h3>Sebastião Pequena Sereia</h3>
                <p>R$40,55</p>
                <a href="sebastião_pequena_sereia.php">Veja mais</a>
                <br><br>
                <aa button onclick="adicionarAoCarrinho('Sebastião Pequena Sereia', 40.55)">Adicionar ao carrinho</button>
            </div>
        </div>

       <div class="card">
            <img src="porquinho.jpeg" alt="Puá">
            <div class="card-body">
                <h3>Puá Moana</h3>
                <p>R$40,00</p>
                <a href="puá_porquinho_da_moana.php">Veja mais</a>
                <br><br>
                <aa button onclick="adicionarAoCarrinho('Puá Porquinho da Moana', 40.00)">Adicionar ao carrinho</button>
            </div>
        </div>
       <div class="card">
            <img src="io.jpeg" alt="Ió">
            <div class="card-body">
                <h3>Ió Ursinho Pooh</h3>
                <p>R$59,99</p>
                <a href="ió_ursinho_pooh.php">Veja mais</a>                <br><br>
                <aa button onclick="adicionarAoCarrinho('Ió ursinho pooh', 59.99)">Adicionar ao carrinho</button>
            </div>
        </div>
       <div class="card">
            <img src="pooh.jpeg" alt="ursinho pooh">
            <div class="card-body">
                <h3>Ursinho Pooh</h3>
                <p>R$60,50</p>
                <a href="ursinho_pooh.php">Veja mais</a>                <br><br>
                <aa button onclick="adicionarAoCarrinho('Ursinho Pooh', 60.50)">Adicionar ao carrinho</button>

            </div>
        </div>
       <div class="card">
            <img src="Sem título.jpeg" alt="Tom & Jerry">
            <div class="card-body">
                <h3>Tom & Jerry</h3>
                <p>R$100,99</p>
                <a href="tom_e_jerry.php">Veja mais</a>                <br><br>
                <aa button onclick="adicionarAoCarrinho('Tom & Jerry', 799.99)">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>
</div>
<br><br>
</div>
<div id="rodape">
    <footer>
        <p>&copy; Almofadinhas. 2025 - Todos os direitos reservados</p>
        <p>Obrigado por visitar o nosso site ^^</p>

        <div id="spacing">
        <a href="#"><img src="wpp.png" id="wpp"></a> <a href="#"><img src="inst.png" id="wpp"></a>
    </div>
    </footer>
</div>
<script>
    function adicionarAoCarrinho(nome, preco) {
      let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
      carrinho.push({ nome, preco });
      localStorage.setItem('carrinho', JSON.stringify(carrinho));
      alert(`${nome} foi adicionado ao carrinho!`);
    }
  </script>
</body>
</html>
