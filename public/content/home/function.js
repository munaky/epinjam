function filterHome(element) {
    categoryFilter = element.dataset.category;

    setActiveCategory();
    stopInterval();
    realtimeHome();
    startInterval(realtimeHome);
}

async function realtimeHome() {
    const getData = await getRealtimeData(currMenu, { category: categoryFilter });
    const data = getData.map(x => ({...x, id:nameToId(x.name)}));

    for(const x of data){
        document.getElementById(x.id) ? updateElementHome(x) : addElementHome(x);
    }

    validateItemsHome(data);
}

function rmElementHome(data, all = false) {
    if (all) {
        const list = document.querySelectorAll('.card');

        for (const x of list) {
            x.remove();
        }

        return;
    }

    document.getElementById(data.id).remove();
}

function addElementHome(data) {
    const container = document.querySelector('.portfolio .container');
    const fragment = new DocumentFragment();

    const parent = createElementWith('div', { class: 'card', id: data.id });
    const imgWrapper = createElementWith('div');
    const img = createElementWith('img', { src: data.image, class: 'card-img-top', alt: data.name });
    const infoWrapper = createElementWith('div', { class: 'card-info' });
    const title = createElementWith('div', { class: 'text-title' });
    const body = createElementWith('div', { class: 'text-body' });

    title.innerHTML = data.name;
    body.innerHTML = `<span>${data.items_count}</span> Tersedia`;

    imgWrapper.append(img);
    infoWrapper.append(title, body);
    parent.append(imgWrapper, infoWrapper);

    fragment.append(parent);
    container.append(fragment);
}

function updateElementHome(data) {
    document.querySelector(`#${data.id} span`).innerHTML = data.items_count;
}

function validateItemsHome(data) {
    if (data.length === 0) {
        rmElementHome(data, true);
        return;
    }

    const old = document.querySelectorAll('.card');
    const newData = data.map(x => x.id);

    for (const x of old) {
        if (!newData.includes(x.id)) {
            rmElementHome(x);
        }
    }
}

function setActiveCategory() {
    const list = document.querySelectorAll('#portfolio-flters li');
    const target = document.querySelector(`[data-category="${categoryFilter}"]`);

    for (const x of list) {
        if (x == target) {
            x.classList.add('filter-active');
            continue;
        }

        x.classList.remove('filter-active');
    }
}
