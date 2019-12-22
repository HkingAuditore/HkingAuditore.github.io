function showMarkdown(mdFile) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('content').innerHTML = marked(xmlhttp.responseText);
        }
    }
    xmlhttp.open('GET', mdFile, true);
    xmlhttp.send();
}