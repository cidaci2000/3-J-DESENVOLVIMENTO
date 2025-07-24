<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        button { padding: 5px 10px; }
    </style>
<link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Usuários Cadastrados</h1>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Admin</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="tabelaUsuarios"></tbody>
</table>

<script>
function carregarUsuarios() {
    let usuarios = JSON.parse(localStorage.getItem('usuarios') || '[]');
    const tabela = document.getElementById('tabelaUsuarios');
    tabela.innerHTML = '';

    usuarios.forEach((u, i) => {
        let linha = `
        <tr>
            <td>${u.nome}</td>
            <td>${u.email}</td>
            <td>${u.cpf}</td>
            <td>${u.admin ? "Sim" : "Não"}</td>
            <td>
                <button onclick="promover(${i})">Promover</button>
                <button onclick="remover(${i})">Remover</button>
            </td>
        </tr>`;
        tabela.innerHTML += linha;
    });
}

function promover(index) {
    let usuarios = JSON.parse(localStorage.getItem('usuarios') || '[]');
    usuarios[index].admin = true;
    localStorage.setItem('usuarios', JSON.stringify(usuarios));
    carregarUsuarios();
}

function remover(index) {
    let usuarios = JSON.parse(localStorage.getItem('usuarios') || '[]');
    usuarios.splice(index, 1);
    localStorage.setItem('usuarios', JSON.stringify(usuarios));
    carregarUsuarios();
}

window.onload = carregarUsuarios;
</script>

</body>
</html>
