const parent = document.querySelectorAll('[data-module="custom-height"]');

if (parent) {
    parent.forEach(parentEl => {
        if (parentEl.querySelector('[data-js-bind="child"]')) {
            const childHeight = parentEl.querySelector('[data-js-bind="child"]').offsetHeight;
            parentEl.style.height = childHeight + 'px';
        }
    });
}