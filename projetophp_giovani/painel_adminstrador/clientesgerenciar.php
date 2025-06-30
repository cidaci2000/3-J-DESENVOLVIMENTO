<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
</head>

<body>

    <h1>Cadastrar Cliente</h1>

    <!-- Formulário de Cadastro -->
    <div class="form-container">
        <form id="formCadastro" onsubmit="cadastrarCliente(event)">
            <div class="input-container">
                <i class="fas fa-user"></i>
                <input class="user-input" type="text" id="nome" placeholder="Nome" required>
            </div>
            <div class="input-container">
                <i class="fas fa-envelope"></i>
                <input class="user-input" type="email" id="email" placeholder="E-mail" required>
            </div>
            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input class="user-input" type="password" id="senha" placeholder="Senha" required>
            </div>
            <div class="input-container">
                <i class="fas fa-id-card"></i>
                <input class="user-input" type="text" id="cpf" placeholder="CPF" required>
            </div>
            <div class="input-container">
                <i class="fas fa-user-tag"></i>
                <select id="tipo" required>
                    <option value="cliente">Cliente</option>
                    <option value="administrador">Administrador</option>
                    <option value="gerente">Gerente</option>
                </select>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <!-- Tabela de Clientes -->
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="clientes-list">
        </tbody>
    </table>

    <script>
        let clienteEditando = null;

        // Função para carregar clientes do localStorage
        function carregarClientes() {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            clientes.forEach(cliente => {
                adicionarClienteNaTabela(cliente.nome, cliente.email, cliente.senha, cliente.cpf, cliente.tipo);
            });
        }

        // Função para adicionar cliente na tabela
        function adicionarClienteNaTabela(nome, email, senha, cpf, tipo) {
            var tabela = document.getElementById("clientes-list");
            var novaLinha = tabela.insertRow();

            var cellNome = novaLinha.insertCell(0);
            var cellEmail = novaLinha.insertCell(1);
            var cellSenha = novaLinha.insertCell(2);
            var cellCpf = novaLinha.insertCell(3);
            var cellTipo = novaLinha.insertCell(4);
            var cellAcoes = novaLinha.insertCell(5);

            cellNome.textContent = nome;
            cellEmail.textContent = email;
            cellSenha.textContent = senha;
            cellCpf.textContent = cpf;
            cellTipo.textContent = tipo;

            // Adicionando ícones de ação (editar e excluir)
            cellAcoes.innerHTML = `
                <i class="fas fa-edit" onclick="editarCliente(this)" style="cursor:pointer;"></i>
                <i class="fas fa-trash" onclick="excluirCliente(this)" style="cursor:pointer; margin-left:10px;"></i>
            `;
        }

        // Função para cadastrar ou editar o cliente
        function cadastrarCliente(event) {
            event.preventDefault();

            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;
            var cpf = document.getElementById("cpf").value;
            var tipo = document.getElementById("tipo").value;

            if (nome === "" || email === "" || senha === "" || cpf === "") {
                alert("Por favor, preencha todos os campos.");
                return;
            }

            // Criptografando a senha
            var senhaCriptografada = CryptoJS.SHA256(senha).toString();

            if (clienteEditando) {
                // Atualizando os dados na tabela
                clienteEditando.cells[0].textContent = nome;
                clienteEditando.cells[1].textContent = email;
                clienteEditando.cells[2].textContent = senhaCriptografada;
                clienteEditando.cells[3].textContent = cpf;
                clienteEditando.cells[4].textContent = tipo;

                // Atualizando o localStorage
                atualizarLocalStorage(nome, email, senhaCriptografada, cpf, tipo);
                clienteEditando = null;
            } else {
                // Inserindo novo cliente na tabela
                adicionarClienteNaTabela(nome, email, senhaCriptografada, cpf, tipo);

                // Adicionando cliente ao localStorage
                adicionarClienteNoLocalStorage(nome, email, senhaCriptografada, cpf, tipo);
            }

            // Limpando os campos após cadastro
            document.getElementById("nome").value = "";
            document.getElementById("email").value = "";
            document.getElementById("senha").value = "";
            document.getElementById("cpf").value = "";
            document.getElementById("tipo").value = "cliente"; 
        }

        // Função para adicionar cliente no localStorage
        function adicionarClienteNoLocalStorage(nome, email, senha, cpf, tipo) {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            clientes.push({ nome, email, senha, cpf, tipo });
            localStorage.setItem('clientes', JSON.stringify(clientes));
        }

        // Função para atualizar cliente no localStorage
        function atualizarLocalStorage(nome, email, senha, cpf, tipo) {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const index = clientes.findIndex(cliente => cliente.email === email); // Usando email como identificador
            if (index !== -1) {
                clientes[index] = { nome, email, senha, cpf, tipo };
                localStorage.setItem('clientes', JSON.stringify(clientes));
            }
        }

        // Função para editar um cliente na tabela
        function editarCliente(icon) {
            var row = icon.parentNode.parentNode;
            var nome = row.cells[0].textContent;
            var email = row.cells[1].textContent;
            var senha = row.cells[2].textContent;
            var cpf = row.cells[3].textContent;
            var tipo = row.cells[4].textContent;

            // Preenchendo os campos com os dados do cliente
            document.getElementById("nome").value = nome;
            document.getElementById("email").value = email;
            document.getElementById("senha").value = senha; // A senha não será criptografada durante a edição
            document.getElementById("cpf").value = cpf;
            document.getElementById("tipo").value = tipo;

            clienteEditando = row;
        }

        // Função para excluir um cliente da tabela
        function excluirCliente(icon) {
            var row = icon.parentNode.parentNode;
            var tabela = document.getElementById("clientes-list");
            const email = row.cells[1].textContent; // Usando o email para identificar o cliente

            // Remover da tabela
            tabela.deleteRow(row.rowIndex - 1); // -1 porque o cabeçalho da tabela conta como uma linha

            // Remover do localStorage
            removerClienteDoLocalStorage(email);
        }

        // Função para remover cliente do localStorage
        function removerClienteDoLocalStorage(email) {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const novosClientes = clientes.filter(cliente => cliente.email !== email);
            localStorage.setItem('clientes', JSON.stringify(novosClientes));
        }

        // Carregar clientes ao iniciar a página
        window.onload = carregarClientes;
    </script>

    <style>
        body {    
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(72deg, #56394f 10%, rgb(94, 34, 63) 90%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            color: #fff;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .input-container i {
            position: absolute;
            left: 15px;
            top: 50%; 
            transform: translateY(-50%);
            color: #aaa; 
            font-size: 18px; 
        }

        .form-container input, select {
            width: 80%;
            padding: 12px 12px 12px 40px; 
            margin: 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #56394f;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #5f2c63;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #fff;
            color: #333;
            border-radius: 10px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #56394f;
            color: white;
        }

        table td {
            text-align: center;
        }

        /* Estilo para os ícones */
        .fas {
            color: #56394f;
            cursor: pointer;
        }

        .fas:hover {
            color: #5f2c63;
        }
    </style>

</body>
</html>