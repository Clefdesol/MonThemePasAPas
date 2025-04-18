document.addEventListener('DOMContentLoaded', () => {
    // Détection de l'écran tactile
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    if (isTouchDevice) {
        document.body.classList.add('touch-device');
        document.body.classList.remove('no-touch-device');
    } else {
        document.body.classList.add('no-touch-device');
        document.body.classList.remove('touch-device');
    }

    // Variables Lightbox
    const lightbox = document.getElementById('simpleLightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.close-btn');
    const leftArrow = document.querySelector('.left-arrow');
    const rightArrow = document.querySelector('.right-arrow');
    const triggers = document.querySelectorAll('.lightbox-trigger');
    const lightboxCaption = document.getElementById('lightbox-caption');

    if (!lightbox || !lightboxImage || !closeBtn || !leftArrow || !rightArrow || triggers.length === 0 || !lightboxCaption) {
        console.error('Éléments de lightbox manquants');
        return;
    }

    const images = Array.from(triggers).map(trigger => trigger.href);
    let currentIndex = 0;

    // Met à jour la légende
    function updateLightboxCaption() {
        var total = images.length;
        var position = currentIndex + 1;
        lightboxCaption.textContent = position + ' / ' + total;
    }

    // Met à jour l'image et la légende
    function updateLightboxImage() {
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Image ${currentIndex + 1}`;
        console.log(`Image affichée : ${lightboxImage.src}`);
        updateLightboxCaption(); // <-- Ajout ici
    }

    // Ouvrir la lightbox
    triggers.forEach((trigger, index) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            currentIndex = index;
            lightbox.classList.add('active');
            updateLightboxImage();
        });
    });

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

    // Balayage (swipe)
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
            lightboxImage.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % images.length;
                updateLightboxImage();
                lightboxImage.style.transform = 'translateX(0)';
            }, 500);
        } else if (touchEndX - touchStartX > 50) {
            // Balayage vers la droite
            lightboxImage.style.transform = 'translateX(100%)';
            setTimeout(() => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateLightboxImage();
                lightboxImage.style.transform = 'translateX(0)';
            }, 500);
        }
    }

    lightbox.addEventListener('touchstart', handleTouchStart, false);
    lightbox.addEventListener('touchmove', handleTouchMove, false);
    lightbox.addEventListener('touchend', handleTouchEnd, false);
});

// Pour que le ZOOM par pincement ne provoque pas de balayage
const lightboxZoom = document.querySelector('.lightbox');
if (lightboxZoom) {
    lightboxZoom.addEventListener('touchstart', (event) => {
        if (event.touches.length > 1) {
            event.stopPropagation();
        }
    });
}
