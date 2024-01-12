const body = document.body;
const menu = document.querySelector('.menu__body');
const menuBtn = document.querySelector('.menu__icon');

if (menu && menuBtn) {
    menuBtn.addEventListener('click', (e) => {
        menu.classList.toggle('active');
        menuBtn.classList.toggle('active');
        body.classList.toggle('lock');
    });

    
}