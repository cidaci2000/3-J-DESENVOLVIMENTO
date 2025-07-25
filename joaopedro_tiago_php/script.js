// Carrossel automático
document.addEventListener('DOMContentLoaded', function() {
    const carouselSlide = document.querySelector('.carousel-slide');
    const carouselImages = document.querySelectorAll('.carousel-slide img');
    
    // Botões
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    
    // Contador
    let counter = 0;
    const size = carouselImages[0].clientWidth;
    
    // Configuração inicial do carrossel
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    
    // Event Listeners para os botões
    nextBtn.addEventListener('click', () => {
        if (counter >= carouselImages.length - 1) return;
        carouselSlide.style.transition = "transform 0.5s ease-in-out";
        counter++;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });
    
    prevBtn.addEventListener('click', () => {
        if (counter <= 0) return;
        carouselSlide.style.transition = "transform 0.5s ease-in-out";
        counter--;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });
    
    // Loop infinito
    carouselSlide.addEventListener('transitionend', () => {
        if (carouselImages[counter].id === 'lastClone') {
            carouselSlide.style.transition = "none";
            counter = carouselImages.length - 2;
            carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
        
        if (carouselImages[counter].id === 'firstClone') {
            carouselSlide.style.transition = "none";
            counter = carouselImages.length - counter;
            carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
    });
    
    // Animação da barra de pesquisa
    const searchInput = document.querySelector('.search-bar input');
    searchInput.addEventListener('focus', () => {
        searchInput.placeholder = 'Digite o modelo desejado...';
    });
    
    searchInput.addEventListener('blur', () => {
        searchInput.placeholder = 'Pesquisar veículos...';
    });
});