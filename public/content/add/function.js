async function addCreate() {
    const category_id = document.getElementById('add-category').value;
    const name = document.getElementById('add-name').value;
    const amount = document.getElementById('add-amount').value;
    const image = document.getElementById('add-image').files[0];

    if(!category_id || !name || !amount || !image){
        showAlert(['fail', 'Semua Field Harus Diisi']);
        return;
    }

    const response = await itemsCreate({
        category_id: category_id,
        name: name,
        amount: amount,
        image: image
    })

    showAlert(response.alert);
    generateQRCode(response.config);
    addClearInput();
}

function addClearInput(){
    document.getElementById('add-category').options[0].selected = 'selected';
    document.getElementById('add-name').value = '';
    document.getElementById('add-amount').value = '';
    document.getElementById('add-image').value = '';
}
