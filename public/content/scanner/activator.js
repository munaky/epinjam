function loadScannerFunction(){
    const list = document.querySelectorAll('.dropdown-item');

    calledFrom !== null ? scannerCalledFrom() : scannerMode = list[0].innerHTML.toLowerCase();

    list.forEach(element => {
        element.onclick = (x) => scannerChangeMode(x.target.innerHTML);
    });

    if(document.getElementById('reader')){
        html5QrCode = new Html5Qrcode('reader');

        startScan(configMenu.scanner.config);
    }
}
