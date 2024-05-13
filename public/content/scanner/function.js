function startScan(config) {
    html5QrCode.start({ facingMode: "environment" }, config, scanSuccess)
        .then(setScannerStyle());
}

function stopScan() {
    html5QrCode.stop();
}

async function scanSuccess(text, result) {
    if (scannerPending == false && scannerModal == false) {
        scannerPending = true;
        scannerModal = true;
    }
    else {
        return;
    }

    if(muridId === null && token.length > 224){
        showAlert(['fail', 'Mohon Untuk Memilih Users Terlebih Dahulu']);
        return;
    }

    scanPending();

    const data = await itemScanned(text, scannerMode);

    showAlert(data.alert);
    modalScanner(data);

    stopPending();
    scannerPending = false;
}

function scanPending() {
    document.querySelector('.spinner').classList.remove('d-none');
    document.querySelector('.scanner-line').classList.add('d-none');
    document.querySelector('.scanner-line-shadow').classList.add('d-none');
    document.querySelector('.scanner-corner-tl').classList.add('scanner-disable-animation');
    document.querySelector('.scanner-corner-tr').classList.add('scanner-disable-animation');
    document.querySelector('.scanner-corner-bl').classList.add('scanner-disable-animation');
    document.querySelector('.scanner-corner-br').classList.add('scanner-disable-animation');
}

function stopPending() {
    document.querySelector('.spinner').classList.add('d-none');
    document.querySelector('.scanner-line').classList.remove('d-none')
    document.querySelector('.scanner-line-shadow').classList.remove('d-none')
    document.querySelector('.scanner-corner-tl').classList.remove('scanner-disable-animation');
    document.querySelector('.scanner-corner-tr').classList.remove('scanner-disable-animation');
    document.querySelector('.scanner-corner-bl').classList.remove('scanner-disable-animation');
    document.querySelector('.scanner-corner-br').classList.remove('scanner-disable-animation');
}

function setScannerStyle() {
    let qrCodeBox = document.querySelector('#qr-shaded-region');
    let video = document.querySelector('video');

    if (qrCodeBox == null) {
        setTimeout(setScannerStyle, 100);
        return;
    }

    qrCodeBox.innerHTML = '';

    video.removeAttribute('style');
    video.classList.add('scanner-stream');
    qrCodeBox.removeAttribute('style');
    qrCodeBox.classList.add('scanner-box');
    qrCodeBox.innerHTML += `
    <span class="scanner-line"></span>
    <span class="scanner-line-shadow"></span>
    <span class="scanner-corner-tl"></span>
    <span class="scanner-corner-tr"></span>
    <span class="scanner-corner-bl"></span>
    <span class="scanner-corner-br"></span>
    <div class="spinner-container"><div class="spinner d-none"></div></div>
    `;
}

function modalScanner(data) {
    if(!data.action){
        setTimeout(() => scannerModal = false, 2000);
        return;
    }

    const funcConfig = configMenu.scanner.btn;
    const frag = new DocumentFragment();
    const bg = createElementWith('div', { class: 'bg-modal position-fixed h-100 w-100' });
    const modalWrapper = createElementWith('div', {
        class: 'modal-wrapper position-fixed start-50 top-50 translate-middle',
        'data-aos': 'fade-up',
        'data-aos-duration': '300'
    });
    const modal = createElementWith('div', { class: 'custom-modal card' });
    const img = createElementWith('img', { src: data.img, alt: data.type });
    const title = createElementWith('h5', { class: 'card-title fw-bold' });
    const text = createElementWith('div', { class: 'card-text pb-3' });
    const btn = createElementWith('a', {
        class: 'btn btn-primary',
        'data-all': JSON.stringify({
            id: data.id,
            type: data.type,
            action: data.action.toLowerCase()
        })
    });
    title.textContent = data.type;
    text.textContent = data.code;
    btn.textContent = data.action;
    btn.classList.toggle('btn-danger', data.action == 'Hapus');
    btn.addEventListener('click', async (x) => await btnActionScanner(x.target.dataset.all));
    const cardImg = createElementWith('div', { class: 'card-body' });
    const cardDetails = createElementWith('div', { class: 'card-body' });
    cardImg.append(img);
    cardDetails.append(title, text, btn);


    modal.append(cardImg, cardDetails);
    modalWrapper.append(modal);
    bg.addEventListener('click', rmModalScanner);
    frag.append(bg, modalWrapper);

    document.getElementById('epinjam-content').prepend(frag);
}

function rmModalScanner() {
    scannerModal = false;

    document.querySelector('.bg-modal').remove();
    document.querySelector('.modal-wrapper').remove();
}

async function btnActionScanner(data) {
    const result = await scannerAction(JSON.parse(data));

    showAlert(result);
    rmModalScanner();
}

function scannerCalledFrom(){
    scannerMode = calledFrom;

    setTimeout(() => calledFrom = null, 100);
}

function scannerChangeMode(mode){
    scannerMode = mode.toLowerCase();

    showAlert(['info', `Mode Scanner Diganti Ke ${mode}`]);
}
