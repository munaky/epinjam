async function detailsSearch(){
    let name = null;
    if(detailsType === null){
        name = document.getElementById('details-type').value;
        detailsType = name;
    }
    else{
        name = detailsType;
        detailsType = null;
    }


    if(!name) return;

    const data = await getRealtimeData(currMenu, {type: name});

    incrementHide();

    typeof data[0] == 'string' ? showAlert(data) : detailsShowTable(data);
}

async function detailsIncrement(){
    const amount = document.getElementById('details-increment').value;
    document.getElementById('details-increment').value = '';

    if(!amount) return;

    await generateQRCode({name: detailsType, increment: amount}, detailsSearch);
    detailsSearch();
}

function detailsShowTable(data){
    let num = 1;
    let config = {
        thead : [
            [
                ['th', 'No', {scope : 'col'}],
                ['th', 'Code Barang', {scope : 'col'}],
                ['th', 'Nama Peminjam', {scope : 'col'}],
                ['th', 'Kelas', {scope : 'col'}],
                ['th', 'Status', {scope : 'col'}],
                ['th', 'Aksi', {scope : 'col'}]
            ]
        ],
        tbody: [

        ]
    }

    for(const x of data){
        config.tbody.push([
            ['th', num, {scope : 'row'}],
            ['td', x.item_code],
            ['td', !x.murid ? '-' : x.murid.name],
            ['td', !x.murid ? '-' : `${x.murid.kelas.name} ${x.murid.jurusan.name}`],
            ['td', x.status == '1' ? 'Ready' : 'Dipinjam'],
            ['td', `<button type="button" class="btn btn-danger" id="details-delete" data-id="${x.id}" style="font-size: 11px;">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="trash"
                    width="12" height="12">
                    <path
                        d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"
                        fill="#FFFFFF"></path>
                </svg>
            </span>Hapus
        </button>`]
        ])

        num ++;
    }

    const pTable = document.querySelector('.table-responsive');
    const card = createElementWith('div', {class : 'card'});
    const cardBody = createElementWith('div', {class : 'card-body'});
    const table = createTable(config, {class: 'table table-striped table-hover'});

    cardBody.append(table)
    card.append(cardBody);

    pTable.removeChild(pTable.firstChild);
    pTable.append(card);

    detailsLoadBtn();
    incrementReveal();
}

function incrementReveal(){
    document.getElementById('field-increment').classList.remove('d-none');
}

function incrementHide(){
    document.getElementById('field-increment').classList.add('d-none');
}

function detailsLoadBtn(){
    const list = document.querySelectorAll('#details-delete');

    for(const x of list){
        x.addEventListener('click', (x) => detailsModal(x.target.dataset.id))
    }
}

async function detailsRmItems(id){
    rmModalDetails();
    startLoading();
    const data = await itemsDelete(id);

    showAlert(data);
    detailsSearch();
    stopLoading();
}

function detailsModal(id) {
    const frag = new DocumentFragment();
    const bg = createElementWith('div', { class: 'bg-modal position-fixed h-100 w-100' });
    const modalWrapper = createElementWith('div', {
        class: 'modal-wrapper position-fixed start-50 top-50 translate-middle',
        'data-aos': 'fade-up',
        'data-aos-duration': '300'
    });
    const modal = createElementWith('div', { class: 'custom-modal card' });
    const title = createElementWith('h5', { class: 'card-title fw-bold' });
    const btn = createElementWith('a', {class: 'btn btn-danger'});
    title.textContent = 'Apakah Anda Yakin Ingin Menghapus Items Tersebut?';
    btn.textContent = 'Hapus';
    btn.addEventListener('click', () => detailsRmItems(id));
    const cardDetails = createElementWith('div', { class: 'card-body' });
    cardDetails.append(title, btn);


    modal.append(cardDetails);
    modalWrapper.append(modal);
    bg.addEventListener('click', rmModalDetails);
    frag.append(bg, modalWrapper);

    document.getElementById('epinjam-content').prepend(frag);
}

function rmModalDetails() {
    scannerModal = false;

    document.querySelector('.bg-modal').remove();
    document.querySelector('.modal-wrapper').remove();
}
