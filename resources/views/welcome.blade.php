<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>
<style>
    .disable-animation{
        animation: none !important;
    }

    .scanner-stream{
        position: absolute;
        width: var(--custom-size);
        height: var(--custom-size);
    }
    .scanner-box{
        position: absolute;
        margin-top: 50%;
        margin-left: 50%;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.1);
        transform: translate(-50%, -50%);
        width: 250px;
        height: 250px;
    }
    .scanner-line{
        position: absolute;
        width: 225px;
        margin-top: 20px;
        margin-left: 50%;
        transform: translateX(-50%);
        border-color: #00f148;
        border-style: solid;
        border-width: 2px;
        border-radius: 10px;
        animation: move-line 2s infinite ;
    }
    .scanner-line-shadow{
        position: absolute;
        width: 225px;
        height: 20px;
        background-image: linear-gradient(#ffffff00, #00f148);
        margin-top: 0px;
        margin-left: 50%;
        transform: translateX(-50%);
        animation: move-line-shadow 2s infinite;
    }
    .scanner-corner-tl{
        position: absolute;
        width: 40px;
        height: 40px;
        margin: -3px;
        border-start-start-radius: 6px;
        left: 0;
        border-top: 6px solid #00f148;
        border-left: 6px solid #00f148;
        animation: blink-corner 0.5s infinite;
    }
    .scanner-corner-tr{
        position: absolute;
        width: 40px;
        height: 40px;
        margin: -3px;
        border-start-end-radius: 6px;
        right: 0;
        border-top: 6px solid #00f148;
        border-right: 6px solid #00f148;
        animation: blink-corner 0.5s infinite;
    }
    .scanner-corner-bl{
        position: absolute;
        width: 40px;
        height: 40px;
        margin: -3px;
        border-end-start-radius: 6px;
        left: 0;
        bottom: 0;
        border-bottom: 6px solid #00f148;
        border-left: 6px solid #00f148;
        animation: blink-corner 0.5s infinite;
    }
    .scanner-corner-br{
        position: absolute;
        width: 40px;
        height: 40px;
        margin: -3px;
        border-end-end-radius: 6px;
        right: 0;
        bottom: 0;
        border-bottom: 6px solid #00f148;
        border-right: 6px solid #00f148;
        animation: blink-corner 0.5s infinite;
    }

    @keyframes blink-corner{
        from{
            opacity: 1;
        }

        to{
            opacity: 0;
        }
    }

    @keyframes move-line{
        0%{
            margin-top: 20px;
        }

        40%{
            margin-top: 230px;
        }

        50%{
            margin-top: 230px
        }

        90%{
            margin-top: 20px;
        }

        100%{

        }
    }

    @keyframes move-line-shadow{
        from{
            margin-top: 0;
            transform: rotateX(0deg) translateX(-50%);
            opacity: 0;
        }

        10%{
            opacity: 1;
        }

        20%{
            opacity: 1;
        }

        40%{
            opacity: 0;
            margin-top: 210px;
            transform: rotateX(0deg) translateX(-50%)
        }

        50%{
            opacity: 0;
            margin-top: 230px;
            transform: rotateX(-180deg) translateX(-50%);
        }

        60%{
            opacity: 1;
            transform: rotateX(-180deg) translateX(-50%);
        }

        70%{
            opacity: 1;
        }

        90%{
            margin-top: 20px;
            opacity: 0;
            transform: rotateX(-180deg) translateX(-50%);
        }

        100%{
            opacity: 0;
        }
    }

    .loader {
  font-size: 10px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  margin-top: 50%;
  margin-left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  text-indent: -9999em;
  animation: spinner 1.1s infinite ease;
  transform: translateZ(0);
}
@keyframes spinner {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.5), -1.8em -1.8em 0 0em rgba(255,255,255, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.5), 1.8em -1.8em 0 0em rgba(255,255,255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.5), 2.5em 0em 0 0em rgba(255,255,255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.5), 1.75em 1.75em 0 0em rgba(255,255,255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.5), 0em 2.5em 0 0em rgba(255,255,255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.5), -1.8em 1.8em 0 0em rgba(255,255,255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.5), -2.6em 0em 0 0em rgba(255,255,255, 0.7), -1.8em -1.8em 0 0em #ffffff;
  }
}
</style>
<div style="position: fixed; width: var(--avail-width); height: var(--avail-height); background-color: black; opacity: 1; z-index: 10;">

<div id="reader" style="max-width: 400px; max-height: 400px; position: relative;"></div>

</div>
<div class="card" style="width: 18rem;">
    <img src="Arduino_Uno_-_R3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><strong>Microcontroller</strong></h5>
      <div>
        <p>Arduino-Uno-029</p>
      </div>
      <a href="#" class="btn btn-primary">Keranjang</a>
    </div>

<script>
var root = document.documentElement;
root.style.setProperty('--custom-size', customSize() + "px");
root.style.setProperty('--avail-width', screen.availWidth + "px");
root.style.setProperty('--avail-height', screen.availHeight + "px");
const html5QrCode = new Html5Qrcode("reader");
const config = { fps: 60, qrbox: { width: 250, height: 250 } };
var pending = false;

startScan();

function customSize(){
    let size = document.querySelector('html').offsetWidth;

    if(size > 400){
        size = 400;
    }

    return size;
}

async function scanSuccess(text, result){
    if(pending == false){
        pending = true;
    }
    else{
        return;
    }

    startLoading();

    await fetch('https://google.com')
    .then(function(response){

    })

    pending = false;
}

function startScan(){
    html5QrCode.start({ facingMode: "environment" }, config, scanSuccess)
    .then(setQRCodeStyle());
}

function stopScan(){
    html5QrCode.stop();
}

function startLoading(){
    let loader = document.querySelector('.loader');

    document.querySelector('.loader').classList.remove('d-none');
    document.querySelector('.scanner-line').classList.add('d-none');
    document.querySelector('.scanner-line-shadow').classList.add('d-none');
    document.querySelector('.scanner-corner-tl').classList.add('disable-animation');
    document.querySelector('.scanner-corner-tr').classList.add('disable-animation');
    document.querySelector('.scanner-corner-bl').classList.add('disable-animation');
    document.querySelector('.scanner-corner-br').classList.add('disable-animation');
}

function stopLoading(){
    let loader = document.querySelector('.loader');

    document.querySelector('.loader').classList.add('d-none');
    document.querySelector('.scanner-line').classList.remove('d-none')
    document.querySelector('.scanner-line-shadow').classList.remove('d-none')
    document.querySelector('.scanner-corner-tl').classList.remove('disable-animation');
    document.querySelector('.scanner-corner-tr').classList.remove('disable-animation');
    document.querySelector('.scanner-corner-bl').classList.remove('disable-animation');
    document.querySelector('.scanner-corner-br').classList.remove('disable-animation');
}

function setQRCodeStyle(){
    let qrCodeBox = document.querySelector('#qr-shaded-region');

    if(qrCodeBox == null){
        setTimeout(setQRCodeStyle, 100);
        return;
    }

    qrCodeBox.innerHTML = '';

    document.querySelector('video').classList.add('scanner-stream');
    qrCodeBox.removeAttribute('style');
    qrCodeBox.classList.add('scanner-box');
    qrCodeBox.innerHTML += `<span class="scanner-line"></span>`;
    qrCodeBox.innerHTML += `<span class="scanner-line-shadow"></span>`;
    qrCodeBox.innerHTML += `<span class="scanner-corner-tl"></span>`;
    qrCodeBox.innerHTML += `<span class="scanner-corner-tr"></span>`;
    qrCodeBox.innerHTML += `<span class="scanner-corner-bl"></span>`;
    qrCodeBox.innerHTML += `<span class="scanner-corner-br"></span>`;
    qrCodeBox.innerHTML += `<span class="loader d-none"></span>`;
}

</script>
</body>
</html>
