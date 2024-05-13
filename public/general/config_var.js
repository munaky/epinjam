const configMenu = {
    home: {
        content: contentPath + '/home',             //API Get Content
        style: stylePath + '/home/style.css',       //Style
        realtime: realtimePath + '/home',           //API Real Time Data
        onload: [                                   //Load Function After Content Displayed
            stopInterval,
            loadScannerMenu,
            loadHomeFunction,
            setActiveCategory,
            [startInterval, realtimeHome]
        ]
    },

    data: {
        content: contentPath + '/data',
        style: stylePath + '/data/style.css',
        realtime: realtimePath + '/data',
        onload: [
            stopInterval,
            loadDataFunction,
            dataLoadPrev,
        ]
    },

    history: {
        content: contentPath + '/history',
        style: stylePath + '/history/style.css',
        realtime: realtimePath + '/history',
        onload: [
            stopInterval,
            loadHistoryFunction,
        ]
    },

    cart: {
        content: contentPath + '/cart',
        style: stylePath + '/cart/style.css',
        realtime: null,
        onload: [
            stopInterval,
            loadCartFunction,
        ]
    },

    details: {
        content: contentPath + '/details',
        style: stylePath + '/details/style.css',
        realtime: realtimePath + '/details',
        onload: [
            stopInterval,
            loadDetailsFunction,
        ]
    },

    add: {
        content: contentPath + '/add',
        style: stylePath + '/add/style.css',
        realtime: null,
        onload: [
            stopInterval,
            loadAddFunction,
        ]
    },

    scanner: {
        content: contentPath + '/scanner',
        style: stylePath + '/scanner/style.css',
        realtime: null,
        config: { fps: 30, qrbox: { width: 250, height: 250 }, aspectRatio: 1.33334 },
        onload: [
            stopInterval,
            loadScannerFunction
        ]
    }
};

const configAlert = {
    success: {
        class: 'alert-success',
        svg: {
            class: 'bi-check-circle-fill',
            path: ['path', {d: 'M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'}],
        }
    },
    fail: {
        class: 'alert-danger',
        svg: {
            class: 'bi-exclamation-triangle-fill',
            path: ['path', {d: 'M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'}],
        }
    },
    info: {
        class: 'alert-primary',
        svg: {
            class: 'bi-info-circle-fill',
            path: ['path', {d: 'M12,1.25c-5.933,0 -10.75,4.817 -10.75,10.75c0,5.933 4.817,10.75 10.75,10.75c5.933,0 10.75,-4.817 10.75,-10.75c0,-5.933 -4.817,-10.75 -10.75,-10.75Zm-0,8.75c-0.398,0 -0.779,0.158 -1.061,0.439c-0.281,0.282 -0.439,0.663 -0.439,1.061c0,1.888 0,4.612 0,6.5c-0,0.398 0.158,0.779 0.439,1.061c0.282,0.281 0.663,0.439 1.061,0.439c0.398,-0 0.779,-0.158 1.061,-0.439c0.281,-0.282 0.439,-0.663 0.439,-1.061c0,-1.888 0,-4.612 0,-6.5c0,-0.398 -0.158,-0.779 -0.439,-1.061c-0.282,-0.281 -0.663,-0.439 -1.061,-0.439Zm0,-5.75c0.966,0 1.75,0.784 1.75,1.75c0,0.966 -0.784,1.75 -1.75,1.75c-0.966,0 -1.75,-0.784 -1.75,-1.75c0,-0.966 0.784,-1.75 1.75,-1.75Z'}],
        }
    },
}
