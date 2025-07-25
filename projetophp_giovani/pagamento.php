<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sampaio Cosméticos</title>
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

        .checkout {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .checkout h2 {
            text-align: center;
            color: #ab3188;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        .finalizar-pagamento {
            background: #ab3188;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s, transform 0.2s;
        }

        .finalizar-pagamento:hover {
            background: #a02d78;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <header>
        <a href="carrinho.php" class="voltar">⬅️ Voltar</a>
    </header>
    
    <main class="checkout">
        <h2>Detalhes de Envio</h2>
        <form id="checkoutForm">
            <div class="input-group">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="address">Endereço de Entrega</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="phone">Telefone</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <button type="submit" class="finalizar-pagamento">Finalizar Pagamento</button>
        </form>
    </main>

    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Checkout realizado com sucesso!');
            window.location.href = "pagamento.php";
        });
    </script>
</body>
</html>
