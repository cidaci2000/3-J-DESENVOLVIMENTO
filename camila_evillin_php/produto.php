<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produto - Tico e Teco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="cabecalho">
        <img src="morango.png" alt="Morango"> Almofadinhas
    </div>

    <div id="sss">
        <a href="inicial.php">HOME</a>
        <a href="carrinho.php">CARRINHO</a>
    </div>

    <div class="produto-container">
        <div class="produto-img">
            <img src="images.jpeg" alt="Tico e Teco">
        </div>
        <div class="produto-detalhes">
            <h1>Tico e Teco</h1>
            <p><strong>Preço:</strong> R$799,99</p>
            <p><strong>Descrição:</strong> Almofada exclusiva dos esquilos mais travessos da Disney! Feita com tecido antialérgico, 45x45cm, enchimento super macio.</p>
            <p><strong>Material:</strong> Poliéster premium</p>
            <p><strong>Altura:</strong> 45 cm</p>
            <p><strong>Fabricante:</strong> Almofadinhas Ltda.</p>
            <button class="botao-compra" onclick="adicionarAoCarrinho('Tico e Teco', 799.99)">Adicionar ao carrinho</button>
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
