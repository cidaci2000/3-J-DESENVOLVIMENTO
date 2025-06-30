<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <label>
        <input type="checkbox">
        <div class="toggle">
            <span class="top_line common"></span>
            <span class="middle_line common"></span>
            <span class="bottom_line common"></span>
        </div>
        <div class="slide">
            <h1>Admin</h1>
            <br>
            <br>
            <ul>
                <li>
                    <a href="gerenciarcadastro.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15">
                            <path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Zm6,13A6,6,0,0,0,6,23a1,1,0,0,0,2,0,4,4,0,0,1,8,0,1,1,0,0,0,2,0ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,18,2Zm6,13a6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8ZM6,2A2,2,0,1,0,8,4,2,2,0,0,0,6,2ZM2,15a4,4,0,0,1,4-4A1,1,0,0,0,6,9a6.006,6.006,0,0,0-6,6,1,1,0,0,0,2,0Z"/>
                        </svg>
                        Gerenciamento de cadastro
                    </a>
                </li>

                <li>
                    <a href="cadastrarproduto.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15">
                            <path d="M20.164,13H5.419L4.478,5H14V3H4.242L4.2,2.648A3,3,0,0,0,1.222,0H0V2H1.222a1,1,0,0,1,.993.883L3.8,16.351A3,3,0,0,0,6.778,19H20V17H6.778a1,1,0,0,1-.993-.884L5.654,15H21.836l.9-5H20.705Z"/>
                        </svg>
                        Cadastro de produtos
                    </a>
                </li>
                <li>

                    <a href="editorprodutos.php">
                        <a href="editorprodutos.php"><?xml version="1.0" encoding="UTF-8"?>
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="15" height="15"><path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Zm6,13A6,6,0,0,0,6,23a1,1,0,0,0,2,0,4,4,0,0,1,8,0,1,1,0,0,0,2,0ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,18,2Zm6,13a6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8ZM6,2A2,2,0,1,0,8,4,2,2,0,0,0,6,2ZM2,15a4,4,0,0,1,4-4A1,1,0,0,0,6,9a6.006,6.006,0,0,0-6,6,1,1,0,0,0,2,0Z"/></svg>
                            Editar Produtos
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15">
                            <path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/>
                        </svg>
                        Home ADM
                    </a>
                </li>
                <li>
                    <a href="manualadm.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                          </svg>
                          Manual ADM
                    </a>
                </li>
              
                <li>
                    <a href="../login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15">
                            <path d="M22.527,11.816c-.063-.156-1.61-3.852-7.476-6.661-.247-.118-.547-.015-.667,.235-.119,.249-.014,.547,.235,.667,4.039,1.934,5.894,4.295,6.608,5.444H5.596c-.276,0-.5,.224-.5,.5s.224,.5,.5,.5h15.627c-.721,1.15-2.59,3.524-6.602,5.445-.249,.12-.354,.418-.235,.667,.086,.18,.265,.284,.451,.284,.073,0,.146-.016,.216-.049,5.787-2.771,7.405-6.493,7.472-6.65,.052-.122,.053-.261,.004-.383Z"/>
                            <path d="M8.109,22.004c-2.162-.283-3.866-.672-4.506-.828-.27-.998-1.167-4.66-1.167-9.174S3.335,3.823,3.604,2.828c.635-.158,2.328-.549,4.506-.832,.273-.035,.467-.286,.432-.56-.036-.274-.296-.467-.561-.431-2.844,.369-4.829,.905-4.912,.928-.165,.045-.297,.172-.347,.337-.053,.173-1.285,4.293-1.285,9.734s1.232,9.561,1.285,9.733c.051,.165,.183,.293,.35,.337,.084,.022,2.088,.553,4.909,.922,.021,.003,.044,.004,.065,.004,.247,0,.462-.183,.495-.435,.035-.274-.157-.525-.432-.561Z"/>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </label>
    <div class="container">
        <h1>Gerenciamento de Cadastro</h1>
    
        <form id="clienteForm">
            <input type="text" id="nome" placeholder="Nome" required>
            <input type="email" id="email" placeholder="Email">
            <input type="password" id="senha" placeholder="Senha" required>
            <input type="number" id="cpf" placeholder="CPF" required>
            <select id="prioridade">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
    
            <button class="btn" type="submit">Adicionar o cliente</button>
        </form>
    
        <table id="clientesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>CPF</th>
                    <th>Prioridade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dados de clientes vão aqui -->
            </tbody>
        </table>
    </div>
    
    <script>
        const form = document.getElementById('clienteForm');
        const clientesTable = document.getElementById('clientesTable').getElementsByTagName('tbody')[0];
    
        // Contador de ID
        let id = 1; 
    
        form.addEventListener('submit', function(event) {
            event.preventDefault(); 
    
            // Captura os valores dos campos
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            const cpf = document.getElementById('cpf').value;
            const prioridade = document.getElementById('prioridade').value;
    
            const newRow = clientesTable.insertRow();
    
            newRow.innerHTML = `
                <td>${id}</td>
                <td>${nome}</td>
                <td>${email}</td>
                <td>${senha}</td>
                <td>${cpf}</td>
                <td>${prioridade}</td>
                <td>
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Excluir</button>
                </td>
            `;
    
            newRow.querySelector('.delete-btn').addEventListener('click', function() {
                clientesTable.deleteRow(newRow.rowIndex - 1); 
            })
    
            newRow.querySelector('.edit-btn').addEventListener('click', function() {
               
                document.getElementById('nome').value = nome;
                document.getElementById('email').value = email;
                document.getElementById('senha').value = senha;
                document.getElementById('cpf').value = cpf;
                document.getElementById('prioridade').value = prioridade;
                
                // Exclui a linha
                clientesTable.deleteRow(newRow.rowIndex - 1); // Remove a linha da tabela
                id--;
            });
    
            id++;
    
            form.reset();
        });
    </script>


</body>
</html>