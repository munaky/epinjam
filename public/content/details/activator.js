function loadDetailsFunction(){
    document.getElementById('findBy').addEventListener('click', detailsSearch);
    document.getElementById('details-add').addEventListener('click', detailsIncrement);
    document.querySelector('form').onsubmit = () => {return false;}
}
