var httpRequest = new XMLHttpRequest();

function GoToPage(lien) {
    document.getElementById("container_proj").innerHTML = "";
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4) {
            document.getElementById('container_proj').innerHTML = httpRequest.responseText;
        }
    }
    httpRequest.open('GET', lien, true);
    httpRequest.send();
}
