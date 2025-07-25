<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedCar Locadora - Cadastro de Veículos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cadproduto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Cabeçalho (mesmo da página inicial) -->
    <header class="header">
        <div class="logo">
            <img src="logotipo.png" alt="SpeedCar Locadora">
        </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar veículos...">
            <button><i class="fas fa-search"></i></button>
        </div>
        
        <nav class="nav-buttons">
            <a href="index.php" class="btn-nav">Home</a>
            <a href="produtos.php" class="btn-nav">Produtos</a>
            <a href="login.php" class="btn-nav">Login</a>
            <a href="contato.php" class="btn-nav">Contato</a>
            <a href="sobre.php" class="btn-nav">Quem Somos</a>
        </nav>
    </header>

    <!-- Conteúdo Principal - Cadastro de Produtos -->
    <main class="product-registration">
        <div class="admin-header">
            <h1><i class="fas fa-car"></i> Cadastro de Veículos</h1>
            <a href="produtos.php" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar para lista</a>
        </div>
        
        <form id="productForm" class="product-form">
            <div class="form-section">
                <h2>Informações Básicas</h2>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="marca">Marca*</label>
                        <input type="text" id="marca" name="marca" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="modelo">Modelo*</label>
                        <input type="text" id="modelo" name="modelo" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="ano">Ano*</label>
                        <input type="number" id="ano" name="ano" min="2000" max="2023" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="placa">Placa*</label>
                        <input type="text" id="placa" name="placa" required>
                    </div>
                </div>
                
                <div class="input-group full-width">
                    <label for="descricao">Descrição*</label>
                    <textarea id="descricao" name="descricao" rows="3" required></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Especificações Técnicas</h2>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="categoria">Categoria*</label>
                        <select id="categoria" name="categoria" required>
                            <option value="">Selecione...</option>
                            <option value="economico">Econômico</option>
                            <option value="intermediario">Intermediário</option>
                            <option value="luxo">Luxo</option>
                            <option value="suv">SUV</option>
                            <option value="esportivo">Esportivo</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label for="combustivel">Combustível*</label>
                        <select id="combustivel" name="combustivel" required>
                            <option value="">Selecione...</option>
                            <option value="gasolina">Gasolina</option>
                            <option value="alcool">Álcool</option>
                            <option value="flex">Flex</option>
                            <option value="diesel">Diesel</option>
                            <option value="eletrico">Elétrico</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="portas">Portas*</label>
                        <input type="number" id="portas" name="portas" min="2" max="6" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="lugares">Lugares*</label>
                        <input type="number" id="lugares" name="lugares" min="2" max="9" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="cambio">Câmbio*</label>
                        <select id="cambio" name="cambio" required>
                            <option value="">Selecione...</option>
                            <option value="automatico">Automático</option>
                            <option value="manual">Manual</option>
                            <option value="semi-automatico">Semi-automático</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Valores e Disponibilidade</h2>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="diaria">Valor Diária (R$)*</label>
                        <input type="number" id="diaria" name="diaria" step="0.01" min="50" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="semanal">Valor Semanal (R$)*</label>
                        <input type="number" id="semanal" name="semanal" step="0.01" min="300" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="status">Status*</label>
                        <select id="status" name="status" required>
                            <option value="disponivel">Disponível</option>
                            <option value="manutencao">Em manutenção</option>
                            <option value="alugado">Alugado</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Imagens do Veículo</h2>
                
                <div class="image-upload">
                    <div class="upload-area" id="uploadArea">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Arraste e solte imagens aqui ou clique para selecionar</p>
                        <input type="file" id="fileInput" accept="image/*" multiple style="display: none;">
                    </div>
                    
                    <div class="preview-grid" id="previewGrid">
                        <!-- As imagens pré-visualizadas aparecerão aqui -->
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn-cancel">Cancelar</button>
                <button type="submit" class="btn-save">Salvar Veículo</button>
            </div>
        </form>
    </main>

    <!-- Rodapé (mesmo da página inicial) -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 SpeedCar Locadora. Todos os direitos reservados.</p>
            <div class="footer-links">
                <a href="#">Termos de Uso</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">FAQ</a>
            </div>
        </div>
    </footer>

    <script src="js/cadastro-produto.js"></script>
</body>
</html>