<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produto - Sebastião Pequena Sereia</title>
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
            <img src="sebastiao.jpeg" alt="Sebastião Pequena Sereia">
        </div>
        <div class="produto-detalhes">
            <h1>Sebastião Pequena Sereia</h1>
            <p><strong>Preço:</strong> R$40,55</p>
            <p><strong>Descrição:</strong> Almofada do caranguejo amigo da Ariel! Colorida e divertida, 35cm.</p>
            <p><strong>Material:</strong> Poliéster premium</p>
            <p><strong>Altura:</strong> 40 cm</p>
            <p><strong>Fabricante:</strong> Almofadinhas Ltda.</p>
            <button class="botao-compra" onclick="adicionarAoCarrinho('Sebastião Pequena Sereia', 40.55)">Adicionar ao carrinho</button>
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
