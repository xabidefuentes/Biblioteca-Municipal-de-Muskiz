let currentIndex = 0;
let autoplayInterval = null;

document.addEventListener('DOMContentLoaded', () => {
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const galleryContainer = document.querySelector('.gallery-container');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const totalImages = galleryItems.length;

    if (prevButton) {
        prevButton.addEventListener('click', () => {
            navigate(-1);
        });
    }

    if (nextButton) {
        nextButton.addEventListener('click', () => {
            navigate(1);
        });
    }

    function navigate(direction) {
        currentIndex = (currentIndex + direction + totalImages) % totalImages;
        const offset = -currentIndex * 100;
        galleryContainer.style.transition = 'transform 1.5s ease';
        galleryContainer.style.transform = `translateX(${offset}%)`;
    }

    function startAutoplay(interval) {
        stopAutoplay();
        autoplayInterval = setInterval(() => {
            navigate(1);
        }, interval);
    }

    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }

    startAutoplay(3000);

    const navButtons = document.querySelectorAll('.nav-button');
    navButtons.forEach(button => {
        if (button) {
            button.addEventListener('click', stopAutoplay);
        }
    });
});