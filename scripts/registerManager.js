function preview() {
    var fileReader = new FileReader();
    avatar = document.getElementById('avatar_img').files[0];
    fileReader.readAsDataURL(avatar);
    fileReader.onload = function() {
        document.getElementById('avatar_preview').src = this.result;
    };
};



function check(input) {
    if (input.value == "HkingAuditore" ||
        input.value == "fine" ||
        input.value == "tired") {
        input.setCustomValidity('"' + input.value + '" is not a feeling.');
    } else {
        // input is fine -- reset the error message
        input.setCustomValidity('');
    }

}