
const menuIcon = document.getElementById('menuIcon');
const sidebar = document.getElementById('sidebarMenu');
const overlay = document.getElementById('overlay');

menuIcon.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
});

overlay.addEventListener('click', () => {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');

});
