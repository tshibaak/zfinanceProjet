/* ============================================================
   Zfinances — interactions front (public)
   ============================================================ */

/* Header scroll */
const header = document.getElementById('header');
if (header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 20);
    });
}

/* Menu mobile */
const burger = document.getElementById('burger');
const mobileNav = document.getElementById('mobileNav');
if (burger && mobileNav) {
    burger.addEventListener('click', () => {
        burger.classList.toggle('open');
        mobileNav.classList.toggle('open');
    });
}
function closeMobileNav() {
    if (burger) burger.classList.remove('open');
    if (mobileNav) mobileNav.classList.remove('open');
}

/* Smooth scroll ancres */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            const offset = (header ? header.offsetHeight : 0);
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    });
});

/* Fade-in au scroll */
const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            fadeObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
document.querySelectorAll('.fade-in').forEach(el => fadeObserver.observe(el));

/* Compteurs animés (.counter[data-target]) */
function animateCounter(el) {
    const target = parseInt(el.dataset.target) || 0;
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    const dur = 1600;
    const t0 = performance.now();
    function tick(now) {
        const p = Math.min(1, (now - t0) / dur);
        const eased = 1 - Math.pow(1 - p, 3);
        el.textContent = prefix + Math.floor(eased * target) + suffix;
        if (p < 1) requestAnimationFrame(tick);
        else el.textContent = prefix + target + suffix;
    }
    requestAnimationFrame(tick);
}
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.4 });
document.querySelectorAll('.counter[data-target]').forEach(el => counterObserver.observe(el));

/* Lien de nav actif au scroll */
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav a');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        if (window.scrollY >= section.offsetTop - (header ? header.offsetHeight : 0) - 60) {
            current = section.getAttribute('id');
        }
    });
    navLinks.forEach(link => {
        const on = link.getAttribute('href') === '#' + current;
        link.style.color = on ? 'var(--blue-primary)' : '';
        link.style.background = on ? 'var(--blue-light9)' : '';
    });
});

/* Popup flash (fermeture) */
document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('popupOverlay');
    const closeBtn = document.querySelector('.close-popup');
    if (closeBtn) closeBtn.addEventListener('click', () => popup.style.display = 'none');
    if (popup) setTimeout(() => popup.style.display = 'none', 7000);
});
