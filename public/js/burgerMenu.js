// Fonction globale pour basculer le menu (accessible via onclick)
function toggleMenu() {
    const navbar = document.querySelector('.navbar');
    const iconBars = document.querySelector('.burger-menu .fa-bars');
    const iconTimes = document.querySelector('.burger-menu .fa-times');
    const body = document.body;
    
    navbar.classList.toggle('active');
    iconBars.style.display = iconBars.style.display === 'none' ? 'block' : 'none';
    iconTimes.style.display = iconTimes.style.display === 'none' ? 'block' : 'none';
    body.style.overflow = navbar.classList.contains('active') ? 'hidden' : '';
}

document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.querySelector('.burger-menu');
    const navbar = document.querySelector('.navbar');
    const iconBars = burgerMenu.querySelector('.fa-bars');
    const iconTimes = burgerMenu.querySelector('.fa-times');
    const body = document.body;

    // Fonction pour fermer le menu
    const closeMenu = () => {
        navbar.classList.remove('active');
        iconBars.style.display = 'block';
        iconTimes.style.display = 'none';
        body.style.overflow = '';
    };

    // Gestionnaire de clic pour le menu burger
    burgerMenu.addEventListener('click', function(e) {
        e.stopPropagation();
        if (window.innerWidth < 768) {
            toggleMenu(); // Utiliser la fonction globale
        }
    });

    // Fermer le menu en cliquant en dehors
    document.addEventListener('click', function(e) {
        if (navbar.classList.contains('active') && !navbar.contains(e.target) && !burgerMenu.contains(e.target)) {
            closeMenu();
        }
    });

    // Fermer le menu lors du redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            closeMenu();
        }
    });

    // Fermer le menu lors du clic sur un lien
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
}); 