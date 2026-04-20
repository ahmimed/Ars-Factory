const navToggle = document.querySelector('[data-nav-toggle]');
const nav = document.querySelector('[data-nav]');

if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
        nav.classList.toggle('open');
    });
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));

const lightbox = document.querySelector('[data-lightbox]');
const lightboxImage = lightbox?.querySelector('img');
const closeLightbox = document.querySelector('[data-lightbox-close]');

document.querySelectorAll('[data-lightbox-src]').forEach((item) => {
    item.addEventListener('click', () => {
        if (!lightbox || !lightboxImage) {
            return;
        }

        lightboxImage.src = item.dataset.lightboxSrc;
        lightbox.classList.add('open');
    });
});

closeLightbox?.addEventListener('click', () => {
    lightbox?.classList.remove('open');
});

lightbox?.addEventListener('click', (event) => {
    if (event.target === lightbox) {
        lightbox.classList.remove('open');
    }
});