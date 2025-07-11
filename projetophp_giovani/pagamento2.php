<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Pagamento</title>
    <link rel="stylesheet" href="./libs/css/style.css">
</head>
<body>
    <div class="cabecalho-pagamento">
        <a href="carrinho.php" class="voltar">⬅️ Voltar</a>
    </div>
    <div class="container-pagamento">
        <form method="post">
            <label>Escolha um método de pagamento:</label>
            <div class="opcoes-pagamento">
                <input type="radio" name="radio1" id="mercadopago" required>
                <label for="mercadopago"><img src="./libs/img/OIP.jpeg" alt="Mercado Pago"></label>

                <input type="radio" name="radio1" id="pix" required>
                <label for="pix"><img src="./libs/img/pix.png" alt="Pix"></label>

                <input type="radio" name="radio1" id="picpay" required>
                <label for="picpay"><img src="./libs/img/picpay.webp" alt="PicPay"></label>
            </div>
            <button type="submit">Finalizar compra</button>
        </form>
    </div>
</body>
</html>
