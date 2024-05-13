const baseURL = location.protocol + '//' + location.host;
var intervalFunc = null;
const usersId = new Cookie().get('id');
const token = new Cookie().get('token');
const validate = setInterval(() => { usersServices('validates') }, 2000);

function withPathName(path) {
    return baseURL + path;
}

async function getMenuContent(element) {
    startLoading();
    currMenu = element.dataset.menu;
    const config = configMenu[element.dataset.menu];
    const content = await getContent(config.content);

    document.getElementById('dynamic-css').href = config.style;
    document.getElementById('epinjam-content').innerHTML = content;

    execListFunction(config.onload);
    stopLoading();
}

function execListFunction(list) {
    for (const func of list) {
        func.length > 0 ? execFunctionWith(func) : func();
    }
}

function execFunctionWith([func, ...args]) {
    func(...args);
}

function nameToId(name) {
    return name.replace(/\s+/g, '-').toLowerCase();
}

function createElementWith(tag = 'div', attributes = {}) {
    const element = document.createElement(tag);

    Object.entries(attributes).forEach(([key, value]) => {
        element.setAttribute(key, value);
    });

    return element;
}

function createTable(config = {
    thead : [
        [['th', 'Head', {scope : 'col'}]]
    ],
    tbody: [
        [['td', 'Body', {scope : 'row'}]]
    ]
}, attr = {}){
    const frag = new DocumentFragment();
    const table = createElementWith('table', attr);
    const thead = createElementWith('thead');
    const tbody = createElementWith('tbody');

    for(x of config.thead){
        const tr = createElementWith('tr');

        for(y of x){
            const trChild = createElementWith(y[0], y[3]);
            trChild.textContent = y[1];

            tr.append(trChild);
        }

        thead.append(tr);
    }

    for(x of config.tbody){
        const tr = createElementWith('tr');

        for(y of x){
            const trChild = createElementWith(y[0], y[3]);
            trChild.innerHTML = y[1];

            tr.append(trChild);
        }

        tbody.append(tr);
    }

    table.append(thead, tbody);
    frag.append(table);

    return frag;
}

function startInterval(func, delay = 1000) {
    stopInterval();
    intervalFunc = setInterval(async () => { await func() }, delay);
}

function stopInterval() {
    clearInterval(intervalFunc);
    intervalFunc = null;
}

function logout() {
    window.location.replace(`${baseURL}/auth/logout`);
}

function showAlert(data) {
    if (document.querySelector('.custom-alert')) {
        return;
    }

    const config = configAlert[data[0]];
    const frag = new DocumentFragment();
    const message = createElementWith('div');
    const alertWrapper = createElementWith('div', {
        class: `custom-alert aos-animate position-fixed alert ${config.class} d-flex align-items-center start-50 end-50 translate-middle`,
        'data-aos': 'fade-down',
        'data-aos-duration': 300,
    })
    const svg = createElementWith('svg', {
        class: `bi ${config.svg.class} flex-shrink-0 me-2`,
        xmlns: 'http://www.w3.org/2000/svg',
        role: 'img',
        viewBox: '0 0 16 16'
    })
    const path = createElementWith(...config.svg.path);

    message.textContent = data[1];

    svg.append(path);
    alertWrapper.append(svg, message);
    frag.append(alertWrapper);

    document.querySelector('body').prepend(frag);

    rmAlert(3000, 300);
}

function rmAlert(delay, duration = 1000) {
    const el = document.querySelector('.custom-alert');

    setTimeout(() => {
        el.classList.remove('aos-animate');

        setTimeout(() => {
            el.remove();
        }, duration);
    }, delay);
}

function extendUsers() {
    if (extendLifetime) {
        extendLifetime = false;
        usersServices('extend');
        setTimeout(() => extendLifetime = true, 5000);
    }
}

async function generateQRCode(data, callback = null){
    await openWindow(`${baseURL}/api/items/qrcode?name=${data.name}&increment=${data.increment}`)
}

function openWindow(url) {
    return new Promise((resolve, reject) => {
      const newWindow = window.open(url);
      newWindow.addEventListener('load', () => {
        resolve(newWindow);
      });
    });
  }
