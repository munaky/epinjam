function loadAddFunction(){
    document.getElementById('add-create').addEventListener('click', addCreate);
    document.querySelector('form').onsubmit = () => {return false;}
}
