async function getContent(link) {
    return await fetch(link, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: usersId,
            token: token
        })
    })
        .then((response) => response.text());
}

async function getRealtimeData(menu, data) {
    return await fetch(configMenu[menu].realtime, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
        .then((response) => response.json());
}

function usersServices(method) {
    fetch(`${baseURL}/api/users/${method}`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            token: token
        })
    })
        .then(async (res) => await res.text() == 'true' ? true : logout());
}

async function itemScanned(code, action) {
    return await fetch(`${baseURL}/api/scanner/get`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            code: code,
            action: action
        })
    })
        .then((response) => response.json());
}

async function scannerAction(data) {
    return await fetch(`${baseURL}/api/scanner/${data.action}`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: data.id,
            action: data.action,
            murid_id: muridId
        })
    })
        .then((response) => response.json());
}

async function checkout() {
    return await fetch(`${baseURL}/api/items/checkout`, {
        method: 'POST'
    })
        .then((response) => response.json());
}

async function itemsCreate(data) {
    const formData = new FormData();
    formData.append('category_id', data.category_id);
    formData.append('name', data.name);
    formData.append('amount', data.amount);
    formData.append('image', data.image);

    return await $.ajax({
        url: `${baseURL}/api/items/create`,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            return response;
        },
        error: function (xhr, status, error) {
            showAlert(['fail', 'Terjadi Kesalahan'])
        }
    });
}

async function itemsDelete(id) {
    return await fetch(`${baseURL}/api/items/delete`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: id,
        })
    })
        .then((response) => response.json());
}
