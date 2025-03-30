/* Pour donner l'info si on a un écran Touch ou pas */

document.addEventListener('DOMContentLoaded', () => {
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    if (isTouchDevice) {
        document.body.classList.add('touch-device');
        document.body.classList.remove('no-touch-device');
    } else {
        document.body.classList.add('no-touch-device');
        document.body.classList.remove('touch-device');
    }
});




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
        return;
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
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightboxImage();
        console.log('Navigation vers l\'image précédente');
    });

    rightArrow.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightboxImage();
        console.log('Navigation vers l\'image suivante');
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
        lightboxImage.style.transform = 'translateX(-100%)'; // Déplace l'image à gauche
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % images.length;
            updateLightboxImage();
            lightboxImage.style.transform = 'translateX(0)'; // Ramène l'image au centre
        }, 500); // Attendre la fin de la transition
    } else if (touchEndX - touchStartX > 50) {
        // Balayage vers la droite
        lightboxImage.style.transform = 'translateX(100%)'; // Déplace l'image à droite
        setTimeout(() => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateLightboxImage();
            lightboxImage.style.transform = 'translateX(0)'; // Ramène l'image au centre
        }, 500); // Attendre la fin de la transition
    }
}



lightbox.addEventListener('touchstart', handleTouchStart, false);
lightbox.addEventListener('touchmove', handleTouchMove, false);
lightbox.addEventListener('touchend', handleTouchEnd, false);

});
