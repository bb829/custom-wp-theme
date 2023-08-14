import { isInViewport } from './isinviewport';

const section = document.querySelectorAll('[data-inviewport]');

window.addEventListener('scroll', () => {
    section.forEach(item => {
        if (isInViewport(item)) {
            item.setAttribute("data-inviewport", "yes");
            item.classList.add('section--focussed');
        }
        if (!isInViewport(item)) {
            item.setAttribute("data-inviewport", "no");
            item.classList.remove('section--focussed');
        }
    });
});