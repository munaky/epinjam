function loadScannerMenu(){
    if(document.getElementById('menu-scanner')){
        document.getElementById('menu-scanner').onclick = (x) => getMenuContent(x.target);
    }
}

function loadHomeFunction(){
    let list = document.querySelectorAll('#portfolio-flters li');

    list.forEach(element => {
        element.addEventListener('click', (x) => filterHome(x.target));
    });
}
