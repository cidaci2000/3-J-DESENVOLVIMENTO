
        
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Carrinho de Compras - Sampaio Cosméticos</title>
            <style>
       body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 15px;
            text-align: center;
            color: white;
            position: relative;
            margin-bottom: 20px;
        }

        .voltar {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .carrinho {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .carrinho h2 {
            text-align: center;
            color: #ab3188;
            margin-bottom: 20px;
        }

        .carrinho-itens {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .item {
            display: flex;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        .item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .item-info {
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .item-info h3 {
            color: #ab3188;
            margin: 0;
        }

        .item-info p {
            margin: 5px 0;
            color: #555;
        }

        .item-quantidade {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .item-quantidade input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }

        .quantidade-btn, .remover-btn, .aplicar-cupom, .finalizar-compra {
            background: #ab3188;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .quantidade-btn:hover, 
        .remover-btn:hover, 
        .aplicar-cupom:hover, 
        .finalizar-compra:hover {
            background: #a02d78;
            transform: scale(1.05);
        }

        .preco {
            font-weight: bold;
            color: #ab3188;
            margin-top: 10px;
        }

        .carrinho-resumo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cupom {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cupom input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .message {
            margin-top: 20px;
            color: #28a745;
            display: none;
            text-align: center;
        }
            </style>
        </head>
        <body>
        <header>
            <a href="produtos.php" class="voltar">⬅️ Voltar</a>
        </header>
        
        <main class="carrinho">
            <h2>Meu Carrinho</h2>
            <div class="carrinho-itens" id="cartItems"></div>
        
            <div class="cupom">
                <input type="text" placeholder="Digite seu cupom" id="couponCode">
                <button id="applyCoupon" class="aplicar-cupom">Aplicar Cupom</button>
                <div class="message" id="message">Cupom aplicado com sucesso!</div>
            </div>
        
            <div class="carrinho-resumo">
                <p><strong>Total:</strong> R$ <span id="totalPrice">0,00</span></p>
                <a href="pagamento2.php"><button class="finalizar-compra">Ir para o checkout</button></a>
            </div>
        </main>
        
        <script>
          window.onload = function() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemsContainer = document.getElementById('cartItems');
            let totalPrice = 0;
        
            cart.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('item');
                itemElement.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="item-info">
                        <h3>${item.name}</h3>
                        <p>Quantidade: ${item.quantity}</p>
                        <p class="preco">R$ ${(item.price * item.quantity).toFixed(2)}</p>
                        <button class="remover-btn" onclick="removeItem(${index})">Remover</button>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
                totalPrice += item.price * item.quantity;
            });
        
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        };
        
        function removeItem(index) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart)); // Atualiza o carrinho no localStorage
        
            // Atualiza a página
            window.location.reload();
        }
        
        document.getElementById("applyCoupon").addEventListener("click", function() {
            const message = document.getElementById("message");
            message.style.display = 'block';
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        });
        </script>
        </body>
        </html>
        