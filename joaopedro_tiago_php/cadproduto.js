document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productForm');
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const previewGrid = document.getElementById('previewGrid');
    const btnCancel = document.querySelector('.btn-cancel');
    
    // Array para armazenar as imagens selecionadas
    let selectedFiles = [];
    
    // Evento para abrir o seletor de arquivos ao clicar na área de upload
    uploadArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Evento para arrastar e soltar imagens
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = 'var(--vermelho)';
        this.style.backgroundColor = 'rgba(230, 57, 70, 0.05)';
    });
    
    uploadArea.addEventListener('dragleave', function() {
        this.style.borderColor = 'var(--cinza-medio)';
        this.style.backgroundColor = 'transparent';
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = 'var(--cinza-medio)';
        this.style.backgroundColor = 'transparent';
        
        if(e.dataTransfer.files.length) {
            handleFiles(e.dataTransfer.files);
        }
    });
    
    // Evento para selecionar arquivos
    fileInput.addEventListener('change', function() {
        if(this.files.length) {
            handleFiles(this.files);
        }
    });
    
    // Função para lidar com os arquivos selecionados
    function handleFiles(files) {
        for(let i = 0; i < files.length; i++) {
            const file = files[i];
            
            // Verificar se é uma imagem
            if(!file.type.match('image.*')) {
                continue;
            }
            
            selectedFiles.push(file);
            
            // Criar preview da imagem
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';
                
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button class="remove-btn" data-index="${selectedFiles.length - 1}">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                
                previewGrid.appendChild(previewItem);
                
                // Adicionar evento para remover imagem
                previewItem.querySelector('.remove-btn').addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    selectedFiles.splice(index, 1);
                    previewGrid.removeChild(previewItem);
                    updateRemoveButtons();
                });
            };
            reader.readAsDataURL(file);
        }
    }
    
    // Atualizar índices dos botões de remover
    function updateRemoveButtons() {
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach((button, index) => {
            button.setAttribute('data-index', index);
        });
    }
    
    // Evento para cancelar
    btnCancel.addEventListener('click', function() {
        if(confirm('Tem certeza que deseja cancelar? Todas as alterações serão perdidas.')) {
            window.location.href = 'produtos.html';
        }
    });
    
    // Evento para enviar formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar se há pelo menos uma imagem
        if(selectedFiles.length === 0) {
            alert('Por favor, adicione pelo menos uma imagem do veículo.');
            return;
        }
        
        // Simular envio do formulário
        const btnSave = document.querySelector('.btn-save');
        btnSave.textContent = 'Salvando...';
        btnSave.disabled = true;
        
        // Aqui você faria o upload das imagens e enviaria os dados para o servidor
        setTimeout(() => {
            alert('Veículo cadastrado com sucesso!');
            window.location.href = 'produtos.html';
        }, 2000);
    });
    
    // Máscara para placa do veículo
    const placaInput = document.getElementById('placa');
    placaInput.addEventListener('input', function() {
        let value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        
        if(value.length > 3) {
            value = value.substring(0, 3) + '-' + value.substring(3);
        }
        
        if(value.length > 7) {
            value = value.substring(0, 7);
        }
        
        this.value = value;
    });
    
    // Calcular valor semanal automaticamente
    const diariaInput = document.getElementById('diaria');
    const semanalInput = document.getElementById('semanal');
    
    diariaInput.addEventListener('change', function() {
        if(this.value && !semanalInput.value) {
            semanalInput.value = (parseFloat(this.value) * 5.8).toFixed(2);
        }
    });
});