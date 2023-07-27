const toggle = document.querySelector('.navigation__hamburger');
const navigation = document.querySelector('.navigation');
const wrapper = document.querySelector('.navigation__wrapper');
const items = document.querySelectorAll('[data-menu-item="true"]');
const delay = 400;

function addClassWithDelay() {

    items.forEach(item => {

        setTimeout(() => {        
            item.classList.toggle('fade-in');
        }, 260);

    });
  }

  toggle.addEventListener('click', () => {

    addClassWithDelay();
    navigation.classList.toggle('navigation--focussed');

    // wrapper.classList.remove('blur');
    // wrapper.classList.add('blur');

    setTimeout(() => {
        wrapper.classList.remove('blur')
    }, 280);

});