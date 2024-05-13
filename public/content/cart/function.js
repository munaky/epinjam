function deleteBtnCart(element){
    calledFrom = 'hapus';

    getMenuContent(element);
}

async function checkoutCart(){
    startLoading();

    const data = await checkout();

    showAlert(data.alert);

    if(data.status){
        setTimeout(logout, 4000);
    }
    
    stopLoading();
}
