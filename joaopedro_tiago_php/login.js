document.addEventListener('DOMContentLoaded', function() {
    const formLogin = document.getElementById('formLogin');
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.getElementById('senha');
    
    // Mostrar/esconder senha
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Alternar ícone
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
    
    // Validação do formulário
    formLogin.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const btnLogin = document.querySelector('.btn-login');
        btnLogin.textContent = 'Entrando...';
        btnLogin.disabled = true;
        
        // Simular autenticação
        setTimeout(() => {
            // Aqui você faria a validação real com o backend
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            
            // Simulação de login bem-sucedido
            if(email && senha) {
                alert('Login realizado com sucesso! Redirecionando...');
                window.location.href = 'produtos.html';
            } else {
                alert('Por favor, preencha todos os campos!');
                btnLogin.textContent = 'Entrar';
                btnLogin.disabled = false;
            }
        }, 1500);
    });
    
    // Login com redes sociais (simulação)
    document.querySelector('.btn-social.google').addEventListener('click', function() {
        alert('Redirecionando para autenticação com Google...');
        // Aqui você implementaria a autenticação com OAuth
    });
    
    document.querySelector('.btn-social.facebook').addEventListener('click', function() {
        alert('Redirecionando para autenticação com Facebook...');
        // Aqui você implementaria a autenticação com OAuth
    });
});