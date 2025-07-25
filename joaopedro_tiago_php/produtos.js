document.addEventListener('DOMContentLoaded', function() {
    // Controle do range de preço
    const priceRange = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');
    
    priceRange.addEventListener('input', function() {
        priceValue.textContent = `R$ ${this.value}`;
    });
    
    // Efeito hover nos cards de produto
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 3px 10px rgba(0, 0, 0, 0.1)';
        });
    });
    
    // Paginação
    const pageButtons = document.querySelectorAll('.page-btn');
    
    pageButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove a classe active de todos os botões
            pageButtons.forEach(btn => btn.classList.remove('active'));
            
            // Adiciona a classe active apenas no botão clicado
            this.classList.add('active');
            
            // Aqui você pode adicionar a lógica para carregar a página correspondente
            console.log(`Carregar página ${this.textContent}`);
        });
    });
    
    // Botão de filtro
    const filterButton = document.querySelector('.btn-filter');
    
    filterButton.addEventListener('click', function() {
        // Aqui você pode adicionar a lógica para aplicar os filtros
        console.log('Filtros aplicados');
        
        // Simulação de loading
        this.textContent = 'Aplicando...';
        this.disabled = true;
        
        setTimeout(() => {
            this.textContent = 'Filtros Aplicados';
            setTimeout(() => {
                this.textContent = 'Aplicar Filtros';
                this.disabled = false;
            }, 1500);
        }, 1000);
    });
});