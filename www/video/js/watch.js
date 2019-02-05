const btnDownload = document.getElementById('download');
if (btnDownload) {
    btnDownload.addEventListener('click', downloadFile);
}

//TODO: Barra de progreso
function downloadFile(ev) {
    ev.stopPropagation();
    const codigo = this.getAttribute('data-codigo');

    const data = new FormData();
    data.append('codigo', codigo);

    const init = {
        method: 'POST',
        credentials: 'same-origin',
        body: data
    };

    const url = "./php/downloadVideo.php";

    // const xhr = new XMLHttpRequest();
    // xhr.withCredentials = true;    
    // xhr.responseType = 'blob';

    // xhr.addEventListener('progress', (ev) => {
    //     console.log(ev);
    // });

    // xhr.addEventListener('load', (ev) => {
    //     console.log(ev);
    // });

    // xhr.open('POST', url);

    // xhr.send(data);

    let fileName = "";
    fetch(url, init)
        .then(data => {            
            fileName = data.headers.get('Content-Disposition');
            fileName = fileName.split(";")[1].split("=")[1];
            
            return data.blob();
        })
        .then(blob => {
            saveFile(blob, fileName);
        })
        .catch(err => console.error('Error al descargar el archivo: ' + err));
}

function saveFile(blob, fileName) {
    const url = window.URL.createObjectURL(blob);

    const a = document.createElement("a");
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.target = "_blank";
    a.click();
}