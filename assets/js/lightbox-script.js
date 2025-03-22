console.log('Script chargé');
document.addEventListener('DOMContentLoaded', () => {
    const lightbox = document.getElementById('simpleLightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.close-btn');
    const leftArrow = document.querySelector('.left-arrow');
    const rightArrow = document.querySelector('.right-arrow');
    const triggers = document.querySelectorAll('.lightbox-trigger');
    
    if (!lightbox || !lightboxImage || !closeBtn || !leftArrow || !rightArrow || triggers.length === 0) {
        console.error('Éléments de lightbox manquants');
        return; // Arrête l'exécution si des éléments sont manquants
    }

    const images = Array.from(triggers).map(trigger => trigger.href);
    let currentIndex = 0;

    // Ouvrir la lightbox
    triggers.forEach((trigger, index) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            currentIndex = index;
            lightbox.classList.add('active');
            updateLightboxImage();
        });
    });

    // Mettre à jour l'image dans la lightbox
    function updateLightboxImage() {
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Image ${currentIndex + 1}`;
        console.log(`Image affichée : ${lightboxImage.src}`);
    }

    // Fermer la lightbox
    closeBtn.addEventListener('click', () => {
        lightbox.classList.remove('active');
        lightboxImage.src = '';
        lightboxImage.alt = '';
        console.log('Lightbox fermée');
    });

    // Navigation avec les flèches
    leftArrow.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length; // Image précédente
        updateLightboxImage();
        console.log('Navigation vers l\'image précédente');
    });

    rightArrow.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length; // Image suivante
        updateLightboxImage();
        console.log('Navigation vers l\'image suivante');
    });

});

/* Pour le balayage */
let touchStartX = 0;
let touchEndX = 0;

function handleTouchStart(event) {
    touchStartX = event.touches[0].clientX;
}

function handleTouchMove(event) {
    touchEndX = event.touches[0].clientX;
}

function handleTouchEnd() {
    if (touchStartX - touchEndX > 50) {
        // Balayage vers la gauche
        navigateImage(1);
    }
    if (touchEndX - touchStartX > 50) {
        // Balayage vers la droite
        navigateImage(-1);
    }
}

function navigateImage(direction) {
    currentIndex = (currentIndex + direction + images.length) % images.length;
    updateLightboxImage();
}

lightbox.addEventListener('touchstart', handleTouchStart, false);
lightbox.addEventListener('touchmove', handleTouchMove, false);
lightbox.addEventListener('touchend', handleTouchEnd, false);

