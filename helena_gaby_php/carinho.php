<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Carrinho - Potulski Joias</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    ul { list-style: none; padding: 0; }
    li { margin-bottom: 10px; }
  </style>
</head>
<body>
  <h1>Seu Carrinho</h1>
  <ul id="lista-carrinho"></ul>
  <script>
    const lista = document.getElementById("lista-carrinho");
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    if (carrinho.length === 0) {
      lista.innerHTML = "<li>Seu carrinho está vazio.</li>";
    } else {
      carrinho.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.nome} - R$ ${item.preco.toFixed(2)}`;
        lista.appendChild(li);
      });
    }
  </script>
</body>
</html>
