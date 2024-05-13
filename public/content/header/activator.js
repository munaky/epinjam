function loadHeaderFunction(){
    let list = document.querySelectorAll('.nav-link');

    list.forEach(element => {
        element.addEventListener('click', (x) => getHeaderContent(x.target));
    });
}
