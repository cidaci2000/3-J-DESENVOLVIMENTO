<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produto - Ió Ursinho Pooh</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .produto-container {
            display: flex;
            flex-wrap: wrap;
            background-color: rgb(222, 237, 255);
            padding: 30px;
            margin: 50px auto;
            border-radius: 20px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .produto-img { flex: 1; text-align: center; }
        .produto-img img { width: 100%; max-width: 400px; border-radius: 10px; }
        .produto-detalhes { flex: 1; padding: 20px; }
        .produto-detalhes h1 { font-size: 2em; margin-bottom: 10px; }
        .produto-detalhes p { font-size: 1.2em; margin: 10px 0; }
        .botao-compra {
            background-color: rgb(127, 159, 201);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 10px;
            font-size: 1em;
            cursor: pointer;
        }
        .botao-compra:hover { background-color: rgb(166, 196, 231); }
    </style>
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

    <div class="produto-container">
        <div class="produto-img">
            <img src="io.jpeg" alt="Ió Ursinho Pooh">
        </div>
        <div class="produto-detalhes">
            <h1>Ió Ursinho Pooh</h1>
            <p><strong>Preço:</strong> R$59,99</p>
            <p><strong>Descrição:</strong> O burrinho mais triste e fofo! Almofada do Ió, com enchimento confortável, 40cm.</p>
            <p><strong>Material:</strong> Poliéster premium</p>
            <p><strong>Altura:</strong> 40 cm</p>
            <p><strong>Fabricante:</strong> Almofadinhas Ltda.</p>
            <button class="botao-compra" onclick="adicionarAoCarrinho('Ió Ursinho Pooh', 59.99)">Adicionar ao carrinho</button>
        </div>
    </div>

    <div id="rodape">
        <footer>
            <p>&copy; Almofadinhas. Todos os direitos reservados</p>
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
