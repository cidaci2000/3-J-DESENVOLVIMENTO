<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCosmeticos - Dashboard</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="../libs/img/logo2.jpg" alt="Logo Sampaio Cosméticos" class="logo-img">
        </div>
        <h1>SCosmeticos</h1>
        <ul>
            <li><a href="produtosgerenciar.php">Gerenciar Produtos</a></li>
            <li><a href="clientesgerenciar.php">Gerenciar Clientes</a></li>
            <li><a href="pedidosgerenciar.php">Gerenciar Pedidos</a></li>
            <li><a href="Cancelar.php">Cancelar Compras</a></li>
            <li><a href="vendas.php">Total de Vendas</a></li>
            <li><a href="../login.php">Logout</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="dashboard-cards">
            <div class="card">
                <h3>Produtos Gerenciados</h3>
                <p>150</p>
            </div>
            <div class="card">
                <h3>Clientes Cadastrados</h3>
                <p>320</p>
            </div>
            <div class="card">
                <h3>Pedidos Pendentes</h3>
                <p>5</p>
            </div>
        </div>

        <div class="chart-section">
            <h3>Gráfico de Vendas Mensais</h3>
            <div style="background-color: #ddd; height: 200px; border-radius: 8px;">
                <p style="text-align: center; padding-top: 80px;">Gráfico de vendas será exibido aqui</p>
            </div>
        </div>

        <div class="vendas-section">
            <h3>Total de Vendas por Mês</h3>
            <table id="tabela-vendas">
                <thead>
                    <tr>
                        <th>Mês</th>
                        <th>Total de Vendas (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas de vendas mensais serão inseridas aqui com JS -->
                </tbody>
            </table>
            <button onclick="adicionarVenda()">Adicionar Venda</button>
        </div>
    </div>

    <script>
    
let vendasMensais = {
    "Janeiro": 1000,
    "Fevereiro": 20000,
    "Março": 15000,
    "Abril": 8000,
    "Maio": 12000,
    "Junho": 5000
};

// Função para carregar os dados na tabela
function carregarTabela() {
    const tabela = document.getElementById("tabela-vendas").getElementsByTagName("tbody")[0];

    // Limpa a tabela antes de adicionar os dados
    tabela.innerHTML = "";

    // Adiciona os dados dos meses na tabela
    for (const mes in vendasMensais) {
        const novaLinha = tabela.insertRow();
        const celulaMes = novaLinha.insertCell(0);
        const celulaValor = novaLinha.insertCell(1);

        celulaMes.textContent = mes;
        celulaValor.textContent = `R$ ${vendasMensais[mes].toLocaleString('pt-BR')}`;
    }
}

// Função para adicionar uma nova venda (exemplo)
function adicionarVenda() {
    const mes = prompt("Digite o mês:");
    const valor = parseFloat(prompt("Digite o total de vendas para o mês (em R$):"));

    if (mes && !isNaN(valor)) {
        vendasMensais[mes] = valor;
        carregarTabela();
    } else {
        alert("Dados inválidos! Tente novamente.");
    }
}
window.onload = carregarTabela;

    </script>
</body>
</html>
