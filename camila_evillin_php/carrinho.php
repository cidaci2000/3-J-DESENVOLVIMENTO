
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho - Almofadinhas</title>
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

    <div class="carrinho-container">
        <h1>Seu Carrinho</h1>
        <div id="lista-carrinho"></div>
        <p id="total">Total: R$ 0,00</p>
    </div>

    <script>
        function renderizarCarrinho() {
            const lista = document.getElementById('lista-carrinho');
            const totalElemento = document.getElementById('total');
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            lista.innerHTML = '';

            let total = 0;
            carrinho.forEach((item, index) => {
                total += item.preco;
                const div = document.createElement('div');
                div.className = 'produto';
                div.innerHTML = `
                    <span>${item.nome} - R$ ${item.preco.toFixed(2)}</span>
                    <button onclick="removerDoCarrinho(${index})">Remover</button>
                `;
                lista.appendChild(div);
            });

            totalElemento.textContent = `Total: R$ ${total.toFixed(2)}`;
        }

        function removerDoCarrinho(index) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho.splice(index, 1);
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            renderizarCarrinho();
        }

        document.addEventListener('DOMContentLoaded', renderizarCarrinho);
    </script>
</body>
</html>
