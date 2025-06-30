<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body class="corpoproduto">
    <header>
        <a href="index.php" style="cursor: pointer;" class="voltar">⬅️ Voltar</a>
    </header>

    <div class="dashboard-cards">
        <div class="card" onclick="showForm('edit')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.206 2.794a1 1 0 0 1 1.414 0l5.586 5.586a1 1 0 0 1 0 1.414l-8.793 8.792a1 1 0 0 1-.528.247l-2.32.775a1 1 0 0 1-1.276-1.277l.775-2.32a1 1 0 0 1 .246-.527L14.206 2.794zM3 12a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1z"/></svg>
            <h4>Edição de Produto</h4>
        </div> 

        <div class="card" onclick="showForm('promo')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a1 1 0 0 1 1 1v8h8a1 1 0 0 1 0 2h-8v8a1 1 0 0 1-2 0v-8H2a1 1 0 0 1 0-2h8V3a1 1 0 0 1 1-1z"/></svg>
            <h4>Cadastro de Promoção</h4>
        </div>  

        <div class="card" onclick="showForm('add')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a1 1 0 0 1 1 1v8h8a1 1 0 0 1 0 2h-8v8a1 1 0 0 1-2 0v-8H2a1 1 0 0 1 0-2h8V3a1 1 0 0 1 1-1z"/></svg>
            <h4>Cadastro de Produto</h4>
        </div>  

        <div class="card" onclick="showForm('delete')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 6a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v1h-18V6zm6 0h6V5a2 2 0 0 1 4 0v1h3a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V5a2 2 0 0 1 4 0v1zm2-1v1h4V5a2 2 0 0 0-4 0z"/></svg>
            <h4>Exclusão de Produto</h4>
        </div>
    </div>

    <!-- Contêiner dos Formulários -->
    <div id="form-container" class="form-container">
        
        <!-- Formulário de Edição de Produto -->
        <div id="edit-form" class="form" style="display: none;">
            <h3>Edição de Produto</h3>
            <form>
                <input type="text" placeholder="Nome do Produto">
                <input type="number" placeholder="QTD estoque">
                <input type="number" placeholder="Preço">
                <input type="file" accept="image/*" placeholder="Imagem do Produto"> 
                <button type="submit">Salvar Edição</button>
            </form>
        </div>

        <!-- Formulário de Cadastro de Promoção -->
        <div id="promo-form" class="form" style="display: none;">
            <h3>Cadastro de Promoção</h3>
            <form>
                <input type="text" placeholder="Nome do Produto">
                <input type="number" placeholder="QTD estoque">
                <input type="text" placeholder="Marca">
                <input type="number" placeholder="Preço">
                <input type="file" accept="image/*" placeholder="Imagem da Promoção"> 
                <button type="submit">Cadastrar Promoção</button>
            </form>
        </div>

        <!-- Formulário de Cadastro de Produto -->
        <div id="add-form" class="form" style="display: none;">
            <h3>Cadastro de Produto</h3>
            <form>
                <input type="text" placeholder="Nome do Produto">
                <input type="number" placeholder="QTD estoque">
                <input type="text" placeholder="Marca">
                <input type="number" placeholder="Preço anterior">
                <input type="number" placeholder="Preço Atual">
                <input type="file" accept="image/*" placeholder="Imagem do Produto"> 
                <button type="submit">Cadastrar Produto</button>
            </form>
        </div>

        <!-- Formulário de Exclusão de Produto -->
        <div id="delete-form" class="form" style="display: none;">
            <h3>Exclusão de Produto</h3>
            <form>
                <input type="text" placeholder="Nome do Produto">
                <button type="submit">Excluir Produto</button>
            </form>
        </div>
    </div>

    <script>
        // Função para exibir os formulários conforme o clique nos cards
        function showForm(action) {
            const forms = document.querySelectorAll('.form');
            const formContainer = document.getElementById('form-container');
            
            // Ocultar todos os formulários
            forms.forEach(form => form.style.display = 'none');
   
            document.getElementById(action + '-form').style.display = 'block';
        
            formContainer.classList.add('show');
        }
    </script>

</body>
</html>
