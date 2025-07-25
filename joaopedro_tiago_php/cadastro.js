document.addEventListener('DOMContentLoaded', function() {
    const formCadastro = document.getElementById('formCadastro');
    
    // Máscara para CPF
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        this.value = value;
    });
    
    // Máscara para telefone
    const telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
        value = value.replace(/(\d)(\d{4})$/, '$1-$2');
        this.value = value;
    });
    
    // Máscara para celular
    const celularInput = document.getElementById('celular');
    celularInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
        value = value.replace(/(\d)(\d{4})$/, '$1-$2');
        this.value = value;
    });
    
    // Validação do formulário
    formCadastro.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Verificar se as senhas coincidem
        const senha = document.getElementById('senha').value;
        const confirmarSenha = document.getElementById('confirmarSenha').value;
        
        if (senha !== confirmarSenha) {
            alert('As senhas não coincidem!');
            return;
        }
        
        // Simular envio do formulário
        const btnCadastrar = document.querySelector('.btn-cadastrar');
        btnCadastrar.textContent = 'Cadastrando...';
        btnCadastrar.disabled = true;
        
        setTimeout(() => {
            alert('Cadastro realizado com sucesso! Redirecionando...');
            window.location.href = 'login.html';
        }, 1500);
    });
});