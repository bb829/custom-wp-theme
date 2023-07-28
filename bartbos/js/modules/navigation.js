const toggle = document.querySelector('.navigation__hamburger');
const navigation = document.querySelector('.navigation');
// const wrapper = document.querySelector('.navigation__wrapper');
const items = document.querySelectorAll('[data-menu-item="true"]');

function toggleFunction() {
    navigation.classList.toggle('navigation--focussed');
    items.forEach(item => {

        setTimeout(() => {        
            item.classList.toggle('fade-in');
        }, 260);

    });
  }

  toggle.addEventListener('click', () => {

    toggleFunction();

    // // wrapper.classList.remove('blur');
    // // wrapper.classList.add('blur');

    // setTimeout(() => {
    //     wrapper.classList.remove('blur')
    // }, 280);

});