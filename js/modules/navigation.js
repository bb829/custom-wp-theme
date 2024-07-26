const toggle = document.querySelector('.navigation__hamburger');
const navigation = document.querySelector('.navigation');
// const wrapper = document.querySelector('.navigation__wrapper');
const items = document.querySelectorAll('[data-menu-item="true"]');

function toggleFunction() {
    if (navigation) {
        navigation.classList.toggle('navigation--focussed');
        items.forEach(item => {
            const parent = item.classList.contains('navigation__item--parent')
            if(parent) {
                const parentElement = item;
                const dropdown = parentElement.querySelector('.navigation__dropdown');
                const dropdownInner = dropdown.querySelector('.navigation__dropdownInner');
                const dropdownHeight = dropdownInner.offsetHeight;
                parentElement.addEventListener('click', () => {   
                    if (!parentElement.classList.contains('navigation__item--expanded')) {
                        dropdown.style.maxHeight = dropdownHeight + 'px';
                        parentElement.classList.add('navigation__item--expanded');

                        return;
                    }
                    if (parentElement.classList.contains('navigation__item--expanded')) {
                        dropdown.style.maxHeight = 0 + 'px';
                        parentElement.classList.remove('navigation__item--expanded');
                        return;
                    }
                });
            }
            setTimeout(() => {
                if (navigation.classList.contains('navigation--fullScreen')) {
                    item.classList.toggle('fade-in');
                }
            }, 260);

        });
    }
}

if (toggle) {
    toggle.addEventListener('click', () => {

        toggleFunction();

        // // wrapper.classList.remove('blur');
        // // wrapper.classList.add('blur');

        // setTimeout(() => {
        //     wrapper.classList.remove('blur')
        // }, 280);

    });
}