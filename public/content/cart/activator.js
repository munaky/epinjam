function loadCartFunction(){
    const list = document.querySelectorAll('#menu-scanner');
    const checkout = document.getElementById('checkout');

    list.forEach(element => {
        element.onclick = (x) => deleteBtnCart(x.target);
    });

    if(checkout){
        checkout.addEventListener('click', checkoutCart)
    }
}
