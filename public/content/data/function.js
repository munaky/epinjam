async function dataSearch() {
    const data = await getRealtimeData(currMenu, {
        name : prevName,
    })

    dataShowTable(data);
}

function setName(){
    prevName = document.getElementById('data-name').value;

    dataSearch();
}

function dataLoadPrev(){
    if(!prevName){
        return;
    }

    document.getElementById('data-name').value = prevName;

    dataSearch();
}

function dataShowTable(data) {
    let num = 1;
    let config = {
        thead : [
            [
                ['th', 'No', {scope : 'col'}],
                ['th', 'Nama Peminjam', {scope : 'col'}],
                ['th', 'Kelas', {scope : 'col'}],
                ['th', 'Code Barang', {scope : 'col'}],
                ['th', 'Tanggal Peminjaman', {scope : 'col'}],
                ['th', 'Aksi', {scope : 'col'}]
            ]
        ],
        tbody: [

        ]
    }

    for(const x of data){
        config.tbody.push([
            ['th', num, {scope : 'row'}],
            ['td', x.murid.name],
            ['td', `${x.murid.kelas.name} ${x.murid.jurusan.name}`],
            ['td', x.items.item_code],
            ['td', x.date_start],
            ['td', `<input class="btn btn-primary" type="button" id="menu-scanner" data-menu="scanner" data-id="${x.murid.id}" value="Selesai">`]
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

    dataLoadBtn();
}

function dataRedirectScan(element){
    muridId = element.dataset.id;

    getMenuContent(element);
}

function dataLoadBtn(){
    const list = document.querySelectorAll('#menu-scanner');

    for(const x of list){
        x.addEventListener('click', x => dataRedirectScan(x.target))
    }
}
