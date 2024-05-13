function startLoading(){
    const el = createElementWith('div', {class: 'spinner-bg', id: 'spinner-bg'});
    el.innerHTML = '<div class="spinner-container"><div class="spinner"></div></div>';
    document.getElementsByTagName('body')[0].prepend(el);
}

function stopLoading(){
    document.getElementById('spinner-bg').remove();
}
