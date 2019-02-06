const btnMenu = document.getElementById('btn_menu');
btnMenu.addEventListener('click', toggleMenu);

function toggleMenu(ev) {
    const menu = document.getElementById('user_menu');
    menu.classList.toggle('hidden');
}