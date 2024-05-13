document.querySelector('body').onload = () =>
{
    loadHeaderFunction();
    getHeaderContent(document.getElementById('menu-home'));
};

window.addEventListener('click', extendUsers);
