function getCookie(property) {
    let cProperty = property + "=";
    let temp = document.cookie.split(';');
    for (let i = 0; i < temp.length; i++) {
        let tempProperty = temp[i].trim();
        if (tempProperty.indexOf(cProperty) === 0) {
            return tempProperty.substring(cProperty.length, tempProperty.length);
        }
    }
    return "";
}