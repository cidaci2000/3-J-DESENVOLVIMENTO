<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <header>
        <a href="index.php" class="voltar">⬅️ Voltar</a>
    </header>
    <div class="produtos">
        <h2 class="titulo">Produtos</h2>
        <section class="vitrine" id="productSection">
        </section>
    
        <section class="promocao">
            <h2 class="titulo">Promoções</h2>
            <div class="vitrine" id="promotionSection">
            </div>
        </section>
    </div>

    <script>
        const products = [
            { id: 1, name: 'Miss Dior Cologne', image: '../libs/img/Miss Dior Perfume.webp' },
            { id: 2, name: 'Obsessed Desodorante', image: '../libs/img/wepink.png' },
            { id: 3, name: 'Coffee Woman Lucky Desodorante Colônia 100ml', image: '../libs/img/oboticaro.jpg' }
        ];

        const promotions = [
            { id: 4, name: 'Base Líquida Make. B Mate Salicylic 30g', image: '../libs/img/promocao1.webp' },
            { id: 5, name: 'Delineador Líquido Guerlain Mad Eyes - 01 Preto', image: '../libs/img/delineado.webp' },
            { id: 6, name: 'Kit De Pincel Com 12 Pincéis Maquiagem Macrilan', image: '../libs/img/pincel.webp' }
        ];

        function displayProducts() {
            const productSection = document.getElementById('productSection');
            const promotionSection = document.getElementById('promotionSection');
            productSection.innerHTML = '';
            promotionSection.innerHTML = '';

            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.classList.add('card', 'produto');
                productCard.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h2 class="produto-nome">${product.name}</h2>
                    <button class="delete-button" data-id="${product.id}" onclick="deleteProduct(${product.id})">Excluir</button>
                `;
                productSection.appendChild(productCard);
            });

            promotions.forEach(promotion => {
                const promotionCard = document.createElement('div');
                promotionCard.classList.add('card', 'produto');
                promotionCard.innerHTML = `
                    <img src="${promotion.image}" alt="${promotion.name}">
                    <h2 class="produto-nome"><a href="promocao.html">${promotion.name}</a></h2>
                    <button class="delete-button" data-id="${promotion.id}" onclick="deleteProduct(${promotion.id})">Excluir</button>
                `;
                promotionSection.appendChild(promotionCard);
            });
        }

        function deleteProduct(id) {
            const productIndex = products.findIndex(product => product.id === id);
            if (productIndex !== -1) {
                products.splice(productIndex, 1);
            }

            const promotionIndex = promotions.findIndex(promotion => promotion.id === id);
            if (promotionIndex !== -1) {
                promotions.splice(promotionIndex, 1);
            }

            displayProducts();
        }

        displayProducts();
    </script>
</body>
</html>
