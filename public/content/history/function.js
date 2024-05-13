function getHistoryDate(input) {
    if(!input){
        return ' ';
    }

    const date = new Date(input);

    return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
}

async function historySearch() {
    const status = document.getElementById('history-status').value;
    const categoryId = document.getElementById('history-category').value;
    const date = getHistoryDate(document.getElementById('history-date').value);

    const data = await getRealtimeData(currMenu, {
        'status': status,
        'category_id': categoryId,
        'date_start': date
    })

    historyShowTable(data);
}

function historyShowTable(data) {
    let num = 1;
    let config = {
        thead : [
            [
                ['th', 'No', {scope : 'col'}],
                ['th', 'Nama Peminjam', {scope : 'col'}],
                ['th', 'Code Barang', {scope : 'col'}],
                ['th', 'Tanggal Peminjaman', {scope : 'col'}],
                ['th', 'Tanggal Pengembalian', {scope : 'col'}],
                ['th', 'Status', {scope : 'col'}]
            ]
        ],
        tbody: [

        ]
    }

    for(const x of data){
        config.tbody.push([
            ['th', num, {scope : 'row'}],
            ['td', x.murid.name],
            ['td', x.items.item_code],
            ['td', x.date_start],
            ['td', x.date_end],
            ['td', x.status == 1 ? 'Dikembalikan' : 'Dipinjam']
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
}
