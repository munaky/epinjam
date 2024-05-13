function getHeaderContent(element){
    setActiveHeader(element);
    getMenuContent(element);
}

function setActiveHeader(target){
    let list = document.querySelectorAll('.nav-link');

    for(let x = 0; x < list.length; x++){
        let el = list[x];

        if( el == target){
            el.classList.add('active');
            continue;
        }

        el.classList.remove('active');
    }
}
