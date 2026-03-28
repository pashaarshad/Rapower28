// Ra. Power 28 — Main JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Sticky header shadow on scroll
    const header = document.getElementById('mainHeader');
    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 10);
        });
    }

    // Scroll reveal animations
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        reveals.forEach(el => revealObserver.observe(el));
    }

    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const catNav = document.getElementById('categoryNav');
    if (menuToggle && catNav) {
        menuToggle.addEventListener('click', () => {
            catNav.style.display = catNav.style.display === 'none' ? 'block' : 'none';
        });
    }

    // Lazy load images
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imgObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imgObserver.unobserve(img);
                }
            });
        });
        lazyImages.forEach(img => imgObserver.observe(img));
    }

    // Breaking ticker pause on hover
    const ticker = document.getElementById('tickerContent');
    if (ticker) {
        ticker.addEventListener('mouseenter', () => ticker.style.animationPlayState = 'paused');
        ticker.addEventListener('mouseleave', () => ticker.style.animationPlayState = 'running');
    }

    // Search focus effect
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('focus', () => searchInput.parentElement.style.width = '320px');
        searchInput.addEventListener('blur', () => searchInput.parentElement.style.width = '');
    }
});
