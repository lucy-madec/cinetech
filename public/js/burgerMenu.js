document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.querySelector('.burger-menu');
    const navbar = document.querySelector('.navbar');
    const iconBars = burgerMenu.querySelector('.fa-bars');
    const iconTimes = burgerMenu.querySelector('.fa-times');

    burgerMenu.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            navbar.classList.toggle('active');
            iconBars.style.display = iconBars.style.display === 'none' ? 'block' : 'none';
            iconTimes.style.display = iconTimes.style.display === 'none' ? 'block' : 'none';
        }
    });
}); 